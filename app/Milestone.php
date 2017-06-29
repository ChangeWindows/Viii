<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $fillable = ['id', 'os', 'name', 'codename', 'version', 'color', 'description'];
    public $incrementing = false; // I am an idiot.
}
