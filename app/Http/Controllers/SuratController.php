<?php

namespace App\Http\Controllers;

use App\Models\rujukan;
use App\Models\pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $baris = 10;
        if (strlen($katakunci)){
            $rujukan = rujukan::where('tanggal', 'like', "%$katakunci%")
            ->paginate($baris);
        }
        else{
          $rujukan = rujukan::with('pasien')->latest('id')->paginate($baris);
        }

        return view('rujukan.index')->with('rujukan',$rujukan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = pasien::all();
        return view('rujukan.create', compact('pasien'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pasien_id'=> 'required',
            'jenis_kelamin'=> 'required',
            'umur'=> 'required',
            'alamat'=> 'required',
            'no_hp'=> 'required',
            'keluhan'=> 'required',
            'diagnosa'=> 'required',
            'kasus'=> 'required',
            'terapi'=> 'required',
            'tanggal'=> 'required',
            'dr_tujuan'=> 'required',
            'rs_tujuan'=> 'required',
        ],[
            'pasien_id.required' => 'pasien wajib diisi',
            'jenis_kelamin.required' => 'pasien wajib diisi',
            'umur.required' => 'umur wajib diisi',
            'alamat.required' => 'alamat wajib diisi',
            'no_hp.required' => 'no hp wajib diisi',
            'keluhan.required' => 'keluhan wajib diisi',
            'diagnosa.required' => 'diagnosa wajib diisi',
            'kasus.required' => 'kasus wajib diisi',
            'terapi.required' => 'terapi wajib diisi',
            'tanggal.required' => 'tanggal wajib diisi',
            'dr_tujuan.required' => 'dr tujuan wajib diisi',
            'rs_tujuan.required' => 'rumah sakit tujuan wajib diisi',
        ]);
        $rujukan =[
            'pasien_id'=>$request->pasien_id,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'umur'=>$request->umur,
            'alamat'=>$request->alamat,
            'no_hp'=>$request->no_hp,
            'keluhan'=>$request->keluhan,
            'diagnosa'=>$request->diagnosa,
            'kasus'=>$request->kasus,
            'terapi'=>$request->terapi,
            'tanggal'=>$request->tanggal,
            'dr_tujuan'=>$request->dr_tujuan,
            'rs_tujuan'=>$request->rs_tujuan,
        ];
        rujukan::create($rujukan);
        return redirect()->to('rujukan')->with('success', 'Pastikan kembali jika data yang ditambahkan telah sesuai.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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

    public function detail($id)
    {
        $pasien = Pasien::all();
        $rujukan = rujukan::with('pasien')->where('id', $id)->first();
        return view('rujukan.detail', compact('pasien', 'rujukan'));
    }
}
