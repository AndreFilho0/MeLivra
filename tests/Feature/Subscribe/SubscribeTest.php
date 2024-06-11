<?php

namespace Tests\Feature\Auth;

use App\Http\Controllers\SubscribeController;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubscribeTest extends TestCase
{
    public function test_if_user_have_stripe_id_redirect_for_subscribe(){

         
         $user = User::factory()->create();
         $this->actingAs($user);
 
         
         $user->stripe_id = 'cus_QG72mjQnGK9HlB';
         $user->save();
 
         
         $response = $this->get('/subscribe');
 
         
         $response->assertRedirect();

        
        
    }
    public function test_if_user_no_have_stripe_id_redirect_for_subscribe(){

         
        $user = User::factory()->create();
        $this->actingAs($user);

        
        $response = $this->get('/subscribe');

        
        $response->assertRedirect();

        $this->assertNotNull($user->fresh()->stripe_id);

       
       
   }



  /* public function test_user_can_unsubscribe_standing_active(){
        
       



   }*/
    
    

}
