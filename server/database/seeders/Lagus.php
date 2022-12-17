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
        
        DB::table('lagus')->insert([
            'lagu' => 'Closer',
            'artis' => 'The Chainsmokers',
            'thumbnail' => 'https://i.ytimg.com/vi/PT2_F-1esPk/hqdefault.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('lagus')->insert([
            'lagu' => 'Humble',
            'artis' => 'Kendrick Lamar',
            'thumbnail' => 'https://i.ytimg.com/vi/tvTRZJ-4EyI/0.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('lagus')->insert([
            'lagu' => 'Gone, Gone, Gone',
            'artis' => 'Phillip Phillips',
            'thumbnail' => 'https://i.ytimg.com/vi/oozQ4yV__Vw/0.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('lagus')->insert([
            'lagu' => 'Something Just Like This',
            'artis' => 'The Chainsmokers',
            'thumbnail' => 'https://i.ytimg.com/vi/owTWCbq_nSk/0.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
