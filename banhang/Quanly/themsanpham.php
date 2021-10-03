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
            #nutgui{
                margin-left: 355px;
                color:#FF3300 ;       
                font-size: 20px;
                width: 90px;
                height: 33px;
                background-color:#FFFFE0;  
                border: 1px solid #EE7600;
            }
            select{
                width:200px;
                height: 29px;
                font-size: 18px;
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
                    </div><br><br>

        <div id="mucluc">
                        <div id="tieudemucluc">
                <h3><span style="font-size: 26px">Menu</span></h3>
            </div>
         <div id="giua">
            <ul>
                <li><a href="quanlynhanvien.php"><span style= "font-size: 22px">Quản lý nhân viên</span></a></li>
                <li><a href="themnhanvien.php"><span style= "font-size: 22px">Thêm nhân viên</span></a></li>
                <li><a href="qlsanphamnoibat.php"><span style= "font-size: 22px">Sản phẩm nổi bật</span></a></li>
                <li><a href="sanpham.php"><span style= "font-size: 22px">Sản phẩm</span></a></li>
                <li><a href="themsanpham.php"><span style="color: red"><span style= "font-size: 22px">Thêm sản phẩm</span></span></a></li>
                <li><a href="themnhom.php"><span style= "font-size: 22px">Thêm nhóm sản phẩm</span></a></li>
                <li><a href="qldonhang.php"><span style= "font-size: 22px">Quản lý đơn hàng</span></a></li>
            </ul>
</div></div>

        <div id="noidung">
            
        <br>
        <h2><font color="#000080"><span style="font-size: 26px">THÊM SẢN PHẨM</span></font></h2>
        <br>
            <div id="nd2"><form action="them.php" method="get">
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Loại hàng:
                <select name="ml">
                                <option value="dt">Thương hiệu</option>
                                <option value="pk">Trang điểm</option>
                                <option value="cs">Chăm sóc da</option>
                                </select><br><br>
                <input id="nutgui" type="submit" name="add" value="Chọn" /> 
        
    </form></div>
            
            
        </div>
        </div>
    </body>
</html>