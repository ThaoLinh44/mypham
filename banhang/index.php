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
        <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <!-- //web fonts -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
     

<!-- top-header -->
    <div class="agile-main-top">
        <div class="container-fluid">
            <div class="row main-top-w3l py-2">
                <div class="col-lg-4 header-most-top">
                    
                </div>
                <div class="col-lg-8 header-right mt-lg-0 mt-2">
                    <!-- header lists -->
                    <ul>

                                                <li class="text-center border-right text-white">
                            <i class="fas fa-phone mr-2"></i> 0909999999
                        </li>
                        <li class="text-center border-right text-white">
                            <a href="#" data-toggle="modal" data-target="#dangnhap" class="text-white">
                                <i class="fas fa-sign-in-alt mr-2"></i> Đăng nhập </a>
                        </li>
                        <li class="text-center text-white">
                            <a href="#" data-toggle="modal" data-target="#dangky" class="text-white">
                                <i class="fas fa-sign-out-alt mr-2"></i>Đăng ký </a>
                        </li>
                    </ul>
                    <!-- //header lists -->
                </div>
            </div>
        </div>
    </div>
    <!-- modals -->
    <!-- log in -->
    <div class="modal fade" id="dangnhap" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center">Đăng nhập</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="text" class="form-control" placeholder=" " name="email_login" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Mật khẩu</label>
                            <input type="password" class="form-control" placeholder=" " name="password_login" required="">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" name="dangnhap_home" value="Đăng nhập">
                        </div>
                        
                        <p class="text-center dont-do mt-3">Chưa có tài khoản?
                            <a href="#" data-toggle="modal" data-target="#dangky">
                                Đăng ký</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- register -->
    <div class="modal fade" id="dangky" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Đăng ký</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label class="col-form-label">Tên khách hàng</label>
                            <input type="text" class="form-control" placeholder=" " name="name" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="email" class="form-control" placeholder=" " name="email" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Phone</label>
                            <input type="text" class="form-control" placeholder=" " name="phone"  required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Address</label>
                            <input type="text" class="form-control" placeholder=" " name="address"  required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Password</label>
                            <input type="password" class="form-control" placeholder=" " name="password"  required="">
                            <input type="hidden" class="form-control" placeholder="" name="giaohang"  value="0">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Ghi chú</label>
                            <textarea class="form-control" name="note"></textarea>
                        </div>
                        
                        <div class="right-w3l">
                            <input type="submit" class="form-control" name="dangky" value="Đăng ký">
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div id="toancuc">             
                <div id="menu">
                  <ul>
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
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
                            
                            <div id="gioh"><a href="giohang.php"><img src="bg/favorite-cart.png" width="50px" height="40px" ></a></div>
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
                            
                            <br><br>
                            <div id="pk" >
                                <h2 align="center">TRANG ĐIỂM</h2>
                                <ul>
                                    <?php
                                    $lenh = "SELECT manhom,tennhompk FROM  nhomtrangdiem ";
                                    $kq = mysqli_query($conn, $lenh);
                                    if(mysqli_num_rows($kq) > 0){

                                        while ($row = mysqli_fetch_assoc($kq)){
                                            echo "<li><a href=\"trangdiem.php?id=" .$row['manhom'] ."\">" .$row['tennhompk'] ."</a></li>";
                                        }
                                    }
                                ?>
                                </ul>

                            </div>
                            <div id="cs" >
                            <h2 align="center">CHĂM SÓC CÁ NHÂN</h2>
                            <ul>
                                <?php
                                $lenh = "SELECT manhom,tennhomcs FROM  nhomchamsoc ";
                                $kq = mysqli_query($conn, $lenh);
                                if(mysqli_num_rows($kq) > 0){

                                    while ($row = mysqli_fetch_assoc($kq)){
                                        echo "<li><a href=\"chamsoc.php?id=" .$row['manhom'] ."\">" .$row['tennhomcs'] ."</a></li>";
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
                        <div id="showContainer"></div>
                        <div id="noibac">
                            
                            <h3>SẢN PHẨM BÁN CHẠY</h3>
                            <br>
                             <?php
                            include 'noibac.php';
                        ?>
                            
                            </div>
                           
                            <br>
                        <div id="sanphammoi">
                            
                            <h3>SẢN PHẨM MỚI</h3>
                            <br>&emsp;&emsp;
                            <?php
                            $lenh2 = "SELECT mahang,tenhang,gia,hinh FROM  hanghoa ";
                            $kq2 = mysqli_query($conn, $lenh2);
                            if(mysqli_num_rows($kq2) > 0){
                                $i=0;
                                $MSHH=[];
                                $ten=[];
                                $gia=[];
                                $hinh=[];
                                
                                while ($row2 = mysqli_fetch_assoc($kq2)){
                                    $i++;
                                    $MSHH[$i-1]=$row2['mahang'];
                                    $ten[$i-1]=$row2['tenhang'];
                                    $gia[$i-1]=$row2['gia'];
                                    $hinh[$i-1]=$row2['hinh'];
                                }
                            }
                            for($j=$i;$j>$i-16;$j--){
                                echo "<div class=\"sp\">";
                                echo("<a href=\"sanpham.php?id=".$MSHH[$j-1] ."\" target=\"\"><img src=\"hinh/" .$hinh[$j-1] ."\" width=\"100%\" height=\"280px\"
></a>" ); 
                                echo"<br>";
                                echo"<br>";

                                echo("<a href=\"sanpham.php?id=".$MSHH[$j-1] ."\" target=\"\"> " .$ten[$j-1] ."</a>" );
                                echo"<br>";
                                echo"<br>";
                                echo("<p align=\"center\">" .$gia[$j-1] ."VNĐ" ."</p>");
                                echo "</div>";
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