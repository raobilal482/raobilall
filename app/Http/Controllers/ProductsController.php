<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        return response()->json('Welcome to the product Api');
    }
    public function getallproducts(){
            $allproducts = Products::get();
            return $allproducts;
            // return view('products',['allproducts'=>$allproducts]);
    }
    public function getsingleproduct($id){
            $singleproduct = Products::get()->where('id',$id);
           return $singleproduct;
    }
    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        $newproduct =  new Products();
        $newproduct->name = $request->name;
        $newproduct->price = $request->price;
        $newproduct->quantity = $request->quantity;
        $newproduct->save();

    }
    public function update(Request $request, $id){
        $product = Products::get()->find($id);
        //  dd($product);
        $product->name = "mobile";
        $product->price = 50;
        $product->quantity = 20;
        $product->save();

    }

    public function delete($id){
            $product = Products::get()->where('id',$id)->first();
            $product->delete();
    }
    public function sortedproducts(){
            $allproducts = Products::orderby('price','asc')->get();
            return $allproducts;
    }
}
