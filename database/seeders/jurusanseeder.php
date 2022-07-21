<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class jurusanseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = [
            ['kode_mapel' => '1001', 'nama_mapel' => 'Rekayasa Perangkat Lunak', 'semester' => 'Ganjil', 'jurusan' => 'RPL'],    
        ];
        DB::table('jurusan')->insert($table);
    }
}
