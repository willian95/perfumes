<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Brand;

class BrandController extends Controller
{
    
    function index(){

        return view("admin.brands.index");

    }

    function store(BrandStoreRequest $request){

        try{

            $imageData = $request->get('image');

            if(strpos($imageData, "svg+xml") > 0){

                $data = explode( ',', $imageData);
                $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.'."svg";
                $ifp = fopen($fileName, 'wb' );
                fwrite($ifp, base64_decode( $data[1] ) );
                rename($fileName, 'images/brands/'.$fileName);

            }else{

                $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
                Image::make($request->get('image'))->save(public_path('images/brands/').$fileName);

            }

            

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Hubo un problema con la imagen", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

        try{

            $brand = new Brand;
            $brand->name = $request->name;
            $brand->image = $fileName;
            $brand->save();

            return response()->json(["success" => true, "msg" => "Marca creada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }
        
    }

    function update(BrandUpdateRequest $request){

        if($request->get('image') != null){

            try{

                $imageData = $request->get('image');
    
                if(strpos($imageData, "svg+xml") > 0){
    
                    $data = explode( ',', $imageData);
                    $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.'."svg";
                    $ifp = fopen($fileName, 'wb' );
                    fwrite($ifp, base64_decode( $data[1] ) );
                    rename($fileName, 'images/brands/'.$fileName);
    
                }else{
    
                    $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
                    Image::make($request->get('image'))->save(public_path('images/brands/').$fileName);
    
                }
    
            }catch(\Exception $e){
    
                return response()->json(["success" => false, "msg" => "Hubo un problema con la imagen", "err" => $e->getMessage(), "ln" => $e->getLine()]);
    
            }

        }

        try{

            if(Brand::where('name', $request->name)->where('id', '<>', $request->id)->count() == 0){
                
                $brand = Brand::find($request->id);
                $brand->name = $request->name;
                if($request->get('image') != null){
                    $brand->image = $fileName;
                }
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

    function fetchAll(){

        try{

            $brands = Brand::all();

            return response()->json(["success" => true, "brands" => $brands]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor"]);

        }

    }

}
