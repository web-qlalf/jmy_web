<?php $user_info_title = $this->lang->line('user_info_title');?>
<?php $user_info_contents = $this->lang->line('user_info_contents');?>
<?php
// echo "<pre>";
// echo "user_info <br />";
// var_dump($user_info);
// echo "</pre>";
?>
  <div class="col-xl-10 col-lg-12 col-md-12">
    <form action="/mypage/update" method="post">
      <div class="card mb-0">
        <div class="card-header">
          <h3 class="card-title"><?=$user_info_title[0]?></h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label"><?=$user_info_title[1]?></label>
                <input type="hidden" class="form-control user_no" name="user_no" value="<?=$user_info[0]['no']?>">
                <input type="text" class="form-control user_name" name="user_name" placeholder="<?=$user_info_contents[1]?>" value="<?=$user_info[0]['name']?>" readonly>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label"><?=$user_info_title[2]?></label>
                <input type="email" class="form-control user_email" name="user_email" placeholder="<?=$user_info_contents[2]?>" value="<?=$user_info[0]['email']?>" readonly>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label"><?=$user_info_title[3]?></label>
                <input type="text" class="form-control user_tel1" name="user_tel1" id="user_tel1" placeholder="<?=$user_info_contents[3]?>" value="<?=$user_info[0]['tel1']?>" onblur="checkText(this.id,2)" readonly>
                <label class="user_tel1_label"></label>
              </div>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="form-group">
                <label class="form-label"><?=$user_info_title[4]?></label>
                <input type="text" class="form-control user_tel2" name="user_tel2" id="user_tel2" placeholder="<?=$user_info_contents[4]?>" value="<?=$user_info[0]['tel2']?>" onblur="checkText(this.id,2)" readonly>
                <label class="user_tel2_label"></label>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="form-group">
                <label class="form-label" for="zipcode"><?=$user_info_title[5]?></label>
                <div class="input-group">
                  <input type="number" class="form-control" id="zipcode" name="zipcode"  placeholder="<?=$user_info_contents[5]?>" value="<?=$user_info[0]['zipcode']?>" readonly/>
                  <div class="input-group-append">
                    <button type="button" onclick="openZipSearch()" class="btn btn-primary zipcode_btn" disabled>찾기</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-8">
              <div class="form-group">
                <label class="form-label"><?=$user_info_title[6]?></label>
                <input type="text" class="form-control" id="adress1" name="address1" placeholder="<?=$user_info_contents[6]?>" value="<?=$user_info[0]['address1']?>" readonly/>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-label"><?=$user_info_title[7]?></label>
                <input type="text" class="form-control" id="adress2" name="address2" placeholder="<?=$user_info_contents[7]?>" value="<?=$user_info[0]['address2']?>" readonly>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-label"><?=$user_info_title[8]?></label>
                <input type="text" class="form-control" id="adress3" name="address3" placeholder="<?=$user_info_contents[8]?>" value="<?=$user_info[0]['address3']?>" readonly>
              </div>
            </div>

          </div>
        </div>
        <div class="card-footer">
          <button class="btn btn-primary update_start" onclick="readonly_remove()"><?=$user_info_title[10]?></button>
          <button type="submit" class="btn btn-primary update_btn" style="display:none">수정하기</button>
        </div>
      </div>
    </form>
  </div>

<!--/User Dashboard-->
<script>
  function readonly_remove()
  {
    $('.user_tel1').attr('readonly', false);
    $('.user_tel2').attr('readonly', false);
    $('.zipcode_btn').attr('disabled', false);
    $('#adress2').attr('readonly', false);
    $('.update_btn').attr('disabled', false);
    $('.update_btn').attr('style', '');
    $('.update_start').attr('disabled', true);
    $('.update_start').attr('style', 'display:none');
  }

function checkText(str,condition)
{
  var input_id = '#'+str;
  var input_name = '.'+str+'_label';
  var input_name2 = str+'_label';
  var str_v = $(input_id).val();
  var str_b = '';

  if(frmchk_char(str_v, condition))
  {
    // alert('성공~');
    // switch (str) {
    //   case 'user_name':
    //    str_b = '이름';
    //     break;
    //   case 'user_email':
    //    str_b = '이메일';
    //     break;
    //   case 'user_password':
    //    str_b = '비밀번호';
    //     break;
    // }
    $(input_name).text('');
    $(input_name).attr("class",input_name2);
    $(".update_btn").attr("disabled", false);

  }
  else
  {

    switch (str) {
      case 'user_tel1':
       str_b = '잘못된 형식입니다.';
        break;
      case 'user_tel2':
       str_b = '잘못된 형식입니다.';
        break;
    }
    $(input_name).text(str_b);
    $(input_name).attr("class",input_name2+" text-primary");
    $(".update_btn").attr("disabled", true);
  }
}

  /* 폼 입력값 Check*/
  function frmchk_char(str, condition)
  {
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
