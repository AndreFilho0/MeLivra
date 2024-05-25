<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Storage;

class StorageS3 {


    public function getUrl($inst,$nomeArquivo,$semestre){

        
        $file="turmas/".$inst."/".$nomeArquivo.$semestre;
        $urls = Storage::disk('s3')->temporaryUrl(
            $file,
            now()->addMinutes(5),
            ['ResponseContentDisposition' => 'attachment']
        );
        dd($urls);
        return Storage::disk('s3')->temporaryUrl(
            $file,
            now()->addMinutes(5),
            ['ResponseContentDisposition' => 'attachment']
        );

    }
}