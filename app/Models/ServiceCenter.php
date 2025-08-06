<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCenter extends Model
{
    protected $table = 'service_centers';

    protected $fillable = [
        'nama',
        'alamat',
        'waktu_pelayanan',
    ];

    public $timestamps = false;
}
