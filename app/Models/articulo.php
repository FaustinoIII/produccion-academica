<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Models\tipo_articulo;
use App\Models\autores;

class articulo extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'articulos';
    protected $primaryKey = 'id_articulo';

    protected $fillable = [
        'created_at', 'titulo','abstract','revista','autores','url','pdf','tipo_art'
    ];

    public function getAutores($articulo){
        $autores=autores::where('id_autores', $articulo)
        ->first();
        return $autores;
    }

    public function getTipo($articulo){
        $tipo=tipo_art::where('id_tipo', $articulo)
        ->first();
        return $tipo->nombre;
    }
}
