<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Exercise;

class ExerciseTest extends TestCase
{
//     use RefreshDatabase, WithFaker;

//     /**
//      * Test that a user can create a new exercise.
//      *
//      * @return void
//      */
//     public function test_a_user_can_create_a_new_exercise()
//     {
//         // Create a new user
//         $user = User::factory()->create();

//         // Send a POST request to create a new exercise
//         $response = $this->actingAs($user)->post('/exercises', [
//             'name' => 'Squats',
//             'description' => 'Stand with your feet shoulder-width apart and squat down as low as you can go, keeping your back straight.',
//             'muscle_groups' => ['legs', 'glutes'],
//         ]);

//         // Check that the exercise was successfully created
//         $response->assertStatus(302);
//         $this->assertDatabaseHas('exercises', [
//             'name' => 'Squats',
//             'description' => 'Stand with your feet shoulder-width apart and squat down as low as you can go, keeping your back straight.',
//         ]);
//     }

//     /**
//      * Test that validation rules are enforced when creating a new exercise.
//      *
//      * @return void
//      */
//     public function test_validation_rules_are_enforced_when_creating_a_new_exercise()
//     {
//         // Create a new user
//         $user = User::factory()->create();

//         // Send a POST request to create a new exercise with invalid data
//         $response = $this->actingAs($user)->post('/exercises', [
//             'name' => '',
//             'description' => '',
//             'muscle_groups' => [],
//         ]);

//         // Check that the validation errors are displayed
//         $response->assertStatus(302);
//         $response->assertSessionHasErrors(['name', 'description', 'muscle_groups']);
//     }

//     /**
//      * Test that a user can view a list of their exercises.
//      *
//      * @return void
//      */
//     public function test_a_user_can_view_a_list_of_their_exercises()
//     {
//         // Create a new user
//         $user = User::factory()->create();

//         // Create some exercises for the user
//         Exercise::factory()->count(3)->create([
//             'user_id' => $user->id,
//         ]);

//         // Send a GET request to view the user's exercises
//         $response = $this->actingAs($user)->get('/exercises');

//         // Check that the user's exercises are displayed
//         $response->assertStatus(200);
//         $response->assertSee('My Exercises');
//         $response->assertSee('Squats');
//         $response->assertSee('Lunges');
//         $response->assertSee('Push-ups');
//     }
}
