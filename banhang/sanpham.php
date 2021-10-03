<?php session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Bắp Consmetics</title>
        <link rel="stylesheet" href="index.css">
        <style type="text/css">
            table{

                height: 170px;
                width: 233px;
                margin-left: auto; 
                margin-right: auto;
                font-size: 20px; 
                border-spacing:0.1px;

            }
        </style>
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
                    <img src="https://file.hstatic.net/1000006063/file/romand_banner_2021_caf9a4944e83460682cfd3ba5e53e868_1024x1024.jpg" width="1350px" height="250px">
                 </div>
                <div  id="sanpham">
                    <br>
                        &emsp;&emsp;
                            
                            <div id="hinh">
                                
                                <?php
                            if (isset($_GET['id'])) {
                                $id=$_GET['id'];
                                $lenh2 = "select * from hanghoa where mahang='$id' ";
                                $kq2 = mysqli_query($conn, $lenh2);
                                if(mysqli_num_rows($kq2) > 0){
                                    while ($row2 = mysqli_fetch_assoc($kq2)){
                                        echo "<img src=\"hinh/" .$row2['hinh'] ."\" width=\"500px\" height=\"500px\">" ;
                                    }
                                }
                            }
                            

                        ?>
                            </div>
                            <h2 align="center">SẢN PHẨM</h2>
                            <div id="thongtin">
                                <br>
                                <br>
                                <form method="POST" >
                                <?php
                            if (isset($_GET['id'])) {
                                $id=$_GET['id'];
                                $lenh2 = "select * from hanghoa where mahang='$id' ";
                                $kq2 = mysqli_query($conn, $lenh2);
                                if(mysqli_num_rows($kq2) > 0){
                                    while ($row2 = mysqli_fetch_assoc($kq2)){
                                        echo "<h3>" .$row2['tenhang'] ."</h3>";
                                        echo "<br>";
                                        echo "<br>";
                                        echo'

            <table>
                <tr>
                    <td>Giá:</td>
                    <td>' .$row2['gia'] .' đ</td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td>Số lượng:</td>
                    <td><input id="muasl" type="number" name="sl" value="1"></td>
                </tr>
                <tr>
                    <td > <input id="gio" type="submit" name="gio" value="THÊM VÀO GIỎ HÀNG"></td>
                    <td > <input id="mua" type="submit" name="mua" value="MUA NGAY!"></td>
                </tr>
            </table>'
   ;
                                        
                                    }
                                }
                            }
                            
                        ?>  
                                    <?php
                                
                                if(!isset($_SESSION['tk']) AND isset($_POST['gio'])){
                                   
                                   echo '<script language="javascript">
            alert("bạn chưa đăng nhập");
        </script>';     
                                }else if(isset($_POST['gio'])){
                                   $tk=$_SESSION['tk'];
                                   $id=$_GET['id'];
                                   $sl=$_POST['sl'];
                                   $sql="select * from giohang where tkkh='$tk'AND mahang='$id'";
                                    $kt=mysqli_query($conn, $sql);

                                    if(mysqli_num_rows($kt)  > 0){
                                        echo '<script language="javascript">
                    alert("trong giỏ hàng của bạn đã có sản phẩm này!");
                </script>';
                                    }else{
                                        $lenh = "INSERT INTO giohang VALUES ('$tk','$id','$sl')";
                                           mysqli_query($conn, $lenh);
                                           echo '<script language="javascript">
                    alert("đã thêm vào giỏ hàng của bạn");
                </script>';
                                    }
                                   
                                }
                                if(!isset($_SESSION['tk']) AND isset($_POST['mua'])){
                                   
                                    echo '<script language="javascript">
            alert("bạn chưa đăng nhập");
        </script>';    
                               }else if(isset($_POST['mua'])){
                                   $id=$_GET['id'];
                                   $sl=$_POST['sl'];
                                   echo '<META http-equiv="refresh" content="0;URL=thanhtoan.php?id=' .$id ,'&sl=' .$sl .'">';
                                   
                                }
                               
                               ?>
                                    </form>
                                

                            <br>




                                                       
                        <div id="showContainer"></div>
                        <div id="noibac">
                             <br>
                            <br>

                            <h3>CÓ THỂ BẠN QUAN TÂM</h3>
                            <br>
                             <?php
                            include 'noibac.php';
                        ?>
                            
                            </div>
                            <br>
                            <br>

                           <div id="mota">
                               <h2 align="center"><font color="#000080"><span style="font-size: 19px">MÔ TẢ SẢN PHẨM</span></font></h2>
                                <?php
                            if (isset($_GET['id'])) {
                                $id=$_GET['id'];
                                $lenh2 = "select * from hanghoa where mahang='$id' ";
                                $kq2 = mysqli_query($conn, $lenh2);
                                if(mysqli_num_rows($kq2) > 0){
                                    while ($row2 = mysqli_fetch_assoc($kq2)){
                                        echo "" .$row2['mota']  ;
                                    }
                                }
                            }
                            
                          ?>
                    </br>
                    </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
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