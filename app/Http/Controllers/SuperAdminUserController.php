<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class SuperAdminUserController extends Controller
{
    public function index_user(){
        $this->AdminAuthCheck();
        return view('usuario');
    }
    
    public function AdminAuthCheck(){
        $id_usuario=Session::get('id_usuario');
        if($id_usuario){
            return;
        }else {
            return Redirect::to('/login-user')->send();
        }    
    }
}