<?php
    $conn = mysqli_connect('localhost', 'jigushop', '111111', 'jigushopdb', '3307'); //apach2 서버 연결
    //$conn = mysqli_connect('localhost', 'minshop22', 'utyYlT7NTLPv12MG', 'minshop22', '3306'); //도메인 연결
    if($conn){
        echo "<script>console.log('DB connect success');</script>";
    }
    else{
        echo "<script>console.log('DB connect fail');</script>";
    }
?>