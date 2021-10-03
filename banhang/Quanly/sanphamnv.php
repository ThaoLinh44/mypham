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
                <li><a href="sanphamnv.php"><span style="color: red"><span style= "font-size: 22px">Sản phẩm</span></span></a></li>
                <li><a href="themsanphamnv.php"><span style= "font-size: 22px">Thêm sản phẩm</span></a></li>
                <li><a href="themnhomnv.php"><span style= "font-size: 22px">Thêm nhóm sản phẩm</span></a></li>
                <li><a href="qldonhangnv.php"><span style= "font-size: 22px">Quản lý đơn hàng</span></a></li>
            </ul>
</div></div>
<br>
        <div id="noidung">
            
        <h2><font color="#000080"><span style="font-size: 26px">THÔNG TIN SẢN PHẨM</span></font></h2>
        <br>
            <div id="chucnang2"> 
                                         <ul>
                                   <?php
                        if(isset($_GET['loai'])){
                            $tt=$_GET['loai'];
                            if ($tt == 'dt'){
                                echo '<li><a href="sanpham.php">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Tất cả</a></li>
                    <li><a href="sanpham.php?loai=dt"><b><span style="color: red;">Thương hiệu</span></b></a></li>
                    <li><a href="sanpham.php?loai=pk">Trang điểm</a></li>
                    <li><a href="sanpham.php?loai=cs">Chăm sóc da</a></li>';
                            }else{
                                echo '<li><a href="sanpham.php">&ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Tất cả</a></li>
                    <li><a href="sanpham.php?loai=dt">Thương hiệu</a></li>
                    <li><a href="sanpham.php?loai=pk"><b><span style="color: red;">Trang điểm</span></b></a></li>
                    <li><a href="sanpham.php?loai=cs"><b><span style="color: red;">Chăm sóc da</span></b></a></li>';
                            }
                            
                        }else{
                            echo '<li><a href="sanpham.php"><b><span style="color: red;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Tất cả</span></b></a></li>
                    <li><a href="sanpham.php?loai=dt">Thương hiệu</a></li>
                    <li><a href="sanpham.php?loai=pk">Trang điểm</a></li>
                    <li><a href="sanpham.php?loai=cs">Chăm sóc da</a></li>
';
                        }
                      ?>
                  </ul>
                </div>
            <br>
            <br>
            <div id="tttk">
                <?php
                  if(isset($_GET['loai'])){
                            $tt=$_GET['loai'];
                            if ($tt == 'dt'){$lenh = "SELECT * FROM hanghoa WHERE maloai='$tt' "  ;
                                       $kq = mysqli_query($conn, $lenh);
                                            if(mysqli_num_rows($kq) > 0){
                                                echo "<table >";
                                                echo "<tr>";
                                                echo "<td class=\"giohinh\">Ảnh sản phẩm</td>";
                                                echo "<td class=\"gioten\">Tên sản phẩm</td>";
                                                echo "<td class=\"giogia\">Giá tiền</td>";
                                                echo "<td class=\"gioxoa\">Mô tả</td>";
                                                echo "<td class=\"tuychon\">Tùy chọn</td>";
                                                echo "</tr>";
                                                while ($row = mysqli_fetch_assoc($kq)){
                                                    echo "<tr>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                    echo "<td class=\"giohinh\">";
                                                    echo "<img src=\"../hinh/" .$row['hinh'] ."\" width=\"60px\" height=\"65px\"
>" ;
                                                    echo "</td>";
                                                    echo "<td class=\"gioten\">";
                                                    echo "" .$row['tenhang'];
                                                    echo "</td>";
                                                    echo "<td class=\"giogia\">";
                                                    echo '' .'<span style="color: red">' .$row['gia'] .'VND</span>';
                                                    echo "</td>";
                                                    echo "<td id=\"mota\" class=\"giosl\">";
                                                    echo "" .$row['mota'];
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo "<a href=\"suahanghoa.php?id=".$row['mahang'] ."\" target=\"\"> " ."Sửa" ."</a>" ;
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                                 echo "<tr>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "</tr>";
                                        
                                        echo "</table>";
                                            }
                                
                            }else{  
                                $lenh = "SELECT * FROM hanghoa WHERE maloai='$tt'"  ;
                                       $kq = mysqli_query($conn, $lenh);
                                            if(mysqli_num_rows($kq) > 0){
                                                echo "<table >";
                                                echo "<tr>";
                                                echo "<td class=\"giohinh\">Ảnh sản phẩm</td>";
                                                echo "<td class=\"gioten\">Tên sản phẩm</td>";
                                                echo "<td class=\"giogia\">Giá tiền</td>";
                                                echo "<td class=\"gioxoa\">Mô tả</td>";
                                                echo "<td class=\"tuychon\">Tùy chọn</td>";
                                                echo "</tr>";
                                                while ($row = mysqli_fetch_assoc($kq)){
                                                    echo "<tr>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                    echo "<td class=\"giohinh\">";
                                                    echo "<img src=\"../hinh/" .$row['hinh'] ."\" width=\"60px\" height=\"65px\"
>" ;
                                                    echo "</td>";
                                                    echo "<td class=\"gioten\">";
                                                    echo "" .$row['tenhang'];
                                                    echo "</td>";
                                                    echo "<td class=\"giogia\">";
                                                    echo '' .'<span style="color: red">' .$row['gia'] .'VND</span>';
                                                    echo "</td>";
                                                    echo "<td id=\"mota\" class=\"giosl\">";
                                                    echo "" .$row['mota'];
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo "<a href=\"suahanghoa.php?id=".$row['mahang'] ."\" target=\"\"> " ."Sửa" ."</a>" ;
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                                 echo "<tr>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "</tr>";
                                        
                                        echo "</table>";
                                            }
                                }
                     }else{
                      $lenh = "SELECT * FROM hanghoa "  ;
                                       $kq = mysqli_query($conn, $lenh);
                                            if(mysqli_num_rows($kq) > 0){
                                                echo "<table >";
                                                echo "<tr>";
                                                echo "<td class=\"giohinh\">Ảnh sản phẩm</td>";
                                                echo "<td class=\"gioten\">Tên sản phẩm</td>";
                                                echo "<td class=\"giogia\">Giá tiền</td>";
                                                echo "<td class=\"gioxoa\">Mô tả</td>";
                                                echo "<td class=\"tuychon\">Tùy chọn</td>";
                                                echo "</tr>";
                                                while ($row = mysqli_fetch_assoc($kq)){
                                                    echo "<tr>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                    echo "<td class=\"giohinh\">";
                                                    echo "<img src=\"../hinh/" .$row['hinh'] ."\" width=\"60px\" height=\"65px\"
>" ;
                                                    echo "</td>";
                                                    echo "<td class=\"gioten\">";
                                                    echo "" .$row['tenhang'];
                                                    echo "</td>";
                                                    echo "<td class=\"giogia\">";
                                                    echo '' .'<span style="color: red">' .$row['gia'] .'VND</span>';
                                                    echo "</td>";
                                                    echo "<td id=\"mota\" class=\"giosl\">";
                                                    echo "" .$row['mota'];
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo "<a href=\"suahanghoa.php?id=".$row['mahang'] ."\" target=\"\"> " ."Sửa" ."</a>" ;
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                                 echo "<tr>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "</tr>";
                                        
                                        echo "</table>";
                                            }
                  }
                            
                        
                      ?>
            </div>
            
        </div>
        </div>
    </body>
</html>