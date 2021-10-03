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
                <li><a href="nhanvien.php"><span style= "font-size: 22px">Thông tin nhân viên</span></a></li>
                <li><a href="qlsanphamnoibatnv.php"><span style= "font-size: 22px">Sản phẩm nổi bật</span></a></li>
                <li><a href="sanphamnv.php"><span style= "font-size: 22px">Sản phẩm</span></a></li>
                <li><a href="themsanphamnv.php"><span style= "font-size: 22px">Thêm sản phẩm</span></a></li>
                <li><a href="themnhomnv.php"><span style= "font-size: 22px">Thêm nhóm sản phẩm</span></a></li>
                <li><a href="qldonhangnv.php"><span style="color: red"><span style= "font-size: 22px">Quản lý đơn hàng</span></span></a></li>
            </ul>
</div></div>

        <div id="noidung">
            <br>
        <h2><font color="#000080"><span style="font-size: 26px">QUẢN LÝ ĐƠN HÀNG</span></font></h2>
        <br>
                <div id="chucnang2"> 
                                        <ul>
                                   <?php
                        if(isset($_GET['tt'])){
                            $tt=$_GET['tt'];
                            if ($tt == 'xn'){
                                echo '<li><a href="qldonhang.php">&ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Chưa xác nhận</a></li>
                    <li><a href="qldonhang.php?tt=xn"><b><span style="color: red;">Đã xác nhận</span></b></a></li>
                    <li><a href="qldonhang.php?tt=ht">Hoàn tất</a></li>
                    <li><a href="qldonhang.php?tt=huy">Hủy</a></li>';
                            }else if ($tt == 'ht'){
                                echo '<li><a href="qldonhang.php">&ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Chưa xác nhận</a></li>
                    <li><a href="qldonhang.php?tt=xn">Đã xác nhận</a></li>
                    <li><a href="qldonhang.php?tt=ht"><b><span style="color: red;">Hoàn tất</span></b></a></li>
                    <li><a href="qldonhang.php?tt=huy">Hủy</a></li>';
                            }else{
                                echo '<li><a href="qldonhang.php">&ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Chưa xác nhận</a></li>
                    <li><a href="qldonhang.php?tt=xn">Đã xác nhận</a></li>
                    <li><a href="qldonhang.php?tt=ht">Hoàn tất</a></li>
                    <li><a href="qldonhang.php?tt=huy"><b><span style="color: red;">Hủy</span></b></a></li>';
                            }
                            
                        }else{
                            echo '<li><a href="qldonhang.php"><b><span style="color: red;">&ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Chưa xác nhận</span></b></a></li>
                    <li><a href="qldonhang.php?tt=xn">Đã xác nhận</a></li>
                    <li><a href="qldonhang.php?tt=ht">Hoàn tất</a></li>
                    <li><a href="qldonhang.php?tt=huy">Hủy</a></li>' ;
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
                $i=0;
                echo "<table >";
                if(isset($_GET['tt'])){
                            $tt=$_GET['tt'];
                            if ($tt == 'xn'){
                                $lenh = "select * from donhang where  tinhtrang ='daxacnhan'";
                                $kq = mysqli_query($conn, $lenh);
                                if(mysqli_num_rows($kq) > 0){
                                    
                                    echo "<tr>";
                                        echo "<td class=\"gioten\">Đơn hàng</td>";
                                        echo "<td class=\"giosl\" >Ngày khởi tạo</td>";
                                        echo "<td class=\"gioxoa\">Địa chỉ nhận hàng</td>";
                                        echo "<td class=\"tuychon\">&emsp; Tùy chọn</td>";
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
                                        echo("<a href=\"qlchitietdonhang.php?iddh=".$row['masodh'] ."\" target=\"\"> " .$row['masodh'] ."</a>" );
                                        echo "</td>";
                                        
                                        echo "<td class=\"giosl\">";
                                        echo "" .$row['ngaydathang'];
                                        echo "</td>";
                                        echo "<td class=\"giosl\">";
                                        echo "" .$row['diachinhanhang'];
                                        echo "</td>";
                                        echo "<td class=\"gioxoa\">";
                                        echo("<a href=\"qlht.php?id=".$row['masodh'] ."\" target=\"\"> " ."Hoàn tất" ."</a>" );
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
                                        echo "<br>";
                                        echo "<br>";
                                        echo "<br>";
                                        echo "<br>";
                                        

                                    }
                                }
                            }else if ($tt == 'ht'){
                                $lenh = "select * from donhang where tinhtrang ='hoantat'";
                                $kq = mysqli_query($conn, $lenh);
                                if(mysqli_num_rows($kq) > 0){
                                    
                                    echo "<tr>";
                                        echo "<td class=\"gioten\">Đơn hàng</td>";
                                        echo "<td class=\"giosl\" >Ngày khởi tạo</td>";
                                        echo "<td class=\"gioxoa\">Địa chỉ nhận hàng</td>";
                                        echo "<td class=\"tuychon\">&emsp;&emsp;&emsp;&emsp;Tùy chọn</td>";
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
                                        echo("<a href=\"qlchitietdonhang.php?iddh=".$row['masodh'] ."\" target=\"\"> " .$row['masodh'] ."</a>" );
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
                                 }else{$lenh = "select * from donhang where  tinhtrang ='huy'";
                                $kq = mysqli_query($conn, $lenh);
                                if(mysqli_num_rows($kq) > 0){
                                    $i++;
                                    echo "<tr>";
                                        echo "<td class=\"gioten\">Đơn hàng</td>";
                                        echo "<td class=\"giosl\" >Ngày khởi tạo</td>";
                                        echo "<td class=\"gioxoa\">Địa chỉ nhận hàng</td>";
                                        echo "<td class=\"tuychon\">&emsp;&emsp;&emsp;&emsp;Tùy chọn</td>";
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
                                        echo("<a href=\"qlchitietdonhang.php?iddh=".$row['masodh'] ."\" target=\"\"> " .$row['masodh'] ."</a>" );
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
                            $lenh = "select * from donhang where  tinhtrang ='chuaxacnhan'";
                                $kq = mysqli_query($conn, $lenh);
                                if(mysqli_num_rows($kq) > 0){
                                    echo "<tr>";
                                        echo "<td class=\"gioten\">Đơn hàng</td>";
                                        echo "<td class=\"giosl\" >Ngày khởi tạo</td>";
                                        echo "<td class=\"gioxoa\">Địa chỉ nhận hàng</td>";
                                        echo "<td class=\"tuychon\">&emsp;&emsp;&emsp;&emsp;Tùy chọn</td>";
                                        echo "<td><br></td>";
                                        echo "</tr>";
                
                                    while ($row = mysqli_fetch_assoc($kq)){
                                        $i++;
                                         echo "<tr>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "<td><br></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td class=\"gioten\">";
                                        echo("<a href=\"qlchitietdonhang.php?iddh=".$row['masodh'] ."\" target=\"\"> " .$row['masodh'] ."</a>" );
                                        echo "</td>";
                                        
                                        echo "<td class=\"giosl\">";
                                        echo "" .$row['ngaydathang'];
                                        echo "</td>";
                                        echo "<td class=\"gioten\">";
                                        echo "" .$row['diachinhanhang'];
                                        echo "</td>";
                                          echo "<td class=\"giosl\">";
                                        echo("<a href=\"qlxacnhan.php?id=".$row['masodh'] ."\" target=\"\"> " ."Xác nhận" ."</a>" );
                                        echo "</td>";
                                        echo "<td class=\"gioxoa\">";
                                        echo("<a href=\"qlhuy.php?id=".$row['masodh'] ."\" target=\"\"> " ."Hủy" ."</a>" );
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
                                        echo "<br>";
                                        echo "<br>";
                                        echo "<br>";
                                        

                                    }
                                    
                                }
                        }
                
                
                
                ?>
                                </div>
        </div>
        </div>
    </body>
</html>