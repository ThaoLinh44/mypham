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
        <style type="text/css">
            table{
                border-collapse: collapse;
            }
            table tr td{
                text-align: center;
                font-size: 20px;
            }
            caption{
                color: #000080;
                font-size: 23px;
            }
        </style>

    </head>
    <body >
        <div id="toancuc">
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
        <?php
            include '../ketnoi.php';
        ?>
        <div id="tieude">
            <h1>Bắp Consmetics</h1>
        </div>
        <div id="mucluc">
            <div id="tieudemucluc">
                <h3><span style="font-size: 26px">Menu</span></h3>
            </div>
         <div id="giua">
            <ul>
                <li><a href="quanlynhanvien.php"><span style= "font-size: 22px">Quản lý nhân viên</span></a></li>
                <li><a href="themnhanvien.php"><span style= "font-size: 22px">Thêm nhân viên</span></a></li>
                <li><a href="qlsanphamnoibat.php"><span style="color: red"><span style= "font-size: 22px">Sản phẩm nổi bật</span></span></a></li>
                <li><a href="sanpham.php"><span style= "font-size: 22px">Sản phẩm</span></a></li>
                <li><a href="themsanpham.php"><span style= "font-size: 22px">Thêm sản phẩm</span></a></li>
                <li><a href="themnhom.php"><span style= "font-size: 22px">Thêm nhóm sản phẩm</span></a></li>
                <li><a href="qldonhang.php"><span style= "font-size: 22px">Quản lý đơn hàng</span></a></li>
            </ul>
</div>
</div>

        <div id="noidung">
        
            <table width="27%" border="1">
                <caption>SẢN PHẨM NỔI BẬT</caption>
        <tr>
                <td><b>Vị trí</b></td>
                <td><b>Mã hàng</b></td>
                <td><b>Tùy chọn</b></td>
        </tr>
        <?php
            $tk =  $_SESSION['tk'];
            $lenh = "SELECT * FROM  noibac  ";
            $kq = mysqli_query($conn, $lenh);
            if(mysqli_num_rows($kq) > 0){
                while ($row = mysqli_fetch_assoc($kq)){
                        echo  "<tr>";
                        echo "<td>";
                        echo " " .$row['thutu'];
                        echo "</td>";
                        echo "<td>";
                        echo "" .$row['mahang'];
                        echo "</td>";
                        echo "<td>";
                        echo "<a href=\"cnnoibat.php?id=" .$row['thutu'] ."\">Sửa</a>";
                        echo "</td>";
                           echo  "</tr>";
                }
            }
        ?>
        </table>
            
        </div>
        </div>
    </body>
</html>