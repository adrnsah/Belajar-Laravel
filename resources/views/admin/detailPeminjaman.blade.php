<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrapicons@1.10.5/font/bootstrap-icons.css">
    <title>Tambah Data</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis
                | D-IV Rakayasa Perangkat Lunak</a>
        </div>
    </nav>
    <div class="container">
        <a href="{{ route('admin.peminjaman') }}">
            <i class="bi-arrow-left h1"></i>
        </a>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px">
                    <div class="card-body">
                        <h5 class="card-title text-center">Detail
                            Peminjaman</h5>
                        <div class="text-center">
                            <img class="rounded mt-5 mb-5" style="width: 200px"
                                src="{{ asset('images/' . $detailPeminjaman->gambar) }}" alt="cover buku">
                        </div>
                        <div class="row text-center">
                            <div class="col"></div>
                            <div class="col-12">
                                <input class="form-control mb-3 text center" type="text"
                                    value="ID Peminjaman : {{ $detailPeminjaman->id }}" disabled readonly>
                                <input class="form-control mb-3 text center" type="text"
                                    value="Tanggal Peminjaman : {{ $detailPeminjaman->tanggal_pinjam }}" disabled
                                    readonly>
                                <input class="form-control mb-3 text center" type="text"
                                    value="Tanggal Pengembalian : {{ $detailPeminjaman->tanggal_kembali }}" disabled
                                    readonly>
                                <input class="form-control mb-3 text center" type="text"
                                    value="Status Pengembalian : {{ $detailPeminjaman->status }}" disabled readonly>
                                <input class="form-control mb-3 text center" type="text"
                                    value="ID Anggota : {{ $detailPeminjaman->id_user }}" disabled readonly>
                                <input class="form-control mb-3 text center" type="text"
                                    value="Nama Anggota : {{ $detailPeminjaman->name }}" disabled readonly>
                                <input class="form-control mb-3 text center" type="text"
                                    value="Email Anggota : {{ $detailPeminjaman->email }}" disabled readonly>
                                <input class="form-control mb-3 text center" type="text"
                                    value="ID Buku : {{ $detailPeminjaman->id_buku }}" disabled readonly>
                                <input class="form-control mb-3 text center" type="text"
                                    value="Kode Buku : {{ $detailPeminjaman->kode_buku }}" disabled readonly>
                                <input class="form-control mb-3 text center" type="text"
                                    value="Judul Buku : {{ $detailPeminjaman->judul_buku }}" disabled readonly>
                                <input class="form-control mb-3 text center" type="text"
                                    value="Penulis : {{ $detailPeminjaman->penulis }}" disabled readonly>
                                <input class="form-control mb-3 text center" type="text"
                                    value="Penerbit : {{ $detailPeminjaman->penerbit }}" disabled readonly>
                                <input class="form-control text-center" type="text"
                                    value="Tahun Terbit : {{ $detailPeminjaman->tahun_terbit }}" disabled readonly>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br><br><br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>