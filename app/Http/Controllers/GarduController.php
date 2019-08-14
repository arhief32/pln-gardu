<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gardu;
use App\BebanSekunder;
use App\ResponseCode;

class GarduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gardu = Gardu::join('gardupln_beban_sekunder', 'gardupln_gardu.id', '=', 'gardupln_beban_sekunder.gardu_id')
        ->get();

        return response()->json($gardu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gardu = new Gardu;
        $gardu->nama_gardu = $request->nama_gardu;
        $gardu->alamat = $request->alamat;
        $gardu->feeder = $request->feeder;
        $gardu->lokasi = $request->lokasi;
        $gardu->phase = $request->phase;
        $gardu->section = $request->section;
        $gardu->titik_netral = $request->titik_netral;
        $gardu->arrester = $request->arrester;
        // $gardu->waktu = $request->waktu;
        // $gardu->petugas = $request->petugas;
        // $gardu->date_time = $request->date_time;
        
        $beban_sekunder = new BebanSekunder;
        $beban_sekunder->gardu_id = $gardu->id;
        try{
            $gardu->save();
            $beban_sekunder->save();
        } catch(\Exception $exception) {
            return response()->json(ResponseCode::_500($exception->getMessage()));
        }

        return response()->json(ResponseCode::insertSuccess([
            'gardu' => $gardu,
            'beban_sekunder' => $beban_sekunder,
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nama_gardu)
    {
        // $nama_gardu = base64_decode($nama_gardu);
        
        $gardu = Gardu::where('gardupln_gardu.nama_gardu', $nama_gardu)
        ->join('gardupln_beban_sekunder', 'gardupln_gardu.id', '=', 'gardupln_beban_sekunder.gardu_id')
        ->first();

        if($gardu == false)
        {
            return response()->json(ResponseCode::garduFailed());
        }

        isset($gardu->date_time) ? $gardu->tanggal = date('Y-m-d',strtotime($gardu->date_time)) : $gardu->tanggal = null;
        isset($gardu->petugas) ? $gardu->petugas = $gardu->petugas : $gardu->petugas = null;
        isset($gardu->waktu) ? $gardu->waktu = $gardu->waktu : $gardu->waktu = null;
        isset($gardu->date_time) ? $gardu->jam = date('H:m:s',strtotime($gardu->date_time)) : $gardu->jam = null;

        return response()->json(ResponseCode::success($gardu));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nama_gardu)
    {
        $gardu = Gardu::where('nama_gardu', $nama_gardu)->first();
        $gardu->waktu = $request->waktu;
        $gardu->petugas = $request->petugas;
        $gardu->date_time_gardu = date('Y-m-d H:i:s');
        $gardu->save(); 

        $beban_sekunder = BebanSekunder::where('gardu_id', $gardu->id)
        ->update([
            'jurusan_1_r_n' => $request->jurusan_1_r_n,
            'jurusan_1_s_n' => $request->jurusan_1_s_n,
            'jurusan_1_t_n' => $request->jurusan_1_t_n,
            'jurusan_1_r_s' => $request->jurusan_1_r_s,
            'jurusan_1_r_t' => $request->jurusan_1_r_t,
            'jurusan_1_s_t' => $request->jurusan_1_s_t,
            'jurusan_1_r_total' => $request->jurusan_1_r_total,
            'jurusan_1_s_total' => $request->jurusan_1_s_total,
            'jurusan_1_t_total' => $request->jurusan_1_t_total,
            'jurusan_1_n_total' => $request->jurusan_1_n_total,
            'jurusan_2_r_n' => $request->jurusan_2_r_n,
            'jurusan_2_s_n' => $request->jurusan_2_s_n,
            'jurusan_2_t_n' => $request->jurusan_2_t_n,
            'jurusan_2_r_s' => $request->jurusan_2_r_s,
            'jurusan_2_r_t' => $request->jurusan_2_r_t,
            'jurusan_2_s_t' => $request->jurusan_2_s_t,
            'jurusan_2_r_total' => $request->jurusan_2_r_total,
            'jurusan_2_s_total' => $request->jurusan_2_s_total,
            'jurusan_2_t_total' => $request->jurusan_2_t_total,
            'jurusan_2_n_total' => $request->jurusan_2_n_total,
            'jurusan_3_r_n' => $request->jurusan_3_r_n,
            'jurusan_3_s_n' => $request->jurusan_3_s_n,
            'jurusan_3_t_n' => $request->jurusan_3_t_n,
            'jurusan_3_r_s' => $request->jurusan_3_r_s,
            'jurusan_3_r_t' => $request->jurusan_3_r_t,
            'jurusan_3_s_t' => $request->jurusan_3_s_t,
            'jurusan_3_r_total' => $request->jurusan_3_r_total,
            'jurusan_3_s_total' => $request->jurusan_3_s_total,
            'jurusan_3_t_total' => $request->jurusan_3_t_total,
            'jurusan_3_n_total' => $request->jurusan_3_n_total,
            'jurusan_4_r_n' => $request->jurusan_4_r_n,
            'jurusan_4_s_n' => $request->jurusan_4_s_n,
            'jurusan_4_t_n' => $request->jurusan_4_t_n,
            'jurusan_4_r_s' => $request->jurusan_4_r_s,
            'jurusan_4_r_t' => $request->jurusan_4_r_t,
            'jurusan_4_s_t' => $request->jurusan_4_s_t,
            'jurusan_4_r_total' => $request->jurusan_4_r_total,
            'jurusan_4_s_total' => $request->jurusan_4_s_total,
            'jurusan_4_t_total' => $request->jurusan_4_t_total,
            'jurusan_4_n_total' => $request->jurusan_4_n_total,
            'date_time_beban_sekunder' => date('Y-m-d H:i:s'),
        ]);
        
        return response()->json(ResponseCode::updateSuccess($beban_sekunder));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
