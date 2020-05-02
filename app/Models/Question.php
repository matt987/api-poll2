<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Question
 * @package App\Models
 * @version May 2, 2020, 1:31 am UTC
 *
 * @property \App\Models\Poll $poll
 * @property string $question
 * @property string $options
 * @property string $display_options
 * @property integer $poll_id
 */
class Question extends Model
{
    use SoftDeletes;

    public $table = 'questions';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'question',
        'options',
        'display_options',
        'poll_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'question' => 'string',
        'options' => 'string',
        'display_options' => 'string',
        'poll_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'question' => 'required',
        'options' => 'required',
        'display_options' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function poll()
    {
        return $this->belongsTo(\App\Models\Poll::class, 'poll_id', 'id');
    }

}
