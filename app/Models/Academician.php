<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academician extends Model
{
    protected $fillable = ['name', 'staff_number', 'email', 'college', 'department', 'position'];

    public function grants(){
        return $this->belongsToMany(Grant::class)
            ->withPivot('role')
            ->withTimestamps();
    }
}
