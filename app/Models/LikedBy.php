<?php

namespace App\Models;

trait LikedBy
{

	public function likedBy($user_id, $type, $like = true)
    {
        if($like)
        {
           $trashedLike = $this->likes()->onlyTrashed()->firstWhere('user_id', $user_id);
            if( $trashedLike) 
                $trashedLike->restore();
            else
                $this->likes()->create(['user_id' => $user_id, 'type' => $type]);
        }
        else
        {
           $this->likes()->firstWhere('user_id', $user_id)->delete();
        }
    }


    public function liked() 
    {
        return $this->likes()->where('user_id', auth()->user()->id)->count();
    }    

}
