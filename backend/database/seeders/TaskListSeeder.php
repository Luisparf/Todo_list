<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory('App\TaskList')->create();
        \App\TaskList::factory()->create();
    }
}
