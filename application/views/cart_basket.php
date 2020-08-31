<?php
$cart_title = $this->lang->line('cart_title');

// echo "<pre>";
// echo "cart_info <br />";
// var_dump($cart_info);
// echo "product_info <br />";
// var_dump($product_info);
// echo "thumnail_info <br />";
// var_dump($thumnail_info);
// echo "option_code_info <br />";
// var_dump($option_code_info);
// echo "input_no <br />";
// var_dump($input_no);
// echo "output_no <br />";
// var_dump($output_no);
// echo "</pre>";

?>
<div class="col-xl-10 col-lg-12 col-md-12">
  <div class="card mb-0">
    <div class="card-header">
      <h3 class="card-title"><?=$cart_title[0]?></h3>
    </div>
    <div class="card-body">
      <div class="table-responsive border-top">
        <input type="hidden" id="user_no" name="user_no" value="<?=$this->session->userdata('user_no')?>" />
        <!-- 회원고유번호 -->
        <table class="table table-bordered table-hover text-nowrap">
          <thead>
            <tr class="text-center">
              <th class="col-md-0" style="width: 5%"></th>
              <th class="col-md-2" style="width: 10%">상품이미지</th>
              <th style="15%">상품명</th>
              <th style="15%">상세옵션</th>
              <th style="10%">수    량</th>
              <th style="10%">상품금액</th>
              <th style="10%">주문금액</th>
              <th style="10%">배송비</th>
              <th style="10%">배송비결제</th>
              <th style="5%"></th>
            </tr>
          </thead>
          <tbody>
            <?php if(isset($cart_info))
            { ?>
            <?php for ($i=0; $i < count($cart_info); $i++) {
            ?>
            <tr id="cart_no_<?=$cart_info[$i]['no']?>">
              <td  style="vertical-align: middle;">
                <input type="hidden" class="product_no" value="<?=$product_info[$i][0]['no']?>" />
                <label class="custom-control custom-checkbox p-2">
                  <input type="hidden" class="custom-control-input cart_no" name="cart_no" value="<?=$cart_info[$i]['no']?>">
                  <input type="checkbox" class="custom-control-input" name="cart_checkbox" value="checkbox">
                  <span class="custom-control-label"></span>
                </label>
              </td>
              <td class="text-center" style="vertical-align: middle;">
                <a href="#">
                  <img src="<?=$thumnail_info[$i][0]['fileURL'].$thumnail_info[$i][0]['filename'].'.'.$thumnail_info[$i][0]['fileExe']?>" alt="img">
                </a>
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
                    <h6 class="font-weight-semibold"><?=$option_code_info[$i][0]['name']?></h6>
                  </span>
                </div>
              </td>
              <td class="font-weight-semibold fs-16 text-center" style="vertical-align: middle;">
                <?php $qty = $cart_info[$i]['qty']; ?>
                <input class="form-control col bg-blog-overlay3 text-center product_qty" type="text" name="product_qty[]" value="<?=$qty?>" onblur="productQty(<?=$cart_info[$i]['no']?>)" />
              </td>
              <td class="font-weight-semibold fs-16 text-center" style="vertical-align: middle;">
                <span class="product_price">
                <?php $product_price =  (int)$product_info[$i][0]['price']-(int)$product_info [$i][0]['discount_price']+$option_code_info[$i][0]['price']; ?>
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
                <?=$output_no[$i][0]['delivery_fee1']?>
                </span>
                원
              </td>
              <td class="font-weight-semibold fs-16 text-center" style="vertical-align: middle;">
                <select name="delivery_method_select" id="select_delivery_<?=$cart_info[$i]['no']?>" class="form-control custom-select select_delivery" onchange="select_delivery(<?=$cart_info[$i]['no']?>);">
                  <option value="0" selected="">배송비</option>
                  <option value="1">선불</option>
                  <option value="2">후불</option>
                </select>
                <input type="hidden" class="delivery_method_<?=$cart_info[$i]['no']?>" name="delivery_method[]" value="" readonly required />
              </td>
              <td class="text-center p-0" style="vertical-align: middle;">
                <button type="button" onclick="optionDelete()" class="btn col-2 text-center option_delete"><i class="fa fa-close"></i></button>
              </td>
            </tr>
          <?php } } ?>
          </tbody>
        </table>

      </div>
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
              <td colspan="2" class="text-right"><span class="select_count">0</span>개</td>
            </tr>
            <tr>
              <td colspan="6" class="text-right">상품금액</td>
              <td colspan="2" class="text-right"><span class="all_product_price">0</span>원</td>
            </tr>
            <tr>
              <td colspan="6" class="text-right">배송비</td>
              <td colspan="2" class="text-right"><span class="all_delivery_price">0</span>원</td>
            </tr>
            <tr>
              <td colspan="6" class="text-right">주문금액</td>
              <td colspan="2" class="text-right"><span class="all_total_price">0</span>원</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!--POST방식으로 상품번호,상품명,옵션,판매가,할인금액,배송비,주문금액,전체합계 상품수, 상품금액,할인금액,배송비,주문금액 전송-->
    <?php
    //var_dump($cart_info);
    if(isset($cart_info))
    { ?>
    <button type="button" class="btn btn-primary btn-block" onclick="order_start()">주문하기</button>
  <?php }
  else
  {  ?>
    <button type="button" class="btn btn-primary btn-block disabled" onclick="order_start()" disabled>주문하기</button>
  <?php } ?>
  </div>
