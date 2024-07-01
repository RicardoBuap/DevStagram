<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, User $user, Post $post)
    {
        dd($post);
        //validar
        $request -> validate([
            'comentario' => 'required|max:255',
            ]);
    }
}
