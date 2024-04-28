<?php
 

 namespace App\Http\Helpers;

use Illuminate\Support\Facades\DB;

 class Userprime {


    public function verificaSeUserIsPrime($user_id){

        $user= DB::table('subscriptions')->where('subscriptions.user_id',"=",$user_id)->first();
        
        
        if($user){
            return $user->stripe_status;
            

        }

        return "userNuncaFoiPrime";
    

    }


 }
