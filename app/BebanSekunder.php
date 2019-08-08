<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BebanSekunder extends Model
{
    protected $table = 'gardupln_beban_sekunder';

    protected $fillable = [
        'jurusan_1_r_n',
        'jurusan_1_s_n',
        'jurusan_1_t_n',
        'jurusan_1_r_s',
        'jurusan_1_r_t',
        'jurusan_1_s_t',
        'jurusan_1_r_total',
        'jurusan_1_s_total',
        'jurusan_1_t_total',
        'jurusan_1_n_total',
        'jurusan_2_r_n',
        'jurusan_2_s_n',
        'jurusan_2_t_n',
        'jurusan_2_r_s',
        'jurusan_2_r_t',
        'jurusan_2_s_t',
        'jurusan_2_r_total',
        'jurusan_2_s_total',
        'jurusan_2_t_total',
        'jurusan_2_n_total',
        'jurusan_3_r_n',
        'jurusan_3_s_n',
        'jurusan_3_t_n',
        'jurusan_3_r_s',
        'jurusan_3_r_t',
        'jurusan_3_s_t',
        'jurusan_3_r_total',
        'jurusan_3_s_total',
        'jurusan_3_t_total',
        'jurusan_3_n_total',
        'jurusan_4_r_n',
        'jurusan_4_s_n',
        'jurusan_4_t_n',
        'jurusan_4_r_s',
        'jurusan_4_r_t',
        'jurusan_4_s_t',
        'jurusan_4_r_total',
        'jurusan_4_s_total',
        'jurusan_4_t_total',
        'jurusan_4_n_total',
        'date_time',
    ];

    public $timestamps = false;
}
