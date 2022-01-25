<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function index(){
       return view('login_admin');       
    }
    
    public function dashboard(Request $request){
        $admin_email=$request->admin_email;
        $admin_password=$request->admin_password;
        $result=DB::table('users')
            ->where('email', $admin_email)
            ->where('password', $admin_password)
            ->where('tipo_usuario','1')
            ->first();
        if($result){
            Session::put('nombre', $result->nombre);
            Session::put('id', $result->id_usuario);
            return Redirect::to('/dashboard');
            
        }else{
            Session::put('messege', 'Contraseña o email incorrectos'); 
            return Redirect::to('/admin');
        }
    }
    
    
    public function all_users(){
        $all_users_info=DB::table('users')
               ->get();     
        $manage_users=view('admin.admin_users')
            ->with('all_users_info', $all_users_info);
        return view('layouts.admin_lay')
            ->with('admin.admin_users', $manage_users);                
    }
    
    
    public function delete_user($id){
       DB::table('users')
                    ->where('id', $id)
                    ->delete();
        Session::put('message', 'El Usuario seleccionado ha sido eliminado ');
        return Redirect::to('/dashboard');
    }
    
    
     public function set_user_to_admin(Request $request, $id){             
       DB::table('users')
            ->where('id_usuario', $id)
            ->update(['tipo_usuario'=>'1']);
            Session::put('message', 'El tipo de usuario ha sido actualizado a administrador ');
            return Redirect::to('/dashboard');
    }
    
    
     public function set_user_to_normal(Request $request, $id){             
       DB::table('users')
            ->where('id_usuario', $id)
            ->update(['tipo_usuario'=>'0']);
            Session::put('message', 'El tipo de usuario ha sido actualizado a usuario normal ');
            return Redirect::to('/dashboard');
    }
    
}