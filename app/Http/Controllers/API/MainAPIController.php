<?php

namespace App\Http\Controllers\API;

use App\Models\Poll;
use App\Repositories\PollRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateResponseAPIRequest;
use App\Repositories\ResponseRepository;
use Response;

/**
 * Class PollController
 * @package App\Http\Controllers\API
 */

class MainAPIController extends AppBaseController
{
    /** @var  PollRepository @var ResponseRepository*/
    private $pollRepository;
    private $responseRepository;

    public function __construct(PollRepository $pollRepo, ResponseRepository $responseRepo)
    {
        $this->pollRepository = $pollRepo;
        $this->responseRepository = $responseRepo;
    }

    /**
     * Get all active polls.
     * GET|HEAD /polls
     *
     * @return Response
     */
    public function getActivePolls()
    {
        $polls = $this->pollRepository->getActivePolls();
        $response=[];
        foreach ($polls as $key => $poll) {
          //survey information is added
            $data['poll']=$poll->getPollInfo();
            $data['questions']=$poll->questions->toArray();
        }
        array_push($response,$data);
        return $this->sendResponse($response, 'Active surveys were successfully obtained');
    }

    /**
     * Get all active polls.
     * GET|HEAD /polls
     *
     * @return Response
     */
    public function getPoll($id)
    {
        $poll = $this->pollRepository->find($id);
        $data['poll']=$poll->getPollInfo();
        $data['questions']=$poll->questions->toArray();

        return $this->sendResponse($data, 'Active surveys were successfully obtained');
    }

    /**
     * Get all active polls.
     * GET|HEAD /polls
     *
     * @return Response
     */
    public function setResponsePoll(CreateResponseAPIRequest $request)
    {
      $input = $request->all();
      $this->responseRepository->create($input);
      return $this->sendResponse(true, 'Response saved successfully.');
    }

    /**
     * Get all active polls.
     * GET|HEAD /polls
     *
     * @return Response
     */
    public function getResults($id)
    {
        $poll = $this->pollRepository->find($id);
        $countryResult=$poll->getCountryResult();
        $stateResult=$poll->getStateResult();
        $votesIntentionResult=$poll->getVotesIntentionResult();
        $data['countryResult']=$countryResult;
        $data['stateResult']=$stateResult;
        $data[' votesIntentionResult']=$votesIntentionResult;

        return $this->sendResponse($data, 'Surveys result were successfully obtained');
    }

}