</div>
<script>
$(document).ready(function()
{
  $("input:checkbox").on('click', function()
  {
    // $(this).parent().addClass("selected");
    // alert('선택~');
    var tr_id = $(this).parent().parent().parent('tr').attr('id');
    // var product_qty = $('#'+tr_id).find('.product_qty').val();
    // var product_price = parseInt($('#'+tr_id).find('.product_price').text());

    // var all_select_count = $('.select_count').text();
    var delivery_method = $('#'+tr_id).find('input:hidden[name="delivery_method[]"]').val();

    if(delivery_method == null || delivery_method == false || delivery_method == 0){
      alert('배송비 결제 방법을 선택하세요.');
      $(this).prop('checked',false);
      $('#'+tr_id).find('.select_delivery').attr('disabled', false);
    }
    else
    {
      if ( $(this).prop('checked') )
      {
        var total_price = parseInt($('#'+tr_id).find('.total_price').text());
        var delivery_price = parseInt($('#'+tr_id).find('.delivery_price').text());
        var select_count = $('input:checkbox[name=cart_checkbox]:checked').length;
        var all_product_price = parseInt($('.all_product_price').text());
        var all_delivery_price = parseInt($('.all_delivery_price').text());
        var all_total_price = parseInt($('.all_total_price').text());
        $('#'+tr_id).find('.select_delivery').attr('disabled', true);
        var currProd = $('#'+tr_id).find('.prduct_no').val();


        // var product_no = $('.product_no');
        var product_no = $('input:checkbox[name=cart_checkbox]:checked').parent().prev('input');
        var delivery_price_select = $('input:checkbox[name=cart_checkbox]:checked').parent().parent().next().next().next().next().next().next().next().children('span');
        var delivery_select = $('input:checkbox[name=cart_checkbox]:checked').parent().parent().next().next().next().next().next().next().next().next().children('input');
        var plus_price = [];

        $('.select_count').text(select_count);
        $('.all_product_price').text(all_product_price + total_price);

        var all_product_price2 = parseInt($('.all_product_price').text());

        /*
        for (var i = 0; i < product_no.length; i++)
        {
          if(i >= 0 && i !== (parseInt(product_no.length)-1))
          {
            // console.log('product_no.eq(i).val(): '+product_no.eq(i).val());
            // console.log('product_no.eq(i+1).val(): '+product_no.eq(i+1).val());
            // console.log('product_no.length: '+product_no.length);
            if(product_no.eq(i).val() == product_no.eq(i+1).val())
            {
              console.log('일치');
              plus_price[i] = 0;
            }
            else
            {
              console.log('불일치');
              if(delivery_method == 1)
              {
                plus_price[i] = delivery_price;
                console.log('선불과 id: '+ tr_id);
                console.log('delivery_method: '+ delivery_method);
              }
              else
              {
                plus_price[i] = 0;
                console.log('후불과 id: '+ tr_id);
                console.log('delivery_method: '+ delivery_method);
              }
            }
          }
          else
          {
            if(delivery_method == 1)
            {
              plus_price[i] = delivery_price;
              console.log('선불과 id: '+ tr_id);
              console.log('product_no.length');
              console.log('delivery_method: '+ delivery_method);
            }
            else
            {
              plus_price[i] = 0;
              console.log('후불과 id: '+ tr_id);
              console.log('product_no.length');
              console.log('delivery_method: '+ delivery_method);
            }
          }
        }
        */


          for (var i = 0; i < product_no.length; i++) {
            console.log('i: '+i);
            if(i >= 0 && i !== (parseInt(product_no.length)-1))
            {
              // console.log('product_no.eq(i).val(): '+product_no.eq(i).val());
              // console.log('product_no.eq(i+1).val(): '+product_no.eq(i+1).val());
              // console.log('product_no.length: '+product_no.length);
              if(product_no.eq(i).val() == product_no.eq(i+1).val())
              {
                console.log('일치');
                plus_price[i] = 0;
              }
              else
              {
                console.log('불일치');
                if(delivery_select.eq(i).val() == 1)
                {
                  plus_price[i] = parseInt(delivery_price_select.eq(i).text());
                  console.log('선불');
                }
                else
                {
                  plus_price[i] = 0;
                  console.log('후불');
                }
                console.log('plus_price[i]: ' + plus_price[i]);
              }
            }
            else
            {
              if(delivery_select.eq(i).val() == 1)
              {
                plus_price[i] = parseInt(delivery_price_select.eq(i).text());
                console.log('선불');
              }
              else
              {
                plus_price[i] = 0;
                console.log('후불');
              }
            }
          }



        // console.log('plus_price: ' + plus_price);
        // console.log('total_delivery_price: ' + total_delivery_price);
        var total_delivery_price = plus_price.reduce((a, b) => a + b);
        $('.all_delivery_price').text(total_delivery_price);
        var total_delivery = parseInt($('.all_delivery_price').text());
        var total_product = parseInt($('.all_product_price').text());
        $('.all_total_price').text(total_delivery+total_product);

      }
      else
      {
        $('#'+tr_id).find('.select_delivery').attr('disabled', false);
        var total_price = parseInt($('#'+tr_id).find('.total_price').text());
        var delivery_price = parseInt($('#'+tr_id).find('.delivery_price').text());
        var select_count = $('input:checkbox[name=cart_checkbox]:checked').length;
        var all_product_price = parseInt($('.all_product_price').text());
        var all_delivery_price = parseInt($('.all_delivery_price').text());
        var all_total_price = parseInt($('.all_total_price').text());

        $('.select_count').text(select_count);
        $('.all_product_price').text(all_product_price - total_price);

        // var product_no = $('.product_no');
        var product_no = $('input:checkbox[name=cart_checkbox]:checked').parent().prev('input');
        var delivery_price_select = $('input:checkbox[name=cart_checkbox]:checked').parent().parent().next().next().next().next().next().next().next().children('span');
        // var delivery_price_select = product_no.parent().next().next().next().next().next().next().next().children('span');
        var delivery_select = $('input:checkbox[name=cart_checkbox]:checked').parent().parent().next().next().next().next().next().next().next().next().children('input');
        var minus_price = [];
        console.log('for 직전');
        if(select_count == 0)
        {
          minus_price = 0;
          $('.all_delivery_price').text(minus_price);
          $('.all_total_price').text(minus_price);
        }
        else
        {
          for (var i = 0; i < product_no.length; i++)
          {
            console.log('i: '+i);
            if(i >= 0 && i !== (parseInt(product_no.length)-1))
            {
              // console.log('product_no.eq(i).val(): '+product_no.eq(i).val());
              // console.log('product_no.eq(i+1).val(): '+product_no.eq(i+1).val());
              // console.log('product_no.length: '+product_no.length);
              if(product_no.eq(i).val() == product_no.eq(i+1).val())
              {
                console.log('일치');
                minus_price[i] = 0;
              }
              else
              {
                console.log('불일치');
                if(delivery_select.eq(i).val() == 1)
                {
                  minus_price[i] = parseInt(delivery_price_select.eq(i).text());
                  console.log('parseInt(delivery_price_select.eq(i).text()): '+parseInt(delivery_price_select.eq(i).text()));
                  console.log('선불');
                }
                else
                {
                  minus_price[i] = 0;
                  console.log('후불');
                }
                console.log('minus_price[i]: ' + minus_price[i]);
              }
            }
            else
            {
              console.log('마지막');
              if(delivery_select.eq(i).val() == 1)
              {
                minus_price[i] = parseInt(delivery_price_select.eq(i).text());
                console.log('parseInt(delivery_price_select.eq(i).text()): '+parseInt(delivery_price_select.eq(i).text()));
                console.log('선불');
              }
              else
              {
                minus_price[i] = 0;
                console.log('후불');
              }
            }
          }
          var total_delivery_price2 = minus_price.reduce((a, b) => a + b,0);
          console.log('minus_price: '+minus_price);
          console.log('total_delivery_price2: '+total_delivery_price2);
          $('.all_delivery_price').text(total_delivery_price2);
          // $('.all_delivery_price').text(delivery_price-total_delivery_price2);
          var total_delivery = parseInt($('.all_delivery_price').text());
          var total_product = parseInt($('.all_product_price').text());
          $('.all_total_price').text(total_delivery+total_product);
          // $('.all_total_price').text(all_total_price-total_delivery-total_product-total_price);
        }




        // console.log('all_product_price : ' + all_product_price);
        // console.log('delivery_price : ' + delivery_price);
        // console.log('all_total_price : ' + all_total_price);
        // console.log('total : ' + (all_total_price-delivery_price-all_product_price));

        // if(delivery_method == 1){
        //   $('.all_delivery_price').text(all_delivery_price - delivery_price);
        //   $('.all_total_price').text(all_total_price - (all_delivery_price + all_product_price));
        // }
        // else if(delivery_method == 2)
        // {
        //   $('.all_delivery_price').text(all_delivery_price);
        //   var all_delivery_price2 = parseInt($('.all_delivery_price').text());
        //   $('.all_total_price').text(all_total_price - all_product_price);
        // }
        // else
        // {
        //   $('.all_delivery_price').text(all_delivery_price);
        //   var all_delivery_price2 = parseInt($('.all_delivery_price').text());
        //   $('.all_total_price').text(all_total_price - all_product_price);
        // }
      }
    }
  });
});
function select_delivery(num)
{
  var select_val = $('#select_delivery_'+num+' option:selected').val();
  $('.delivery_method_'+num).val(select_val);
}
function productQty(num){
 var tr_id = 'cart_no_'+num;
 var product_qty = $('#'+tr_id).find('.product_qty').val();
 var product_price = $('#'+tr_id).find('.product_price').text();

var update_price = parseInt(product_qty)*parseInt(product_price);
 $('#'+tr_id).find('.total_price').text(update_price);
}
function order_start()
{
  //배송비 선택했나 확인
  var delivery_method = $('input:hidden[name="delivery_method[]"]');
  var select_chk = $('input:checkbox[name=cart_checkbox]:checked');
  console.log('선택된 값의 개수: '+select_chk.length);
  var tr_id =  new Array();
  var result =  new Array();
  var product_qty =  new Array();
  var cart_no =  new Array();
  var delivery =  new Array();

  for (var i = 0; i < select_chk.length; i++)
  {
    tr_id[i] = select_chk.eq(i).parent().parent().parent().attr('id');
    var delivery_method = $('#'+tr_id[i]).find('input:hidden[name="delivery_method[]"]').val();
    if(delivery_method == null || delivery_method == false || delivery_method == 0)
    {
      result[i] = 0;
    }else{
      result[i] = 1;
      product_qty[i] = $('#'+tr_id[i]).find('input:text[name="product_qty[]"]').val();
      cart_no[i] = $('#'+tr_id[i]).find('input:hidden[name="cart_no"]').val();
      delivery[i] = $('#'+tr_id[i]).find('input:hidden[name="delivery_method[]"]').val();
    }
  }


  var isTrue = result.some(isEven);

  if(isTrue)
  {
    alert('배송비 결제 방법을 선택하세요.');
  }
  else
  {
     // alert('주문 ㄱㄱ');
     var all_product_price = $('.all_product_price').text();
     var all_delivery_price = $('.all_delivery_price').text();
     var all_total_price = $('.all_total_price').text();
     console.log('product_qty: '+product_qty);
     console.log('cart_no: '+cart_no);
     console.log('delivery: '+delivery);
     console.log('all_product_price: '+all_product_price);
     console.log('all_delivery_price: '+all_delivery_price);
     console.log('all_total_price: '+all_total_price);
     var form = document.createElement("form");

      form.setAttribute("charset", "UTF-8");
      form.setAttribute("method", "Post");  //Post 방식
      form.setAttribute("action", "/order"); //요청 보낼 주소

     var product_qty2= document.createElement("input");
       product_qty2.setAttribute("type","hidden");
       product_qty2.setAttribute("name","product_qty");
       product_qty2.setAttribute("value", product_qty);
       form.appendChild(product_qty2);
     var cart_no2= document.createElement("input");
       cart_no2.setAttribute("type","hidden");
       cart_no2.setAttribute("name","cart_no");
       cart_no2.setAttribute("value", cart_no);
       form.appendChild(cart_no2);
     var all_product_price2= document.createElement("input");
       all_product_price2.setAttribute("type","hidden");
       all_product_price2.setAttribute("name","all_product_price");
       all_product_price2.setAttribute("value", all_product_price);
       form.appendChild(all_product_price2);
     var all_delivery_price2= document.createElement("input");
       all_delivery_price2.setAttribute("type","hidden");
       all_delivery_price2.setAttribute("name","all_delivery_price");
       all_delivery_price2.setAttribute("value", all_delivery_price);
       form.appendChild(all_delivery_price2);
     var all_total_price2= document.createElement("input");
       all_total_price2.setAttribute("type","hidden");
       all_total_price2.setAttribute("name","all_total_price");
       all_total_price2.setAttribute("value", all_total_price);
       form.appendChild(all_total_price2);
     var delivery2= document.createElement("input");
       delivery2.setAttribute("type","hidden");
       delivery2.setAttribute("name","delivery");
       delivery2.setAttribute("value", delivery);
       form.appendChild(delivery2);
       $(document.body).append(form);
     form.submit();

  }
}
function isEven(num)
{
  return num == 0;
}

</script>
