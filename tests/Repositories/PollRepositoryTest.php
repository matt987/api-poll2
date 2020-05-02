<?php namespace Tests\Repositories;

use App\Models\Poll;
use App\Repositories\PollRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PollRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PollRepository
     */
    protected $pollRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->pollRepo = \App::make(PollRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_poll()
    {
        $poll = factory(Poll::class)->make()->toArray();

        $createdPoll = $this->pollRepo->create($poll);

        $createdPoll = $createdPoll->toArray();
        $this->assertArrayHasKey('id', $createdPoll);
        $this->assertNotNull($createdPoll['id'], 'Created Poll must have id specified');
        $this->assertNotNull(Poll::find($createdPoll['id']), 'Poll with given id must be in DB');
        $this->assertModelData($poll, $createdPoll);
    }

    /**
     * @test read
     */
    public function test_read_poll()
    {
        $poll = factory(Poll::class)->create();

        $dbPoll = $this->pollRepo->find($poll->id);

        $dbPoll = $dbPoll->toArray();
        $this->assertModelData($poll->toArray(), $dbPoll);
    }

    /**
     * @test update
     */
    public function test_update_poll()
    {
        $poll = factory(Poll::class)->create();
        $fakePoll = factory(Poll::class)->make()->toArray();

        $updatedPoll = $this->pollRepo->update($fakePoll, $poll->id);

        $this->assertModelData($fakePoll, $updatedPoll->toArray());
        $dbPoll = $this->pollRepo->find($poll->id);
        $this->assertModelData($fakePoll, $dbPoll->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_poll()
    {
        $poll = factory(Poll::class)->create();

        $resp = $this->pollRepo->delete($poll->id);

        $this->assertTrue($resp);
        $this->assertNull(Poll::find($poll->id), 'Poll should not exist in DB');
    }
}
