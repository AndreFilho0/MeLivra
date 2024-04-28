<?php

namespace App\Http\Controllers;

use App\Http\Helpers\BuscarProfessores;
use App\Http\Helpers\StorageS3;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use App\Http\Helpers\Userprime;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use function Termwind\render;

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

        

        $horaatual = Carbon::now()->subHours(3);
         /** @var User $user */
        $user = Auth()->user();
        $dataDaUltimaReq =Carbon::parse($user->dataultimareq);
        $difHoras = $dataDaUltimaReq->diffInHours($horaatual);

        //ver se esse usuario e prime
        $user_id=$user->id;
        $userprime = new Userprime();
       $isUserPrime = $userprime->verificaSeUserIsPrime($user_id);

       if($user->QtsReq >5 && $isUserPrime == "active"){
        $user->QtsReq = 0;
        $user->dataultimareq = $horaatual;
        $user->save();
       }
        
        if($user->QtsReq >5 && ($isUserPrime == "userNuncaFoiPrime" || $isUserPrime == "canceled")){

            return Inertia::render('UserSemAcesso',[
                'difHoras'=>$difHoras,
            ]);

        }
        if($user->QtsReq <=5 && ($isUserPrime == "userNuncaFoiPrime" || $isUserPrime == "canceled")){

        $user->QtsReq += 1;
        $user->dataultimareq = $horaatual;

        $user->save();
        }

       

        

        if($difHoras>=24 && ($isUserPrime == "userNuncaFoiPrime" || $isUserPrime == "canceled")){
            $user->QtsReq = 0;
            $user->dataultimareq = $horaatual;
            $user->save();
        }

        

       

        $buscarProfessor= new BuscarProfessores();
        $comentarios = $buscarProfessor->BuscarComentarios($dados['nomeProfessor'],$dados['instituto']);
        $notas = $buscarProfessor->BuscarNota($dados['nomeProfessor'],$dados['instituto']);
        $ids = [];
        foreach ($comentarios as $coment){
            $id = $coment->criadoBY;
            array_push($ids,$id);
        }
        $inst = strtolower($dados['instituto']);
        $s3 = new StorageS3();
        $file_url2022_2= $s3->getUrl($inst,$dados['nomeProfessor'],"2022_2_v.png");
        $file_url2023_1= $s3->getUrl($inst,$dados['nomeProfessor'],"2023_1_v.png");

         
        $user = $buscarProfessor->BuscarUserQueFezComentarioPorID($ids);

        return Inertia::render('InfoDoProfessor',[
            'comentarios'=>$comentarios,
            'notas'=>$notas,
            'user'=>$user,
            'nomeProfessor'=>$dados['nomeProfessor'],
            'instituto'=>strtolower($dados['instituto']),
            'file_url2022_2'=>$file_url2022_2,
            'file_url2023_1'=>$file_url2023_1,
        ]);



    }
}