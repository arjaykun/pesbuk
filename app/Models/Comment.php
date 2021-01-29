<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use LikedBy;

    protected $guarded = [];

    public $touches = ['post'];

    public function post() 
    {   	
    	return $this->belongsTo(Post::class);    
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'object_id')->where('type', 'comment');
    }

    public function user() 
    {   	
    	return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class)->withCount('likes');
    }

}
