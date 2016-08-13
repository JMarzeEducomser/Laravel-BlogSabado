<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Eliminación de bajo nivel (1)
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

class Post extends Model
{
    // Eliminación de bajo nivel (2)
    use SoftDeletes;

    protected $table = 'posts';

    // Cambiamos el primary key
    protected $primaryKey = 'codigo';

    // Cambiamos el Auto increment
    public $incrementing = false;

    protected $fillable = ['codigo', 'titulo', 'contenido', 'publicado', 'categoria_id', 'imagen'];

    // Mutator
    //public function setAttribute(){}
    //public function getAttribute(){}
    public function setImagenAttribute($nombreImagen){
        $nuevoNombre = Carbon::now()->year . Carbon::now()->month . Carbon::now()->day . "-" . Carbon::now()->hour . Carbon::now()->minute . Carbon::now()->second . "." . $nombreImagen->getClientOriginalExtension();

        $this->attributes['imagen'] = $nuevoNombre;

        \Storage::disk('local')->put($nuevoNombre, \File::get($nombreImagen));
    }

    // Scopes
    //public function scope(){}
    public function scopeLikePost($query, $criterio){
        return $query->where('codigo', 'LIKE', "%$criterio%")->orWhere('titulo', 'LIKE', "%$criterio%");
    }

    // Relationships (1:N) -> 1
    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }

    // (N:N) -> N
    public function tags(){
        return $this->belongsToMany('App\Tag', 'post_tag', 'post_codigo', 'tag_id');
    }
}
