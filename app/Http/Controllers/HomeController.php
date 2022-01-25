<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Jenssegers\Mongodb\Eloquent\Model;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function log(){
        $this->AdminAuthCheck();
        return view('home_log');
    }

    public function AdminAuthCheck(){
        $id_usuario=Session::get('id');
        if($id_usuario){
            return;
        }else {
            return Redirect::to('/');
        }    
    }
}
