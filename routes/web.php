<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalenderController;

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


Route::get('/', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/postlogin','App\Http\Controllers\AuthController@postlogin');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout');
Route::get('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/postregister','App\Http\Controllers\AuthController@postregister');

Route::get('/belum-verifikasi', 'App\Http\Controllers\AuthController@belumVerifikasi');

Route::get('/verifikasi-email/{id}', 'App\Http\Controllers\AuthController@verifikasiEmail');

Route::get('/resetPassword', 'App\Http\Controllers\AuthController@resetPassword');

Route::post('/postReset','App\Http\Controllers\AuthController@postReset');

Route::group(['middleware' => ['auth','checkRole:mahasiswa', 'checkEmail']], function(){
    // Dashboard
    Route::get('/mahasiswa/dashboard', 'App\Http\Controllers\mahasiswaController@dashboard');


    // Profil & pengaturan akun
    Route::get('/mahasiswa/{id}/profil','App\Http\Controllers\mahasiswaController@profile');

    Route::get('/mahasiswa/{id}/edit','App\Http\Controllers\mahasiswaController@editProfile');

    Route::post('/mahasiswa/{id}/updateProfile','App\Http\Controllers\mahasiswaController@updateProfile');

    Route::get('/mahasiswa/{id}/editakun','App\Http\Controllers\mahasiswaController@editAkun');
 
    Route::post('/mahasiswa/{id}/updateAkun','App\Http\Controllers\mahasiswaController@updateAkun');


    // Pemantauan Rutin
    Route::get('/mahasiswa/id/surveipemantauan','App\Http\Controllers\PemRutinController@index');

    Route::get('/mahasiswa/{id}/pem_rutin/{y}-{m}-{d}','App\Http\Controllers\PemRutinController@formPemRutin');

    Route::get('/mahasiswa/{id}/show_pem_rutin/{date}','App\Http\Controllers\PemRutinController@showPemRutin');

    Route::post('/mahasiswa/{id}/postPemRutin','App\Http\Controllers\PemRutinController@postPemRutin');


    // Pemantauan lokasi kegiatan QR Code
    Route::get('/mahasiswa/qrcode', 'App\Http\Controllers\PemRutinController@pemantauanLokasiKegiatan');

    Route::post('/mahasiswa/postLokasiKegiatan', 'App\Http\Controllers\PemRutinController@postLokasiKegiatan');

    Route::get('/mahasiswa/keluarLokasiKegiatan', 'App\Http\Controllers\PemRutinController@keluarLokasiKegiatan');


    // Pelaporan kasus terkonfirmasi
    Route::get('/mahasiswa/{id}/forma1', 'App\Http\Controllers\KasusTerkonfirmasiController@formA1');

    Route::post('/mahasiswa/postforma1', 'App\Http\Controllers\KasusTerkonfirmasiController@postFormA1');

    Route::get('/mahasiswa/{id}/forma2', 'App\Http\Controllers\KasusTerkonfirmasiController@formA2');

    Route::post('/mahasiswa/{id}/postforma2', 'App\Http\Controllers\KasusTerkonfirmasiController@postFormA2');


    // Pemantauan kasus kontak
    Route::get('/mahasiswa/{user_id}/pemantauan-kontak', 'App\Http\Controllers\KasusKontakController@pemantauanKontak');
    
    Route::get('/mahasiswa/{date}/{kasus_kontak_id}/formb1', 'App\Http\Controllers\KasusKontakController@formB1');
    
    Route::post('/mahasiswa/{date}/{kasus_kontak_id}/post-formB1', 'App\Http\Controllers\KasusKontakController@postFormB1');

    Route::get('/mahasiswa/{date}/{kasus_kontak_id}/formb2', 'App\Http\Controllers\KasusKontakController@formB2');

    Route::post('/mahasiswa/{date}/{kasus_kontak_id}/post-formB2', 'App\Http\Controllers\KasusKontakController@postFormB2');
    
    Route::get('/mahasiswa/{date}/{kasus_kontak_id}/formb3', 'App\Http\Controllers\KasusKontakController@formB3');

    Route::post('/mahasiswa/{date}/{kasus_kontak_id}/post-formB3', 'App\Http\Controllers\KasusKontakController@postFormB3');

    Route::get('/mahasiswa/{id}/forma1-kontak', 'App\Http\Controllers\KasusKontakController@formA1Kontak');

    Route::post('/mahasiswa/postforma1-kontak', 'App\Http\Controllers\KasusKontakController@postFormA1Kontak');
});

