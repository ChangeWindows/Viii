<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ring extends Model
{
    protected $fillable = ['default_name', 'default_short', 'default_acronym', 'xbox_name', 'xbox_short', 'xbox_acronym', 'other_name', 'other_short', 'other_acronym'];
}
