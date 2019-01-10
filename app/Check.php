<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $fillable = ['code', 'info', 'project_id'];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

}
