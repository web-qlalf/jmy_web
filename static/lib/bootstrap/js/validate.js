function IdPwCheck(){
  var userid = document.getElementById("userid");
    var engNum = /^[a-zA-Z0-9]{4,20}*$/;
    if(userid.value == ""){ //ID가 공백일 경우 false 반환
        alert("ID를 입력해 주세요");
        document.getElementById();
        return false;
   }else if(!regExp1.test(userid.value)){ //아이디의 값을 검사해 true or false 반환
        alert("ID를 4~20자의 영문 대소문자와 숫자로만 입력해주세요");
        userid.value="";
        return false;
   }else{
        return true;
    }
} //Id/Pw 검사 end
