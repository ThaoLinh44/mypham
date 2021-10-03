<?php session_start(); 
if (!isset($_SESSION['tk'])) {
	 header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Bắp Consmetics</title>
        <link rel="stylesheet" href="index.css">
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
            include 'ketnoi.php';
        ?>
        <div id="toancuc">             
                <div id="menu">
                  <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="#">Hướng dẫn</a></li>
                    <li><a href="#">Liên hệ</a></li>
                  </ul>
                </div>
                 <div id="search">
                        <form action="search.php" method="get">
                            <input id="timnhap" type="text" name="search" placeholder="   Bạn cần tìm gì..." />
                            <input id="nuttim" type="submit" value="Search" />
                        </form>
                    </div>
            
                <div id="login">
                        <ul>
                            <?php 
                               if(isset($_SESSION['tk'])){
                                   
                                   echo "<li><a href=\"logout.php\">Logout</a>";
                                   echo "<li><a href=\"./nguoidung/tk.php\">" .$_SESSION['tk'] ."</a></li>";
                               }
                               else{
                                   echo "<li><a href=\"dangky.php\">Đăng ký</a></li>";
                                   echo  "<li><a href=\"dangnhap.php\">Đăng nhập</a></li>";
                               }
                               ?>
                            
                            <div id="gioh"><a href="giohang.php"><img src="bg/favorite-cart.png" width="50px" height="40px"></a></div>
                            
                        </ul>
                    </div>

                
                
                <div align="center" id="slogan">
                    <img src="bg/oke.png" width="1170px" height="400px">
                 </div>
<br>
                <br>
                <br>
                <div id="noidung">              
                            <br>
                            <div id="giohang">
                                <div id="thongtingiohang">
                                    <h2 align="center"><font color="#000080"><span style="font-size: 23px">THÔNG TIN GIỎ HÀNG</span></font></h2>
                                    <?php
                                       $tk = $_SESSION['tk'];
                                       $tongtien = 0;
                                       echo "<table >";
                                       $lenh = "SELECT * FROM giohang,hanghoa WHERE tkkh='$tk' AND giohang.mahang=hanghoa.mahang"  ;
                                       $kq = mysqli_query($conn, $lenh);
                                            echo "<tr>";
                                            echo "<td><br></td>";
                                            echo "<td><br></td>";
                                            echo "<td><br></td>";
                                            echo "<td><br></td>";
                                            echo "<td><br></td>";
                                            echo "</tr>";
                                                echo "<tr>";
                                                echo "<td>";
                                                echo("Ảnh sản phẩm" );
                                                echo "</td>";
                                                echo "<td>";
                                                echo("&emsp; &emsp; &emsp; &emsp; &emsp; &emsp; Tên sản phẩm" );
                                                echo "</td>";
                                                echo "<td>";
                                                echo("&emsp; &emsp; Giá tiền" );
                                                echo "</td>";
                                                echo "<td>";
                                                echo("Số lượng" );
                                                echo "</td>";
                                                echo "</tr>";
                                            if(mysqli_num_rows($kq) > 0){
                                                while ($row = mysqli_fetch_assoc($kq)){
                                                    $tongtien = $tongtien + $row['gia'] * $row['soluong'];
                                                    echo "<tr>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "</tr>";
                                            
                                                    echo "<tr>";
                                                    echo "<td class=\"giohinh\">";
                                                    echo("<a href=\"sanpham.php?id=".$row['mahang'] ."\" target=\"\"><img src=\"hinh/" .$row['hinh'] ."\" width=\"130px\" height=\"130px\"
></a>" );
                                                    echo "</td>";
                                                    echo "<td class=\"gioten\">";
                                                    echo("<a href=\"sanpham.php?id=".$row['mahang'] ."\" target=\"\"> " .$row['tenhang'] ."</a>" );
                                                    echo "</td>";
                                                    echo "<td class=\"giogia\">";
                                                    echo '' .'<span style="color: red">' .$row['gia'] .'VND</span>';
                                                    echo "</td>";
                                                    echo "<td class=\"giosl\">";
                                                    echo "" .$row['soluong'];
                                                    echo "</td>";
                                                    echo "<td class=\"gioxoa\">";
                                                    echo("<a href=\"xoa.php?id=".$row['mahang'] ."\" target=\"\"> " ."Hủy</a>" );
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                        echo "<tr>";
                                        echo "<td><br></td>";
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
                                        echo '<td colspan="2">&emsp;<button id="thanhtoangiohang" onclick="window.location.href=' .'\'thanhtoangiohang.php\'' .'">
          THANH TOÁN
          
       </button></td>';
                                        echo "</tr>";
                                        echo "</table>";
                                    ?>
                                
                                </div>
                                
                            
                    </div>
                        
                    
                    
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />

                
                </div>
            </div>
            <?php
            include 'footer.php';
        ?>
    </body>
</html>