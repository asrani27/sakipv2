<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pk_indikator extends Model
{
    protected $table = 'pk_indikator';

    protected $guarded = ['id'];

    public function pk()
    {
        return $this->belongsTo(Pk::class, 'pk_id');
    }
}
