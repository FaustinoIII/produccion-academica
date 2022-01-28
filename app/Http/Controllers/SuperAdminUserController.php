<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\usuario;
session_start();

class SuperAdminUserController extends Controller
{
    public function index_user(){
        $this->AdminAuthCheck();
        $data=usuario::where('id_usuario',Session::get('id_usuario'))->first();
        return view('usuario',compact('data'));
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