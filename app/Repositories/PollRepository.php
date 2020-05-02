<?php

namespace App\Repositories;

use App\Models\Poll;
use App\Repositories\BaseRepository;

/**
 * Class PollRepository
 * @package App\Repositories
 * @version May 2, 2020, 1:31 am UTC
*/

class PollRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'num_questions',
        'status'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Return active pols
     *
     * @return array
     */
    public function getActivePolls()
    {
        return $this->model()::where('status',1)->get();
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Poll::class;
    }
}
