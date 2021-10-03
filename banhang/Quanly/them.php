<?php session_start(); 
if (!isset($_SESSION['tk'])) {
	 header('Location: qldangnhap.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Bắp Consmetics</title>
        <link rel="stylesheet" href="qlnv.css">
        <style type="text/css">
            table{
                border-collapse: collapse;
                margin-left: 370px;
            }
            table tr td{
                font-size: 20px;
            }
            caption{
                color: #000080;
                font-size: 23px;
            }
            #themmoi{
                margin-left:97px;
                color:#FF3300 ;       
                font-size: 20px;
                width: 90px;
                height: 33px;
                background-color:#FFFFE0;  
                border: 1px solid #EE7600;
            }
        </style>
    </head>
    <body >
        <div id="toancuc">
        <?php
            include '../ketnoi.php';
        ?>
        <div id="login">
                        <ul>
                            <?php 
                               if(isset($_SESSION['tk'])){
                                   
                                   echo "<li><a href=\"qllogout.php\">Logout</a>";
                                   echo "<li>" .$_SESSION['tk'] ."</li>";
                               }
                               
                               ?>
                            
                            
                            
                        </ul>
                    </div>
                    <br><br>
        <div id="mucluc">
                        <div id="tieudemucluc">
                <h3><span style="font-size: 26px">Menu</span></h3>
            </div>
         <div id="giua">
            <ul>
                <li><a href="qlsanphamnoibat.php"><span style= "font-size: 22px">Sản phẩm nổi bật</span></a></li>
                <li><a href="sanpham.php"><span style= "font-size: 22px">Sản phẩm</span></a></li>
                <li><a href="themsanpham.php"><span style="color: red"><span style= "font-size: 22px">Thêm sản phẩm</span></span></a></li>
                <li><a href="themnhom.php"><span style= "font-size: 22px">Thêm nhóm sản phẩm</span></a></li>
                <li><a href="qldonhang.php"><span style= "font-size: 22px">Quản lý đơn hàng</span></a></li>
            </ul>
</div></div>

        <div id="noidung">
            
        <br>
        <h2><font color="#000080"><span style="font-size: 26px">THÊM SẢN PHẨM</span></font></h2>
        <br>
            <div id="nd2"><form action="" method="post" enctype="multipart/form-data">
            <table>
                
                <tr>
                    <td>Mã loại:</td>
                    <td>&emsp;<input type="text" name="maloai" value="<?php
                        if(isset($_GET['add'])){
                            $ml= $_GET['ml'];
                            echo $ml;
                        }
                        
            ?>"></td>
                </tr>
                <tr>
                    <td>Mã nhóm:</td>
                    <td>&emsp;<select name="mn">
                        <?php
                            if($ml=="dt"){
                                $lenh = "SELECT manhom,tennhomdt FROM  nhomthuonghieu ";
                                $kq = mysqli_query($conn, $lenh);
                                if(mysqli_num_rows($kq) > 0){
                                    while ($row = mysqli_fetch_assoc($kq)){
                                        echo "<option value= \" " .$row['manhom'] ."\"> " .$row['tennhomdt'] ." </option> "  ;

                                    }
                                }
                            }else if($ml=="pk"){
                                $lenh = "SELECT manhom,tennhompk FROM  nhomtrangdiem ";
                                $kq = mysqli_query($conn, $lenh);
                                if(mysqli_num_rows($kq) > 0){
                                    while ($row = mysqli_fetch_assoc($kq)){
                                        echo "<option value= \"" .$row['manhom']. "\">" .$row['tennhompk'] ."</option>"  ;

                                    }
                                }
                            }
                        else if($ml=="cs"){
                                $lenh = "SELECT manhom,tennhomcs FROM  nhomchamsoc ";
                                $kq = mysqli_query($conn, $lenh);
                                if(mysqli_num_rows($kq) > 0){
                                    while ($row = mysqli_fetch_assoc($kq)){
                                        echo "<option value= \"" .$row['manhom']. "\">" .$row['tennhomcs'] ."</option>"  ;

                                    }
                                }
                            }
        ?>
                        
                        </select><br /></td>
                </tr>
                <tr>
                    <td>Tên hàng:</td>
                    <td>&emsp;<input type="text" name="th" value=""></td>
                </tr>
                <tr>
                    <td>Giá tiền:</td>
                    <td>&emsp;<input  type="number" name="gia" value=""></td>
                </tr>
                <tr>
                    <td>Ảnh sản phẩm:</td>
                    <td>&emsp;<input type="file" name="image" /></td>
                </tr>
                <tr>
                    <td>Mô tả:</td>
                    <td>&emsp;<input id="lon" type="text" name="mt" value=""></td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input id="themmoi" type="submit" value="Thêm mới" name="insert" />
                    </td>
                </tr>
            </table>
            </form>
    
        
        <?php
            if(isset($_POST['insert'])){
                $maloai= $_POST['maloai'];
                $mn= $_POST['mn'];
                $th= $_POST['th'];
                $gia= $_POST['gia'];
                $mt= $_POST['mt'];
                $file_name = $_FILES['image']['name'];
                $file_size =$_FILES['image']['size'];
                $file_tmp =$_FILES['image']['tmp_name'];
                $file_type=$_FILES['image']['type'];
                $temp =explode('.',$_FILES['image']['name']);
                $file_explode=end($temp);
                $file_ext=strtolower($file_explode);
 
                $expensions= array("jpeg","jpg","png");
                if(in_array($file_ext,$expensions)=== false){
                 echo "Không chấp nhận định dạng ảnh loại này, mời bạn chọn: JPEG, JPG hoặc PNG.";
              }

              else if($file_size > 2097152){
                 $errors[]='Kích cỡ file p <  2 MB';
              }

              else{
                 move_uploaded_file($file_tmp,'../hinh/'.$file_name);
                 $lenh = "INSERT INTO hanghoa VALUES ('','$maloai','$mn','$th','$gia','$file_name','$mt')";
                 mysqli_query($conn, $lenh) or die ("Thêm dữ liệu thất bại!");
                
            }
            }
        ?>
         </div>   
            
        </div>
        </div>
    </body>
</html>