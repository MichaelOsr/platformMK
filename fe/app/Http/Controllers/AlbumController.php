<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AlbumController extends Controller
{
    public function index(){
        $dataAlbum = Http::get('http://127.0.0.1:8001/api/albums/')->json();
        $dataLagu = Http::get('http://127.0.0.1:8001/api/lagus/')->json();
        $dataList = Http::get('http://127.0.0.1:8001/api/listLagu')->json();


        return view('album',['dataAlbum'=>$dataAlbum, 'dataLagu'=>$dataLagu, 'dataList' => $dataList]);
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
            $path = $request->file('cover')->storeAs('public/cover', $filename);
            $data = Http::put('http://127.0.0.1:8001/api/albums/cover/'.$nama."&".$filename);
        }
        return redirect('/');
    }

    public function getListLagu($namaAlbum){
        $dataList = Http::get('http://127.0.0.1:8001/api/listLagu/'.$namaAlbum)->json();

        return $dataList;
        
    }

    public function addLagu($namaAlbum, $namaLagu){
        $data = Http::post('http://127.0.0.1:8001/api/listLagu/create/'.$namaAlbum.'&'.$namaLagu);

        return redirect('/');
    }

    public function deleteLagu($namaAlbum, $namaLagu){
        $data = Http::delete('http://127.0.0.1:8001/api/deleteLagu/'.$namaAlbum.'&'.$namaLagu);

        return redirect('/');
    }

    // public function search(Request $request) {
    //     $output = "";
    //     // $lagus = DB::select("SELECT lagu FROM lagus WHERE lagu LIKE '%$request->name%';");
    //     $lagus = Http::get('http://127.0.0.1:8001/api/lagus/'.$request->name);


    //     foreach ($lagus as $lagu) {
    //         $output .= $lagu; 
    //     }

    //     return response($output);
    // }

    public function search($cari) {
        $lagus = Http::get('http://127.0.0.1:8001/api/lagus/'.$cari)->json();

        // return $lagus;
        // dd($lagus);
        // return($lagus[0]['lagu']);
        $output = "";
        $rows = [];
        foreach($lagus as $lagu) {
            $output .= "
            <div class='border-b-2 flex items-center justify-between p-4 w-[30rem]'>
            <div class='flex items-center justify-start gap-3'>
                <img class='w-16 h-16 rounded-full' src='".$lagu['thumbnail']."'>
                <p class='font-medium'>".$lagu['lagu']."</p>
                <p class='font-light'>".$lagu['artis']."</p>
            </div>
            <div>
                "."
                <button onclick='saveLagu(".$lagu['lagu'].")' data-modal-toggle='add-to-album-modal'
                    class='block text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2.5 text-center'>
                    Add
                </button>
                "."
            </div>
        </div>
            ";
        }

        return response($output);
        // dd($rows);
    }
}
