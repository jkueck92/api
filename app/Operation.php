<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{

    protected $fillable = ['created_at', 'updated_at', 'operation_date', 'operation_time', 'keyword', 'keyword_description', 'address', 'address_addition', 'message', 'comment', 'city_id'];

}
