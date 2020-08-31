<br />
<div class="row">
  <div class="col-md-12">
<div class="card">
  <div class="card-header">
    <h3 class="card-title">배송지리스트</h3>
  </div>
  <div class="card-body">
    <div class="table-responsive border-top userprof-tab">
      <table class="table table-bordered table-hover mb-0 text-nowrap">
        <thead>
          <tr>
            <th class="text-center"></th>
            <th class="text-center">번호</th>
            <th class="text-center">배송지이름</th>
            <th class="text-center">주소</th>
            <th class="text-center">편도배송비</th>
            <th class="text-center">왕복배송비</th>
            <th class="text-center">택배사</th>
            <th class="text-center">메모</th>
            <th class="text-center"></th>
          </tr>
        </thead>
        <tbody class="tbody_list ">

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
        <th class="text-center">번호</th>
        <th class="text-center">배송지이름</th>
        <th class="text-center">주소</th>
        <th class="text-center">편도배송비</th>
        <th class="text-center">왕복배송비</th>
        <th class="text-center">택배사</th>
        <th class="text-center">메모</th>
        <th class="text-center"></th>
      </tr>
    </thead>
    <tbody class="tbody_list2">
      <tr class="tbody_val" id= "tbody_val">
        <td>
          <label class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input delivery_no_slect" name="delivery_no_slect" value="1">
            <span class="custom-control-label"></span>
          </label>
        </td>
        <td class="text-center">
          <span class="delivery_no ">1</span>
        </td>
        <td class="text-center">
          <span class="delivery_name text-center">배송지1</span>
        </td>
        <td class="text-center">
          <span class="delivery_address">(우편번호)주소1상세참고</span>
        </td>
        <td class="font-weight-semibold fs-16 text-center"><span class="delivery_fee1">3000</span></td>
        <td class="font-weight-semibold fs-16 text-center"><span class="delivery_fee2">6000</span></td>
        <td class="text-center"><span class="delivery_company">한진</span></td>
        <td class="text-center"><span class="delivery_memo">띠용</span></td>
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
  location.href="/admin/delivery/deleteInfo/"+num;
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

function product_upate(num){
  alert(num+' 수정');
}

function product_delete(num){
  alert(num+' 삭제');
}


</script>
