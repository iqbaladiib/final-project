<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use Illuminate\Support\Facades\DB;
use App\Models\Guru;
use App\Models\Siswa;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        
        $row = Profile::find($id);
        return view('Profile.form_edit', compact('row'));
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
        //proses input pegawai
        $request->validate([
            'kode_Profile' => 'required|max:10',
            'nama_Profile' => 'required|max:45'
        ]);
        //lakukan update data dari request form edit
        Profile::find($id)->update($request->all());

        return redirect()->route('Profile.index')
            ->with('success', 'Data Profile Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //sebelum hapus data, hapus terlebih dahulu fisik file fotonya jika ada
        $row = Profile::find($id);
        //setelah itu baru hapus data Profile
        Profile::where('id', $id)->delete();
        return redirect()->route('Profile.index')
            ->with('success', 'Data Profile Berhasil Dihapus');
    }

    // public function MapelPDF()
    // {
    //     $Mapel = Mapel::all();
    //     $pdf = PDF::loadView('mapel.MapelPDF', ['Mapel' => $Mapel]);
    //     return $pdf->download('data_Mapel.pdf');
    // }

    // public function MapelExcel()
    // {
    //     return Excel::download(new MapelExport, 'data_Mapel.xlsx');
    // }
}
