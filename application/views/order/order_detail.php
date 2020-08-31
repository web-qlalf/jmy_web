<?php $order_title = $this->lang->line('order_title');?>
<?php $order_user_info = $this->lang->line('order_user_info');?>
<?php $order_info_contents = $this->lang->line('order_info_contents');?>
<?php
// echo "<pre>";
// echo "order_info <br />";
// var_dump($order_info);
// echo "order_detail_info <br />";
// var_dump($order_detail_info);
// echo "product_info <br />";
// var_dump($product_info);
// echo "thumnail_info <br />";
// var_dump($thumnail_info);
// echo "option_code_info <br />";
// var_dump($option_code_info);
// echo "output_info <br />";
// var_dump($output_info);
// echo "</pre>";
?>
  <div class="col-xl-10 col-lg-12 col-md-12 mt-0 p-0">
    <div class="card mb-0 ">
      <div class="card-header">
        <h3 class="card-title">주문상세</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive border-top">
          <input type="hidden" id="user_no" name="user_no" value="<?=$this->session->userdata('user_no')?>" />
          <!-- 회원고유번호 -->
          <table class="table table-bordered table-hover text-nowrap">
            <thead>
              <tr class="text-center">
                <th class="col-md-2" style="width: 10%">상품이미지</th>
                <th style="width: 15%">상품명</th>
                <th style="width: 15%">상세옵션</th>
                <th style="width: 12%">수량</th>
                <th style="width: 10%">상품금액</th>
                <th style="width: 10%">주문금액</th>
                <th style="width: 10%">배송비</th>
                <th style="width: 10%">배송비결제</th>
              </tr>
            </thead>
            <tbody>
            <?php
            if(isset($order_detail_info)){
            for ($i=0; $i < count($order_detail_info); $i++)
            {
            ?>
              <tr id="order_detail_no_<?=$order_detail_info[$i]['no']?>">
                <td class="text-center" style="vertical-align: middle;">
                  <a href="#">
                    <img src="<?=$thumnail_info[$i][0]['fileURL'].$thumnail_info[$i][0]['filename'].'.'.$thumnail_info[$i][0]['fileExe']?> " alt="img">
                  </a>
                  <input type="hidden" class="product_no" value="<?=$product_info[$i][0]['no']?>">
                </td>
                <td class="text-left ml-1"style="vertical-align: middle;">
                  <div class="card-item-desc p-0">
                    <a href="#" class="text-dark">
                      <h6 class="font-weight-semibold"><?=$product_info [$i][0]['title']?></h6>
                      <h6 class="font-weight-semibold">[<?=$product_info [$i][0]['name']?>]</h6>
                    </a>
                  </div>
                </td>
                <td style="vertical-align: middle;">
                  <div class="media-body" >
                    <span>
                      <h6 class="font-weight-semibold text-center"><?=$option_code_info[$i][0]['name']?></h6>
                    </span>
                  </div>
                </td>
                <td class="font-weight-semibold fs-16 text-center" style="vertical-align: middle;">
                  <?php $qty = $order_detail_info[$i]['qty']; ?>
                  <input class="form-control col bg-blog-overlay3 text-center product_qty" type="text" name="product_qty[]" value="<?=$qty?>" readonly />
                </td>
                <td class="font-weight-semibold fs-16 text-center" style="vertical-align: middle;">
                  <span class="product_price">
                  <?php $product_price =  (int)$product_info[$i][0]['price']-(int)$product_info [$i][0]['discount_price']+(int)$option_code_info[$i][0]['price']; ?>
                  <?=$product_price?>
                  </span>
                  원
                </td>
                <td class="font-weight-semibold fs-16 text-center" style="vertical-align: middle;">
                  <?php
                  $total_price = $product_price * $qty;
                  ?>
                  <span class="total_price">
                    <?=$total_price?>
                  </span>
                  원
                </td>
                <td class="font-weight-semibold fs-16 text-center" style="vertical-align: middle;">
                  <span class="delivery_price">
                  <?=$output_info [$i][0]['delivery_fee1']?>
                  </span>
                  원
                </td>
                <td class="font-weight-semibold fs-16 text-center" style="vertical-align: middle;">
                  <select name="delivery_method_select" id="select_delivery_<?=$order_detail_info[$i]['no']?>" class="form-control custom-select select_delivery" disabled>
                    <?php
                      if($order_detail_info[$i]['delivery_method'] == 1)
                      {
                      ?>
                      <option value="1" selected="" >선불</option>
                    <?php
                      }
                      else
                      {
                      ?>
                        <option value="2" selected="" >후불</option>
                    <?php
                      }
                     ?>
                  </select>
                  <input type="hidden" class="delivery_method" name="delivery_method[]" value="<?=$order_detail_info[$i]['delivery_method']?>" readonly required />
                </td>
              </tr>
            <?php }
          }?>
          </tbody>
          </table>

        </div>
      </div>
    </div>

    <div class="card mb-0 mt-4">
      <div class="card-header">
        <h3 class="card-title">주문서</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive border-top">
          <table class="table table-bordered table-hover text-nowrap">
            <thead>
              <th class="text-left fs-16" colspan="8">전체합계</th>
            </thead>
            <tbody>
            <?php if(isset($order_detail_info))
            {

              ?>
              <tr>
                <td colspan="6" class="text-right">상품수</td>
                <td colspan="2" class="text-right"><span class="select_count"><?=count($order_detail_info)?></span>개</td>
              </tr>
              <tr>
                <td colspan="6" class="text-right">상품금액</td>
                <td colspan="2" class="text-right"><span class="all_product_price"></span>원</td>
              </tr>

              <tr>
                <td colspan="6" class="text-right">배송비</td>
                <td colspan="2" class="text-right"><span class="all_delivery_price"></span>원</td>
              </tr>

              <tr>
                <td colspan="6" class="text-right">주문금액</td>
                <td colspan="2" class="text-right"><span class="all_total_price"></span>원</td>
              </tr>
            <?php }
            else
            {  ?>
              <tr>
                <td colspan="6" class="text-right">상품수</td>
                <td colspan="2" class="text-right"><span class="select_count"></span><?=count($product_qty)?>개</td>
              </tr>
              <tr>
                <td colspan="6" class="text-right">상품금액</td>
                <td colspan="2" class="text-right"><span class="all_product_price">
                  <?php $total_price3=0;
                  // var_dump($total_price2);
                  for ($i=0; $i < count($total_price2); $i++)
                  {
                    $total_price3 = $total_price3 + $total_price2[$i];
                  } ?>
                  <?=$total_price3?>
                </span>원</td>
              </tr>
              <tr>
                <td colspan="6" class="text-right">배송비</td>
                <td colspan="2" class="text-right"><span class="all_delivery_price"><?=$output_info[0]['delivery_fee1']?></span>원</td>
              </tr>
              <tr>
                <td colspan="6" class="text-right">주문금액</td>
                <td colspan="2" class="text-right"><span class="all_total_price"><?=$all_total_price?></span>원</td>
              </tr>
            <?php  } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php if(isset($order_detail_info))
    { ?>
        <form id="formdata">
            <div class="row mt-4 ml-0 mr-0">
              <div class="card mb-0">
                <div class="card-header">
                  <h3 class="card-title">주문자정보</h3>
                </div>
                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-12 col-xl-4">
                      <div class="form-group">
                        <label class="form-label">주문자</label>
                        <input type="text" class="form-control" id="order_name" value="<?=$order_info [0]['order_name']?>"placeholder="주문자" readonly>
                      </div>
                    </div>
                    <div class="form-group col-md-12 col-xl-4">
                      <div class="form-group">
                        <label class="form-label">주문자 연락처 1</label>
                        <input type="text" class="form-control" id="order_tel1" placeholder="010-1234-5678" onblur="telOnblur(this.id)" maxlength="11" minlength="10" value="<?=$order_info [0]['order_tel1']?>" readonly required/>
                      </div>
                    </div>
                    <div class="form-group col-md-12 col-xl-4">
                      <div class="form-group">
                        <label class="form-label">주문자 연락처 2</label>
                        <input type="text" class="form-control" id="order_tel2"  maxlength="11" minlength="10" value="<?=$order_info [0]['order_tel2']?>"readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mt-0  ml-0 mr-0">
              <div class="card mb-0">
                <div class="card-header">
                  <h3 class="card-title">배송지정보입력</h3>
                </div>
                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-12 col-xl-4">
                      <div class="form-group">
                        <label class="form-label">수취인</label>
                        <input type="text" class="form-control" id="reciever_name" value="<?=$order_info [0]['reciever_name']?>" placeholder="이름" readonly>
                      </div>
                    </div>
                    <div class="form-group col-md-12 col-xl-4">
                      <div class="form-group">
                        <label class="form-label">수취인 연락처 1</label>
                        <input type="text" class="form-control"  maxlength="11" minlength="10"  id="reciever_tel1" placeholder="010-1234-5678" value="<?=$order_info [0]['reciever_tel1']?>" readonly>
                      </div>
                    </div>
                    <div class="form-group col-md-12 col-xl-4">
                      <div class="form-group">
                        <label class="form-label">수취인 연락처 2</label>
                        <input type="text" class="form-control"  maxlength="11" minlength="10"  id="reciever_tel2" value="<?=$order_info [0]['reciever_tel2']?>" readonly>
                      </div>
                    </div>
                    <div class="form-group col-sm-12 col-xl-4 col-md-12">
                      <div class="form-group">
                        <label class="form-label" for="zipcode"><?=$order_user_info[2]?></label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="zipcode" name="zipcode"  placeholder="<?=$order_info_contents[2]?>" value="<?=$order_info [0]['reciever_zipcode']?>" readonly/>
                          <div class="input-group-append">
                            <button type="button" onclick="openZipSearch()" disabled class="btn btn-primary">찾기</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-sm-12 col-xl-8 col-md-12">
                      <div class="form-group">
                        <label class="form-label"><?=$order_user_info[3]?></label>
                        <input type="text" class="form-control" id="adress1" placeholder="<?=$order_info_contents[3]?>"  value="<?=$order_info [0]['reciever_address1']?>" readonly/>
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <div class="form-group">
                        <label class="form-label"><?=$order_user_info[4]?></label>
                        <input type="text" class="form-control" id="adress2" placeholder="<?=$order_info_contents[4]?>" value="<?=$order_info [0]['reciever_address2']?>" readonly>
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <div class="form-group">
                        <label class="form-label"><?=$order_user_info[5]?></label>
                        <input type="text" class="form-control" id="adress3" placeholder="<?=$order_info_contents[5]?>" value="<?=$order_info [0]['reciever_address3']?>" readonly>
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <div class="form-group">
                        <label class="form-label"><?=$order_user_info[7]?></label>
                        <input type="text" class="form-control" id="deliveryMsg" placeholder="<?=$order_info_contents[7]?>" value="<?=$order_info [0]['delivery_msg']?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <!--POST방식으로 상품번호,상품명,옵션,판매가,할인금액,배송비,주문금액,전체합계 품수, 상품금액,할인금액,배송비,주문금액 전송-->
                <input type="hidden" id = "paymethod" name="paymethod" value="online" />
                <input type="hidden" id = "status" name="status" value="0" />
              </div>
            </div>
        </form>
      </div>
    <?php }
    ?>


