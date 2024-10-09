<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use App\Models\Brand; 
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
}
