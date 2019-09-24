<?php

namespace Tests\Unit;

use App\User;
use App\Question;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionTest extends TestCase
{
    /** @test */
    public function tem_acesso_ao_usuario_criador()
    {
        $question = factory(Question::class)->create();
        $this->assertInstanceOf(User::class, $question->user);
    }

    /** @test */
    public function remove_tags_html_no_body()
    {
        $question = factory(Question::class)->create([
            'body' => '<p>Lorem Ipsum</p>'
        ]);
        $this->assertEquals('Lorem Ipsum', $question->body);
    }
}
