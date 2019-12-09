<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = ['name', 'slug'];

    public function entries(){
        return $this->hasMany('App\Entry');
    }

    public function times(){
        return $this->hasMany('App\Time');
    }
}
