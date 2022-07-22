<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class nilaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = [
            ['nis' => 1001, 'kode_mapel' => '111', 'nilai1' => 70 ,'grade' => ''],
            ['nis' => 1002, 'kode_mapel' => '111', 'nilai1' => 70 ,'grade' => ''],
            ['nis' => 1003, 'kode_mapel' => '111', 'nilai1' => 50 ,'grade' => ''],
        ];
        DB::table('nilai')->insert($table);
    }
}
