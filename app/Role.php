<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
      'name','description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class,'role_users');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permission_roles');
    }

}
