<?php

namespace ATS;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Input;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','lastname','username','type','path',
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
    public function getTypeUserAttribute()
    {
        return ucwords($this->type);
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
    public function isSecretaria(){
        return $this->type === 'secretaria';
    }
    public function setPathAttribute($path)
    {
        if (is_null($path)){
            $this->attributes['path'] = "no-user-image.png";
        }
        if (!empty($path)) {
            $image = \Image::make(Input::file('path'))->resize(250,270)->encode('jpg',90);
            $name = Carbon::now()->second.$path->getClientOriginalName();
            $this->attributes['path'] = $name;
            \Storage::disk('users')->put($name,$image);
        }
    }
}
