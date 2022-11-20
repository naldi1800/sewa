<?php namespace App\Model;

abstract class Data
{
    protected static $t_barang = "barang";
    protected static $t_sewa = "sewa";
    protected static $t_user = "user";
    protected static $t_mid = "mid";

    protected static $ImageFolder = "App/Image/Mahasiswa/";

    public static abstract function GetAll($link);

    public static abstract function GetWithId($link, $id);

    public static abstract function Update($link, $id, $data);

    public static abstract function Delete($link, $id);

    public static abstract function Insert($link, $data);
}