<?php

namespace App\Repositories;

use App\Models\Response;
use App\Repositories\BaseRepository;

/**
 * Class ResponseRepository
 * @package App\Repositories
 * @version May 2, 2020, 1:31 am UTC
*/

class ResponseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'response',
        'latitude',
        'longitude'
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
     * Configure the Model
     **/
    public function model()
    {
        return Response::class;
    }
}
