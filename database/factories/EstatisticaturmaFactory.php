<?php

namespace Database\Factories;

use App\Models\EstatisticaTurma;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class EstatisticaturmaFactory extends Factory
{
    protected $model = EstatisticaTurma::class;

    public function definition()
    {
        
        return [
            'nomeProfessor' => $this->faker->name,
            'instProfessor' => $this->faker->company,
            'forGivinThis' => $this->faker->sentence,
            'semestre' => $this->faker->word,
            'base64_image' =>0,
            'criadoBY' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}