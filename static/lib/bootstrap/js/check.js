function validate(){
  var zipcode = document.getElementById("zipcode");
  if(!IdPwCheck()){ //아이디 비밀번호 검사
    // alert("아이디 비번 검사 완료.")
        return false;
   }else if(!SellName()){ //대표자 및 기업명 검사
        return false;
    }else if(!EmailCheck()){ //이메일 검사
        return false;
      }else if(zipcode.value == ""){
        alert("우편번호를 입력해 주세요");
        return false;
      }else if(!NumCheck()){
        return false;
      }else if(!CheckAgree()){
        return false;
      }else{
        result_post2();
        return true;
      // result_post();
      // CheckAgree();
      // alert(bio);
      // return true;
    }
}
function result_post2(){
alert('통과~');
}
function result_post(){
  var bio = new Array();
  var f = document.getElementById("policy_info_row_num").value;
  for(var k=0; k<f; k++){
  var chk_radio = document.getElementsByName("policy_agree_"+k);
    var sel_type = null;
    for(var i=0;i<chk_radio.length;i++){
      if(chk_radio[i].checked == true){
        sel_type = chk_radio[i].value;
        bio.push('<input type="hidden" id="seller_agree_'+k+'"value="'+ sel_type +'"  name="seller_agree_'+k+'">');
      }
     }
     var set = bio.length;
  }

  document.write(
  '<form action="/authseller/join" id="smb_form" method="post"><input type="hidden" id="userid" name="userid" value="'+ document.getElementById("userid").value +'"><input type="hidden" id="password" name="password" value="'+ document.getElementById("password").value +'"><input type="hidden" id="sell_name1" name="sell_name1" value="'+ document.getElementById("sell_name1").value +'"><input type="hidden" id="sell_name2" name="sell_name2" value="'+ document.getElementById("sell_name2").value +'"><input type="hidden" id="sell_tel1" name="sell_tel1" value="'+ document.getElementById("sell_tel1").value+'"><input type="hidden" id="sell_tel2" name="sell_tel2" value="'+ document.getElementById("sell_tel2").value+'"><input type="hidden" id="sell_Busino" name="sell_Busino" value="'+ document.getElementById("sell_Busino").value+'"><input type="hidden" id="zipcode" name="zipcode" value="'+ document.getElementById("zipcode").value+'"><input type="hidden" id="adress1" name="adress1" value="'+ document.getElementById("adress1").value+'"><input type="hidden" id="adress2" name="adress2" value="'+ document.getElementById("adress2").value+'"><input type="hidden" id="adress3" name="adress3" value="'+ document.getElementById("adress3").value+'"><input type="hidden" id="email" name="email" value="'+ document.getElementById("email").value+'"><input type="hidden" id="grade" name="grade" value="'+ document.getElementById("grade").value+'"><input type="hidden" id="status" name="status" value="'+ document.getElementById("status").value+'">');

  for(var arr = 0; arr< set; arr++){
      document.write(bio[arr]);
  }
  document.write('<input type="hidden" id="seller_agree_arr_no" name="seller_agree_arr_no" value="'+set+'">');
  document.write('</form>');
document.getElementById("smb_form").submit();
}

//값 넘기기
function search(){
  document.frm.action = "search.jsp";
  document.frm.method = "post";
  document.frm.submit();
}

function createData(){
  var sendData = $("#seller_register").serializeArray();
  console.log(sendData);
  return {"data" : sendData};
}

function createData2(){
  var sendData2 = $("#seller_policy").serializeArray();
  console.log(sendData2);
  return {"data2" : sendData2};
}

function hohoho(){
  document.seller_register.action = "/authseller/join";
  document.seller_register.method = "post";
  document.seller_register.submit();

  document.seller_policy.action = "/authseller/join";
  document.seller_policy.method = "post";
  document.seller_policy.submit();
}

function AjaxCall() {
  $.ajax({
    type: "POST",
    url : "/authseller/join",
    data: createData(),
    dataType:"script",
    success : function(data, status, xhr) { console.log(data); },
    error: function(jqXHR, textStatus, errorThrown) {console.log(jqXHR.responseText); }
  });

}


