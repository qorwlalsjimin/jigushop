<?php
    $conn = mysqli_connect('localhost', 'jigushop', '111111', 'jigushopdb', '3307');
    if($conn){
        echo "<script>console.log('DB connect success');</script>";
    }
    else{
        echo "<script>console.log('DB connect fail');</script>";
    }
?>