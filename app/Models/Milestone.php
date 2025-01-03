<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Milestone extends Model
{
    use HasFactory;
    protected $fillable = ['milestone_title', 'completion_date', 'deliverable', 'status', 'remarks', 'grant_id'];

    public function grant(){
        return $this->belongsTo(Grant::class);
    }
}
