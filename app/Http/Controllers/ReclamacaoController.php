<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Userprime;
use App\Models\Reclamacaos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class ReclamacaoController{

    private $userPrime;

    public function __construct()
    {
        $this->userPrime = new Userprime();
    }


    public function index(){
        $idUser=Auth::user()->id;
       $prime = $this->userPrime->userIsPrime($idUser);

        return Inertia::render('Reclamacao',[
            'nomeUser'=>Auth()->user()->name,
            'emailUser'=>Auth()->user()->email,
            'userPrime'=>$prime,

        ]);
    }

    public function addReclamacao(Request $request){
        $dados = $request->all();


        
        $validar = Validator::make($request->all(),

        [
            'reclamacao'=> 'required|string|max:1000',
        ]);
        if($validar->fails()){
            return "erro , corpo invalido";
           }

        $userID = Auth::id();
        $userName = Auth::user()->name;

        $reclamacao = new Reclamacaos();

        $reclamacao->UserName = $userName;
        $reclamacao->UserID = $userID;
        $reclamacao->reclamacao = $dados['reclamacao'];
        $reclamacao->save();


        return;

    }



}