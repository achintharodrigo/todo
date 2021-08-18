<?php

namespace Tests\Unit;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        Passport::actingAs($this->user);
    }

    /**
     * @test
     */
    public function if_user_can_create_a_task() : void
    {
        $response = $this->post(route('task.store'), [
            'task' => [
                'title' => 'This is a test',
                'due_on' => Carbon::now()->addDays(2)
            ]
        ])->assertStatus(200);

        $this->assertDatabaseCount('tasks', 1);
    }

    /**
     * @test
     */
    public function if_user_can_list_tasks_created_by_the_same_user() : void
    {
        Task::factory(3)->create([
            'user_id' => $this->user->id
        ]);

        $response = $this->get(route('task.index'))
            ->assertStatus(200);

        $this->assertDatabaseCount('tasks', 3);

        $data = collect( json_decode( $response->getContent() )->data);
        $this->assertTrue($data->contains('user_id', $this->user->id));
    }

    /**
     * @test
     */
    public function if_user_can_not_list_tasks_created_by_other_users() : void
    {
        Task::factory(3)->create([
            'user_id' => $this->user->id
        ]);

        $anotherUser= User::factory()->create();
        Passport::actingAs($anotherUser);
        Task::factory(3)->create([
            'user_id' => $anotherUser->id
        ]);

        Passport::actingAs($this->user);

        $response = $this->get(route('task.index'))
            ->assertStatus(200);

        $this->assertDatabaseCount('tasks', 6);

        $data = collect( json_decode( $response->getContent() )->data);
        $this->assertTrue($data->contains('user_id', $this->user->id));
        $this->assertFalse($data->contains('user_id', $anotherUser->id));
    }

    /**
     * @test
     */
    public function if_user_can_complete_a_task() : void
    {
        Task::factory()->create([
            'user_id' => $this->user->id
        ]);

        $task = Task::first();
        $this->assertEquals(false, (bool)$task->completed);
        $this->assertEquals(null, $task->completed_on);

        $response = $this->put(route('task.update', $task->id), [
            'task' => [
                'completed' => true
            ]
        ])->assertStatus(200);

        $updatedTask = Task::first();
        $this->assertEquals(true, (bool)$updatedTask->completed);
        $this->assertNotNull($updatedTask->completed_on);
    }

    /**
     * @test
     */
    public function if_user_can_delete_a_task() : void
    {
        Task::factory()->create([
            'user_id' => $this->user->id
        ]);

        $this->assertDatabaseCount('tasks', 1);

        $task = Task::first();

        $response = $this->delete(route('task.destroy', $task->id))
            ->assertStatus(200);

        $this->assertDatabaseCount('tasks', 0);
    }
}
