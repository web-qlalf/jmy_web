<!DOCTYPE html>
        <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <meta http-equiv="x-ua-compatible" content="IE=edge">
            		<meta name="msapplication-TileColor" content="#0f75ff">
            		<meta name="theme-color" content="#2ddcd3">
            		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
            		<meta name="apple-mobile-web-app-capable" content="yes">
            		<meta name="mobile-web-app-capable" content="yes">
            		<meta name="HandheldFriendly" content="True">
            		<meta name="MobileOptimized" content="320">
            		<!-- <link rel="icon" href="favicon.ico" type="image/x-icon"/> -->
            		<!-- <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /> -->

                <!-- Title -->
                <title>JMY</title>
                		<!-- Bootstrap Css -->
                		<link href="/static/lib/assets/theme/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" />

                		<!-- Dashboard Css -->
                		<link href="/static/lib/assets/theme/css/dashboard.css" rel="stylesheet" />

                		<!-- Font-awesome  Css -->
                		<link href="/static/lib/assets/theme/css/icons.css" rel="stylesheet"/>

                		<!--Horizontal Menu-->
                		<link href="/static/lib/assets/theme/plugins/Horizontal2/Horizontal-menu/dropdown-effects/fade-down.css" rel="stylesheet" />
                		<link href="/static/lib/assets/theme/plugins/Horizontal2/Horizontal-menu/horizontal.css" rel="stylesheet" />
                		<link href="/static/lib/assets/theme/plugins/Horizontal2/Horizontal-menu/color-skins/color.css" rel="stylesheet" />

                		<!--Select2 Plugin -->
                		<link href="/static/lib/assets/theme/plugins/select2/select2.min.css" rel="stylesheet" />

                		<!-- Cookie css -->
                		<link href="/static/lib/assets/theme/plugins/cookie/cookie.css" rel="stylesheet">

                		<!-- Owl Theme css-->
                		<link href="/static/lib/assets/theme/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" />

                		<!-- Custom scroll bar css-->
                		<link href="/static/lib/assets/theme/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

                		<!-- COLOR-SKINS -->
                		<link id="theme" rel="stylesheet" type="text/css" media="all" href="/static/lib/assets/theme/webslidemenu/color-skins/color10.css" />

                    <!-- JQuery js-->
                    <script src="/static/lib/assets/theme/js/vendors/jquery-3.2.1.min.js"></script>

                <style>
                    body{
                        padding-top:0px;
                    }
                    .form_control{
                        padding-top:20px;
                    }
                </style>
            </head>

            <body>
              <?php
                // echo "<pre>";
                // var_dump($sub_parent_info);
                // echo "</pre>";
               ?>
              <?php $this->lang->load('headtag_lang', 'korean'); ?>
                      		<div id="global-loader">
                      			<img src="/static/lib/assets/theme/images/products/products/loader.png" class="loader-img floating" alt="">
                      		</div>

                      		<!--Topbar-->
                      		<div class="header-main">
                      			<div class="top-bar">
                      				<div class="container">
                      					<div class="row">
                      						<div class="col-xl-8 col-lg-8 col-sm-4 col-7">
                      							<div class="top-bar-left d-flex">
                      								<div class="clearfix">
                      									<ul class="socials">
                                          <li>
                                            <a class="social-icon text-dark" href="/"><span>KKULBI</span></a>
                                          </li>
                      										<li>
                      											<a class="social-icon text-dark" href="#"><i class="fa fa-facebook"></i></a>
                      										</li>
                      										<li>
                      											<a class="social-icon text-dark" href="#"><i class="fa fa-twitter"></i></a>
                      										</li>
                      									</ul>
                      								</div>
                      							</div>
                      						</div>
                      						<div class="col-xl-4 col-lg-4 col-sm-8 col-5">
                      							<div class="top-bar-right">
                      								<ul class="custom">
                                        <?php
                                        if($this->session->userdata('logged_in')){
                                          ?>
                                        <li>
                        										<a href="#마이페이지" class="text-dark"><i class="fa fa-user-circle mr-1"></i> <span><?=$this->session->userdata('user_name')?>님 </span></a>
                        								</li>
                                        <li>
                        										<a href="/cart" class="text-dark"><i class=" fa fa-shopping-cart mr-1"></i> <span>장바구니</span></a>
                        								</li>
                                        <li>
                        										<a href="/myfavorite" class="text-dark"><i class="fa fa-heart-o mr-1"></i> <span>찜목록</span></a>
                        								</li>
                                        <li>
                        										<a href="/logout" class="text-dark"><i class="fa fa-sing-out mr-1"></i> <span>로그아웃</span></a>
                        								</li>

                                        <?php
                                      } else{
                                        ?>
                                        <li>
                                          <a href="/join" class="text-dark"><i class="fa fa-user mr-1"></i> <span>회원가입</span></a>
                                        </li>
                                        <li>
                                          <a href="/login" class="text-dark"><i class="fa fa-sign-in mr-1"></i> <span>로그인</span></a>
                                        </li>
                                      <?php } ?>
                      								</ul>
                      							</div>
                      						</div>
                      					</div>
                      				</div>
                      			</div>

                      			<!-- Mobile Header -->
                      			<div class="horizontal-header clearfix ">
                      				<div class="container">
                      					<a id="horizontal-navtoggle" class="animated-arrow"><span></span></a>
                      					<span class="smllogo"><img src="/static/lib/assets/theme/images/brand/logo.png" width="120" alt=""/></span>
                      					<a href="tel:245-6325-3256" class="callusbtn"><i class="fa fa-phone" aria-hidden="true"></i></a>
                      				</div>
                      			</div>
                      			<!-- /Mobile Header -->

                      			<div class="horizontal-main  bg-dark-transparent clearfix">
                              <!--dashboard.css 677줄 960px에서 992로 수정-->
                      				<div class="horizontal-mainwrapper  container clearfix">
                      					<div class="desktoplogo">
                      						<a href="/"><img src="/static/lib/assets/theme//images/brand/logo1.png" alt=""></a>
                      					</div>
                      					<div class="desktoplogo-1">
                      						<a href="/"><img src="/static/lib/assets/theme//images/brand/logo.png" alt=""></a>
                      					</div>
                      					<!--Nav-->
                      					<nav class="horizontalMenu clearfix d-md-flex">
                      						<ul class="horizontalMenu-list">
                      							<li aria-haspopup="true"><a href="#" class="active">Home <span class="fa fa-caret-down m-0"></span></a>
                      							</li>
                      							<li aria-haspopup="true"><a href="#">강아지사료</a></li>
                      							<li aria-haspopup="true"><a href="#">강아지간식</a></li>
                      							<li aria-haspopup="true"><a href="#">강아지용품</a></li>
                      							<li aria-haspopup="true"><a href="#">고양이사료</a></li>
                      							<li aria-haspopup="true"><a href="#">고양이간식</a></li>
                      							<li aria-haspopup="true"><a href="#">고양이용품</a></li>
                      							<li aria-haspopup="true"><a href="#">전체상품<span class="fa fa-caret-down m-0"></span></a>
                      								<div class="horizontal-megamenu clearfix">
                      									<div class="container">
                      										<div class="megamenu-content">
                      											<div class="row">
                                              <?php
                                                for ($i=0; $i < count($middle_parent_info); $i++) {
                                                  for ($k=0; $k <count($middle_parent_info[$i]) ; $k++) {
                                                    $middle_category_name= $middle_parent_info[$i][$k]['name'];
                                                    $middle_category_no= $middle_parent_info[$i][$k]['id'];
                                              ?>
                      												<ul class="col link-list">
                      													<li class="title"><?=$middle_category_name?></li>
                                                <?php
                                                for ($h=0; $h < count($sub_parent_info) ; $h++)
                                                {
                                                  for ($a=0; $a < count($sub_parent_info[$h]); $a++)
                                                  {
                                                    for ($s=0; $s < count($sub_parent_info[$h][$a]); $s++) {
                                                    $sub_category_name= $sub_parent_info[$h][$a][$s]['name'];
                                                    $sub_parent_no= $sub_parent_info[$h][$a][$s]['parent_id'];
                                                    $sub_no= $sub_parent_info[$h][$a][$s]['id'];
                                                  if($middle_category_no == $sub_parent_no)
                                                  {
                                                 ?>
                      													<li>
                      														<a href="/category/<?=$sub_no?>"><?=$sub_category_name?></a>
                      													</li>
                                              <?php }}}} ?>
                      												</ul>
                                              <?php
                                                }
                                              }
                                              ?>
                      												<!-- <ul class="col link-list">
                      													<li class="title">강아지 간식</li>
                                                <li>
                      														<a href="#">개껌</a>
                      													</li>
                      													<li>
                      														<a href="#">츄르</a>
                      													</li>
                      													<li>
                      														<a href="#">동결/건조간식</a>
                      													</li>
                      													<li>
                      														<a href="#">캔/파우치</a>
                      													</li>
                      													<li>
                      														<a href="#">저키/스틱</a>
                      													</li>
                      													<li>
                      														<a href="#">사사미</a>
                      													</li>
                      													<li>
                      														<a href="#">비스킷/시리얼</a>
                      													</li>
                      												</ul>
                                              <ul class="col link-list">
                      													<li class="title">강아지 용품</li>
                                                <li>
                      														<a href="#">건강관리</a>
                      													</li>
                      													<li>
                      														<a href="#">장난감</a>
                      													</li>
                      													<li>
                      														<a href="#">배변용품</a>
                      													</li>
                      													<li>
                      														<a href="#">식기/급수기</a>
                      													</li>
                      													<li>
                      														<a href="#">외출용품</a>
                      													</li>
                      												</ul>
                                              <ul class="col link-list">
                      													<li class="title">고양이 사료</li>
                                                <li>
                      														<a href="#">건식</a>
                      													</li>
                      													<li>
                      														<a href="#">습식</a>
                      													</li>
                      													<li>
                      														<a href="#">기능성</a>
                      													</li>
                      													<li>
                      														<a href="#">파우치 사료</a>
                      													</li>
                      												</ul>
                                              <ul class="col link-list">
                      													<li class="title">고양이 간식</li>
                                                <li>
                      														<a href="#">캔/파우치</a>
                      													</li>
                      													<li>
                      														<a href="#">사사미</a>
                      													</li>
                      													<li>
                      														<a href="#">동결/건조간식</a>
                      													</li>
                      													<li>
                      														<a href="#">캣닢 캣그라스</a>
                      													</li>
                      													<li>
                      														<a href="#">저키/스틱</a>
                      													</li>
                      													<li>
                      														<a href="#">사사미</a>
                      													</li>
                      												</ul>
                                              <ul class="col link-list">
                      													<li class="title">고양이 용품</li>
                                                <li>
                      														<a href="#">모래</a>
                      													</li>
                      													<li>
                      														<a href="#">장난감</a>
                      													</li>
                      													<li>
                      														<a href="#">실내용품</a>
                      													</li>
                      													<li>
                      														<a href="#">식기/급수기</a>
                      													</li>
                      												</ul> -->
                      											</div>
                      										</div>
                      									</div>
                      								</div>
                      							</li>
                      						</ul>

                      					</nav>
                      					<!--Nav-->
                      				</div>
                      			</div>
                      		</div>
                          <?php if($this->session->flashdata('message')){?>
                          <script>
                            alert('<?=$this->session->flashdata('message')?>');
                            console.log('aaa','<?=$this->session->flashdata('message')?>');
                            <?php unset( $_SESSION['message'] ); ?>
                          </script>
                          <?php
                        }else {
                          ?>
                          <script>
                          // alert('사라짐');
                          </script>
                        <?php  }
                        ?>
