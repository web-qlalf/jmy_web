	<?php
	// echo "<pre>";
	// var_dump($product_info);
	// var_dump($detail_info);
	// var_dump($option_name_info);
	// var_dump($option_detail_info);
	// var_dump($option_code_info);
	// var_dump($input_info);
	// var_dump($output_info);
	// var_dump($thumnais_info);
	// var_dump($category_info);
	// var_dump($wishlist_info);
	// $this->session->userdata('user_name')
	// echo "<pre>";
	$total_price = $product_info[0]['price']-$product_info[0]['discount_price'];
	 ?>
<!--Add listing-->
<section class="sptb">
	<div class="container">
		<input type="hidden" id="user_no" name="user_no" value="<?=$this->session->userdata('user_no')?>" />
		<input type="hidden" id="product_no" name="product_no" value="<?=$product_info[0]['no']?>" />
		<div class="row">
			<!--Classified Description-->
			<div class="col-xl-6 col-lg-6 col-md-12">
				<div class="card overflow-hidden">
					<div class="card-body">
						<div class="product-slider">
							<div class="clearfix">
								<div class="row">
									<div class="col-xl-12 col-lg-12 col-md-12">
										<div data-target="#carousel" data-slide-to="0" class="thumb text-center">
											<img class="thumb_main" src="<?=$thumnais_info[0]["fileURL"].$thumnais_info[0]["filename"].'.'.$thumnais_info[0]["fileExe"]?>" alt="img">
										</div>
									</div>
								</div>
								<br/>
								<div class="row">
									<div class="col col-xl-12 col-lg-12 col-md-12">
										<div class="row">
											<?php for ($i=0; $i < count($thumnais_info); $i++) { ?>
												<div class="thumb col-3">
													<a onclick="thumbnail_click(<?=$i?>)">
														<img class="thumb_bottom" src="<?=$thumnais_info[$i]["fileURL"].$thumnais_info[$i]["filename"].'.'.$thumnais_info[$i]["fileExe"]?>" alt="img">
													</a>
												</div>
											<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<div class="col-xl-6 col-lg-6 col-md-12">
				<div class="card">
					<div class="card-header" style="padding-top: 1em;">
						<h3><?=$product_info[0]['name']?></h3>
					</div>
					<div class="card-body">
						<p>
							<h4><?=$product_info[0]['title']?></h4>
						</p>
						<br/>
						<div class="col-xl-12 col-lg-12 col-md-12 p-0">
							<div class="row">
								<div class="col-4 p-0 m-0">
									<h4 class="text-gray text-center"><strike><?=$product_info[0]['price']?> 원</strike></h4>
									<h3 class="text-red text-center product_default_price"><b><?=$total_price?> 원</b></h3>
								</div>
								<div class="col-4 p-0 m-0">
									<!--후기 점수 별점 구간-->
									<?php
									$stars_value = 0;
									if($stars_value !== null || $stars_value !== '')
									{
									 ?>
									 <div class="row">
										 <span class="align-self-center rated-products-ratings">
												<i class="fa fa-star-o fa-2x text-warning"> </i>
												<i class="fa fa-star-o fa-2x text-warning"> </i>
												<i class="fa fa-star-o fa-2x text-warning"> </i>
												<i class="fa fa-star-o fa-2x text-warning"> </i>
												<i class="fa fa-star-o fa-2x text-warning"> </i>
											</span>
											<span class="align-self-end text-gray">
												<h3><b>&nbsp;(<?=$stars_value?>)</b></h3>
											</span>
									</div>
									<!-- <div class="rating-stars d-flex col-8 p-0 m-0">
										<input type="number" readonly="readonly" class="rated-value star" name="rating-stars-value" id="rating-stars-value" value="<?=$stars_value?>">
										<div class="rating-stars-container ">
											<div class="rating-star is--active">
												<i class="fa fa-star"></i>
											</div>
											<div class="rating-star is--active">
												<i class="fa fa-star"></i>
											</div>
											<div class="rating-star is--active">
												<i class="fa fa-star"></i>
											</div>
											<div class="rating-star">
												<i class="fa fa-star"></i>
											</div>
											<div class="rating-star">
												<i class="fa fa-star"></i>
											</div>
									 </div>

										<span class="align-self-center text-gray">
										<h3><b>&nbsp;<?=$stars_value?></b></h3>
										</span>
									</div> -->
								<?php } ?>
									<!--후기 점수 별점 구간-->
								</div>
								<div class="col-1 p-0 m-0">
									<?php
										$product_no = $product_info[0]['no'];
										if(isset($wishlist_info[0]['product_no']))
										{ 	?>
											<button type="button" class="btn btn-icon text-white wishlist active" id="wishlist<?=$product_no?>"  onclick="wishlistDelete(this,<?=$product_no?>)"><i class="fa fa fa-heart-o"></i></button>
										<?php
										}
									else
									{
									?>
										<button type="button" class="btn btn-icon text-white wishlist" id="wishlist<?=$product_no?>" onclick="wishlistAdd(this,<?=$product_no?>)"><i class="fa fa fa-heart-o"></i></button>
									<?php
									}?>
								</div>
								</div>

							</div>
						<br/>
						<!--배송비 선택 구간-->
						<div class="form-group">
							<h5>배송비: <?=$output_info[0]['delivery_fee1']?> 원</h5>
							<select name="country" id="select_delivery" class="form-control custom-select select_delivery" onchange="select_delivery();">
								<option value="0" selected="">배송비</option>
								<option value="1">선불</option>
								<option value="2">후불</option>
							</select>
							<div class="select_1 form-group">
								<input class="form-control delivery_payment" type="hidden" name="delivery_payment" value="" readonly/>
							</div>
						</div>
						<!--배송비 선택 구간-->

						<!--옵션 선택 구간-->
						<?php //echo $option_code_info[0][0]['name']; ?>
						<?php if($option_code_info[0][0]['name'] == '단품'){ ?>
									<table class="table table-striped">
								<thead>
									<th class="text-center" style="width: 30%">옵션</th>
	                <th class="text-center" style="width: 30%">수량</th>
	                <th class="text-center" style="width: 30%">추가가격</th>
	                <th class="text-center" style="width: 10%"></th>
								</thead>
								<tbody id="order_list">
									<tr class="order_detail text-center align-self-center" id="order_detail_<?=$option_code_info[0][0]["no"];?>">
										<td class="align-self-center" style="vertical-align: middle;">
											<span class="option_code_name"><?=$option_code_info[0][0]["name"];?></span>
											<input type="hidden" name="product_detail_no" value="<?=$detail_info[0]["no"];?>"  disabled/>
										</td>
										<td class="option_qty" style="vertical-align: middle;">
											<div class="row text-center align-self-center">
												<button type="button" class="btn btn-white col-1 text-center qtyMinus" onclick="qtySet('minus',<?=$option_code_info[0][0]["no"];?>)"><i class="fa fa-minus"></i></button>
												<input class="form-control col bg-blog-overlay3 text-center product_qty" type="text" name="product_qty[]" value="1" onblur="productQty(<?=$option_code_info[0][0]["no"];?>)" readonly disabled/>
												<button type="button" class="btn btn-white col-1 text-center qtyPlus" onclick="qtySet('plus',<?=$option_code_info[0][0]["no"];?>)"><i class="fa fa-plus"></i></button>
											</div>
										</td>
										<td class="text-center align-self-center option_price" style="vertical-align: middle;">
											<?php
											echo $option_code_info[0][0]["price"];
											?>
										</td>
										<td class="text-center align-self-center option_code_delete" style="vertical-align: middle;">
											<button type="button" onclick="optionDelete(<?=$option_code_info[0][0]["no"];?>)" class="btn col-2 option_delete"><i class="fa fa-close"></i></button>
										</td>
									</tr>
								</tbody>
								<tfoot>
									<th class="text-right" colspan="2" style="width: 80%"><h4>총 상품금액</h4></th>
									<th class="text-right" colspan="2" style="width: 20%"><h4><b><span class="total_price text-gray-dark "><?=$total_price?>원</span> </b></h4></th>
								</tfoot>
							</table>
						<?php }
						else
						{
						?>
							<!-- 옵션명들 -->
							<div class="form-group">
								<h5>
								<?php
								$count_opt = count($option_name_info);
								$count_last = count($option_name_info)-1;
								for ($i=0; $i < $count_opt; $i++) {
									if($i == $count_last){
								 ?>
								<?=$option_name_info[$i]['name']?>
							<?php }
							else
							{ ?>
								<?=$option_name_info[$i]['name'].' / '?>
							<?php }}?>

								</h5>
								<select name="opt_select" id="select_opt" class="form-control custom-select opt_select" onchange="select_opt();">
									<option value="0" selected="">선택</option>
									</i>
									<?php for ($i=0; $i < count($option_code_info); $i++) { ?>
										<option value="<?=$option_code_info[$i][0]['no']?>"><?=$option_code_info[$i][0]['name']?> <span clsss="add_price">(+<?=$option_code_info[$i][0]['price']?>)</span></option>
									<?php } ?>
								</select>
							</div>
							<!--옵션 선택 구간-->
							<div class="form-group" >
								<span class="select_guide text-primary"></span>
								<table class="table table-striped">
									<thead>
										<th class="text-center" style="width: 30%">옵션내용</th>
										<th class="text-center" style="width: 30%">수량</th>
										<th class="text-center" style="width: 30%">추가가격</th>
										<th class="text-center" style="width: 10%"></th>
									</thead>
									<tbody id="order_list">

									</tbody>
									<tfoot>
										<th class="text-right" colspan="2" style="width: 80%"><h4>총 상품금액</h4></th>
										<th class="text-right" colspan="2" style="width: 20%"><h4><b><span class="total_price text-gray-dark ">0원</span> </b></h4></th>
									</tfoot>
								</table>
							</div>
							<div class="form-group" id="order_list_before" style="display:none">
								<!--얘는 옵션이 더해질때마다 옵션1,옵션2,옵션3이 정해진다.
								그리고 최종 다른 주문이 선택되었을 경우, 다른 하나를 추가한다.
								(옵션 디테일과 코드를 잘 이용해야 함)-->

								<table class="table table-striped">
									<thead>
										<th class="text-center" style="width: 30%">옵션내용</th>
										<th class="text-center" style="width: 30%">수량</th>
										<th class="text-center" style="width: 30%">가격</th>
										<th class="text-center" style="width: 10%"></th>
									</thead>
									<tbody>
										<?php for ($i=0; $i < count($option_code_info); $i++) { ?>
											<tr class="order_detail text-center align-self-center" id="order_detail_<?=$option_code_info[$i][0]["no"];?>">
												<td class="align-self-center" style="vertical-align: middle;">
													<span class="option_code_name"><?=$option_code_info[$i][0]["name"];?></span>
													<input type="hidden" name="product_detail_no" value="<?=$detail_info[$i]["no"];?>"  disabled/>
												</td>
												<td class="option_qty" style="vertical-align: middle;">
													<div class="row text-center align-self-center">
														<button type="button" class="btn btn-white col-1 text-center qtyMinus" onclick="qtySet('minus',<?=$option_code_info[$i][0]["no"];?>)"><i class="fa fa-minus"></i></button>
														<input class="form-control col bg-blog-overlay3 text-center product_qty" type="text" name="product_qty[]" value="1" onblur="productQty(<?=$option_code_info[$i][0]["no"];?>)" readonly disabled/>
														<button type="button" class="btn btn-white col-1 text-center qtyPlus" onclick="qtySet('plus',<?=$option_code_info[$i][0]["no"];?>)"><i class="fa fa-plus"></i></button>
													</div>
												</td>
												<td class="text-center align-self-center option_price" style="vertical-align: middle;">
													<?php
													echo $option_code_info[$i][0]["price"];
													?>
												</td>
												<td class="text-center align-self-center option_code_delete" style="vertical-align: middle;">
													<button type="button" onclick="optionDelete(<?=$option_code_info[$i][0]["no"];?>)" class="btn col-2 option_delete"><i class="fa fa-close"></i></button>
												</td>
											</tr>
										<?php }  ?>
									</tbody>
								</table>
							</div>
						<?php } ?>
					</div>
					<div class="card-footer">
						<div class="btn-list">
							<div class="row">
								<button type="button" onclick="addCart()" class="btn btn-white btn-lg col-6">장바구니</button>
								<button type="button" onclick="StartOrder()"class="btn btn-red btn-lg col-6">구매하기</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 p-0">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">상세설명</h3>
				</div>
				<div class="card-body">
					<div class="mb-4">
						<?php
						$string = $product_info[0]['content'];
						$string = htmlspecialchars_decode($string);
						// $string = nl2br($string);
						// $string = htmlspecialchars($string);
						echo htmlspecialchars_decode($string);
						?>
					</div>
				</div>
				<hr class="mt-1 mb-1"/>
				<div class="card-header">
					<h3 class="card-title">상세옵션</h3>
				</div>
				<div class="card-body">
					<div class="mb-4">
						<div class="row">
							<div class="col-xl-12 col-md-12">
								<div class="table-responsive">
									<table class="table row table-borderless w-100 m-0 text-nowrap ">
										<tbody class="col-lg-12 col-xl-6 p-0">
											<?php if($option_code_info[0][0]['name'] == '단품'){ ?>
											<tr>
												<td>
													<span class="font-weight-bold"><?=$option_code_info[0][0]['name']?></span>
												</td>
											</tr>
											<?php } else{
													for ($i=0; $i < count($option_name_info); $i++) {
												?>
											<tr>
												<td>
													<span class="font-weight-bold"><?=$option_name_info[$i]['name']?> :</span> <?=$option_detail_info[$i][0]['name']?>
												</td>
											</tr>

										<?php } } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		</div>
	</div>

</div>
</div>
</section>
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

	function addCart(){
		if($('#user_no').val() == null || $('#user_no').val() == '')
		{
			if(confirm('로그인 하시겠습니까?')){
				location.href='/login';
			}
		} else{

			if(confirm('장바구니에 저장하시겠습니까?')){
				var order_list = $('#order_list');
				var list_count = order_list.children('tr').length;
				var product_detail_arr = [];
				var product_qty_arr= [];
				// console.log(list_count);
				for (var i = 0; i < list_count; i++) {
					var list_td_no = order_list.children('tr').eq(i).children('td');

					//수량
					//order_list.children('tr').eq(i).children('td').eq(1).children('div').children('input').val();
					// console.log('list_td_qty: '+ list_td_qty);

					product_detail_arr[i] = list_td_no.children('input').val();
					product_qty_arr[i] = list_td_no.eq(1).children('div').children('input').val();
				}
				console.log('product_detail_arr: '+product_detail_arr);
				console.log('product_qty_arr: '+product_qty_arr);

				var user_no = $('#user_no').val();
				var product_no = $('#product_no').val();

				$.post("/user/cart/addCart", {
					'user_no' : user_no,
					'product_no' : product_no,
					'qty' : product_qty_arr,
					'product_detail_no' : product_detail_arr
				}, function(data){
					console.log(data);
					if(data == 0){
						console.log('장바구니 등록 성공');
						if(confirm('장바구니로 이동하시겠습니까?')){
							location.href = '/cart';
						}else{
							console.log('장바구니 이동 안 함');
						}
					}else{
						// console.log('이미 장바구니에 등록된 상품입니다.');
						alert('이미 장바구니에 등록된 상품입니다.');
					}
				});
			}else{

			}
		}
	}
	function StartOrder(){
		if($('#user_no').val() == null || $('#user_no').val() == '')
		{
			if(confirm('로그인 하시겠습니까?')){
				location.href='/login';
			}
		} else{
			if(confirm('구매하시겠습니까?')){
				//상품이미지
				//상품명
				//수량
				//상품금액
				//주문금액/배송비
				//배송비결제
				var select_delivery = $('#select_delivery option:selected').val();
				var user_no = $('#user_no').val();
				var product_no = $('#product_no').val();
				// console.log('select_delivery: '+select_delivery);
				var item_count = $('#order_list').children('tr').length;
				var tr_parent = $('#order_list');
				var detail_no = [];
				var product_qty = [];

				for (var i = 0; i < item_count; i++) {
					var tr_id = tr_parent.children('tr').eq(i).attr('id');
					detail_no[i] = $('#'+tr_id).find('input:hidden[name="product_detail_no"]').val();
					product_qty[i] = $('#'+tr_id).find('.product_qty').val();
					// console.log('tr_id: '+tr_id);
					// console.log('detail_no: '+detail_no[i]);
				}
				var total_price = $('.total_price').text();
				total_price = total_price.replace('원','');
				total_price = parseInt(total_price);
				// console.log(total_price);

				var form = document.createElement("form");

				 form.setAttribute("charset", "UTF-8");
				 form.setAttribute("method", "Post");  //Post 방식
				 form.setAttribute("action", "/order"); //요청 보낼 주소

				var total_price2= document.createElement("input");
					total_price2.setAttribute("type","hidden");
					total_price2.setAttribute("name","total_price");
					total_price2.setAttribute("value", total_price);
					form.appendChild(total_price2);

				var product_qty2= document.createElement("input");
					product_qty2.setAttribute("type","hidden");
					product_qty2.setAttribute("name","product_qty");
					product_qty2.setAttribute("value", product_qty);
					form.appendChild(product_qty2);

				var detail_no2= document.createElement("input");
					detail_no2.setAttribute("type","hidden");
					detail_no2.setAttribute("name","detail_no");
					detail_no2.setAttribute("value", detail_no);
					form.appendChild(detail_no2);
				var select_delivery2= document.createElement("input");
					select_delivery2.setAttribute("type","hidden");
					select_delivery2.setAttribute("name","delivery_method");
					select_delivery2.setAttribute("value", select_delivery);
					form.appendChild(select_delivery2);

					$(document.body).append(form);
				form.submit();
			}
		}

	}

	function thumbnail_click(num){
    var click_src = $('.thumb_bottom').eq(num).attr("src");
    var main_img = $('.thumb_main');
    main_img.attr('src', click_src);
  }

	function productQty(num){
		var qty = $('.product_qty').eq(num).val();
		if(qty >1000){
			--qty
			$('.product_qty').eq(num).val(qty);
			$('.select_guide').eq(num).text('최대 구매수량은 1000개입니다.');
			$('.qtyPlus').eq(num).attr('disabled', true);
			$('.qtyMinus').eq(num).attr('disabled', false);
		}
	}
	function qtySet(set,num){
		var tr_id = $('#order_detail_'+num);
		var qty = tr_id.find('.product_qty').val();
		switch (set) {
			case 'minus':
					if(qty > 1){
						--qty;
						tr_id.find('.product_qty').val(qty);
						$('.select_guide').text('');
						tr_id.find('.qtyMinus').attr('disabled', false);
						tr_id.find('.qtyPlus').attr('disabled', false);
						var add_price = tr_id.find('.option_price').text();
						var default_price = '<?php echo $total_price; ?>';
						var total_price = $('.total_price').text();

						var product_price = (parseInt(default_price)+parseInt(add_price)); //옵션포함가
						var total = parseInt(total_price)-product_price;
						// console.log('add_price: '+add_price);
						// console.log('qty: '+qty);
						// console.log('default_price: '+default_price);
						// console.log('total_price: '+total_price);
						// console.log('total: '+total);
						$('.total_price').text(total);
					}else{
						$('.select_guide').text('옵션당 최소 구수량은 1 개입니다.');
						tr_id.find('.qtyMinus').attr('disabled', true);
						tr_id.find('.qtyPlus').attr('disabled', false);
						tr_id.find('.product_detail_no').attr('disabled', false);
					}

				break;
			case 'plus':
					if(qty > 0 && qty < 1000){
						++qty;
						tr_id.find('.product_qty').val(qty);
						$('.select_guide').text('');
						tr_id.find('.qtyMinus').attr('disabled', false);
						tr_id.find('.qtyPlus').attr('disabled', false);
						var add_price = tr_id.find('.option_price').text();
						var default_price = '<?php echo $total_price; ?>';
						var total_price = $('.total_price').text();

						var product_price = (parseInt(default_price)+parseInt(add_price)); //옵션포함가
						var total = parseInt(total_price)+product_price;
						// console.log('add_price: '+add_price);
						// console.log('qty: '+qty);
						// console.log('default_price: '+default_price);
						// console.log('total_price: '+total_price);
						// console.log('total: '+total);
						$('.total_price').text(total);
					}else if(qty >1000){
						--qty
						tr_id.find('.product_qty').val(qty);
					$('.select_guide').text('옵션당 최대 구매수량은 1000개입니다.');
						$tr_id.find('.qtyMinus').attr('disabled', false);
						tr_id.find('.qtyPlus').attr('disabled', true);
						tr_id.find('.product_detail_no').attr('disabled', false);
					}
				break;

		}
	}
	function optionDelete(num){
		var optionName = $('.product_option_name').eq(num).val();
		if(optionName == '단품'){
			$('.select_guide').eq(num).text('단품은 삭제할 수 없습니다.');
			console.log('클릭');
		}else{
			var order_detail = $("#order_list #order_detail_"+num);

			var add_price = order_detail.find('.option_price').text();
			var product_qty = order_detail.find('.product_qty').val();
			var total_price = $('.total_price').text();
			var default_price = '<?php echo $total_price; ?>';


			var product_price = (parseInt(default_price)+parseInt(add_price))*product_qty; //옵션포함가
			var total = parseInt(total_price)-product_price;
			console.log('total: '+total);
			console.log('product_qty: '+product_qty);
			console.log('add_price: '+add_price);
			console.log('order_detail: '+order_detail.attr('id'));
			$('.total_price').text(total);

			order_detail.remove();

			// console.log(add_price);
			// console.log(product_qty);
		}
	}

	function select_delivery(){
		var delivery_method = $('.select_delivery option:selected').val();
		var delivery_fee = <?=(int)$output_info[0]['delivery_fee1']?>;
		var product_solo = '<?=$option_code_info[0][0]['name']?>';
		var total_price = <?=$total_price?>;
		var qty = $('.product_qty').val();
		if(delivery_method == 0)
		{
			alert('배송결제 방법을 선택하세요.');
			$('.total_price').text('');
		}
		else if(delivery_method == 1)
		{
			$('.delivery_payment').val(delivery_method);
			if(product_solo == '단품')
			{
				var default2 = parseInt($('.total_price').text());
				$('.total_price').text(parseInt(total_price)*qty+parseInt(delivery_fee));
			}
			else
			{
				$('.total_price').text(delivery_fee);
			}
		}
		else
		{
			$('.delivery_payment').val(delivery_method);
			if(product_solo == '단품')
			{
				$('.total_price').text(parseInt(total_price)*qty);
			}
			else
			{
				$('.total_price').text('0');
			}
		}

	}
	//장바구니나 구매하기 버튼을 누를 때 검증 함수 하나 있어야 함. (이유: 배송비 선택값이 0일 경우 안내멘트 go)


  function select_opt(){
    var selected_value = $("#select_opt option:selected").val();
    var select_delivery = $("#select_delivery option:selected").val();
    var selected_text = $("#select_opt option:selected").text();
    var order_list_before = $("#order_list_before");
		var order_detail = $("#order_detail_"+selected_value);
		var clone = order_detail.clone();
		var total_price = $('.total_price').text();
		var default_price = '<?php echo $total_price; ?>';
		var test = $('#order_list #order_detail_'+selected_value).length;

		console.log(test);
		if(select_delivery == 0){
			alert('배송비 결제 방법을 선택하세요.');
			console.log($("#select_opt option").eq(0).val());
			$("#select_opt option").attr('selected',false);
			$("#select_opt option").eq(0).attr('selected',true);
		}else if(select_delivery == 1){
			$("#select_delivery").attr('disabled',true);
			if(test == 0){
				clone.find('.product_qty').attr('disabled', false);
				var add_price = clone.find('.option_price').text();
				var product_qty = clone.find('.product_qty').val();

				var total = parseInt(total_price)+((parseInt(default_price)+parseInt(add_price))*product_qty);
				$('#order_list').append(clone);
				$('.total_price').text(total+'원');
			}else{
				console.log('중복');
			}
		}else{
			$("#select_delivery").attr('disabled',true);
			if(test == 0){
				clone.find('.product_qty').attr('disabled', false);
				var add_price = clone.find('.option_price').text();
				var product_qty = clone.find('.product_qty').val();
				var total = parseInt(total_price)+((parseInt(default_price)+parseInt(add_price))*product_qty);
				$('#order_list').append(clone);
				$('.total_price').text(total+'원');
			}else{
				console.log('중복');
			}
		}


  }
</script>
