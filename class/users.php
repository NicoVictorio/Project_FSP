<?php
require_once("parent.php");
session_start();

class Users extends ParentClass
{
    public function __construct()
    {
        parent::__construct();
    }

    private function encryptPassword($plain, $salt)
    {
        return sha1(sha1($plain) . $salt);
    }

    private function getSalt($userid)
    {
        $sql = "SELECT salt from users where idusers = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("s", $userid);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($row = $res->fetch_assoc()) return $row['salt'];
        else return "";
    }

    private function createSession($row)
    {
        $_SESSION['userid'] = $row['idusers'];
    }

    public function doLogin($userid, $pwd)
    {
        $encrypted_password = $this->encryptPassword($pwd, $this->getSalt($userid));
        $sql = "SELECT * from USERS where idusers=? and password=?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ss", $userid, $encrypted_password);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($res->num_rows > 0) {
            $this->createSession($res->fetch_assoc());
            return "sukses";
        } else {
            return "gagal";
        }
    }
}
