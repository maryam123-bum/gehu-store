<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $karyawan = Karyawan::all();

        return view('karyawan/data', [
            'judul' => 'Karyawan',
            'data' => $karyawan,
            'active' => "karyawan"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.tambah', [
            'active' => "karyawan"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $proffesion = $request->proffesion;
        $address = $request->textAddress;
        $gender = $request->jekel;

        Karyawan::create([
            'nama' => $firstName.' '.$lastName,
            'jabatan' => $proffesion,
            'alamat' => $address,
            'jenis_kelamin' => $gender
        ]);

        return redirect('data/karyawan')->with('success', 'Tambah data karyawan berhasil');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = Karyawan::where('id', $id)->first();
        return view('karyawan/ubah', [
            'data' => $karyawan,
            'active' => "karyawan"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Karyawan::where('id', $request->id)
            -> update([
                'nama' => $request->nama,
                'jabatan' => $request->proffesion,
                'alamat' => $request->textAddress,
                'jenis_kelamin' => $request->jekel
            ]);

        return redirect('data/karyawan')->with('success', 'Ubah data karyawan berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Karyawan::where('id', $request->id)->delete();
        return redirect('data/karyawan')->with('success', 'Hapus data karyawan berhasil');
    }
}
