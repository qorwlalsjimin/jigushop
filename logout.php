<?php
    session_start();
    session_destroy(); //세션 삭제하기
    echo "<script>location.href='index.php';</script>";
?>