<!--DB의 내용을 불러와 장바구니를 보여주는 화면-->
<?php
session_start();

// DB연동
include('db_conn.php');

// 사용자 아이디 받아오기
$user_id = $_GET['user_id'];

// 장바구니 추가된지 오래된 상품을 위에서부터 출력
$arr = mysqli_query($conn, "select * from cart where user_id='$user_id' order by add_order");

// 장바구니에 담긴 상품 개수
$goods_cnt = mysqli_num_rows($arr);

// TODO: 회원마다 장바구니를 가지고 있어야함
// $user_id = 

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

    <header>
        <!--nav-->
        <!--로고 있는 top nav-->
        <div class="top_nav container mt-2 mt-sm-0 mt-md-0 mt-lg-0">
            <div class="row justify-content-between pt-lg-3 pt-sm-2 me-xxl-4 me-lg-0">
                <div class="nav_logo col-4 col-xs-1 ps-lg-4">
                    <a href="index.php"><img class="top_nav_logo_img mt-1 pt-md-1 wd-75"
                            src="https://cdn.imweb.me/thumbnail/20220504/5fd02ac97337a.png" alt="지구샵"
                            width="158.535211268"></a>
                </div>
                <div
                    class="nav_nav col-4 col-xs-11 col-sm-6 col-md-5 pt-lg-2 pt-md-1 pt-sm-2 mt-lg-0 me-xxl-4 me-lg-1 me-2 pe-lg-0 pe-xl-4 px-0">
                    <a href="#" class="hidden login"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>

                    <!--로그인되어 있을때-->
                    <?php
                        if(isset($_SESSION['user_id'])){
                    ?>
                        <a href="#" class=""><span class="p-2" id="join" onclick="logout();">로그아웃</span></a>

                    <!--로그인해야할때-->
                    <?php
                        }
                        else{
                    ?>
                        <a href="login.php" class="sign_in_out"><span class="p-2" id="login">로그인</span></a>
                        <a href="join.php" class=""><span class="p-2" id="join">회원가입</span></a>
                    <?php
                        }
                    ?>

                    <a href="shop_cart.php?user_id=<?php echo $user_id; ?>"><span class="p-2"><i class="fa-solid fa-bag-shopping"></i></span></a>
                    <!-- <a href="search_result.html?search_word='비누'" class="hidden search"><i class="fa-solid fa-magnifying-glass"></i></a> -->

                </div>
            </div>
        </div>
        <!--//로고 있는 top nav-->

        <!--메인 nav-->
        <nav class="main_nav container mt-4 mb-3">
            <div class="row">
                <div class="left_nav col-lg-6 ms-lg-3 ms-md-0 ms-1 ms-sm-0 ms-md-0 ms-lg-0">
                    <a class="pe-lg-3 pe-md-1 pe-sm-2" href="#"><span>MADE</span></a>
                    <a class="pe-lg-3 pe-md-1 pe-sm-2" href="#"><span>장보기</span></a>
                    <a class="pe-lg-3 pe-md-1 pe-sm-2" href="#"><span>지구소개</span></a>
                    <a class="pe-lg-3 pe-md-1 pe-sm-2" href="notice_board.php"><span>게시판</span></a>
                    <a class="pe-lg-3 pe-md-1 pe-sm-2" href="#"><span>콘텐츠</span></a>
                    <a class="pe-lg-3 pe-md-1 pe-sm-2" href="#"><span>제안하기</span></a>
                </div>
                <div class="right_nav col-lg-3 pt-1">
                    <a href="#" class="pe-2"><span>기획전</span></a>
                    <a href="#"><span>커뮤니티</span></a>
                </div>
                <div class="search_area col-lg-3">
                    <div class="search_type">
                        <form action='search_result.php'  method="get">
                            <!-- TODO: enter 이벤트로도 넘어가게 하기 -->
                            <input name="search_word" class="ps-3" id="search_word" type="text" placeholder="Search" onkeypress="enterkey();" style="outline: none;">
                            <i class="fa-solid fa-magnifying-glass" onclick="search()"  style="cursor:pointer;"></i>
                            <!-- <button id="search_btn" type="submit" style="display:none;"></button> -->
                        </form>
                    </div>
                    <!--//search_type-->
                </div>
                <!--//search_area-->
            </div>
        </nav>
        <!--//메인 nav-->
        <!--//nav-->
    </header>
    
    <main> 
        <div class="shop-tit container mt-5 mx-5 px-4">
            <div class="row">
                <div class="col align-self-start d-lg-flex">
                    <div class="text me-2 ms-5 h6 ">장바구니</div>
                    <span class="b_cnt badge bg-secondary text-wrap rounded-circle lh-base">&nbsp;<?php echo $goods_cnt;?>&nbsp;</span>
                </div>
            </div><!--//row-->
        </div><!--//shop-tit-->
        
        <table class="table container align-middle">
                <tr><!--열 이름-->
                    <th>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <small class="text-secondary lead" style="font-size: 0.8em;">상품 정보</small>
                    </th>
                    <th class="text-center"><small class="text-secondary lead" style="font-size: 0.8em;">수량</small></th>
                    <th class="text-center"><small class="text-secondary lead" style="font-size: 0.8em;">주문금액</small></th>
                    <th class="text-center"><small class="text-secondary lead" style="font-size: 0.8em;">삭제</small></th>
                </tr><!--//열 이름-->

