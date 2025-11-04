<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'required|string|max:255',
            'price'=>'required|numeric|min:0',
        ]);
        $product= Product::create($validatedData);

        return response()->json([
            'message'=>'Product created successfully',
            'data'=>$product,
        ],201);
    }
}
