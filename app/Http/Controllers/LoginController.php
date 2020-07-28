<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    function index(){
        return view("loginpage");
    }

    function login(LoginRequest $request){

        try{

            $user = User::where("email", $request->email)->first();
            if($user){

                if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
                    return response()->json(["success" => true, "msg" => "Usuario autenticado", "role_id" => Auth::user()->role_id]);
                }

            }else{
                return response()->json(["success" => false, "msg" => "Usuario no encontrado"]);
            }

        }catch(\Exception $e){
            return response()->json(["success" => false, "msg" => "Error en el servidor", "err" => $e->getMessage(), "ln" => $e->getLine()]);
        }

    }

    function logout(){

        Auth::logout();
        return redirect()->to('/');

    }

}
