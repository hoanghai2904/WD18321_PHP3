<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function listProducts(){
        // phân trang paginate

        $products = Product::paginate(5);
        return view('admin.product.list')->with(['products' => $products]);
    }
    public function addProducts(){

        return view('admin.product.addproduct');
    }
    public function addPostProducts(Request $request){
        $imageURL = '';
        if ($request->hasFile('imageProduct')) {
            $image = $request->file('imageProduct');
            $nameImage = time() .".". $image->getClientOriginalExtension();
            $link = "imageProduct/";
            $image->move(public_path($link),$nameImage);
            $imageURL = $link . $nameImage;
        }
        $data = [
            'name' => $request->nameProduct,
            'price' => $request->priceProduct,
            'description' => $request->descriptionProduct,
            'image' => $imageURL,
        ];
        Product::create($data);
        return redirect()->route('admin.product.listProducts')->with(['message' => 'Thêm Mới Thành Công']);
    }

    public function deleteProducts(Request $request){
        $products = Product::find($request->id);
        if($products->image != null && $products->image != ''){
            File::delete(public_path($products->image));
        }
        $products->delete();
        return redirect()->back()->with(['message' => 'Xoá thành công']);
    }

    public function detailProducts($idProduct){
        $products = Product::where('product_id', $idProduct)->first();
        return view('admin.product.detail')->with(['products' => $products]);

    }
    
    public function updateProducts($idProduct){
        $products = Product::where('product_id', $idProduct)->first();
        return view('admin.product.update')->with(['products' => $products]);

    }
    
    public function updatePatchProducts(Request $request, $idProduct){
        // xu ly anh update
        $products = Product::where('product_id', $idProduct)->first();
        $linkImage = $products->image;
        if ($request->hasFile('imageProduct')) {
            File::delete(public_path($products->image));   // xoá ảnh cũ 
          $image = $request->file('imageProduct');
          $newName = time() .".". $image->getClientOriginalExtension();
          $linkStorage = 'imageProduct/';
          $image->move(public_path($linkStorage),$newName);

          $linkImage = $linkStorage . $newName;
        }
        // data cua product 
       $data = [
        'name' => $request->nameProduct,
        'price' => $request->priceProduct,
        'description' => $request->descriptionProduct,
        'image' => $linkImage,
       ];
       Product::where('product_id', $idProduct)->update($data);
       return redirect()->route('admin.product.listProducts')->with(['message' => 'Sửa Thành Công']);
    }

}
