<?php

namespace App\Http\Helpers;

use App\Models\User;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class StorageS3 {


    public function getUrl($inst,$nomeArquivo,$semestre){
        $idUser = Auth()->user()->id;
        date_default_timezone_set('America/Sao_Paulo');
     

        $dataRedisFiles = Redis::get($inst.$idUser);
        $dataRedisNames = Redis::get($nomeArquivo.$idUser);
        $dataRedisUrls = Redis::get("urls".$inst.$nomeArquivo.$idUser);

       // dd($dataRedisFiles,$dataRedisNames,$dataRedisUrls);



        

        if($dataRedisUrls){
            $urls = json_decode($dataRedisUrls);
            return $urls;
        }

        if($dataRedisFiles && $dataRedisNames){

            $filesProfessor = json_decode($dataRedisNames);
            $urls = [];

            foreach($filesProfessor as $file){

                $url = Storage::disk('s3')->temporaryUrl(
                    $file,
                    now()->addMinutes(5),
                    ['ResponseContentDisposition' => 'attachment']
                );

            

                array_push($urls,$url);
                

            }
            Redis::setex("urls".$inst.$nomeArquivo.$idUser,300,json_encode($urls));

            

            return $urls;
        }

        if($dataRedisFiles){
            $files = json_decode($dataRedisFiles);
            $filesJSON = json_encode($files);

            foreach ($files as $file) {
                //verifica se o nome do arquivo existe para depois colocar se existe dentro do array
                if (strpos($file, $nomeArquivo) !== false) {
                    
                    $matchedFiles[] = $file;
                }
            }
                $urls = [];
                foreach($matchedFiles as $file){
                $url = Storage::disk('s3')->temporaryUrl(
                    $file,
                    now()->addMinutes(5),
                    ['ResponseContentDisposition' => 'attachment']
                );
                array_push($urls,$url);
    
                }
            Redis::setex("urls".$inst.$nomeArquivo.$idUser,300,json_encode($urls));
            Redis::setex($nomeArquivo.$idUser,600,json_encode($matchedFiles));
            
            return $urls;

        }

        
        
      //  dd($dataRedisFiles,$dataRedisNames,$dataRedisUrls);

        
        
                
        $directory = "turmas/".$inst."/";

        
        $files = Storage::disk('s3')->files($directory);
        $filesJSON = json_encode($files);

        $matchedFiles = [];
        foreach ($files as $file) {
            //verifica se o nome do arquivo existe para depois colocar se existe dentro do array
            if (strpos($file, $nomeArquivo) !== false) {
                
                $matchedFiles [] = $file;
            }
        }
            $urls = [];

            
            if(!$matchedFiles){
                return [];

            }
            foreach($matchedFiles as $file){
            $url = Storage::disk('s3')->temporaryUrl(
                $file,
                now()->addMinutes(5),
                ['ResponseContentDisposition' => 'attachment']
            );
            array_push($urls,$url);

            }
        Redis::setex("urls".$inst.$nomeArquivo.$idUser,300,json_encode($urls));
        Redis::setex($inst.$idUser,600,$filesJSON);
        Redis::setex($nomeArquivo.$idUser,600,json_encode($matchedFiles));

        
        
        return $urls;

    }
}