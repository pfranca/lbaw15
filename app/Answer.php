<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    // Table name
    protected $table = 'answer';

    // Primary key
    public $primaryKey = 'id';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_author', 'id_question', 'message', 'disabled'
    ];

    public function question(){
        return $this->belongsTo('App\Question','id_question');
    }

    public function user(){
        return $this->belongsTo('App\User','id_author');
    }

    public function reports(){
        return $this->hasMany('App\Report','id_reported_answer');
    }
    
}
