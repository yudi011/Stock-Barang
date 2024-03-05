<?php
require 'function.php';
require 'cek.php';
require 'time.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Laporan Kerusakan</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href='logo.png' rel='shortcut icon'>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Pondok Indah Mall</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Stock Barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Keluar
                             <a class="nav-link" href="permintaan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Permintaan Barang
                                <a class="nav-link" href="laporan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Laporan Kerusakan
                                <a class="nav-link" href="pengajuan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Pengajuan Pemasangan
                            </a><a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Laporan Masuk</h1>


                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Input Laporan
                            </button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Tempat</th>
                                            <th>Lokasi Tempat</th>
                                            <th>Kerusakan</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $ambilsemuakerusakan = mysqli_query($conn,"select * from laporan ");
                                        $i = 1;
                                        while($data=mysqli_fetch_array($ambilsemuakerusakan)){
                                            $nama = $data['nama'];
                                            $tempat = $data['tempat'];
                                            $krs = $data['krs'];
                                            $aksi = $data['aksi'];
                                            $tgl = $data['tgl'];
                                            $idl = $data['idlaporan'];

                                        ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$nama;?></td>
                                            <td><?=$tempat;?></td>
                                            <td><?=$krs;?></td>
                                            <td><?=$aksi;?></td>
                                            <td><?=$tgl;?></td>
                                            
                                            <td>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?=$idl;?>">
                                                Edit
                                            </button>
                                            </td>
                                        </tr>
                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="edit<?=$idl;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit</h4>

                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <!-- Modal body -->
                                            <form method="post">
                                            <div class="modal-body">
                                                <br>
                                                <input type="text" name="krs" value="<?=$krs?>" class="form-control" required><br>
                                                <select type="option" name="aksi" value="<?=$aksi;?>" class="form-control" required>
                                                <option value="Progress">Progress
                                                <option value="Done">Done
                                                </select><br>
                                                <input type="hidden" name="idl" value="<?=$idl;?>">
                                                <button type="submit" class="btn btn-primary" name="kerusakanbarang">Submit</button>
                                            </div>
                                            </form>

                                            </div>
                                        </div>
                                        </div>
                                        <?php
                                        };
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
    <!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Laporan Kerusakan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form method="post">
      <div class="modal-body">
        <input type="text" name="nama" placeholder="Nama Tempat" class="form-control" required><br>
        <select type="option" name="tempat" class="form-control" required>
                                                <option value="PIM 1">PIM 1
                                                <option value="PIM 2">PIM 2
                                                <option value="PIM 3">PIM 3
                                                <option value="Street Gallery">Street Gallery
                                                <option value="Water Park">Water Park
                                                </select><br>
        <input type="text" name="krs" placeholder="Keterangan Kerusakan" class="form-control" required><br>
        <select type="option" name="aksi" placeholder="Status Kerusakan" class="form-control" required>
                    <option value="Progress">Progress
                    <option value="Done">Done
        </select><br>
        <input type="date" name="tgl" placeholder="Tanggal" class="form-control" required><br>
        <button type="submit" class="btn btn-primary" name="lpn">Submit</button>
      </div>
      </form>

    </div>
  </div>
</div>
</html>
<script>
$(document).ready( function () {
    $('#datatablesSimple').DataTable();
});
</script>