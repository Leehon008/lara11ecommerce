<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fproduct = 1;
        $promotions = Promotion::all();
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        $brands = Brand::orderBy('created_at', 'DESC')->paginate(10);
        $categories = Category::orderBy('created_at', 'DESC')->paginate(10);
        $fProducts = Product::where('featured', $fproduct)->get()->take(8);
        // return view('index');
        return view('frontend.pages.home', compact('products', 'fProducts', 'brands', 'categories', 'promotions'));
    }

    public function designs()
    {
        $brands = Brand::paginate(10);
        return view('frontend.pages.designs', compact('brands'));
    }
}
