<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['delete_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function posts()
    {
        return $this->hasMany(Post::class);

    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_users');
    }


//    public function assignRole($role)
//    {
//        if(is_string($role))
//        {
//            return $this->roles()->save($role);
//
//        }
//
//        return $this->roles()->save(
//            Role::whereName($role)->first()
//        );
//    }

    public function hasRole($role)
    {
        if(is_string($role))
        {
            return $this->roles->contains('name', $role);

        }
        return !! $role->intersect($this->roles)->count();
    }

}