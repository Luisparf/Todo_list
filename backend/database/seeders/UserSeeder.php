<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory('App\User')->create();
        \App\Models\User::factory()->create();
    }
}
