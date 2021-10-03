<?php session_start(); 
if (!isset($_SESSION['tk'])) {
	 header('Location: qldangnhap.php');
}else if($_SESSION['tk'] != 'admin'){
    header('Location: qldangnhap.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Bắp Consmetics</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="qlnv.css">
        <style type="text/css">
            table{
                border-collapse: collapse;
                float: left;
                height: 130px;
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
                    <br>
        <div id="mucluc">
                        <div id="tieudemucluc">
                <h3><span style="font-size: 26px">Menu</span></h3>
            </div>
            <div id="giua">
                <ul>
                    <li><a href="quanlynhanvien.php"><span style="color: red"><span style= "font-size: 22px">Quản lý nhân viên</span></span></a></li>
                    <li><a href="themnhanvien.php"><span style= "font-size: 22px">Thêm nhân viên</span></a></li>
                    <li><a href="qlsanphamnoibat.php"><span style= "font-size: 22px">Sản phẩm nổi bật</span></a></li>
                    <li><a href="sanpham.php"><span style= "font-size: 22px">Sản phẩm</span></a></li>
                    <li><a href="themsanpham.php"><span style= "font-size: 22px">Thêm sản phẩm</span></a></li>
                    <li><a href="themnhom.php"><span style= "font-size: 22px">Thêm nhóm sản phẩm</span></a></li>
                    <li><a href="qldonhang.php"><span style= "font-size: 22px">Quản lý đơn hàng</span></a></li>
                  </ul>
            </div>
        </div>

        <div id="noidung">
        <br>
        <h2><font color="#000080"><span style="font-size: 26px">DANH SÁCH NHÂN VIÊN</span></font></h2>
        <br>
            <table width="75%" border="1">
        <tr>
            <td><b>Tên tài khoản</b></td>
            <td><b>Họ tên nhân viên</b></td>
            <td><b>Giới tính</b></td>
            <td><b>Địa chỉ</b></td>
            <td><b>Số điện thoại</b></td>
            <td><b>CMND</b></td>
            <td><b>Xử lý</b></td>
        </tr>

    
        <?php
            $lenh = "SELECT tknv,hotennv,gioitinhnv,diachinv,sdtnv,cmndnv FROM  nhavien ";
            $kq = mysqli_query($conn, $lenh);
            if(mysqli_num_rows($kq) > 0){
                while ($row = mysqli_fetch_assoc($kq)){
                    if($row['tknv'] != 'admin'){
                        echo "<tr>"
                            ."<td>" .$row['tknv'] ."</td>"
                            ."<td>" .$row['hotennv'] ."</td>"
                            ."<td>" .$row['gioitinhnv'] ."</td>"
                            ."<td>" .$row['diachinv'] ."</td>"
                            ."<td>0" .$row['sdtnv'] ."</td>"
                            ."<td>" .$row['cmndnv'] ."</td>"
                            ."<td><a href=suanhanvien.php?id=" .$row['tknv'] ."><b>Sửa</b></a></td>"
                        ."</tr>";
                    }
                    
                }
            }
        ?>
        </table>
            
        </div>
        </div>
    </body>
</html>