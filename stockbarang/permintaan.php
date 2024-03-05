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
        <title>Permintaan Barang</title>
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
                        <h1 class="mt-4">Permintaan Barang</h1>


                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Input Barang
                            </button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>QTY</th>
                                            <th>Keterangan</th>
                                            <th>NO. PP</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <!-- <th>Aksi</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $ambilpermintaan = mysqli_query($conn,"select * from permintaan");
                                        $i = 1;
                                        while($data=mysqli_fetch_array($ambilpermintaan)){
                                            $request = $data['request'];
                                            $qty = $data['qty'];
                                            $keterangan = $data['keterangan'];
                                            $pp = $data['pp'];
                                            $tanggal = $data['tanggal'];
                                            // $idp = $data['idpermintaan'];
                                        

                                        ?>
                                        <tr>
                                            <td><?=$i++;?></td>
                                            <td><?=$request;?></td>
                                            <td><?=$qty;?></td>
                                            <td><?=$keterangan;?></td>
                                            <td><?=$pp;?></td>
                                            <td><?=$tanggal;?></td>
                                             <td>
                                             <select type="option" name="status" value="<?=$status;?>" class="form-control"><br>
                                                            <option value="Prosess">Prosess
                                                            <option value="Done">Done
                                                                            </select><br>
                                            
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
        <h4 class="modal-title">Permintaan Barang</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form method="post">
      <div class="modal-body">

        <input type="text" name="request" placeholder="Request Barang" class="form-control" required><br>
        <input type="number" name="qty" placeholder="QTY Barang" class="form-control" required><br>
        <input type="text" name="keterangan" placeholder="Keterangan Barang" class="form-control" required><br>
        <input type="number" name="pp" placeholder="No PP" class="form-control" required><br>
        <input type="date" name="tanggal" placeholder="Tanggal" class="form-control" required><br>
        <select type="option" name="status" class="form-control" required><br>
                    <option value="Prosess">Prosess
                    <option value="Done">Done
                                    </select><br>
        <button type="submit" class="btn btn-primary" name="minta">Submit</button>
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