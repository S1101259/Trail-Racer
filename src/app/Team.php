<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'color'
    ];

    public function times(){
        return $this->hasMany('App\Time');
    }
}
