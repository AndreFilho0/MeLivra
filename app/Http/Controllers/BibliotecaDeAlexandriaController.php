<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class BibliotecaDeAlexandriaController{


    public function index(){

        return Inertia::render('BibliotecaAlexandria');
    }
}