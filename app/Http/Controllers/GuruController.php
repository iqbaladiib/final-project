<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//tambahan
use Illuminate\Support\Facades\DB;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $guru = Guru::all();
        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.form');
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
        //     'nip' => 'required|uniqu:guru|min:6',
        //     'no_telp' => 'required',
        //     'user_id' => 'required'            
        // ]);
        
        // Guru::create($request->all());

        // return redirect()->route('guru.index')
        //     ->with('success', 'Data Guru Baru Berhasil Disimpan');
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
        $row = Guru::where('user_id', $id)->first();
        $user = User::where('id', $id)->first(); // Mengambil data profile yang terkait dengan user
        return view('profile.form_edit', compact('row','user'));
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
        $data_guru = [
            'nama' => $request->nama,
            'nip' => $request->nip,
            'no_telp' => $request->no_telp
        ];

        $data_user = [
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ];
        
        Guru::where('user_id', $id)->first()->update($data_guru);
        User::find($id)->update($data_user);

        return redirect()->route('guru.edit',$id)
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
        
        $row = Guru::find($id);
        
        Guru::where('id', $id)->delete();
        return redirect()->route('guru.index')
            ->with('success', 'Data Guru Berhasil Dihapus');
    }

    // public function GuruPDF()
    // {
    //     $Guru = Guru::all();
    //     $pdf = PDF::loadView('Guru.GuruPDF', ['Guru' => $Guru]);
    //     return $pdf->download('data_Guru.pdf');
    // }

    // public function GuruExcel()
    // {
    //     return Excel::download(new GuruExport, 'data_Guru.xlsx');
    // }
}
