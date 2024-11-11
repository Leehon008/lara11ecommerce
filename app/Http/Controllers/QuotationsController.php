<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Models\Brand;
use App\Models\Category;
use Dompdf\Dompdf;
use Dompdf\Options;

class QuotationsController extends Controller
{
    public function getQuote(){
        $categories = Category::all();  // Fetch all categories (services)
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
        $request->validate([
            'delivery_fee' => 'required|numeric',
        ]);
    
        $services = $request->input('services', []);
        $totalAmount = 0;
    
        foreach ($services as $service) {
            if (isset($service['total_price'])) {
                $totalAmount += floatval(str_replace('$', '', $service['total_price']));
            }
        }
    
        $deliveryFee = $request->input('delivery_fee');
        $totalAmount += $deliveryFee; // Add delivery fee to the total amount
    
        $vat = ($totalAmount - $deliveryFee) * 0.15;
        $totalWithVat = $totalAmount + $vat;
    
        $data = [
            'user-fullname' => $request->input('user-fullname'),
            'delivery-location' => $request->input('delivery-location'),
            'deliveryFee' => $deliveryFee,
            'vat' => number_format($vat, 2),
            'services' => $services,
            'quotation_number' => $request->input('quotation_number'),
            'date' => $request->input('date'),
            'total_amount' => number_format($totalWithVat, 2),
        ];
    
        $pdfView = view('pdf.quotation', compact('data'))->render();
    
        $options = new Options();
        $options->set('defaultFont', 'Helvetica');
        $dompdf = new Dompdf($options);
    
        try {
            $dompdf->loadHtml($pdfView);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
        } catch (\Exception $e) {
            Log::error('Failed to generate PDF: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to generate PDF. Please try again.'], 500);
        }
    
        return $dompdf->stream('quotation_' . $request->input('quotation_number') . '.pdf');
    }


}
