<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Carbon\Carbon;

class AlbumController extends Controller
{
    public function index(){
        return Album::all();
    }

    public function findAlbum($nama){
        return Album::where('nama_album', $nama)
                    -> get();
    }

    public function store(Request $request){
        $insert = new Album;
        $insert->nama_album = $request->namaAlbum;
        // if($request->filled('namaLag'))
        // $insert->nama_lagu = $request->namaLagu;
        $insert->save();

        return response([
            'status'=>'Ok',
            'message'=>'Data Disimpan',
            'data'=>$insert
        ],200);
    }

    public function deleteAlbum($nama){
        $check = Album::firstWhere('nama_album', $nama);
        if($check){
            $album = Album::where('nama_album', $nama);
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

    public function deleteLagu($album, $lagu){
        $check = Album::firstWhere('nama_album', $album)->where('nama_lagu', $lagu);
        if($check){
            $album = Album::where('nama_album', $album)->where('nama_lagu', $lagu);
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

    public function cover($namaAlbum, $namaFile){
        Album::where('nama_album', $namaAlbum)
      ->update(['cover' => $namaFile]);
      return response([
        "status"=>'Ok',
        "message"=>'Data updated'
    ]);
    }

}
