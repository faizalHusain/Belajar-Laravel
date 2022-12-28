<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public static function index() 
    {
        $products = Products::all();
        return view('welcome', ["products" => $products]);
    }
    public static function add() 
    {
        return view('add');
    }
    public static function store() 
    {
        $product = new Products();
        $product->productName = request("productName", "");
        $product->stock = request("stock", "");
        $product->save();
        return redirect('/');
    }
    public static function edit($id) 
    {
        $product = Products::find($id);
        return view('edit', ["product"=>$product]);
    }
    public static function update($id) 
    {
        $product = Products::find($id);
        $product->productName = request("productName", "");
        $product->stock = request("stock", "");
        $product->save();
        return redirect('/');
    }
    public static function delete($id) 
    {
        $product = Products::find($id);
        $product->delete();
        return redirect('/');
    }
    public static function getproduct() 
    {
        $products = Products::all();
        return response($products,205);
    }
}
