<?php
    header('Content-Type: application/json');
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
            setcookie("id", $uid, time()+3000); //1시간동안
            setcookie("pw", $upw, time()+3000); //1시간동안
            echo "<script>
                    alert('로그인 성공');
                    window.location.href = 'index.html';
                  </script>";
        }
        else{
            echo "<script>
                    alert(`비밀번호를 다시 확인하세요`);
                    history.back();
                  </script>";
        }
    }

    function deleteCookie(){
        echo "<script>
                    alert(`함수 실행됨`);
                  </script>";
        setcookie("id", $id, time()-1);
        setcookie("pw", $id, time()-1);
    }

    function test(){
        echo "<script>alert('햐');</script>";
    }
    
// echo "<script>
//     alert('로그인 성공');
//     window.location.href = 'index.html';
//   </script>";
?>