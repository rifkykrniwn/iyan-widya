<?php

namespace Tests\Feature;

use App\Models\Wedding;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response(): void
    {
        Wedding::create([
            'slug' => 'test-wedding',
            'bride_name' => 'Widya',
            'groom_name' => 'Iyan',
            'wedding_date' => '2027-01-01 10:00:00',
        ]);

        $response = $this->get('/');

        $response->assertOk();
    }
}