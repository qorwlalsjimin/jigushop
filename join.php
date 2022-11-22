<?php
    include("db_conn.php");

    $uid = $_POST['id'];    
    $upw = $_POST['pw'];
    $upwchk = $_POST['pwcheck'];
    $uname = $_POST['name'];
    $uemail = $_POST['email'];
    $ugender = $_POST['gender'];
    $unumber = $_POST['number'];

    try{
      mysqli_query($conn, "insert into user_information values('$uid', '$upw','$uname','$uemail','$ugender','$unumber');");
      echo "<script>
              alert('회원가입 성공');
              window.location.href = 'index.html';
            </script>";
      //TODO: 아이디 다시 입력해야되는데 회원가입햇다함
    }catch(Exception $e){
      if(strpos($e, "PRIMARY")) echo "<script>
        alert('이미 있는 아이디입니다.');
        history.back();
      </script>";
    }
?>