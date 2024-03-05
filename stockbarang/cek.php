<?php
//Jika belom Login

if(isset($_SESSION['log'])){

} else {
    header('location:login.php');
}
?>