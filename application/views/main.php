
		<!--Sliders Section-->

		<section>
			<div class="banner1 relative slider-images">
				<div class="container-fuild">
					<!-- Carousel -->
					 <div class="owl-carousel testimonial-owl-carousel2 slider ">
						<div class="item" data-image-src="">
							<img alt="first slide" src="/static/lib/assets/theme/images/banners/slide-1.jpg" >
						</div>
						<div class="item">
							<img alt="first slide" src="/static/lib/assets/theme/images/banners/slide-2.jpg" >
						</div>
						<div class="item">
							<img alt="first slide" src="/static/lib/assets/theme/images/banners/slide-3.jpg" >
						</div>
					</div>
				</div>
			</div>
		</section>

		<!--Sliders Section-->

		<?php
		// echo "<pre>";
		// var_dump($all_product);
		// var_dump($thumnail_info);
		// var_dump($main_category_info);
		// var_dump($middle_category_info);
		// var_dump($sub_category_info);
		// var_dump($wishlist_info);
		// echo "</pre>";
		 ?>
		<!--Add listing-->
		<section class="sptb p-0">
			<?php if(isset($_SESSION['user_no']))
			{
				?>
			<input type="hidden" id="user_no" value="<?=$_SESSION['user_no']?>">
			<?php
		} ?>
			<div class="container">
				<hr>
				<h2 class="text-center">전체 상품</h2>
				<hr>
				<div class="row">
					<!--Add Lists-->
					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="tab-content">
							<!-- 세로 -->
							<div class="tab-pane active" id="tab-12">
								<div class="row">
								<?php
								for ($i=0; $i < count($all_product); $i++)
								{
								?>
									<div class="col-lg-4 col-md-12 col-xl-3">
										<div class="card overflow-hidden">
											<div class="item-card9-img">
												<div class="arrow-ribbon bg-primary"><?=$main_category_info[$i][0]['name']?></div>
												<div class="item-card9-imgs">
													<?php $product_no = $all_product[$i]['no'];  ?>
													<a href="/product/<?=$product_no?>"></a>
													<?php $img_src = $thumnail_info[$i][0]['fileURL'].$thumnail_info[$i][0]['filename'].'.'.$thumnail_info[$i][0]['fileExe']?>
													<img src="<?=$img_src?>" alt="img" class="cover-image">
												</div>
												<div class="item-card9-icons">
													<?php  if(isset($wishlist_info[$i][0]['product_no'])) { 	?>
														<button type="button" class="btn btn-icon text-white wishlist active" id="wishlist<?=$product_no?>" onclick="wishlistDelete(this,<?=$product_no?>)"><i class="fa fa fa-heart-o"></i></button>
													<?php
													}
													else
													{
													?>
													<button type="button" class="btn btn-icon text-white wishlist" id="wishlist<?=$product_no?>" onclick="wishlistAdd(this,<?=$product_no?>)"><i class="fa fa fa-heart-o"></i></button>
													<?php
													}?>
													<!-- <a href="#" class="item-card9-icons1 wishlist" onclick="wishlistAdd(<?=$product_no?>)"> <i class="fa fa fa-heart-o"></i></a> -->
													<?php  //위시리스트 데이터가 있을 경우?>
													<!-- <button type="button" class="btn btn-icon text-white wishlist active" onclick="wishlistDelete(<?=$product_no?>)"><i class="fa fa fa-heart-o"></i></button> -->
													<!-- <a href="#" class="item-card9-icons1 wishlist active" onclick="wishlistDelete(<?=$product_no?>)"> <i class="fa fa fa-heart-o"></i></a> -->
												</div>
											</div>
											<div class="card-body pb-0">
												<a href="/product/<?=$product_no?>" class="text-dark mt-2">
												<div class="item-card9">
													<?php
														if($middle_category_info[$i][0]['name'] == null || $middle_category_info[$i][0]['name'] == '')
														{ ?>
															<span><?=$main_category_info[$i][0]['name']?></span>
													<?php
														}
														else if($sub_category_info[$i][0]['name'] == null || $sub_category_info[$i][0]['name'] == '')
														{ ?>
															<span><?=$middle_category_info[$i][0]['name']?></span>
													<?php
														}
														else
														{ ?>
															<span><?=$sub_category_info[$i][0]['name']?></span>
													<?php
														}
													 ?>
													<?php
														$product_name = $all_product[$i]['name'];
														$name_length = mb_strlen ($product_name, "utf-8");
														// var_dump($name_length);
														if($name_length >15){
															$product_name = iconv_substr($product_name, 0, 14, "utf-8");
															$product_name =  mb_substr($product_name, '0', -1) . "...";
														}
													 ?>
													<h4 class="font-weight-semibold mt-1">[<?=$product_name?>]</h4>
													<?php
														$product_title = $all_product[$i]['title'];
														$title_length = mb_strlen ($product_title, "utf-8");
														// $product_title = iconv_substr($product_title, 0, 5, "utf-8");

														if($title_length >19){
															$product_title = iconv_substr($product_title, 0, 19, "utf-8");
														// var_dump($product_title);
														$product_title =  mb_substr($product_title, '0', -1) . "...";
														}
													 ?>
													<p><?=$product_title?></p>
												</div>
												</a>
											</div>
											<div class="card-footer ">
												<div class="item-card9-footer d-flex">
													<div class="item-card9-cost align-self-center">
														<strike><h4 class="text-dark font-weight-semibold mb-0 mt-0"><?=$all_product[$i]['price']?></h4></strike>
													</div>
													<div class="item-card9-cost ml-auto align-self-center">
														<?php
															$product_price = $all_product[$i]['price'] - $all_product[$i]['discount_price'];
														 ?>
														<b><h3 class="text-primary font-weight-semibold mb-0 mt-0"><?=$product_price?></h3></b>
													</div>
													<!-- <div class="ml-auto">
														<div class="rating-stars block">
															<input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="0" readonly>
															<div class="rating-stars-container">
																<div class="rating-star sm">
																	<i class="fa fa-star"></i>
																</div>
																<div class="rating-star sm">
																	<i class="fa fa-star"></i>
																</div>
																<div class="rating-star sm">
																	<i class="fa fa-star"></i>
																</div>
																<div class="rating-star sm">
																	<i class="fa fa-star"></i>
																</div>
																<div class="rating-star sm">
																	<i class="fa fa-star"></i>
																</div>
															</div>
														</div>
													</div> -->
												</div>
											</div>
										</div>
									</div>
								<?php
								}
							?>
								</div>
							</div>
							<!-- <div class="center-block text-center">
								<ul class="pagination mb-0">
									<li class="page-item page-prev disabled">
										<a class="page-link" href="#" tabindex="-1">Prev</a>
									</li>
									<li class="page-item active"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item page-next">
										<a class="page-link" href="#">Next</a>
									</li>
								</ul>
							</div> -->
						</div>
					</div>
					<!--/Add Lists-->

					<!--더보기 버튼 있어야 함 누르면 전체 카테고리로 이어지게--->
				</div>
			</div>
		</section>
		<!--/Add Listing-->

