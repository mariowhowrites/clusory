<?php

namespace Tests\Feature;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TopicTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_that_users_can_view_individual_topics()
    {
        $topic = Topic::factory()->create();

        $this->get(route('topics.show', $topic))
            ->assertSee($topic->title)
            ->assertSee($topic->description);
    }

    public function test_that_users_can_create_challenges()
    {
        $topic = Topic::factory()->raw();
        
        $this->assertDatabaseMissing('topics', ['title' => $topic['title']]);
     
        $this->actingAs(User::factory()->create())
            ->post(route('topics.store'), $topic)
            ->assertStatus(201);
        
        $this->assertDatabaseHas('topics', ['title' => $topic['title']]);
    }
}
