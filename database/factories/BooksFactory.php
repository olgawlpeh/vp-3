<?php

//namespace Database\Factories;
//
//use App\Models\Book;
//use Illuminate\Database\Eloquent\Factories\Factory;
//use Faker\Generator as Faker;
//use Illuminate\Support\Str;
//
//
//class BooksFactory extends Factory
//{
//    /**
//     * The name of the factory's corresponding model.
//     *
//     * @var string
//     */
//    protected $model = Book::class;
//
//
//    /**
//     * Define the model's default state.
//     *
//     * @return array
//     */
//    public function definition()
//    {
//        return [
//            'name' => $this->faker->name(),
//            'price' => mt_rand(100, 1000),
//
//        ];
//    }

//    /**
//     * Indicate that the model's email address should be unverified.
//     *
//     * @return \Illuminate\Database\Eloquent\Factories\Factory
//     */
//    public function unverified()
//    {
//        return $this->state(function (array $attributes) {
//            return [
//                'email_verified_at' => null,
//            ];
//        });
//    }
//}
