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
                margin-left: 23%; 
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
                                    <p align="center"><font color="#000099"><span style="font-size: 32px">XÁC NHẬN THANH TOÁN</span></font></p>
                                </div>
                                <br>
                                <br>
                               <div id="thongtindiachi"> 
                                <p><b><font color="#000055"><span style="font-size: 23px">&emsp;Thông tin khách hàng</span></font></b></p> 
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
                                <p><b><font color="#000055"><span style="font-size: 23px">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Thông tin sản phẩm</span></font></b></p>
                                <?php
                                       $tk = $_SESSION['tk'];
                                       $tongtien = 0;
                                       echo "<table>";
                                       $lenh = "SELECT * FROM giohang,hanghoa WHERE tkkh='$tk' AND giohang.mahang=hanghoa.mahang"  ;
                                       $kq = mysqli_query($conn, $lenh);
                                            if(mysqli_num_rows($kq) > 0){
                                                while ($row = mysqli_fetch_assoc($kq)){
                                                    $tongtien = $tongtien + $row['gia'] * $row['soluong'];
                                                    echo "<tr>";
                                                    echo "<td rowspan=\"2\"> "  ."<img src=\"hinh/"  .$row['hinh'] ."\" width=\"90px\" height=\"70px\">" ."</td>"; 
                                                    echo "<td colspan=\"2\">&emsp; &emsp; <font size=5px &emsp;> <b>" .$row['tenhang'] ."</font> </td>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                    echo "<td ><p><font size=5px> &emsp; &emsp;Số lượng: " .$row['soluong'] ." &emsp; |</td>";
                                                    echo "<td ><p><font size=5px> &emsp;Giá tiền: " .$row['gia'] ."VND/1sp</td>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                    echo "<td><br></td>";
                                                    echo "</tr>";
                                                    echo "<tr>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "<td><br></td>";
                                                    echo "</tr>";
                                                }
                                            }
                                        echo "</table>";
                                    ?>
                                
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
                            <br>
                            <br>
                           <div id="gichu-thanhtoan">
                               
                               <form method="post">
                                    <input id="nutthanhtoan" type="submit" value="THANH TOÁN" name="thanhtoan"/>

            <?php 
                if (isset($_POST['thanhtoan'])) {
                    $tk=$_SESSION['tk'];
                    $ghichu=$_POST['ghichu'];
                    $lenh = "select * from khachhang where tkkh='$tk' ";
                                            $kq = mysqli_query($conn, $lenh);
                                            if(mysqli_num_rows($kq) > 0){
                                                while ($row = mysqli_fetch_assoc($kq)){
                                                    $diachi=$row['diachikh'];
                                                }
                                               
                                            }
                     
                    $lenh4 = "SELECT * FROM giohang,hanghoa WHERE tkkh='$tk' AND giohang.mahang=hanghoa.mahang"  ;
                                       $kq = mysqli_query($conn, $lenh4);
                                       if(mysqli_num_rows($kq) > 0){
                                           $lenh3 = "INSERT INTO donhang VALUES ('','$tk','','',NOW(),'$diachi','chuaxacnhan','$ghichu')";
                    mysqli_query($conn, $lenh3) or die ("Thêm dữ liệu thất bại");
                    $iddh = mysqli_insert_id($conn);
                                         while ($row2 = mysqli_fetch_assoc($kq)){
                                             $i=0;
                                             $id[i]=$row2['mahang'];
                                             $sl[i]=$row2['soluong'];
                                             $gia[i]=$row2['gia'];
                                             $lenh5 = "INSERT INTO chitietdonhang VALUES ('$iddh','$id[i]','$sl[i]','$gia[i]')";
                                             mysqli_query($conn, $lenh5);
                                             }$lenh6 = "DELETE FROM giohang WHERE tkkh = '$tk'";
                    mysqli_query($conn, $lenh6);
                    echo '<META http-equiv="refresh" content="0;URL=./nguoidung/chitietdonhang.php?iddh=' .$iddh .'">';
                                            }else {
                                                 echo '<META http-equiv="refresh" content="0;URL=index.php">';}
                                        
                   
                                             
                    
                    
                }
              ?>
        </form>
                               
                                </div>
            </div>
                        
                   
                
                </div>
            </div>
            <?php
            include 'footer.php';
        ?>
    </body>
</html>