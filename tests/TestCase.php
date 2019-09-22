<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        TestResponse::macro('data', function ($key) {
            if (! isset($this->original->getData()[$key])) {
                throw new \Exception($key . ' does not exist on the resposnse data');
            }

            return data_get($this->original->getData(), $key);
        });
    }

    public function signIn()
    {
        $this->user = factory(User::class)->create();
        return $this->actingAs($this->user);
    }
}
