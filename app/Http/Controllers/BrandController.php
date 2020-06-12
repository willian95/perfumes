<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;
use App\Brand;

class BrandController extends Controller
{
    
    function index(){

        return view("admin.brands.index");

    }

    function store(BrandStoreRequest $request){

        try{

            $brand = new Brand;
            $brand->name = $request->name;
            $brand->save();

            return response()->json(["success" => true, "msg" => "Marca creada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }
        
    }

    function update(BrandUpdateRequest $request){

        try{

            if(Brand::where('name', $request->name)->where('id', '<>', $request->id)->count() == 0){
                
                $brand = Brand::find($request->id);
                $brand->name = $request->name;
                $brand->update();

                return response()->json(["success" => true, "msg" => "Marca actualizada"]);
            
            }else{

                return response()->json(["success" => false, "msg" => "Este nombre ya existe"]);

            }

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }
        
    }

    function delete(Request $request){

        try{

            $brand = Brand::find($request->id);
            $brand->delete();

            return response()->json(["success" => true, "msg" => "Marca eliminada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor"]);

        }

    }

    function fetch($page = 1){

        try{

            $skip = ($page - 1) * 20;

            $brands = Brand::skip($skip)->take(20)->get();
            $brandsCount = Brand::count();

            return response()->json(["success" => true, "brands" => $brands, "brandsCount" => $brandsCount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor"]);

        }

    }

}
