<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $guarded =  [];

    public function user() 
    {
    	return $this->belongsTo(User::class);
    }

    public function comment()
    {
    	return $this->belongsTo(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'object_id')->where('type', 'reply');
    }

    public function liked()
    {
        return $this->likes()->where('user_id', auth()->user()->id)->count();
    }
}
