<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\File; 
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Aktivitas;
use App\Models\Dosen;
use App\Models\Berita;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Charts\ChartPeminjaman;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function tambah(){
        return view('admin.tambah');
    }

    public function postTambahAdmin(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns', 
            'jenisKelamin' => 'required', 
            'password' => 'required|min:8|max:20|confirmed' 
        ]);
        $user = new User; 

        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->level = 'admin';
        $user->jenis_kelamin = $request->jenisKelamin; 
        $user->password = Hash::make($request->password); 

        $user->save(); 

        if(user){
            return back()->with('success','Admin baru berhasil ditambahkan!');
        }
        else{
            return back()->with('failed','Gagal menambahkan admin baru!');
        }
    }

    public function editAdmin($id){ 
        $data = User::find($id); 
        return view('admin.edit', compact('data')); 
    } 
    public function postEditAdmin(Request $request, $id) { 
        $request->validate([ 
            'name' => 'required', 
            'email' => 'required|email:dns', 
            'jenisKelamin' => 'required', 
        ]); 
        
        $user = User::find($id); 
        
        $user->name = $request->name; 
        $user->email = $request->email; 
        $user->jenis_kelamin = $request->jenisKelamin; 
        
        $user->save(); 
        if($user){ 
            return back()->with('success', 'Data admin berhasil di update!'); 
        } else {
            return back()->with('failed', 'Gagal mengupdate data admin!'); 
        } 
    } public function deleteAdmin($id){ 
        
        $data = User::find($id); 
        
        $data->delete(); 

        if($data){ 
            return back()->with('success', 'Data berhasil di hapus!'); 
        } else { 
            return back()->with('failed', 'Gagal menghapus data!'); 
        } 
    }
    public function adminBuku(Request $request){ 
        $search = $request->input('search'); 

        $data = Buku::where(function($query) use ($search) { 
            $query->where('judul_buku', 'LIKE', '%' .$search. '%'); 
        })->paginate(5); 
        
        return view('admin.buku', compact('data')); 
    } 
    
    public function tambahBuku(){
        return view('admin.tambahBuku'); 
    } 
    
    public function postTambahBuku(Request $request){ 
        $request->validate([ 
            'kodeBuku' => 'required', 
            'judulBuku' => 'required', 
            'penulis' => 'required', 
            'penerbit' => 'required', 
            'tahunTerbit' => 'required|date', 
            'gambar' => 'required|image|max:5120', 
            'deskripsi' => 'required', 
            'kategori' => 'required', 
        ]); 
        
        $buku = new Buku; 
        
        $buku->kode_buku = $request->kodeBuku; 
        $buku->judul_buku = $request->judulBuku; 
        $buku->penulis = $request->penulis; 
        $buku->penerbit = $request->penerbit; 
        $buku->tahun_terbit = $request->tahunTerbit; 
        $buku->deskripsi = $request-> deskripsi; $buku->kategori = $request-> kategori; 
        
        if($request->hasFile('gambar')) {
             $file = $request->file('gambar'); 
             $extension = $file->getClientOriginalExtension(); 
             $filename = time().'.'.$extension;
            $file->move('images/', $filename); 
            $buku->gambar = $filename; 
        } 
        
        $buku->save(); 
        
        if($buku) { 
            return back()->with('success', 'Buku baru berhasil ditambahkan!'); 
        } else{ 
            return back()->with('failed', 'Data gagal ditambahkan!'); 
        } 
    } 
    
    public function editBuku($id) { 
        $data = Buku::find($id); 
     
        return view('admin.editBuku', compact('data')); 
    }

    public function postEditBuku(Request $request, $id) { 
        $request->validate([ 
            'kodeBuku' => 'required', 
            'judulBuku' => 'required', 
            'penulis' => 'required', 
            'penerbit' => 'required', 
            'tahunTerbit' => 'required', 
            'gambar' => 'image|max:5120', 
            'deskripsi' => 'required',
            'kategori' => 'required' 
        ]); 
        $buku = Buku::find($id); 
        $buku->kode_buku = $request->kodeBuku; 
        $buku->judul_buku = $request->judulBuku; 
        $buku->penulis = $request->penulis; 
        $buku->penerbit = $request->penerbit; 
        $buku->tahun_terbit = $request->tahunTerbit; 
        $buku->deskripsi = $request->deskripsi;
        $buku->kategori = $request->kategori; 
        
        if($request->hasFile('gambar')) { 
            $filepath = 'images/'.$buku->gambar; 
            if(File::exists($filepath)) { 
                File::delete($filepath); 
            } 
            
            $file = $request->file('gambar'); 
            $extension = $file->getClientOriginalExtension(); 
            $filename = time().'.'.$extension; 
            $file->move('images/', $filename); 
            $buku->gambar = $filename; 
        } 
        $buku->save(); 

        if($buku) {
            return back()->with('success', 'Buku berhasil diupdate!'); 
        } else{ 
            return back()->with('failed', 'Buku gagal diupdate!'); 
        } 
    }

    public function deleteBuku($id) { 
        $buku = Buku::find($id); 
        $filepath = 'images/'.$buku->gambar; 
    
        if(File::exists($filepath)) { 
            File::delete($filepath); 
        } 
        
        $buku->delete(); 
        
        if($buku){ 
            return back()->with('success', 'Data buku berhasil di hapus!'); 
        } else { 
            return back()->with('failed', 'Gagal menghapus data buku!'); 
        } 
    }


    public function adminPeminjaman(Request $request, ChartPeminjaman $chartPeminjaman ) {
        $chart = $chartPeminjaman->build();

        $search = $request->input('search');
        
        $data = Peminjaman::where(function($query) use ($search) {
        $query->where('id_user', 'LIKE', '%' .$search. '%');
        })->paginate(5);
        
        
        return view('admin.peminjaman', compact('data', 'chart'));
        }
    
    public function tambahPeminjaman() {
        return view('admin.tambahPeminjaman');
    }

    public function postTambahPeminjaman(Request $request) {
        $request->validate([
            'idUser' => 'required',
            'kodeBuku' => 'required|int',
            'tanggalPeminjaman' => 'required|date',
            'tanggalPengembalian' => 'required|date'
        ]);

        $peminjaman = new Peminjaman;
        $peminjaman->id_user = $request->idUser;
        $peminjaman->id_buku = $request->kodeBuku;
        $peminjaman->tanggal_pinjam = $request->tanggalPeminjaman;
        $peminjaman->tanggal_kembali = $request->tanggalPengembalian;
        $peminjaman->status = 'Belum Dikembalikan';
        $peminjaman->save();

        if($peminjaman) {
            return back()->with('success', 'Data peminjaman berhasil ditambahkan!'); 
        } else {
            return back()->with('failed', 'Gagal menambahkan data peminjaman!');
        }
    }
    
    public function editPeminjaman($id) {
        $data = Peminjaman::find($id);
            return view('admin/editPeminjaman', compact('data'));
    }
    
    public function postEditPeminjaman(Request $request, $id) {
        $request->validate([
            'idUser' => 'required',
            'kodeBuku' => 'required|int',
            'tanggalPeminjaman' => 'required',
            'tanggalPengembalian' => 'required',
            'status' => 'required'
        ]);

        $peminjaman = Peminjaman::find($id);
        $peminjaman->id_user = $request->idUser;
        $peminjaman->id_buku = $request->kodeBuku;
        $peminjaman->tanggal_pinjam = $request->tanggalPeminjaman;
        $peminjaman->tanggal_kembali = $request->tanggalPengembalian;
        $peminjaman->status = $request->status;
        $peminjaman->save();
        
        if($peminjaman){
            return back()->with('success', 'Data peminjaman berhasil di update!'); 
        } else {
            return back()->with('failed', 'Gagal mengupdate data peminjaman!');
        }
    }
    
    public function deletePeminjaman($id) {
        $data = Peminjaman::find($id);
        $data->delete();
        
        if($data) {
            return back()->with('success', 'Data peminjaman berhasil di hapus!'); 
        } else {
            return back()->with('failed', 'Gagal menghapus data peminjaman!');
        }
    }
        
    public function detailPeminjaman($id_peminjaman, $id_user, $id_buku) {
        $detailPeminjaman = Peminjaman::select('peminjaman.*', 'bukus.*', 'users.*')
                            ->join('bukus', 'peminjaman.id_buku', '=', 'bukus.id')
                            ->join('users', 'peminjaman.id_user', '=', 'users.id')
                            ->where('peminjaman.id', $id_peminjaman)
                            ->where('bukus.id', $id_buku)
                            ->where('users.id', $id_user)
                            ->first();
        if(!$detailPeminjaman  ) {
            abort(404, 'Data tidak ditemukan');
        }

        return view('admin.detailPeminjaman', compact('detailPeminjaman'));
    }

    public function cetakDataPeminjaman() {
        $data = DB::table('peminjaman')
            ->join('users', 'users.id', '=', 'peminjaman.id_user')
            ->join('bukus', 'bukus.id', '=', 'peminjaman.id_buku')
            ->select('peminjaman.*', 'users.name', 'bukus.judul_buku')
            ->get();
            
        $pdf = PDF::loadView('admin.cetakPeminjaman', ['data' => $data]);
        return $pdf->stream();
    }

    public function dosen()
    {
        $data = Dosen::paginate(10); // Menggantinya dengan cara Anda mendapatkan data aktivitas

        return view('admin.dosen', ['data' => $data]);
    }

    public function tambahDosen() {
        return view('admin.tambahDosen');
    }

    public function postTambahDosen(Request $request)
    {
        $request->validate([
            'nidn' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'foto' => 'required|image|max:5120', // Sesuaikan dengan kebutuhan
        ]);

        $foto = $request->file('foto');
        $filename = time() . '.' . $foto->getClientOriginalExtension();
        $foto->move('images/', $filename);

        Dosen::create([
            'nidn' => $request->nidn,
            'nama' => $request->nama,
            'email' => $request->email,
            'foto' => $filename,
        ]);

        return redirect()->route('admin.dosen')->with('success', 'Dosen baru berhasil ditambahkan!');
    }
   
    public function editDosen($id) {
        $dosen = Dosen::find($id); // Mengganti Aktivitas menjadi Dosen
        return view('admin.editDosen', compact('dosen')); // Mengganti aktivitas menjadi dosen
    }

    public function postEditDosen(Request $request, $id)
{
    $request->validate([
        'nidn' => 'required',
        'nama' => 'required',
        'email' => 'required|email',
        'foto' => 'image|mimes:jpeg,png,jpg,gif', // Validasi untuk foto (jika diubah)
    ]);

    $dosen = Dosen::find($id);

    $dosen->nidn = $request->nidn;
    $dosen->nama = $request->nama;
    $dosen->email = $request->email;

    if ($request->hasFile('foto')) {
        $filepath = 'images/' . $dosen->foto;
        if (File::exists($filepath)) {
            File::delete($filepath);
        }
        $file = $request->file('foto');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('images/', $filename);
        $dosen->foto = $filename;
    }

    $dosen->save();

    if ($dosen) {
        return back()->with('success', 'Dosen berhasil diupdate!');
    } else {
        return back()->with('failed', 'Gagal mengupdate dosen!');
    }
}

    public function deleteDosen($id)
    {
        $dosen = Dosen::find($id); // Menemukan data dosen berdasarkan ID

        // Hapus foto dosen jika ada
        $filepath = 'images/' . $dosen->foto; // Mengganti $filePath menjadi $filepath
        if (File::exists($filepath)) {
            File::delete($filepath);
        }

        $dosen->delete();
        if ($dosen) {
            return back()->with('success', 'Dosen berhasil dihapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus Dosen!');
        }
    }

    public function berita()
    {
        $data = Berita::paginate(10);
        return view('admin.berita', ['data' => $data]);
    }
    
    public function tambahBerita() {
        return view('admin.tambahBerita');
    }
    public function postTambahBerita(Request $request)
{
    // Validasi data yang diinput oleh pengguna
    $request->validate([
        'judul' => 'required',
        'tanggal' => 'required|date',
        'gambar' => 'required|image|max:5120', // Sesuaikan dengan kebutuhan
        'konten' => 'required',
    ]);

    // Simpan data berita ke dalam database
    $berita = new Berita;

    $berita->judul = $request->judul;
    $berita->tanggal = $request->tanggal;
    $berita->konten = $request->konten;

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('images/', $filename);
        $berita->gambar = $filename;
    }

    $berita->save();

    if ($berita) {
        return back()->with('success', 'Berita baru berhasil ditambahkan!');
    } else {
        return back()->with('failed', 'Gagal menambahkan berita baru!');
    }
    }

    public function editBerita($id)
{
    $berita = Berita::find($id);
    return view('admin.editBerita', compact('berita'));
}

