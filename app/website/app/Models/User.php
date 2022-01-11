<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'users';

    public $timestamps = true;

    const ROLE_USER = 'user';

    protected $fillable = [
            'email',
            'first_name',
            'last_name',
            'birthday',
            'city_id',
            'gender',
            'sector',
            'role',
            'password',
        ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    protected $attributes = [
        'role' => self::ROLE_USER,
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
