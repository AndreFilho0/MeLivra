<?php

namespace App\Services;

use App\Models\Comentario;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BuscarProfessores{

    public function Buscar(){
        return Professor::get();
    }

    public function BuscarComentarios($nomeProfessor,$instituto){
        return Comentario::where('nomeProfessor',$nomeProfessor)
        ->where('instProfessor', $instituto)
        ->get();

    }
    public function BuscarNota($nomeProfessor,$instituto){
        return Professor::where('nomeProfessor',$nomeProfessor)
        ->where('instituto', $instituto)
        ->first();

    }
    public function BuscarMaioresNota(){

        return DB::select("SELECT nomeProfessor, instituto,  Nota, QtsAvalicao, (Nota / QtsAvalicao) AS mediaAvaliacao
            from professors
            WHERE QtsAvalicao > 0
            ORDER BY mediaAvaliacao DESC
            LIMIT 3");

    }
    public function BuscarUserQueFezComentarioPorID(array $ids){
        $user =[ ];
        foreach($ids as $id){
          $usertem=  User::where('id',$id)->first();
          array_push($user,$usertem);

        }
        
      return $user;

    }

    public function searchInstitutosOnly(){
         $Inst =[
            "CEPAE",
            "EA",
            "EECA",
            "EMC",
            "EMAC",
            "EVZ",
            "FACE",
            "FIC",
            "FAFIL",
            "FANUT",
            "FAV",
            "FCS",
            "FD",
            "FE",
            "FEFD",
            "FEN",
            "FF",
            "FH",
            "FL",
            "FM",
            "FO",
            "ICB",
            "IESA",
            "IF",
            "IME",
            "INF",
            "IPTSP",
            "IQ",
            "FCT"
        ];

        return $Inst;
    }
}