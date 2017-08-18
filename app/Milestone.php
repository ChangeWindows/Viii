<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    public $incrementing = false;
    protected $fillable = ['id', 'os', 'name', 'codename', 'short', 'version', 'color', 'description'];
    public $timestamps = false;
    
    public function builds() {
        return $this->hasMany( 'App\Build', 'build_id', 'id' );
    }
}
