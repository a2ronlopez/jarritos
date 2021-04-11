<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Http\Response;

class productController extends Controller
{
    public function index(){
        $products = Product::all();
        return response()->json(
            [
                'code' => 200,
                'status' => 'success',
                'products' => $products
        ],200);
    }

    public function getProductsByVendor($id){
        $products = Product::where('vendor_id',$id)->get();

        return response()->json([
            'status' => 'success',
            'products' => $products
        ],200);
    }
    
}
