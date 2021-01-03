<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skpd extends Model
{
    protected $table = 'skpd';

    protected $guarded = ['id'];

    public function jabatan()
    {
        return $this->hasMany(Jabatan::class);
    }

    public function unitkerja()
    {
        return $this->hasMany(UnitKerja::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function api()
    {
        return $this->hasMany(API::class, 'kode_skpd', 'kode_skpd');
    }
}
