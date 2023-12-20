<?php
require_once("class/users.php");

if(isset($_POST['login'])){
    $users = new Users();
    $userid = $_POST['userid']; 
    $pwd = $_POST['password'];
    $hasil = $users->doLogin($userid, $pwd);
    if($hasil=='sukses'){
        header("location: home.php?idusers=$userid");
    }
    else{
        header("location: login.php?error=login");
    }
}
else{
    header("location: login.php");
}
?>