public function postEditBerita(Request $request, $id)
{
    // Validasi data yang diinput oleh pengguna
    $request->validate([
        'judul' => 'required',
        'tanggal' => 'required',
        'gambar' => 'image|max:5120', // Sesuaikan dengan kebutuhan
        'konten' => 'required',
    ]);

    $berita = Berita::find($id);

    $berita->judul = $request->judul;
    $berita->tanggal = $request->tanggal;
    $berita->konten = $request->konten;

    if ($request->hasFile('gambar')) {
        $filepath = 'images/' . $berita->gambar;
        if (File::exists($filepath)) {
            File::delete($filepath);
        }

        $file = $request->file('gambar');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('images/', $filename);
        $berita->gambar = $filename;
    }

    $berita->save();

    if ($berita) {
        return back()->with('success', 'Berita berhasil diupdate!');
    } else {
        return back()->with('failed', 'Gagal mengupdate berita!');
    }
}

public function deleteBerita($id)
{
    $berita = Berita::find($id);

    $filepath = 'images/' . $berita->gambar;
    if (File::exists($filepath)) {
        File::delete($filepath);
    }

    $berita->delete();

    if ($berita) {
        return back()->with('success', 'Berita berhasil dihapus!');
    } else {
        return back()->with('failed', 'Gagal menghapus berita!');
    }
}
    
    public function aktivitas()
    {
        $data = Aktivitas::paginate(10); // Menggantinya dengan cara Anda mendapatkan data aktivitas

        return view('admin.aktivitas', ['data' => $data]);
    }
    
    public function tambahAktivitas() {
        return view('admin.tambahAktivitas');
    }

    public function postTambahAktivitas(Request $request) {
        // Validasi data yang diinput oleh pengguna
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|max:5120', // Sesuaikan dengan kebutuhan
        ]);
    
        // Simpan data aktivitas ke dalam database
        $aktivitas = new Aktivitas;
    
        $aktivitas->judul = $request->judul;
        $aktivitas->deskripsi = $request->deskripsi;
    
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $aktivitas->gambar = $filename;
        }
    
        $aktivitas->save();
    
        if ($aktivitas) {
            return back()->with('success', 'Aktivitas baru berhasil ditambahkan!');
        } else {
            return back()->with('failed', 'Gagal menambahkan aktivitas baru!');
        }
    }

   
    public function editAktivitas($id) {
        $aktivitas = Aktivitas::find($id);
        return view('admin.editAktivitas', compact('aktivitas'));
    }

    public function postEditAktivitas(Request $request, $id) {
        // Validasi data yang diinput oleh pengguna
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|max:5120', // Sesuaikan dengan kebutuhan
        ]);
    
        $aktivitas = Aktivitas::find($id);
    
        $aktivitas->judul = $request->judul;
        $aktivitas->deskripsi = $request->deskripsi;
    
        if ($request->hasFile('gambar')) {
            $filepath = 'images/' . $aktivitas->gambar;
            if (File::exists($filepath)) {
                File::delete($filepath);
            }
    
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $aktivitas->gambar = $filename;
        }
    
        $aktivitas->save();
    
        if ($aktivitas) {
            return back()->with('success', 'Aktivitas berhasil diupdate!');
        } else {
            return back()->with('failed', 'Gagal mengupdate aktivitas!');
        }
    }

    public function deleteAktivitas($id) {
        $aktivitas = Aktivitas::find($id);
    
        $filepath = 'images/' . $aktivitas->gambar;
        if (File::exists($filepath)) {
            File::delete($filepath);
        }
    
        $aktivitas->delete();
    
        if ($aktivitas) {
            return back()->with('success', 'Aktivitas berhasil dihapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus aktivitas!');
        }
    }   
}