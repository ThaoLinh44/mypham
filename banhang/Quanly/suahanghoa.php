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
                height: 210px;
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
                <li><a href="qlsanphamnoibat.php"><span style= "font-size: 22px">Sản phẩm nổi bật</span></a></li>
                <li><a href="sanpham.php"><span style= "font-size: 22px">Sản phẩm</span></a></li>
                <li><a href="themsanpham.php"><span style= "font-size: 22px">Thêm sản phẩm</span></a></li>
                <li><a href="themnhom.php"><span style= "font-size: 22px">Thêm nhóm sản phẩm</span></a></li>
                <li><a href="qldonhang.php"><span style= "font-size: 22px">Quản lý đơn hàng</span></a></li>
                <li><a href="suahanghoa.php"><span style="color: red"><span style= "font-size: 22px">Sửa sản phẩm</span></span></a></li>
            </ul>
</div></div>

        <div id="noidung">
        <br>
        <h2><font color="#000080"><span style="font-size: 26px">&emsp;SỬA THÔNG TIN SẢN PHẨM</span></font></h2>
        <br>
            <div id="nd2"><form method="post" enctype="multipart/form-data">
            <table width="45%">
                
                <?php
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $lenh3 =" SELECT * FROM hanghoa WHERE mahang='$id'";
                        $kq2 = mysqli_query($conn, $lenh3);
                                            if(mysqli_num_rows($kq2) > 0){
                                                while ($row2 = mysqli_fetch_assoc($kq2)){
                                                    echo '<tr>
                    <td>Mã loại:</td>
                    <td><input id="khung" type="text" name="ml" value="' .$row2['maloai'] .' "></td>
                </tr>';
                                                    echo '<tr>
                    <td>Mã nhóm:</td>
                    <td><input id="khung" type="text" name="mn" value="' .$row2['manhom'] .' "></td>
                </tr>';
                                                    echo '<tr>
                    <td>Tên hàng:</td>
                    <td><input id="khung" type="text" name="th" value="' .$row2['tenhang'] .' "></td>
                </tr>';
                                                    echo '<tr>
                    <td>Giá:</td>
                    <td><input id="khung" type="number" name="gia" value="' .$row2['gia'] .'"></td>
                </tr>';
                echo '<tr>
                    <td><br></td>
                </tr>';
                                                    echo '<tr>
                    <td colspan="2">
                        <input id="nutdn" type="submit" value="Cập nhật" name="insert" />
                    </td>
                </tr>';
                                                }
                                            }
                    }
                ?>

                
            </table>
            </form>
    
        
        <?php
            if(isset($_POST['insert'])){
                $ml= $_POST['ml'];
                $mn= $_POST['mn'];
                $id = $_GET['id'];
                $th= $_POST['th'];
                $gia= $_POST['gia'];
   
                $lenh = "UPDATE hanghoa SET maloai = '$ml', manhom = '$mn', tenhang = '$th', gia = '$gt'WHERE mahang = '$id'";
                mysqli_query($conn, $lenh) or die ("Thêm dữ liệu thất bại!");
                header('Location: sanpham.php');
            }
        ?>
         </div>   
            
        </div>
        </div>
    </body>
</html>