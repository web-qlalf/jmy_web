<?php $oder_list_title = $this->lang->line('oder_list_title');?>
<?php
// echo "<pre>";
// echo "order_detail_info<br />";
// var_dump($order_detail_info);
// echo "order_info<br />";
// var_dump($order_info);
// echo "thumnail_info<br />";
// var_dump($thumnail_info);
// echo "product_info<br />";
// var_dump($product_info);
// echo "option_code_info<br />";
// var_dump($option_code_info);
// echo "</pre>";
 ?>
<div class="col-xl-10 col-lg-12 col-md-12">
  <div class="card mb-0">
    <div class="card-header">
      <h3 class="card-title"><?=$oder_list_title[0]?></h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
          <div class="tab-content">
            <!-- 가로 -->
             <div class="tab-pane active" id="tab-99">
              <!--dashboard.css (21140) tab-99수정-->
            </div>
          </div>
        </div>
      </div>
      <div class="pagination_list">
        <ul class="pagination" id="pagination_list1">

        </ul>
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
    </div>
  </div>
</div>
<div class="tab-pane"  style="display:none;">
  <div class="card overflow-hidden" id="before_row">
    <div class="d-md-flex">
      <div class="item-card9-img">
        <div class="item-card9-imgs">
          <a class="order_link" href="#상품상세페이지"></a>
          <img src="" alt="img" class="cover-image product_img">
        </div>
      </div>
      <div class="card border-0 mb-0">
        <div class="card-body pb-1">
          <a class="order_link" href="#주문상세">
            <div class="row">
              <div class="col-md-6" >
                <h4 class="font-weight-semibold mt-1 align-center text-gray">#order_<span class="order_no"></span></h4>
                <h4 class="font-weight-semibold mt-2 text-gray"><b><span class="total_price"></span></b>원</h4>
                <!-- <h4 class="font-weight-semibold mt-2 align-center text-gray"><span class="product_name"></span></h4> -->
              </div>
              <div class="col-md-12">
                <h5 class="font-weight-semibold mt-2 text-gray"><span class="product_name"></span><span class="order_detail_info"></span></h5>
              </div>
            </div>
          </a>
        </div>
        <div class="card-footer">
          <div class="item-card9-footer d-flex">
            <div class="item-card9-cost align-self-center">
              <span class="badge bg-indigo"><h5 class="font-weight-semibold mt-1"><b><span class="order_status">주문상태</span></b></h5></span>
            </div>
            <div class="item-card9-cost ml-auto align-self-center">
              <a href="#후기작성" class="order_review btn btn-primary btn-block" ><h5><b>후기작성</b></h5></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<input type="hidden" class="allData" value="<?=$allData?>" />
<input type="hidden" class="defaultPage" value="<?=$defaultPage?>" />

