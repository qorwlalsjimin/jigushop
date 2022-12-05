<?php
session_start();
include('db_conn.php');
$u_id = $_SESSION['user_id'];
$user_arr = mysqli_query($conn, "select name from user_information where id='$u_id';");
$user_row = mysqli_fetch_row($user_arr);
$u_name = $user_row[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>지구샵</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fea8b3eafd.js" crossorigin="anonymous"></script>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <main>
        <div class="container mt-5">
            <form action="notice_write_db.php" method="post">
                <div class="write_title row justify-content-between">
                    <div class="board_name col lh-lg">Q&A</div>
                    <div class="write_btn col text-end">
                        <a href="notice_board.php" class="btn btn-outline-secondary">취소</a>
                        <button type="submit" class="btn btn-success">작성</button>
                    </div>
                    <!--//write_btn-->
                    <hr class="mt-3">
                </div>
                <!--//write_title-->

                <div class="write_body">
                    <div class="row">
                        <input type="text" class="col-lg-3 m-2 p-1" name="n_name" placeholder="이름" value="<?php echo $u_name ?>"
                            style="border: none; outline: none;">
                        <input type="password" class="col-lg-3 m-2" name="n_pw" placeholder="비밀번호"
                            style="border: none; outline: none;">
                    </div>
                    <!--//row-->
                    <input type="text" class="mb-4" name="n_title" placeholder="제목"
                        style="border: none; outline: none;">
                    <textarea class="form-control mb-3" rows="8" name="n_content" placeholder="내용을 입력해주세요"></textarea>
                </div>
                <!--//write_body-->
            </form>
        </div><!--//container-->
    </main>

</body>

</html>