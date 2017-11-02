<?php

namespace App;

use App\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;

    //定义索引的类型
    public function searchableAs()
    {
        return "post";
    }

    //定义哪些字段需要搜索
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at','desc');
    }
    //和用户关联
    public function zan($user_id)
    {
        return $this->hasOne(\App\Zan::class)->where('user_id',$user_id);
    }
    public function zans()
    {
        return $this->hasMany(\App\Zan::class);
    }
}
