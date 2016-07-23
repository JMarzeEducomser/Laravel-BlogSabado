<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // Nombre de la tabla
    protected $table = 'categorias';

    // Array de campos para llenar el obj. de forma masiva
    protected $fillable = ['nombre'];

    // No timestamps
    public $timestamps = false;

    // Relationships (1:N) -> N
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
