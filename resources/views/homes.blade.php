<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <style>
    body {
        background: linear-gradient(to bottom, #02FFFB, #ffffff);
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .navbar {
        background-color: #007BFF;
        overflow: hidden;
    }

    .navbar a {
        float: left;
        font-size: 16px;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .navbar a:hover {
        background-color: #0056b3;
    }

    .container {
        text-align: center;
        padding-top: 30px;
    }

    img {
        border-radius: 50%;
        width: 200px;
    }

    h2 {
        text-align: center;
    }

    table,
    th,
    td {
        border: 1px solid black;
        margin: 0 auto;
    }

    table {
        width: 80%;
    }

    th,
    td {
        padding: 10px;
    }

    .copyright {
        text-align: center;
        margin-top: 20px;
        color: #555;
    }
    </style>
</head>

<body>
    <div class="navbar">
        <a href="home.html">Home</a>
        <a href="mycv.php">My CV</a>
        <a href="contact.html">Contact</a>
        <a href="login.html">Login</a>
    </div>

    <div class="container">
        <img src="{{ asset ('image/Adriansyah.jpg')}}" width="100" style="border-radius: 50%;">
        <h2>ADRIANSYAH</h2>
        <h4>WAKIL AGENSE</h4>
        <hr>
        <h2>Overview</h2>
        <p>Ikan Hiu Cuci Piring, Yaudaahhh ikan nya rajin</p>

        <table>
            <tr>
                <th>Skill</th>
                <th>Pengalaman</th>
            </tr>
            <tr>
                <td>Saya tidak terlalu menguasai semua bahasa pemograman</td>
                <td>Menjadi ketua devisi permata ukmi al-ishlah</td>
            </tr>
        </table>
        <hr>
        <h4 class="copyright">Copyright 2023 @Adriansyah</h4>
    </div>
</body>

</html>