<?php namespace Tests\Repositories;

use App\Models\Response;
use App\Repositories\ResponseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ResponseRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ResponseRepository
     */
    protected $responseRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->responseRepo = \App::make(ResponseRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_response()
    {
        $response = factory(Response::class)->make()->toArray();

        $createdResponse = $this->responseRepo->create($response);

        $createdResponse = $createdResponse->toArray();
        $this->assertArrayHasKey('id', $createdResponse);
        $this->assertNotNull($createdResponse['id'], 'Created Response must have id specified');
        $this->assertNotNull(Response::find($createdResponse['id']), 'Response with given id must be in DB');
        $this->assertModelData($response, $createdResponse);
    }

    /**
     * @test read
     */
    public function test_read_response()
    {
        $response = factory(Response::class)->create();

        $dbResponse = $this->responseRepo->find($response->id);

        $dbResponse = $dbResponse->toArray();
        $this->assertModelData($response->toArray(), $dbResponse);
    }

    /**
     * @test update
     */
    public function test_update_response()
    {
        $response = factory(Response::class)->create();
        $fakeResponse = factory(Response::class)->make()->toArray();

        $updatedResponse = $this->responseRepo->update($fakeResponse, $response->id);

        $this->assertModelData($fakeResponse, $updatedResponse->toArray());
        $dbResponse = $this->responseRepo->find($response->id);
        $this->assertModelData($fakeResponse, $dbResponse->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_response()
    {
        $response = factory(Response::class)->create();

        $resp = $this->responseRepo->delete($response->id);

        $this->assertTrue($resp);
        $this->assertNull(Response::find($response->id), 'Response should not exist in DB');
    }
}
