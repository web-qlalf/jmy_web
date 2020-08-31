<?php//var_dump($update_info)?>
<div class="row row-cards">
  <div class="col-md-12">
    <form action="/admin_delivery/updateInfo/<?=$update_info[0]['no']?>" method="POST">
      <div class="card">
        <div class="card-header">
          <div class="card-title"><b>배송지 수정</b></div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <label class="form-label">배송지 이름</label>
                <label class="form-label text-primary shipping_name"></label>
              </div>
              <div class="col-md-9 mb-2">
                <input type="text" class="form-control w-100 shipping_name" maxlength="20" placeholder="배송지 이름" id="shipping_name" name="shipping_name" onblur="checkText(this.id,5)" value="<?=$update_info[0]['name']?>" required/>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <label class="form-label"  for="zipcode">우편번호</label>
              </div>
              <div class="col-md-9">
                <div class="row">
                  <div class="col-md-10">
                    <input type="text" class="form-control w-100" id="zipcode" name="zipcode" value="<?=$update_info[0]['zipcode']?>"   placeholder="우편번호" required readonly/>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-primary btn-block  waves-effect waves-light" onclick="openZipSearch()">찾기</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <label class="form-label"  for="adress1">주소</label>
              </div>
              <div class="col-md-9">
                  <input type="text" class="form-control w-100" id="adress1" name="adress1" value="<?=$update_info[0]['address1']?>"   placeholder="주소" required readonly/>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <label class="form-label"  for="adress2">상세주소</label>
              </div>
              <div class="col-md-9">
                  <input type="text" class="form-control w-100" id="adress2" name="adress2" value="<?=$update_info[0]['address2']?>"   placeholder="상세주소"/>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <label class="form-label"  for="adress3">참고항목</label>
              </div>
              <div class="col-md-9">
                  <input type="text" class="form-control w-100" id="adress3" name="adress3" value="<?=$update_info[0]['address3']?>"   placeholder="참고항목"/>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <label class="form-label"  for="delivery_company">택배사</label>
                <label class="form-label text-primary delivery_company"></label>
              </div>
              <div class="col-md-9">
                  <input type="text" class="form-control w-100" id="delivery_company" name="delivery_company" value="<?=$update_info[0]['delivery_company']?>" onblur="checkText(this.id,5)" placeholder="택배사" required/>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <label class="form-label"  for="delivery_fee1">편도배송비</label>
                <label class="form-label text-primary delivery_fee1"></label>
              </div>
              <div class="col-md-9">
                  <input type="text" class="form-control w-100" id="delivery_fee1" name="delivery_fee1" value="<?=$update_info[0]['delivery_fee1']?>" onblur="checkText(this.id,2)" placeholder="편도배송비" required/>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <label class="form-label"  for="delivery_fee2">왕복배송비</label>
                <label class="form-label text-primary delivery_fee2"></label>
              </div>
              <div class="col-md-9">
                  <input type="text" class="form-control w-100" id="delivery_fee2" name="delivery_fee2" value="<?=$update_info[0]['delivery_fee2']?>" onblur="checkText(this.id,2)" placeholder="왕복배송비" required/>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <label class="form-label"  for="memo">비고</label>
              </div>
              <div class="col-md-9">
                  <input type="text" class="form-control w-100" id="memo" name="memo" value="<?=$update_info[0]['memo']?>"   placeholder="비고"/>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary btn-block waves-effect waves-light btn_register">수정</button>
        </div>
      </div>
  </div>
</form>
</div>
<script>
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
