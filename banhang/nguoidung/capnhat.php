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
        <link rel="stylesheet" href="../index.css">
        <style type="text/css">
            hr{
                width: 38%;
                background-color: red;
            }
            input{
                width: 170px;
                height: 31px;
                background-color: #F5FFFA;;
                color: #191970;
            }
            select{
                width: 170px;
                height: 31px;
                background-color: #F5FFFA;
                color: #191970;
                border: 2px solid #191970;
            }
            option{
                color: red;
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
                    <li><a href="Capnhat.php"><span style="color: red;"><span style= "font-size: 21px">Cập nhật thông tin</span></span></a></li>
                    <li><a href="doimk.php"><span style= "font-size: 21px">Đổi mật khẩu</span></a></li>
                    <li><a href="donhang.php"><span style= "font-size: 21px">Đơn hàng</span></a></li>
                  </ul>
                </div>
                                <div id="thongtintk"> 
                                <h3 align="center"><b><font color="#000080"><span style="font-size: 21px">CẬP NHẬT THÔNG TIN KHÁCH HÀNG</span></font></b></h3>
                                <hr>
                                <br>
                                <form  method="post">
            <div id="tttk">
            <table >
                <?php
                $tk=$_SESSION['tk'];
                $lenh = "select * from khachhang where tkkh='$tk' ";
                                $kq = mysqli_query($conn, $lenh);
                                if(mysqli_num_rows($kq) > 0){

                                    while ($row = mysqli_fetch_assoc($kq)){
                                        echo '<tr>
                    <td>Họ và tên:</td>
                    <td>&emsp;<input type="text" name="Hoten" value="' .$row['hotenkh'] .'"/>                 
                </tr>';
                echo '<tr>
                     <td>Giới tính:</td>
                    <td>&emsp;<select name="gt" value="' .$row['gioitinhkh'] .'">
                        <option value="nu">Nữ</option>
                        <option value="nam">Nam</option>
                        </select><br></td>
                </tr>'; 
                echo '<tr>
                    <td>Địa chỉ:</td>
                    <td>&emsp;<input type="text" name="Diachi" value="' .$row['diachikh'] .'"/>
                </tr>';
                echo '<tr>
                    <td>Số điện thoại:</td>  
                    <td>&emsp;<input type="number" name="Sdt" value="0' .$row['sdtkh'] .'"/>
                </tr>';
                echo '<tr>
                    <td>Số CMND:</td>
                    <td>&emsp;<input type="number" name="cmnd" value="' .$row['cmndkh'] .'" />
                </tr>';
                echo '<tr>
                    <td colspan="2">
                        <input id="capnhat"  type="submit" value="Cập nhật" name="capnhat"/>
                    </td>
                </tr>';
                                    }
                                }
                
                
                ?>
              
            </table>
            </div>
            <?php 
                if (isset($_POST['capnhat'])) {
                    $tk=$_SESSION['tk'];
                    $hotenKH = $_POST['Hoten'];
                    $gt = $_POST['gt'];
                    $diachi = $_POST['Diachi'];
                    $sdt = $_POST['Sdt'];
                    $cmnd = $_POST['cmnd'];
                    $lenh2 = "UPDATE khachhang SET hotenkh = '$hotenKH', gioitinhkh = '$gt', diachikh='$diachi', sdtkh='$sdt', cmndkh='$cmnd'  WHERE tkkh = '$tk' ";
                    mysqli_query($conn, $lenh2) or die ("Thêm dữ liệu thất bại!");
                    echo '<META http-equiv="refresh" content="0;URL=./tk.php' .'">';
                    
                }
              ?>
        </form>        
                    <br>
                                
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