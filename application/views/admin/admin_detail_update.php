<?php  //var_dump($user_info) ;?>
<form action="/admin/user/update" method="post">
  <div class="row row-cards">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title"><b>Admin 계정 정보 수정</b></div>
        </div>
        <div class="card-body">
          <div class="form-group ">
            <label class="form-label">ID</label>
            <input type="text" class="form-control w-100" name="user_id"  placeholder="ID" value="<?=$user_info[0]['id']?>" required>
          </div>
          <div class="form-group ">
            <label class="form-label">이름</label>
            <input type="text" class="form-control w-100" name="user_name"  placeholder="이름" value="<?=$user_info[0]['name']?>" required>
          </div>

          <div class="form-group ">
            <label class="form-label">이메일</label>
            <input type="email" class="form-control w-100" name="user_email"  placeholder="이메일" value="<?=$user_info[0]['email']?>" required>
          </div>
          <div class="form-group ">
            <label class="form-label">연락처</label>
            <input type="text" class="form-control w-100" name="user_tel"   placeholder="01022225555" value="<?=$user_info[0]['tel']?>" required>
          </div>
          <div class="form-group ">
            <label class="form-label">직급</label>
            <select class="form-control select2 position_select" name="position_select"   data-placeholder="Choose Browser" disabled>
              <option value="0" selected>선택</option>
              <option value="1">admin</option>
              <option value="2">판매/상품관리</option>
              <option value="3">고객관리</option>
              <option value="4">CMS</option>
            </select>
            <input type="hidden" id="position_val" name="position_val" value="" />
          </div>
        </div>
        <hr class="p-0 m-0" />
        <div class="card-header">
          <div class="card-title"><b>본인확인 질문</b></div>
        </div>
        <div class="card-body">
          <div class="form-group ">
            <label class="form-label" name="admin_question_01" >01. 기억에 남은 선물은?</label>
            <input type="text" name="admin_answer_01" class="form-control w-100" value="<?=$user_info[0]['answers1']?>" maxlength="20"/>
          </div>
          <div class="form-group ">
            <label class="form-label" name="admin_question_02" >02. 좋아하는 색은?</label>
            <input type="text" name="admin_answer_02" class="form-control w-100" value="<?=$user_info[0]['answers2']?>" maxlength="20"/>
          </div>
          <div class="form-group ">
            <label class="form-label" name="admin_question_03" >03. 계정 이메일</label>
            <input type="email" name="admin_answer_03" class="form-control w-100" value="<?=$user_info[0]['answers3']?>"/>
          </div>
        </div>
        <div class="card-header">
          <div class="card-title"><b>Admin 비밀번호 확인</b></div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label class="form-label">비밀번호</label>
            <input type="password" class="form-control w-100" name="admin_password" required>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary waves-effect waves-light">수정하기</button>
        </div>
      </div>
    </div>
  </div>
</form>
<script>
var position_select_val = '<?php echo $user_info[0]['position']; ?>';
position_select_val = parseInt(position_select_val);
$('#position_val').val(position_select_val);
switch (position_select_val) {
  case 1:
    $('.position_select option').eq(1).attr('selected', true);
    break;
  case 2:
    $('.position_select option').eq(2).attr('selected', true);
    break;
  case 3:
    $('.position_select option').eq(3).attr('selected', true);
    break;
  case 4:
    $('.position_select option').eq(4).attr('selected', true);
    break;
}
</script>
