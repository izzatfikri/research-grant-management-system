<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable = ['milestone_title', 'completion_date', 'deliverable', 'status', 'remarks', 'grant_id'];

    public function grant(){
        return $this->belongsTo(Grant::class);
    }
}
