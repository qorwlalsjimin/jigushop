let spanJoin = document.getElementById('join');
let spanLogin = document.getElementById('login');

//* 쿠키
//참고한 블로그: https://rjs5967.tistory.com/25
function getCookie(name) { //가져올 쿠키의 이름을 파라미터 값으로 받고
    var nameOfCookie = name + "="; //쿠키는 "쿠키=값" 형태로 가지고 있어서 뒤에 있는 값을 가져오기 위해 = 포함
    var x = 0;

    while (x <= document.cookie.length) {  //현재 세션에 가지고 있는 쿠키의 총 길이를 가지고 반복
         var y = (x + nameOfCookie.length); //substring으로 찾아낼 쿠키의 이름 길이 저장
         if (document.cookie.substring(x, y) == nameOfCookie) { //잘라낸 쿠키와 쿠키의 이름이 같다면
              if ((endOfCookie = document.cookie.indexOf(";", y)) == -1) //y의 위치로부터 ;값까지 값이 있으면 
                   endOfCookie = document.cookie.length; //쿠키의 길이로 적용하고
              return unescape(document.cookie.substring(y, endOfCookie)); //쿠키의 시작점과 끝점을 찾아서 값을 반환
         }

         x = document.cookie.indexOf(" ", x) + 1; //다음 쿠키를 찾기 위해 시작점을 반환
         if (x == 0) //쿠키 마지막이면 
              break; //반복문 빠져나오기

    }

    return ""; //빈값 반환
}

if (getCookie('id') != "" && getCookie('pw') != "") {
     //쿠키 있음
    spanLogin.setAttribute('style', 'display:none;');
    spanJoin.textContent = '로그아웃';
}
else{
    //쿠키 없음
}

//* 회원가입 온클릭
function onclickLogout(){
    if(spanJoin.innerText == "회원가입"){
        window.location.href = 'join.html';
    }
    else if(spanJoin.innerText == "로그아웃"){
        spanLogin.removeAttribute( 'style' );
        spanJoin.textContent = '회원가입';
    }
}