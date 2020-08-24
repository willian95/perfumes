<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\ProductTypeSize;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ProductController extends Controller
{
    function index(){
        return view("admin.products.index");
    }

    function create(){
        return view("admin.products.create");
    }

    function edit($id){
        $product = Product::where("id", $id)->with("brand", "category")->has("brand")->has("category")->first();
        return view("admin.products.edit", ["product" => $product]);
    }

    function store(ProductStoreRequest $request){
        ini_set('max_execution_time', 0);

        try{

            $imageData = $request->get('image');

            if(strpos($imageData, "svg+xml") > 0){

                $data = explode( ',', $imageData);
                $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.'."svg";
                $ifp = fopen($fileName, 'wb' );
                fwrite($ifp, base64_decode( $data[1] ) );
                rename($fileName, 'images/products/'.$fileName);

            }else{

                $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
                Image::make($request->get('image'))->save(public_path('images/products/').$fileName);

            }
            

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Hubo un problema con la imagen", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

        try{

            if($request->get("video") != null){
                
                $videoData = $request->get('video');
               
                if(explode('/', explode(':', substr($videoData, 0, strpos($videoData, ';')))[1])[0] == "video"){
                    
                    $data = explode( ',', $videoData);
                    $fileVideo = Carbon::now()->timestamp . '_' . uniqid() . '.'.explode('/', explode(':', substr($videoData, 0, strpos($videoData, ';')))[1])[1];
                    $ifp = fopen($fileVideo, 'wb' );
                    fwrite($ifp, base64_decode( $data[1] ) );
                    rename($fileVideo, 'videos/'.$fileVideo);
                }
                //}else{

                //$videoName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($videoData, 0, strpos($videoData, ';')))[1])[1];
                //Image::make($request->get('video'))->save(public_path('videos/').$videoName);

                //}

            }
            

        }catch(\Exception $e){
            
            return response()->json(["success" => false, "msg" => "Hubo un problema con la imagen", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

        try{

            $slug = str_replace(" ","-", $request->name);
            $slug = str_replace("/", "-", $slug);

            if(Product::where("slug", $slug)->count() > 0){
                $slug = $slug."-".uniqid();
            }

            $sanitizedDescription = str_replace("\n", "", $request->description);

            $product = new Product;
            $product->name = $request->name;
            $product->category_id = $request->category;
            $product->brand_id = $request->brand;
            $product->description = $sanitizedDescription;
            $product->image = $fileName;
            if($request->get("video") != null){
                $product->video = $fileVideo; 
            }
            $product->slug = $slug;
            $product->save();

            foreach($request->productSizeTypes as $productTypeSize){

                $productType = new ProductTypeSize;
                $productType->product_id = $product->id;
                $productType->type_id = $productTypeSize["type"]["id"];
                $productType->size_id = $productTypeSize["size"]["id"];
                $productType->stock = $productTypeSize["stock"];
                $productType->price = $productTypeSize["price"];
                $productType->save();

            }

            return response()->json(["success" => true, "msg" => "Producto creado"]);

        }catch(\Exception $e){
            return response()->json(["success" => true, "false" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function update(ProductUpdateRequest $request){
        ini_set('max_execution_time', 0);

        if($request->get("image") != null){

            try{

                $imageData = $request->get('image');
    
                if(strpos($imageData, "svg+xml") > 0){
    
                    $data = explode( ',', $imageData);
                    $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.'."svg";
                    $ifp = fopen($fileName, 'wb' );
                    fwrite($ifp, base64_decode( $data[1] ) );
                    rename($fileName, 'images/products/'.$fileName);
    
                }else{
    
                    $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
                    Image::make($request->get('image'))->save(public_path('images/products/').$fileName);
    
                }
                
    
            }catch(\Exception $e){
    
                return response()->json(["success" => false, "msg" => "Hubo un problema con la imagen", "err" => $e->getMessage(), "ln" => $e->getLine()]);
    
            }

        }

        try{

            if($request->get("video") != null){
                
                $videoData = $request->get('video');
               
                if(explode('/', explode(':', substr($videoData, 0, strpos($videoData, ';')))[1])[0] == "video"){
                    
                    $data = explode( ',', $videoData);
                    $fileVideo = Carbon::now()->timestamp . '_' . uniqid() . '.'.explode('/', explode(':', substr($videoData, 0, strpos($videoData, ';')))[1])[1];
                    $ifp = fopen($fileVideo, 'wb' );
                    fwrite($ifp, base64_decode( $data[1] ) );
                    rename($fileVideo, 'videos/'.$fileVideo);
                }
                //}else{

                //$videoName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($videoData, 0, strpos($videoData, ';')))[1])[1];
                //Image::make($request->get('video'))->save(public_path('videos/').$videoName);

                //}

            }
            

        }catch(\Exception $e){
            
            return response()->json(["success" => false, "msg" => "Hubo un problema con la imagen", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

        try{

            $slug = str_replace(" ","-", $request->name);
            $slug = str_replace("/", "-", $slug);

            if(Product::where("slug", $slug)->count() > 0){
                $slug = $slug."-".uniqid();
            }

            $sanitizedDescription = str_replace("\n", "", $request->description);

            $product = Product::find($request->id);
            $product->name = $request->name;
            $product->category_id = $request->category;
            $product->brand_id = $request->brand;
            $product->description = $sanitizedDescription;
            if($request->get("image") != null){
                $product->image = $fileName;
            }
            if($request->get("video") != null){
                $product->video = $fileVideo; 
            }
            $product->slug = $slug;
            $product->update();

            //ProductTypeSize::where("product_id", $request->id)->delete();

            $productTypeArray = [];
            $productTypes = ProductTypeSize::where("product_id", $product->id)->get();
            foreach($productTypes as $productType){
                array_push($productTypeArray, $productType->id);
            }

            $requestArray = [];
            foreach($request->productSizeTypes as $productTypeSizeRequest){
                if(array_key_exists("id", $productTypeSizeRequest)){
                    array_push($requestArray, $productTypeSizeRequest["id"]);
                }
            }

            $deleteProductTypes = array_diff($productTypeArray, $requestArray);
            
            foreach($deleteProductTypes as $productDelete){
                ProductTypeSize::where("id", $productDelete)->delete();
            }

            foreach($request->productSizeTypes as $productTypeSize){
                
                if(array_key_exists("id", $productTypeSize)){

                    if(ProductTypeSize::where("id", $productTypeSize["id"])->count() > 0){
                        $productType = ProductTypeSize::find($productTypeSize["id"]);
                        $productType->product_id = $product->id;
                        $productType->type_id = $productTypeSize["type"]["id"];
                        $productType->size_id = $productTypeSize["size"]["id"];
                        $productType->stock = $productTypeSize["stock"];
                        $productType->price = $productTypeSize["price"];
                        $productType->update();
                    }

                }else{
                    $productType = new ProductTypeSize;
                    $productType->product_id = $product->id;
                    $productType->type_id = $productTypeSize["type"]["id"];
                    $productType->size_id = $productTypeSize["size"]["id"];
                    $productType->stock = $productTypeSize["stock"];
                    $productType->price = $productTypeSize["price"];
                    $productType->save();
                }
                

            }

            return response()->json(["success" => true, "msg" => "Producto actualizado"]);

        }catch(\Exception $e){
            return response()->json(["success" => true, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function fetch($page = 1){

        try{

            $skip = ($page - 1) * 20;

            $products = Product::with("category", "brand", "productTypeSizes", "productTypeSizes.type", "productTypeSizes.size")->has("category")->has("brand")->has("productTypeSizes")->has("productTypeSizes.type")->has("productTypeSizes.size")->skip($skip)->take(20)->get();
            $productsCount = Product::with("category", "brand", "productTypeSizes", "productTypeSizes.type", "productTypeSizes.size")->has("category")->has("brand")->has("productTypeSizes")->has("productTypeSizes.type")->has("productTypeSizes.size")->count();

            return response()->json(["success" => true, "products" => $products, "productsCount" => $productsCount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function delete(Request $request){

        try{

            Product::where("id", $request->id)->delete();
            ProductTypeSize::where("product_id", $request->id)->delete();

            return response()->json(["success" => true, "msg" => "Producto eliminado"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

    function productTypeFetch($id){

        try{

            $productType = ProductTypeSize::where("product_id", $id)->with("type", "size")->has("type")->has("size")->get();
            return response()->json(["success" => true, "productType" => $productType]);

        }catch(\Exception $e){  

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }   

    }

    function excelExport(){
        return Excel::download(new ProductsExport, 'productos.xlsx');
    }

    function csvExport(){
        return Excel::download(new ProductsExport, 'productos.csv');
    }

    function pdfExport(){
        $pdf = PDF::loadView('pdf.products');
        return $pdf->stream();
    }

}
