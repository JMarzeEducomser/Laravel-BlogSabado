<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Nombre de la tabla
    protected $table = 'tags';

    // Array de campos para llenar el obj. de forma masiva
    protected $fillable = ['nombre'];

    // No timestamps
    public $timestamps = false;

    // Relationships (N:N) -> N
    public function posts(){
        return $this->belongsToMany('App\Post', 'post_tag', 'tag_id', 'post_codigo');
    }
}
