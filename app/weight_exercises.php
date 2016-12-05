<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class weight_exercises extends Model
{
  public function Weight_Training_Plans()
  {
      return $this->hasMany('App\Weight_Training_Plans');
  }

}
