<?php
require_once('class/cerita.php');
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
}
if (!isset($_GET['id'])) {
    header('location:home.php');
}
$ceritaid = $_GET['id'];
$cerita = new Cerita();
$data_cerita=$cerita->lihatCeritaById($ceritaid);
$judul = $data_cerita["judul"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Cerita</title>
</head>

<body>
    <div class="container">
        <div class="judul" style="margin-left: 2%; margin-right: 2%;">
            <?php
            echo "<h1>$judul</h1>";
            ?>
        </div>
        <div class="content" style="margin-left: 5%; margin-right: 5%;">
            <?php
            $cerita = new Cerita();
            $res = $cerita->lihatParagraf($ceritaid);
            while ($row = $res->fetch_assoc()) {
                echo "<p>";
                echo $row["isi_paragraf"];
                echo "</p>";
                echo "<br>";
            }
            ?>
        </div>
        <div class="tambah" style="margin-left: 2%;">
            <form method="POST" action="viewStory_proses.php">
                <p>Tambah Paragraf</p>
                <?php
                echo "<input type='hidden' name='idcerita' value='$ceritaid'>";
                echo "<input type='hidden' name='iduser' value='$userid'>";
                ?>
                <textarea name="paragraf" cols="100" rows="10"></textarea>
                <br>
                <button type="submit" style="margin-top: 16px;" name="simpan">Simpan</button>
                <br>
                <br>
                <a href="home.php">Kembali ke Halaman Awal</a>
            </form>
        </div>
    </div>
</body>

</html>