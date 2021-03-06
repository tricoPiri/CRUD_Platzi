<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    public function posts()
    {
        //Post::load('users')->latest()->paginate() se utiliza cuando tenemos la relacion en la BD
        //dd(Post::with('user')->latest()->paginate());
        return view('posts', [
            'posts' => Post::with('user')->latest()->paginate()
        ]);
    }

    //$post se tiene que llamar igual el $post que recibimos como parametro a como lo mandamos por la ruta {$post} si no, no funciona
    public function post(Post $post)
    {
        return view('post', ['post' => $post]);
    }
}
