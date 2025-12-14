<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'paket_id' => 'integer',
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
