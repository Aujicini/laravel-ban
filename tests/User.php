<?php

namespace Tests;

use Omatamix\LaravelBan\Traits\Bannable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

class User extends Model implements AuthorizableContract, AuthenticatableContract
{
    use Authenticatable;
    use Authorizable;
    use Bannable;

    /** @var string $table The database table used by the model. */
    protected $table = 'users';

    /** @var array $fillable The attributes that are mass assignable. */
    protected $fillable = ['name', 'email', 'password'];

    /** @var array $hidden The attributes excluded from the model's JSON form. */
    protected $hidden = ['password'];
}
