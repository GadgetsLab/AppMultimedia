<?php

namespace RDuuke\Newbie;


use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    protected $table = 'users';

    protected $fillable = ['names', 'last_names', 'email', 'role_id', 'password'];

    protected $hidden = ['create_at', 'update_at'];

    public function setPasswordAttribute($valor)
    {
        if (!empty($valor)) {
            $this->attributes['password'] = md5($valor);
        }
    }

    public function getFullNameAttribute()
    {
        return $this->names . ' ' . $this->last_names;
    }
}