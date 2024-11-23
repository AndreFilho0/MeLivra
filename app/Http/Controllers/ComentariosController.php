<?php

namespace App\Http\Controllers;

use App\Services\BuscarProfessores;
use App\Http\Helpers\Userprime;
use App\Models\Comentario;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

use Inertia\Inertia;

class ComentariosController extends Controller{

    private $userPrime;

    public function __construct()
    {
        $this->userPrime = new Userprime();
    }

    public function AddComentario(Request $request){
        $dados = $request->all();

        
        $validar = Validator::make($request->all(),

        [
            'nomeProfessor'=> 'required|string',
            'instituto' => 'required|string',
            'comentario'=>'required|string'
        ]);
 
        if($validar->fails()){
         return "erro , corpo invalido";
        }
        $userID = Auth::id();

        $comentario = new Comentario();

        $comentario->comentario = $dados['comentario'];
        $comentario->nomeProfessor = $dados['nomeProfessor'];
        $comentario->instProfessor = $dados['instituto'];
        $comentario->criadoBY=$userID;

        $comentario->save();

        
        
       
        return;
        
        

    }

    public function showFormComentario(){

        $buscarProfessor=new BuscarProfessores();
        $dados = $buscarProfessor->Buscar();

        $idUser=Auth::user()->id;
       $prime = $this->userPrime->userIsPrime($idUser);

        
        return Inertia::render('DeixarComentario',[
            'profs'=>$dados ,
            'nomeUser'=>Auth()->user()->name,
            'emailUser'=>Auth()->user()->email,
            'userPrime'=>$prime,
         ]);

    }
    public function showFormDarNota(){

        $buscarProfessor=new BuscarProfessores();
        $dados = $buscarProfessor->Buscar();
        $idUser=Auth::user()->id;
        
       $prime = $this->userPrime->userIsPrime($idUser);
        return Inertia::render('DarNotaProfessor',[
            'profs'=>$dados,
            'nomeUser'=>Auth()->user()->name,
            'emailUser'=>Auth()->user()->email,
            'userPrime'=>$prime,
        ]);

    }

    public function AddNota(Request $request){
        $dados = $request->all();
        $validar = Validator::make($request->all(),

        [
            'nomeProfessor'=> 'required|string',
            'instituto' => 'required|string',
            'nota'=>'required|string'
        ]);
 
        if($validar->fails()){
         return "erro , corpo invalido";
        }

        $professor =  Professor::where('nomeProfessor',$dados['nomeProfessor'])->first();

        $avalicaoAntiga = $professor->QtsAvalicao;
        $NotaAntiga = $professor->Nota;
        
        if($dados['nota']==1){
            $QtsN1Antigo=$professor->QtsN1;
            $professor->QtsN1= $QtsN1Antigo+1;
        }
        if($dados['nota']==2){
            $QtsN1Antigo=$professor->QtsN2;
            $professor->QtsN2= $QtsN1Antigo+1;
        }
        if($dados['nota']==3){
            $QtsN1Antigo=$professor->QtsN3;
            $professor->QtsN3= $QtsN1Antigo+1;
        }
        if($dados['nota']==4){
            $QtsN1Antigo=$professor->QtsN4;
            $professor->QtsN4= $QtsN1Antigo+1;
        }
        if($dados['nota']==5){
            $QtsN1Antigo=$professor->QtsN5;
            $professor->QtsN5= $QtsN1Antigo+1;
        }
        if($dados['nota']==6){
            $QtsN1Antigo=$professor->QtsN6;
            $professor->QtsN6= $QtsN1Antigo+1;
        }
        if($dados['nota']==7){
            $QtsN1Antigo=$professor->QtsN7;
            $professor->QtsN7= $QtsN1Antigo+1;
        }
        if($dados['nota']==8){
            $QtsN1Antigo=$professor->QtsN8;
            $professor->QtsN8= $QtsN1Antigo+1;
        }
        if($dados['nota']==9){
            $QtsN1Antigo=$professor->QtsN9;
            $professor->QtsN9= $QtsN1Antigo+1;
        }
        if($dados['nota']==10){
            $QtsN1Antigo=$professor->QtsN10;
            $professor->QtsN10= $QtsN1Antigo+1;
        }
        
        $professor->QtsAvalicao =$avalicaoAntiga + 1;
        $professor->Nota = $NotaAntiga + $dados['nota'];
        $professor->save();

       


        return ;

    }

}