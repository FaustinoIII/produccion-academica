<?php

namespace App\Http\Controllers;

use App\Models\articulo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\usuario;
session_start();

class SuperAdminController extends Controller
{
    public function index(){
        $this->AdminAuthCheck();
        $data=usuario::all();
        return view('/admin_usuarios',compact('data'));
    }
    
    public function articulos(){
        $this->AdminAuthCheck();
        $data=articulo::all();
        return view('/admin_art',compact('data'));
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

