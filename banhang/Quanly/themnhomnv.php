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
                margin-left: 430px;
                height: 130px;
            }
            table tr td{
                font-size: 20px;
            }
            caption{
                color: #000080;
                font-size: 23px;
            }
            #themmoi{
                margin-left:97px;
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
                    </div>
                    <br><br>
        <div id="mucluc">
                        <div id="tieudemucluc">
                <h3><span style="font-size: 26px">Menu</span></h3>
            </div>
         <div id="giua">
            <ul>
                <li><a href="nhanvien.php"><span style= "font-size: 22px">Thông tin nhân viên</span></a></li>
                <li><a href="qlsanphamnoibatnv.php"><span style= "font-size: 22px">Sản phẩm nổi bật</span></a></li>
                <li><a href="sanphamnv.php"><span style= "font-size: 22px">Sản phẩm</span></a></li>
                <li><a href="themsanphamnv.php"><span style= "font-size: 22px">Thêm sản phẩm</span></a></li>
                <li><a href="themnhomnv.php"><span style="color: red"><span style= "font-size: 22px">Thêm nhóm sản phẩm</span></span></a></li>
                <li><a href="qldonhangnv.php"><span style= "font-size: 22px">Quản lý đơn hàng</span></a></li>
            </ul>
</div></div>

        <div id="noidung">
            <br>
        <h2><font color="#000080"><span style="font-size: 26px">THÊM NHÓM SẢN PHẨM</span></font></h2>
        <br>
            <form action="" method="post">
    <table>
        <tr>
                    <td>Loại hàng:</td>
                    <td><select name="ml">
                        <option value="dt">Thương hiệu</option>
                        <option value="pk">Trang điểm</option>
                        <option value="cs">Chăm sóc da</option>
                        </select></td>
                </tr>
        <tr>
            <td>Tên nhóm:</td>
            <td><input id="khung" type="text" name="tennhom" value=""></td>
        </tr>
        <tr>
            <td><br></td>
        </tr>
        <tr>
            <td colspan="2">
                <input id="themmoi" type="submit" value="Thêm mới" name="insert" />
            </td>
        </tr>
    </table>
            </form>
    
        
        <?php
            if(isset($_POST['insert'])){
                $tennhomdt= $_POST['tennhom'];
                $ml= $_POST['ml'];
                if($ml=='dt'){
                    $lenh = "INSERT INTO nhomthuonghieu(maloai,tennhomdt) VALUES ('$ml','$tennhomdt')";
                mysqli_query($conn, $lenh) or die ("Thêm dữ liệu thất bại!");
                }else if($ml=='pk'){
                    $lenh = "INSERT INTO nhomtrangdiem(maloai,tennhompk) VALUES ('$ml','$tennhomdt')";
                mysqli_query($conn, $lenh) or die ("Thêm dữ liệu thất bại!");}
                }else if($ml=='cs'){
                    $lenh = "INSERT INTO nhomchamsoc(maloai,tennhomcs) VALUES ('$ml','$tennhomcs')";
                mysqli_query($conn, $lenh) or die ("Thêm dữ liệu thất bại!");}
                
            
    
        ?>
            
        </div>
        </div>
    </body>
</html>