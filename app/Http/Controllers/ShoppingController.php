<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class ShoppingController extends Controller
{   
    function index(){

        return view("admin.shoppings.index");

    }
    
    function fetch($page = 1){

        try{

            $skip = ($page - 1) * 20;

            $shoppings = Payment::with("productPurchases", "user", "productPurchases.productTypeSize", "productPurchases.productTypeSize.product", "productPurchases.productTypeSize.product.brand", "productPurchases.productTypeSize.type", "productPurchases.productTypeSize.size")->skip($skip)->take(20)->get();
            $shoppingsCount = Payment::with("productPurchases", "user", "productPurchases.productTypeSize", "productPurchases.productTypeSize.product", "productPurchases.productTypeSize.type", "productPurchases.productTypeSize.product.brand", "productPurchases.productTypeSize.size")->count();

            return response()->json(["success" => true, "shoppings" => $shoppings, "shoppingsCount" => $shoppingsCount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

}
