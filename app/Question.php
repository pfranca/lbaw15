<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    // Table name
    protected $table = 'question';

    // Primary key
    public $primaryKey = 'id';

    protected $dateFormat = 'U';
}
