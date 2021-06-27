<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Carbon\Carbon;
class RegisterTest extends TestCase
{
    /** @test */
    public function can_register()
    {
        $this->postJson('/api/register', [
            'name' => 'Test User',
            'email' => 'test@test.app',
            'password'  =>  'testing',
            'password_confirmation' => 'testing',

            'last_name' => "Test",
            'whatsapp'  => "Test",
            'birthday'  => Carbon::parse('02-10-1998'),
            'facebook_id'  => null,
            'google_id' => null,
            'country'   => "Test",
            'address'   => "Test",
            'about_me'  => "Test",
            'my_carrer'  => "Test",
            'is_active' => true
        ])
            ->assertSuccessful()
            ->assertJsonStructure(['id', 'name', 'email']);
    }

    /** @test */
    public function can_not_register_with_existing_email()
    {
        User::factory()->create(['email' => 'test@test.app']);

        $this->postJson('/api/register', [
            'name' => 'Test User',
            'email' => 'test@test.app',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }
}
