<?php
session_start();

if(isset($_SESSION['user_id']))
    $user_id = $_SESSION['user_id']; //회원 아이디
else 
    $user_id = "guest"; 
    
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
    <!--main-->
    <main>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/title_image1.jpg" class="d-block w-100" alt="타이틀 이미지1">
                </div>
                <div class="carousel-item">
                    <img src="img/title_image2.jpg" class="d-block w-100" alt="타이틀 이미지2">
                </div>
                <div class="carousel-item">
                    <img src="img/title_image3.jpg" class="d-block w-100" alt="타이틀 이미지3">
                </div>
                <div class="carousel-item">
                    <img src="img/title_image4.jpg" class="d-block w-100" alt="타이틀 이미지4">
                </div>
                <div class="carousel-item">
                    <img src="img/title_image5.jpg" class="d-block w-100" alt="타이틀 이미지5">
                </div>
                <div class="carousel-item">
                    <img src="img/title_image6.jpg" class="d-block w-100" alt="타이틀 이미지6">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!--content1-->
        <div class="content1 container mt-5">
            <div class="row">
                <div class="left col-lg-5 col-md-12 / ps-2 ps-lg-5 / pe-0 / p-md-3 / mb-md-5">
                    <div class="left_texts col-5 col-sm-5 col-md-4 col-lg-12 ms-4 ms-sm-0 ms-md-0 ms-lg-0">
                        <p># BEST<br></p>
                        <span class="left_text">제로웨이스트 입문자도<br></span>
                        <span class="left_text">어려움 없이 사용할 수 있는<br></span>
                        <span class="left_text">베스트 제품!<br><br></span>
                    </div>
                    <div class="left_img col-7 col-sm-7 col-md-8 col-lg-12 mb-md-0 mb-sm-0">
                        <img src="https://cdn.imweb.me/thumbnail/20220304/e7edd6d6a102d.jpg"
                            class="rounded-circle w-100">
                    </div>
                </div>
                <!--//content1 left-->
                <div class="right col-lg-7 col-md-12 m-auto ps-3 ps-sm-0 ps-md-0 pe-0 pe-sm-5 pe-lg-5">
                    <div class="bundry1 pe-5 pb-4 mt-0 mt-sm-3 mt-md-0 ">

                        <div class="right_item 1 col-12 col-sm-4 col-md-4 col-lg-4  mx-3">
                            <a href="goods_detail.php?id=1" class="text-decoration-none">
                                <img class="right_item_img 1 w-100" style="display: inline;"
                                    src="./img/goods_gloves1.jpg"
                                    onmouseover="this.src=`./img/goods_gloves2.jpg`"
                                    onmouseout="this.src=`./img/goods_gloves1.jpg`"
                                    >
                                <div class="h6 pt-3">[러버랩] 고무장갑 팔목라인</div>
                                <div class="right_price">
                                    <p class="right_recent_price">2,000원</p>
                                </div>
                                <!--//right_price-->
                                <div class="right_icon">
                                    <div class="NEWicon">NEW</div>
                                </div>
                                <!--right_icon-->
                            </a>
                        </div>
                        <!--//right_item-->

                        <div class="right_item 2 col-12 col-sm-4 col-md-4 col-lg-4 mx-3">
                            <a href="goods_detail.php?id=2" class="text-decoration-none">
                            <img class="right_item_img w-100" style="display: inline;" 
                                src="./img/goods_toothbrush1.jpg"
                                onmouseover="this.src=`./img/goods_toothbrush2.jpg`"
                                onmouseout="this.src=`./img/goods_toothbrush1.jpg`"
                                >
                            <div class="h6 pt-3">[지구샵] 대나무칫솔 (10개입)</div>
                            <div class="right_price">
                                <p class="right_recent_price">24,900원</p>
                                <p class="right_origin_price ms-1">38,000원</p>
                            </div>
                            <!--//right_price-->
                            <div class="right_icon">
                                <div class="SALEicon">SALE</div>
                            </div>
                            <!--right_icon-->
                            </a>
                        </div>
                        <!--//right_item-->

                        <div class="right_item 3 col-12 col-sm-4 col-md-4 col-lg-4 mx-3">
                            <a href="goods_detail.php?id=3" class="text-decoration-none">
                                <img class="right_item_img w-100" style="display: inline;"
                                src="./img/goods_kitsoap1.jpg"
                                onmouseover="this.src=`./img/goods_kitsoap2.jpg`"
                                onmouseout="this.src=`./img/goods_kitsoap1.jpg`"
                                >
                            <div class="h6 pt-3">[지구샵] 주방비누</div>
                            <div class="right_price">
                                <p class="right_recent_price">4,900원</p>
                            </div>
                            <!--//right_price-->
                            <div class="right_icon">
                                <div class="BESTicon">BEST</div>
                            </div>
                            <!--right_icon-->
                            </a>
                        </div>
                    </div>
                    <!--//bundery1-->
                    <div class="bundry2 pe-5">
                        <div class="right_item 4 col-12 col-sm-4 col-md-4 col-lg-4 mx-3">
                            <a href="goods_detail.php?id=4" class="text-decoration-none">
                            <img class="right_item_img w-100" style="display: inline;"
                                src="./img/goods_stick1.jpg"
                                onmouseover="this.src=`./img/goods_stick2.jpg`"
                                onmouseout="this.src=`./img/goods_stick1.jpg`"
                                >
                            <div class="h6 pt-3">[수퍼빈] 잘떼스틱</div>
                            <div class="right_price">
                                <p class="right_recent_price">13,000원</p>
                            </div>
                            <!--//right_price-->
                            <div class="right_icon">
                                <div class="NEWicon">NEW</div>
                            </div>
                            <!--right_icon-->
                            </a>
                        </div>
                        <!--//right_item-->

                        <div class="right_item 5 col-12 col-sm-4 col-md-4 col-lg-4 mx-3">
                            <a href="goods_detail.php?id=5" class="text-decoration-none">
                            <img class="right_item_img w-100" style="display: inline;"
                                src="./img/goods_toothpaste1.jpg"
                                onmouseover="this.src=`./img/goods_toothpaste2.jpg`"
                                onmouseout="this.src=`./img/goods_toothpaste1.jpg`"
                                >
                            <div class="h6 pt-3">[지구샵] 오리지널 고체 치약 450정입</div>
                            <div class="right_price">
                                <p class="right_recent_price">35,900원</p>
                                <p class="right_origin_price ms-1">40,200원</p>
                            </div>
                            <!--//right_price-->
                            <div class="right_icon">
                                <div class="SALEicon">SALE</div>
                                <div class="BESTicon">BEST</div>
                            </div>
                            </a>
                        </div>
                        <!--//right_item-->

                        <div class="right_item 6 col-12 col-sm-4 col-md-4 col-lg-4 mx-3">
                            <a href="goods_detail.php?id=6" class="text-decoration-none">
                            <img class="right_item_img w-100" style="display: inline;"
                                src="./img/goods_scrubbers1.jpg"
                                onmouseover="this.src=`./img/goods_scrubbers2.jpg`"
                                onmouseout="this.src=`./img/goods_scrubbers1.jpg`"
                                >
                            <div class="h6 pt-3">[지구샵] 천연물방울수세미(3개입)</div>
                            <div class="right_price">
                                <p class="right_recent_price">9,900원</p>
                                <p class="right_origin_price ms-1">12,000원</p>
                            </div>
                            <!--//right_price-->
                            <div class="right_icon">
                                <div class="SALEicon">SALE</div>
                                <div class="BESTicon">BEST</div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <!--//bundery2-->
                    <!--//right_item-->
                </div>
                <!--//right-->
            </div>
        </div>
        <!--//content1-->

        <!--content2-->
        <div class="content2 mt-md-5 mt-lg-5 py-3 py-sm-5 py-md-5 py-lg-5">
            <div class="container">
                <div class="row">
                    <div class="content2_left col-xs-12 col-sm-12 col-md-6 col-lg-6" onclick="location.href=`https://www.youtube.com/watch?v=6twLgvNypZs`" style="cursor:pointer;">
                        <img class="float-start w-100 mb-sm-4 mb-md-0 mb-lg-0"
                            src="./img/cardnews1.jpg">
                    </div>
                    <!--content2_left-->
                    <div class="content2_right col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="content2_right_up col-12 mt-4 mt-sm-0 mt-md-0 mt-lg-0" onclick="location.href=`https://www.instagram.com/p/CO2NyoapBRY/`" style="cursor:pointer;">
                            <img class="w-100" src="./img/cardnews2.png">
                        </div>
                        <!--content2_right_up-->
                        <div class="content2_right_down col-12 mt-4" onclick="location.href=`https://www.jigushop.co.kr/use-less/?q=YToxOntzOjEyOiJrZXl3b3JkX3R5cGUiO3M6MzoiYWxsIjt9&bmode=view&idx=8011808&t=board`" style="cursor:pointer;">
                            <img class="w-100" src="./img/cardnews3.jpg">
                        </div>
                        <!--content2_right_down-->
                    </div>
                    <!--content2_right-->
                </div>
                <!--row-->
            </div>
            <!--container-->
        </div>
        <!--//content2-->

        <!--content3-->
        <div class="content3 container pt-5">
            <div class="row">
                <div class="left col-md-12 col-lg-5 ps-lg-5 pe-0 px-md-3 pb-md-0 ms-4 ms-sm-0 ms-md-0 ms-lg-0">
                    <p># NEW<br></p>
                    <span class="left_text">지구샵만의 꼼꼼한 기준으로 입고된<br></span>
                    <span class="left_text">새로운 제로웨이스트 제품을 만나보세요!<br><br></span>
                </div>
                <!--//left-->
                <div class="right col-md-12 col-lg-7 m-auto ps-3 ps-sm-0 ps-md-0 pe-0 pe-sm-5 pe-lg-5">
                    <div class="bundry1 pe-5 pb-0 pb-sm-4 pb-md-4 pb-lg-4 mt-0 mt-sm-3 mt-md-0">
                        <div class="right_item 1 col-12 col-sm-4 col-md-4 col-lg-4 mx-3">
                            <a href="goods_detail.php?id=7" class="text-decoration-none">
                                <img class="right_item_img w-100" style="display: inline;"
                                    src="./img/goods_plate1.jpg"
                                    onmouseover="this.src=`./img/goods_plate2.jpg`"
                                    onmouseout="this.src=`./img/goods_plate1.jpg`"
                                >
                                <div class="h6 pt-3">[탄소창고] 손편한 앞접시 세트(5개입)</div>
                                <div class="right_price">
                                    <p class="right_recent_price">15,000원</p>
                                </div>
                                <!--//right_price-->
                                <div class="right_icon">
                                    <div class="NEWicon">NEW</div>
                                </div>
                                <!--right_icon-->
                            </a>
                        </div>
                        <!--//right_item-->

                        <div class="right_item 2 col-12 col-sm-4 col-md-4 col-lg-4 mx-3">
                            <a href="goods_detail.php?id=8" class="text-decoration-none">
                                <img class="right_item_img w-100" style="display: inline;"
                                src="./img/goods_grainpowder1.jpg"
                                onmouseover="this.src=`./img/goods_grainpowder2.jpg`"
                                onmouseout="this.src=`./img/goods_grainpowder1.jpg`"
                                >
                            <div class="h6 pt-3">[곡물집] 로스티드 그레인 파우더</div>
                            <div class="right_price">
                                <p class="right_recent_price">3,000원</p>
                            </div>
                            <!--//right_price-->
                            <div class="right_icon">
                                <div class="NEWicon">NEW</div>
                                <div class="BESTicon">BEST</div>
                            </div>
                            <!--content3 right_icon-->
                            </a>
                        </div>
                        <!--//content3 right_item-->

                        <div class="right_item 3 col-12 col-sm-4 col-md-4 col-lg-4 mx-3">
                            <a href="goods_detail.php?id=9" class="text-decoration-none">
                                <img class="right_item_img w-100" style="display: inline;"
                                    src="./img/goods_probiotics1.jpg"
                                    onmouseover="this.src=`./img/goods_probiotics2.jpg`"
                                    onmouseout="this.src=`./img/goods_probiotics1.jpg`"
                                >
                                <div class="h6 pt-3">[빌리스벳] 프로바이오틱스 원 395</div>
                                <div class="right_price">
                                    <p class="right_recent_price">29,000원</p>
                                </div>
                                <!--//right_price-->
                                <div class="right_icon">
                                    <div class="NEWicon">NEW</div>
                                </div>
                            </a>
                            <!--content3 right_icon-->
                        </div>
                    </div>
                    <!--//bundery1-->
                    <!--//content3 right_item-->
                </div>
                <!--//content3 right-->
            </div>
        </div>
        <!--//content3-->

        <!--content4-->
        <div class="content4 mt-0 mt-sm-0 mt-md-5 mt-lg-5">
            <div class="container pt-5 pb-4">
                <span class="content4_title pt-5">JIGUSHOP MISSION</span>
                <div class="row content4_contents mt-4 px-3">
                    <div class="content4_left col-lg me-lg-4 mb-4 p-4">
                        <strong class="text">우리가 줄인 플라스틱 제품<br></strong>
                        <span class="text text_value">44,664kg</span>
                    </div>
                    <!--//네모 1-->
                    <div class="content4_midst col-lg me-lg-4 mb-4 p-4">
                        <strong class="text">우리가 순환한 자원의 양<br></strong>
                        <span class="text text_value">12,084개</span>
                    </div>
                    <!--//네모 2-->
                    <div class="content4_right col-lg p-4 mb-4">
                        <strong class="text">사회, 환경적 활동 지원 금액<br></strong>
                        <span class="text text_value">17,647,760원</span>
                    </div>
                    <!--//네모 3-->
                </div>
                <!--//네모 모임-->
                <div class="caption mt-4 h6">
                    <div class="row">
                        <div class="col-4"></div>
                        <span class="text-light col-4 ms-auto" style="font-size: 16px; text-align: right;">*2022년 2월
                            기준</span>
                    </div>
                </div>
            </div>
            <!--//container-->
        </div>
        <!--//content4-->

        <!-- content5 -->
        <div class="content5 my-5 py-4">
            <div class="container position-relative">
                <span class="title h4 pb-5 position-absolute top-0 start-50 translate-middle">INSTAGRAM</span>
                <div class="contents mt-3 pt-4 mx-lg-5 mx-md-0">
                    <a href="https://www.instagram.com/p/Ce5U9DJJx8s/?utm_source=ig_web_copy_link" target="_blank" class="text-decoration-none me-2">
                        <img class="original col-3 w-100" src="https://ifh.cc/g/JRHkVg.jpg">
                    </a>
                    <a href="https://www.instagram.com/p/Cehwr-jJg5-/?utm_source=ig_web_copy_link" target="_blank" class="text-decoration-none me-2">
                        <img class="original col-3 w-100" src="https://ifh.cc/g/L0p87X.jpg">
                    </a>
                    <a href="https://www.instagram.com/p/CeVqmtLJ6Sg/?utm_source=ig_web_copy_link" target="_blank" class="text-decoration-none me-2">
                        <img class="original col-3 w-100" src="https://ifh.cc/g/t3jrsx.jpg">
                    </a>
                    <a href="https://www.instagram.com/p/CeUxrZDpJxf/?utm_source=ig_web_copy_link" target="_blank" class="text-decoration-none me-2">
                        <img class="original col-3 w-100" src="https://ifh.cc/g/LxkBNT.jpg">
                    </a>
                </div>
                <!--//contents-->
            </div>
        </div>
        <!-- //content5 -->
        <hr style="background: #646464;">
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

<script>

function logout(){
    if(confirm('로그아웃하시겠습니까?')){
        location.href='logout.php';
    }
}

//* 엔터 이벤트
function enterkey(){
	if (window.event.keyCode == 13) {
        search();
    }
}

//* 검색 화면으로 값과 함께 이동
function search() {
    const search_word = document.getElementById('search_word').value;
    // document.getElementById("search_word").innerText = search_word;
    if(search_word.length == 0){
        alert('검색어를 입력해주세요.');
    }
    else {
        document.getElementById('search_btn').click()
        location.href='search_result.php';
    }
}
</script>