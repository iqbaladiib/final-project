<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Presensi;
use App\Models\Siswa;
use Illuminate\Http\Request;
//tambahan
use PDF;
use Illuminate\Support\Facades\DB;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $presensiJoin = DB::table('presensi')
                    ->join('siswa', 'presensi.siswa_id', '=', 'siswa.id')
                    ->join('jadwal', 'presensi.jadwal_id', '=', 'jadwal.id')                    
                    ->join('mapel', 'jadwal.mapel_id', '=', 'mapel.id')                    
                    ->select('presensi.*', 'siswa.nama','siswa.nisn', 'mapel.nama_mapel', 'jadwal.jam_pelajaran')
                    ->get();

        return view('presensi.index', compact('presensiJoin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $siswa = Siswa::all();
        $jadwal = Jadwal::all();
        $ar_status = ['hadir','absen','izin','sakit'];
        return view('presensi.form', compact('siswa','jadwal','ar_status'));
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
            'siswa_id' => 'required',
            'status' => 'required|string',
            'jadwal_id' => 'required'
        ]);
        
        Presensi::create($request->all());

        return redirect()->route('presensi.index')
            ->with('success', 'Data Presensi Baru Berhasil Disimpan');
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
        $row = Presensi::find($id);
        $siswa = Siswa::all();
        $jadwal = Jadwal::all();
        $ar_status = ['hadir','absen','izin','sakit'];
        return view('presensi.form_edit', compact('row','siswa','jadwal','ar_status'));
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
        
        $request->validate([
            'siswa_id' => '',
            'status' => '|string',
            'jadwal_id' => ''
        ]);
        
        Presensi::find($id)->update($request->all());

        return redirect()->route('presensi.index')
            ->with('success', 'Data Presensi Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $row = Presensi::find($id);
        
        Presensi::where('id', $id)->delete();
        return redirect()->route('presensi.index')
            ->with('success', 'Data Presensi Berhasil Dihapus');
    }

    public function exportPDF()
    {
        $data = DB::table('presensi')
                    ->join('siswa', 'presensi.siswa_id', '=', 'siswa.id')
                    ->join('kelas', 'siswa.kelas_id', '=', 'kelas.id')
                    ->join('jadwal', 'presensi.jadwal_id', '=', 'jadwal.id')                    
                    ->join('mapel', 'jadwal.mapel_id', '=', 'mapel.id')                    
                    ->select('presensi.*', 'siswa.nama','siswa.nisn','kelas.nama_kelas', 'mapel.nama_mapel', 'jadwal.jam_pelajaran','jadwal.hari')
                    ->get();
        view()->share('data',$data);
        $pdf = PDF::loadview('presensi.exportPDF');
        return $pdf->download('exportPresensi.pdf');
    }



}
