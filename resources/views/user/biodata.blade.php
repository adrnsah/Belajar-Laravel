<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My CV</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis | D-IV Rekayasa Perangkat Lunak</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ route('user.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.berita') }}">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.lulusan') }}">Profile Lulusan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.aktivitas') }}">Aktivitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="{{ route('user.biodata') }}">Biodata</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center">MY CURRICULUM VITAE</h1>
        <h2 class="text-center text-primary">ADRIANSYAH</h2>
        <div class="text-center">
            <img src="image/Adriansyah.jpg" alt="Adriansyah" width="100" height="100" style="border-radius: 50%;">
        </div>

        <div class="text-center mt-3">
            <h3 class="text-primary">Profil Singkat</h3>
            <p><i>Saya sangat suka bermain game hingga larut malam.</i></p>
        </div>

        <div class="mt-4">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row" class="bg-info">Alamat</th>
                        <td class="bg-light">Padang</td>
                    </tr>
                    <tr>
                        <th scope="row" class="bg-info">Tempat Lahir</th>
                        <td class="bg-light">Aua Duri</td>
                    </tr>
                    <tr>
                        <th scope="row" class="bg-info">Tanggal Lahir</th>
                        <td class="bg-light">19-Juli-2002</td>
                    </tr>
                    <tr>
                        <th scope="row" class="bg-info">Sosial Media</th>
                        <td class="bg-light">
                            <ul>
                                <li>id Fb : <a href="" target="_blank">Adriansyah</a></li>
                                <li>id IG : <a href="https://www.instagram.com/_adrnsah/" target="_blank">_adrnsah</a>
                                </li>
                                <li>Email : <a href="" target="_blank">adriansyah3244@gmail.com</a></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="bg-info">Riwayat Pendidikan</th>
                        <td class="bg-light">
                            <ol>
                                <li>SD : SDN 40 Balai Tangah</li>
                                <li>SMP : SMPN 2 Tanjung Bonai</li>
                                <li>SMK : SMKN 1 Lintau Buo</li>
                            </ol>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="bg-info">Software Skill</th>
                        <td class="bg-light">
                            <ul>
                                <li>Pixellab</li>
                                <li>Figma</li>
                                <li>Microsoft Word</li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container mt-5">
        <hr class="bg-primary" style="height: 5px;">
        <h5 class="text-center" style="font-family: monospace;">Copyright 2023 @adriansyah</h5>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>