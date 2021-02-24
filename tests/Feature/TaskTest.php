<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create()
    {
        //$response = $this->get('/');

        //$response->assertStatus(200);

        $this->actingAs(TaskDb::factory()->create());

        Livewire::test(Task::class)
            ->set('task', 'test task')
            ->call('create');

        $this->assertTrue(TaskDb::whereTask('test task')->exists());

    }
}
