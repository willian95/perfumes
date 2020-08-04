<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Exports\ShoppingsExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use DB;
use PDF;

class ShoppingController extends Controller
{   
    function index(){

        return view("admin.shoppings.index");

    }
    
    function fetch($page = 1){

        try{

            $skip = ($page - 1) * 20;

            $shoppings = Payment::with("productPurchases", "user", "guest", "productPurchases.productTypeSize", "productPurchases.productTypeSize.product", "productPurchases.productTypeSize.product.brand", "productPurchases.productTypeSize.type", "productPurchases.productTypeSize.size")->skip($skip)->take(20)->orderBy('id', 'desc')->get();
            $shoppingsCount = Payment::with("productPurchases", "user", "guest", "productPurchases.productTypeSize", "productPurchases.productTypeSize.product", "productPurchases.productTypeSize.type", "productPurchases.productTypeSize.product.brand", "productPurchases.productTypeSize.size")->count();

            return response()->json(["success" => true, "shoppings" => $shoppings, "shoppingsCount" => $shoppingsCount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function fetchByUser($page = 1, $user_id){

        try{

            $skip = ($page - 1) * 20;

            $shoppings = Payment::with("productPurchases", "user", "productPurchases.productTypeSize", "productPurchases.productTypeSize.product", "productPurchases.productTypeSize.product.brand", "productPurchases.productTypeSize.type", "productPurchases.productTypeSize.size")->skip($skip)->take(20)->where("payments.user_id", $user_id)->get();
            $shoppingsCount = Payment::with("productPurchases", "user", "productPurchases.productTypeSize", "productPurchases.productTypeSize.product", "productPurchases.productTypeSize.type", "productPurchases.productTypeSize.product.brand", "productPurchases.productTypeSize.size")->where("payments.user_id", $user_id)->count();

            return response()->json(["success" => true, "shoppings" => $shoppings, "shoppingsCount" => $shoppingsCount]);

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function excelExport(){
        return Excel::download(new ShoppingsExport, 'compras.xlsx');
    }

    function csvExport(){
        return Excel::download(new ShoppingsExport, 'compras.csv');
    }

    function pdfExport(){
        $pdf = PDF::loadView('pdf.shoppings');
        return $pdf->stream();
    }

    function chart(){

        try{

            $paymentsByDate = [];
            $paymentDates = [];

            $startDate = Carbon::now()->subMonths(3)->firstOfMonth();
            $now = Carbon::now();

            $payments = Payment::where("status", "aprobado")->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as payments'))
            ->groupBy('date')
            ->get();

            foreach($payments as $payment){

                array_push($paymentsByDate, $payment->payments);
                array_push($paymentDates, $payment->date);

            }
            
            return response()->json(["success" => true, "paymentsByDate" => $paymentsByDate, "paymentDates" => $paymentDates]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine()]);

        }

    }

}
