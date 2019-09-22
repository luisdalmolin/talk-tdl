<?php

namespace Tests;

use App\User;
use PHPUnit\Framework\Assert;
use Illuminate\Database\Eloquent\Collection;
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

        Collection::macro('assertContains', function ($model) {
            Assert::assertTrue($this->contains(function ($data) use ($model) {
                return $data instanceof Model
                    ? $data->is($model)
                    : $data['id'] == data_get($model, 'id');
            }), 'Failed asserting that the collection contains the specified value.');
        });
    }

    public function signIn()
    {
        $this->user = factory(User::class)->create();
        return $this->actingAs($this->user);
    }
}
