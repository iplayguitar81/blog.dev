<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rateable;

class Post extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
//    public function ratings(){
//        return $this ->hasMany('App\Rating');
//
//    }
    public function posts(){
        return $this->belongsTo('App\User', 'user_id');
    }

    protected $table = 'posts';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [ 'user_id','title','subhead','body','imgpath'];
}
