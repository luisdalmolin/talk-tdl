<?php

namespace Tests\Feature;

use App\Question;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteQuestionsTest extends TestCase
{
    /** @test */
    public function eu_posso_deletar_a_pergunta()
    {
        $this->signIn();

        $question = factory(Question::class)->create([
            'user_id' => $this->user->id,
        ]);
        $response= $this->delete('/questions/'.$question->id);
        $response->assertRedirect('/');

        $this->assertDatabaseMissing('questions', [
            'id' => $question->id,
        ]);
    }

    /** @test */
    public function eu_nao_posso_deletar_uma_pergunta_que_nao_e_minha()
    {
        $question = factory(Question::class)->create();
        $response= $this->signIn()->delete('/questions/'.$question->id);
        $response->assertStatus(403);

        $this->assertDatabaseHas('questions', [
            'id' => $question->id,
        ]);
    }
}
