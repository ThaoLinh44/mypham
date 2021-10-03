<?php session_start(); 
if (!isset($_SESSION['tk'])) {
	 header('Location: qldangnhap.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="qlnv.css">

    </head>
    <body >
        <div id="toancuc">
        <?php
            include '../ketnoi.php';
        ?>
        <div id="tieude">
            <h1>Bắp Consmetics</h1>
        </div>
        <div id="mucluc">
                        <div id="tieudemucluc">
                <h3>Menu</h3>
            </div>
         <?php
            include 'menu.php';
        ?></div>

        <div id="noidung">
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
            
        <h2>Thông tin đơn hàng</h2>
        <br>
        <br>
            <div id="tttk">
            <table >
                <?php
                if(isset($_GET['iddh'])){
                    $iddh=$_GET['iddh'];
                    $tk=$_SESSION['tk'];
                    $tongtien = 0;
                    $i = 0;
                    $lenh3 =" SELECT * FROM donhang ,khachhang WHERE masodh='$iddh' AND donhang.tkkh=khachhang.tkkh  ";
                    $kq2 = mysqli_query($conn, $lenh3);
                                            if(mysqli_num_rows($kq2) > 0){
                                                
                                                echo "<table >";
                                                while ($row2 = mysqli_fetch_assoc($kq2)){
                                                    echo "<tr>";
                                                    echo "<td>";
                                                    echo "Mã đơn hàng: ";
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo "".$iddh ;
                                                    echo "</td>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                    echo "<td>";
                                                    echo "Ngày tạo: ";
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo "".$row2['ngaydathang'] ;
                                                    echo "</td>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                    echo "<td>";
                                                    echo "tk: ";
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo "" .$row2['tkkh'] ;
                                                    echo "</td>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                    echo "<td>";
                                                    echo "Tên khách hàng: ";
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo "".$row2['hotenkh'] ;
                                                    echo "</td>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                    echo "<td>";
                                                    echo "số điện thoại: ";
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo "0" .$row2['sdtkh'] ;
                                                    echo "</td>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                    echo "<td>";
                                                    echo "Chứng minh nhân dân: ";
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo "".$row2['cmndkh'] ;
                                                    echo "</td>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                    echo "<td>";
                                                    echo "Địa chỉ: ";
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo "".$row2['diachinhanhang'] ;
                                                    echo "</td>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                    echo "<td>";
                                                    echo "Tình trạng: ";
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo "".$row2['tinhtrang'] ;
                                                    echo "</td>";
                                                    echo "</tr>";
                                                        
                                                }
                                                echo "</table >";
                                            }
                    echo '<br>';
                    echo '<br>';
                    echo "<table >";
                                       $lenh = "SELECT * FROM chitietdonhang,hanghoa WHERE masodh='$iddh' AND chitietdonhang.mahang=hanghoa.mahang"  ;
                                       $kq = mysqli_query($conn, $lenh);
                                            if(mysqli_num_rows($kq) > 0){
                                                echo "<tr>";
                                                echo "<td class=\"giohinh\">Hình ảnh sản phẩm</td>";
                                                echo "<td class=\"gioten\">Tên sản phẩm</td>";
                                                echo "<td class=\"giogia\">Giá</td>";
                                                echo "<td class=\"giosl\">Số lượng</td>";

                                                echo "</tr>";
                                                while ($row = mysqli_fetch_assoc($kq)){
                                                    $i++;
                                                    $tongtien = $tongtien + $row['giadathang1sp'] * $row['soluong'];
                                                    echo "<tr>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                    echo "<td class=\"giohinh\">";
                                                    echo("<a href=\"../sanpham.php?id=".$row['mahang'] ."\" target=\"\"><img src=\"../hinh/" .$row['hinh'] ."\" width=\"60px\" height=\"65px\"
></a>" );
                                                    echo "</td>";
                                                    echo "<td class=\"gioten\">";
                                                    echo("<a href=\"../sanpham.php?id=".$row['mahang'] ."\" target=\"\"> " .$row['tenhang'] ."</a>" );
                                                    echo "</td>";
                                                    echo "<td class=\"giogia\">";
                                                    echo '' .'<span style="color: red">' .$row['giadathang1sp'] .'VND</span>';
                                                    echo "</td>";
                                                    echo "<td class=\"giosl\">";
                                                    echo "" .$row['soluong'];
                                                    echo "</td>";
                                                    
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                        echo "<tr>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        
                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td>&emsp;</td>";
                                        echo "<td >";
                                        echo "&emsp; &emsp; &emsp; &emsp; &emsp; TỔNG TIỀN";
                                        echo "</td>";
                                        echo "<td >";
                                        echo '' .'<span style="color: red">&emsp;' .$tongtien .'VND</span>';
                                        echo "</td>";
                                        
                                        echo "</tr>";
                                        echo "</table>";
                }
                echo "</table>
            </div>
                    
                    <br>
                                
                    </div>";
                for ($j=0;$j <= $i;$j++){
                                        echo "<br>";
                                        echo "<br>";
                                        echo "<br>";
                                        echo "<br>";
                                        echo "<br>";
                                        

                                    }
                
                
                ?>
            
            
        </div>
        </div>
    </body>
</html>