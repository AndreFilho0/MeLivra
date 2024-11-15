<?php

namespace App\Http\Helpers;

use App\Models\Comentario;
use App\Models\Professor;
use App\Models\User;

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
    public function BuscarMaiorNota(){
        return Professor::orderBy('Nota', 'desc')->first();

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