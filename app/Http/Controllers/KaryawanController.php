<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function index()
    {

        $karyawan = Karyawan::all();

        return view('karyawan/data', [
            'judul' => 'Karyawan',
            'data' => $karyawan,
            'active' => "karyawan"
        ]);
    }

    public function create()
    {
        return view('karyawan.tambah', [
            'active' => "karyawan"
        ]);
    }

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

    public function edit($id)
    {
        $karyawan = Karyawan::where('id', $id)->first();
        return view('karyawan/ubah', [
            'data' => $karyawan,
            'active' => "karyawan"
        ]);
    }

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

    public function destroy(Request $request)
    {
        if($request->id){
            Karyawan::where('id', $request->id)->delete();
            return redirect('data/karyawan')->with('success', 'Hapus data karyawan berhasil');
        }
        return redirect('data/karyawan')->with('error', 'Hapus data karyawan gagal');
    }
}
