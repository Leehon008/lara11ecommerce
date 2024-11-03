<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::paginate(10);
        return view('admin.promotions', compact('promotions'));
    }

    public function create()
    {
        return view('admin.promotion.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'promo_heading' => 'required|string|max:255',
            'promo_description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,heic|max:2048',
        ]);

        if (Promotion::count() >= 3) {
            return redirect()->back()->with('error', 'Maximum number of promotions reached.');
        }

        // Move image to the desired directory
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/promotions'), $imageName);
        $imagePath = 'uploads/promotions/' . $imageName;

        Promotion::create([
            'promo_heading' => $request->promo_heading,
            'promo_description' => $request->promo_description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.promotion')->with('success', 'Promotion created successfully.');
    }

    public function edit(Promotion $promotion)
    {
        return view('admin.promotions_edit', compact('promotion'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'promo_heading' => 'required|string|max:255',
            'promo_description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,heic|max:2048',
        ]);

        // Update promotion details
        $promotion->promo_heading = $request->promo_heading;
        $promotion->promo_description = $request->promo_description;

        // Check if image is being updated
        if ($request->hasFile('image')) {
            if ($promotion->image && file_exists(public_path($promotion->image))) {
                unlink(public_path($promotion->image)); // Delete old image
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/promotions'), $imageName);
            $promotion->image = 'uploads/promotions/' . $imageName;
        }

        $promotion->save();

        return redirect()->route('admin.promotion')->with('success', 'Promotion updated successfully.');
    }


    public function destroy(Promotion $promotion)
    {
        // Delete image from storage
        if ($promotion->image && file_exists(public_path($promotion->image))) {
            unlink(public_path($promotion->image));
        }

        $promotion->delete();

        return redirect()->route('admin.promotion')->with('success', 'Promotion deleted successfully.');
    }

}
