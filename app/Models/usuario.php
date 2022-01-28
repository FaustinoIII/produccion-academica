<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class usuario extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'id_usuario',
        'nombre',
        'ap_paterno',
        'ap_materno',
        'email',
        'password',
        'tipo_usuario',
        'fecha_nac',
        'calle',
        'colonia',
        'cp',
        'ciudad',
        'estado',
        'telefono',
        'grado_estudios',
        'created_at'
    ];

    public function edit($id)
    {
        $usuario = usuario::find($id);
        return $usuario;
    }
}
