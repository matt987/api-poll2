<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Response
 * @package App\Models
 * @version May 2, 2020, 1:31 am UTC
 *
 * @property \App\Models\Poll $poll
 * @property string $response
 * @property string $latitude
 * @property string $longitude
 * @property integer $poll_id
 */
class Response extends Model
{
    use SoftDeletes;

    public $table = 'responses';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'response',
        'latitude',
        'longitude',
        'poll_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'response' => 'string',
        'latitude' => 'string',
        'longitude' => 'string',
        'poll_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'response' => 'required',
        'latitude' => 'required',
        'longitude' => 'required',
        'poll_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function poll()
    {
        return $this->belongsTo(\App\Models\Poll::class, 'poll_id', 'id');
    }
}
