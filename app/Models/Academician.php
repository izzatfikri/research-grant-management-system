<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Academician extends Model
{
    use HasFactory;
    protected $table = 'academicians';
    protected $fillable = ['name', 'staff_number', 'email', 'college', 'department', 'position', 'user_id'];

    public function grants(){
        return $this->belongsToMany(Grant::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
