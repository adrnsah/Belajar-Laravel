<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Lulusan Rekayasa Perangkat Lunak</title>
    <!-- Sertakan Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis | D-IV Rekayasa Perangkat Lunak</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('user.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.berita') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="{{ route('user.lulusan') }}">Profile Lulusan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('user.aktivitas') }}">Aktivitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('user.biodata') }}">Biodata</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <div class="jumbotron text-center">
        <h1>Profil Lulusan Rekayasa Perangkat Lunak</h1>
        <p>Melihat pencapaian lulusan kami</p>
    </div>

    <!-- Konten Profil Lulusan -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Lulusan Sukses</h2>
                <p>
                    Muhammad Ali adalah seorang lulusan mahasiswa Politeknik Negeri Bengkalis, dengan jurusan Rekayasa
                    Perangkat Lunak,
                    yang mana sekarang ia telah membangun sebuah perusahaan ROBOTICS di indonesia.
                </p>
            </div>
            <div class="col-md-6">
                <h2>Alumni Terkenal</h2>
                <ul>
                    <li>Muhammad Ali</li>
                    <li>Riski Adelisa</li>
                    <li>Satrio Patrio</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Sertakan Bootstrap JS (jQuery harus diikutsertakan sebelum Bootstrap JS) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>