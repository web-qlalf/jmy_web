<!--Sliders Section-->
<section>
  <div class="bannerimg cover-image bg-background3" data-image-src="../assets/images/banners/banner2.jpg">
    <div class="header-text mb-0">
      <div class="container">
        <div class="text-center text-white">
          <h1 class="">Login</h1>
          <ol class="breadcrumb text-center">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">Login</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/Sliders Section-->

<!--Login-Section-->
<section class="sptb">
  <div class="container customerpage">
    <div class="row">
      <div class="single-page" >
        <div class="col-lg-5 col-xl-4 col-md-6 d-block mx-auto">
          <div class="wrapper wrapper2">
            <form id="login" action="/user/auth/login" class="card-body" tabindex="500" method="POST">
              <h3>로그인</h3>
              <div class="user_email">
                <input type="email" name="user_email">
                <label>이메일</label>
              </div>
              <div class="user_password">
                <input type="password" name="user_password">
                <label>비밀번호</label>
              </div>
              <div class="submit">
                <button type="submit" class="btn btn-primary btn-block">로그인</button>
              </div>
              <p class="mb-2"><a href="#비밀번호찾기">비밀번호 찾기</a></p>
              <p class="text-dark mb-0">아직 회원이 아니신가요?<a href="/user/join" class="text-primary ml-1">회원가입</a></p>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/Login-Section-->
