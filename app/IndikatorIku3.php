<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndikatorIku3 extends Model
{
    protected $table = 'indikator_iku3';
    protected $guarded = ['id'];

    public function iku3()
    {
        return $this->belongsTo(Iku3::class, 'iku3_id');
    }
    
    public function program()
    {
        return $this->hasMany(Program::class, 'indikator_iku3_id');
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class, 'tahun_id');
    }
}
