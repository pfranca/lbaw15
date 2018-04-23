<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class FollowTopic extends Pivot
{
    // Table name
    protected $table = 'followtopic';

    // Primary key
    public $primaryKey = 'id_user';
	
	protected $fillable = [
        'id_user', 'id_topic',
    ];
    //Timestamps 
   	public $timestamps = false;

}
