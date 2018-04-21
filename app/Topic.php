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
   public $timestamps = false;

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'img',
    ];

    public function questions(){
        return $this->hasMany('App\Question');
    }
}
