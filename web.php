<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DmDeviceController;
use App\Http\Controllers\FmDeviceController;
use App\Http\Controllers\NdDeviceController;
use App\Http\Controllers\SmDeviceController;
use App\Http\Controllers\DmReleaseController;
use App\Http\Controllers\FmReleaseController;
use App\Http\Controllers\NdReleaseController;
use App\Http\Controllers\SmReleaseController;
use League\CommonMark\Extension\SmartPunct\DashParser;

Route::redirect('/', 'dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/smreleases', [SmReleaseController::class, 'index']);
Route::get('/fmreleases', [FmReleaseController::class, 'index']);
Route::get('/dmreleases', [DmReleaseController::class, 'index']);
Route::get('/ndreleases', [NdReleaseController::class, 'index']);
Route::post('smreleases/save', [SmReleaseController::class, 'save']);
Route::delete('smreleases/delete/{id}', [SmReleaseController::class, 'delete'])->name('smreleases.delete');
Route::patch('smreleases/update/{id}', [SmReleaseController::class, 'update'])->name('smreleases.update');

Route::get('/smdevices', [SmDeviceController::class, 'index']);
Route::get('/smdevices/search', [SmDeviceController::class, 'search'])->name('smdevices.search');

Route::get('/fmdevices', [FmDeviceController::class, 'index']);
Route::get('/fmdevices/search', [FmDeviceController::class, 'search'])->name('fmdevices.search');

Route::get('/dmdevices', [DmDeviceController::class, 'index']);
Route::get('/dmdevices/search', [DmDeviceController::class, 'search'])->name('dmdevices.search');

Route::get('/nddevices', [NdDeviceController::class, 'index']);
Route::get('/nddevices/search', [NdDeviceController::class, 'search'])->name('nddevices.search');

Route::get('/githubsetup', function () {
    return view('github');
});

Route::get('/githubbuild', function () {
    return view('github');
});