<script>
listPaging(1);
function listPaging(num)
{
  var current_page = num;

  // console.log('current_page: ',current_page);

  var next_page = current_page + 1;
  var defaultPage = $('.defaultPage').val();
  var searchKey ='';
  var pageLimit = 3;
  var block = 5;
  var alldata = $('.allData').val();
  var pageNum = Math.ceil(alldata/pageLimit); // 총 페이지
  var blockNum = Math.ceil(pageNum/block); // 총 블록
  var nowBlock = Math.ceil(current_page/block);
  var after_row = $('#tab-99');
  var pagination_list1 = $('#pagination_list1');


  var s_page = (nowBlock * block) - 2;
  if (s_page <= 1) {
      s_page = 1;
  }
  var e_page = nowBlock * block;
  if (pageNum <= e_page) {
      e_page = pageNum;
  }

  $.ajax({
    type: 'post',
    dataType: 'json',
    url: '/order/order_list/paging',
    data: {page:current_page,limit:pageLimit},
    success: function (data) {
      if (data != 'empty') {
        var dataLength = data.length;
        var card_row = $('#before_row');
        var pagination_list2 = $('#pagination_list2');

        console.log(data);
        var order_detail_info =data.order_detail_info;
        var option_code_info =data.option_code_info;
        var order_info =data.order_info;
        var product_info =data.product_info;
        var thumnail_info =data.thumnail_info;

        after_row.empty();
        pagination_list1.empty();

        for (var i = 0; i < order_detail_info.length; i++) {
          var clone = card_row.clone();
          clone.find('.order_detail_info').text('');
          clone.find('.product_name').text('');
            /* 상품이미지 */
            var img_src = thumnail_info[i][0][0]['fileURL']+thumnail_info[i][0][0]['filename']+'.'+thumnail_info[i][0][0]['fileExe'];
            clone.find('.product_img').attr('src', img_src);
            /* 상품이미지 */

          /* 상품링크 && 상품명 */
          // for (var s = 0; s < product_info[i].length; s++)
          // {
          //   var before_name = clone.find('.product_name').text();
          //   if(s == parseInt(product_info[i].length)-1)
          //   {
          //     clone.find('.product_name').text(before_name+product_info[i][s][0]['name']);
          //   }
          //   else
          //   {
          //     clone.find('.product_name').text(product_info[i][s][0]['name']+'/');
          //   }
          // }
          /* 상품링크 && 상품명 */

          /* 주문번호 */
          clone.find('.order_no').text(order_info[i]['no']);
          clone.find('.order_link').attr('href', '/order/detail/'+order_info[i]['no']);
          /* 주문번호 */

          /* 주문금액 */
          clone.find('.total_price').text(order_info[i]['payment']);
          /* 주문금액 */

          /* 배송결제방법 */
            // var delivery_method = parseInt(order_detail_info[i][0]['delivery_method']);
            // var delivery_code = '';
            // switch (delivery_method) {
            //   case 1:
            //     delivery_code = '선불';
            //     break;
            //   case 2:
            //     delivery_code = '후불';
            //     break;
            //   case 3:
            //     delivery_code = '문의바람';
            //     break;
            // }
            // clone.find('.delivery_method').text(delivery_code);
          /* 배송결제방법 */

          /* 주문옵션 && 수량 */
          var option_ret = '';
          var default2 = '';
            for (var k = 0; k < order_detail_info[i].length; k++) {
              console.log('order_detail_info[i].length: '+order_detail_info[i].length);
              if(k == parseInt(order_detail_info[i].length-1))
              {
                default2 = clone.find('.order_detail_info').text();
                option_ret = '['+product_info[i][k][0]['name']+'/'+option_code_info[i][k][0]['name']+'] '+order_detail_info[i][k]['qty']+'개';
                clone.find('.order_detail_info').text(default2+option_ret);
                console.log('option_ret1: '+clone.find('.order_detail_info').text());
              }
              else
              {
                default2 = clone.find('.order_detail_info').text();
                option_ret = '['+product_info[i][k][0]['name']+option_code_info[i][k][0]['name']+']  '+order_detail_info[i][k]['qty']+'개 / ';
                clone.find('.order_detail_info').text(default2+option_ret);
                console.log('option_ret2: '+clone.find('.order_detail_info').text());
              }
            }
          /* 주문옵션 && 수량 */
          /* 주문상태 */
            var status = parseInt(order_info[i]['status']);
            var order_status = '';

            switch (status) {
              case 0:
                order_status = '결제완료';
                break;
              case 1:
                order_status = '주문확인';
                break;
              case 2:
                order_status = '배송중';
                break;
              case 3:
                order_status = '배송완료';
                break;
            }
            clone.find('.order_status').text(order_status);
          /* 주문상태 */
          after_row.append(clone);

        }

          var clone2 = pagination_list2.clone();
          if(current_page == 1){
            $('.pagination_list >ul').append('<li class="page-item page-prev disabled"><a class="page-link" href="" onClick="pagePrevNext('+current_page+')">Prev</a></li>');
          }else{
            var prev_page = current_page-1;
            $('.pagination_list >ul').append('<li class="page-item page-prev"><a class="page-link" href="" onClick="pagePrevNext('+prev_page+')">Prev</a></li>');
          }


          for (var i = 1; i < pageNum+1; i++) {
            if(i == current_page){
              $('.pagination_list >ul').append('<li class="page-item active"><button type="button" class="page-link" href="" onClick="pageChange(this)">'+i+'</button></li>');

            }else{
              $('.pagination_list >ul').append('<li class="page-item"><button type="button" class="page-link" href="" onClick="pageChange(this)">'+i+'</button></li>');
            }
          }

          if(current_page == pageNum){
            $('.pagination_list >ul').append('<li class="page-item page-next disabled"><a class="page-link" href="" onClick="pagePrevNext('+current_page+')">Next</a></li>');
          }else{
            var next_page = current_page+1;
            $('.pagination_list >ul').append('<li class="page-item page-next"><a class="page-link" href="" onClick="pagePrevNext('+next_page+')">Next</a></li>');
          }


  }
  },
    error: function () {
         console.log('error');
    }
  });
}
function pageChange( statusItem ){
   var strText = $(statusItem).text();
   // console.log('strText: ',strText);
   listPaging(strText);
}
function pagePrevNext( statusItem ){
   var strText = statusItem;
   // console.log('strText: ',strText);
   listPaging(strText);
}

</script>
