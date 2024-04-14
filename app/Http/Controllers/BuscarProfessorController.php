<?php

namespace App\Http\Controllers;

use App\Http\Helpers\BuscarProfessores;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class BuscarProfessorController extends Controller{

    public function showFormBuscarProfessor(Request $request){
        $buscarProfessor=new BuscarProfessores();
        $dados = $buscarProfessor->Buscar();
        return Inertia::render('BuscarProfessor',["profs"=>$dados]);
    }


    public function BucarInformacaoProfessor(Request $request){
        $dados = $request->all();
        $validar = Validator::make($request->all(),

        [
            'nomeProfessor'=> 'required|string',
            'instituto' => 'required|string',
        ]);
 
        if($validar->fails()){
         return "erro , corpo invalido";
        }

        $buscarProfessor= new BuscarProfessores();
        $comentarios = $buscarProfessor->BuscarComentarios($dados['nomeProfessor'],$dados['instituto']);
        $notas = $buscarProfessor->BuscarNota($dados['nomeProfessor'],$dados['instituto']);

        return Inertia::render('InfoDoProfessor',[
            'comentarios'=>$comentarios,
            'notas'=>$notas
        ]);



    }
}