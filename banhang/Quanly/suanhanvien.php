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
                height: 260px;
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
                    <br><br>
        <div id="mucluc">
                        <div id="tieudemucluc">
                <h3><span style="font-size: 26px">Menu</span></h3>
            </div>
        <div id="giua">
                <ul>
                    <li><a href="quanlynhanvien.php"><span style= "font-size: 22px">Quản lý nhân viên</span></a></li>
                    <li><a href="themnhanvien.php"><span style= "font-size: 22px">Thêm nhân viên</span></a></li>
                    <li><a href="themnhanvien.php"><span style="color: red"><span style="color: red"><span style= "font-size: 22px">Sửa nhân viên</span></span></span></a></li>
                  </ul>
                  </div></div>

        <div id="noidung">
        <br>
        <h2><font color="#000080"><span style="font-size: 26px">&emsp;&emsp;SỬA THÔNG TIN NHÂN VIÊN</span></font></h2>
        <br>
            <form action="" method="post">
            <table width="41%">
                <tr>
                    <td>Tên tài khoản:</td>
                    <td><?php
                        echo "" .$_GET['id']
                        ?></td>
                </tr>

                <tr>
                    <td>Họ tên nhân viên:</td>
                    <td><input id="khung" type="text" name="ht" value=""></td>
                </tr>
                <tr>
                    <td>Giới tính:</td>
                    <td><select name="gt">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
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
                    <td>Chứng minh nhân dân:</td>
                    <td><input id="khung" type="text" name="cmnd" value=""></td>
                </tr>
                <tr><td><br></td></tr>
                <tr>
                    <td colspan="2" align="center">
                        <input id="nutdn" type="submit" value="Xác nhận" name="sua" />
                    </td>
                </tr>
            </table>
            </form>
    
        <?php
            include '../ketnoi.php';
        ?>
        <?php
            if(isset($_POST['sua'])){
                $tk= $_GET['id'];
                $ht= $_POST['ht'];
                $gt= $_POST['gt'];
                $dc= $_POST['dc'];
                $sdt= $_POST['sdt'];
                $cmnd= $_POST['cmnd'];
                $lenh = "UPDATE nhavien SET hotennv='$ht',gioitinhnv='$gt',diachinv='$dc',sdtnv='$sdt',cmndnv='$cmnd' WHERE tknv='$tk' ";
                mysqli_query($conn, $lenh);
                header('location:quanlynhanvien.php');
                
            }
        ?>
            
     
        </div>
        </div>
    </body>
</html>