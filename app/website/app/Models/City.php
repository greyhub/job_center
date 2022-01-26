<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = true;

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
