<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.form');
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
            'kode_kelas' => 'required|unique:kelas|max:10',
            'nama_kelas' => 'required|max:45'            
        ]);
        
        Kelas::create($request->all());

        return redirect()->route('kelas.index')
            ->with('success', 'Data Kelas Baru Berhasil Disimpan');
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
        $row = Kelas::find($id);
        return view('kelas.form_edit', compact('row'));
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
            'kode_kelas' => 'required|max:10',
            'nama_kelas' => 'required|max:45'
        ]);
        
        Kelas::find($id)->update($request->all());

        return redirect()->route('kelas.index')
            ->with('success', 'Data Kelas Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $row = Kelas::find($id);
        
        Kelas::where('id', $id)->delete();
        return redirect()->route('kelas.index')
            ->with('success', 'Data Kelas Berhasil Dihapus');
    }

    // public function KelasPDF()
    // {
    //     $Kelas = Kelas::all();
    //     $pdf = PDF::loadView('Kelas.KelasPDF', ['Kelas' => $Kelas]);
    //     return $pdf->download('data_Kelas.pdf');
    // }

    // public function KelasExcel()
    // {
    //     return Excel::download(new KelasExport, 'data_Kelas.xlsx');
    // }
}
