<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Eliminación de bajo nivel (1)
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    // Eliminación de bajo nivel (2)
    use SoftDeletes;

    protected $table = 'posts';

    // Cambiamos el primary key
    protected $primaryKey = 'codigo';

    // Cambiamos el Auto increment
    public $incrementing = false;

    protected $fillable = ['codigo', 'titulo', 'contenido', 'publicado', 'categoria_id'];

    // Relationships (1:N) -> 1
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }

    // (N:N) -> N
    public function tags(){
        return $this->belongsToMany('App\Tag', 'post_tag', 'post_codigo', 'tag_id');
    }
}
