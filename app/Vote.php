<?php

namespace App;
use Illuminate\Database\Eloquent\Relations\Pivot;


class Vote extends Pivot{

    // Table name
    protected $table = 'vote';

    // Primary key
    public $primaryKey = 'id_user';
    
    protected $fillable = [
        'id_user', 'id_question', 'vote',
    ];
    //Timestamps 
    public $timestamps = false;


}
?>