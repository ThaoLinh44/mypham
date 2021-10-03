    <?php
    session_start();

    if (!isset($_SESSION['tk'])){
        header('Location: index.php');
    }else if (isset($_GET['id']))
    {   $conn =  new mysqli('localhost','root','','banhangg') or die  ('Kết nối thất bại!');
        mysqli_query($conn, 'SET NAMES UTF8');
        $id=$_GET['id'];
        $tk=$_SESSION['tk'];
        $lenh2 = "DELETE FROM giohang WHERE tkkh = '$tk' AND mahang='$id' ";
        mysqli_query($conn, $lenh2);
        header('Location: giohang.php');
    }

    ?>
