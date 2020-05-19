<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title', 'text', 'slug', 'user_id'
    ];

    /** 
     * Get the route key for the model.
    */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /* protected $hidden = [
        'text', 'updated_at', 'created_at'
    ]; */

    
    /**
     * Get the author of the blog post.
     */
    public function user() 
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the comments of this post.
     */
    public function comments() 
    {
        return $this->hasMany('App\Comment')->latest();
        /* return $this->hasMany('App\Comment')->orderBy('id', 'DESC'); */
    }
}
