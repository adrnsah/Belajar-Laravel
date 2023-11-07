<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;


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

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/auth/login', [LoginRegisterController::class, 'login'])->name('auth.login');
    Route::get('/auth/register', [LoginRegisterController::class, 'register'])->name('auth.register');
    Route::post('/postRegister', [LoginRegisterController::class, 'postRegister'])->name('postRegister');
    Route::post('/postLogin', [LoginRegisterController::class, 'postLogin'])->name('postLogin');
});

Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checklevel:admin']], function () {
    Route::get('/admin/home', [LoginRegisterController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/tambahberita', [LoginRegisterController::class, 'tambahberita'])->name('admin.tambahberita');
    Route::get('/admin/tambahlulusan', [LoginRegisterController::class, 'tambahlulusan'])->name('admin.tambahlulusan');
    Route::get('/admin/tambahDosen', [LoginRegisterController::class, 'tambahDosen'])->name('admin.tambahDosen');
    Route::get('/admin/buku', [LoginRegisterController::class, 'buku'])->name('admin.buku');
    
    Route::get('/admin/tambah', [AdminController::class, 'tambah'])->name('admin.tambah'); 
    Route::get('/editAdmin/{id}', [AdminController::class, 'editAdmin'])->name('editAdmin'); 
    Route::get('/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin'])->name('deleteAdmin');

    Route::get('/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin'])->name('deleteAdmin'); 
    
    Route::get('/admin/buku', [AdminController::class, 'adminBuku'])->name('admin.buku'); 
    Route::get('/admin/tambahBuku', [AdminController::class, 'tambahBuku'])->name('admin.tambahBuku'); 
    Route::get('/admin/editBuku/{id}', [AdminController::class, 'editBuku'])->name('admin.editBuku'); 
    Route::get('/admin/deleteBuku/{id}', [AdminController::class, 'deleteBuku'])->name('admin.deleteBuku');

    Route::get('/admin/peminjaman', [AdminController::class, 'adminPeminjaman'])->name('admin.peminjaman');
    Route::get('/admin/tambahPeminjaman', [AdminController::class, 'tambahPeminjaman'])->name('admin.tambahPeminjaman'); 
    Route::get('/admin/editPeminjaman/{id}', [AdminController::class, 'editPeminjaman'])->name('admin.editPeminjaman'); 
    Route::get('/admin/deletePeminjaman/{id}', [AdminController::class, 'deletePeminjaman'])->name('admin.deletePeminjaman'); 
    Route::get('/admin/detailPeminjaman/{id_peminjaman}/{id_user}/{id_buku}', [AdminController::class, 'detailPeminjaman'])->name('admin.detailPeminjaman'); 
    Route::get('/admin/cetakPeminjaman', [AdminController::class, 'cetakDataPeminjaman'])->name('admin.cetakDataPeminjaman');

    Route::get('/admin/aktivitas', [AdminController::class, 'aktivitas'])->name('admin.aktivitas');
    Route::get('/admin/tambahAktivitas', [AdminController::class, 'tambahAktivitas'])->name('admin.tambahAktivitas'); 
    Route::get('/admin/editAktivitas/{id}', [AdminController::class, 'editAktivitas'])->name('admin.editAktivitas'); 
    Route::get('/admin/deleteAktivitas/{id}', [AdminController::class, 'deleteAktivitas'])->name('admin.deleteAktivitas');

    Route::get('/admin/dosen', [AdminController::class, 'dosen'])->name('admin.dosen');
    Route::get('/admin/tambahDosen', [AdminController::class, 'tambahDosen'])->name('admin.tambahDosen'); 
    Route::get('/admin/editDosen/{id}', [AdminController::class, 'editDosen'])->name('admin.editDosen'); 
    Route::get('/admin/deleteDosen/{id}', [AdminController::class, 'deleteDosen'])->name('admin.deleteDosen');

    Route::get('/admin/berita', [AdminController::class, 'berita'])->name('admin.berita');
    Route::get('/admin/tambahBerita', [AdminController::class, 'tambahBerita'])->name('admin.tambahBerita'); 
    Route::get('/admin/editBerita/{id}', [AdminController::class, 'editBerita'])->name('admin.editBerita'); 
    Route::get('/admin/deleteBerita/{id}', [AdminController::class, 'deleteBerita'])->name('admin.deleteBerita');

});

Route::post('/tambahAdmin', [AdminController::class, 'postTambahAdmin'])->name('postTambahAdmin'); 
Route::post('/postEditAdmin/{id}', [AdminController::class, 'postEditAdmin'])->name('postEditAdmin');

Route::post('/postTambahBuku', [AdminController::class, 'postTambahBuku'])->name('postTambahBuku'); 
Route::post('/postEditBuku/{id}', [AdminController::class, 'postEditBuku'])->name('postEditBuku');

Route::post('/postTambahPeminjaman', [AdminController::class, 'postTambahPeminjaman'])->name('postTambahPeminjaman');
Route::post('/postEditPeminjaman/{id}', [AdminController::class, 'postEditPeminjaman'])->name('postEditPeminjaman');

Route::post('postTambahAktivitas', [AdminController::class, 'postTambahAktivitas'])->name('postTambahAktivitas'); 
Route::post('/postEditAktivitas/{id}', [AdminController::class, 'postEditAktivitas'])->name('postEditAktivitas');

Route::post('postTambahBerita', [AdminController::class, 'postTambahBerita'])->name('postTambahBerita'); 
Route::post('/postEditBerita/{id}', [AdminController::class, 'postEditBerita'])->name('postEditBerita');

Route::post('postTambahDosen', [AdminController::class, 'postTambahDosen'])->name('postTambahDosen'); 
Route::post('/postEditDosen/{id}', [AdminController::class, 'postEditDosen'])->name('postEditDosen');


Route::group(['middleware' => ['auth', 'checklevel:user']], function () {
    Route::get('/user/home', [LoginRegisterController::class, 'userHome'])->name('user.home');
    Route::get('/user/aktivitas', [LoginRegisterController::class, 'aktivitas'])->name('user.aktivitas');
    Route::get('/user/berita', [LoginRegisterController::class, 'berita'])->name('user.berita');
    Route::get('/user/lulusan', [LoginRegisterController::class, 'lulusan'])->name('user.lulusan');
    Route::get('/user/biodata', [LoginRegisterController::class, 'biodata'])->name('user.biodata');
    
});
 