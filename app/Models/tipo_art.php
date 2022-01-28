<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class tipo_art extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'tipo_articulos';
    protected $primaryKey = 'id_tipo';

    protected $fillable = [
        'id_tipo', 'nombre'
    ];
}
