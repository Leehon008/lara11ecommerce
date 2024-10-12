<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
use App\Models\Brand; 
use App\Models\Category; 
use App\Models\Product; 
use Carbon\Carbon;

class ShopController extends Controller
{
    public function index() {
        $products = Product::orderBy('created_at','DESC')->paginate(10);
        $brands = Brand::orderBy('created_at','DESC')->paginate(10);
        $categories = Category::orderBy('created_at','DESC')->paginate(10);
        return view('shop',compact('products','brands','categories'));
    }

    public function product_details($product_slug) {
        $product = Product::where('slug',$product_slug)->first(); 
        $rProducts = Product::where('slug','<>',$product_slug)->get()->take(8);
        return view('product_details',compact('product','rProducts'));
    }


}
