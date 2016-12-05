<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight_Training_Plans extends Model
{
        public function user()
      {
       return $this->belongsTo('App\User');
      }

      public function weight_exercises()
    {
     return $this->belongsTo('App\weight_exercises');
    }
}
