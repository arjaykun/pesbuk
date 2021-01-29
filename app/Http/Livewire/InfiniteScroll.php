<?php

namespace App\Http\Livewire;

trait InfiniteScroll 
{

  public $count= 10;
  
  public $countAddedPerScroll = 10;

  public function scroll()
  {
    $this->count += $this->countAddedPerScroll;
  }

}



