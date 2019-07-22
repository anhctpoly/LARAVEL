<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Category;
use DB;

class ProductController extends Controller
{
    public function getProduct()
    {
        $data['productlist'] = DB::table('vp_products')->join('vp_categoris', 'vp_products.product_cate', '=', 'vp_categoris.cate_id')->orderBy('product_id', 'desc')->get();
        return view('backend.product', $data);
    }
    public function getAddProduct()
    {
        $data['catelist'] = Category::all();
        return view('backend.addproduct', $data);
    }
    public function postAddProduct(AddProductRequest $request)
    {
        $filename = $request->img->getClientOriginalName();
        $product = new Product;
        $product->product_name = $request->name;
        $product->product_slug = str_slug($request->name);
        $product->product_img = $filename;
        $product->product_pk = $request->accessories;
        $product->product_price = $request->price;
        $product->product_war = $request->warranty;
        $product->product_km = $request->promotion;
        $product->product_tt = $request->condition;
        $product->product_trangthai = $request->status;
        $product->product_cate = $request->cate;
        $product->save();
        $request->img->storeAs('avatar', $filename);
        return redirect('admin/product');
    }
    public function getEditProduct($id)
    {
        $data['product'] = Product::find($id);
        $data['listcate'] = Category::all();
        return view('backend.editproduct', $data);
    }
    public function postEditProduct(Request $request, $id)
    {
        $product = new Product();
        $arr['product_name'] = $request->name;
        $arr['product_slug'] = str_slug($request->name);
        $arr['product_pk'] = $request->accessories;
        $arr['product_price'] = $request->price;
        $arr['product_war'] = $request->warranty;
        $arr['product_km'] = $request->promotion;
        $arr['product_tt'] = $request->condition;
        $arr['product_trangthai'] = $request->status;
        // $arr['product_cate']=$request->cate;
        if ($request->hasFile('img')) {
            $img = $request->img->getClientOriginalName();
            $arr['prodcuct_img'] = $img;
            $request->img->storeAs('avatar', $img);
        }
        $product::where('product_id', $id)->update($arr);
        return redirect('admin/product');
    }
    public function getDeleteProduct($id)
    { 
        Product::destroy($id);
        return back();
    }
}