Route::group(['middleware' => ['auth','checkRole:admin']], function(){

    //Dashboard
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });


    //Pengaturan Akun Admin
    Route::get('/admin/{id}/editakun','App\Http\Controllers\adminController@editAkun');

    Route::post('/admin/{id}/updateAkun','App\Http\Controllers\adminController@updateAkun');

    //Pengaturan Akun Pengguna
    Route::get('/admin/akunPengguna','App\Http\Controllers\adminController@akunPengguna');

    Route::get('/admin/{id}/deleteAkunPengguna','App\Http\Controllers\adminController@deleteAkunPengguna');
    
    Route::get('/admin/{id}/resetPassword','App\Http\Controllers\adminController@resetPassword');
    
    Route::get('/admin/add','App\Http\Controllers\adminController@add');
    
    Route::post('/postadd','App\Http\Controllers\adminController@postadd');

    Route::get('/admin/{id}/editAkunPengguna','App\Http\Controllers\adminController@editAkunPengguna');

    Route::post('/admin/{id}/updateAkunPengguna','App\Http\Controllers\adminController@updateAkunPengguna');


    //Pengaturan Post
    Route::get('/admin/posts','App\Http\Controllers\postController@index');

    Route::get('/admin/add-posts','App\Http\Controllers\postController@addPost');

    Route::post('/admin/create-posts','App\Http\Controllers\postController@createPost');

    Route::get('/admin/show-posts/{id}','App\Http\Controllers\postController@showPost');

    Route::get('/admin/edit-posts/{id}','App\Http\Controllers\postController@editPost');

    Route::post('/admin/update-posts/{id}','App\Http\Controllers\postController@updatePost');

    Route::get('/admin/delete-posts/{id}','App\Http\Controllers\postController@deletePost');

});

Route::group(['middleware' => ['auth','checkRole:pemantau']], function(){

    //Dashboard
    Route::get('/pemantau/dashboard','App\Http\Controllers\timPemantauController@dashboard');

    //Pengaturan Akun
    Route::get('/pemantau/{id}/editakun','App\Http\Controllers\timPemantauController@editAkun');

    Route::post('/pemantau/{id}/updateAkun','App\Http\Controllers\timPemantauController@updateAkun');

    //Kasus Terkonfirmasi
    Route::get('/pemantau/laporan-kasus-terkonfirmasi','App\Http\Controllers\timPemantauController@laporanKasusTerkonfirmasi');

    Route::get('/pemantau/{id}/detail-laporan-kasus-terkonfirmasi','App\Http\Controllers\timPemantauController@detailLaporanKasusTerkonfirmasi');

    Route::get('/pemantau/{id}/verifikasi-laporan-kasus-terkonfirmasi','App\Http\Controllers\timPemantauController@verifikasiLaporanKasusTerkonfirmasi');

    Route::get('/pemantau/{id}/tolak-laporan-kasus-terkonfirmasi','App\Http\Controllers\timPemantauController@tolakLaporanKasusTerkonfirmasi');
    
    //Kasus Kontak
    Route::get('/pemantau/pemantauan-kasus-kontak','App\Http\Controllers\timPemantauController@pemantauanKasusKontak');

    Route::get('/pemantau/{id}/pemantauan-kasus-kontak','App\Http\Controllers\timPemantauController@detailPemantauanKasusKontak');

    Route::get('/pemantau/{date}/{kasus_kontak_id}/formb1','App\Http\Controllers\timPemantauController@showFormB1');

    Route::get('/pemantau/{date}/{kasus_kontak_id}/formb2','App\Http\Controllers\timPemantauController@showFormB2');

    Route::get('/pemantau/{date}/{kasus_kontak_id}/formb3','App\Http\Controllers\timPemantauController@showFormB3');

});

Route::group(['middleware' => ['auth','checkRole:pemantau,mahasiswa,admin']], function(){

    Route::get('/notifikasi','App\Http\Controllers\notificationController@allNotification');

    Route::get('/post-index','App\Http\Controllers\postController@postIndex');

    Route::get('/show-posts/{id}','App\Http\Controllers\postController@postShow');
});

