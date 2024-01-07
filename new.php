<?php
session_start();
if(isset($_SESSION['userid'])){
    $userid = $_SESSION['userid'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Story</title>
</head>

<body>
    <section>
        <form method="post" action="addNewStory_proses.php">
            <div class="container">
                <label>Judul</label>
                <?php 
                echo "<input type='hidden' name='user' value = $userid >";
                ?>
                <input type="text" name="judul">
                <br>
                <br>
                <label>Paragraf 1</label>
                <input type="text" name="paragraf">
                <br>
                <br>
                <input type="hidden" name="idUser" value="">
                <button type="submit" name="simpan">Simpan</button>
            </div>
        </form>
    </section>
</body>

</html>