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
}
