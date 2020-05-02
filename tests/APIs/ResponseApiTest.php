<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Response;

class ResponseApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_response()
    {
        $response = factory(Response::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/responses', $response
        );

        $this->assertApiResponse($response);
    }

    /**
     * @test
     */
    public function test_read_response()
    {
        $response = factory(Response::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/responses/'.$response->id
        );

        $this->assertApiResponse($response->toArray());
    }

    /**
     * @test
     */
    public function test_update_response()
    {
        $response = factory(Response::class)->create();
        $editedResponse = factory(Response::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/responses/'.$response->id,
            $editedResponse
        );

        $this->assertApiResponse($editedResponse);
    }

    /**
     * @test
     */
    public function test_delete_response()
    {
        $response = factory(Response::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/responses/'.$response->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/responses/'.$response->id
        );

        $this->response->assertStatus(404);
    }
}
