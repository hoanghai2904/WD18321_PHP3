<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listProduct()
    {
        $listProduct = Product::select('product_id', 'name', 'price', 'image')->get();
        return response()->json([
            'data' => $listProduct,
            'status_code' => '200',
            'message' => 'success',
        ], 200);
    }

    public function getProduct($idProduct)
    {
        $getProduct = Product::select('product_id', 'name', 'price', 'image')->find($idProduct);
        return response()->json([
            'data' => $getProduct,
            'status_code' => '200',
            'message' => 'success',
        ], 200);
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'price' => $request->price,
        ];
        $newProduct = Product::create($data);
        return response()->json([
            'data' => $newProduct,
            'message' => 'success',
            'status_code' => '200',
        ],200);
    }

    public function updateProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'idProduct' => 'required',
        ]);
        $data = [
            'name' => $request->name,
            'price' => $request->price,
        ];
        $product = Product::find($request->idProduct);
        $product->update($data);
        return response()->json([
            'data' => $product,
            'message' => 'success',
            'status_code' => '200',
        ],200);
    }

    public function deleteProduct(Request $request){
        $request->validate([
            'idProduct' => 'required',
        ]);
        Product::find($request->idProduct)->delete();
        return response()->json([
            'message' => 'success',
            'status_code' => '200',
        ],200);
    }
}
