<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_num','desc','amount3','avail','amount12','amount24'
    ];  
}
