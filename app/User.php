<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

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

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }

    public function pegawai()
    {
        return $this->hasOne(Pegawai::class);
    }

    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->count() == 1;
    }

    public function skpd()
    {
        return $this->hasOne(Skpd::class);
    }
    
    public function pk()
    {
        return $this->pegawai->unitkerja->pk;
    }

    public function tingkat()
    {
        return $this->pegawai->unitkerja();
    }
}
