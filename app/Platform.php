<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;
    
    public function deltas() {
        return $this->belongsTo( 'App\Delta', 'delta_id', 'id' );
    }
}
