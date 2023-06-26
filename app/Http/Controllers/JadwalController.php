<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use Illuminate\Http\Request;
//tambahan
use Illuminate\Support\Facades\DB;


class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $jadwalJoin = DB::table('jadwal')
                    ->join('kelas', 'jadwal.kelas_id', '=', 'kelas.id')
                    ->join('mapel', 'jadwal.mapel_id', '=', 'mapel.id')
                    ->join('guru', 'jadwal.guru_id', '=', 'guru.id')
                    ->select('jadwal.*', 'kelas.nama_kelas', 'mapel.nama_mapel','guru.nama as nama_guru')
                    ->get();

        return view('jadwal.index', compact('jadwalJoin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $guru = Guru::all();
        $ar_hari = ['Senin','Selasa','Rabu','Kamis','Jumat'];
        return view('jadwal.form', compact('kelas','guru','mapel','ar_hari'));
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
            'hari' => 'required',
            'jam_pelajaran' => 'required',
            'kelas_id' => 'required',
            'guru_id' => 'required',
            'mapel_id' => 'required',
        ]);
        
        Jadwal::create($request->all());

        return redirect()->route('jadwal.index')
            ->with('success', 'Data Jadwal Baru Berhasil Disimpan');
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
        $row = Jadwal::find($id);
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $guru = Guru::all();
        $ar_hari = ['senin','selasa','rabu','kamis','jumat'];
        
        return view('jadwal.form_edit', compact('row','kelas','guru','mapel','ar_hari'));
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
            'hari' => '',
            'jam_pelajaran' => '',
            'kelas_id' => '',
            'guru_id' => '',
            'mapel_id' => '',
        ]);
        
        Jadwal::find($id)->update($request->all());

        return redirect()->route('jadwal.index')
            ->with('success', 'Data Jadwal Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $row = Jadwal::find($id);
        
        Jadwal::where('id', $id)->delete();
        return redirect()->route('jadwal.index')
            ->with('success', 'Data Jadwal Berhasil Dihapus');
    }

    // public function JadwalPDF()
    // {
    //     $Jadwal = Jadwal::all();
    //     $pdf = PDF::loadView('Jadwal.JadwalPDF', ['Jadwal' => $Jadwal]);
    //     return $pdf->download('data_Jadwal.pdf');
    // }

    // public function JadwalExcel()
    // {
    //     return Excel::download(new JadwalExport, 'data_Jadwal.xlsx');
    // }
}
