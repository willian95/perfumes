<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TypeStoreRequest;
use App\Http\Requests\TypeUpdateRequest;
use App\Type;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TypesExport;
use PDF;

class TypeController extends Controller
{
    function index(){
        return view("admin.types.index");
    }

    function store(TypeStoreRequest $request){

        try{

            $type = new Type;
            $type->name = $request->name;
            $type->abbreviation = $request->abbreviation;
            $type->save();

            return response()->json(["success" => true, "msg" => "Tipo de fragancia creada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }
        
    }

    function update(TypeUpdateRequest $request){

        try{

            if(Type::where('name', $request->name)->where('id', '<>', $request->id)->count() == 0){
                
                $type = Type::find($request->id);
                $type->name = $request->name;
                $type->abbreviation = $request->abbreviation;
                $type->update();

                return response()->json(["success" => true, "msg" => "Tipo de fragancia actualizado"]);
            
            }else{

                return response()->json(["success" => false, "msg" => "Este nombre ya existe"]);

            }

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }
        
    }

    function delete(Request $request){

        try{

            $type = Type::find($request->id);
            $type->delete();

            return response()->json(["success" => true, "msg" => "Tipo de fragancia eliminada"]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor"]);

        }

    }

    function fetch($page = 1){

        try{

            $skip = ($page - 1) * 20;

            $types = Type::skip($skip)->take(20)->get();
            $typesCount = Type::count();

            return response()->json(["success" => true, "types" => $types, "typesCount" => $typesCount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor"]);

        }

    }

    function fetchAll(){

        try{

            $types = Type::all();

            return response()->json(["success" => true, "types" => $types]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor"]);

        }

    }

    function excelExport(){
        return Excel::download(new TypesExport, 'tipos.xlsx');
    }

    function csvExport(){
        return Excel::download(new TypesExport, 'tipos.csv');
    }

    function pdfExport(){
        $pdf = PDF::loadView('pdf.types');
        return $pdf->stream();
    }

}
