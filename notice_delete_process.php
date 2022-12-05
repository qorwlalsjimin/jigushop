<?php
session_start();
$id = $_SESSION['user_id'];
$pw = $_POST['pw'];
$no = $_POST['no'];

include('db_conn.php');

try{
    $arr = mysqli_query($conn, "select pw from user_information where id='$id' && pw='$pw';");
    $row = mysqli_fetch_row($arr);
    if($pw == $row[0]) mysqli_query($conn, "delete from notice_board where n_no='$no';");
    // TODO: 오류있음
}catch(Exception $e){
    echo "흠";
    echo "<script>
        alert('자신이 쓴 글만 지울 수 있습니다.');
        history.back();
     </script>";
}

echo "<script>
        window.location.href = 'notice_board.php';
     </script>";

?>