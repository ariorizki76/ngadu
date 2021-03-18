<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Index Masyarakat
Route::get('/', 'MasyarakatController@Index')->name('masyarakat.index');


// Login & Register Masyarakat
Route::get('/login', 'Auth\LoginController@FormLoginMasyarakat');
Route::post('/login/post', 'Auth\LoginController@LoginMasyarakat')->name('masyarakat.login');
Route::get('/register', 'Auth\RegisterController@FormRegisterMasyarakat');
Route::post('/register/store', 'Auth\RegisterController@RegisterMasyarakat')->name('masyarakat.register');

// Login Petugas
Route::get('/petugas/login', 'Auth\LoginController@FormLoginPetugas');
Route::post('/petugas/login/post', 'Auth\LoginController@LoginPetugas')->name('petugas.login');

// Login & Register Admin
Route::get('/admin/login', 'Auth\LoginController@FormLoginAdmin');
Route::post('/admin/login/post', 'Auth\LoginController@LoginAdmin')->name('admin.login');
Route::get('/admin/register', 'Auth\RegisterController@FormRegisterAdmin');
Route::post('/admin/register/store', 'Auth\RegisterController@RegisterAdmin')->name('admin.register');

// Middlware Masyarakat
Route::middleware('masyarakat')->group(function(){
    Route::get('/pengaduan', 'MasyarakatController@FormPengaduan');
    Route::post('/pengaduan/simpan', 'MasyarakatController@SimpanPengaduan')->name('masyarakat.pengaduan');
    Route::get('/laporanku', 'MasyarakatController@Laporanku');
    Route::get('/logout', 'MasyarakatController@Logout')->name('masyarakat.logout');
    Route::get('/laporanku/detaillaporan/{id}', 'MasyarakatController@DetailLaporan');
});

// Middleware Petugas
Route::middleware('petugas')->group(function(){
    Route::resource('petugas', 'PetugasController')->except('show');
    Route::get('/petugas/pengaduan', 'PetugasController@TampilPengaduan');
    Route::get('/petugas/pengaduan/{id}', 'PetugasController@DetailPengaduan')->name('petugas.detailpengaduan');
    Route::get('/petugas/destroy/{id}', 'PetugasController@DestroyPengaduan')->name('petugas.destroypengaduan');
    Route::get('/petugas/detailpengaduan/{id}/tanggapan', 'TanggapanController@FormTanggapan');
    Route::post('/petugas/detailpengaduan/{id}/tanggapan', 'TanggapanController@StoreTanggapan')->name('petugas.tanggapan');
    Route::post('/petugas/detailpengaduan/onchange/{id}', 'PetugasController@StatusOnChange')->name('petugas.statusonchange');
    Route::get('/petugas/logout', 'PetugasController@Logout')->name('petugas.logout');
});

// Middleware Admin
Route::middleware('admin')->group(function(){
    Route::resource('admin', 'AdminController')->except('show');
    Route::get('/admin/pengaduan', 'AdminController@TampilPengaduan');
    Route::get('/admin/pengaduan/{id}', 'AdminController@DetailPengaduan')->name('admin.detailpengaduan');
    Route::get('/admin/pengaduans/pdf', 'AdminController@CetakPdf')->name('admin.pdf');
    Route::get('/admin/pengaduans/pdf/{id}', 'AdminController@DetailPdf')->name('admin.detailpdf');
    Route::get('/admin/logout', 'AdminController@Logout')->name('admin.logout');
});