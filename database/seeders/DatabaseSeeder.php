<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(1)->create([
            "name" => "maginsuarez",
            "email" => "albertomaginsuarez@gmail.com",
            "password" => bcrypt("password")
        ]);
        Project::factory()->times(40)->create();
    }
}
