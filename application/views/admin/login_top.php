<!doctype html>
<html dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-TileColor" content="#0f75ff">
	   <meta name="theme-color" content="#9d37f6">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <!-- <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" /> -->

    <!-- Title -->
  	<title>JMY</title>
  	<link rel="stylesheet" href="/static/lib/assets/theme/fonts/fonts/font-awesome.min.css">

  	<!-- Bootstrap Css -->
  	<link href="/static/lib/assets/theme/plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" />

  	<!-- Sidemenu Css -->
  	<link href="/static/lib/assets/theme/plugins/toggle-sidebar/sidemenu.css" rel="stylesheet" />


  	<!-- Dashboard css -->
  	<link href="/static/lib/assets/theme/css/dashboard.css" rel="stylesheet" />
  	<link href="/static/lib/assets/theme/css/admin-custom.css" rel="stylesheet" />

  	<!-- c3.js Charts Plugin -->
  	<link href="/static/lib/assets/theme/plugins/charts-c3/c3-chart.css" rel="stylesheet" />

  	<!---Font icons-->
  	<link href="/static/lib/assets/theme/css/icons.css" rel="stylesheet"/>

</head>
	<body class="construction-image">
    <?php $aaaa= $this->session->flashdata('message');
    echo $aaaa;?>
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
    console.log('로그 메시지 없음');
    </script>
  <?php  }
  ?>
		<!--Loader-->
		<div id="global-loader">
			<img src="/static/lib/assets/theme/images/products/products/loader.png" class="loader-img floating" alt="">
		</div>
