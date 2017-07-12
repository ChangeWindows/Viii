<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    protected $fillable = ['id', 'milestone_id'];
    public $timestamps = false;
    
    public function milestones() {
        return $this->belongsTo( 'App\Milestone' );
    }
    
    public function deltas() {
        return $this->hasMany( 'App\Delta' );
    }
}