<script>
function wishlistAdd(argu,num)
{
	if($('#user_no').val() == null || $('#user_no').val() == '')
	{
		if(confirm('로그인 하시겠습니까?')){
			location.href='/login';
		}
	} else{
		<?php
		if(isset($_SESSION['user_no'])){
			$user_no =  $_SESSION['user_no'];
		}else{
			$user_no = '';
		}
		?>
	var user_no = '<?php echo $user_no; ?>';
	var wishlist_id = argu.id;
	console.log('user_no: '+user_no);
	console.log('product_no: '+num);
	$.post("/wishlist/wishlist/add", {
		'product_no' : num,
		'user_no' : user_no
		}, function(data){
		// console.log(data);
		if(data == 0){
			console.log('찜 실패');
			$('#'+wishlist_id).attr('class', 'btn btn-icon text-white wishlist');
			$('#'+wishlist_id).attr('onclick', 'wishlistAdd(this,'+num+')');
		}else{
			console.log('찜 성공');
			$('#'+wishlist_id).attr('class', 'btn btn-icon text-white wishlist active');
			$('#'+wishlist_id).attr('onclick', 'wishlistDelete(this,'+num+')');
		}
	});
}
}
function wishlistDelete(argu,num)
{
	if($('#user_no').val() == null || $('#user_no').val() == '')
	{
		if(confirm('로그인 하시겠습니까?')){
			location.href='/login';
		}
	} else
	{
		<?php
		if(isset($_SESSION['user_no'])){
			$user_no =  $_SESSION['user_no'];
		}else{
			$user_no = '';
		}
		?>
	var user_no = '<?php echo $user_no; ?>';
		var wishlist_id = argu.id;
		console.log('user_no: '+user_no);
		console.log('product_no: '+num);
		$.post("/wishlist/wishlist/delete", {
			'product_no' : num,
			'user_no' : user_no
		}, function(data){
			// console.log(data);
			if(data == 0){
				console.log('찜 삭제 실패');
				$('#'+wishlist_id).attr('class', 'btn btn-icon text-white wishlist active');
				$('#'+wishlist_id).attr('onclick', 'wishlistDelete(this,'+num+')');
			}else{
				console.log('찜 삭제 성공');
				$('#'+wishlist_id).attr('class', 'btn btn-icon text-white wishlist');
				$('#'+wishlist_id).attr('onclick', 'wishlistAdd(this,'+num+')');
			}
		});
	}
}

</script>