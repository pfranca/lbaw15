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

     //Timestamps 
    public $timestamps = false;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_author', 'id_topic', 'short_message', 'long_message'
    ];
}
