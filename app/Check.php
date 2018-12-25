<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $fillable = ['name', 'status', 'code', 'info', 'project_id'];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

}
