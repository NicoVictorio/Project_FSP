<?php
require_once("class/cerita.php");

if(isset($_POST['simpan'])){
    $cerita = new Cerita();
    $userid = $_POST['iduser'];
    $ceritaid = $_POST['idcerita'];
    $paragraf = $_POST['paragraf'];
    $hasil = $cerita->tambahParagraf($userid, $ceritaid, $paragraf);
}
header("location: home.php?idusers=$userid");
?>