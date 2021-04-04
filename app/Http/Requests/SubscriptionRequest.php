<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
{
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
        switch($this->method()){
            // case 'GET':
            //     return $this->__getRules();
            case 'POST':
                return [
                    // 'name' =>'required|string|unique:segments',
                    'first_name' =>'required|string',
                    'last_name' =>'required|array|min:1',
                    'email' =>['required','string','email','unique:subscriptions,email'],
                    'birth_day' =>'sometimes|date'
                ];
            case 'PUT':
                return [
                    'first_name' =>'sometime|string',
                    'last_name' =>'sometime|string',
                    // 'email' =>['required','string','email','unique:subscriptions,email'],
                    'birth_day' =>'sometimes|date'
                ];
            // case 'DELETE':
            //     return $this->__deleteRules();
            default :
                break;
        }
    }
    public function __getRules()
    {
        return [];
    }
    public function __postRules()
    {
        return [ ];
    }
    public function __putRules()
    {
        return [ ];
    }
    public function __deleteRules()
    {
        return [];
    }
}
