<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamacaos extends Model
{
    protected $table = 'reclamacaos';
    public $timestamps = false;
    use HasFactory;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];
}
