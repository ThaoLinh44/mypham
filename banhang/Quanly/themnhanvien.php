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
        <meta charset="utf-8" />
        <title>Bắp Consmetics</title>
        <link rel="stylesheet" href="qlnv.css">
        <style type="text/css">
            table{
                border-collapse: collapse;
                height: 270px;
            }
            table tr td{
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
                    <li><a href="quanlynhanvien.php"><span style= "font-size: 22px">Quản lý nhân viên</span></a></li>
                    <li><a href="themnhanvien.php"><span style="color: red"><span style= "font-size: 22px">Thêm nhân viên</span></span></a></li>
                    <li><a href="qlsanphamnoibat.php"><span style= "font-size: 22px">Sản phẩm nổi bật</span></a></li>
                    <li><a href="sanpham.php"><span style= "font-size: 22px">Sản phẩm</span></a></li>
                    <li><a href="themsanpham.php"><span style= "font-size: 22px">Thêm sản phẩm</span></a></li>
                    <li><a href="themnhom.php"><span style= "font-size: 22px">Thêm nhóm sản phẩm</span></a></li>
                    <li><a href="qldonhang.php"><span style= "font-size: 22px">Quản lý đơn hàng</span></a></li>
                  </ul>
                  </div></div>

        <div id="noidung">
            <br>
        <h2><font color="#000080"><span style="font-size: 26px">&emsp;&emsp;&emsp;&emsp;THÊM NHÂN VIÊN</span></font></h2>
        <br>
            <form action="" method="post">
            <table width="41%">
                <tr>
                    <td>Tên tài khoản:</td>
                    <td><input id="khung" type="text" name="tk" value=""></td>
                </tr>
                <tr>
                    <td>Mật khẩu:</td>
                    <td><input id="khung" type="password" name="mk" value=""></td>
                </tr>
                <tr>
                    <td>Họ tên:</td>
                    <td><input id="khung" type="text" name="ht" value=""></td>
                </tr>
                <tr>
                    <td>Giới tính:</td>
                    <td><select name="gt">
                        <option value="nam">Nam</option>
                        <option value="nu">Nữ</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td><input id="khung" type="text" name="dc" value=""></td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td><input id="khung" type="text" name="sdt" value=""></td>
                </tr>
                <tr>
                    <td>Số chứng minh nhân dân:</td>
                    <td><input id="khung" type="text" name="cmnd" value=""></td>
                </tr>
                <tr><td><br></td></tr>
                <tr>
                    <td colspan="2" align="center">
                        <input id="nutdn" type="submit" value="Thêm mới" name="insert" />
                    </td>
                </tr>
            </table>
            </form>
    
        <?php
            include '../ketnoi.php';
        ?>
        <?php
            if(isset($_POST['insert'])){
                $tk= $_POST['tk'];
                $mk= md5($_POST['mk']);
                $ht= $_POST['ht'];
                $gt= $_POST['gt'];
                $dc= $_POST['dc'];
                $sdt= $_POST['sdt'];
                $cmnd= $_POST['cmnd'];
                $lenh = "INSERT INTO nhavien VALUES ('$tk','$mk','$ht','$gt','$dc','$sdt','$cmnd')";
                mysqli_query($conn, $lenh) or die ("Thêm dữ liệu thất bại!");
                
            }
        ?>
            
        </div>
        </div>
    </body>
</html>