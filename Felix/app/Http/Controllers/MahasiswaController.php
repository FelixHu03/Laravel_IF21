<?php

namespace App\Http\Controllers;

use App\Models\kota;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index')->with('mahasiswa', $mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        $kota = kota::all();
        return view('mahasiswa.create')
            ->with('prodi', $prodi)
            ->with('kota', $kota);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        if($request->user()->cannot('create', Mahasiswa::class)){
            abort(403, 'anda tidak memiliki akses');
        }
        $val = $request->validate([
            'nama' => 'required',
            'npm' => 'required|unique:mahasiswas',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'kota_id' => 'required',
            'prodi_id' => 'required',
            'url_foto' => 'required|file|mimes:png,jpg|max:5000'
        ]);
        // rename file, misalnya: 2327250059.png
        // ambil ext file
        $ext = $request->url_foto->getClientOriginalExtension(); //untuk ambil extensi png/jpg
        $val['url_foto'] = $request->npm . "." . $ext;
        // upload file bisa pakai move(), storeAs()
        $request->url_foto->move('foto', $val['url_foto']);
        // foto: folder tujuan public/foto


        // simpan ke dalam tabel fakultas
        Mahasiswa::create($val);
        // redirect ke route fakultas
        return redirect()->route('mahasiswa.index')
            ->with('success', $val['nama'] . ' berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        // dd($mahasiswa);
        
        return view('mahasiswa.show')
            ->with('mahasiswa', $mahasiswa);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        // dd($mahasiswa);
        
        $prodi = Prodi::all();
        $kota = kota::all();

        return view('mahasiswa.edit')
            ->with('prodi', $prodi)
            ->with('kota', $kota)
            ->with('mahasiswa', $mahasiswa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        // dd($request);
        if ($request->hasFile('url_foto')) {
            File::delete('foto/' . $mahasiswa['url_foto']);
            $val = $request->validate([
                'nama' => 'required',
                'npm' => 'required|unique:mahasiswas',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'kota_id' => 'required',
                'prodi_id' => 'required',
                'url_foto' => 'required|file|mimes:png,jpg|max:5000'
            ]);
            // rename file, misalnya: 2327250059.png
            // ambil ext file
            $ext = $request->url_foto->getClientOriginalExtension(); //untuk ambil extensi png/jpg
            $val['url_foto'] = $request->npm . "." . $ext;
            // upload file bisa pakai move(), storeAs()
            $request->url_foto->move('foto', $val['url_foto']);
            // foto: folder tujuan public/foto
        } else {
            $val = $request->validate([
                'nama' => 'required',
                'npm' => 'required ',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'kota_id' => 'required',
                'prodi_id' => 'required',
            ]);
            // Mahasiswa::create($val);
            $mahasiswa->update($val);
            // redirect ke route fakultas

            return redirect()->route('mahasiswa.index')
                ->with('success', $val['nama'] . ' berhasil disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        // dd($mahasiswa);
        File::delete('foto/' . $mahasiswa['url_foto']); //file foto di hapus
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil dihapus');
    }
}
