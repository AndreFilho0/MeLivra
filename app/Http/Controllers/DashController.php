<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Userprime;
use App\Models\Comentario;
use App\Services\BuscarProfessores;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


class DashController extends Controller {


    public function dash(){

    $idUser=Auth::user()->id;
    $userPrime = new Userprime();
    $buscarProfessor = new BuscarProfessores();

    $prime = $userPrime->userIsPrime($idUser);
    $professor = $buscarProfessor->BuscarMaioresNota();
    $maiorNota =  $professor->toArray();
    $ultimoComent = Comentario::where('puplicavel', true)->latest('created_at')->first();
    $user = $ultimoComent 
        ? $buscarProfessor->BuscarUserQueFezComentarioPorID([$ultimoComent->criadoBY])
        : null;

    $notaComentario = [
        'user' => $user,
        'ultimoComent' => $ultimoComent,
    ];

     
    $ultimoComentario = $notaComentario;

   
    return Inertia::render('Dashboard',[
     'nomeUser'=>Auth()->user()->name,
     'emailUser'=>Auth()->user()->email,
     'userPrime'=>$prime,
     'professor'=>$maiorNota,
     'user'=>$ultimoComentario['user'],
     'comentario'=>$ultimoComentario['ultimoComent'],
    ]);

    }
}