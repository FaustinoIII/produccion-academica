<?php

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class autores extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'autores';
    protected $table = 'autores';
    protected $primaryKey = 'id_autores';

    protected $fillable = [
        'id_autores','autor1','autor2','autor3','autor4','created_at'
    ];
}
