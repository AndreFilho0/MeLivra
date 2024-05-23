<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SubscribeController extends Controller{
   public function subscribeUser(){
      
    /** @var User $user */
     $user = Auth()->user();

     if($user->stripe_id){
      return $user->newSubscription('default','price_1P9cr9RtWrjF1Ok8uRT7ojyB')
     ->checkout()->redirect();

     }
     
     $user->createAsStripeCustomer();
     return $user->newSubscription('default','price_1P9cr9RtWrjF1Ok8uRT7ojyB')
     ->checkout()->redirect();
      


   }

   public function unsubscribeUser(){

      /** @var User $user */
     $user = Auth()->user();
     

     $unsubscriebe = $user->subscription('default');
   
     if ($unsubscriebe->stripe_status=='active') {
      $unsubscriebe->cancelNow();
      return Inertia::render('Unsubscribe', [
        'messagem'=>'Assinatura cancelada com sucesso.',
      ]);
  } else {
       return Inertia::render('Unsubscribe', [
        'messagem'=>'Nem uma assinatura foi encontrada',
      ]);
  }

   }
}