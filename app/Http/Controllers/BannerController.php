<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateBannerRequest;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Banner;

class BannerController extends Controller
{

    function index(){

        return view('admin.banner.index', ["image" => Banner::find(1)->image, "smallText" => Banner::find(1)->small_text, "bigText" => Banner::find(1)->big_text, "type" => Banner::find(1)->type]);

    }

    function update(UpdateBannerRequest $request){

        ini_set('max_execution_time', 0);

        try{
            $type = "";
            try{

                $imageData = $request->get('image');

                if(explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[0] == "video"){
                    
                    $data = explode( ',', $imageData);
                    $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.'.explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
                    $ifp = fopen($fileName, 'wb' );
                    fwrite($ifp, base64_decode( $data[1] ) );
                    rename($fileName, 'images/banners/'.$fileName);
                    $type = "video";
                }
    
                else if(strpos($imageData, "svg+xml") > 0){
    
                    $data = explode( ',', $imageData);
                    $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.'."svg";
                    $ifp = fopen($fileName, 'wb' );
                    fwrite($ifp, base64_decode( $data[1] ) );
                    rename($fileName, 'images/banners/'.$fileName);

                    $type = "image";
    
                }else{
    
                    $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
                    Image::make($request->get('image'))->save(public_path('images/banners/').$fileName);

                    $type = "image";
    
                }
    
                
            }catch(\Exception $e){
    
                return response()->json(["success" => false, "msg" => "Hubo un problema con la imagen", "err" => $e->getMessage(), "ln" => $e->getLine()]);
    
            }

            $banner = Banner::find(1);
            $banner->image = $fileName;
            $banner->small_text = $request->smallText;
            $banner->big_text = $request->bigText;
            $banner->type = $type;
            $banner->update();

            return response()->json(["success" => true, "msg" => "Banner actualizado"]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln"=> $e->getLine()]);
        }

    }
}
