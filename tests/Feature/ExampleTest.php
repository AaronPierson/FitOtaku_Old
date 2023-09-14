<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_to_about_page()
    {
        $response = $this->get('/About');
        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_to_privacy_page()
    {
        $response = $this->get('/Privacy');
        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_to_contact_page()
    {
        $response = $this->get('/Contact');
        $response->assertStatus(200);
    }

    public function test_the_application_returns_a_successful_response_to_login_page()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

}
