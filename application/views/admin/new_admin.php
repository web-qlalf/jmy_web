    <div class="row row-cards">
      <div class="col-md-12">
        <form action="/admin_user/add" method="POST">
          <div class="card">
            <div class="card-header">
              <div class="card-title"><b>Admin 계정 생성</b></div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label class="form-label">ID</label>
                    <label class="form-label form_alram_id text-primary"></label>
                  </div>
                  <div class="col-md-7 mb-2">
                    <input type="text" class="form-control w-100 user_id" maxlength="20" placeholder="ID는 영문,숫자로만 입력하세요. (4~20자)" name="user_id" required/>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-primary btn-block waves-effect waves-light" id="duplicate_id">중복조회</button>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label class="form-label">이름</label>
                    <label class="form-label text-primary user_name"></label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control w-100" maxlength="10" onblur="checkText(this.id,3)" id = "user_name" name="user_name" placeholder="이름(10자이내)" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label class="form-label">비밀번호</label>
                    <label class="form-label user_password text-primary"></label>
                  </div>
                  <div class="col-md-9">
                    <input type="password" class="form-control w-100" name="user_password" id="user_password" onblur="checkText(this.id,10)" maxlength="20" placeholder="특수문자(!@#$%^&+=), 문자, 숫자 조합 (8~20자리)" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label class="form-label">비밀번호 확인</label>
                    <label class="form-label user_password_chk text-azure"></label>
                  </div>
                  <div class="col-md-9">
                    <input type="password" class="form-control w-100" id="user_password_chk" name="user_password_chk" placeholder="같은 비밀번호를 입력하세요." required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label class="form-label">이메일</label>
                    <label class="form-label text-primary user_mail"></label>
                  </div>
                  <div class="col-md-9">
                    <input type="email" class="form-control w-100" id = "user_mail" onblur="checkText(this.id,13)" name="user_mail"  placeholder="이메일" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label class="form-label">연락처</label>
                    <label class="form-label text-primary user_tel"></label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" class="form-control w-100" id="user_tel" name="user_tel" onblur="checkText(this.id,14)" placeholder="010-2222-5555" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label class="form-label">직급</label>
                    <input type="hidden" class="form-control w-100" id="position" name="position" required/>
                  </div>
                  <div class="col-md-9">
                    <select class="form-control select2 position_select" data-placeholder="Choose Browser" onChange="">
                      <option value="0" selected>선택</option>
                      <option value="1">admin</option>
                      <option value="2">판매/상품관리</option>
                      <option value="3">고객관리</option>
                      <option value="4">CMS</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <hr class="p-0 m-0" />
            <div class="card-header">
              <div class="card-title"><b>본인확인 질문</b></div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                      <label class="form-label" name="admin_question_01" >01. 기억에 남은 선물은?</label>
                      <input type="hidden" name="admin_question_01" value="01. 기억에 남은 선물은?" required/>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="admin_answer_01" class="form-control w-100" value="" maxlength="20" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label class="form-label" name="admin_question_02" >02. 좋아하는 색은?</label>
                    <input type="hidden" name="admin_question_02" value="02. 좋아하는 색은?" required/>
                  </div>
                  <div class="col-md-9">
                    <input type="text" name="admin_answer_02" class="form-control w-100" value="" maxlength="20" required/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label class="form-label" name="admin_question_03" >03. 계정 이메일</label>
                    <input type="hidden" name="admin_question_03" value="03. 계정 이메일?" required/>
                  </div>
                  <div class="col-md-9">
                    <input type="email" name="admin_answer_03" class="form-control w-100" required/>
                  </div>
                </div>
              </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-block waves-effect waves-light btn_register">등록</button>
            </div>
          </div>
      </div>
    </form>
    </div>
<script>

/* 직급 선택 */
$('.position_select').on("change",function(){
  var selected= $(".position_select option:selected").val();
  var selected_text= $(".position_select option:selected").text();
  if(selected == 0){
    $('#position').val('');
    $(".btn_register").attr("disabled", true);
  }else{
    $('#position').val(selected_text);
    $(".btn_register").attr("disabled", false);
  }
});

/* 전화번호 자동 하이픈 입력 */
$('#user_tel').on("keyup", function(){
  this.value = autoHypenPhone( this.value ) ;
});
/* 비밀번호 확인 */
$('#user_password_chk').on("blur", function(){
    var one = $('#user_password').val();
    var two = $('#user_password_chk').val();
    if(one == two){
      $('.user_password_chk').text('');
      $(".btn_register").attr("disabled", false);
    }else{
      $('.user_password_chk').text('동일하지 않은 비밀번호입니다.');
      $(".btn_register").attr("disabled", true);
    }
});

/* 아이디 중복조회 && 정규식*/
$("#duplicate_id").on("click", function(){
  var user_id = $('.user_id').val();

  if(frmchk_char(user_id,9)){ //ID 정규표현식
    $('.form_alram_id').text('');
    //아이디 조회
    $.ajax({
      url : '/admin_user/searchId?userId='+ user_id,
      type : 'get',
      success : function(data) {
        // console.log(data);
        data = parseInt(data);
        switch (data) {
          case 0:
          $('.form_alram_id').text("사용 중인 아이디입니다.");
          $(".btn_register").attr("disabled", true);
            break;
          case 1:
          $('.form_alram_id').text("사용 가능한 아이디입니다.");
          $(".btn_register").attr("disabled", false);
            break;
          case 2:
          $('.form_alram_id').text("");
            console.log("중복조회 실패.");
            break;
          default:

        };

        }, error : function() {
            console.log("실패");
        }
      })
  }else{
    $('.form_alram_id').text('ID를 다시 입력해 주세요.');
  }
});
/* 아이디 중복조회 && 정규식*/

function checkText(str,condition){
  var input_id = '#'+str;
  var input_name = '.'+str;
  var str_v = $(input_id).val();

  if(frmchk_char(str_v, condition)){
    // alert('성공~');
    $(input_name).text("");
    $(".btn_register").attr("disabled", false);
  }else{
    $(input_name).text("다시 입력해 주세요.");
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
  }
  return objPattern.test(str);
}

// 전화번호 유효성 검사
  function autoHypenPhone(str){
        str = str.replace(/[^0-9]/g, '');
        var tmp = '';
        if( str.length < 4){
            return str;
        }else if(str.length < 7){
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3);
            return tmp;
        }else if(str.length < 10){ //02로 시작할 때
            tmp += str.substr(0, 2);
            tmp += '-';
            tmp += str.substr(2, 3);
            tmp += '-';
            tmp += str.substr(5);
            return tmp;
        }else if(str.length < 11){
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3, 3);
            tmp += '-';
            tmp += str.substr(6);
            return tmp;
        }else{
            tmp += str.substr(0, 3);
            tmp += '-';
            tmp += str.substr(3, 4);
            tmp += '-';
            tmp += str.substr(7);
            return tmp;
        }

        return str;
  }
</script>
