<?php

namespace App\Models;

use App\Http\Controllers\KotaController;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ['npm','nama','tempat_lahir','tanggal_lahir',
     'alamat', 'kota_id', 'prodi_id', 'url_foto'];
    public $incrementing = false;

    protected $table = 'mahasiswas';
    
    public function kota(){
        return $this-> belongsTo(kota::class,'kota_id');
        
    }
    public function prodi(){
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

}
