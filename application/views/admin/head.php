<!DOCTYPE html>
        <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <meta http-equiv="x-ua-compatible" content="IE=edge">
            		<meta name="msapplication-TileColor" content="#0f75ff">
            		<meta name="theme-color" content="#9d37f6">
            		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
            		<meta name="apple-mobile-web-app-capable" content="yes">
            		<meta name="mobile-web-app-capable" content="yes">
            		<meta name="HandheldFriendly" content="True">
            		<meta name="MobileOptimized" content="320">
            		<!-- <link rel="icon" href="favicon.ico" type="image/x-icon"/> -->
            		<!-- <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /> -->
              <!-- <script src="/static/lib/assets/theme/js/vendors/jquery-3.2.1.min.js" type="text/javascript"></script> -->

              <script src="http://code.jquery.com/jquery.js" type="text/javascript"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
              <!-- Index Scripts -->
              <script src="/static/lib/assets/theme/js/index2.js" type="text/javascript"></script>

              <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" type="text/javascript"></script> -->
                <!-- Title -->
              <title>JMY</title>
              <link rel="stylesheet" href="/static/lib/assets/theme/fonts/fonts/font-awesome.min.css">

          		<!-- Sidemenu Css -->
          		<link href="/static/lib/assets/theme/plugins/toggle-sidebar/sidemenu.css" rel="stylesheet" />

          		<!-- Bootstrap Css -->
          		<link href="/static/lib/assets/theme/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" />

          		<!-- Dashboard Css -->
          		<link href="/static/lib/assets/theme/css/dashboard.css" rel="stylesheet" />
          		<link href="/static/lib/assets/theme/css/admin-custom.css" rel="stylesheet" />

              <!-- WYSIWYG Editor css -->
              <link href="/static/lib/assets/theme/plugins/wysiwyag/richtext.css" rel="stylesheet" />

          		<!-- Custom scroll bar css-->
          		<link href="/static/lib/assets/theme/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

          		<!---Font icons-->
          		<link href="/static/lib/assets/theme/css/icons.css" rel="stylesheet"/>
          		<link href="/static/lib/assets/theme/plugins/iconfonts/icons.css" rel="stylesheet" />



              <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">



            </head>

            <body class="app sidebar-mini">

              <?php $this->lang->load('headtag_lang', 'korean'); ?>
                  <div id="global-loader">
                    <img src="/static/lib/assets/theme/images/products/products/loader.png" class="loader-img floating" alt="">
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
                        <div class="page">
                    			<div class="page-main">
                    				<div class="app-header1 header py-1">
                    					<div class="container-fluid">
                    						<div class="d-flex">
                    							<a class="header-brand" href="/admin">
                    								<img src="/static/lib/assets/theme/images/brand/logo.png" class="header-brand-img" alt="Claylist logo">
                    							</a>
                    							<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
                    							<!-- <div class="header-navicon">
                    								<a href="#" data-toggle="search" class="nav-link d-lg-none navsearch-icon">
                    									<i class="fa fa-search"></i>
                    								</a>
                    							</div> -->
                    							<!-- <div class="header-navsearch">
                    								<a href="#" class=" "></a>
                    								<form class="form-inline mr-auto">
                    									<div class="nav-search">
                    										<input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" >
                    										<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    									</div>
                    								</form>
                    							</div> -->
                                  <?php if(isset($_SESSION['user_id'])){  ?>
                    							<div class="order-lg-2 ml-auto">
                                    <div class="row">

                                    <a href="/admin/user/detail/<?=$_SESSION['user_no']?>" class="nav-link pr-0 leading-none user-img pt-4">
                                      <?=$_SESSION['user_id'];?>
                                    </a>
                                    <a href="/admin/logout" class="nav-link pr-0 leading-none user-img pt-4">
                                      로그아웃
                                    </a>
                                  </div>
                                  </div>
                                  <?php }else{  ?>
                    							<div class="order-lg-2 ml-auto">
                                    <div class="row">
                                    <a href="/admin/login" class="nav-link pr-0 leading-none user-img pt-4">
                                      로그인
                                    </a>
                                  </div>
                                  </div>
                                  <?php }?>
                    								<!-- <div class="dropdown ">
                    								   //$_SESSION['user_id'];
                    								</div>
                    								<div class="dropdown ">
                    									<a href="#" class="nav-link pr-0 leading-none user-img pt-3" data-toggle="dropdown">
                    										//$_SESSION['user_id'];
                    									</a>
                    									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
                    										<a class="dropdown-item" href="profile.html">
                    											<i class="dropdown-icon icon icon-user"></i> My Profile
                    										</a>
                    										<a class="dropdown-item" href="emailservices.html">
                    											<i class="dropdown-icon icon icon-speech"></i> Inbox
                    										</a>
                    										<a class="dropdown-item" href="editprofile.html">
                    											<i class="dropdown-icon  icon icon-settings"></i> Account Settings
                    										</a>
                    										<a class="dropdown-item" href="login.html">
                    											<i class="dropdown-icon icon icon-power"></i> Log out
                    										</a>
                    									</div>
                    								</div> -->
                    						</div>
                    					</div>
                    				</div>