function CheckAgree(){
  var grpl = $("input[name=array_info_no]").length;
  //배열 생성
  var grparr = new Array(grpl);
  var bio = new Array();
  var sel_type = null;
  //배열에 값 주입
    for(var i=0; i<grpl; i++){
      grparr[i] = $("input[name=array_info_no]").eq(i).val();
      var chk_radio = document.getElementsByName("policy_agree_"+grparr[i]);
      var info_title = document.getElementById('hidden_'+grparr[i]).value;
      var info_nece = document.getElementById('hidden_nece_'+grparr[i]).value;

      if($("input:radio[name='"+chk_radio+"']").is(":checked")==true){ // if 시작

      var yak_no = $(":input:radio[name='"+chk_radio+"']:checked").val();
      if(yak_no=='N'){
        alert('개인정보 수집 및 이용 미동의 시 참여 불가!');
        return false;
      }

  }else{ //else 시작

      alert('개인정보 수집 및 이용 동의 시 참여 가능!');
      return false;

  }

      return true;
  }
}
function IdPwCheck(){
  var userid = document.getElementById("userid");
  var pw = document.getElementById("password");
  var checkpw = document.getElementById("re_password");
    var regExp1 = /^[a-zA-Z0-9]{4,20}$/;
    //아이디와 비밀번호에 사용할 정규표현식
    var regExp2 = /^[a-zA-Z0-9]{4,32}$/;
    //비밀번호에 사용할 정규표현식
    if(userid.value == ""){ //ID가 공백일 경우 false 반환
        alert("ID를 입력해 주세요");
        document.getElementById("userid").focus();
        return false;
   }else if(!regExp1.test(userid.value)){ //아이디의 값을 검사해 true or false 반환
        alert("ID를 4~20자의 영문 대소문자와 숫자로만 입력해주세요");
        userid.value="";
        return false;
   }else if(pw.value != checkpw.value){ //비밀번호 확인이 다를 경우 false 반환
        alert("비밀번호와 비밀번호 확인을 다시 입력해주세요.");
        return false;
    }else if(pw.value == userid.value){ //아이디 비밀번호가 같을 경우 false 반환
        alert("아이디와 비밀번호를 다르게 만들어주세요.");
        return false;
    }else if(!regExp2.test(pw.value)){ //비밀번호 정규표현식 검사
        alert("비밀번호를 확인 후 다시 입력해 주세요.");
        pw.value="";
        return false;
    }else{
        return true;
    }
} //Id/Pw 검사 end

function SellName(){
  var name1 = document.getElementById("sell_name1");
  var name2 = document.getElementById("sell_name2");
  var busino = document.getElementById("sell_Busino");
    var nameCheck1 = RegExp(/^[가-힣a-zA-Z0-9]{2,60}$/);
    var nameCheck2 = RegExp(/^[가-힣]{2,16}$/);
    var businoCheck = RegExp(/^[0-9]{10}$/);

    if(name1.value == ""){
        alert("기업명을 입력해 주세요");
        return false;
   }else if(!nameCheck1.test(name1.value)){
        alert("기업명을 확인해 주세요.");
        name1.value = "";
        return false;
   }else if(name2.value == ""){
       alert("대표자를 입력해 주세요");
       return false;
  }else if(!nameCheck2.test(name2.value)){
       alert("대표자는 한글로 입력해 주세요.");
       name2.value = "";
       return false;
  }else if(busino.value == ""){
      alert("사업자등록번호를 입력해 주세요");
      return false;
 }else if(!businoCheck.test(busino.value)){
      alert("사업자등록번호를 숫자로 입력해 주세요.");
      busino.value = "";
      return false;
 }else{
        return true;
    }
}

function EmailCheck(){ //이메일 확인 함수
    var email = document.getElementById("email"); //usermail text 할당
     var bb = /^[\w]+@[\w]+.[\.\w]{2,5}$/; //이메일 규칙 정규표현식 /^:문자열 시작 표현 \w:영문 대소문자, 숫자 +:1회 이상 {2,5}:2번 이상 5번 이하 $/:문자열 마지막 표현
    if( !bb.test(email.value)){ //이메일 값을 정규표현식과 비교하여 true or false 반환
    alert("이메일을 다시 입력해주세요.");
    return false;
    }else{ //검사 통과시 true 반환
        return true;
    }
} //이메일 검사 end

function NumCheck(){
  var sell_tel1 = document.getElementById("sell_tel1");
  var sell_tel2 = document.getElementById("sell_tel2");
  var sell_Busino = document.getElementById("sell_Busino");
     var numck = RegExp(/^[0-9]+$/);
    if(!numck.test(sell_tel1.value)){
    alert("기업 대표번호는 숫자만 입력해 주세요.");
    return false;
  }else if(!numck.test(sell_tel2.value)){
    alert("대표자 전화번호는 숫자만 입력해 주세요.");
    return false;
  }else if(!numck.test(sell_Busino.value)){
    alert("사업자등록번호는 숫자만 입력해 주세요.");
    return false;
  }else{ //검사 통과시 true 반환
        return true;
    }
}
