<?php
session_start();
//Membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","stockbarang");

//Menambag Barang
if(isset($_POST['submit'])){
    $namabarang = $_POST['namabarang'];
  //  $stock = $_POST['stock'];
    $deskripsi = $_POST['deskripsi'];

    $addtostock = mysqli_query($conn,"insert into stock (namabarang, stock, deskripsi) values('$namabarang','$stock','$deskripsi')");
    if($addtostock){
        header('location:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }
};

//Datang barang
if(isset($_POST['masuk'])){
    $barangnya = $_POST['barangnya'];
    $qty = $_POST['qty'];
    $faktur = $_POST['faktur'];
    $tanggal = $_POST['tanggal'];
    

    $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganqty = $stocksekarang+$qty;

    $addtomasuk = mysqli_query($conn, "insert into masuk (idbarang, qty, faktur, tanggal) values('$barangnya','$qty','$faktur','$tanggal')");
    $updatestockmasuk = mysqli_query($conn,"update stock set stock='$tambahkanstocksekarangdenganqty' where idbarang='$barangnya'");
    if($addtomasuk&&$updatestockmasuk){
        header('location:masuk.php');
    } else {
        echo 'Gagal';
        header('location:masuk.php');
    }
}

//Keluar barang
if(isset($_POST['keluar'])){
    $barangnya = $_POST['barangnya'];
    $titik = $_POST['titik'];
    $lokasi = $_POST['lokasi'];
    $qty = $_POST['qty'];
    $tanggal = $_POST['tanggal'];

    $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganqty = $stocksekarang-$qty;

    $addtokeluar = mysqli_query($conn, "insert into keluar (idbarang, titik, lokasi, qty, tanggal) values('$barangnya','$titik','$lokasi','$qty','$tanggal')");
    $updatestockkeluar = mysqli_query($conn,"update stock set stock='$tambahkanstocksekarangdenganqty' where idbarang='$barangnya'");
    if($addtokeluar&&$updatestockkeluar){
        header('location:keluar.php');
    } else {
        echo 'Gagal';
        header('location:keluar.php');
    }
}


//Update Info Barang
if(isset($_POST['updatebarang'])){
    $idb = $_POST['idb'];
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];

    $update = mysqli_query($conn,"update stock set namabarang='$namabarang', deskripsi='$deskripsi' where idbarang='$idb'");
    if($update){
        header('location:index.php');
    } else {
        echo 'Gagal';
        header('location:index.php');
    }
}

//Permintaan Barang
if(isset($_POST['minta'])){
    $request = $_POST['request'];
    $qty = $_POST['qty'];
    $keterangan = $_POST['keterangan'];
    $pp = $_POST['pp'];
    $status = $_POST['status'];
    $tanggal = $_POST['tanggal'];


    $addtopermintaan = mysqli_query($conn,"insert into permintaan (request, qty, keterangan, pp, status, tanggal) values('$request','$qty','$keterangan','$pp','$status','$tanggal')");
    if($addtopermintaan){
        header('location:permintaan.php');
    } else {
        echo 'Gagal';
        header('location:permintaan.php');
    }
};

//Update Barang
if(isset($_POST['hapusbarang'])){
    $idp = $_POST['idp'];
    $status = $_POST['status'];

    $editbarang = mysqli_query($conn,"update permintaan set status='$status', where idpermintaan='$idp'");
    if($editbarang){
        header('location:permintaan.php');
    } else {
        echo 'Gagal';
        header('location:permintaan.php');
    }
};

//Laporan Kerusakan
if(isset($_POST['lpn'])){
    $nama =$_POST['nama'];
    $tempat = $_POST['tempat'];
    $krs = $_POST['krs'];
    $aksi = $_POST['aksi'];
    $tgl = $_POST['tgl'];

    $kerusakan = mysqli_query($conn,"insert into laporan (nama, tempat, krs, aksi, tgl) values('$nama','$tempat','$krs','$aksi','$tgl')");
    if($editbarang){
        header('location:laporan.php');
    } else {
        echo 'Gagal';
        header('location:laporan.php');
    }
};
//Edit Kerusakan
if(isset($_POST['kerusakanbarang'])){
    $idl = $_POST['idl'];
    $krs = $_POST['krs'];
    $aksi = $_POST['aksi'];

    $editlaporan = mysqli_query($conn,"update laporan set krs='$krs', aksi='$aksi' where idlaporan='$idl'");
    if($editlaporan){
        header('location:laporan.php');
    } else {
        echo 'Gagal';
        header('location:laporan.php');
    }
};

//Edit Masuk
if(isset($_POST['editmasuk'])){
    $idm = $_POST['idm'];
    $qty = $_POST['qty'];
    $faktur = $_POST['faktur'];

    $editmasuk = mysqli_query($conn,"update masuk set qty='$qty', faktur='$faktur' where idmasuk='$idm'");
    if($editmasuk){
        header('location:masuk.php');
    } else {
        echo 'Gagal';
        header('location:masuk.php');
    }
};

//Edit Keluar
if(isset($_POST['editkeluar'])){
    $idk = $_POST['idk'];
    $titik = $_POST['titik'];
    $lokasi = $_POST['lokasi'];
    $qty = $_POST['qty'];
    $tanggal = $_POST['tanggal'];

    $editmasuk = mysqli_query($conn,"update keluar set titik='$titik', lokasi='$lokasi', qty='$lokasi', qty='$qty', tanggal='$tanggal' where idkeluar='$idk'");
    if($editmasuk){
        header('location:keluar.php');
    } else {
        echo 'Gagal';
        header('location:keluar.php');
    }
};

//Pengajuan
if(isset($_POST['pengajuan'])){
    $tempat = $_POST['tempat'];
    $lokasi = $_POST['lokasi'];
    $unit = $_POST['unit'];
    $sts = $_POST['sts'];
    $tanggal = $_POST['tanggal'];

    $ambilpengajuan= mysqli_query($conn,"insert into pengajuan (tempat, lokasi, unit, sts, tanggal) values('$tempat','$lokasi','$unit','$sts','$tanggal')");
    if($ambildatanya){
        header('location:pengajuan.php');
    } else {
        echo 'Gagal';
        header('location:pengajuan.php');
    }
};

	

?>