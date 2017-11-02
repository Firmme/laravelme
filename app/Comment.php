<?php

namespace App;

use App\Model;

class Comment extends Model
{
    //关联用户
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

}
