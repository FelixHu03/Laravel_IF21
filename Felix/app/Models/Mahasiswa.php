<?php

namespace App\Models;

use App\Http\Controllers\KotaController;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ['id', 'alamat', 'kota_id', 'prodi_id'];

    public function mahasiswa(){
        return $this-> belongsTo(kota::class,'kota_id');
        return $this->belongsTo(Prodi::class, 'prodi_id');

    }
}
