<br />
<div class="row">
  <div class="col-md-12">
<div class="card">
  <div class="card-header">
    <h3 class="card-title">상품 리스트</h3>
  </div>
  <div class="card-body">
    <div class="table-responsive border-top userprof-tab">
      <table class="table table-bordered table-hover mb-0 text-nowrap">
        <thead>
          <tr>
            <th class="text-center"></th>
            <th class="text-center">이미지</th>
            <th class="text-center">카테고리</th>
            <th class="text-center">상품명</th>
            <th class="text-center">제목</th>
            <th class="text-center">판매가</th>
            <th class="text-center">할인금액</th>
            <th class="text-center">등록일</th>
            <th class="text-center">수정일</th>
            <th class="text-center"></th>
          </tr>
        </thead>
        <tbody class="tbody_list">

        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
<div class="" style="display:none">
  <table class="table table-bordered table-hover mb-0 text-nowrap">
    <thead>
      <tr>
        <th class="text-center"></th>
        <th class="text-center">이미지</th>
        <th class="text-center">카테고리</th>
        <th class="text-center">상품명</th>
        <th class="text-center">제목</th>
        <th class="text-center">판매가</th>
        <th class="text-center">할인금액</th>
        <th class="text-center">등록일</th>
        <th class="text-center">수정일</th>
        <th class="text-center"></th>
      </tr>
    </thead>
    <tbody class="tbody_list2">
      <tr class="tbody_val" id= "tbody_val">
        <td>
          <label class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input product_no_slect" name="product_no_slect" value="">
            <span class="custom-control-label"></span>
          </label>
        </td>
        <td class="text-center">
          <img src="/static/lib/assets/theme/images/photos/1.jpg" class="product_img w-7 h-7 " alt="image">
        </td>
        <td class="text-center">
          <span class="product_category text-center">강아지/강아지간식/저키</span>
        </td>
        <td class="text-center">
          <span class="product_name text-center">저키</span>
        </td>
        <td class="text-center">
          <span class="product_title">뇸뇸뇸</span>
        </td>
        <td class="font-weight-semibold fs-16 text-center"><span class="product_price">3000</span></td>
        <td class="font-weight-semibold fs-16 text-center"><span class="product_discount">6000</span></td>
        <td class="text-center"><span class="product_regdate">2020-01-01</span></td>
        <td class="text-center"><span class="product_update">2020-01-02</span></td>
        <td class="text-center">
          <a class="btn btn-success btn-sm text-white list_update_btn"><i class="fa fa-pencil">수정</i></a>
          <a class="btn btn-danger btn-sm text-white list_delete_btn"><i class="fa fa-trash-o">삭제</i></a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<div class="pagination_list">
  <ul class="pagination" id="pagination_list1">

  </ul>
</div>
<!-- <a href="#" onclick="pageChange(this)">전체</a> -->
    <input type="hidden" class="allData" value="<?=$allData?>" />
    <input type="hidden" class="defaultPage" value="<?=$defaultPage?>" />
<script>

listPaging(1);

function delete_confirm(num){
  if(confirm('삭제하시겠습니까?')){
    alert('ㅇㅋ 지움');
    location.href="/admin_product/delete/"+num;
    // clone.find('.list_update_btn').attr('href','/admin_delivery/update_delivery/'+data[index].no);
  }else{
    alert('안지움');
  }
}

function delivery_no_select(){
  $("input[name=delivery_no_slect]:checked").each(function() {
        console.log( 'checkbox값 : '+$(this).val() );
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
    url: '/admin/product/info_List',
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
            console.log(index);
            console.log(data[index].no);
            var clone = tbody_tr.clone();
            // var adress_len = textLengthOverCut(address);

            clone.find('.product_no_slect').text(data[index].no);

            var item = data[index]['img'];

            if(item.length == 0 || item.length == null || item.length == false ){
              var img_src = '/static/lib/assets/theme/images/faces/male/25.jpg';
            }else{
              var img_src = data[index]['img'][0]['fileURL'] + data[index]['img'][0]['filename'] +'.'+ data[index]['img'][0]['fileExe'];
            }

            clone.find('.product_img').attr('src',img_src);

            var category_name = '';
            if(data[index].product_sub.length !== 0){
              category_name = data[index].product_sub[0]['name'];
            }
            else if(data[index].product_middle.length !== 0)
            {
              category_name = data[index].product_middle[0]['name'];
            }
            else
            {
              category_name = data[index].product_main[0]['name'];
            }
            clone.find('.product_category').text(category_name);
            clone.find('.product_name').text(data[index].name);
            clone.find('.product_title').text(data[index].title);
            clone.find('.product_price').text(data[index].price);
            clone.find('.product_discount').text(data[index].discount_price);
            clone.find('.product_regdate').text(data[index].regdate);
            clone.find('.product_update').text(data[index].update);
            clone.find('.list_update_btn').attr('href','/admin/product/update/'+data[index].no);
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

/** @param txt<br/>
   *  @param len : 생략시 기본값 20<br/>
   *  @param lastTxt : 생략시 기본값 "..."<br/>
   *  @returns 결과값
   * <br/>
   * <br/>
   * 특정 글자수가 넘어가면 넘어가는 글자는 자르고 마지막에 대체문자 처리<br/>
   *  ex) 가나다라마바사 -> textLengthOverCut('가나다라마바사', '5', '...') : 가나다라마...<br/>
   */
  function textLengthOverCut(txt, len, lastTxt) {
      if (len == "" || len == null) { // 기본값
          len = 20;
      }
      if (lastTxt == "" || lastTxt == null) { // 기본값
          lastTxt = "...";
      }
      if (txt.length > len) {
          txt = txt.substr(0, len) + lastTxt;
      }
      return txt;
  }


</script>
