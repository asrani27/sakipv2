<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periode';
    protected $guarded = ['id'];

    public function tahun()
    {
        return $this->hasMany(Tahun::class);
    }
}
