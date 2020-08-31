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
      <!-- <div class="table-responsive border-top">
        <table class="table table-bordered table-hover text-nowrap">
          <thead>
            <tr>
              <th>주문번호</th>
              <th>상품명</th>
              <th>상세옵션</th>
              <th>가격</th>
              <th>주문날짜</th>
              <th>배송메시지</th>
              <th>주문상태</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-primary">#89345</td>
              <td>Restaurant</td>
              <td></td>
              <td class="font-weight-semibold fs-16">$893</td>
              <td>07-12-2018</td>
              <td>07-12-2018</td>
              <td>
                <a href="#" class="badge badge-danger">Pending</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div> -->
      <!--Add Lists-->
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
          <div class="tab-content">
            <!-- 가로 -->
              <div class="tab-pane active" id="tab-11">
                <?php for ($i=0; $i < count($order_detail_info); $i++)
                  {
                  ?>
                <div class="card overflow-hidden">
                  <div class="d-md-flex">
                    <!-- <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">결제완료</span></div> -->
                    <div class="item-card9-img">
                      <div class="item-card9-imgs">
                        <a href="#상품상세페이지"></a>
                        <img src="<?=$thumnail_info[$i][0][0]['fileURL'].$thumnail_info[$i][0][0]['filename'].'.'.$thumnail_info[$i][0][0]['fileExe']?>" alt="img" class="cover-image">
                      </div>
                    </div>
                    <div class="card border-0 mb-0">
                      <div class="card-body pb-1">
                        <a href="#상품상세페이지">
                        <div class="row">
                          <div class="col-md-6">
                             <h4 class="font-weight-semibold mt-1">[<?=$product_info[$i][0][0]['name']?>]</h4>
                             <h5 class="font-weight-semibold mt-2">#order_<?=$order_detail_info[$i][0]['no']?></h5>
                          </div>
                          <div class="col-md-6">

                            <h5 class="font-weight-semibold mt-2">가격: <b><?=$order_info[$i]['payment']?></b> 원</h5>
                            <?php
                              $delivery_method = $order_detail_info[$i][0]['delivery_method'];
                                switch ($delivery_method) {
                                  case 1:
                                    $delivery_code = '선불';
                                    break;
                                  case 2:
                                  $delivery_code = '후불';
                                    break;
                                  case 3:
                                  $delivery_code = '문의바람';
                                    break;
                                }
                                ?>
                          <h5 class="font-weight-semibold mt-2">배송비 결제: <?=$delivery_code?></h5>
                          </div>
                        </div>
                        <h5 class="font-weight-semibold mt-2">
                        <?php
                          for ($k=0; $k < count($order_detail_info[$i]) ; $k++)
                          {
                            if($k == count($order_detail_info[$i])-1)
                            {
                              echo '['.$option_code_info[$i][$k][0]['name'].'] '.$order_detail_info[$i][$k]['qty'].'개';
                            }
                            else
                            {
                              echo'['.$option_code_info[$i][$k][0]['name'].'] '.$order_detail_info[$i][$k]['qty'].'개 / ';
                            }
                        } ?></h5>
                      </a>
                      </div>
                      <div class="card-footer">
                        <div class="item-card9-footer d-flex">
                          <div class="item-card9-cost align-self-center">
                            <?php
                              $status = $order_info[$i]['status'];
                              switch ($status) {
                                case 0:
                                  $order_status = '결제완료';
                                  break;
                                case 1:
                                  $order_status = '주문확인';
                                  break;
                                case 2:
                                  $order_status = '배송중';
                                  break;
                                case 3:
                                  $order_status = '배송완료';
                                  break;
                              }
                             ?>
                            <!-- <h5 class="font-weight-semibold mt-1">주문상태: <?=$order_status?></h5> -->
                            <span class="badge bg-indigo "><h5 class="font-weight-semibold mt-1"><b><?=$order_status?></b></h5></span>
                          </div>
                          <div class="item-card9-cost ml-auto align-self-center">
                            <a href="#후기작성" class="btn btn-primary btn-block" ><h5><b>후기작성</b></h5></a>
                          </div>
                          <!-- <div class="ml-auto">
                            <div class="rating-stars block">
                              <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="3">
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
                </div>
                <?php
                  } ?>
            </div> -->
          </div>
        </div>
      </div>

      <div class="center-block text-center">
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
      </div>
    </div>
  </div>
      <!--/Add Lists-->
      <!---AJAX로 구성해야 하는 부분--->
      <!-- <ul class="pagination">
        <li class="page-item page-prev disabled">
          <a class="page-link" href="#" tabindex="-1">Prev</a>
        </li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item page-next">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul> -->
    </div>
  </div>
