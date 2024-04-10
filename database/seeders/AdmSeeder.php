<?php

namespace Database\Seeders;

use App\Models\Comentario;
use App\Models\Estatisticaturma;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdmSeeder extends Seeder{

  public function run(): void{

    User::factory()->create([
     'name'=>'adm',
     'email'=>'filhoandre534@gmail.com',
     'password'=>Hash::make('12345678'),
     'isAdm'=>1
    ]);

    Comentario::factory()->create(); 


    EstatisticaTurma::factory()->create(); 
  }

}