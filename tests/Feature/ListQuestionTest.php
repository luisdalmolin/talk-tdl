<?php

namespace Tests\Feature;

use App\Question;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListQuestionTest extends TestCase
{
    /** @test */
    public function posso_ver_todas_as_perguntas()
    {
        $question1 = factory(Question::class)->create(['title' => 'Pergunta 1']);
        $question2 = factory(Question::class)->create(['title' => 'Pergunta 2']);

        $response = $this->signIn()->get('/');
        $response->assertSee($question1->title);
        $response->assertSee($question2->title);
    }
}
