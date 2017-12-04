<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductsPhoto;

class UploadController extends Controller
{
    public function uploadForm()
    {
        return view('upload_form');
    }	

    public function uploadSubmit(Request $request)
    {
        $product = Product::create($request->all());
        foreach ($request->photos as $photo) {
            $filename = $photo->store('photos');
            ProductsPhoto::create([
                'product_id' => $product->id,
                'filename' => $filename
            ]);
        }
        return 'Upload successful!';
    }
}
