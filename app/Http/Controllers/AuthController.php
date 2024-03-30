<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //to register page
    public function registerPage(){
        return view("authantication.register.register");
    }
    //to login page 
    public function loginPage(){
        return view("authantication.login.login");
    }

    //redirect to pages 
    public function redirect(){
        if(Auth::user()->role === "admin"){
            return redirect()->route("admin#homepage");
        }
        if(Auth::user()->role === "customer"){
            return redirect()->route("customer#homepage");
        }
    }


}
