<?php
session_start();
include_once 'Connection.php';
$pinjam = query("SELECT * FROM data_bohotel");
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
        <a class="navbar-brand text-white">Selamat Datang diHalaman Admin</a>
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
    <a href="tambah.php" class="tambah">
      <button type="button" class="btn btn-primary mb-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
        </svg>Tambah
      </button>
    </a>
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
          <th class="aksi">Aksi</th>
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
          <td><?= $row["jenis_kamar"]; ?></td>
          <td><?= $row["no_kamar"]; ?></td>
          <td><img src="image/<?= $row["gambar"]; ?>" width="50" height="50"></td>
          <td class="aksi">
            <a href="edit.php?id=<?= $row["id"]; ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
              </svg>
            </a>

            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin mau menghapus data?');"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
              </svg>
            </a>
            <a href=""></a>
          </td>
        </tr>
      </tbody>
      </thead>
      <?php $i++; ?>
    <?php endforeach; ?>

    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>