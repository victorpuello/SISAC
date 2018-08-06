<?php

namespace Ngsoft;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','lastname','username','type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function docente (){
        return $this->hasOne(Docente::class);
    }

    public function getFullNameAttribute()
    {
        return $this->name .' '.$this->lastname;
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    public function isAdmin(){
        return $this->type === 'admin';
    }
    public function isDocente(){
        return $this->type === 'docente';
    }

}
