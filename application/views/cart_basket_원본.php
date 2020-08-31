<?php
$cart_title = $this->lang->line('cart_title');
// var_dump($cart_info);
?>
<div class="col-xl-9 col-lg-12 col-md-12">
  <div class="card mb-0">
    <div class="card-header">
      <h3 class="card-title"><?=$cart_title[0]?></h3>
    </div>
    <div class="card-body">
      <div class="table-responsive border-top">
        <input type="text" id="user_no" name="user_no" value="<?=$this->session->userdata('user_no')?>" />회원고유번호
        <table class="table table-bordered table-hover text-nowrap">
          <thead>
            <tr class="text-center">
              <th class="col-md-0"></th>
              <th class="col-md-2">상품이미지</th>
              <th>상품명</th>
              <th>상세옵션</th>
              <th>수량</th>
              <th>판매가</th>
              <th>할인가</th>
              <th>주문금액</th>
              <th>배송비결제</th>
              <th class="text-center col-md-1"><a href="#" class="btn btn-info btn-sm text-white" data-toggle="tooltip" data-original-title="Delete from Wishlist"><?=$cart_title[7]?><i class="fa fa-trash"></i></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                  <span class="custom-control-label"></span>
                </label>
              </td>
              <td>
                <div class="media mt-0 mb-0">
                  <div class="card-aside-img">
                    <a href="#"></a>
                    <img src="/static/lib/assets/theme/images/products/f1.png" alt="img">
                  </div>
                  <div class="media-body">
                    <div class="card-item-desc ml-4 p-0 mt-2">
                      <a href="#" class="text-dark"><h4 class="font-weight-semibold">Chiness Food</h4></a>
                      <span>[상품번호]</span><br>
                      <div class="cart_quantity_button">
                        <a class="cart_quantity_up" href=""> + </a>
                        <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                        <a class="cart_quantity_down" href=""> - </a>
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
              <td class="text-center">
                <a href="#" class="btn btn-info btn-sm text-white " data-toggle="tooltip" data-original-title="Delete from Wishlist"><i class="fa fa-trash"></i>
              </td>
            </tr>
          </tbody>
        </table>

      </div>

      <!-- <div>
        <div class="box__cart-order" data-reactid=".0.3.0.$e1">
          <h3 class="for-a11y" data-reactid=".0.3.0.$e1.0">주문서</h3>
          <div class="box__order-summary-container" data-reactid=".0.3.0.$e1.1">
            <div class="box__order-summary-header" data-reactid=".0.3.0.$e1.1.0">
              <strong class="text__title" data-reactid=".0.3.0.$e1.1.0.0">전체 합계</strong>
            </div>
            <div class="box__order-summary-body" data-reactid=".0.3.0.$e1.1.1">
              <div class="box__price box__price--count" data-reactid=".0.3.0.$e1.1.1.0">
                <span class="text__label" data-reactid=".0.3.0.$e1.1.1.0.0">상품수</span><span class="box__format-amount" data-reactid=".0.3.0.$e1.1.1.0.1"><strong class="text__value" data-reactid=".0.3.0.$e1.1.1.0.1.3">0</strong><span class="text__unit" data-reactid=".0.3.0.$e1.1.1.0.1.4">개</span></span>
              </div>
              <div class="box__price box__price--original" data-reactid=".0.3.0.$e1.1.1.1">
                <span class="text__label" data-reactid=".0.3.0.$e1.1.1.1.0">상품금액</span><span class="box__format-amount" data-reactid=".0.3.0.$e1.1.1.1.1"><strong class="text__value" data-reactid=".0.3.0.$e1.1.1.1.1.3">0</strong><span class="text__unit" data-reactid=".0.3.0.$e1.1.1.1.1.4">원</span></span>
              </div>
                <div class="box__price box__price--discount image__minus" data-reactid=".0.3.0.$e1.1.1.2"><span class="text__label" data-reactid=".0.3.0.$e1.1.1.2.0">할인금액</span><span class="box__format-amount" data-reactid=".0.3.0.$e1.1.1.2.1"><strong class="text__value" data-reactid=".0.3.0.$e1.1.1.2.1.3">0</strong><span class="text__unit" data-reactid=".0.3.0.$e1.1.1.2.1.4">원</span></span>
                </div>
                <div class="box__price box__price--delivery image__plus" data-reactid=".0.3.0.$e1.1.1.3"><span class="text__label" data-reactid=".0.3.0.$e1.1.1.3.0">배송비</span><span class="box__format-amount" data-reactid=".0.3.0.$e1.1.1.3.2"><strong class="text__value" data-reactid=".0.3.0.$e1.1.1.3.2.3">0</strong><span class="text__unit" data-reactid=".0.3.0.$e1.1.1.3.2.4">원</span></span>
                </div>
                <div class="box__price box__price--order image__result" data-reactid=".0.3.0.$e1.1.1.4"><span class="text__label" data-reactid=".0.3.0.$e1.1.1.4.0">전체 주문금액</span><span class="box__format-amount" data-reactid=".0.3.0.$e1.1.1.4.1"><strong class="text__value" data-reactid=".0.3.0.$e1.1.1.4.1.3">0</strong><span class="text__unit" data-reactid=".0.3.0.$e1.1.1.4.1.4">원</span></span>
                </div>
              </div>
            </div>
            <div class="box__order-action" data-reactid=".0.3.0.$e1.2">
              <div class="box__inner-content" data-reactid=".0.3.0.$e1.2.0">
                <div class="box__data-group--count" data-reactid=".0.3.0.$e1.2.0.0"><span class="text__label" data-reactid=".0.3.0.$e1.2.0.0.0">전체</span><span class="text__count" data-reactid=".0.3.0.$e1.2.0.0.1">0</span><span class="text__label" data-reactid=".0.3.0.$e1.2.0.0.2">개</span>
                </div>
                <div class="box__data-group--total" data-reactid=".0.3.0.$e1.2.0.1"><span class="box__format-amount" data-reactid=".0.3.0.$e1.2.0.1.0"><strong class="text__value" data-reactid=".0.3.0.$e1.2.0.1.0.3">0</strong><span class="text__unit" data-reactid=".0.3.0.$e1.2.0.1.0.4">원</span></span>
                </div>
                <button data-montelena-acode="100001741" class="button__order" data-reactid=".0.3.0.$e1.2.0.2"><span class="text sprite__cart--after" data-reactid=".0.3.0.$e1.2.0.2.0">주문하기</span></button>
              </div>
            </div>
          </div>
      </div> -->

      <!---결제는 페이지로 나누지 말고 길게 보여주자
      <ul class="pagination">
        <li class="page-item page-prev disabled">
          <a class="page-link" href="#" tabindex="-1">Prev</a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item page-next">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>--->
    </div>
  </div>

  <div class="card mb-0">
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
            <tr>
              <td colspan="6" class="text-right">상품수</td>
              <td colspan="2" class="text-right">1개</td>
            </tr>
            <tr>
              <td colspan="6" class="text-right">상품금액</td>
              <td colspan="2" class="text-right">20000원</td>
            </tr>
            <tr>
              <td colspan="6" class="text-right">할인금액</td>
              <td colspan="2" class="text-right">5000원</td>
            </tr>
            <tr>
              <td colspan="6" class="text-right">배송비</td>
              <td colspan="2" class="text-right">2500원</td>
            </tr>
            <tr>
              <td colspan="6" class="text-right">주문금액</td>
              <td colspan="2" class="text-right">17500원</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!--POST방식으로 상품번호,상품명,옵션,판매가,할인금액,배송비,주문금액,전체합계 상품수, 상품금액,할인금액,배송비,주문금액 전송-->
    <a href="#주문"><button type="button" class="btn btn-primary btn-block">주문하기</button></a>
  </div>
</div>
