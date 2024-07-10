<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Lab2Controller extends Controller
{
    public function listProduct(){
        $products = DB::table('product')->orderBy('view','desc')->get();
        return view('product.listproduct', ['products' => $products]);
    }

    public function searchProduct(Request $request)
    {
        $query = $request->input('query');

        // Thực hiện logic tìm kiếm sản phẩm, ví dụ:
        $products = DB::table('product')
                        ->where('name', 'like', '%' . $query . '%')
                        ->orWhere('price', 'like', '%' . $query . '%')
                        ->orderBy('view', 'desc') // Sắp xếp theo view giảm dần
                        ->get();

        return view('product.listproduct', ['products' => $products]);
        // Thay 'listproduct' bằng tên view thực tế mà bạn muốn hiển thị kết quả tìm kiếm.
    }

    public function addProduct(){
        $category = DB::table('category')->select('id')->get();
        return view('product.addproduct')->with(['category'=>$category]);
    }

    public function addPostProduct(Request $request){
        $data = [
            'name' => $request->nameProduct,
            'price' => $request->priceProduct,
            'view' => $request->viewProduct,
            'category_id' => $request->nameCategory_id,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ];
        DB::table('product')->insert($data);   
        return redirect()->route('product.listProduct');
    }

    public function deleteProduct($idProduct){
        DB::table('product')-> where('id', $idProduct)->delete();
        return redirect()->route('product.listProduct');
    }

    public function editProduct($idProduct)
    {
        $product = DB::table('product')->where('id', $idProduct)->first();
        $categories = DB::table('category')->select('id')->get();
        return view('product.editproduct')-> with(['product' => $product, 'categories' => $categories]);
    }

    // Phương thức để xử lý yêu cầu POST cập nhật sản phẩm
    public function updateProducts(Request $request, $idProduct)
    {
        $data = [
            'name' => $request->nameProduct,
            'price' => $request->priceProduct,
            'view' => $request->viewProduct,
            'category_id' => $request->nameCategory_id,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ];
        DB::table('product')->where('id', $idProduct)->update($data);
        return redirect()->route('product.listProduct');
    }

}
