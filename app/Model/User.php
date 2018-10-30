<?php

namespace ATS\Model;

use Bouncer;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Input;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * ATS\User
 *
 * @property-read \ATS\Docente $docente
 * @property-read mixed $full_name
 * @property-read mixed $type_user
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-write mixed $password
 * @property-write mixed $path
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $username
 * @property string $type
 * @property string $email
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\User wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\User whereUsername($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Ability[] $abilities
 * @property-read \Illuminate\Database\Eloquent\Collection|\Silber\Bouncer\Database\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\User whereIs($role)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\User whereIsAll($role)
 * @method static \Illuminate\Database\Eloquent\Builder|\ATS\Model\User whereIsNot($role)
 */
class User extends Authenticatable
{
    use Notifiable, HasRolesAndAbilities, SoftDeletes;

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
        return Bouncer::is($this)->an('admin');
    }
    public function isDocente(){
        return Bouncer::is($this)->an('docente');
    }
    public function isSecretaria(){
        return Bouncer::is($this)->an('secretaria');
    }
    public function isCoordinador(){
        return Bouncer::is($this)->an('coordinador');
    }
    public function setPathAttribute($path)
    {
        if (is_null($path)){
            $this->attributes['path'] = "no-user-image.png";
        }
        if (!empty($path)) {
            $image = \Image::make(Input::file('path'))->orientate()->encode('jpg',100);
            $image->resize(350,null,function ($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $name = Carbon::now()->second.$path->getClientOriginalName();
            $this->attributes['path'] = $name;
            \Storage::disk('users')->put($name,$image);
        }
    }
}
