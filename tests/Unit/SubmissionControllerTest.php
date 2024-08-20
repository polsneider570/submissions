<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Submission;

class SubmissionControllerTest extends TestCase
{
    use RefreshDatabase; // Используйте это для очистки базы данных между тестами

    /** @test */
    public function it_creates_a_submission_with_valid_data()
    {
        $data = [
            'name' => 'John Smith',
            'email' => 'johnsmith@mail.com',
            'message' => 'Test message.'
        ];

        $response = $this->postJson('/api/v1/submit', $data);

        $response->assertStatus(200);

        $response->assertJson([
            'success' => 'ok'
        ]);

        $this->assertDatabaseHas('submissions', [
            'name' => 'John Smith',
            'email' => 'johnsmith@mail.com',
            'message' => 'Test message.'
        ]);
    }
}
