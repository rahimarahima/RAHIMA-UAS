<?php
session_start();
include_once 'Connection.php';
$bansos = query("SELECT * FROM data_bohotel");
if (isset($_SESSION['Email']) == '')
  header("location: login.php");

$pinjam = query("SELECT * FROM data_bohotel");

if (isset($_POST["cari"])) {
  $pinjam = cari($_POST["key"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Halaman admin</title>
  <style>
    @media print {

      .logout,
      .navbar,
      .tambah,
      .aksi {
        display: none;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-light bg-info object-fit-cover border rounded mt-3">
      <div class="container-fluid">
        <a class="navbar-brand text-white">Selamat Datang diHalaman ketua/pimpinan</a>
        <form action="" method="post" class="d-flex ms-auto" class="serch">
          <input class="form-control me-2" type="text" name="key" aria-label="Search" autofocus autocomplete="off">
          <button class="btn btn-outline-light" type="submit" name="cari">Search</button>
        </form>
        <ul class="navbar-nav ms-2">
          <li class="nav-item">
            <a class="logout" aria-current="page" href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
          </li>
        </ul>
      </div>
    </nav>
    <figure class="text-center mt-4">
      <blockquote class="blockquote">
        <p>Data Booking Hotel</p>
      </blockquote>
      <figcaption class="blockquote-footer">
        <cite title="Source Title">Hotel Rohimah</cite>
      </figcaption>
    </figure>

    <table class="table table-hover table-bordered align-middle border border-black">
      <thead>
        <tr class="table-success table-bordered">
          <th>No</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Email</th>
          <th>Tanggal lahir</th>
          <th>jenis kelamin</th>
          <th>No telepon</th>
          <th>No kamar</th>
          <th>Jenis kamar</th>
          <th>Gambar</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($pinjam as $row) : ?>
      <tbody>
        <tr>
          <td><?= $i; ?></td>
          <td><?= $row["nama"]; ?></td>
          <td><?= $row["alamat"]; ?></td>
          <td><?= $row["email"]; ?></td>
          <td><?= $row["tanggal_lahir"]; ?></td>
          <td><?= $row["jenis_kelamin"]; ?></td>
          <td><?= $row["telepon"]; ?></td>
          <td><?= $row["no_kamar"]; ?></td>
          <td><?= $row["jenis_kamar"]; ?></td>
          <td><img src="image/<?= $row["gambar"]; ?>" width="50" height="50"></td>

        </tr>
      </tbody>
      </thead>
      <?php $i++; ?>
    <?php endforeach; ?>

    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>