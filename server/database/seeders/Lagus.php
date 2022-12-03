<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Lagus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lagus')->insert([
            'lagu' => 'Shinunoga E Wa',
            'artis' => 'Fujii Kaze',
            'thumbnail' => 'https://img.youtube.com/vi/dawrQnvwMTY/hqdefault.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('lagus')->insert([
            'lagu' => 'Ghost',
            'artis' => 'Justin Bieber',
            'thumbnail' => 'https://img.youtube.com/vi/Fp8msa5uYsc/hqdefault.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('lagus')->insert([
            'lagu' => 'All We Know',
            'artis' => 'The Chainsmokers',
            'thumbnail' => 'https://img.youtube.com/vi/lEi_XBg2Fpk/hqdefault.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
