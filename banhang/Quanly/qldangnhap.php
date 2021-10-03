<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Bắp Consmetics</title>
        <link rel="stylesheet" href="qlnv.css">
        <style type="text/css">
            table{
                border:2px;
                height: 150px;
                width: 403px;
                margin-left: auto; 
                margin-right: auto;
                font-size: 20px; 
                
            }
        </style>
    </head>
    <body >
        <div id="toancuc">
        <?php
            include '../ketnoi.php';
        ?>
        <div align="center" id="slogan">
                    <img src="../bg/oke.png" width="1170px" height="300px">
                 </div>
        
        <div id="dangki">
                <h2 align="center"><b><font color="#000080"><span style="font-size: 27px">ĐĂNG NHẬP</span></font></b></h2>
                               <div id="dk">
                                   <form method="POST" action="qldangnhap.php">
	    	<table>
                <tr>
                    <td><span style="font-size: 21px">Tên đăng nhập</span></td>
                    <td><input id="khung" type="text" name="tk">
                </tr>
                <tr><td><span style="font-size: 21px">Mật khẩu</span></td>
                    <td><input id="khung" type="password" name="mk">
                </tr>
                <tr>
	    			<td colspan="2" align="center"> <input id="nutdn" type="submit" name="dangnhap" value="Đăng nhập"></td>
	    		</tr>
	    	</table>
  </form>
    <?php
	
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST['dangnhap'])) {
		// lấy thông tin người dùng
		$tk = $_POST['tk'];
		$mk = $_POST['mk'];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$tk = strip_tags($tk);
		$tk = addslashes($mk);
		$mk = strip_tags($mk);
		$mk = addslashes($mk);
        $mk=md5($mk);
        error_reporting(0); //tat thong bao loi
		if ($tk == "" || $mk =="") {
			print "<p align='center'><font color='red'>Tài khoản hoặc mật khẩu không được để trống!</font></p>";
		}else{
			$sql = "select * from nhavien where tknv = '$tk' and mknv = '$mk' ";
			$query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				print "<p align='center'><font color='red'>Tài khoản hoặc mật khẩu không đúng! Vui lòng kiểm tra và đăng nhập lại!</font></p>";
			}else{
				//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
				$_SESSION['tk'] = $tk;
                // Thực thi hành động sau khi lưu thông tin vào session
                if($tk == 'admin'){
                    header('Location: quanlynhanvien.php');
                }else{header('Location: nhanvien.php');}
			}
		}
	}
    ?>
                                </div>
                                </div>
        </div>
    </body>
</html>