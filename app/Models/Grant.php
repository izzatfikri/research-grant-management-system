<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    public function academicians(){
        return $this->belongsToMany(Academician::class)
            ->withPivot('role')
            ->withTimestamps();
    }
}
