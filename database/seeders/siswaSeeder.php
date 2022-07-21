<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class siswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = [
            ['nis' => 1001, 'nama_siswa' => ' Novy Safitri', 'alamat_siswa' => 'Kp.Pasawahan', 'tanggal_lahir' => '2004-11-04'],
            ['nis' => 1002, 'nama_siswa' => ' Sumiati', 'alamat_siswa'=> 'Margahayu', 'tanggal_lahir' => '2005-3-2'],
            ['nis' => 1003, 'nama_siswa' => 'Suci Oktaviani', 'alamat_siswa' => 'Bojong Citepus',  'tanggal_lahir' => '2004-10-25'],
            ['nis' => 1004, 'nama_siswa' => 'Purti Novitasari', 'alamat_siswa' => 'Kota Baru',  'tanggal_lahir' => '2005-11-10'],           
        ];
        DB::table('siswa')->insert($table);

    }
}
