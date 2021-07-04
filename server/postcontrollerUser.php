<?php

include 'postcontroller.php';

$action = $_GET["action"];

if($action == "selectalbumuser"){
   // $mand = $_COOKIE['mand'];
   $stringsql ="SELECT * FROM `album` WHERE `MaAlbum` in (SELECT MaAlbum From albumyeuthich Where MaNguoiDung = 1)";
    select( $stringsql);
}
elseif($action=="selectsonguser"){
    $idalbum = $_GET["idalbum"];
    $stringsql="SELECT * from baihat where MaBaiHat in (SELECT mabaihat from ct_baihatalbum WHERE MaAlbum =".$idalbum.")";
    select($stringsql);
}
    
    
?>