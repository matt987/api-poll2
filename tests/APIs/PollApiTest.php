<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Poll;

class PollApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_poll()
    {
        $poll = factory(Poll::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/polls', $poll
        );

        $this->assertApiResponse($poll);
    }

    /**
     * @test
     */
    public function test_read_poll()
    {
        $poll = factory(Poll::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/polls/'.$poll->id
        );

        $this->assertApiResponse($poll->toArray());
    }

    /**
     * @test
     */
    public function test_update_poll()
    {
        $poll = factory(Poll::class)->create();
        $editedPoll = factory(Poll::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/polls/'.$poll->id,
            $editedPoll
        );

        $this->assertApiResponse($editedPoll);
    }

    /**
     * @test
     */
    public function test_delete_poll()
    {
        $poll = factory(Poll::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/polls/'.$poll->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/polls/'.$poll->id
        );

        $this->response->assertStatus(404);
    }
}
