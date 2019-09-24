<?php

namespace Tests\Feature;

use App\User;
use App\Question;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateQuestionTest extends TestCase
{
    /** @test */
    public function eu_posso_postar_uma_perguntar()
    {
        $this->withoutExceptionHandling();

        $response = $this->signIn()->post('/questions', [
            'title' => 'Minha pergunta',
            'body' => 'Lorem Ipsum',
        ]);

        $response->assertRedirect('/');

        $this->assertDatabaseHas('questions', [
            'title' => 'Minha pergunta',
            'body' => 'Lorem Ipsum',
            'user_id' => $this->user->id,
        ]);
    }

    /** @test */
    public function eu_posso_fazer_o_upload_de_uma_imagem()
    {
        $this->withoutExceptionHandling();

        $response = $this->signIn()->post('/questions', [
            'title' => 'Minha pergunta 2',
            'body' => 'Lorem Ipsum',
            'image' => UploadedFile::fake()->image('image.jpg'),
        ]);

        $response->assertRedirect('/');

        $this->assertDatabaseHas('questions', [
            'title' => 'Minha pergunta 2',
            'user_id' => $this->user->id,
        ]);

        $question = Question::where('title', 'Minha pergunta 2')->first();
        $this->assertNotNull($question->image, 'Parece que não foi feito o upload da imagem');
    }

    /** @test */
    public function validacao_de_dados()
    {
        $response = $this->signIn()->from('questions/create')->post('/questions', []);
        $response->assertRedirect('/questions/create')
            ->assertSessionHasErrors();

        $this->assertCount(0, Question::all());
    }
}
