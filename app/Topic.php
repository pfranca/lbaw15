<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    // Table name
    protected $table = 'topic';

    // Primary key
    public $primaryKey = 'id';

    //Timestamps 
    public $timestamps = true;
}
