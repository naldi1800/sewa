<?php


namespace App\Model;

use App\Contorller\Alert;
use App\Model\Data;
use mysqli;

class Mid extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_mid;
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }

        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_mid . " WHERE id='" . $id . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function Update($link, $id, $data)
    {
        $sql = "UPDATE " . parent::$t_mid . " SET " .
            "nama_barang='" . $data['nama_barang'] .  "' ," .
            "harga_sewa='" . $data['harga_sewa'] .  "' ," .
            "diskon='" . $data['diskon'] .  "' " .
            " WHERE id='" . $id . "'";

        $query = mysqli_query($link, $sql);
        var_dump($sql);
        if ($query) {
            Alert::Set("Data Mid", "diubah", "berhasil");
        } else {
            Alert::Set("Data Mid", "diubah", "gagal");
            echo "Error : " . mysqli_error($link);
        }
    }

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_mid . " WHERE id='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data mid", "dihapus", "berhasil");
        } else {
            Alert::Set("Data mid", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        $sql = "INSERT INTO " . parent::$t_mid . " VALUES( null, '"
            . $data['nama_barang'] . "','"
            . $data['harga_sewa'] . "','"
            . $data['diskon'] . "','"
            . $data['stok'] . "')";

        // var_dump($sql);
        $query = mysqli_query($link, $sql);

        if ($query) {
            Alert::Set("Data mid", "disimpan", "berhasil");
        } else {
            Alert::Set("Data mid", "disimpan", "gagal");
            //    echo "Error : " . mysqli_error($link);
        }
    }
}