</div>
<div class="tab-pane" id="tab-12">
  <div class="card overflow-hidden">
    <div class="d-md-flex">
      <!-- <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">결제완료</span></div> -->
      <div class="item-card9-img">
        <div class="item-card9-imgs">

          <a href="#상품상세페이지"></a>
          <img src="" alt="img" class="cover-image">
        </div>
      </div>
      <div class="card border-0 mb-0">
        <div class="card-body pb-1">
          <a class="product_link" href="#상품상세페이지">
          <div class="row">
            <div class="col-md-6">
               <h4 class="font-weight-semibold mt-1">[<span class="product_name"></span>]</h4>
               <h5 class="font-weight-semibold mt-2">#order_<span class="order_no"></span></h5>
            </div>
            <div class="col-md-6">
              <h5 class="font-weight-semibold mt-2">가격: <b><span class="total_price"></span></b>원</h5>
              <h5 class="font-weight-semibold mt-2">배송비 결제: <span class="delivery_method"></span></h5>
            </div>
          </div>
            <h5 class="font-weight-semibold mt-2">배송비 결제: <span class="order_detail_info"></span></h5>
        </a>
        </div>
        <div class="card-footer">
          <div class="item-card9-footer d-flex">
            <div class="item-card9-cost align-self-center">
              <span class="badge bg-indigo"><h5 class="font-weight-semibold mt-1"><b><span class="order_status">주문상태</span></b></h5></span>
            </div>
            <div class="item-card9-cost ml-auto align-self-center">
              <a class="order_review" href="#후기작성" class="btn btn-primary btn-block" ><h5><b>후기작성</b></h5></a>
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
  var tbody_list = $('.tbody_list');
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
    url: '/admin/delivery/delivery_info_List',
    data: {page:current_page,limit:pageLimit},
    success: function (data) {
      if (data != 'empty') {
        var dataLength = data.length;
        var tbody_tr = $('#tbody_val');
        var pagination_list2 = $('#pagination_list2');

        console.log(data);
        // console.log(data[0]);

        tbody_list.empty();
        pagination_list1.empty();

          data.forEach(function(element, index){
            console.log(`${index}번째 요소 : ${element['address1']}`);
            console.log(index);
            console.log(data[index].no);
            var clone = tbody_tr.clone();
            console.log(clone.find('.delivery_company').val());
            var address = data[index].zipcode+' '+data[index].address1+' '+data[index].address2+' '+data[index].address3;
            var adress_len = textLengthOverCut(address);


            clone.find('.delivery_no_slect').text(data[index].no);
            clone.find('.delivery_no').text(data[index].no);
            clone.find('.delivery_name').text(data[index].name);
            clone.find('.delivery_address').text(adress_len);
            clone.find('.delivery_fee1').text(data[index].delivery_fee1);
            clone.find('.delivery_fee2').text(data[index].delivery_fee2);
            clone.find('.delivery_company').text(data[index].delivery_company);
            clone.find('.delivery_memo').text(data[index].memo);
            clone.find('.list_update_btn').attr('href','/admin_delivery/update_delivery/'+data[index].no);
            clone.find('.list_delete_btn').attr('onClick','delete_confirm('+data[index].no+')');


            tbody_list.append(clone);

          });

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
</script>
