<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = ['user_id', 'competition_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function competition()
    {
        return $this->belongsTo('App\Competition');
    }
}
