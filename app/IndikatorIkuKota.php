<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndikatorIkuKota extends Model
{
    protected $table = 'indikator_iku_kota';
    protected $guarded = ['id'];

    public function iku_kota()
    {
        return $this->belongsTo(IkuKota::class, 'iku_kota_id');
    }
}
