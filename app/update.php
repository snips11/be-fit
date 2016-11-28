<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class update extends Model
{
    public function user_update()
  {
    return $this->belongsTo('App\User', 'user_id');
  }
}
