<?php session_start(); 
if (!isset($_SESSION['tk'])) {
	 header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Bắp Consmetics</title>
        <link rel="stylesheet" href="../index.css">
        <script src="jquery.min.js" type="text/javascript"></script> 
        <script language="javascript">
           $(document).ready(function() {
                $('#previous').on('click', function(){
                // Change to the previous image
                $('#im_' + currentImage).stop().fadeOut(1);
                decreaseImage();
                $('#im_' + currentImage).stop().fadeIn(1);
                });
                $('#next').on('click', function(){
                // Change to the next image
                $('#im_' + currentImage).stop().fadeOut(1);
                increaseImage();
                $('#im_' + currentImage).stop().fadeIn(1);
                });
               window.setInterval(function() {
                $('#next').click();
                }, 3000);
                var currentImage = 1;
                var totalImages = 3;

                function increaseImage() {
                /* Increase currentImage by 1.
                * Resets to 1 if larger than totalImages
                */
                ++currentImage;
                if(currentImage > totalImages) {
                currentImage = 1;
                }
                }
                function decreaseImage() {
                /* Decrease currentImage by 1.
                * Resets to totalImages if smaller than 1
                */
                --currentImage;
                if(currentImage < 1) {
                currentImage = totalImages;
                }
                }
                });
             
        </script>
    </head>
    <body >
        <?php
            include '../ketnoi.php';
        ?>
        <div id="toancuc">             
                <div id="menu">
                  <ul>
                    <li><a href="../index.php">Trang chủ</a></li>
                    <li><a href="#">Hướng dẫn</a></li>
                    <li><a href="#">Liên hệ</a></li>
                  </ul>
                </div>
                 <div id="search">
                        <form action="search.php" method="get">
                            <input id="timnhap" type="text" name="search" placeholder="   Bạn cần tìm gì..." />

                            <input id="nuttim" type="submit"  value=" Search" />
                              
                           
                        </form>
                    </div>

                <div id="login">
                        <ul>
                            <?php 
                               if(isset($_SESSION['tk'])){
                                   
                                   echo "<li><a href=\"logout.php\">Logout</a>";
                                   echo "<li><a href=\"tk.php\">" .$_SESSION['tk'] ."</a></li>";
                               }
                               else{
                                   echo "<li><a href=\"dangky.php\">Đăng ký</a></li>";
                                   echo  "<li><a href=\"dangnhap.php\">Đăng nhập</a></li>";
                               }
                               ?>
                            
                            <div id="gioh"><a href="../giohang.php"><img src="../bg/favorite-cart.png" width="50px" height="40px"></a></div>
                        </ul>
                    </div>   
                    <br>
                    <div align="center" id="slogan">
                    <img src="../bg/oke.png" width="1170px" height="400px">
                 </div>
            <br>
            <br>
            <br>
                <div id="noidung">              
                            <br>
                            <div id="tk">

                               <div id="chucnang"> 
                                   
                  <ul>
                    <li><a href="tk.php"><span style= "font-size: 21px">Thông tin tài khoản</span></a></li>
                    <li><a href="donhang.php"><span style= "font-size: 21px">Đơn hàng của bạn</span></a></li>
                  </ul>
                </div>
                                <div id="thongtintk"> 
                                <p align="center"><b><font color="#000099"><span style="font-size:23px">CHI TIẾT ĐƠN HÀNG</span></font></b></p>
                                    <br>
            <div id="tttk">
            <table >
                <?php
                if(isset($_GET['iddh'])){
                    $iddh=$_GET['iddh'];
                    $tk=$_SESSION['tk'];
                    $tongtien = 0;
                    $i = 0;
                    $lenh3 =" SELECT * FROM donhang WHERE masodh='$iddh'";
                    $kq2 = mysqli_query($conn, $lenh3);
                                            if(mysqli_num_rows($kq2) > 0){
                                                
                                                echo "<table >";
                                                while ($row2 = mysqli_fetch_assoc($kq2)){
                                                    echo "<tr>";
                                                    echo "<td>";
                                                    echo "Mã đơn hàng: ";
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo "&emsp;&emsp;".$iddh ;
                                                    echo "</td>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                    echo "<td>";
                                                    echo "Ngày tạo: ";
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo "&emsp;&emsp;".$row2['ngaydathang'] ;
                                                    echo "</td>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                    echo "<td>";
                                                    echo "Địa chỉ: ";
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo "&emsp;&emsp;".$row2['diachinhanhang'] ;
                                                    echo "</td>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                    echo "<td>";
                                                    echo "Tình trạng: ";
                                                    echo "</td>";
                                                    echo "<td>";
                                                    echo "&emsp;&emsp;".$row2['tinhtrang'] ;
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
                                                echo "<td class=\"giohinh\">Ảnh sản phẩm</td>";
                                                echo "<td class=\"gioten\">&emsp;&emsp;&emsp;&emsp;Tên sản phẩm</td>";
                                                echo "<td class=\"giogia\">&emsp;&ensp;Giá</td>";
                                                echo "<td class=\"giosl\">Số lượng</td>";

                                                echo "</tr>";
                                                while ($row = mysqli_fetch_assoc($kq)){
                                                    $i++;
                                                    $tongtien = $tongtien + $row['giadathang1sp'] * $row['soluong'];
                                                    echo "<tr>";
                                                    echo "<td><hr></td>";
                                                    echo "<td><hr></td>";
                                                    echo "<td><hr></td>";
                                                    echo "<td><hr></td>";
                                                    echo "<td><hr></td>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                    echo "<td class=\"giohinh\">";
                                                    echo("<img src=\"../hinh/" .$row['hinh'] ."\" width=\"100px\" height=\"100px\" >" );
                                                    echo "</td>";
                                                    echo "<td class=\"gioten\">";
                                                    echo "<font size=5px> &emsp;" .$row['tenhang'] ."</font>";
                                                    echo "</td>";
                                                    echo "<td class=\"giogia\">";
                                                    echo '' .'<span style="color: red">' .$row['giadathang1sp'] .' VND</span>';
                                                    echo "</td>";
                                                    echo "<td class=\"giosl\">";
                                                    echo "&emsp;&ensp;" .$row['soluong'];
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
                                        echo "<br>";
                                        echo "<br>";
                                        echo '<b><span style="color: "#000099"; ">&emsp;&emsp;&emsp;&emsp;&emsp;TỔNG TIỀN</span></b>';
                                        echo "</td>";
                                        echo "<td >";

                                        echo "<br>";
                                        echo "<br>";
                                        echo '' .'<span style="color: red">&emsp;' .$tongtien .' VND</span>';
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
              
            
                           
                          
                               <br>
                               <br>
                                <br>
                               <br>
                               <br>
                                </div>
                            
                    </div>
                        
                    

                
                
            </div>
            <?php
            include '../footer.php';
        ?>
    </body>
</html>