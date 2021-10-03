<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Chảnh Consmetics</title>
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

                            <input id="nuttim" type="submit"  value=" Search" />
                              
                           
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
                <br>
                <br>
                <br>
                <div id="noidung">
   
                    <div id="menu2">
                        <div id="dt" >
                            <h2 align="center">THƯƠNG HIỆU</h2>
                            <ul>
                                <?php
                                $lenh = "SELECT manhom,tennhomdt FROM  nhomthuonghieu ";
                                $kq = mysqli_query($conn, $lenh);
                                if(mysqli_num_rows($kq) > 0){

                                    while ($row = mysqli_fetch_assoc($kq)){
                                        echo "<li><a href=\"thuonghieu.php?id=" .$row['manhom'] ."\">" .$row['tennhomdt'] ."</a></li>";
                                    }
                                }
                            ?>
                            </ul>
                            
                        </div>
                            
                    </div>
                    
                     <div align="center" id="slogan">
                    <img src="bg/oke.png" width="1170px" height="400px">
                 </div>
                    
                    <div id="noidungchinh">
                        <div id="noibac">
                            <h3>SẢN PHẨM BÁN CHẠY</h3>
                            <br>
                             <?php
                            include 'noibac.php';
                        ?>
                            
                            </div>
                           
                            <br>
                            <br>
                        <div id="sanphammoi">
                        <br>&emsp;&emsp;
                           <h3>  <?php
                            if (isset($_GET['id'])) {
                                $id=$_GET['id'];
                                $lenh2 = "select * from nhomthuonghieu where maloai='dt' AND manhom='$id' ";
                                $kq2 = mysqli_query($conn, $lenh2);
                                if(mysqli_num_rows($kq2) > 0){
                                    while ($row2 = mysqli_fetch_assoc($kq2)){
                                        echo "" .$row2['tennhomdt'];
                                    }
                                }
                            }
                            
                        ?></h3>
                            <?php
                            if (isset($_GET['id'])) {
                                $id=$_GET['id'];
                                $lenh2 = "select * from hanghoa where maloai='dt' AND manhom='$id' ";
                                $kq2 = mysqli_query($conn, $lenh2);
                                if(mysqli_num_rows($kq2) > 0){
                                    while ($row2 = mysqli_fetch_assoc($kq2)){
                                        echo "<div class=\"sp\">";
                                        echo("<a href=\"sanpham.php?id=".$row2['mahang'] ."\" target=\"\"><img src=\"hinh/" .$row2['hinh'] ."\" width=\"100%\" height=\"280px\"
        ></a>" ); 
                                        echo"<br>";
                                        echo"<br>";

                                        echo("<a href=\"sanpham.php?id=".$row2['mahang'] ."\" target=\"\"> " .$row2['tenhang'] ."</a>" );
                                        echo"<br>";
                                        echo"<br>";
                                        echo("<p align=\"center\">" .$row2['gia'] ."đ" ."</p>");
                                        echo "</div>";
                                        }
                                }

                            }
                            
                        ?>
                            
                           
                        
                        </div>
                        
                    </div>
                    
                    <br >
                    <br >
                    <br >
                    <br >
                    <br >
                    <br >

                
                </div>
            </div>
            <?php
            include 'footer.php';
        ?>
    </body>
</html>