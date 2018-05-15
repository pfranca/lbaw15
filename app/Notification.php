<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Notification extends Model{

// Table name
protected $table = 'notification';

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
    'notificated_user', 'id_question', 'message', 'seen', 'date'
];

public function question(){
    return $this->belongsTo('App\Question');
}

}
?>