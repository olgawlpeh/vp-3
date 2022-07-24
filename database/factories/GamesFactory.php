<?php

namespace Database\Factories;


use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class GamesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return array(
            'title' => $this->faker->word,
            'description' => $this->faker->text,
            'category_id' => mt_rand(1,5),
            'price' => mt_rand(100, 1000),

        );
    }

}

