<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Muestra el formulario para crear un nuevo usuario.
     */
    public function create()
    {
        // Retorna la vista de alta de usuario (debes crearla en resources/views/users/create.blade.php)
        return view('users.create');
    }
}
