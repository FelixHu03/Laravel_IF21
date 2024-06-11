<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout/main');
});

Route::get('about', function (){
    return "Halaman About";
});

Route::get('profile', function (){
    return view('profile');
});
Route::resource('fakultas', FakultasController::class);
Route::resource('prodi', ProdiController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::get('dashboard', [DashboardController::class,'index']);