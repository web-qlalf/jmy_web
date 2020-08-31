<?php $order_title = $this->lang->line('order_title');?>
<?php $order_user_info = $this->lang->line('order_user_info');?>
<?php $order_info_contents = $this->lang->line('order_info_contents');?>
<?php
// echo "<pre>";
// echo "order_info<br />";
// var_dump($order_info);
// echo "order_detail_info<br />";
// var_dump($order_detail_info);
// echo "product_info<br />";
// var_dump($product_info);
// echo "thumnail_info<br />";
// var_dump($thumnail_info);
// echo "output_info<br />";
// var_dump($output_info);
// echo "option_code_info<br />";
// var_dump($option_code_info);
// echo "</pre>";
 ?>
<div class="container">
  <br />
  <div class="col-xl-12 col-lg-12 col-md-12">
    <div class="row">
      <div class="card mb-0">
        <div class="card-header">
          <h3 class="card-title">주문 상세 정보</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive border-top">
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
          <form action="/admin/order/update" method="post">
          <div class="form-row">
            <div class="form-group col-md-12 col-xl-6">
              <div class="form-group">
                <label class="form-label">주문번호</label>
                <input type="text" class="form-control" id="order_no" name="order_no" value="<?=$order_info[0]['no']?>" readonly/>
              </div>
            </div>
            <div class="form-group col-md-12 col-xl-6">
              <div class="form-group">
                <label class="form-label">주문날짜</label>
                <input type="text" class="form-control" id="order_date" value="<?=$order_info[0]['regdate']?>"readonly/>
              </div>
            </div>
            <div class="form-group col-md-12 col-xl-12">
              <div class="form-group">
                <label class="form-label">결제금액</label>
                <input type="text" class="form-control" id="order_payment" value="<?=$order_info[0]['payment']?>"readonly/>
              </div>
            </div>
          <div class="form-row">
            <div class="form-group col-md-12 col-xl-4">
              <div class="form-group">
                <label class="form-label"><?=$order_user_info[1]?></label>
                <input type="text" class="form-control" id="reciever_name" name="reciever_name" value="<?=$order_info[0]['reciever_name']?>">
              </div>
            </div>
            <div class="form-group col-md-12 col-xl-4">
              <div class="form-group">
                <label class="form-label"><?=$order_user_info[6]?></label>
                <input type="text" class="form-control" id="reciever_tel1" name="reciever_tel1"  value="<?=$order_info[0]['reciever_tel1']?>">
              </div>
            </div>
            <div class="form-group col-md-12 col-xl-4">
              <div class="form-group">
                <label class="form-label"><?=$order_user_info[6]?></label>
                <input type="text" class="form-control" id="reciever_tel2" name="reciever_tel2" value="<?=$order_info[0]['reciever_tel2']?>">
              </div>
            </div>
            <div class="form-group col-sm-12 col-xl-4 col-md-12">
              <div class="form-group">
                <label class="form-label" for="zipcode"><?=$order_user_info[2]?></label>
                <div class="input-group">
                  <input type="text" class="form-control" id="zipcode" name="reciever_zipcode" value="<?=$order_info[0]['reciever_zipcode']?>"  placeholder="<?=$order_info_contents[2]?>" readonly/>
                  <div class="input-group-append">
                    <button type="button" onclick="openZipSearch()" class="btn btn-primary">찾기</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group col-sm-12 col-xl-8 col-md-12">
              <div class="form-group">
                <label class="form-label"><?=$order_user_info[3]?></label>
                <input type="text" class="form-control" id="adress1" name="reciever_address1" placeholder="<?=$order_info_contents[3]?>" value="<?=$order_info[0]['reciever_address1']?>"  readonly/>
              </div>
            </div>
            <div class="form-group col-md-12">
              <div class="form-group">
                <label class="form-label"><?=$order_user_info[4]?></label>
                <input type="text" class="form-control" id="adress2" name="reciever_address2" placeholder="<?=$order_info_contents[4]?>" value="<?=$order_info[0]['reciever_address2']?>">
              </div>
            </div>
            <div class="form-group col-md-12">
              <div class="form-group">
                <label class="form-label"><?=$order_user_info[5]?></label>
                <input type="text" class="form-control" id="adress3" name="reciever_address3" placeholder="<?=$order_info_contents[5]?>" value="<?=$order_info[0]['reciever_address3']?>">
              </div>
            </div>
            <div class="form-group col-md-12">
              <div class="form-group">
                <label class="form-label"><?=$order_user_info[7]?></label>
                <input type="text" class="form-control" id="delivery_msg" name="delivery_msg" placeholder="<?=$order_info_contents[7]?>" value="<?=$order_info[0]['delivery_msg']?>">
              </div>
            </div>
            <div class="form-group col-md-12">
              <div class="form-group">
                <select name="order_status_select" class="form-control custom-select order_status_select">
                  <option value="0" selected="">주문완료</option>
                  <option value="1">상품준비중</option>
                  <option value="2">상품배송</option>
                  <option value="2">배송완료</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <!--POST방식으로 상품번호,상품명,옵션,판매가,할인금액,배송비,주문금액,전체합계 품수, 상품금액,할인금액,배송비,주문금액 전송-->
        <div class="card-footer ">
          <button type="submit" class="btn btn-primary btn-block"><h4>수정하기</h4></button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <br />
  <br />
</div>
