<?php


namespace App\Model;

use App\Contorller\Alert;
use App\Model\Data;
use mysqli;

class Barang extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_barang;
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }

        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_barang . " WHERE id_barang='" . $id . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function Update($link, $id, $data)
    {
        $sql = "UPDATE " . parent::$t_barang . " SET " .
            "nama_barang='" . $data['nama_barang'] .  "' ," .
            "harga_sewa='" . $data['harga_sewa'] .  "' ," .
            "stok='" . $data['stok'] .  "' ," .
            "diskon='" . $data['diskon'] .  "', " .
            "updatetime=CURRENT_TIMESTAMP" .
            " WHERE id_barang='" . $id . "'";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data barang", "diubah", "berhasil");
        } else {
            Alert::Set("Data barang", "diubah", "gagal");
            // echo "Error : " . mysqli_error($link);
        }
    }

    public static function UpdateStok($link, $id, $qyt, $add = false)
    {
        // $sql = "UPDATE " .  parent::$t_barang . " SET stok=stok-$qyt WHERE id_barang='$id'";
        $sql = "UPDATE " .  parent::$t_barang . " SET stok=stok" . ($add ? "+" : "-") . "$qyt WHERE id_barang='$id'";
        mysqli_query($link, $sql);
    }

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_barang . " WHERE id_barang='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data barang", "dihapus", "berhasil");
        } else {
            Alert::Set("Data barang", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        $sql = "INSERT INTO " . parent::$t_barang . " VALUES( null, '"
            . $data['nama_barang'] . "','"
            . $data['harga_sewa'] . "','"
            . $data['diskon'] . "','"
            . $data['stok'] . "', CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";

        // var_dump($sql);
        $query = mysqli_query($link, $sql);

        if ($query) {
            Alert::Set("Data barang", "disimpan", "berhasil");
        } else {
            Alert::Set("Data barang", "disimpan", "gagal");
            //    echo "Error : " . mysqli_error($link);
        }
    }
}
