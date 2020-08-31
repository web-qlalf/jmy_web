<?php $order_title = $this->lang->line('order_title');?>
<?php $order_user_info = $this->lang->line('order_user_info');?>
<?php $order_info_contents = $this->lang->line('order_info_contents');?>
<?php
echo "<pre>";
echo "product_info <br />";
var_dump($product_info);
echo "option_code <br />";
var_dump($option_code);
echo "option_code_info <br />";
var_dump($option_code_info);
echo "user_info <br />";
var_dump($user_info);
echo "all_product_price <br />";
var_dump($all_product_price);
echo "all_delivery_price <br />";
var_dump($all_delivery_price);
echo "all_total_price <br />";
var_dump($all_total_price);
echo "delivery_method <br />";
var_dump($delivery_method);
echo "</pre>";
?>
<div class="container">
  <br />
  <div class="col-xl-12 col-lg-12 col-md-12">
    <div class="row">
      <div class="card mb-0">
        <div class="card-header">
          <h3 class="card-title"><?=$order_title[0]?></h3>
        </div>
        <div class="card-body">
          <div class="table-responsive border-top">
            <table class="table table-bordered table-hover text-nowrap">
              <thead>
                <tr class="text-center">
                  <th style="width:15%"><?=$order_title[1]?></th>
                  <th style="width:30%"><?=$order_title[2]?></th>
                  <th style="width:15%"><?=$order_title[3]?></th>
                  <th style="width:10%"><?=$order_title[4]?></th>
                  <th style="width:10%"><?=$order_title[5]?></th>
                  <th style="width:10%"><?=$order_title[6]?></th>
                  <th style="width:10%"><?=$order_title[7]?></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="media mt-0 mb-0">
                      <div class="card-aside-img">
                        <a href="#"></a>
                        <img src="/static/lib/assets/theme/images/products/f1.png" alt="img">
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="media mt-0 mb-0">
                      <div class="media-body">
                        <div class="card-item-desc ml-4 p-0 mt-2">
                          <a href="#" class="text-dark"><h4 class="font-weight-semibold">Chiness Food</h4></a>
                          <span>[상품번호]</span><br>
                          <div class="cart_quantity_button">
                            <span>1개</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="media-body">
                        <span>색상:블랙</span><br>
                        <span>용량:10ml</span><br>
                        <span>종류:젤</span><br>
                    </div>
                  </td>
                  <td class="font-weight-semibold fs-16 text-center">20000원</td>
                  <td class="font-weight-semibold fs-16 text-center">5000원</td>
                  <td class="font-weight-semibold fs-16 text-center">2500원</td>
                  <td class="font-weight-semibold fs-16 text-center">17500원</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
  <br />
  <br />
  <div class="col-xl-12 col-lg-12 col-md-12">
    <div class="row">
      <div class="card mb-0">
        <div class="card-header">
          <h3 class="card-title"><?=$order_user_info[0]?></h3>
        </div>
        <div class="card-body">
          <div class="form-row">
            <div class="form-group col-md-12 col-xl-6">
              <div class="form-group">
                <label class="form-label"><?=$order_user_info[1]?></label>
                <input type="text" class="form-control" id="adress2" placeholder="<?=$order_info_contents[1]?>">
              </div>
            </div>
            <div class="form-group col-md-12 col-xl-6">
              <div class="form-group">
                <label class="form-label"><?=$order_user_info[6]?></label>
                <input type="text" class="form-control" id="adress3" placeholder="<?=$order_info_contents[6]?>">
              </div>
            </div>
            <div class="form-group col-sm-12 col-xl-4 col-md-12">
              <div class="form-group">
                <label class="form-label" for="zipcode"><?=$order_user_info[2]?></label>
                <div class="input-group">
                  <input type="number" class="form-control" id="zipcode" name="zipcode" value=""  placeholder="<?=$order_info_contents[2]?>" readonly/>
                  <div class="input-group-append">
                    <button type="button" onclick="openZipSearch()" class="btn btn-primary">찾기</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group col-sm-12 col-xl-8 col-md-12">
              <div class="form-group">
                <label class="form-label"><?=$order_user_info[3]?></label>
                <input type="text" class="form-control" id="adress1" placeholder="<?=$order_info_contents[3]?>"  readonly/>
              </div>
            </div>
            <div class="form-group col-md-12">
              <div class="form-group">
                <label class="form-label"><?=$order_user_info[4]?></label>
                <input type="text" class="form-control" id="adress2" placeholder="<?=$order_info_contents[4]?>">
              </div>
            </div>
            <div class="form-group col-md-12">
              <div class="form-group">
                <label class="form-label"><?=$order_user_info[5]?></label>
                <input type="text" class="form-control" id="adress3" placeholder="<?=$order_info_contents[5]?>">
              </div>
            </div>
            <div class="form-group col-md-12">
              <div class="form-group">
                <label class="form-label"><?=$order_user_info[7]?></label>
                <input type="text" class="form-control" id="adress3" placeholder="<?=$order_info_contents[7]?>">
              </div>
            </div>
          </div>
        </div>
        <!--POST방식으로 상품번호,상품명,옵션,판매가,할인금액,배송비,주문금액,전체합계 품수, 상품금액,할인금액,배송비,주문금액 전송-->
        <div class="card-footer ">
          <a href="#주문"><button type="button" class="btn btn-primary btn-block"><h4>주문하기</h4></button></a>
        </div>
      </div>
    </div>
  </div>
  <br />
  <br />
</div>
