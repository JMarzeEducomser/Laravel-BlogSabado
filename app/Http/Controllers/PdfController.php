<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class PdfController extends Controller
{
    public function reporte($codigoPost){
        $post = Post::find($codigoPost);

        $view = \View::make('pdf.reporte', compact('post'))->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->download('Post_'.$post->codigo.'.pdf');
    }
}
