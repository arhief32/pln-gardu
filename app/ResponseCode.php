<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponseCode extends Model
{
    public static function success($data)
    {
        return [
            'response_code' => '00',
            'response_description' => 'Success',
            'response_data' => $data,
        ];
    }

    public static function garduFailed()
    {
        return [
            'response_code' => '01',
            'response_description' => 'Gagal mendapatkan data gardu',
            'response_data' => '',
        ];
    }

    public static function insertSuccess($data)
    {
        return [
            'response_code' => '02',
            'response_description' => 'Sukses menginput data gardu',
            'response_data' => $data,
        ];
    }

    public static function updateSuccess($data)
    {
        return [
            'response_code' => '03',
            'response_description' => 'Sukses mengupdate data gardu',
            'response_data' => $data,
        ];
    }
}
