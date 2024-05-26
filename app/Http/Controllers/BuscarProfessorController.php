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
    private $userPrime;

    public function __construct()
    {
        $this->userPrime = new Userprime();
    }

    public function showFormBuscarProfessor(Request $request){

        $buscarProfessor=new BuscarProfessores();
        $dados = $buscarProfessor->Buscar();

        $idUser=Auth::user()->id;
        $prime = $this->userPrime->userIsPrime($idUser);

        return Inertia::render('BuscarProfessor',[
        "profs"=>$dados ,'nomeUser'=>Auth()->user()->name,
        'emailUser'=>Auth()->user()->email,
        'userPrime'=>$prime
    
    ]);
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

        if($user->QtsReq >5 && ($isUserPrime == "userNuncaFoiPrime" || $isUserPrime == "canceled")){

            return Inertia::render('UserSemAcesso',[
                'difHoras'=>$difHoras,
            ]);

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
        $file_urls= $s3->getUrl($inst,$dados['nomeProfessor'],"2022_2_v.png");

        
        $prime = $this->userPrime->userIsPrime($user_id);

        $user = $buscarProfessor->BuscarUserQueFezComentarioPorID($ids);

        return Inertia::render('InfoDoProfessor',[
            'comentarios'=>$comentarios,
            'notas'=>$notas,
            'user'=>$user,
            'nomeProfessor'=>$dados['nomeProfessor'],
            'instituto'=>strtolower($dados['instituto']),
            'file_urls'=>$file_urls,
            'nomeUser'=>Auth()->user()->name,
            'emailUser'=>Auth()->user()->email,
            'userPrime'=>$prime,
        ]);



    }
}