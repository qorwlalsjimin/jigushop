<?php
$n_no = $_GET['no'];
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
            <form action="notice_delete_process.php" method="post">
                <div class="write_body row">
                    <span>비밀번호를 입력하세요</span>
                    <input type="password" name="pw" id="pw">
                    <input type="hidden" name="no" value="<?php echo $n_no ?>">
                </div><!--//write_body-->
            </form>
        </div><!--//container-->
    </main>

</body>

</html>