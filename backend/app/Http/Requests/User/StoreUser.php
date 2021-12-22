<?php

namespace App\Http\Requests\User;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUser extends FormRequest
{
    /**
     * Determine if user is authorized to do this request
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules wich apply to the request
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => 'unique:users,email|email|required',
            'name'      => 'required',
            'password'  => 'required'
        ];
    }

    /**
     * Configure the validator instance
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {

        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'msg'   => 'woah! Some mandatory field was not filled',
                'status' => false,
                'errors'    => $validator->errors(),
                'url'    => route('users.store')
            ], 403));
       }
    }
}