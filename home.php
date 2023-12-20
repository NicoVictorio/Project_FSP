<?php
require_once('class/cerita.php');
if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
}
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="1.css" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        table,
        td,
        th {
            border: 1px solid black;
        }

        .rata-tengah {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- <section>
        <div class="container">
            <form method="get">
                <div class="cari">
                    <label>Cari Judul</label>
                    <input type="text" name="cari">
                    <button type="submit">Cari</button>
                </div>
            </form>
            <br>
            <?php echo "<form method='POST' action='addNewStory.php?'>"; ?>
            <div class="content">
                <button type="submit" name="create">Buat Cerita Baru</button>
                </a>
                <br><br>
                <table>
                    <tr class='rata-tengah'>
                        <th colspan='1'>Judul</th>
                        <th colspan='1'>Pembuat Awal</th>
                        <th colspan='1'>Aksi</th>
                    </tr>
                    <?php
                    $cerita = new Cerita();

                    $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
                    if (!is_numeric($offset)) $offset = 0;

                    $cari = isset($_GET['cari']) ? $_GET['cari'] : "";
                    $cari_persen = "%" . $cari . "%";

                    $res = $cerita->lihatCerita($cari_persen);
                    $jumlah_data = $res->num_rows;
                    $PER_PAGE = 3;
                    $max_halaman = ceil($jumlah_data / $PER_PAGE);

                    $res = $cerita->lihatCerita($cari_persen, $offset, $PER_PAGE);
                    while ($row = $res->fetch_assoc()) {
                        echo   "<tr class='rata-tengah'>  
                                    <td colspan='1'>" . $row['judul'] . "</td>
                                    <td colspan='1'>" . $row['idusers_pembuat_awal'] . "</td>
                                    <td colspan='1'><a href='viewStory.php?idCerita=" . $row["idcerita"] . "&judul= " . $row["judul"] . "'>Lihat Cerita</a></td>
                                </tr>";
                    }
                    ?>
                </table>
                <?php
                for ($i = 1; $i <= $max_halaman; $i++) {
                    echo "<a href='?idusers=$userid&offset=" . (($i - 1) * $PER_PAGE) . "&cari=$cari'>$i</a>&nbsp&nbsp";
                }
                ?>
            </div>
            </form>
        </div>
    </section> -->
    <header>
        <div class="header-atas">
            <p class='header-satu'>
                CERBUNG
            </p>
            <p class='header-empat'>
                Cerita Bersambung
            </p>
        </div>
    </header>
    <main>
        <div class="cmb">
            <label class="label-pilihan" for="cmb-pilihan">Kategori</label><br>
            <div class="cmb-1">
            <select style="width: 200px" name="cerita" class="pilihan">
                <option value="Ceritaku">Ceritaku</option>
                <option value="Kumpulan Cerita">Kumpulan Cerita</option>
            </select>
        </div>
        </div>
        <div class='container'></div>
        <div class="container-kiri">
            <div class="sub-judul">Ceritaku</div>
            <div class="container-class-kiri">
                <div class="class-kiri">
                    <h3 class="judul-Cerita"> Judul Cerita</h3>
                    <div class="container-card-text">
                        <p class="paragraf">Jumlah Paragraf : 2</p>
                        <a class="link" href="google.com"> Baca Lebih Lanjut</a>
                    </div>
                </div>
                <div class="class-kiri">
                    <h3 class="judul-Cerita"> Judul Cerita</h3>
                    <div class="container-card-text">
                        <p class="paragraf">Jumlah Paragraf : 2</p>
                        <a class="link" href="google.com"> Baca Lebih Lanjut</a>
                    </div>
                </div>
            </div>
            <button id="load-more-btn">Tampilkan Cerita Selanjutnya</button>

        </div>
        <div class="container-kanan">
            <div class="sub-judul">Kumpulan Cerita</div>
            <div class="container-card-kiri">
                <div class="card-kanan-satu">
                    <h3 class="judul-cerita"> Judul Cerita</h3>
                    <div class="container-class-kanan">
                        <p class="paragraf">Jumlah Paragraf : 2</p>
                        <a class="link" href="google.com"> Baca Lebih Lanjut</a>
                    </div>
                </div>
                <div class="card-kanan-satu">
                    <h3 class="judul-cerita"> Judul Cerita</h3>
                    <div class="container-class-kanan">
                        <p class="paragraf">Jumlah Paragraf : 2</p>
                        <a class="link" href="google.com"> Baca Lebih Lanjut</a>
                    </div>
                </div>
                <div class="card-kanan-satu">
                    <h3 class="judul-cerita"> Judul Cerita</h3>
                    <div class="container-class-kanan">
                        <p class="paragraf">Jumlah Paragraf : 2</p>
                        <a class="link" href="google.com"> Baca Lebih Lanjut</a>
                    </div>
                </div>
            </div>

        </div>
        </div>

    </main>
</body>

</html>