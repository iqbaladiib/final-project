<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
//tambahan
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $siswaJoin =  DB::table('siswa')
                    ->join('kelas', 'siswa.kelas_id', '=', 'kelas.id')                    
                    ->select('siswa.*', 'kelas.nama_kelas')
                    ->get();
        return view('siswa.index', compact('siswaJoin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('siswa.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        // $request->validate([
        //     'nama' => 'required',
        //     'nip' => 'required|uniqu:Siswa|min:6',
        //     'no_telp' => 'required',
        //     'email' => 'required|email',
        //     'user_id' => 'required'            
        // ]);
        
        // Siswa::create($request->all());

        // return redirect()->route('siswa.index')
        //     ->with('success', 'Data Siswa Baru Berhasil Disimpan');
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
        $row = Siswa::find($id);
        $user = User::where('id', $row->user_id)->first(); 
        $kelas = Kelas::all();
        return view('profile.form_edit', compact('row','user','kelas'));
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
        
        $data_siswa = [
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'nama_ortu' => $request->nama_ortu,
            'no_telp' => $request->no_telp,
            'kelas_id' => $request->kelas_id,
        ];

        $data_user = [
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ];
        
        Siswa::find($id)->update($data_siswa);
        User::find($request->user_id)->update($data_user);

        return redirect()->route('siswa.edit',$id)
            ->with('success', 'Profile Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $row = Siswa::find($id);
        
        Siswa::where('id', $id)->delete();
        return redirect()->route('siswa.index')
            ->with('success', 'Data Siswa Berhasil Dihapus');
    }

    // public function SiswaPDF()
    // {
    //     $Siswa = Siswa::all();
    //     $pdf = PDF::loadView('Siswa.SiswaPDF', ['Siswa' => $Siswa]);
    //     return $pdf->download('data_Siswa.pdf');
    // }

    // public function SiswaExcel()
    // {
    //     return Excel::download(new SiswaExport, 'data_Siswa.xlsx');
    // }
}
