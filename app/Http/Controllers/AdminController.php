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

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function brands() {
        $brands = Brand::orderby('id','Desc')->paginate(10);
        return view('admin.brands',compact('brands'));
    }

    public function add_brand() { 
        return view('admin.brand_add');
    }

    public function edit_brand($id) { 
        $brand = Brand::find($id);
        return view('admin.brand_edit',compact('brand'));
    }

    public function update_brand(Request $request) { 
        $request->validate([
            'name'=> 'required',
            'slug'=> 'required|unique:brands,slug,'.$request->id,
            'image'=>'mimes:png,jpg,jpeg|max:2048'
        ]);

        $brand = Brand::find($request->id);
        $brand->name = $request->name; 
        $brand->slug =Str::slug($request->name);
        if ($request->hasFile('image')) {
            if (File::exists(public_path('uploads/brands').'/'.$brand->image)) {
                File::delete(public_path('uploads/brands').'/'.$brand->image);
            }
        $image = $request->file('image');
        $file_ext = $request->file('image')->extension();
        $file_name= Carbon::now()->timestamp.'.'.$file_ext;
        $this->GenerateBrandThumbnailImage($image,$file_name);
        $brand->image = $file_name;
        }
        $brand->save();
        return redirect()->route('admin.brands')->with('status','Brand with id '.$brand->id.' has been updated successfully!!');
    }

    public function store_brand(Request $request) { 
        $request->validate([
            'name'=> 'required',
            'slug'=> 'required|unique:brands,slug',
            'image'=>'mimes:png,jpg,jpeg|max:2048'
        ]);
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug =Str::slug($request->name);
        $image = $request->file('image');
        $file_ext = $request->file('image')->extension();
        $file_name= Carbon::now()->timestamp.'.'.$file_ext;
        $this->GenerateBrandThumbnailImage($image,$file_name);
        $brand->image = $file_name;
        $brand->save();
        return redirect()->route('admin.brands')->with('status','Brand has been created successfully!!');
    }

    public function GenerateBrandThumbnailImage($image,$imageName) {
        $destinationPath = public_path('uploads/brands');
        $img = Image::read($image->path());
        $img->cover(124,124,"top");
        $img->resize(124,124,function ($constraint) {
            $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$imageName);
    }

    public function delete_brand($id) {
        $brand = Brand::find($id);
        if (File::exists(public_path('uploads/brands').'/'.$brand->image)) {
            File::delete(public_path('uploads/brands').'/'.$brand->image);
        }
        $brand->delete();
        return redirect()->route('admin.brands')->with('status','Brand with id '.$brand->id.'  has been deleted successfully');
    }

    public function categories() {
        $categories = Category::orderby('id','Desc')->paginate(10);
        return view('admin.categories',compact('categories'));
    }

    public function add_category() { 
        return view('admin.category_add');
    }

    public function edit_category($id) { 
        $category = Category::find($id);
        return view('admin.category_edit',compact('category'));
    }

    public function update_category(Request $request) { 
        $request->validate([
            'name'=> 'required',
            'description'=> 'required',
            'slug'=> 'required|unique:categories,slug,'.$request->id,
            'image'=>'mimes:png,jpg,jpeg|max:2048'
        ]);

        $category = Category::find($request->id);
        $category->name = $request->name; 
        $category->description = $request->description; 
        $category->slug =Str::slug($request->name);
        if ($request->hasFile('image')) {
            if (File::exists(public_path('uploads/categories').'/'.$category->image)) {
                File::delete(public_path('uploads/categories').'/'.$category->image);
            }
        $image = $request->file('image');
        $file_ext = $request->file('image')->extension();
        $file_name= Carbon::now()->timestamp.'.'.$file_ext;
        $this->GenerateCategoryThumbnailImage($image,$file_name);
        $category->image = $file_name;
        }
        $category->save();
        return redirect()->route('admin.categories')->with('status','Category with id '.$category->id.' has been updated successfully!!');
    }

    public function store_category(Request $request) { 
        $request->validate([
            'name'=> 'required|unique:categories',
            'description'=> 'required',
            'slug'=> 'required|unique:categories,slug',
            'image'=>'mimes:png,jpg,jpeg|max:2048'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->slug =Str::slug($request->name);
        $image = $request->file('image');
        $file_ext = $request->file('image')->extension();
        $file_name= Carbon::now()->timestamp.'.'.$file_ext;
        $this->GenerateCategoryThumbnailImage($image,$file_name);
        $category->image = $file_name;
        $category->save();
        return redirect()->route('admin.categories')->with('status','Category '.$category->name.' has been created successfully!!');
    }

    public function GenerateCategoryThumbnailImage($image,$imageName) {
        $destinationPath = public_path('uploads/categories');
        $img = Image::read($image->path());
        $img->cover(124,124,"top");
        $img->resize(124,124,function ($constraint) {
            $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$imageName);
    }

    public function delete_category($id) {
        $category = Category::find($id);
        if (File::exists(public_path('uploads/categories').'/'.$category->image)) {
            File::delete(public_path('uploads/categories').'/'.$category->image);
        }
        $category->delete();
        return redirect()->route('admin.categories')->with('status','Category with id '.$category->id.'  has been deleted successfully');
    }

    public function products() {
        $products = Product::orderby('id','Desc')->paginate(10);
        return view('admin.products',compact('products'));
    }

     public function add_product() { 
        $brands = Brand::select('id','name')->orderby('name')->get();
        $categories = Category::select('id','name')->orderby('name')->get();
        return view('admin.product_add',compact('brands','categories'));
    }

    public function edit_product($id) { 
        $product = Product::find($id);
         $brands = Brand::select('id','name')->orderby('name')->get();
        $categories = Category::select('id','name')->orderby('name')->get();
        return view('admin.product_edit',compact('product','brands','categories'));
    }

    // public function view_product($id) { 
    //     $product = Product::find($id);
    //     return view('admin.product_view',compact('product'));
    // }

    public function update_product(Request $request) { 
        $request->validate([
              'name'=> 'required', 
            'short_description'=> 'required',
            'image'=>'mimes:png,jpg,jpeg|max:2048',
            'description'=> 'required',
            'regular_price'=> 'required',
            'sale_price'=> 'required',
            'SKU'=> 'required',
            'stock_status'=> 'required',
            'featured'=> 'required',
            'quantity'=> 'required',
            'brand_id'=> 'required', 
            'category_id'=> 'required',
            'slug'=> 'required|unique:categories,slug,'.$request->id, 
        ]);

        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->slug =Str::slug($request->name);
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->SKU = $request->SKU;
        $product->stock_status = $request->stock_status;
        $product->featured = $request->featured;
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
       
        $current_timestamp= Carbon::now()->timestamp;

        if ($request->hasFile('image')) {
           if (File::exists(public_path('uploads/products').'/'.$product->image)) {
                File::delete(public_path('uploads/products').'/'.$product->image);
            }
            if (File::exists(public_path('uploads/products/thumbnails').'/'.$product->image)) {
                File::delete(public_path('uploads/products/thumbnails').'/'.$product->image);
            }
            
            $image = $request->file('image');
            $imageName = $current_timestamp.'.'.$image->extension();
            $this->GenerateProductThumbnailImage($image,$imageName);
            $product->image = $imageName;
        }
      
        $gallery_arr = array();
        $gallery_images="";
        $counter = 1;

        if ($request->hasFile('images')) {
            foreach (explode(',',$product->images) as $oFile) {
                if (File::exists(public_path('uploads/products').'/'.$oFile)) {
                    File::delete(public_path('uploads/products').'/'.$oFile);
                }
                if (File::exists(public_path('uploads/products/thumbnails').'/'.$oFile)) {
                    File::delete(public_path('uploads/products/thumbnails').'/'.$oFile);
                }
            }
           
            $allowedFileExtension = ['jpeg','png','jpg'];
            $files = $request->file('images');
            foreach ($files as $file) {
                $gExtension = $file->getClientOriginalExtension();
                $gCheck= in_array($gExtension,$allowedFileExtension);
                if ($gCheck) {
                    $gFileName = $current_timestamp.'-'.$counter.'.'.$gExtension;
                    $this->GenerateProductThumbnailImage($file,$gFileName);
                    array_push($gallery_arr,$gFileName);
                    $counter = $counter + 1;
                }
            }
            $gallery_images = implode(',',$gallery_arr);
            $product->images = $gallery_images;
        }

        $product->save();
        return redirect()->route('admin.products')->with('status','Product with id '.$product->id.' has been updated successfully!!');
    }

    public function store_product(Request $request) { 
        $request->validate([
            'name'=> 'required',
            'slug'=> 'required|unique:products,slug',
            'short_description'=> 'required',
            'image'=>'required|mimes:png,jpg,jpeg|max:2048',
            'description'=> 'required',
            'regular_price'=> 'required',
            'sale_price'=> 'required',
            'SKU'=> 'required',
            'stock_status'=> 'required',
            'featured'=> 'required',
            'quantity'=> 'required',
            'brand_id'=> 'required', 
            'category_id'=> 'required',
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->slug =Str::slug($request->name);
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->SKU = $request->SKU;
        $product->stock_status = $request->stock_status;
        $product->featured = $request->featured;
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
       
        $current_timestamp= Carbon::now()->timestamp;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $current_timestamp.'.'.$image->extension();
            $this->GenerateProductThumbnailImage($image,$imageName);
            $product->image = $imageName;
        }
      
        $gallery_arr = array();
        $gallery_images="";
        $counter = 1;

        if ($request->hasFile('images')) {
            $allowedFileExtension = ['jpeg','png','jpg'];
            $files = $request->file('images');
            foreach ($files as $file) {
                $gExtension = $file->getClientOriginalExtension();
                $gCheck= in_array($gExtension,$allowedFileExtension);
                if ($gCheck) {
                    $gFileName = $current_timestamp.'-'.$counter.'.'.$gExtension;
                    $this->GenerateProductThumbnailImage($file,$gFileName);
                    array_push($gallery_arr,$gFileName);
                    $counter = $counter + 1;
                }
            }
            $gallery_images = implode(',',$gallery_arr);
        }

        $product->images = $gallery_images;
        $product->save();
        return redirect()->route('admin.products')->with('status','Product '.$product->name.' has been created successfully!!');
    }

    public function GenerateProductThumbnailImage($image,$imageName) {
        $destinationPathThumbnail = public_path('uploads/products/thumbnails');
        $destinationPath = public_path('uploads/products');
        $img = Image::read($image->path());

        $img->cover(540,689,"top");
        $img->resize(540,689,function ($constraint) {
            $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$imageName);
        $img->resize(104,104,function ($constraint) {
            $constraint->aspectRatio();
                    })->save($destinationPathThumbnail.'/'.$imageName);
    }

    public function delete_product($id) {
        $product = Product::find($id);
        if (File::exists(public_path('uploads/products').'/'.$product->image)) {
            File::delete(public_path('uploads/products').'/'.$product->image);
        }
        if (File::exists(public_path('uploads/products/thumbnails').'/'.$product->image)) {
            File::delete(public_path('uploads/products/thumbnails').'/'.$product->image);
        }

         foreach (explode(',',$product->images) as $oFile) {
            if (File::exists(public_path('uploads/products').'/'.$oFile)) {
                File::delete(public_path('uploads/products').'/'.$oFile);
            }
            if (File::exists(public_path('uploads/products/thumbnails').'/'.$oFile)) {
                File::delete(public_path('uploads/products/thumbnails').'/'.$oFile);
            }
        }
        $product->delete();
        return redirect()->route('admin.products')->with('status','Product with id '.$product->id.'  has been deleted successfully');
    }
}
