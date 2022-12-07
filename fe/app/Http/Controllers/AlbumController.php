<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AlbumController extends Controller
{
    public function getAlbum(){
        $data = Http::get('http://127.0.0.1:8001/api/albums/')->json();
        return view('album',['dataAlbum'=>$data]);
    }

    public function createAlbum(Request $request){
        $data = Http::post('http://127.0.0.1:8001/api/albums/create',[
            'namaAlbum' => $request->input('namaAlbum'),
        ]);

        return redirect('/');
    }

    public function deleteAlbum($nama){
        $data = Http::delete('http://127.0.0.1:8001/api/albums/delete/'.$nama);

        return redirect('/');
    }

    public function cover(Request $request, $nama){
        if($request->hasfile('cover')){
            $file= $request->cover;
            // $filename= $file->getClientOriginalName();
            $filename= date('YmdHi').$file->getClientOriginalName();
            // $file-> move(public_path('public/Cover'), $filename);
            $path = $request->file('cover')->storeAs('cover', $filename);
            $data = Http::put('http://127.0.0.1:8001/api/albums/cover/'.$nama."&".$filename);
        }
        return redirect('/');
    }
}
