<?php
    include("db_conn.php");

    $uid = $_POST['id'];    
    $upw = $_POST['pw'];
    $upwchk = $_POST['pwcheck'];
    $uname = $_POST['name'];
    $uemail = $_POST['email'];
    $ugender = $_POST['gender'];
    $unumber = $_POST['number'];

    if(!strlen($uid)) echo "
        <script>
            alert('아이디를 입력해주세요.');
            history.back();
        </script>";
    else if(!strlen($upw)) echo "
        <script>
            alert('비밀번호를 입력해주세요.');
            history.back();
        </script>";
    else if(!strlen($upwchk)) echo "
        <script>
            alert('비밀번호 확인란을 입력해주세요.');
            history.back();
        </script>";
    else if($upw != $upwchk) echo "
        <script>
            alert('비밀번호 확인란을 입력해주세요.');
            history.back();
        </script>";
    else if(!strlen($uname)) echo "
        <script>
            alert('이름을 입력해주세요.');
            history.back();
        </script>";
    else if(!strlen($uemail)) echo "
    <script>
        alert('이메일을 입력해주세요.');
        history.back();
    </script>";
    else{
        try{
          mysqli_query($conn, "insert into user_information values('$uid', '$upw','$uname','$uemail','$ugender','$unumber');");
          if($upw != $upwchk){
            echo "<script>
              alert('비밀번호가 다릅니다.');
              history.back();
            </script>";
          }
          else{
            echo "<script>
                    alert('회원가입 성공');
                    // window.location.href = 'login.php';
                  </script>";
          }
          //TODO: 아이디 다시 입력해야되는데 회원가입햇다함
        }catch(Exception $e){
          if(strpos($e, "PRIMARY")) echo "<script>
            alert('이미 있는 아이디입니다.');
            history.back();
          </script>";
        }

    }

?>