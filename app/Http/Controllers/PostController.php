<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
// Definimos el Request de validaciones para Post
use App\Http\Requests\PostRequest;

// Modelos a utilizar en el controlador
use App\Post;
use App\Categoria;
use App\Tag;

// Librería de Php para fechas y horas
use Carbon\Carbon;

class PostController extends Controller
{
    public function __construct(){
        Carbon::setLocale('es');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(5);
        return view('post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        $tags = Tag::orderBy('nombre', 'ASC')->lists('nombre', 'id');
        return view('post.create')->with('categorias', $categorias)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post($request->all()); // fillable[]
        $post->save();
        // Añade Tags
        foreach($request['tags'] as $tag){
            $post->tags()->attach($tag);
        }

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('post.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categorias = Categoria::orderBy('nombre', 'asc')->lists('nombre', 'id');
        $tags = Tag::orderBy('nombre', 'ASC')->lists('nombre', 'id');

        return view('post.edit')->with('post', $post)->with('categorias', $categorias)->with('tags', $tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->fill($request->all());
        $post->update();

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('post.index');
    }
}
