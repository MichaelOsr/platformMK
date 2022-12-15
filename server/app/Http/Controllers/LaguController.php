<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lagu;

class LaguController extends Controller
{
    public function index()
    {
        return Lagu::all();
    }

    public function findLagu($nama) {
        return Lagu::where('lagu', 'like', "%".$nama."%") -> get();
    }
}
