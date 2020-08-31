
<!--Register-section-->
<section class="sptb">
  <div class="container customerpage">
    <div class="row">
        <div class="single-page" >
        <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
          <div class="wrapper wrapper2">
            <form id="Register" class="card-body" tabindex="500" action="/user/join/auth" method="post">
              <h3>KKULBI 회원가입</h3>
              <div class="user_name">
                <input type="text" id="user_name" name="user_name" onblur="checkText(this.id,15)" maxlength="10" />
                <label class="user_name_label">이름</label>
              </div>
              <div class="user_email">
                <input type="email" id="user_email" name="user_email" onblur="checkText(this.id,13)">
                <label class="user_email_label">이메일</label>
              </div>
              <div class="user_password">
                <input type="password" id="user_password" name="user_password"  onblur="checkText(this.id,10)"/>
                <label class="user_password_label">비밀번호</label>
              </div>
              <div class="user_npasswd_chk">
                <input type="password" id="user_password_chk" name="user_password_chk"  onblur="chk_password()"/>
              <label class="user_password_chk_label">비밀번호 확인</label>
              </div>
              <div class="submit">
                <button type="button" class="btn btn-primary btn-block btn_register" onclick="info_submit()">가입하기</button>
              </div>
              <p class="text-dark mb-0">이미 회원이신가요?<a href="/login" class="text-primary ml-1">로그인</a></p>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function info_submit(){
    var email_chk = $('#user_email').val();
    var email_label = $('.user_email_label');
    var email_label2 = 'user_email_label';
    $.get("/user/join/search?userEmail="+email_chk,
    function(data){
      // console.log('option_no: '+ option_no[i] +' option_code '+data);
      if(data == 0){
        email_label.attr('class', email_label2);
        email_label.text('이메일');
        $('#Register').submit();
      }else if(data == 1){
        email_label.attr('class', email_label2+' text-primary');
        email_label.text('이미 가입한 이메일입니다.');
      }else{
        console.log('알수없는오류');
      }
    });
  }
    function chk_password(){
      var pw1 = $('#user_password_chk');
      var pw1_1 = $('.user_password_chk_label');
      var pw1_2 = 'user_password_chk_label';
      var pw2 = $('#user_password');
      var pw2_1 = $('.user_password_label');
      var pw2_2 = 'user_password_label';
      var str_b ='';

      if(pw1.val() == pw2.val()){
        str_b ='일치합니다.';
        pw1_1.text(str_b);
        pw1_1.attr("class",pw1_2+" text-blue");
        $(".btn_register").attr("disabled", false);
      }else if(pw1.val() ==  null || pw1.val() == ''){
        str_b ='비밀번호 확인';
        pw1_1.text(str_b);
        pw1_1.attr("class",pw1_2);
        $(".btn_register").attr("disabled", true);
      }
      else{
        str_b ='불일치합니다.';
        pw1_1.text(str_b);
        pw1_1.attr("class",pw1_2+" text-primary");
        $(".btn_register").attr("disabled", true);
      }
    }
    function checkText(str,condition){
      var input_id = '#'+str;
      var input_name = '.'+str+'_label';
      var input_name2 = str+'_label';
      var str_v = $(input_id).val();
      var str_b = '';

      if(frmchk_char(str_v, condition)){
        // alert('성공~');
        switch (str) {
          case 'user_name':
           str_b = '이름';
            break;
          case 'user_email':
           str_b = '이메일';
            break;
          case 'user_password':
           str_b = '비밀번호';
            break;
        }
        $(input_name).text(str_b);
        $(input_name).attr("class",input_name2);
        $(".btn_register").attr("disabled", false);

      }else{

        switch (str) {
          case 'user_name':
           str_b = '한글 2~10자이내로 다시 입력하세요.';
            break;
          case 'user_email':
           str_b = '잘못된 형식입니다.';
            break;
          case 'user_password':
           str_b = '특수문자 / 문자 / 숫자만 가능 {8~20자리 이내}';
            break;
        }
        $(input_name).text(str_b);
        $(input_name).attr("class",input_name2+" text-primary");
        $(".btn_register").attr("disabled", true);
      }
    }

    /* 폼 입력값 Check*/
    function frmchk_char(str, condition){
      /*
      설명  : 폼 입력값을 정규식패턴을 이용해서 체크함
      사용법 : frmchk_char(문자열, 조건)
      결과값 : true/false
      조건  :
      0 = 첫글자 영문, 영문, 숫자, _ 사용가능
      1 = 영문만 사용가능
      2 = 숫자만 사용가능
      3 = 한글만 사용가능
      4 = 영문, 숫자 사용가능
      5 = 영문, 숫자, 한글 사용가능
      6 = 한글, 숫자 사용가능
      7 = 한글, 영문 사용가능
      8 = 한글을 포함하는지 여부
      9 = 영문, 숫자만 가능 {4~20자 이내}
      10 = 특수문자 / 문자 / 숫자만 가능 {8~20자리 이내}
      11 = 휴대폰 번호 정규식
      12 = 공백 여부
      13 = 이메일
      14 = 전화번호 (02/032) 가능
      14 = 한글만 사용가능 {2~10자}
      */


      var objPattern ='';
      switch(condition){
        case(0) :
         objPattern = /^[a-zA-Z]{1}[a-zA-Z0-9_]+$/;
         break;
        case(1) :
         objPattern = /^[a-zA-Z]+$/;
         break;
        case(2) :
         objPattern = /^[0-9]+$/;
         break;
        case(3) :
         objPattern = /^[가-힣]+$/;
         break;
        case(4) :
         objPattern = /^[a-zA-Z0-9]+$/;
         break;
        case(5) :
         objPattern = /^[가-힣a-zA-Z0-9]+$/;
         break;
        case(6) :
         objPattern = /^[가-힣0-9]+$/;
         break;
        case(7) :
         objPattern = /^[가-힣a-zA-Z]+$/;
         break;
        case(8) :
         objPattern = /[가-힣]/;
         break;
        case(9) :
         objPattern = /^[a-z0-9]{4,20}$/;
         break;
        case(10) :
         objPattern = /^.*(?=^.{8,20}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/;
         break;
        case(11) :
         objPattern = /^01([0|1|6|7|8|9]?)-?([0-9]{3,4})-?([0-9]{4})$/;
         break;
        case(12) :
         objPattern = /\s/g;
         break;
        case(13) :
         objPattern = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
         break;
         case(14) :
          objPattern = /^\d{2,3}-\d{3,4}-\d{4}$/;
          break;
         case(15) :
          objPattern = /^[가-힣]{2,10}$/;
          break;
      }
      return objPattern.test(str);
    }
</script>
<!--Register-section-->
