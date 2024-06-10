<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $mahasiswaProdi = DB::select
        ("SELECT prodis.nama, COUNT(*) as jumlah 
        FROM `mahasiswas` 
        JOIN prodis on mahasiswas.prodi_id = prodi_id
        GROUP by prodis.nama");
        return view('dashboard') ->with('mahasiswaProdi', $mahasiswaProdi);
    }
}
