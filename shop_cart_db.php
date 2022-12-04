<!--제품 상세 정보 페이지에서 받은 정보를 DB에 저장하는 php 파일-->
<?php
    //DB 연동하는 php 파일 불러오기
    include("db_conn.php");

    //값 받아서 변수에 넣기
    $id = $_GET['id']; //상품 아이디
    $img_path = $_GET['img'];
    $title = $_GET['title'];
    $cntItem = 0;
    $price = $_GET['price'];
    $current_time = date("Y-m-d H:i:s");
    
    session_start();
    
    if(isset($_SESSION['user_id']))
        $user_id = $_SESSION['user_id']; //회원 아이디
    else 
        $user_id = "guest"; 
    echo "<script>alert('$user_id');</script>";

    //table에 값 insert
    mysqli_query($conn, "insert into cart values('$id','$title','$img_path','$cntItem','$price','$current_time','$user_id');");

    //장바구니 화면으로 이동
    echo "<script>location.href='shop_cart.php?user_id=$user_id'</script>";

    //get으로 전달 받은 값 확인
    // echo "$id $img_path $title $price";
?>