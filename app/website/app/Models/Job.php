<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $timestamps = true;

        protected $fillable = [
            'url',
            'title',
            'slug',
            'image_url',
            'city_id',
            'update_time',
            'job_experience_years',
            'status',
        ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
