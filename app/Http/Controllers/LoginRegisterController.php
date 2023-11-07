<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\File; 
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\User;
use App\Models\Berita;
use App\Models\Aktivitas;
use App\Models\Dosen;

class LoginRegisterController extends Controller
{
    public function home() {
        return view('home');
    }
    public function biodata() {
        return view('user.biodata');
    }
    public function login() {
        return view('auth.login');
    }
    public function register() {
        return view('auth.register');
    }
    public function aktivitas() {
        $data = Aktivitas::paginate(10); // Menggantinya dengan cara Anda mendapatkan data aktivitas

        return view('user.aktivitas', ['data' => $data]);
        
    }
    public function berita() {
        $data = Berita::paginate(10);
        return view('user.berita', ['data' => $data]);
        
    }
    public function lulusan() {
        return view('user.lulusan');
    }
    public function tambahberita() { 
        return view('admin.tambahberita'); 
    }
    public function tambahlulusan() { 
        return view('admin.tambahlulusan'); 
    }
    public function tambahDosen() { 
        return view('admin.tambahDosen'); 
    }
    
    public function postRegister(Request $request) { 
        $request->validate([ 
            'name' => 'required', 
            'email' => 'required|email:dns', 
            'jenisKelamin' => 'required', 
            'password' => 'required|min:8|max:20|confirmed' 
        ]); 
        $user = new User; 

        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->jenis_kelamin = $request->jenisKelamin; 
        $user->password = Hash::make($request->password); 

        $user->save(); 

        if($user){ 
            return redirect('/auth/login')->with('success', 'Akun berhasil dibuat, silahkan melakukan proses login!'); 
        } else { 
            return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!'); 
        } 
    } 
    public function postLogin(Request $request) { 
        $request->validate([ 
            'email' => 'required|email:dns', 
            'password' => 'required|min:8|max:20' 
        ]); 
        if(Auth::attempt($request->only('email', 'password'))) { 
            $user = Auth::user(); 
            if ($user->level == 'user') { 
                return redirect('/user/home'); 
            } elseif ($user->level == 'admin') { 
                return redirect('/admin/home'); 
            } 
        }
        return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!'); 
    } 
    public function logout() { 
        Auth::logout(); 
        return redirect('/'); 
    }
    
    public function adminHome(Request $request){
        $search = $request->input('search');

        $data = User::where('level','admin')
                ->where(function ($query) use ($search){
                    $query->where('name', 'LIKE', '%' . $search . '%');
                })
            ->paginate(5);
        return view('admin.home', compact('data'));
    }

    public function userHome(Request $request) {
            $search = $request->input('search');

            $data = Buku::where(function($query) use ($search) {
                $query->where('judul_buku', 'LIKE', '%' .$search. '%');
            })->paginate(5);

            return view('user.home', compact('data'));
    }

}