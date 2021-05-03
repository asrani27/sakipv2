<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndikatorIku2 extends Model
{
    protected $table = 'indikator_iku2';
    protected $guarded = ['id'];

    public function iku2()
    {
        return $this->belongsTo(Iku2::class, 'iku2_id');
    }
    
    public function iku3()
    {
        return $this->hasMany(Iku3::class, 'indikator_iku2_id');
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class, 'tahun_id');
    }
}
