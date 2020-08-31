<?php $admin_order_list = $this->lang->line('admin_order_list');?>
<?php
  // echo "<pre>";
  // var_dump($allData);
  // var_dump($defaultPage);
  // echo "</pre>";
 ?>
    <br />
    <br />
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?=$admin_order_list[0]?></h3>
            <!-- <span class="fa fa-sort-asc"></span>
            <span class="fa fa-sort-desc"></span> -->
          </div>
          <div class="card-body">
            <div class="table-responsive border-top mb-0 ">
              <table class="table table-bordered table-hover text-nowrap mb-0">
                <thead>
                  <tr>
                    <th><?=$admin_order_list[1]?></th>
                    <th>주문자</th>
                    <th>수취인</th>
                    <th><?=$admin_order_list[3]?></th>
                    <th><?=$admin_order_list[4]?></th>
                    <th><?=$admin_order_list[5]?></th>
                  </tr>
                </thead>
                <tbody class="tbody_list" id="tbody_list">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="pagination_list">
      <ul class="pagination" id="pagination_list1">

      </ul>
    </div>
<div class="" style="display:none">
  <table class="table table-bordered table-hover text-nowrap mb-0">
    <thead>
      <tr>
        <th><?=$admin_order_list[1]?></th>
        <th>주문자</th>
        <th>수취인</th>
        <th><?=$admin_order_list[3]?></th>
        <th><?=$admin_order_list[4]?></th>
        <th><?=$admin_order_list[5]?></th>
      </tr>
    </thead>
    <tbody class="tbody_list2">
      <tr class="tbody_val" id= "tbody_val">
        <td><a class="order_no_link">#order_<span class="order_no"></span></a></td>
        <td><span class="order_name"></span></td>
        <td><span class="order_receiver_name"></span></td>
        <td><span class="order_date"></span></td>
        <td class="font-weight-semibold fs-16"><span class="order_cost"></span></td>
        <td>
          <select name="order_status_select" class="form-control custom-select order_status_select" onchange="select_order_status();" disabled>
            <option value="0" selected="">주문완료</option>
            <option value="1">상품준비중</option>
            <option value="2">상품배송</option>
            <option value="3">배송완료</option>
          </select>
        </td>
      </tr>
    </tbody>
  </table>

</div>
<input type="hidden" class="allData" value="<?=$allData?>" />
<input type="hidden" class="defaultPage" value="<?=$defaultPage?>" />

<script>
  listPaging(1);
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

  function listPaging(num){
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
      url: '/admin/order/info_List',
      data: {page:current_page,limit:pageLimit},
      success: function (data) {
        if (data != 'empty') {
          var tbody_tr = $('#tbody_val');
          var pagination_list2 = $('#pagination_list2');
          var tbody_list = $('#tbody_list');
          var pagination_list1 = $('#pagination_list1');
          console.log(data);

          tbody_list.empty();
          pagination_list1.empty();

            data.forEach(function(element, index){

              var clone = tbody_tr.clone();

              clone.find('.order_no').text(data[index].no);
              clone.find('.order_no_link').attr('href', '/admin/order/detail/'+data[index].no);
              clone.find('.order_name').text(data[index].order_name);
              clone.find('.order_receiver_name').text(data[index].reciever_name);
              clone.find('.order_date').text(data[index].regdate);
              clone.find('.order_cost').text(data[index].payment);
              console.log(data[index].order_name);
              console.log(data[index].reciever_name);
              console.log(data[index].regdate);
              console.log(data[index].order_name);
              console.log(data[index].payment);

              var status = parseInt(data[index].status);

              switch (status) {
                case 0:
                clone.find('.order_status_select option').eq(0).attr('selected', true);
                  break;
                case 1:
                clone.find('.order_status_select option').eq(1).attr('selected', true);
                  break;
                case 2:
                clone.find('.order_status_select option').eq(2).attr('selected', true);
                  break;
                case 3:
                clone.find('.order_status_select option').eq(3).attr('selected', true);
                  break;
              }
              tbody_list.append(clone);
              console.log('붙여넣기');
            });

            // var clone2 = pagination_list2.clone();
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