<script src="/static/lib/bootstrap/js/daumPost.js" type="text/javascript"></script>
<script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js" type="text/javascript"></script>
<script>

  function telOnblur(textId)
  {
    var text = $('#'+textId).val();
    if(text !== null || text !== '')
    {
      $('#'+textId).next('label').text('');
    }
    else
    {
      $('#'+textId).next('label').text('주문자 연락처 필수');
    }
  }

  var price = $('.total_price');
  var total_price = 0;
  for (var i = 0; i < price.length; i++) {
    total_price = total_price + parseInt(price.eq(i).text());
  }
  $('.all_product_price').text(total_price);



  var select_delivery = $('.select_delivery');
  var product_no = $('.product_no');
  var plus_price = [];
  for (var i = 0; i < select_delivery.length; i++)
  {
    var option_value = select_delivery.eq(i).children('option').val();
    // alert(option_value);

    if(i >= 0 && i !== (parseInt(select_delivery.length)-1))
    {
      if(product_no.eq(i).val() == product_no.eq(i+1).val())
      {
        console.log('일치');
        plus_price[i] = 0;
      }
      else
      {
        console.log('불일치');
        if(option_value == 1)
        {
          plus_price[i] = parseInt($('.delivery_price').eq(i).text());
          console.log('선불');
        }
        else
        {
          plus_price[i] = 0;
          console.log('후불');
        }
      }
    }
    else
    {
      if(option_value == 1)
      {
        plus_price[i] = parseInt($('.delivery_price').eq(i).text());
        console.log('선불');
      }
      else
      {
        plus_price[i] = 0;
        console.log('후불');
      }
    }

  }
  var total_delivery_price = plus_price.reduce((a, b) => a + b);
  $('.all_delivery_price').text(total_delivery_price);


  var all_delivery_price = parseInt($('.all_delivery_price').text());
  var all_product_price = parseInt($('.all_product_price').text());
  var all_total_price = parseInt(all_delivery_price+all_product_price);
  $('.all_total_price').text(all_total_price);
</script>