<?php
//상품 리스트 출력
for($i = 0; $i<mysqli_num_rows($arr); $i++){
    $row = mysqli_fetch_row($arr);
    $price = substr_replace((string)((int)$row[4]*(int)$row[3]),',',strlen((string)((int)$row[4]*(int)$row[3]))-3,0); //쉼표 넣은 값
    $id = $row[0];
    // echo "<script>alert('$test')</script>";
    echo "
                <tr>
                    <td class='d-flex py-3'>
                        <div class='checkItem me-3'>
                            <input class='form-check-input' type='checkbox' value='' id='flexCheckChecked' checked>
                        </div>
                        <img class='ps-1 pe-4' src='$row[2]' alt='cart item' style='width: 15%;'>
                        <p><a href='#' class='text-decoration-none'><small class='text-secondary' style='font-size: 0.9em;'>$row[1]</small></a></p>
                    </td>
                    <td class='py-3 text-center'>
                        <div class='cntItem text-secondary'>$row[3]</div>
                        <!--
                        <div class='changeItem_div mt-1'>
                            <a class='btn_changeItem text-decoration-none bg-secondary text-white rounded p-1 lead' style='font-size: 0.7em;' href='#'>옵션/수량 변경</a>
                        </div>
                        -->
                    </td>
                    <td class='py-3 text-center'>
                        <span class='price_text text-secondary h6' style='font-weight: bolder;'>$price 원</span>
                        <div class='directBuy_div mt-2'>
                            <a class='btn_directBuy_div text-decoration-none bg-success text-white rounded p-1 lead' style='font-size: 0.7em;' href='#'>바로구매</a>
                        </div>
                    </td>
                    <td class='py-3 text-center'>
                        <a href='shop_cart_delete.php?id=$id' class='text-decoration-none'><span class='price_text text-secondary h6'>X</span></a>
                    </td>
                </tr>
    ";
}
?>

                        <!-- 
                            //상품 없을때
                        <i class='fa-solid fa-cart-shopping text-secondary'></i>
                        <div class='cart_message lead'><small class='text-secondary'>장바구니가 비어있습니다.</small> </div> 
                        -->
                <caption class="text-center"><a class="text-success" href="index.php">계속 쇼핑하기</a></caption>
        </table>
    </main>
    

    <footer>
        <div class="num_info container mt-5 pb-4 mt-lg-5 mt-md-5">
            <span class="text">대표 전화<br></span>
            <span class="text_title">☎ 02-812-2050<br></span>
            <span class="text"><strong>운영시간 </strong>월-금 10시 - 18시 / <strong>점심시간 </strong>12시 - 13시<br></span>
            <span class="text">* 배송 및 온라인 고객센터 : 주말, 공휴일 휴무<br></span>
        </div>

        <div class="under_info container mt-5 mb-5">
            <div class="left store col-2 me-2">
                <p class="text_title">지구샵 연남점</p>
                <div class="line"></div>
                <p class="text">
                    <strong>☎ 070-7721-5748<br></strong>
                    <strong>영업일 </strong>월 - 일 (화 휴무)<br>
                    <strong>운영시간 </strong>11시 - 21시 30분<br>
                    * 공휴일 당일 휴무<br>
                </p>
            </div>
            <!--//store yeonnam-->

            <div class="left store col-2 me-2">
                <p class="text_title">지구샵 그로서리점</p>
                <div class="line"></div>
                <p class="text">
                    <strong>☎ 02-333-2050<br></strong>
                    <strong>영업일 </strong>수 - 일 (월, 화 휴무)<br>
                    <strong>운영시간 </strong>11시 - 18시<br>
                    * 가오픈 기간<br>
                </p>
            </div>
            <!--//store grocery-->

            <div class="left store col-2 me-2">
                <p class="text_title">지구샵 상도점</p>
                <div class="line"></div>
                <p class="text">
                    <strong>☎ 070-7756-3270<br></strong>
                    <strong>영업일 </strong>월 - 토 (일 휴무)<br>
                    <strong>운영시간 </strong>19시 - 새벽 1시<br>
                    * 공집합 공동 운영<br>
                </p>
            </div>
            <!--//store sangdo-->

            <div class="right jigushop col-2 me-2">
                <p class="text_title">지구샵</p>
                <div class="line"></div>
                <p class="text">
                    <a href="#">브랜드소개</a><br>
                    <a href="#">비전</a><br>
                    <a href="#">팀원</a><br>
                    <a href="#">임팩트</a><br>
                </p>
            </div>
            <!--//jigushop-->

            <div class="right consumer_help col-2 me-2">
                <p class="text_title">고객 도움</p>
                <div class="line"></div>
                <p class="text">
                    <a href="#">공지사항</a><br>
                    <a href="#">자주묻는질문</a><br>
                    <a href="#">문의하기</a><br>
                    <a href="#">고객후기</a><br>
                </p>
            </div>
            <!--//consumer_help-->

            <div class="right social col-2">
                <p class="text_title">소셜</p>
                <div class="line"></div>
                <table class="mt-3">
                    <tr>
                        <td><a href="#"><img class="w-75"
                                    src="https://cdn.imweb.me/upload/S202001038f7af028ec26d/39d6aceb4847a.png"></a></td>
                        <td><a href="#"><img class="w-75"
                                    src="https://cdn.imweb.me/upload/S202001038f7af028ec26d/4f410a2d242e6.png"></a></td>
                        <td><a href="#"><img class="w-75"
                                    src="https://cdn.imweb.me/upload/S202001038f7af028ec26d/3b541dd905d94.png"></a></td>
                    </tr>
                </table>
            </div> <!-- //social -->
        </div><!-- //under_info -->
        <div class="last_info py-2">
            <div class="container">
                <div class="left col-3 mt-5 me-4"><img class="w-100"
                        src="https://cdn.imweb.me/thumbnail/20220217/a5d090c029b04.png"></div>
                <div class="right col-9 col-sm-12 mt-4">
                    <ul>
                        <li class="ms-0 pe-2"><a href="#" style="background-color: rgba(0,0,0,0);"><span>이용약관</span></a></li>
                        <li class="pe-2"><span>|</span></li>
                        <li class="pe-2"><a href="#" style="background-color: rgba(0,0,0,0);"><span>개인정보처리방침</span></a></li>
                        <li class="pe-2"><span>|</span></li>
                        <li><a href="#" style="background-color: rgba(0,0,0,0);"><span>도매 전용 B2B몰</span></a></li>
                    </ul>

                    <div class="etc">
                        <p>
                            · 회사명 : 주식회사 피스온테이블 | 대표자 : 김아리<br>
                            · 주소 : 서울특별시 동작구 성대로1길 16, 1층 | 이메일 : contact@jigushop.co.kr | 팩스 : 0303-3444-2050<br>
                            · 사업자등록번호 : 689-86-00791 | 통신판매업신고 : 제2018-서울동작-0295 <a href="#">사업자정보확인</a><br>
                            · 개인정보보호책임자 : 김아리 | 고객센터 : 02-812-2050 | 호스팅 제공자 : ㈜아임웹<br>
                        </p>
                    </div>
                </div> <!-- //right -->
            </div><!-- //container -->
        </div><!-- //last_info -->
    </footer>
</body>

</html>

<script>
    function logout(){
    if(confirm('로그아웃하시겠습니까?')){
        location.href='logout.php';
    }
}

</script>

