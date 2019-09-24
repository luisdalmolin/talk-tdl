<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'title' => $faker->words(3, true),
        'body' => $faker->paragraphs(3, true),
    ];
});
