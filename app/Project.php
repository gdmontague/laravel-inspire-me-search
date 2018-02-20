<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = ['title', 'user_id', 'active'];

    public function images(){

      return $this->hasMany('App\Image');
    }

    public function deleteRelated(){

      $this->images()->delete();

      return parent::delete();
    }

    public function user()
    {
      return $this->belongsTo('App\user');
    }
}
