<?php
require_once('class/cerita.php');
header('Content-Type: application/json');

$pagination = $_GET['pagination'];
$limit = $_GET['limit'];
$cerita = new Cerita();
$userid = $_SESSION['userid'];
$res = $cerita->loadCerita($userid, $pagination, $limit);
$result = [];
while($row = $res->fetch_assoc()){
    $result[] = $row;
    
}
echo json_encode($result, JSON_PRETTY_PRINT);

?>