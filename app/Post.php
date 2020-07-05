<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'assignment_posts';
    protected $primaryKey = 'post_id';
    public $incrementing =true;

}
