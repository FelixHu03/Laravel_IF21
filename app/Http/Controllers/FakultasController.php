<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    
    public function index()
    {
        $fakultas = Fakultas::all();// select * from fakultas
        return view('fakultas.index')
                            ->with('fakultas', $fakultas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);// menampilkan data pada web
        // validasi data input
        if($request->user()->cannot('create', Fakultas::class)){
            abort(403, 'anda tidak memiliki akses');
        }
        $val = $request -> validate([
            'nama' => 'required|unique:fakultas',
            'singkatan' => 'required'
        ]);
        // simpan ke dalam tabel fakultas
        Fakultas::create($val);
        // redirect ke route fakultas
        return redirect()->route('fakultas.store')
                    -> with('success', $val['nama'] . ' berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakultas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fakultas $fakultas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakultas $fakultas)
    {
        //
    }
}
