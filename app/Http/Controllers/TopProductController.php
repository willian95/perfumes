<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TopProductStoreRequest;
use App\TopProduct;
use App\ProductTypeSize;

class TopProductController extends Controller
{
    
    function index(){
        return view('admin.topProduct.index');
    }

    function store(TopProductStoreRequest $request){

        try{

            $topProduct = new TopProduct;
            $topProduct->product_type_size_id = $request->product_id;
            $topProduct->save();

            return response()->json(["success" => true, "msg"=>"Producto añadido"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln"=> $e->getLine()]);
        }

    }

    function search(Request $request){

        $products = ProductTypeSize::whereHas("product", function($q) use($request){
            $q->where("name", "like", "%".$request->search."%");
        })->with("product", "size", "type")->has("product")->has("size")->has("type")->take(20)->get();
        
        return response()->json(["products" => $products]);

    }

    function fetch(){

        try{

            $products = TopProduct::with("productTypeSize", "productTypeSize.product", "productTypeSize.type", "productTypeSize.size")
            ->has("productTypeSize")->has( "productTypeSize.product")->has( "productTypeSize.type")->has( "productTypeSize.size")
            ->get();
            return response()->json(["success" => true, "products" => $products]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln"=> $e->getLine()]);
        }

    }

    function delete(Request $request){

        try{

            $product = TopProduct::where("id", $request->id)->first();
            $product->delete();

            return response()->json(["success" => true, "msg" => "Producto top eliminado"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln"=> $e->getLine()]);
        }

    }

}
