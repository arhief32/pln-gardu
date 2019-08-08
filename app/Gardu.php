<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gardu extends Model
{
    protected $table = 'gardupln_gardu';

    protected $fillable = [
        'nama_gardu',
        'alamat',
        'feeder',
        'lokasi',
        'phase',
        'section',
        'titik_netral',
        'arrester',
        'waktu',
        'petugas',
        'date_time',
    ];

    public $timestamps = false;
}
