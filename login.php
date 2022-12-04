<?php
    include("db_conn.php");

    $uid = $_POST['id'];
    $upw = $_POST['pass'];
    
    $arr = mysqli_query($conn, "select * from user_information where id='$uid';");
    $user_row = mysqli_fetch_row($arr);

    if(!$user_row){
        echo "<script>
                alert('가입이 안 되어있는 아이디입니다');
                history.back();
              </script>";
    }
    else{
        if($user_row[1] == $upw){
            // id 세션에 추가
            session_start();
            $_SESSION['user_id'] = $uid;
            $check = isset($_SESSION['user_id']);

            echo "<script>
                    window.location.href = 'index.php';
                    alert('".$_SESSION['user_id']."님 환영합니다');
                  </script>";
                
        }
        else{
            echo "<script>
                    alert(`비밀번호를 다시 확인하세요`);
                    history.back();
                  </script>";
        }
    }

?>