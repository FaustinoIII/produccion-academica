<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
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
    
    public function save_articles(Request $request){
     $autores=array();
        $autores['autor1']=$request->autor1;
        $autores['autor2']=$request->autor2;
        $autores['autor3']=$request->autor3;
        $autores['autor4']=$request->autor4;
        DB::table('autores')->insert($autores);
        $result=DB::selectOne('select MAX(id_autores) as id_autores from autores');

     $articulo=array();
        $articulo['titulo']=$request->titulo;
        $articulo['abstract']=$request->abstract;
        $articulo['revista']=$request->revista;
        $articulo['autores']=strval($result->id_autores);            
        $articulo['url']=$request->url;
        $articulo['tipo']=$request->tipo_art;      
        
        
     $pdf=array();
        $pdf=$request->file('pdf');
        $pdf_name=$pdf->getClientOriginalName();
        $ext=strtolower($pdf->getClientOriginalExtension());
        $pdf_full_name=$pdf_name;
        $upload_path='articulos/';
        $pdf_url=$upload_path.$pdf_full_name;
        $success=$pdf->move($upload_path,$pdf_full_name);
        if($success){
            $articulo['pdf']=$pdf_url;                
            DB::table('articulos')
                ->insert($articulo);
            Session::put('message', 'Has agregado un nuevo articulo ');
            return Redirect::to('/add-article');    
        }else{
            Session::put('message', 'Error al registrar articulo ');
            return Redirect::to('/add-article'); 
        }      
       
    }
    
        public function all_project(){
        $this->AdminAuthCheck();
        $empresa_id=Session::get('empresa_id');
        $all_project_info=DB::table('tbl_proyecto')
               ->where('empresa_id', $empresa_id)
               ->get();     
        $manage_project=view('empresa.all_project')
            ->with('all_project_info', $all_project_info);
        return view('adminEmpresa_layout')
            ->with('empresa.all_project', $manage_project);
                
    }
    
    public function delete_articles($id){
       $this->AdminAuthCheck();
       DB::table('articulos')
                    ->where('id_articulo', $id)
                    ->delete();
        return Redirect::to('/admin_art');
    }
    
    public function unactive_project($proyecto_id){
        DB::table('tbl_proyecto')
            ->where('proyecto_id', $proyecto_id)
            ->update(['status_proyecto'=>0]);
            Session::put('message', 'El proyecto ha sido activado ');
            return Redirect::to('/all-project');
    }
    
    public function active_project($proyecto_id){
        DB::table('tbl_proyecto')
            ->where('proyecto_id', $proyecto_id)
            ->update(['status_proyecto'=>1]);
            Session::put('message', 'El proyecto ha sido desactivado ');
            return Redirect::to('/all-project');
    }

    public function descargar($id){
        $result = DB::table('articulos')
            ->where('id_articulo', $id)
            ->first();
            $path = public_path(path:"\\".$result->pdf);
  
        return response()->download(file:$path);
    }
    
     public function edit_project($proyecto_id){      
        $project_info=DB::table('tbl_proyecto')
                    ->where('proyecto_id', $proyecto_id)
                    ->first();
        $project_info=view('empresa.edit_project')
            ->with('project_info', $project_info);
        return view('adminEmpresa_layout')
            ->with('empresa.edit_project', $project_info);
                
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
