<?php


namespace App\Model;

use App\Contorller\Alert;
use App\Model\Data;
use mysqli;

class User extends Data
{

    public static function GetAll($link)
    {
        $sql = "SELECT * FROM " . parent::$t_user;
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public static function GetWithId($link, $id)
    {
        $sql = "SELECT * FROM " . parent::$t_user . " WHERE id_user='" . $id . "'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }
    public static function GetOldPasswordWithId($link, $id, $pass)
    {
        $sql = "SELECT id_user, Password FROM " . parent::$t_user . " WHERE id_user='$id' AND Password='$pass'";
        $query = mysqli_query($link, $sql);
        return mysqli_fetch_assoc($query);
    }

    public static function Update($link, $id, $data)
    {
        $sql = "UPDATE " . parent::$t_user . " SET " .
            "nik='" . $data['nik'] .  "' ," .
            "namalengkap='" . $data['namalengkap'] .  "' ," .
            "alamat='" . $data['alamat'] .  "' ," .
            "notelp='" . $data['notelp'] .  "' ," .
            "tanggallahir='" . $data['tanggallahir'] .  "' , updatetime=CURRENT_TIMESTAMP" .
            " WHERE id_user='" . $id . "'";

        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data", "diubah", "berhasil");
        } else {
            Alert::Set("Data", "diubah", "gagal");
            echo "Error : " . mysqli_error($link);
        }
    }

    public static function UpdatePassword($link, $id, $data)
    {       
        if (self::GetOldPasswordWithId($link, $id, md5($data['oldpass'])) != null) {
            $newpass = md5($data['newpass']);
            $sql = "UPDATE " . parent::$t_user . " SET " .
                "Password='$newpass' , updatetime=CURRENT_TIMESTAMP" .
                " WHERE id_user='" . $id . "'";

            $query = mysqli_query($link, $sql);
            if ($query) {
                Alert::Set("Password", "diubah", "berhasil");
                session_destroy();
            } else {
                Alert::Set("Password", "diubah", "gagal");
                echo "Error : " . mysqli_error($link);
            }
        }else Alert::Set("Password", "diubah, pastikan password lama benar", "gagal");
    }

    public static function Delete($link, $id)
    {
        $sql = "DELETE FROM " . parent::$t_user . " WHERE id_user='" . $id . "'";
        $query = mysqli_query($link, $sql);
        if ($query) {
            Alert::Set("Data User", "dihapus", "berhasil");
        } else {
            Alert::Set("Data User", "dihapus", "gagal");
        }
    }

    public static function Insert($link, $data)
    {
        $user = $data['user'];
        $pass = md5($data['pass']);
        $email = $data['email'];
        $table = parent::$t_user;

        $sql = "INSERT INTO $table (id_user, Username, Password, email, createtime, updatetime) VALUE (null, '$user', '$pass', '$email', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
        mysqli_query($link, $sql);
        echo mysqli_error($link);
    }
}
