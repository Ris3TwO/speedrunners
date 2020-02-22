<?php

namespace App\Http\Requests;

use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRegistrationRequest extends FormRequest
{
    use ApiResponser;
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
            'names' => 'required|string|min:3|max:35',
            'last_names' => 'required|string|min:3|max:45',
            'age' => 'required|string|min:3|max:8',
            'email' => 'required|string|min:3|unique:registrations',
            'gender' => 'required|string|min:3|max:6',
            'shoes' => 'required|string|min:3|max:10',
            'team' => 'required|string|min:3|max:40',
            'distance' => 'required|string|min:2',
            'best_time' => 'required|string|min:3|max:10',
            'email_notices' => 'boolean',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            $this->errorResponseWithErrors(
                $errors, trans('messages.error_validation'),
                JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            );
    }
}
