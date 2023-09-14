<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            ExerciseTableSeeder::class,
            // WorkoutTableSeeder::class,
            // CalorieTableSeeder::class,
            // WeightTableSeeder::class,
            // UserTableSeeder::class,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Tester',
            'email' => 'rpgames2@live.com',
            'password' => Hash::make('A'),
        ]);
        
    }
}
