<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

/**
 * Class Poll
 * @package App\Models
 * @version May 2, 2020, 1:31 am UTC
 *
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $questions
 * @property \Illuminate\Database\Eloquent\Collection $responses
 * @property string $title
 * @property string $description
 * @property integer $num_questions
 * @property boolean $status
 * @property integer $user_id
 */
class Poll extends Model
{
    use SoftDeletes;

    public $table = 'polls';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'description',
        'num_questions',
        'status',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string',
        'num_questions' => 'integer',
        'status' => 'boolean',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'description' => 'required',
        'num_questions' => 'required',
        'status' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function questions()
    {
        return $this->hasMany(\App\Models\Question::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function responses()
    {
        return $this->hasMany(\App\Models\Response::class);
    }

    /**
    *poll info
     * @return array
     **/
    public function getPollInfo()
    {
      return [
        'title'=>$this->title,
        'description'=>$this->description
      ];
    }

    public function getCountryResult(){
      $return=array();
      foreach ($this->responses as $key => $value) {
        $response=json_decode($value->response);
        if(isset($return[$response[2]->response])){
          $return[$response[2]->response]=$return[$response[2]->response]+1;
        }else{
          $return[$response[2]->response]=1;
        }
      }
      return $return;
    }

    public function getStateResult(){
      $return=array();
      foreach ($this->responses as $key => $value) {
        $response=json_decode($value->response);
        if(isset($return[$response[0]->response])){
          $return[$response[0]->response][$response[2]->response]=$return[$response[0]->response][$response[2]->response]+1;
        }else{
          $return[$response[0]->response]=[
            'Ivana Doover'=>0,
            'Jeremy Jameson'=>0,
            'Steve Lowenthal'=>0
          ];
          $return[$response[0]->response][$response[2]->response]=$return[$response[0]->response][$response[2]->response]+1;
        }
      }
      return $return;
    }


    public function getVotesIntentionResult(){
      $return['vote']=$this->VotesIntentionResult(true);
      $return['dontVote']=$this->VotesIntentionResult(false);
      return $return;

    }

    public function VotesIntentionResult($ifVote){
      $return=array();
      if($ifVote){
        $responses=Response::where('response','like','%"id_question":2,"response":"Yes"%')->get();
      }else{
        $responses=Response::where('response','like','%"id_question":2,"response":"No"%')->get();
      }
      foreach ($responses as $key => $value) {
        $response=json_decode($value->response);
        if(isset($return[$response[2]->response])){
          $return[$response[2]->response]=$return[$response[2]->response]+1;
        }else{
          $return[$response[2]->response]=1;
        }
      }
      return $return;
    }

}
