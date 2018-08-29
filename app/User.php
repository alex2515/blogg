<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

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

    public function posts()
    {
        return $this->hasMany(Post::class); // Al usar convenciones no necesitamos pasar el iduser
    }
    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = bcrypt($password);
    }
    public function getRoleDisplayName()
    {
        return $this->roles->pluck('display_name')->implode(', ');
    }
    public function scopeAllowed($query)
    {
        if ( auth()->user()->can('view', $this) ) {
            return $query;
        }
        return $query->where('id', auth()->id());
    }
}
