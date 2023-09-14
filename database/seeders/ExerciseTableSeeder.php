<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $csvFile = fopen(database_path('seeds/exercises.csv'), 'r');
        while (($data = fgetcsv($csvFile)) !== FALSE) {
            DB::table('exercises')->insert([
                'name' => $data[0],
                'description' => $data[1],
                'equipment' => $data[2],
                'created_at' => now(),
                'updated_at' => now(),
                'difficulty' => $data[3],
                'muscle_group' => $data[4],
                'calories_burned' => $data[5],
                'benefits' => $data[6],
                'precautions' => $data[7],
                'category' => $data[8],
            ]);
        }
        fclose($csvFile);
        // DB::table('exercises')->insert([
        //     'name' => 'Push-ups',
        //     'description' => 'Start in a plank position, lower your body to the ground, then push up',
        //     'equipment' => 'None',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        //     'difficulty' => 'Medium',
        //     'muscle_group' => 'Chest',
        //     'calories_burned' => '20-30',
        //     'benefits' => 'Builds upper body strength and improves posture',
        //     'precautions' => 'Keep your core tight to avoid lower back pain',
        //     'category' => 'Strength Training',

        // ]);
    }
}
