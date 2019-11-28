<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customerdata extends Model
{
    protected $fillable = [
        'user_id', 'name', 'deliveryaddress', 'phone'
    ];
}
