<?php

namespace Forum;

use Forum\Post;
use Illuminate\Database\Eloquent\Model;
use Mockery\CountValidator\Exception;

class Thread extends Model
{
    public function getBodyAttribute()
    {
        return $this->posts()->first()->body;
    }

    public function getAnswersAttribute()
    {
        $list = $this->posts()->get()->slice(1, $this->posts()->count());
        // dd($list->toArray());
        return $list;
    }

    public function setBodyAttribute($value)
    {
        $post = $this->posts()->first();
        $post->body = $value;
        $post->save();
    }

    public function author()
    {
        return $this->belongsTo('Forum\User', 'user_id');
    }

    public function posts()
    {
        return $this->hasMany('Forum\Post');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function store()
    {
        try {
            $this->title = request()->title;
            $this->slug = str_slug(request()->title);
            $this->user_id = request()->user()->id;
            $this->save();

            $post = new Post;
            $post->body = request()->body;
            $post->user_id = request()->user()->id;
            $this->posts()->save($post);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function isAuthor(User $user)
    {
        return $this->user_id === $user->id;
    }
}
