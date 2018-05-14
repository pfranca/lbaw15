<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class FollowQuestion extends Pivot
{
    // Table name
    protected $table = 'followquestion';

    // Primary key
    public $primaryKey = 'id_user';
	
	protected $fillable = [
        'id_user', 'id_question',
    ];
    //Timestamps 
   	public $timestamps = false;

}
?>