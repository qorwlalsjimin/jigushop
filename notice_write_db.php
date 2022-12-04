<?php
    include('db_conn.php');

    $n_name = $_POST['n_name'];
    $n_pw = $_POST['n_pw'];
    $n_title = $_POST['n_title'];
    $n_content = $_POST['n_content'];
    $n_date = date("Y-m-d H:i:s");

    if(mysqli_query($conn, "insert into notice_board(n_name, n_pw, n_title, n_content, n_date) values('$n_name','$n_pw','$n_title', '$n_content','$n_date');"))
        echo "success";

    echo "<script>location.href='notice_board.php';</script>";
?>