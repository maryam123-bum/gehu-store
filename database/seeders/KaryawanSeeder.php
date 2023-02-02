<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawans')->insert([
            'nama' => Str::random(10),
            'jabatan' => Str::random(10).'@gmail.com',
            'jenis_kelamin' => Str::random(2),
            'alamat' => Str::random(10)
        ]);
    }
}
