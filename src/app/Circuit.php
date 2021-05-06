<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circuit extends Model
{
    protected $fillable = [
        'name',
        'imageName'
    ];

    public function times(){
        return $this->hasMany('App\Time');
    }
}
