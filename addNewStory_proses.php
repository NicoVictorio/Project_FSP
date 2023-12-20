<?php
require_once("class/cerita.php");

if(isset($_POST['simpan'])){
    $cerita = new Cerita();
    $judul = $_POST['judul']; 
    $userid = $_POST['user'];
    $paragraf = $_POST['paragraf'];
    $hasil = $cerita->tambahCerita($judul, $userid);
    $hasil2 = $cerita->tambahParagrafPertama($userid, $judul, $paragraf);
}
header("location: home.php?idusers=$userid");
?>