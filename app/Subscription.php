<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //
    protected $fillable = [
        'first_name', 'last_name','birth_day'
    ];
}
