<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
    /** @test */
    public function it_should_register_a_new_user()
    {
        $response = $this->post(route('register'), [
            'name' => 'Luis Dalmolin',
            'email' => 'luis.nh@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect(route('home'));

        $user = User::where('email', 'luis.nh@gmail.com')->first();
        $this->assertEquals('Luis Dalmolin', $user->name);
        $this->assertTrue(Hash::check('password', $user->password));
    }
}
