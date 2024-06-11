<?php

namespace Tests\Feature\BuscarProfessor;

use App\Http\Controllers\SubscribeController;
use App\Http\Helpers\BuscarProfessores;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;


class BuscarProfessorControllerTest extends TestCase
{
    public function test_if_redirect_for_form_of_sarch_to_buscarProfessorEstaOk(){

         
         $user = User::factory()->create();
         $this->actingAs($user);
  
         $response = $this->get('/dashboard/buscarprofessor');

         $buscarProfessor=new BuscarProfessores();
         $dados = $buscarProfessor->Buscar();
 
         $response->assertStatus(200);
         $this->assertNotEmpty($dados);

        
        
    }


    public function test_CheckIfFailWhenBodyWasSentWrong(){

        $user = User::factory()->create();
         $this->actingAs($user);

         $response = $this->get('/dashboard/procuraInfo?nomeProfessor=teste');
         $esperado = "erro , corpo invalido";

         $this->assertEquals($esperado,$response->getContent());


    }


    public function test_IfUserEspendAllQuerysInThisMomenteHeMustRedirectForUserSemAcesso(){

        $user = User::factory()->create();
         $this->actingAs($user);

         $user->QtsReq = "6";
         $user->save();

         $response = $this->get('/dashboard/procuraInfo?nomeProfessor=teste&instituto=IME');

         $response->assertInertia(function (Assert $page) {
            // Verifica se a página tem o componente correto
            $page->component('UserSemAcesso');
        
            // Verifica se a página tem os dados esperados
            $page->has('difHoras');
        });


    }
   



    
    

}
