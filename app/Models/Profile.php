<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'education' => 'array',
        'work' => 'array',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function followers()
    {
    	return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function hasFollowed()
    {
        return $this->followers()->where('user_id', auth()->user()->id)->count();
    }

    public function follow()
    {
        $this->followers()->attach(auth()->user()->id);
    }

    public function unfollow()
    {
        $this->followers()->detach(auth()->user()->id);
    }
}
