<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LogicIsSerialized implements Rule
{
    private $segmentLogic = [];
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
       //
    }

    private function _setSegmentLogicArr($segmentLogic)
    {
        $this->segmentLogic = json_decode($segmentLogic);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */

    private function _checkBetween($value)
    {

    }
    public function passes($attribute, $value)
    {
        // $this->_setSegmentLogicArr($value);
        // dd($this->segmentLogic);
        // if(! $this->__loopAnd($value, 0)){ return false ; }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Sorry, Your Segment Logic does not constracted properly. Please follow the guildline.';
    }
}
