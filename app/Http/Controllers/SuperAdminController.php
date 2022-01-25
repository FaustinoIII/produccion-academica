<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class SuperAdminController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        return view('/admin_usuarios');
    }
    
    public function articulos(){
        $this->AdminAuthCheck();
        return view('/admin_art');
    }

    public function logout(){
        Session::flush();
        return Redirect::to('/admin');
    }
    
    public function AdminAuthCheck(){
        $user_id=Session::get('id');
        if($user_id){
            return;
        }else {
            return Redirect::to('/admin')->send();
        }    
    }
}

