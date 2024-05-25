<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class BibliotecaDeAlexandriaController{


    public function index(){

        return Inertia::render('BibliotecaAlexandria');
    }

    public function instituto($instituto){

        return Inertia::render('BibliotecaAlexandriaInst');

        


    }
}