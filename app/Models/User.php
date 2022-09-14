<?php

namespace App\Models;

use App\Traits\BaseCrud;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use BaseCrud, HasApiTokens, Notifiable, SoftDeletes, CascadeSoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    protected $fillable = [
        'name',
        'name_kana',
        'email',
        'password',
        'role_id',
        'access_token',
        'created_user_id',
        'updated_user_id',
    ];
}
