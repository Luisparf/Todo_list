<?php

namespace Database\Factories;

use App\TaskList;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Faker\Generator as Faker;


class TaskListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */  
    protected $model = TaskList::class;
    /**
     * Define the model's default state.  
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function() {
               // return factory(App\User::class)->create()->id;
                return \App\User::factory()->create()->id; // pode dar zica
              },
              'title' => $this->faker->name,
              'status' => 0,
        ];
    }
}

/*

$factory->define(TaskList::class, function (Faker $faker) {
  return [
    ‘user_id’ => function () {
      return factory(App\User::class)->create()->id;
    },
    ‘title’ => $faker->name,
    ‘status’ => 0,
  ];
}); */