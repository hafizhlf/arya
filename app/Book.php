<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function degree()
    {
        return $this->belongsTo('App\Degree');
    }

    public function lesson()
    {
        return $this->belongsTo('App\Lesson');
    }

    public function section()
    {
        return $this->hasMany('App\Section');
    }
}
