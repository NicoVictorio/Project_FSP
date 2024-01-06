<?php
require_once("parent.php");
session_start();

class Cerita extends ParentClass
{
    public function __construct()
    {
        parent::__construct();
    }

    public function tambahCerita($judul, $userid)
    {
        $sql = "INSERT into cerita (judul, idusers_pembuat_awal) values (?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("ss", $judul, $userid);
        $stmt->execute();
        $stmt->close();
    }

    public function loadCerita($userid, $offset = 0, $limit = null)
    {
        $sql = "SELECT c.idcerita, c.judul, u.nama, (select count(idparagraf) from paragraf p where p.idcerita = c.idcerita ) AS jumlah_paragraf
             FROM cerita c inner join users u on u.idusers = c.idusers
                where c.idusers != ?";
        $stmt = $this->mysqli->prepare($sql);
        if (is_null($limit)) {
            $stmt = $this->mysqli->prepare($sql);
        } else {
            $offset = $offset * $limit;
            $sql .= " LIMIT $offset,$limit";
            $stmt = $this->mysqli->prepare($sql);
        }
        $stmt->bind_param("i", $userid);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function loadCeritaKu($userid, $offset = 0, $limit = null)
    {
        $sql = "SELECT c.idcerita, c.judul, u.nama, (select count(idparagraf) from paragraf p where p.idcerita = c.idcerita ) AS jumlah_paragraf
             FROM cerita c inner join users u on u.idusers = c.idusers
                where c.idusers = ?";
        $stmt = $this->mysqli->prepare($sql);
        if (is_null($limit)) {
            $stmt = $this->mysqli->prepare($sql);
        } else {
            $offset = $offset * $limit;
            $sql .= " LIMIT $offset,$limit";
            $stmt = $this->mysqli->prepare($sql);
        }
        $stmt->bind_param("i", $userid);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function lihatCerita($cariJudul = "", $offset = 0, $limit = null)
    {
        $sql = "SELECT * from cerita WHERE judul like ?";
        $stmt = $this->mysqli->prepare($sql);
        if (is_null($limit)) {
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("s", $cariJudul);
        } else {
            $sql .= " LIMIT ?,?";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("sii", $cariJudul, $offset, $limit);
        }
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }

    public function lihatCeritaById($idCerita)
    {
        $sql = "SELECT * FROM cerita where idcerita=? limit 1";
        $stmt = $this->mysqli->prepare($sql);

        $stmt->bind_param("s", $idCerita);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        return $row;
    }

    public function tambahParagrafPertama($userid, $judul, $paragraf)
    {
        $sql = "SELECT idcerita from cerita where judul = '$judul'";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->execute();
        $res = $stmt->get_result();
        $row = $res->fetch_assoc();
        $ceritaid = $row['idcerita'];

        $sql2 = "INSERT into paragraf (idusers, idcerita, isi_paragraf) values (?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql2);
        $stmt->bind_param("sis", $userid, $ceritaid, $paragraf);
        $stmt->execute();
        $stmt->close();
    }

    public function tambahParagraf($userid, $ceritaid, $paragraf)
    {
        $sql2 = "INSERT into paragraf (idusers, idcerita, isi_paragraf) values (?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql2);
        $stmt->bind_param("sis", $userid, $ceritaid, $paragraf);
        $stmt->execute();
        $stmt->close();
    }

    public function lihatParagraf($ceritaid)
    {
        $sql = "SELECT * from paragraf where idcerita = '$ceritaid'";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->execute();
        $res = $stmt->get_result();
        return $res;
    }


}
