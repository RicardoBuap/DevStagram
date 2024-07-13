<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\User;

class PerfilController extends Controller
{
    public function index()
    {
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        // Modificar el Request
        $request->request->add(['username' => Str::slug($request->username)]);

        $request->validate([
            'username' => ['required', 'unique:users,username,'.auth()->user()->id, 'min:3', 'max:20',
            'not_in:twitter,Editar-Perfil,editar-perfil'],
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('mensaje', 'Contraseña Incorrecta');
        }

        if($request->imagen){
            $manager = new ImageManager(new Driver());

            $imagen = $request->file('imagen');

            //generar un id unico para las imagenes
            $nombreImagen = Str::uuid() . '.' . $imagen->extension();

            //guardar la imagen al servidor
            $imagenServidor = $manager->read($imagen);
            //agregamos efecto a la imagen con intervention
            $imagenServidor->scale(1000, 1000);
            // la unidad de mide en PX 1= 1pixiel

            //agregamos la imagen a la  carpeta en public donde se guardaran las imagenes
            $imagenesPath = public_path('perfiles') . '/' . $nombreImagen;
            //Una vez procesada la imagen entonces guardamos la imagen en la carpeta que creamos
            $imagenServidor->save($imagenesPath);
        }

        // Guardar cambios
        $usuario = User:: find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();

        // Redireccionar
        return redirect()->route('posts.index', $usuario->username);
    }
}
