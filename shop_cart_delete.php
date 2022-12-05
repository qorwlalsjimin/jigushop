<?php
include('db_conn.php');
session_start();
$g_id = $_GET['id'];


if(isset($_SESSION['user_id']))
    $u_id = $_SESSION['user_id'];
else
    $u_id = "guest";

mysqli_query($conn, "delete from cart where id='$g_id' && user_id='$u_id';");
echo "<script>
                    window.location.href = 'shop_cart.php?user_id=$u_id';
                  </script>";
?>