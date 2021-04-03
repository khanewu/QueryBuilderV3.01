<?php

namespace App\Http\Requests;

use App\Rules\LogicIsSerialized;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SegmentRequest extends FormRequest
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
        switch($this->method()){
            // case 'GET':
            //     return $this->__getRules();
            case 'POST':
                return [
                    // 'name' =>'required|string|unique:segments',
                    'segment_name' =>'required|string',

                    'segment_logic' =>['required','string', new LogicIsSerialized]

                    // 'segment_logic.*.field_name' =>'sometimes|string',
                    // 'segment_logic.*.field_type' =>'sometimes|string',
                    // 'segment_logic.*.op_type' =>'sometimes|string',
                    // 'segment_logic.*.value' =>'sometimes|string',
                    // 'segment_logic.*.starts_at' =>'required_if:logic.op_type,between|string',
                    // 'segment_logic.*.end_at' =>'required_if:logic.op_type,between|string',
                    // 'segment_logic.*.relation' =>[
                    //     'sometimes',
                    //     Rule::in(['AND', 'OR']),
                    // ],
                ];
            case 'PUT':
                return [
                    // 'name' =>'required|string|unique:segments',
                    'name' =>'sometimes|string',

                    'logic' =>['sometimes','string','min:1', new LogicIsSerialized],
                    // // 'logic' =>['required','array','min:1'],
                    // 'logic.*' =>['required','array','min:1'],

                    // 'logic.*.field_name' =>'sometimes|string',
                    // 'logic.*.field_type' =>'sometimes|string',
                    // 'logic.*.op_type' =>'sometimes|string',
                    // 'logic.*.value' =>'sometimes|string',
                    // 'logic.*.starts_at' =>'required_if:logic.op_type,between|string',
                    // 'logic.*.end_at' =>'required_if:logic.op_type,between|string',
                    // 'logic.*.relation' =>'sometimes|string',
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
        return [
            // 'name' =>'required|string|unique:segments',
            'name' =>'required|string',
            'logic' =>'required|array|min:1',
            // 'logic' =>['required','array','min:1', new LogicIsSerialized(Request $request)],
            'logic' =>['required','array','min:1'],
            'logic.*' =>['required','array','min:1'],

            'logic.*.field_name' =>'sometimes|string',
            'logic.*.field_type' =>'sometimes|string',
            'logic.*.op_type' =>'sometimes|string',
            'logic.*.value' =>'sometimes|string',
            'logic.*.start_at' =>'required_if:logic.op_type,between|string',
            'logic.*.end_at' =>'required_if:logic.op_type,between|string',
            'logic.*.relation' =>'sometimes|string',
        ];
    }
    public function __putRules()
    {
        return [
            // 'name' =>'required|string|unique:segments',
            'name' =>'required|string',
            'logic' =>'required|array|min:1',
            // 'logic' =>['required','array','min:1', new LogicIsSerialized(Request $request)],
            'logic' =>['required','array','min:1'],
            'logic.*' =>['required','array','min:1'],

            'logic.*.field_name' =>'sometimes|string',
            'logic.*.field_type' =>'sometimes|string',
            'logic.*.op_type' =>'sometimes|string',
            'logic.*.value' =>'sometimes|string',
            'logic.*.start_at' =>'required_if:logic.op_type,between|string',
            'logic.*.end_at' =>'required_if:logic.op_type,between|string',
            'logic.*.relation' =>'sometimes|string',
        ];
    }
    public function __deleteRules()
    {
        return [];
    }
}
