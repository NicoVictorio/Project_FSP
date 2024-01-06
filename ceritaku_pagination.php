<?php
require_once('class/cerita.php');
header('Content-Type: application/json');

$pagination = $_GET['pagination'];
$cerita = new Cerita();
$userid = $_SESSION['userid'];
$res = $cerita->loadCeritaKu($userid, $pagination, 2);
$result = [];
while($row = $res->fetch_assoc()){
    $result[] = $row;
    
}
echo json_encode($result, JSON_PRETTY_PRINT);

?>