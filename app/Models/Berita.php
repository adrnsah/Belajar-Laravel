<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = "berita"; // Sesuaikan dengan nama tabel di database Anda

    protected $fillable = [
        'judul', 
        'tanggal', 
        'gambar', 
        'konten'
    ];
}