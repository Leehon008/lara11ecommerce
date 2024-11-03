<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use Dompdf\Dompdf;
use Dompdf\Options;


class QuotationsController extends Controller
{
      public function getQuote(){
       // Fetch all categories (services)
       $categories = Category::all();

       return view('frontend.pages.quotation', compact('categories'));
   }
       

   public function getBrandsByCategory($categoryId)
   {
       // Fetch brands (designs) that match the selected category
       $brands = Brand::where('category_id', $categoryId)->get();

       return response()->json($brands);
    }
     
    public function generatePDF(Request $request)
    {
        // Retrieve the services from the request and calculate the total amount
        $services = $request->input('services', []);
        $totalAmount = 0;

        foreach ($services as $service) {
            // Check if 'total_price' exists and strip the dollar sign, then convert to float
            if (isset($service['total_price'])) {
                $totalAmount += floatval(str_replace('$', '', $service['total_price']));
            }
        }

        // Prepare data to be passed to the view
        $data = [
            'user-fullname' => $request->input('user-fullname'),
            'delivery-location' => $request->input('delivery-location'),
            'services' => $services,
            'quotation_number' => $request->input('quotation_number'),
            'date' => $request->input('date'),
            'total_amount' => number_format($totalAmount, 2), // Format to 2 decimal places if needed
        ];

        // Create a view for the PDF
        $pdfView = view('pdf.quotation', compact('data'))->render();

        // Set DomPDF options and generate the PDF
        $options = new Options();
        $options->set('defaultFont', 'Helvetica');
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($pdfView);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Return the PDF as a download
        return $dompdf->stream('quotation_'.$request->input('quotation_number').'.pdf');
    }


}
