<?php
    $id = $_GET['id'];
    include("db_conn.php");

    // mysqli_query($conn, "insert into goods values
    //      (1, '[러버랩] 고무장갑 팔목라인',           2000,  null,  1, 0, 0), 
    //      (2, '[지구샵] 대나무칫솔 (10개입)',         24900, 38000, 0, 1, 0) , 
    //      (3, '[지구샵] 주방비누',                    4900,  null,  0, 0, 1), 
    //      (4, '[수퍼빈] 잘떼스틱',                    13000, null,  1, 0, 0), 
    //      (5, '[지구샵] 오리지널 고체 치약 450정입',  35900, 40200, 0, 1, 1), 
    //      (6, '[지구샵] 천연물방울수세미(3개입)',     9900,  12000, 0, 1, 1), 
    //      (7, '[탄소창고] 손편한 앞접시 세트(5개입)', 15000, null,  1, 0, 0), 
    //      (8, '[곡물집] 로스티드 그레인 파우더',      3000,  null,  1, 0, 1),
    //      (9, '[빌리스벳] 프로바이오틱스 원 395',     29000, null,  1, 0, 0)        
    //      ;");

// mysqli_query($conn, "update goods set benefit = '60' where id = 1;");
// mysqli_query($conn, "update goods set benefit = '498' where id = 2;");
// mysqli_query($conn, "update goods set benefit = '98' where id = 3;");
// mysqli_query($conn, "update goods set benefit = '260' where id = 4;");
// mysqli_query($conn, "update goods set benefit = '600' where id = 5;");
// mysqli_query($conn, "update goods set benefit = '198' where id = 6;");
// mysqli_query($conn, "update goods set benefit = '330' where id = 7;");
// mysqli_query($conn, "update goods set benefit = '240' where id = 8;");
// mysqli_query($conn, "update goods set benefit = '580' where id = 9;");

// mysqli_query($conn, "update goods set  = ''");
// mysqli_query($conn, "update goods set  = ''");
// mysqli_query($conn, "update goods set  = ''");
// mysqli_query($conn, "update goods set  = ''");
// mysqli_query($conn, "update goods set  = ''");
// mysqli_query($conn, "update goods set  = ''");
// mysqli_query($conn, "update goods set  = ''");
// mysqli_query($conn, "update goods set  = ''");
// mysqli_query($conn, "update goods set  = ''");

//상품 상세 정보 데이터 불러오기
    $query = "select * from goods where id='$id'";
    $arr = mysqli_query($conn, $query);
    $goods_data_row = mysqli_fetch_row($arr);

    $title = $goods_data_row[1];
    $ex = $goods_data_row[2];
    $origin= $goods_data_row[3];
    $brand= $goods_data_row[4];
    $benefit= $goods_data_row[5];
    $sway= $goods_data_row[6];
    $sprice = $goods_data_row[7];
    $isoption= $goods_data_row[8];
    $price = $goods_data_row[9];
    $last_price = $goods_data_row[10];
    $new =  $goods_data_row[11];
    $sale = $goods_data_row[12];
    $best =  $goods_data_row[13];

    // echo "<script>alert('$isoption');</script>";

