<?php

namespace App\Http\Requests\API;

use App\Models\Response;
use InfyOm\Generator\Request\APIRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use InfyOm\Generator\Utils\ResponseUtil;

class CreateResponseAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
          'poll_id' => 'required',
          'response' => 'required',
          'latitude' => 'required',
          'longitude' => 'required',
      ];
    }

    public function messages()
    {
        return [
            'poll_id.required'=> "poll_id is required",
            'response.required'=> "response is required",
            'latitude.required'=> "latitude is required",
            'longitude.required'=> "longitude is required",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(ResponseUtil::makeError($errors), 404));
    }
}
