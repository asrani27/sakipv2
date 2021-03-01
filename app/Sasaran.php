<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sasaran extends Model
{
    protected $table = 'sasaran';
    protected $guarded = ['id'];

    public function indikator()
    {
        return $this->hasMany(IndikatorSasaran::class, 'sasaran_id');
    }
    
    public function tahun()
    {
        return $this->belongsTo(Tahun::class, 'tahun_id');
    }
}
