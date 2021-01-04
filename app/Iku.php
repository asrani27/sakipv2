<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iku extends Model
{
    protected $table = 'iku';
    protected $guarded = ['id'];

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
    
    public function unitkerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_kerja_id');
    }
}
