<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use Illuminate\Support\Facades\DB;
use App\Models\Mapel;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data
        //$Mapel = Mapel::all();
        // $mapel = Mapel::all();
        $mapel = Mapel::all();
        return view('mapel.index', compact('mapel'));
        
 
 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //arahkan ke form input data
        return view('mapel.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //proses input Mapel
        $request->validate([
            'kode_mapel' => 'required|unique:mapel|max:10',
            'nama_mapel' => 'required|max:45'            
        ]);
        
        //lakukan insert data dari request form
        Mapel::create($request->all());

        return redirect()->route('mapel.index')
            ->with('success', 'Data Mapel Baru Berhasil Disimpan');
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
        $row = Mapel::find($id);
        return view('mapel.form_edit', compact('row'));
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
            'kode_mapel' => 'required|max:10',
            'nama_mapel' => 'required|max:45'
        ]);
        //lakukan update data dari request form edit
        Mapel::find($id)->update($request->all());

        return redirect()->route('mapel.index')
            ->with('success', 'Data Mapel Berhasil Diubah');
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
        $row = Mapel::find($id);
        //setelah itu baru hapus data Mapel
        Mapel::where('id', $id)->delete();
        return redirect()->route('mapel.index')
            ->with('success', 'Data Mapel Berhasil Dihapus');
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
