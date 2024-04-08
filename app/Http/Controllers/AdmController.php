<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdmController extends Controller{
   
    public function index(Request $request){
        return Inertia::render('Admin/Dashboard');

    }

    public function showLoginForm(){
        return Inertia::render('Admin/Auth/Login');

    }
    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'isAdm'=>true])){
            return redirect()->route('admin.deshboard');
        }
        return redirect()->route('admin.login')->with('erro','login invalido');
        
    }
    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');
        
    }
}