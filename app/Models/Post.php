<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LikedBy;

    protected $guarded = [];

    public function user() 
    {
    	return $this->belongsTo(User::class)->select('id', 'name', 'profileImage');
    }

    public function likes() 
    {
    	return $this->hasMany(Like::class, 'object_id')->where('type', 'post');
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class)->with('user', 'replies')->withCount('likes');
    }

}
