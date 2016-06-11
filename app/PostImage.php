<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    public function post_image(){
        return $this->belongsTo('App\Post', 'post_id');
    }
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'post_images';

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
    protected $fillable = ['post_image_id', 'post_id', 'img_path'];
}
