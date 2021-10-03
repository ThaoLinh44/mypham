<?php session_start(); 
if (!isset($_SESSION['tk'])) {
	 header('Location: qldangnhap.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Bắp Consmetics</title>
        <link rel="stylesheet" href="qlnv.css">
        

    </head>
    <body >
        <div id="toancuc">
        <?php
            include '../ketnoi.php';
        ?>
        <div id="login">
                        <ul>
                            <?php 
                               if(isset($_SESSION['tk'])){
                                   
                                   echo "<li><a href=\"qllogout.php\">Logout</a>";
                                   echo "<li>" .$_SESSION['tk'] ."</li>";
                               }
                               
                               ?>
                            
                            
                            
                        </ul>
                    </div>
                    <br>
        <div align="center" id="slogan">
                    <img src="../bg/oke.png" width="1170px" height="300px">
                 </div>
            <br>
        

        <div id="noidung">

            <div id="mucluc">
            <div id="tieudemucluc">
                <h3><span style="font-size: 26px">Menu</span></h3>
            </div>
                <?php
                    include 'menu.php';
                ?>
        </div>
        <h2><font color="#000080"><span style="font-size: 26px">THÔNG TIN NHÂN VIÊN</span></font></h2>
        
        <hr><br>


        <table width="330px" height="160px">
        <?php
            $tk =  $_SESSION['tk'];
            $lenh = "SELECT * FROM  nhavien WHERE tknv = '$tk' ";
            $kq = mysqli_query($conn, $lenh);
            if(mysqli_num_rows($kq) > 0){
                while ($row = mysqli_fetch_assoc($kq)){
                    if($row['tknv'] != 'admin'){
                        echo "<tr>";
                            echo "<td>";
                            echo "Họ tên nhân viên: ";
                            echo "</td>";
                            echo "<td>";
                            echo "" .$row['hotennv'];
                        echo "</td>";
                        echo  "</tr>";
                        echo  "<tr>";
                        echo "<td>";
                        echo "Giới tính: ";
                        echo "</td>";
                        echo "<td>";
                        echo "" .$row['gioitinhnv'];
                        echo "</td>";
                            echo  "</tr>";
                         echo  "<tr>";
                        echo "<td>";
                        echo "Địa chỉ: ";
                        echo "</td>";
                        echo "<td>";
                        echo "" .$row['diachinv'];
                        echo "</td>";
                            echo  "</tr>";
                         echo  "<tr>";
                        echo "<td>";
                        echo "Số điện thoại: ";
                        echo "</td>";
                        echo "<td>";
                        echo "0" .$row['sdtnv'];
                        echo "</td>";
                            echo  "</tr>";
                         echo  "<tr>";
                        echo "<td>";
                        echo "Số CMND: ";
                        echo "</td>";
                        echo "<td>";
                        echo "" .$row['cmndnv'];
                        echo "</td>";
                            echo  "</tr>";
                    }
                    
                }
            }
        ?>
        </table>
            
        </div>
        </div>
    </body>
</html>