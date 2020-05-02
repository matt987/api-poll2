<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateResponseRequest;
use App\Http\Requests\UpdateResponseRequest;
use App\Repositories\ResponseRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ResponseController extends AppBaseController
{
    /** @var  ResponseRepository */
    private $responseRepository;

    public function __construct(ResponseRepository $responseRepo)
    {
        $this->responseRepository = $responseRepo;
    }

    /**
     * Display a listing of the Response.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $responses = $this->responseRepository->all();

        return view('responses.index')
            ->with('responses', $responses);
    }

    /**
     * Show the form for creating a new Response.
     *
     * @return Response
     */
    public function create()
    {
        return view('responses.create');
    }

    /**
     * Store a newly created Response in storage.
     *
     * @param CreateResponseRequest $request
     *
     * @return Response
     */
    public function store(CreateResponseRequest $request)
    {
        $input = $request->all();

        $response = $this->responseRepository->create($input);

        Flash::success('Response saved successfully.');

        return redirect(route('responses.index'));
    }

    /**
     * Display the specified Response.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $response = $this->responseRepository->find($id);

        if (empty($response)) {
            Flash::error('Response not found');

            return redirect(route('responses.index'));
        }

        return view('responses.show')->with('response', $response);
    }

    /**
     * Show the form for editing the specified Response.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $response = $this->responseRepository->find($id);

        if (empty($response)) {
            Flash::error('Response not found');

            return redirect(route('responses.index'));
        }

        return view('responses.edit')->with('response', $response);
    }

    /**
     * Update the specified Response in storage.
     *
     * @param int $id
     * @param UpdateResponseRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResponseRequest $request)
    {
        $response = $this->responseRepository->find($id);

        if (empty($response)) {
            Flash::error('Response not found');

            return redirect(route('responses.index'));
        }

        $response = $this->responseRepository->update($request->all(), $id);

        Flash::success('Response updated successfully.');

        return redirect(route('responses.index'));
    }

    /**
     * Remove the specified Response from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $response = $this->responseRepository->find($id);

        if (empty($response)) {
            Flash::error('Response not found');

            return redirect(route('responses.index'));
        }

        $this->responseRepository->delete($id);

        Flash::success('Response deleted successfully.');

        return redirect(route('responses.index'));
    }
}
