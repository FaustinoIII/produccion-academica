<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\articulo;
use App\Models\autores;

session_start();

class ArticulosController extends Controller
{
    public function index_art(){
        $this->AdminAuthCheck();
        return view('registrar_art');
    }

    public function AdminAuthCheck(){
        $id_usuario=Session::get('id_usuario');
        if($id_usuario){
            return;
        }else {
            Session::flush();
            return Redirect::to('/login-user')->send();
        }    
    
    }

    public function index_mongo(){
        //$this->AdminAuthCheck();
        return view('registrar_art');
    }
    
    public function insertar_mongo(Request $request){
        $result = autores::max('id_autores');
        $id_aux = intval($result);
        $id_aux++;

        $autores = new autores();
        $autores->id_autores=strval($id_aux);
        $autores->autor1=$request->autor1;
        $autores->autor2=$request->autor2;
        $autores->autor3=$request->autor3;
        $autores->autor4=$request->autor4;
        $autores->save();

        $result = articulo::max('id_articulo');
        $id_aux2 = intval($result);
        $id_aux2++;

        $articulo = new articulo();
        $articulo->id_articulo=strval($id_aux2);
        $articulo->titulo=$request->titulo;
        $articulo->abstract=$request->abstract;
        $articulo->revista=$request->revista;
        $articulo->autores=strval($id_aux);            
        $articulo->url=$request->url;
        $articulo->tipo_art=$request->tipo_art;  
        
        $pdf=array();
        $pdf=$request->file('pdf');
        $pdf_name=$pdf->getClientOriginalName();
        $upload_path='articulos/';
        $pdf_url=$upload_path.$pdf_name;
        $success=$pdf->move($upload_path,$pdf_name);
        if($success){
            $articulo->pdf=$pdf_url;                
            $articulo->save();
            Session::put('message', 'Has agregado un nuevo articulo ');
            return Redirect::to('/add-article');    
        }else{
            Session::put('message', 'Error al registrar articulo ');
            return Redirect::to('/add-article'); 
        } 

    }

    public function buscar($tipo, $contenido){
        if($tipo=='1'){
            $articulos = articulo::where('titulo', 'like', '%'.$contenido.'%')->get();
            return view('home',compact('articulos'));
        }elseif($tipo=='2'){
            $autores = autores::where('autor1', 'like', '%'.$contenido.'%')->get();
            $articulos = articulo::where('autores', $autores->id_autores)->get();
        }elseif($tipo=='3'){
            $articulos = articulo::where('revista', 'like', '%'.$contenido.'%')->get();
            return view('home',compact('articulos'));
        }elseif($tipo=='4'){
            $articulos = articulo::where('tipo_art', 'like', '%'.$contenido.'%')->get();
            return view('home',compact('articulos'));
        }
    }
    
    public function delete_articles($id){
       $this->AdminAuthCheck();
       articulo::where('id_articulo', $id)
                    ->delete();
        return Redirect::to('/admin_art');
    }

    public function descargar($id){
        $result = articulo::where('id_articulo', $id)
            ->first();
            $path = public_path(path:"\\".$result->pdf);
  
        return response()->download(file:$path);
    }
    
     public function update_project(Request $request, $proyecto_id){             
        $articulo=array();
            $articulo['nombre_proyecto']=$request->nombre_proyecto;
            $articulo['descripcion_proyecto']=$request->descripcion_proyecto;
            $articulo['presupuesto_proyecto']=$request->presupuesto_proyecto;            
            $articulo['fecha_iniciacion_proyecto']=$request->fecha_iniciacion_proyecto;
            $articulo['fecha_terminacion_proyecto']=$request->fecha_terminacion_proyecto;
            $articulo['status_proyecto']=$request->status_proyecto;

        DB::table('tbl_proyecto')
            ->where('proyecto_id', $proyecto_id)
            ->update($articulo);
        
        Session::put('message', 'Datos del proyecto actualizados ');
        return Redirect::to('/all-project');
    }
    
}
