<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{

    protected $fillable = ['grant_amount', 'grant_provider', 'project_title', 'project_description', 'start_date', 'end_date', 'duration'];

    public function academicians(){
        return $this->belongsToMany(Academician::class)
            ->withPivot('role')
            ->withTimestamps();
    }
    public function leader()
    {
        return $this->academicians()->wherePivot('role', 'leader')->first();
    }
}
