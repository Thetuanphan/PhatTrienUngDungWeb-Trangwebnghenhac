<?php 
   error_reporting(0);
?> 

<?php

   $action =  $_GET['action'];

    //login
    if($action == "login"){
        login();
    }
    elseif($action == "signup"){
        signup();
    }
    //load nội dung của người dùng
    elseif($action == "select"){
        $ma = $_COOKIE['mand'];
        $stringsql ="SELECT * FROM `album` WHERE `MaNguoiDung` = ".$ma."";
        select($stringsql);
    }
    //tìm kiếm album
    elseif($action =="search"){      
        $keyword=$_GET['keyword'];     
        $stringsql ="SELECT * FROM `album` WHERE `TenAlbum` like '%".$keyword."%'";
        select($stringsql);
    }
    elseif($action =="checkuser"){
        $username=$_GET['username'];             
        $stringsql ="SELECT * FROM `nguoidung` WHERE `TaiKhoan` like '".$username."';";
        checkuser($stringsql);
    }
    elseif($action=="selectsong"){
        $keyword ="";
        $keyword = $_GET['keyword'];
        $stringsql ="SELECT * FROM `baihat` WHERE TenBaiHat LIKE '%".$keyword."%' or TenCaSi LIKE '".$keyword."'";
        select($stringsql);
    }
    elseif($action=="createsong"){
        createsong();
    }

    //funtion---------------------------------------------------------------------------------------------------------------------------
    //funtion login ajax
    function login(){
        $user = $_GET['user'];
        $pass = $_GET['pass'];    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "wednhac";

            // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->set_charset('utf8');
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        //SELECT * FROM nguoidung WHERE TaiKhoan LIKE '%linh%' AND MatKhau LIKE '%1%'
        $sql = "SELECT * FROM NguoiDung WHERE TaiKhoan LIKE '".$user."' AND MatKhau LIKE '".$pass."' ";
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
    //funtion select ajax
    function select($stringsql){
                       
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "wednhac";

            // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->set_charset('utf8');
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql = "".$stringsql."";
 
        $result = $conn->query($sql);
       
        //http://localhost/Music-Media-Website/server/postcontroller.php?action=search
        if ($result->num_rows > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC); 
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
         else {
            echo "0";

         }
        $conn->close();

    }
    //function signup
    function signup(){        
        $user = $_GET['user'];
        $pass = $_GET['pass']; 
        $email = $_GET['email'];

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
        //INSERT INTO `nguoidung`( `TaiKhoan`, `MatKhau`, `email`) VALUES ('tuan','1','tuan@gm.com')
        $sql = "INSERT INTO `nguoidung`( `TaiKhoan`, `MatKhau`, `email`) VALUES ('".$user."','".$pass."','".$email."')";
        if ($conn->query($sql) === TRUE) {
             echo "Đăng ký thành công";
        } else {
            echo "Đăng ký thất bài";
        }

        $conn->close();

    }
    //function check user
    function checkuser($stringsql){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "wednhac";

            // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->set_charset('utf8');
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql = "".$stringsql."";
 
        $result = $conn->query($sql);
       
        //http://localhost/Music-Media-Website/server/postcontroller.php?action=search
        if ($result->num_rows > 0) {
            echo "1";
        }
         else {
            echo "0";
         }
        $conn->close();

    }
    //function create song
    function createsong(){        
        $songname = $_GET['songname'];
        $singername = $_GET['singername']; 
        $linksong = $_GET['linksong'];
 

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
        //INSERT INTO `baihat`(`MaBaiHat`, `TenBaiHat`, `TenCaSi`, `LinkBaiHat`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')
        $sql = 'INSERT INTO `baihat`(`TenBaiHat`, `TenCaSi`, `LinkBaiHat`) VALUES ("'.$songname.'","'.$singername.'","'.$linksong.'")';

        if ($conn->query($sql) === TRUE) {
             echo "1";
        } else {
            echo "0";
        }

        $conn->close();

    }
    //
    

          
?>