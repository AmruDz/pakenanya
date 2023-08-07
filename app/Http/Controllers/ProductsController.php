<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Products::with(['Categories'])->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'categories_id' => 'required|integer',
        'name' => 'required|string|max:225',
        'desc' => 'required',
        'icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Specify image validation rules
    ]);

    // Generate a random string for the icon file name
    $icon_file = $this->generateRandomString();

    // Get the file extension from the uploaded icon
    $extension = $request->file('icon')->getClientOriginalExtension();

    // Combine the random string and extension to form the icon name
    $icon_name = $icon_file . "." . $extension;

    // Store the uploaded icon in the 'public/image' directory
    $request->file('icon')->storeAs('public/image', $icon_name);

    // Create a new product record in the database
    $product = Products::create([
        'categories_id' => $validatedData['categories_id'],
        'name' => $validatedData['name'],
        'desc' => $validatedData['desc'],
        'icon' => $icon_name,
        'status' => 'disable',
    ]);

    return response()->json([
        'message' => 'Product created successfully',
        'data' => $product,
    ], 201);
}

// Helper function to generate a random string
private function generateRandomString($length = 10)
{
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}


    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $products)
    {
        //
    }
}
