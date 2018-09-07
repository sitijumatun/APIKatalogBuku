<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use File;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mahasiswas = Mahasiswa::all();

        return response()->json([
            
            'mahasiswas' => $mahasiswas

            //1. $mahasiswas
            //2. 'mahasiswas' => $mahasiswas
            /*3. 'pesan' => true,
                 'dosen wali' => 'Prayitno',
                 'mahasiswas' => $mahasiswas
            */

        ],200);
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
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->email = $request->email;

        //untuk uoload foto
        if($request->hasFile('foto')){
            $foto = time().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('foto'),$foto);
            $mahasiswa->foto=$foto;
        }
        else
        {
            $mahasiswa->foto = ''; 
        }
       
        $mahasiswa->save();
        //
        return response()->json([
            'pesan'=>'Data berhasil disimpan'

        ],200);
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
        $mahasiswa = Mahasiswa::find($id);

        return response()->json([
            'mahasiswas' => $mahasiswa
        ],200);
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
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->email = $request->email;

        if($request->hasFile('foto')){
            if(File::exists('foto/'.$mahasiswa->foto)){
                File::delete('foto/'.$mahasiswa->foto);
            }

            $foto = time().'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('foto'),$foto);
            $mahasiswa->foto=$foto;

        }
        
        
        $mahasiswa->save();
        //
        return response()->json([
            'pesan'=>'Data berhasil diupdate'

        ],200);
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
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        if(File::exists('foto/'.$mahasiswa->foto)){
                File::delete('foto/'.$mahasiswa->foto);
        }

        return response()->json([
            'pesan'=>'Berhasil dihapus'
        ],200);
    }
}
