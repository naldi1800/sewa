<?php


namespace App\Model;

use App\Model\Data;
use App\Contorller\Alert;

class Peminjaman extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_sewa . " AS A JOIN " . parent::$t_barang . " AS B ON A.id_barang=B.id_barang JOIN " . parent::$t_user . " AS C ON A.id_user=C.id_user";
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }
    public static function GetAllWithUserId($link, $id){
        $sql = "SELECT * FROM " . parent::$t_sewa . " AS A JOIN " . parent::$t_barang . " AS B ON A.id_barang=B.id_barang JOIN " . parent::$t_user . " AS C ON A.id_user=C.id_user WHERE A.id_user='$id'";
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_sewa . " AS A JOIN " . parent::$t_barang . " AS B ON A.id_barang=B.id_barang JOIN " . parent::$t_user . " AS C ON A.id_user=C.id_user WHERE id_sewa='$id'";
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

    public static function UpdateProgres($link, $id, $progres = "Confirmation")
    {
        if ($progres == "Arrived") {
            $sql = "UPDATE " . parent::$t_sewa . " SET keterangan='$progres', updatetime=CURRENT_TIMESTAMP, returntime=CURRENT_TIMESTAMP WHERE id_sewa='$id'";
        } else {
            $sql = "UPDATE " . parent::$t_sewa . " SET keterangan='$progres', updatetime=CURRENT_TIMESTAMP WHERE id_sewa='$id'";
        }
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Proses", "", "berhasil");
        } else {
            Alert::Set("Proses", "", "gagal");
            mysqli_error($link);
        }
    }

    public static function Insert($link, $data)
    {
        
        $sql = "INSERT INTO " . parent::$t_sewa . " VALUES( NULL, '"
            . $data['id'] . "','"
            . $_SESSION['USER']['id'] . "','"
            . $data['harga_sewa'] . "','"
            . $data['diskon'] . "', 'Waiting', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL)";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data Peminjaman", "diproses, mohon menunggu", "berhasil");
            Barang::UpdateStok($link, $data['id'], 1);
        } else {
            Alert::Set("Data Peminjaman", "disimpan", "gagal");
            echo "Error : " . mysqli_error($link);
        }
    }
}
