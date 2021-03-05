<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'irineo antonio calderón aguilar',
            'email' => 'irineo.aguilar92@gmail.com',
            'password' => bcrypt(123)
        ]);

        \App\Models\Post::factory()->count(12)->create();
    }
}
