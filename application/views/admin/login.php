
<!--Page-->
<div class="page ">
  <div class="page-content z-index-10">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-md-12 col-md-12 d-block mx-auto">
          <div class="card mb-0">
            <div class="card-header">
              <h3 class="card-title">Admin 로그인</h3>
            </div>
            <div class="card-body">
              <form action="/admin/auth/authentication" method="post">
                <div class="form-group">
                  <label class="form-label text-dark">ID</label>
                  <input type="text" class="form-control" name="user_id" placeholder="ID">
                </div>
                <div class="form-group">
                  <label class="form-label text-dark">비밀번호</label>
                  <input type="password" class="form-control" id="user_pw" name="user_pw" placeholder="비밀번호" autocomplete="on" />
                </div>
                <div class="form-group">
                <label class="custom-control custom-checkbox">
                  <a href="forgot-password.html" class="float-right small text-dark mt-1">비밀번호 찾기</a>
                  <input type="checkbox" class="custom-control-input">
                  <span class="custom-control-label text-dark">로그인 유지</span>
                </label>
              </div>
              <div class="form-footer mt-2">
                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light btn_register">로그인</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
