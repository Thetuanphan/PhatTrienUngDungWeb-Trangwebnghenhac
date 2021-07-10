<?php

header("Access-Control-Allow-Origin: *");

include 'postcontroller.php';

$action = $_GET["action"];

if($action == "selectalbumuser"){
   // $mand = $_COOKIE['mand'];
   $stringsql ="SELECT * FROM `album` ";
    select( $stringsql);
}
elseif($action=="selectsonguser"){
    $idalbum = $_GET["idalbum"];
    $stringsql="SELECT * from baihat where MaBaiHat in (SELECT mabaihat from ct_baihatalbum WHERE MaAlbum =".$idalbum.")";
    select($stringsql);
}
elseif($action=="detailsong"){
    $idsong = $_GET["idsong"];
    $stringsql="SELECT * FROM `baihat` WHERE `MaBaiHat` =".$idsong."";
    select($stringsql);
}
elseif($action=="similarsong"){
    $idsong = $_GET["idsong"];
    $stringsql="SELECT *FROM baihat where mabaihat in(select mabaihat from ct_baihatalbum where maalbum in(SELECT maalbum from ct_baihatalbum where MaBaiHat =".$idsong."))";
    select($stringsql);
}
elseif($action=="likesong"){
    $mand = $_GET["mand"];
    $stringsql="SELECT * from baihat where MaBaiHat in(
        SELECT  `MaBaiHat` FROM `baihatyeuthich` WHERE `MaNguoiDung` =".$mand.")";
    select($stringsql);
}

elseif($action=="likealbum"){
    $mand = $_GET["mand"];
    $stringsql="SELECT * from `album` where `MaAlbum` in(
        SELECT  `MaAlbum` FROM `albumyeuthich` WHERE `MaNguoiDung` =".$mand.")";
    select($stringsql);
}
elseif($action=="deletelikesong"){
    deletelikesong();
}
elseif($action=="deletelikealbum"){
    deletelikealbum();
}
elseif($action =="updatepass")
{
    updatepass();
}
elseif($action=="addintomyalbum"){
    addintomyalbum();
}
elseif($action=="addmyalbum"){
    addmyalbum();
}
elseif($action=="gettile"){
  $idalbum = $_GET["idalbum"];
    $stringsql="SELECT `MaAlbum`, `TenAlbum`, `LinkHinhAnh`, `ChuDe`, `QuocGia` FROM `album` WHERE `MaAlbum`=".$idalbum."";
    select($stringsql);
}
elseif($action=="sumalbum"){
    $stringsql="SELECT COUNT(*) as TongSoAlbum FROM `album`";
    select($stringsql);
}
elseif($action=="sumsong"){
  $stringsql="SELECT COUNT(*) as TongSoBaiHat FROM `baihat`";
  select($stringsql);
}
elseif($action=="sumuser"){
  $stringsql="SELECT COUNT(*) as TongSoNguoiDung FROM `nguoidung`";
  select($stringsql);
}
elseif($action=="sumlike"){
  $stringsql="SELECT COUNT(*) as TongLuotThich FROM `baihatyeuthich`";
  select($stringsql);
}
//function
    function deletelikesong(){
        $idsong = $_GET['idsong'];
        $mand = $_GET["mand"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "wednhac";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        // sql to delete a record
        $sql = "DELETE FROM `baihatyeuthich` WHERE `MaNguoiDung` = ".$mand." and `MaBaiHat` = ".$idsong."";
        
        if ($conn->query($sql) === TRUE) {

        } else {
      }
      $conn->close();
    }
    //DELETE FROM `albumyeuthich` WHERE `MaNguoiDung` = AND `MaAlbum` =
    function deletelikealbum(){
        $idalbum = $_GET['idalbum'];
        $mand = $_GET["mand"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "wednhac";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        // sql to delete a record
        $sql = "DELETE FROM `albumyeuthich` WHERE `MaNguoiDung` = ".$mand." AND `MaAlbum` =".$idalbum."";
       
        if ($conn->query($sql) === TRUE) {

        } else {
      }
      $conn->close();
    }
    function updatepass(){
        $mand = $_GET["mand"];
        $newpsw = $_GET["newpsw"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "wednhac";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        // 
        $sql = "UPDATE `nguoidung` SET `MatKhau` = ".$newpsw." WHERE `MaNguoiDung` =".$mand."";
     
        if ($conn->query($sql) === TRUE) {
            setcookie('mk', $newpsw, time() + (86400 * 30),"/"); // 86400 = 1 day

        } else {
      }
      $conn->close();

    }

    //INSERT INTO `baihatyeuthich`(`MaNguoiDung`, `MaBaiHat`) VALUES (,)
    function addintomyalbum(){
        $mand = $_GET["mand"];
        $idsong = $_GET["idsong"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "wednhac";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        // 
        $sql = "INSERT INTO `baihatyeuthich`(`MaNguoiDung`, `MaBaiHat`) VALUES (".$mand.",".$idsong.")";
     
        if ($conn->query($sql) === TRUE) {
            echo "thêm bài hát thành công";

        } else {
      }
      $conn->close();

    }
    function addmyalbum(){
        $mand = $_GET["mand"];
        $idalbum = $_GET["idalbum"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "wednhac";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        // 
        $sql = "INSERT INTO `albumyeuthich`(`MaNguoiDung`, `MaAlbum`) VALUES (".$mand.",".$idalbum.")";
       
        if ($conn->query($sql) === TRUE) {
            echo "thêm bài album thành công";

        } else {
      }
      $conn->close();

    }

    
?>