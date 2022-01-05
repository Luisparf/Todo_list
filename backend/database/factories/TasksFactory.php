<?php

namespace Database\Factories;

use App\Models\Tasks;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;


class TasksFactory extends Factory
{
    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */  
    protected $model = Tasks::class;
    /**
     * Define the model's default state.  
     *
     * @return array
     */
    public function definition()
    {
        $tasklist = \App\Models\TaskList::factory()->create();
    
        return [
            'user_id' => $tasklist['user_id'],
            'list_id' => $tasklist['id'],
            //'title' => $faker->name,
            'title' => $this->faker->name,
            'status' => 0,
        ];
    }
}

