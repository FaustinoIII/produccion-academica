<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\usuario;
use Illuminate\Support\Facades\Redirect;
//session_start();

class UserController extends Controller
{
    public function login_check()
    {
    	return view('login');
    }

    public function user_registration(Request $request)
    {
        $result = usuario::max('id_usuario');
        $id_aux = intval($result);
        $id_aux++;

      $data=new usuario();
      $data->id_usuario=strval($id_aux);
      $data->nombre=$request->nombre;
      $data->ap_paterno=$request->ap_paterno;
      $data->ap_materno=$request->ap_materno;
      $data->fecha_nac=$request->fecha_nac; 
      $data->calle=$request->calle;
      $data->colonia=$request->colonia;
      $data->cp=$request->cp; 
      $data->ciudad=$request->ciudad;
      $data->estado=$request->estado; 
      $data->telefono=$request->telefono;
      $data->grado_estudios=$request->grado_estudios;
      $data->email=$request->email; 
      $data->password=$request->password; 
      $data->tipo_usuario='0';
      $data->save();
        
            Session::put('id_usuario',$id_aux);
            Session::put('nombre',$request->nombre);
            return Redirect('/login-user');      

    }


    public function user_login(Request $request){      
        $email=$request->email; 
        $password=$request->password;      
        $result=usuario::where('email', $email)
            ->where('password', $password) 
            ->where('tipo_usuario','0')
            ->first();
               
        if($result){
            Session::put('nombre', $result->nombre);
            Session::put('id_usuario', $result->id_usuario);
            return Redirect::to('/dashboard-user');
            
        }else{
            Session::put('messege', 'Contraseña o email incorrectos, verifique'); 
            return Redirect::to('/login-user');
        }
    }
    
    public function user_logout(){
      Session::flush();
      return Redirect::to('/');
    }

    
     public function update_user_profile(Request $request, $id_usuario){      
        $data=usuario::where('id_usuario',$id_usuario)->first();
        $data->nombre=$request->nombre;
        $data->ap_paterno=$request->ap_paterno;
        $data->ap_materno=$request->ap_materno;
        $data->fecha_nac=$request->fecha_nac; 
        $data->calle=$request->calle;
        $data->colonia=$request->colonia;
        $data->cp=$request->cp; 
        $data->ciudad=$request->ciudad;
        $data->estado=$request->estado; 
        $data->telefono=$request->telefono;
        $data->grado_estudios=$request->grado_estudios;
        $data->email=$request->email; 
                    
        $data->save();

        //Session::put('message', 'Datos actualizados correctamente. ');
        return Redirect::to('/dashboard-user');    
    }
    
    
    public function AdminAuthCheck(){
    $id_usuario=Session::get('id_usuario');
    if($id_usuario){
        return;
    }else {
        return Redirect::to('/login-user')->send();
    }    
    }

    public function registro(){
        return view('registro');
    }
}