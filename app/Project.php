<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'status', 'url', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function checks()
    {
        return $this->hasMany('App\Check');
    }

}
