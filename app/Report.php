<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Question;
use App\Answer;


class Report extends Model{
// Table name
protected $table = 'report';

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
    'reason', 'id_reporting_user', 'id_reported_question', 'id_reported_answer'
];


    public function user(){
        return $this->belongsTo('App\User');
    }


    public function question(){
        return $this->belongsTo('App\Question');
    }

    public function answer(){
        return $this->belongsTo('App\Answer');
    }


}
?>