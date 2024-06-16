<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class PostController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    public function index(User $user)
    {
        return view('layouts.dashboard',[
            'user' => $user
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
            ]);
    }
}
