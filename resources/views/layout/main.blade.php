<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>

  <div class="header">
    <img src="/gambar/header.jpg" width="100%" height="40%">
  </div>

  <div class="menu">
    <b>
      <a href="/main" class="active">Home</a>
      <a href="/guru/index">Data Guru</a>
      <a href="/jurusan/index">Data Jurusan</a>
      <a href="/kelas/index">Data Kelas</a>
      <a href="/siswa/index">Data Siswa</a>
      <a href="/mapel/index">Data Mapel</a>
      <a href="/mengajar/index">Data Mengajar</a>
      <a href="/logout">Logout</a>
    </b>
  </div>

  @yield('content')

  <div class="footer">
    <p>&copy; {{ date('Y') }} - <strong>Mochamad Farhan</strong></p>
  </div>

</body>

</html>
