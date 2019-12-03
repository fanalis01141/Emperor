<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name','room','time_in','time_out','time_left','check_in_hrs','time_added','room_type','assistant','pax','towel','blanket','foam','total','status'
    ];
}
