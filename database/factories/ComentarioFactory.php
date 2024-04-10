<?php
namespace Database\Factories;

// Factory para a tabela 'comentarios'
use App\Models\Comentario;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{
    protected $model = Comentario::class;

    public function definition()
    {
        return [
            'comentario' => $this->faker->paragraph,
            'nomeProfessor' => $this->faker->name,
            'instProfessor' => $this->faker->company,
            'puplicavel' => $this->faker->boolean,
            'criadoBY' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
