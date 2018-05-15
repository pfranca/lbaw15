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

    public function user(){
        return $this->belongsTo('App\User','id_author');
    }

    public function topic(){
        return $this->belongsTo('App\Topic','id_topic');
    }

    public function answers(){
        return $this->hasMany('App\Answer');
    }
    
    public function followQuestion(){
        return $this->belongsToMany('App\User','followquestion','id_user','id_question')->withPivot('id_user', 'id_question');
    }

    public function reports(){
        return $this->hasMany('App\Report','id_reported_question');
    }

    public function notifications(){
        return $this->hasMany('App\Notification','id_question');
    }
}
