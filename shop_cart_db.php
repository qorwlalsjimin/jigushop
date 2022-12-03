<!--제품 상세 정보 페이지에서 받은 정보를 DB에 저장하는 php 파일-->
<?php
    //DB 연동하는 php 파일 불러오기
    include("db_conn.php");

    //값 받아서 변수에 넣기
    $id = $_GET['id'];
    $img_path = $_GET['img'];
    $title = $_GET['title'];
    $cntItem = 0;
    $price = $_GET['price'];
    $current_time = date("Y-m-d H:i:s");

    //table에 값 insert
    mysqli_query($conn, "insert into cart values('$id','$title','$img_path','$cntItem','$price','$current_time');");

    //장바구니 화면으로 이동
    echo "<script>location.href='shop_cart.php'</script>";

    //get으로 전달 받은 값 확인
    // echo "$id $img_path $title $price";
?>