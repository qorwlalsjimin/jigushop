<?php
    $conn = mysqli_connect('localhost', 'jigushop', '111111', 'jigushopdb', '3307');
    if($conn){
        echo "DB connect success";
    }
    else{
        echo "DB connect fail";
    }
?>