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
        <title>Barang Masuk</title>
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
                        <h1 class="mt-4">Barang Keluar</h1>


                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Output Barang
                            </button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Titik</th>
                                            <th>Lokasi</th>
                                            <th>QTY</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $ambilsemuadatastock = mysqli_query($conn,"select * from keluar k, stock s where s.idbarang = k.idbarang");
                                        while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                            $namabarang = $data['namabarang'];
                                            $titik = $data['titik'];
                                            $lokasi = $data['lokasi'];
                                            $qty = $data['qty'];
                                            $tanggal = $data['tanggal'];
                                            $idk = $data['idkeluar'];
                                        ?>
                                        <tr>
                                            <td><?=$namabarang;?></td>
                                            <td><?=$titik;?></td>
                                            <td><?=$lokasi;?></td>
                                            <td><?=$qty;?></td>
                                            <td><?=$tanggal;?></td>
                                            <td>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?=$idk;?>">
                                                Edit
                                            </button>
                                            </td>
                                        </tr>
                                             <!-- Edit Kelur -->
                                         <div class="modal fade" id="edit<?=$idk;?>">
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
                                                <input type="text" name="titik" value="<?=$titik;?>" class="form-control" required><br>
                                                <select type="option" name="lokasi" value="<?=$lokasi;?>" class="form-control" required>
                                                            <option value="PIM 1">PIM 1
                                                            <option value="PIM 2">PIM 2
                                                            <option value="PIM 3">PIM 3
                                                            <option value="Street Gallery">Street Gallery
                                                            <option value="Water Park">Water Park
                                                </select><br>
                                                <input type="number" name="qty" value="<?=$qty;?>" class="form-control" required><br>
                                                <input type="date" name="tanggal" value="<?=$tanggal;?>" class="form-control" required><br>
                                                <input type="hidden" name="idk" value="<?=$idk;?>">
                                                <button type="submit" class="btn btn-primary" name="editkeluar">Submit</button>
                                            </div>
                                            </form>

                                            </div>
                                        </div>
                                        </div>
                                        <?php
                                        }
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
                            <div class="text-muted">Copyright &copy; Pondok Indah Mall</div>
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
        <h4 class="modal-title">Barang Keluar</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <form method="post">
      <div class="modal-body">

        <select name="barangnya" class="form-control">
        <?php
                $ambilsemuadatanya = mysqli_query($conn,"select * from stock");
                while($fetcharray = mysqli_fetch_array($ambilsemuadatanya)){
                    $namabarangnya = $fetcharray['namabarang'];
                    $idbarangnya = $fetcharray['idbarang'];
            ?>
            
            <option value="<?=$idbarangnya;?>"><?=$namabarangnya;?></option>

            <?php
                }
            ?>  
        </select><br>
        <input type="text" name="titik" placeholder="Titik Pasang" class="form-control" required><br>
        <select type="option" name="lokasi" placeholder="Lokasi Pemasangan" class="form-control" required>
                    <option value="PIM 1">PIM 1
                    <option value="PIM 2">PIM 2
                    <option value="PIM 3">PIM 3
                    <option value="Street Gallery">Street Gallery
                    <option value="Water Park">Water Park
        </select><br>
        <input type="number" name="qty" placeholder="QTY Barang" class="form-control" required><br>
        <input type="date" name="tanggal" placeholder="Tanggal" class="form-control" required><br>
        <button type="submit" class="btn btn-primary" name="keluar">Submit</button>
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