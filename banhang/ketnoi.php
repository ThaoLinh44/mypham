<?php 
    $conn =  new mysqli('localhost','root','','msql') or die  ('Kết nối thất bại!');
        mysqli_query($conn, 'SET NAMES UTF8');
?>