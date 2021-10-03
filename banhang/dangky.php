
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Bắp Consmetics</title>
        <link rel="stylesheet" href="index.css">
        <style type="text/css">
            table{
                border:2px 
                height: 230px;
                width: 360px;
                margin-left: auto; 
                margin-right: auto;
                font-size: 20px; 
            }
        </style>
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
                

                
                
                </div>
                       <br>
                <br>
                <br>
                     <div align="center" id="slogan">
                    <img src="bg/oke.png" width="1170px" height="400px">
                 </div>
             
                <div id="noidung">    
                    <div id="dangki">      
                        <h2 align="center"><font color="#FF3333">ĐĂNG KÝ TÀI KHOẢN</font></h2>
                                <div id="dk">
                                   <form method="post">
            <table>
                <tr>
                    <td >Tên đăng nhập:</td>
                    <td><input id="khung" type="text"  name="Taikhoan"/></td>
                </tr>
                <tr><td>Mật khẩu:</td>
                    <td><input id="khung" type="password" name="Matkhau"/></td>
                </tr>
                <tr>
                    <td>Họ và tên:</td>
                    <td><input id="khung" type="text" name="Hoten"/></td>                 
                </tr>
                <tr>
                     <td>Giới tính:</td>
                    <td><select name="gt">
                        <option value="nu">Nữ</option>
                        <option value="nam">Nam</option>
                        </select><br></td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td><input id="khung" type="text" name="Diachi"/></td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td><input id="khung" type="number" name="Sdt" /></td>
                </tr>
                <tr>
                    <td>CMND:</td>
                    <td><input id="khung" type="number" name="cmnd" /></td>
                </tr>
                <tr>
                    <td><br></td>
               </tr>
               <tr>
                    <td colspan="2">
                        <input id="nutdk" type="submit" value="Đăng Ký" name="Dangki"/>
                    </td>
                </tr>
            </table>
            
            <?php 
                if (isset($_POST['Dangki'])) {
                    //lấy thông tin từ các form bằng phương thức POST
                    $tk = $_POST['Taikhoan'];
                    $mk = md5($_POST['Matkhau']);
                    $hotenKH = $_POST['Hoten'];
                    $gt = $_POST['gt'];
                    $diachi = $_POST['Diachi'];
                    $sdt = $_POST['Sdt'];
                    $cmnd = $_POST['cmnd'];
                    //Kiểm tra điều kiện bắt buộc không được bỏ trống
                    if ($tk == "" || $mk == ""  || $hotenKH == "" || $gt == "" || $diachi == "" || $sdt == ""|| $cmnd == "") {
                           echo "Vui lòng nhập đầy đủ thông tin!";
                    }else{
                            // Kiểm tra tài khoản đã tồn tại chưa
                            $sql="select * from khachhang where tkKH='$tk'";
                            $kt=mysqli_query($conn, $sql);

                            if(mysqli_num_rows($kt)  > 0){
                                echo "Tài khoản đã tồn tại!";
                            }else{
                                //thực hiện việc lưu trữ dữ liệu vào db
                                $sql = "INSERT INTO khachhang VALUES (
                                    '$tk',
                                    '$mk',
                                    '$hotenKH',
                                    '$gt',
                                    '$diachi',
                                    '$sdt',
                                    '$cmnd'
                                    )";
                                mysqli_query($conn,$sql);
                                echo '<META http-equiv="refresh" content="0;URL=./dangnhap.php' .'">';
                            }
                      }
                }
              ?>
        </form>
                                </div>
                                </div>
                            
                    </div>
                        
                    
                    
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />

                
                
            </div>
            <?php
            include 'footer.php';
        ?>
    </body>
</html>