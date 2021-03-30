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
    Route::resource('/masyarakat', 'MasyarakatController')->except('show');
    Route::get('/masyarakat', 'MasyarakatController@Dashboard');
    Route::get('/masyarakat/pengaduan', 'MasyarakatController@FormPengaduan');
    Route::post('/masyarakat/pengaduan/simpan', 'MasyarakatController@SimpanPengaduan')->name('masyarakat.pengaduan');
    Route::get('/masyarakat/laporanku', 'MasyarakatController@Laporanku');
    Route::get('masyarakat/detaillaporan/{id}', 'MasyarakatController@DetailLaporan')->name('masyarakat.detaillaporan');
    Route::get('/masyarakat/profile', 'MasyarakatController@ProfileMasyarakat');
    Route::patch('/masyarakat/profile/update', 'MasyarakatController@UpdateMasyarakat')->name('masyarakat.update');
    Route::get('/masyarakat/logout', 'MasyarakatController@Logout')->name('masyarakat.logout');
});

// Middleware Petugas
Route::middleware('petugas')->group(function(){
    Route::resource('petugas', 'PetugasController')->except('show');
    Route::get('/petugas/pengaduan', 'PetugasController@TampilPengaduan');
    Route::get('/petugas/pengaduan/{id}', 'PetugasController@DetailPengaduan')->name('petugas.detailpengaduan');
    Route::get('/petugas/destroy/{id}', 'PetugasController@DestroyPengaduan')->name('petugas.destroypengaduan');
    Route::get('/petugas/detailpengaduan/{id}/tanggapan', 'PetugasController@FormTanggapan');
    Route::post('/petugas/detailpengaduan/{id}/tanggapan', 'PetugasController@StoreTanggapan')->name('petugas.tanggapan');
    Route::post('/petugas/detailpengaduan/onchange/{id}', 'PetugasController@StatusOnChange')->name('petugas.statusonchange');
    Route::get('/petugas/masyarakat', 'PetugasController@PetugasMasyarakat');
    Route::get('/petugas/masyarakat/search', 'PetugasController@MasyarakatSearch')->name('masyarakats.search');
    Route::get('/petugas/profile', 'PetugasController@ProfilePetugas');
    Route::patch('/petugas/profile/update', 'PetugasController@UpdatePetugas')->name('petugas.update');
    Route::get('/petugas/logout', 'PetugasController@Logout')->name('petugas.logout');
});

// Middleware Admin
Route::middleware('admin')->group(function(){
    Route::resource('admin', 'AdminController')->except('show');
    Route::get('/admin/pengaduan', 'AdminController@TampilPengaduan');
    Route::get('/admin/pengaduan/{id}', 'AdminController@DetailPengaduan')->name('admin.detailpengaduan');
    Route::get('/admin/detailpengaduan/{id}/tanggapan', 'AdminController@FormTanggapan');
    Route::post('/admin/detailpengaduan/{id}/tanggapan', 'AdminController@StoreTanggapan')->name('admin.tanggapan');
    Route::post('/admin/detailpengaduan/onchange/{id}', 'AdminController@StatusOnChange')->name('admin.statusonchange');
    Route::post('/admin/ubahstatusmasyarakat/{id}', 'AdminController@UbahStatusMasyarakat')->name('admin.ubahstatusmasyarakat');
    Route::get('/admin/destroypetugas/{id}', 'AdminController@DestroyPetugas')->name('admin.destroypetugas');
    Route::get('/admin/pengaduan/cetak/{tglawal}/{tglakhir}', 'AdminController@CetakPengaduanPertanggal')->name('admin.cetak');
    Route::get('/admin/pengaduan/cetak/{lokasi}', 'AdminController@CetakPengaduanLokasi')->name('admin.cetaklokasi');
    Route::get('/admin/pengaduans/pdf/{id}', 'AdminController@DetailPdf')->name('admin.detailpdf');
    Route::get('/admin/petugas', 'AdminController@AdminPetugas');
    Route::get('/admin/petugas/search', 'AdminController@PetugasSearch')->name('petugas.search');
    Route::get('/admin/masyarakat', 'AdminController@AdminMasyarakat');
    Route::get('/admin/masyarakat/search', 'AdminController@MasyarakatSearch')->name('masyarakat.search');
    Route::get('/admin/profile', 'AdminController@ProfileAdmin');
    Route::patch('/admin/profile/update', 'AdminController@UpdateAdmin')->name('admin.update');
    Route::get('/admin/logout', 'AdminController@Logout')->name('admin.logout');
});
