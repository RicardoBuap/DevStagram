<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller{

    public function index () {
        return view('auth.register');
    }

    public function store (Request $request) {

        // dd($request->get('username'));
        // dd($request);
        //Validación

        $request -> validate([
            'name' => 'required'
        ]);


    }
}
