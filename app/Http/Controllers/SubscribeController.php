<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

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
}