<?php

namespace Forum;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function thread()
    {
        return $this->belongsTo('Forum\Thread');
    }

    public function author()
    {
        return $this->belongsTo('Forum\User', 'user_id');
    }
}
