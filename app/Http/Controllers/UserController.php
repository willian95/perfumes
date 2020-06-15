<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    
    function index(){

        return view("admin.clients.index");

    }

    function fetch($page = 1){

        try{

            $skip = ($page - 1) * 20;

            $users = User::skip($skip)->where("role_id", 2)->take(20)->get();
            $usersCount = User::where("role_id", 2)->count();

            return response()->json(["success" => true, "users" => $users, "usersCount" => $usersCount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "msg" => "Error en el servidor"]);

        }

    }

}
