<?php

namespace App\Http\Controllers;

use App\Models\laguAlbum;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LaguAlbumController extends Controller
{
    public function index(){
        return DB::table('lagu_albums')
        ->join('lagus', 'lagus.lagu', '=', 'lagu_albums.nama_lagu')->rightJoin('albums', 'albums.nama_album', '=', 'lagu_albums.nama_album')->get();
    }

    public function addLagu($namaAlbum, $namaLagu){
        $check = DB::table('lagu_albums')->where('nama_album', $namaAlbum)->where('nama_lagu', $namaLagu)->count();
        if($check==0){
            $insert = new laguAlbum;
            $insert->nama_album = $namaAlbum;
            $insert->nama_lagu = $namaLagu;
            $insert->save();
            
            return response([
                'status'=>'Ok',
                'message'=>'Data Disimpan',
                'data'=>$insert
            ],200);
        }
    }

    public function deleteLagu($album, $lagu){
        $check = laguAlbum::firstWhere('nama_album', $album)->where('nama_lagu', $lagu);
        if($check){
            $album = laguAlbum::where('nama_album', $album)->where('nama_lagu', $lagu);
            $album->delete();

            return response([
                "status"=>'Ok',
                "message"=>'Data terhapus'
            ]);
        } else {
            return response([
                "status"=>'Not Found',
                "message"=>'Data tidak ditemukan'
            ]);
        }
    }
}
