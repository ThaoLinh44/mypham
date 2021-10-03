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
        <style type="text/css">
            table{
                margin-left: auto; 
                margin-right: auto;
            }
        </style>
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
                            <input id="timnhap" type="text" name="search" placeholder="   Tìm kiếm sản phẩm..." />
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
                <div id="noidung">              
                            <br>
                            <div id="thanhtoan">
                                <div id="tieudethanhtoan">
                                    <p align="center"><span style="font-size: 32px">XÁC NHẬN THANH TOÁN</span></p>
                                </div>
                                <br>
                                <br>
                               <div id="thongtindiachi"> 
                                <p><font size=5px><b> &emsp; Thông tin khách hàng</b></font></p>
                                <br>
                                <?php
                                            $tk=$_SESSION['tk'];
                                            $lenh2 = "select * from khachhang where tkkh='$tk' ";
                                            $kq2 = mysqli_query($conn, $lenh2);
                                            if(mysqli_num_rows($kq2) > 0){
                                                while ($row2 = mysqli_fetch_assoc($kq2)){
                                                    echo "<font size=5px><i>Họ tên khách hàng:</i>";
                                                    echo "<font size=5px> &ensp;" .$row2['hotenkh'];
                                                    echo "<br>" ;
                                                    echo "<font size=5px><i>Số điện thoại:</i>";
                                                    echo " <font size=5px> &emsp; &emsp; &ensp; 0" .$row2['sdtkh'];
                                                    echo "<br>" ;
                                                    echo "<font size=5px><i>Địa chỉ:</i>";
                                                    echo "<font size=5px> &emsp; &emsp; &emsp; &emsp; &ensp;  &nbsp; " .$row2['diachikh'];
                                                }
                                            }
                                    ?></div>
                                <div id="thongtinsanpham"> 
                                <p align="center"><font size=5px><b>Thông tin sản phẩm</b></font></p>
                                <br>
                                
                                <div class="hinhsp">
                                <?php
                            if (isset($_GET['id'])) {
                                $id=$_GET['id'];
                                $lenh2 = "select * from hanghoa where mahang='$id' ";
                                $kq2 = mysqli_query($conn, $lenh2);
                                if(mysqli_num_rows($kq2) > 0){
                                    while ($row2 = mysqli_fetch_assoc($kq2)){
                                        echo "&emsp;&emsp;&emsp; <img src=\"hinh/" .$row2['hinh'] ."\" width=\"110px\" height=\"110px\">" ;
                                    }
                                }
                            }
                            
                        ?>
                                    </div>
                                    <div class="thongtinsp">
                                <?php
                            if (isset($_GET['id']) &&isset($_GET['sl'])) {
                                $id=$_GET['id'];
                                $sl=$_GET['sl'];
                                $lenh2 = "select * from hanghoa where mahang='$id' ";
                                $kq2 = mysqli_query($conn, $lenh2);
                                if(mysqli_num_rows($kq2) > 0){
                                    while ($row2 = mysqli_fetch_assoc($kq2)){
                                        echo "<font size=5px> &emsp;" .$row2['tenhang'] ."</font>";
                                        echo "<br>"; 
                                        echo "<p><font size=5px>Số lượng: " .$sl . " ";
                                        echo "<br>";
                                        echo "<p><font size=5px>Giá tiền: " .$row2['gia'] ."VND/1sp" ;
                                    }
                                }
                            }
                            
                        ?>
                                        
                                </div>
                                   
                    </div>
                            <br>
                            <br>
                              <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                              <br>
                            <br>
                            <br>
                            <br>
                            <br>
                           <div id="gichu-thanhtoan">
                               
                               <form method="post">

            <table >    
                <tr>
                    <td >
                        <input id="nutthanhtoan" type="submit" value="THANH TOÁN" name="thanhtoan"/>
                    </td>
                </tr>  
            </table>
                                   
            <?php 
                if (isset($_POST['thanhtoan'])) {
                    $tk=$_SESSION['tk'];
                    $ghichu=$_POST['ghichu'];
                    $id=$_GET['id'];
                    $sl=$_GET['sl'];
                    $lenh = "select * from khachhang where tkkh='$tk' ";
                                            $kq = mysqli_query($conn, $lenh);
                                            if(mysqli_num_rows($kq) > 0){
                                                while ($row = mysqli_fetch_assoc($kq)){
                                                    $diachi=$row['diachikh'];
                                                }
                                            }
                    $lenh2 = "select * from hanghoa where mahang='$id' ";
                                $kq2 = mysqli_query($conn, $lenh2);
                                if(mysqli_num_rows($kq2) > 0){
                                    while ($row2 = mysqli_fetch_assoc($kq2)){
                                       $gia=$row2['gia'];
                                    }
                                }
                    $lenh3 = "INSERT INTO donhang VALUES ('','$tk','','',NOW(),'$diachi','chuaxacnhan','$ghichu')";
                    mysqli_query($conn, $lenh3) or die ("Thêm dữ liệu thất bại!");
                    $iddh = mysqli_insert_id($conn);
                    $lenh4 = "INSERT INTO chitietdonhang VALUES ('$iddh','$id','$sl','$gia')";
                    mysqli_query($conn, $lenh4) or die ("Thêm dữ liệu thất bại!");
                    echo '<META http-equiv="refresh" content="0;URL=./nguoidung/chitietdonhang.php?iddh=' .$iddh .'">';
                    
                }
              ?>
        </form>      
                               <?php
                                   if (!isset($_GET['id'])){ echo '<META http-equiv="refresh" content="0;URL=index.php">';}
                                   ?>
                               <br>
                               <br>
                               <br>
                               <br>
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