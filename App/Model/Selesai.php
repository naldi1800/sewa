<?php namespace App\Model;

use App\Contorller\Alert;
use App\Model\Data;
use App\Model\Barang;
use mysqli;

class Selesai extends Data{

    public static function GetAll($link){
        $sql = "SELECT B.nama_barang, C.nik, C.namalengkap, A.harga_sewa, A.diskon, A.keterangan, S.denda, S.createtime FROM " . parent::$t_selesai ." AS S JOIN " . parent::$t_sewa . " AS A ON S.id_sewa=A.id_sewa JOIN " . parent::$t_barang . " AS B ON A.id_barang=B.id_barang JOIN " . parent::$t_user . " AS C ON A.id_user=C.id_user";
        $query = mysqli_query($link, $sql);
        $data = null;
        while ($result = mysqli_fetch_array($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public static function GetWithId($link, $id){}

    public static function Update($link, $id, $data){}

    public static function Delete($link, $id){}

    public static function Insert($link, $data){
        $sql = "INSERT INTO " . parent::$t_selesai . " VALUES( null, '"
            . $data['id_sewa'] . "','"
            . $data['denda'] . "' , CURRENT_TIMESTAMP )";

       mysqli_query($link, $sql);
        Barang::UpdateStok($link, $data['id_barang'], 1);
    }

}