//상품 이미지 불러오기
    $query = "select * from goods_img where id='$id'";
    $arr = mysqli_query($conn, $query);
    $img_data_row = mysqli_fetch_row($arr);

    $img_path = $img_data_row[4];
    
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
    <!-- <script type="text/javascript" src="intro.js"></script>  -->
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
                <a href="index.html"><img class="top_nav_logo_img mt-1 pt-md-1 wd-75"
                        src="https://cdn.imweb.me/thumbnail/20220504/5fd02ac97337a.png" alt="지구샵"
                        width="158.535211268"></a>
            </div>
            <div
                class="nav_nav col-4 col-xs-11 col-sm-6 col-md-5 pt-lg-2 pt-md-1 pt-sm-2 mt-lg-0 me-xxl-4 me-lg-1 me-2 pe-lg-0 pe-xl-4 px-0">
                <a href="#" class="hidden login"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
                <a href="login.html" class="sign_in_out"><span class="p-2" id="login">로그인</span></a>
                <a href="#" class=""><span class="p-2" id="join" onclick="onclickLogout();">회원가입</span></a>
                <a href="shop_cart.php"><span class="p-2"><i class="fa-solid fa-bag-shopping"></i></span></a>
                <a href="#" class="hidden search"><i class="fa-solid fa-magnifying-glass"></i></a>
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
                <a class="pe-lg-3 pe-md-1 pe-sm-2" href="#"><span>게시판</span></a>
                <a class="pe-lg-3 pe-md-1 pe-sm-2" href="#"><span>콘텐츠</span></a>
                <a class="pe-lg-3 pe-md-1 pe-sm-2" href="#"><span>제안하기</span></a>
            </div>
            <div class="right_nav col-lg-3 pt-1">
                <a href="#" class="pe-2"><span>기획전</span></a>
                <a href="#"><span>커뮤니티</span></a>
            </div>
            <div class="search_area col-lg-3">
                <div class="search_type">
                    <form>
                        <input class="ps-3" type="text" placeholder="Search">
                        <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
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


    <!--main-->
    <main>
        <div class="container mt-lg-5 mt-sm-3">
            <div class="row">
              <div class="goods_img text-center col-6">
                <img class="w-100 p-4 pt-0" src="<?php echo $img_path; ?>" alt="">
              </div><!--//goods_img-->
              <div class="goods_info col-6 fs-6">
                <div class="goods_title_info">
                    <div class="right_icon">
                        <p class="goods_title mb-1"><?php echo $title ?></p>
                        <div id="NEWicon" class="NEWicon my-1 ms-1">NEW</div>
                        <div id="SALEicon" class="SALEicon my-1 ms-1">SALE</div>
                        <div id="BESTicon" class="BESTicon my-1 ms-1">BEST</div>
                    </div>
                    <p class="goods_price text-success"><?php echo $price ?>원</p>
                </div><!--//goods_title_info-->
                <hr>
                <div class="goods_detailed_info" style="font-size: 0.7em">
                    <p class="goods_ex mb-4 fs-6"><?php echo $ex ?></p>
                    <div>
                        <span class="fw-bold">원산지</span>
                        <span class="origin"><?php echo $origin ?></span>
                    </div>
                    <div>
                        <span class="fw-bold">브랜드</span>
                        <span class="brand"><?php echo $brand ?></span>
                    </div>    
                    <div>
                        <span class="fw-bold">구매혜택</span>
                        <span class="benefit"><?php echo $benefit ?> 포인트 적립 예정</span>
                    </div>    
                    <div>
                        <span class="fw-bold">배송 방법</span>
                        <span class="shipping_way"><?php echo $sway ?></span>
                    </div>    
                    <div>
                        <span class="fw-bold">배송비</span>
                        <span class="shipping_price"><?php echo $sprice ?> | 도서산간 배송비 추가</span>
                    </div>
                </div><!--//goods_detailed_info-->
                <div class="goods_buy mt-3">
                    <div class="option" id="option">
                        <span class="fw-bold" style="font-size: 0.7em" id="option">옵션 *</span><br>
                        <select class="form-select goods_select mt-2" id="option">
                            <option selected>선택해주세요.</option>
                            <option value="ultimate">얼티밋</option>
                            <option value="coral">코랄</option>
                            <option value="almostwinter">얼모스트블루</option>
                        </select>
                    </div><!--//option-->
                    <div class="select_block">
                        <div class="option_title">
                            옵션 이름
                        </div><!--//option_title-->
                        <div class="option_btn">
                            <div class="option_btn_tool">
                                <form action="" method="get">
                                    <a href="javacript:;" onclick></a>
                                    <input type="number" value="1" min="1" max="999">
                                </form>
                            </div><!--//option_btn_tool-->
                        </div><!--//option_btn-->
                    </div><!--//select_block-->
                        <form action="cart.php" method="get">
                            <input type="hidden" name="img" value="<?php echo $img_path;?>">
                            <input type="hidden" name="title" value="<?php echo $title;?>">
                            <input type="hidden" name="price" value="<?php echo $price;?>">

                            <div class="goods_btns row p-3 mt-3 justify-content-md-center">
                                <a href="notice.html" class="col-6 h-1 py-3 btn btn-success rounded-pill">구매하기</a>
                                <a href="shop_cart_db.php?id=<?php echo $id?>&img=<?php echo $img_path;?>&title=<?php echo $title;?>&price=<?php echo $price;?>" class="col-6 btn btn-outline-secondary rounded-pill py-3 h-1">장바구니</a>
                                <!-- <button type="button" class="col-6 h-1 py-3 btn btn-success rounded-pill ">구매하기</button>
                                <button type="button" class="col-6 btn py-3 btn-outline-secondary rounded-pill">장바구니</button> -->
                            </div><!--//goods_btns-->
                        </form>
                </div><!--//goods_buy-->
              </div><!--//goods_info-->
            </div><!--//row-->
          </div><!--//container-->
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
                        <li class="ms-0 pe-2"><a href="#" style="background-color: rgba(0,0,0,0);"><span>이용약관</span></a>
                        </li>
                        <li class="pe-2"><span>|</span></li>
                        <li class="pe-2"><a href="#" style="background-color: rgba(0,0,0,0);"><span>개인정보처리방침</span></a>
                        </li>
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

<?php

//상품이 어떤 키워드를 가지고 있는지
if(strcmp($new, "1"))
    echo "<script>
    let newIcon  = document.getElementById('NEWicon');
    newIcon.setAttribute('style', 'display:none;');
    </script>";
if(strcmp($sale, "1"))
    echo "<script>
    let saleIcon  = document.getElementById('SALEicon');
    saleIcon.setAttribute('style', 'display:none;');
    </script>";
if(strcmp($best, "1"))
    echo "<script>
    let bestIcon  = document.getElementById('BESTicon');
    bestIcon.setAttribute('style', 'display:none;');
    </script>";    

if(!$isoption)
echo "<script>
let option  = document.getElementById('option');
option.setAttribute('style', 'display:none;');
</script>"; 
?>