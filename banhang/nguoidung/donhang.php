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
            hr{
                width: 23%;
                background-color: red;
            }
        </style>
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
                                   
                                   echo "<li><a href=\"../logout.php\">Logout</a>";
                                   echo "<li><a href=\"tk.php\">" .$_SESSION['tk'] ."</a></li>";
                               }
                               else{
                                   echo "<li><a href=\"../dangky.php\">Đăng ký</a></li>";
                                   echo  "<li><a href=\"../dangnhap.php\">Đăng nhập</a></li>";
                               }
                               ?>
                            
                            <div id="gioh"><a href="../giohang.php"><img src="../bg/favorite-cart.png" width="50px" height="40px"></a></div>
                        </ul>
                    </div>    
            <br>
            <br>
                
                     <div align="center" id="slogan">
                    <img src="../bg/oke.png" width="1170px" height="400px">
                 </div>

                <div id="noidung">              
                            <br>
                            <div id="tk">

                               <div id="chucnang"> 
                                   
                  <ul>
                    <li><a href="tk.php"><span style= "font-size: 21px">Thông tin tài khoản</span></a></li>
                    <li><a href="Capnhat.php"><span style= "font-size: 21px">Cập nhật thông tin</span></a></li>
                    <li><a href="doimk.php"><span style= "font-size: 21px">Đổi mật khẩu</span></a></li>
                    <li><a href="donhang.php"><span style="color: red;"><span style= "font-size: 21px">Đơn hàng</span></span></a></li>
                  </ul>
                </div>
                                <div id="thongtintk"> 
                                <h3 align="center"><b><font color="#000080"><span style="font-size: 21px">THÔNG TIN ĐƠN HÀNG</span></font></b></h3>
                                <hr>
                                <br>
                                    <div id="chucnang2"> 
                                        <ul>
                                   <?php
                        if(isset($_GET['tt'])){
                            $tt=$_GET['tt'];
                            if ($tt == 'xn'){
                                echo '<li><a href="donhang.php">&ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Chưa xác nhận</a></li>
                                    <li><a href="donhang.php?tt=xn"><b><span style="color: red;">Đã xác nhận</b></a></li>
                                    <li><a href="donhang.php?tt=ht">Hoàn tất</a></li>
                                    <li><a href="donhang.php?tt=huy">Hủy</a></li></span>';
                            }else if ($tt == 'ht'){
                                echo '<li><a href="donhang.php">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;Chưa xác nhận</a></li>
                                    <li><a href="donhang.php?tt=xn">Đã xác nhận</a></li>
                                    <li><a href="donhang.php?tt=ht"><b><span style="color: red;">Hoàn tất</span></b></a></li>
                                    <li><a href="donhang.php?tt=huy">Hủy</a></li>';
                            }else{
                                echo '<li><a href="donhang.php">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;Chưa xác nhận</a></li>
                                    <li><a href="donhang.php?tt=xn">Đã xác nhận</a></li>
                                    <li><a href="donhang.php?tt=ht">Hoàn tất</a></li>
                                    <li><a href="donhang.php?tt=huy"><b><span style="color: red;">Hủy</span></b></a></li>';
                            }
                            
                        }else{
                            echo '<li><a href="donhang.php"><b><span style="color: red;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&emsp;&emsp;Chưa xác nhận</span></b></a></li>
                                <li><a href="donhang.php?tt=xn">Đã xác nhận</a></li>
                                <li><a href="donhang.php?tt=ht">Hoàn tất</a></li>
                                <li><a href="donhang.php?tt=huy">Hủy</a></li>' ;
                        }
                      ?>
                  
                    
                  </ul>
                </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    
            <div id="tttk">
            
                <?php
                $tk=$_SESSION['tk'];
                $i=0;
                echo "<table >";
                if(isset($_GET['tt'])){
                            $tt=$_GET['tt'];
                            if ($tt == 'xn'){
                                $lenh = "select * from donhang where tkkh='$tk' AND tinhtrang ='daxacnhan'";
                                $kq = mysqli_query($conn, $lenh);
                                if(mysqli_num_rows($kq) > 0){
                                    
                                    echo "<tr>";
                                        echo "<td class=\"gioten\">Đơn hàng  </td>";
                                        echo "<td class=\"giosl\" >Ngày khởi tạo</td>";
                                        echo "<td class=\"gioxoa\">Địa chỉ nhận hàng</td>";
                                        echo "</tr>";
                
                                    while ($row = mysqli_fetch_assoc($kq)){
                                        $i++;
                                         echo "<tr>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
   
                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td class=\"gioten\">";
                                        echo("<a href=\"chitietdonhang.php?iddh=".$row['masodh'] ."\" target=\"\"> " .$row['masodh'] ."</a>" );
                                        echo "</td>";
                                        
                                        echo "<td class=\"giosl\">";
                                        echo "" .$row['ngaydathang'];
                                        echo "</td>";
                                        echo "<td class=\"gioxoa\">";
                                        echo "" .$row['diachinhanhang'];
                                        echo "</td>";

                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";

                                        echo "</tr>";
                
                                    }
                                    echo "</table>";
                                    echo "</div>
                    
                    <br>
                                
                    </div>";
                                    for ($j=0;$j <= $i;$j++){
                                        echo "<br>";
                                        echo "<br>";
                                        echo "<br>";
                                        echo "<br>";
                                        echo "<br>";
                                        

                                    }
                                }
                            }else if ($tt == 'ht'){
                                $lenh = "select * from donhang where tkkh='$tk' AND tinhtrang ='hoantat'";
                                $kq = mysqli_query($conn, $lenh);
                                if(mysqli_num_rows($kq) > 0){
                                    
                                    echo "<tr>";
                                        echo "<td class=\"gioten\">Đơn hàng  </td>";
                                        echo "<td class=\"giosl\" >Ngày khởi tạo</td>";
                                        echo "<td class=\"gioxoa\">Địa chỉ nhận hàng</td>";
                                        echo "</tr>";
                
                                    while ($row = mysqli_fetch_assoc($kq)){
                                        $i++;
                                         echo "<tr>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
   
                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td class=\"gioten\">";
                                        echo("<a href=\"chitietdonhang.php?iddh=".$row['masodh'] ."\" target=\"\"> " .$row['masodh'] ."</a>" );
                                        echo "</td>";
                                        
                                        echo "<td class=\"giosl\">";
                                        echo "" .$row['ngaydathang'];
                                        echo "</td>";
                                        echo "<td class=\"gioxoa\">";
                                        echo "" .$row['diachinhanhang'];
                                        echo "</td>";

                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";

                                        echo "</tr>";
                
                                    }
                                    echo "</table>";
                                    echo "</div>
                    
                    <br>
                                
                    </div>";
                                    for ($j=0;$j <= $i;$j++){
                                        echo "<br>";
                                        echo "<br>";
                                        echo "<br>";
                                        echo "<br>";
                                        echo "<br>";
                                        

                                    }
                                }
                                 }else{$lenh = "select * from donhang where tkkh='$tk' AND tinhtrang ='huy'";
                                $kq = mysqli_query($conn, $lenh);
                                if(mysqli_num_rows($kq) > 0){
                                    $i++;
                                    echo "<tr>";
                                        echo "<td class=\"gioten\">Đơn hàng  </td>";
                                        echo "<td class=\"giosl\" >Ngày khởi tạo</td>";
                                        echo "<td class=\"gioxoa\">Địa chỉ nhận hàng</td>";
                                        echo "</tr>";
                
                                    while ($row = mysqli_fetch_assoc($kq)){
                                        $i++;
                                         echo "<tr>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
   
                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td class=\"gioten\">";
                                        echo("<a href=\"chitietdonhang.php?iddh=".$row['masodh'] ."\" target=\"\"> " .$row['masodh'] ."</a>" );
                                        echo "</td>";
                                        
                                        echo "<td class=\"giosl\">";
                                        echo "" .$row['ngaydathang'];
                                        echo "</td>";
                                        echo "<td class=\"gioxoa\">";
                                        echo "" .$row['diachinhanhang'];
                                        echo "</td>";

                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";

                                        echo "</tr>";
                
                                    }
                                    echo "</table>";
                                    echo "</div>
                    
                    <br>
                                
                    </div>";
                                     echo "<br>";
                                    for ($j=0;$j <= $i;$j++){
                                        echo "<br>";
                                        echo "<br>";
                                        echo "<br>";
                                       
                                        

                                    }
                                }
                                      }
                                
                            
                        }else{
                            $lenh = "select * from donhang where tkkh='$tk' AND tinhtrang ='chuaxacnhan'";
                                $kq = mysqli_query($conn, $lenh);
                                if(mysqli_num_rows($kq) > 0){
                                    echo "<tr>";
                                        echo "<td class=\"gioten\">Đơn hàng  </td>";
                                        echo "<td class=\"giosl\" >Ngày khởi tạo</td>";
                                        
                                        echo "<td class=\"gioxoa\">Địa chỉ nhận hàng</td>";
                                    echo "<td><br></td>";
                                        echo "</tr>";
                
                                    while ($row = mysqli_fetch_assoc($kq)){
                                        $i++;
                                         echo "<tr>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td class=\"gioten\">";
                                        echo("<a href=\"chitietdonhang.php?iddh=".$row['masodh'] ."\" target=\"\"> " .$row['masodh'] ."</a>" );
                                        echo "</td>";
                                        
                                        echo "<td class=\"giosl\">";
                                        echo "" .$row['ngaydathang'];
                                        echo "</td>";
                                        echo "<td class=\"gioten\">";
                                        echo "" .$row['diachinhanhang'];
                                        echo "</td>";
                                        echo "<td class=\"gioxoa\">";
                                        echo("<a href=\"huy.php?id=".$row['masodh'] ."\" target=\"\"> " ."Hủy" ."</a>" );
                                        echo "</td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";

                                        echo "</tr>";
                                        
                
                                    }
                                    echo "</table>";
                                    echo "</div>
                    
                    <br>
                                
                    </div>";
                                    for ($j=0;$j <= $i;$j++){
                                        echo "<br>";
                                        
                                        

                                    }
                                    
                                }
                        }
                
                
                
                ?>
              
            
            
                           
                              
                               
                                </div>
                            
                    </div>
                        

                <br>
                <br><br><br>
            </div>
        </div>
    </div>
    <?php
            include '../footer.php';
        ?>
    </body>
</html>