<?php

header("Access-Control-Allow-Origin: *");

$action = $_POST['action'];
if($action == "login"){
    login();
}

function login(){

    $uname = $_POST['username'];
    $psw = $_POST['pass'];
    
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
  
    $sql = "SELECT * FROM `nguoidung` WHERE `TaiKhoan`='".$uname."' AND `MatKhau`='".$psw."'";
   
    $result = $conn->query($sql);
    //http://localhost/Music-Media-Website/server/postcontroller.php?action=login&user=linh&pass=1
    if ($result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);    
       // var_dump($data); 
        $mand = $data[0]['MaNguoiDung'];
        $tennd = $data[0]['TenNguoiDung'];
        $taikhoan =$data[0]['TaiKhoan'];
        $matkhau = $data[0]['MatKhau'];
        $hinhanh = $data[0]['Avatar'];
        $chucvu = $data[0]['MaChucVu'];
        //lưu thông tin người dùng vào cookie
        setcookie('mand', $mand, time() + (86400 * 30),"/"); // 86400 = 1 day
        setcookie('tennd', $tennd, time() + (86400 * 30),"/"); // 86400 = 1 day
        setcookie('tk', $taikhoan, time() + (86400 * 30),"/"); // 86400 = 1 day
        setcookie('mk', $matkhau, time() + (86400 * 30),"/"); // 86400 = 1 day
        setcookie('ava', $hinhanh, time() + (86400 * 30),"/"); // 86400 = 1 day
        setcookie('chucvu', $chucvu, time() + (86400 * 30),"/"); // 86400 = 1 day
        //chuyển mảng kết quả thành mảng kết quả json
        //echo json_encode($data);
        echo "true";   
    }
     else {
        echo "false";
     }
    $conn->close();
  }

?>
