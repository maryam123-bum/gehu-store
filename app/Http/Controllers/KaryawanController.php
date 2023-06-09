<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public $access;

    public function __construct()
    {
        $this->access = "Direktur";
    }

    //menampilkan data karyawan
    public function index()
    {
        if(session('login') == "true"){
        $karyawan = Karyawan::all();

        return view('karyawan/data', [
            'judul' => 'Karyawan',
            'access' => $this->access,
            'data' => $karyawan,
            'active' => "karyawan"
        ]);
        }
        return redirect('/login');
    }

    //menambahkan data baru
    public function create()
    {
        if(session('login') == "true"){
            if(session('jabatan') == $this->access){
                return view('karyawan.tambah', [
                    'active' => "karyawan"
                ]);
            } else{
                return redirect('/');
            }
        
        }
        return redirect('/login');
    }

    //menyimpan data kedalam DB
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

        return redirect('/karyawan')->with('success', 'Tambah data karyawan berhasil');
    }

    //mengubah data
    public function edit($id)
    {
        if(session('login') == "true"){
            if(session('jabatan') == $this->access){
                $karyawan = Karyawan::where('id', $id)->first();
                return view('karyawan/ubah', [
                    'data' => $karyawan,
                    'active' => "karyawan"
                ]);
            } else{
                return redirect('/');
            }
        
        }
        return redirect('/login');
    }

    //memperbarui/merubah data pada DB
    public function update(Request $request)
    {
        Karyawan::where('id', $request->id)
            -> update([
                'nama' => $request->nama,
                'jabatan' => $request->proffesion,
                'alamat' => $request->textAddress,
                'jenis_kelamin' => $request->jekel
            ]);

        return redirect('/karyawan')->with('success', 'Ubah data karyawan berhasil');
    }

    //menghapus data
    public function destroy(Request $request)
    {
        if($request->id){
            Karyawan::where('id', $request->id)->delete();
            return redirect('karyawan')->with('success', 'Hapus data karyawan berhasil');
        }
        return redirect('/karyawan')->with('error', 'Hapus data karyawan gagal');
    }

    
}