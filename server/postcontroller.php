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
    //kiem tra user trùng
    elseif($action =="checkuser"){
        $username=$_GET['username'];             
        $stringsql ="SELECT * FROM `nguoidung` WHERE `TaiKhoan` like '".$username."';";
        checkuser($stringsql);
    }
    //tải danh sách bài hát
    elseif($action=="selectsong"){
        $keyword = $_GET['keyword'];
        $stringsql ="SELECT * FROM `baihat` WHERE `TenBaiHat` LIKE '%".$keyword."%' or`TenCaSi`  LIKE '%".$keyword."%'";
        select($stringsql);
    }
    //tải danh sách album
    elseif($action=="selectalbum"){
        //http://localhost/PhatTrienUngDungWeb-Trangwebnghenhac/server/postcontroller.php?action=selectalbum
        $keyword = $_GET['keyword'];
        $stringsql ="SELECT * FROM `album` WHERE `TenAlbum` like '%".$keyword."%'";
        select($stringsql);
    }
    //thêm bài hát
    elseif($action=="createsong"){
        createsong();
    }
    //xóa bài hát
    elseif($action=="delete"){
        deletesong();
    }
    //roll dữ liệu chuẩn bị update
    elseif($action=="edit"){
        $id = $_GET['id'];
        $stringsql ="SELECT * FROM `baihat` WHERE`MaBaiHat`=".$id."";
        select($stringsql);
    }
    //update song
    elseif($action=="updatesong"){
        updatesong($id);
    }
    //update album
    elseif($action=="updatealbum"){
        updatealbum();
    }
    //thêm bài hát vào album
    elseif($action == "addsongintoalbum"){
        addsongintoalbum();
    }
    //thêm album
    elseif($action == "addalbum"){
        addalbum();
    }
     //roll dữ liệu chuẩn bị update
     elseif($action=="editalbum"){
        $id = $_GET['id'];
        $stringsql ="SELECT * FROM `album` WHERE `MaAlbum` = ".$id."";
        select($stringsql);
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
        $linksong = getdirectlink($linksong);
        $linkimage = $_GET['linkimage'];
        if($linkimage ==""){
            $linkimage ="https://img.lovepik.com/element/40131/7988.png_860.png";
        }
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
        $sql = 'INSERT INTO `baihat`(`TenBaiHat`, `TenCaSi`, `LinkBaiHat`,`HinhAnh`) VALUES ("'.$songname.'","'.$singername.'","'.$linksong.'","'.$linkimage.'")'; 
        echo $sql;
        die();
        if ($conn->query($sql) === TRUE) {
             echo "1";
        } else {
            echo "0";
        }

        $conn->close();

    }
    //function delete song
    function deletesong(){
        $id = $_GET['id'];

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
        $sql = "DELETE FROM `baihat` WHERE `MaBaiHat` = ".$id."";
        echo $sql;
        die();
        
        if ($conn->query($sql) === TRUE) {
          echo "delete product ".$Id." success";
        } else {
          echo "Error deleting record: " . $conn->error;
      }
      $conn->close();

    }
    //function update song
    
    function updatesong(){  
        // Using database connection file here
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
            $id = $_GET['mabaihat'];
         $songname = $_GET['songname'];
         $singername = $_GET['singername'];
         $linksong = $_GET['linksong'];
         $linksong = getdirectlink($linksong);
         $linkimage = $_GET['linkimage'];
         if($linkimage ==""){
             $linkimage ="https://img.lovepik.com/element/40131/7988.png_860.png";
         }

        $sql = "UPDATE `baihat` SET `TenBaiHat`='".$songname."',`TenCaSi`='".$singername."',`LinkBaiHat`='".$linksong."',`HinhAnh`='".$linkimage."' WHERE `MaBaiHat` =".$id."";
        echo $sql;
        die();
        if ($conn->query($sql) === TRUE) {         
            echo "bài hát ".$id." update thành công";
          } else {
            echo "";
          }
          
          
    }

    function getdirectlink($link){
        $link = preg_replace('/\/file\/d\/(.+)\/(.+)/',"/uc?export=download&id=$1", $link);
        return $link;
    }
    //function thêm bài hát vào album
    function addsongintoalbum(){
        $mabaihat = $_GET['mabaihat'];
        $maalbum = $_GET['maalbum'];

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

        $sql = "INSERT INTO `ct_baihatalbum`(`MaAlbum`, `MaBaiHat`) VALUES ('".$maalbum."','".$mabaihat."')";
       

        if ($conn->query($sql) === TRUE) {
             echo "Đăng ký thành công";
        } else {
            echo "Đăng ký thất bài";
        }

        $conn->close();
    }
    //function thêm album 
    function addalbum(){
        $tenalbum = $_GET['tenalbum'];
        $linkanh = $_GET['linkanh'];
        $manguoidung =$_GET['manguoidung'];

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
         //http://localhost/PhatTrienUngDungWeb-Trangwebnghenhac/server/postcontroller.php?action=addalbum&tenalbum=1&linkanh=1&manguoidung=1
        //INSERT INTO `album`( `TenAlbum`, `LinkHinhAnh`, `ChuDe`) VALUES ('[value-1]','[value-2]','[value-3]')
        $sql = "INSERT INTO `album`( `TenAlbum`, `LinkHinhAnh`, `ChuDe`) VALUES ('".$tenalbum."','".$linkanh."','".$manguoidung."')";
     

        if ($conn->query($sql) === TRUE) {
             echo "1";
        } else {
            echo "0";
        }

        $conn->close();
    }
    //update album
    function updatealbum(){  
        // Using database connection file here
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
         $id = $_GET['id'];
         $albumname = $_GET['albumname'];
         $albumimg = $_GET['albumimg'];

         $sql = "UPDATE `album` SET`TenAlbum`='".$albumname."',`LinkHinhAnh`='".$albumimg."' WHERE `MaAlbum` = ".$id."";
        echo $sql;
        die();
        
        if ($conn->query($sql) === TRUE) {         
            echo "bài hát ".$id." update thành công";
          } else {
            echo "";
          }
          
          
    }
    

          
?>