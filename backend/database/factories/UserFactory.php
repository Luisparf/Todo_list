<?php


namespace Database\Factories;

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('12345'), // password
           
        ];
    }
}

// $factory->define(User::class, function (Faker $faker) {
   // return [
     //   'name' => $faker->name,
       // 'email' => $faker->unique()->safeEmail,
        //'password' => Hash::make('12345') // password
    //];
//});