<div id="showContainer">
                            <div class="navButton" id="previous">&#10094;</div>

                            <div class="imageContainer" id="im_1">
                            <?php
                            $lenh = "SELECT noibac.mahang,hanghoa.tenhang,hanghoa.gia,hanghoa.hinh FROM noibac,hanghoa WHERE (noibac.thutu BETWEEN 1 AND 4) AND noibac.mahang = hanghoa.mahang  ";
                            $kq = mysqli_query($conn, $lenh);
                            if(mysqli_num_rows($kq) > 0){
                                
                                
                                while ($row = mysqli_fetch_assoc($kq)){
                                    
                                    echo "<div class=\"spnb\">";
                                    echo("<a href=\"sanpham.php?id=".$row['mahang'] ."\" target=\"\"><img src=\"hinh/" .$row['hinh'] ."\" width=\"100%\" height=\"250px\"
    ></a>" ); 
                                    echo"<br>";
                                    echo"<br>";

                                    echo("<a href=\"sanpham.php?id=".$row['mahang'] ."\" target=\"\"> " .$row['tenhang'] ."</a>" );
                                    echo"<br>";
                                    echo"<br>";
                                    echo("<p align=\"center\">" .$row['gia'] ."đ" ."</p>");
                                    echo "</div>";
                                    
                                }
                            }
                            
                        ?>
                            
                            </div>

                            <div class="imageContainer" id="im_2">
                            <?php
                            $lenh = "SELECT noibac.mahang,hanghoa.tenhang,hanghoa.gia,hanghoa.hinh FROM noibac,hanghoa WHERE (noibac.thutu BETWEEN 5 AND 8) AND noibac.mahang = hanghoa.mahang  ";
                            $kq = mysqli_query($conn, $lenh);
                            if(mysqli_num_rows($kq) > 0){
                                
                                
                                while ($row = mysqli_fetch_assoc($kq)){
                                    
                                    echo "<div class=\"spnb\">";
                                    echo("<a href=\"sanpham.php?id=".$row['mahang'] ."\" target=\"\"><img src=\"hinh/" .$row['hinh'] ."\" width=\"100%\" height=\"250px\"
    ></a>" ); 
                                    echo"<br>";
                                    echo"<br>";

                                    echo("<a href=\"sanpham.php?id=".$row['mahang'] ."\" target=\"\"> " .$row['tenhang'] ."</a>" );
                                    echo"<br>";
                                    echo"<br>";
                                    echo("<p align=\"center\">" .$row['gia'] ."đ" ."</p>");
                                    echo "</div>";
                                    
                                }
                            }
                            
                        ?>
                            
                            </div>

                            <div class="imageContainer" id="im_3">
                           <?php
                            $lenh = "SELECT noibac.mahang,hanghoa.tenhang,hanghoa.gia,hanghoa.hinh FROM noibac,hanghoa WHERE (noibac.thutu BETWEEN 9 AND 12) AND noibac.mahang = hanghoa.mahang  ";
                            $kq = mysqli_query($conn, $lenh);
                            if(mysqli_num_rows($kq) > 0){
                                
                                
                                while ($row = mysqli_fetch_assoc($kq)){
                                    
                                    echo "<div class=\"spnb\">";
                                    echo("<a href=\"sanpham.php?id=".$row['mahang'] ."\" target=\"\"><img src=\"hinh/" .$row['hinh'] ."\" width=\"100%\" height=\"250px\"
    ></a>" ); 
                                    echo"<br>";
                                    echo"<br>";

                                    echo("<a href=\"sanpham.php?id=".$row['mahang'] ."\" target=\"\"> " .$row['tenhang'] ."</a>" );
                                    echo"<br>";
                                    echo"<br>";
                                    echo("<p align=\"center\">" .$row['gia'] ."đ" ."</p>");
                                    echo "</div>";
                                    
                                }
                            }
                            
                        ?>
                            
                            </div>
                            <div class="navButton" id="next">&#10095;</div>