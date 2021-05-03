<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndikatorIku extends Model
{
    protected $table = 'indikator_iku';
    protected $guarded = ['id'];

    public function iku()
    {
        return $this->belongsTo(Iku::class, 'iku_id');
    }
    
    public function kinerjautamaeselon3()
    {
        return $this->hasMany(Iku::class, 'indikator_iku_id', 'id');
    }
    

    public function target()
    {
        return $this->hasMany(Pk::class, 'indikator_iku_id', 'id');
    }
}
