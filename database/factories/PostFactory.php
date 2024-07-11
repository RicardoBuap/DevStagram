<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(5),
            'descripcion' => $this->faker->sentence(20),
            'imagen' => $this->faker->uuid() . '.jpg',
            'user_id' => $this->faker->randomElement([1,2,3])
        ];

        //Pruebas de testing
        //tinker CLI de Laravel para consultar a la base de datos
        //php artisan tinker
        //$usuario = User::find(3);
        //Mandando a llamar al factory
        //App\Models\Post::factory()->times(200)->create();
        //php artisan migrate:rollback --step=1
        //php artisan migrate
    }
}
