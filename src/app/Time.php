<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = ['user_id','competition_id', 'circuit_id', 'team_id','time'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function competition(){
        return $this->belongsTo('App\Competition');
    }

    public function circuit(){
        return $this->belongsTo('App\Circuit');
    }

    public function team(){
        return $this->belongsTo('App\Team');
    }
}
