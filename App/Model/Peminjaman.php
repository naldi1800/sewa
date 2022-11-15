<?php


namespace App\Model;

use App\Model\Data;
use App\Contorller\Alert;

class Peminjaman extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_sewa;
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_sewa . " WHERE Kode_MK='" . $id . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_sewa . " WHERE Kode_MK='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data Peminjaman", "dihapus", "berhasil");
        } else {
            Alert::Set("Data Peminjaman", "dihapus", "gagal");
        }
    }
    public static function Update($link, $id, $data)
    {
        
    }

    public static function Insert($link, $data)
    {
        $sql = "INSERT INTO " . parent::$t_sewa . " VALUES( '"
            . $data['kode_mk'] . "','"
            . $data['nama_mk'] . "','"
            . $data['semester'] . "','"
            . $data['sks'] . "')";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data Peminjaman", "disimpan", "berhasil");
        } else {
            Alert::Set("Data Peminjaman", "disimpan", "gagal");
//            echo "Error : " . mysqli_error($link);
        }
    }
}