    <div class="page-header">
      <h1 class="page-title">Users</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Settings</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
      </ol>
    </div>
    <div class="row ">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane active " id="tab1">
                <div class="mail-option">
                  <!-- <div class="chk-all">
                    <div class="btn-group">
                      <a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false">
                        등급설정
                        <i class="fa fa-angle-down "></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="#">일반</a></li>
                        <li><a href="#">스페셜</a></li>
                        <li><a href="#">VIP</a></li>
                        <li><a href="#">VVIP</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="chk-all">
                    <div class="btn-group">
                      <a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false">
                        상태설정
                        <i class="fa fa-angle-down "></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="#">활동</a></li>
                        <li><a href="#">활동중지</a></li>
                        <li><a href="#">탈퇴</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="btn-group hidden-phone">
                    <a  href="#" class="btn mini blue">
                      수정
                    </a>
                  </div> -->
                  <!-- <ul class="unstyled inbox-pagination">
                    <li><span>1-20 of 1,737 items</span></li>
                    <li><span>1-20 / 전체 회원 수</span></li>
                    <li>
                      <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                    </li>
                  </ul> -->
                </div>
                <div class="table-responsive border-top">
                  <table class="table card-table table-bordered table-hover table-vcenter mb-0 text-nowrap">
                    <thead>
                      <tr>
                        <th class="w-1" style="width:1%"></th>
                        <th class="w-1" style="width:20%">Email</th>
                        <th class="w-1" style="width:10%">이름</th>
                        <th style="width:10%">연락처 1</th>
                        <th style="width:10%">연락처 2</th>
                        <th style="width:30%">주소</th>
                        <th style="width:9%">상태</th>
                        <th style="width:10%">가입일자</th>
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
      </div>
    </div>
    <input type="hidden" class="allData" value="<?=$allData?>" />
    <input type="hidden" class="defaultPage" value="<?=$defaultPage?>" />

    <div class="table-responsive border-top" style="display:none">
      <table class="table card-table table-bordered table-hover table-vcenter mb-0 text-nowrap">
        <thead>
          <tr>
            <th class="w-1" style="width:10%"></th>
            <th class="w-1">Email</th>
            <th class="w-1">이름</th>
            <th >연락처 1</th>
            <th >연락처 2</th>
            <th>주소</th>
            <th>상태</th>
            <th>가입일자</th>
          </tr>
        </thead>
        <tbody>
          <tr  class="tbody_val" id="tbody_val">
            <th class="pl-3">
              <label class="custom-control custom-checkbox p-0">
                <input type="checkbox" class="custom-control-input p-0 user_no" name="checkbox" value="checkbox">
                <span class="custom-control-label"></span>
              </label>
            </th>
            <td class="user_email">jakespeson@gmail.com</td>
            <td class="user_name">홍길동</td>
            <td class="user_tel1">000-0000-0000</td>
            <td class="user_tel2">000-0000-0000</td>
            <td class="user_addr">(00000)서울특별시</td>
            <td class="user_status">
              <select name="user_status_select" class="form-control custom-select user_status_select">
                <option value="0">활동</option>
                <option value="1">중지</option>
                <option value="2">탈퇴</option>
              </select>
            </td>
            <td class="user_regdate">Apr 02,2015 09.30pm</td>

          </tr>
        </tbody>
        <tfoot>
            <tr>
              <th class="w-1 pl-0" style="width:5%"></th>
              <th class="w-1" style="width:20%">Email</th>
              <th class="w-1" style="width:10%">이름</th>
              <th style="width:10%">연락처 1</th>
              <th style="width:10%">연락처 2</th>
              <th style="width:30%">주소</th>
              <th style="width:5%">상태</th>
              <th style="width:10%">가입일자</th>
            </tr>
          </tr>
        </tfoot>
      </table>
    </div>

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
          url: '/admin/member/info_List',
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
                  clone.find('.user_link').attr('href', '/admin/member/detail/'+data[index].no);
                  clone.find('.user_no').val(data[index].no);
                  clone.find('.user_email').text(data[index].email);
                  clone.find('.user_email').attr('onClick', 'location.href="/admin/member/detail/'+data[index].no + '"');
                  clone.find('.user_name').attr('onClick', 'location.href="/admin/member/detail/'+data[index].no + '"');

                  clone.find('.user_name').text(data[index].name);

                  var user_tel1 = data[index].tel1;
                  if( user_tel1 == null || user_tel1 == '')
                  {
                    var tel1 = '';
                  }
                  else
                  {
                    var tel1 = data[index].tel1;
                  }
                  clone.find('.user_tel1').text(tel1);
                  clone.find('.user_tel1').attr('onClick', 'location.href="/admin/member/detail/'+data[index].no + '"');

                  var user_tel2 = data[index].tel2;
                  if(user_tel2 == null || user_tel2 == '')
                  {
                    var tel2 = '';
                  }
                  else
                  {
                    var tel2 = data[index].tel2;
                  }
                  clone.find('.user_tel2').text(tel2);
                  clone.find('.user_tel2').attr('onClick', 'location.href="/admin/member/detail/'+data[index].no + '"');


                  if(data[index].zipcode == null || data[index].zipcode == '')
                  {
                    var addr ='';
                  }
                  else{

                    var addr = '(' +data[index].zipcode + ') ' + data[index].address1 +' ' + data[index].address2 +' ' + data[index].address3;
                  }
                  clone.find('.user_addr').text(addr);
                  clone.find('.user_addr').attr('onClick', 'location.href="/admin/member/detail/'+data[index].no + '"');
                  clone.find('.user_regdate').text(data[index].regdate);
                  clone.find('.user_regdate').attr('onClick', 'location.href="/admin/member/detail/'+data[index].no + '"');

                  var status = parseInt(data[index].status);
                  console.log(status);
                  switch (status) {
                    case 0:
                    clone.find('.user_status_select option').eq(0).attr('selected', true);
                      break;
                    case 1:
                    clone.find('.user_status_select option').eq(1).attr('selected', true);
                      break;
                    case 2:
                    clone.find('.user_status_select option').eq(2).attr('selected', true);
                      break;
                  }
                  clone.find('.user_status_select').attr('disabled', true);
                  tbody_list.append(clone);
                  // console.log('붙여넣기');
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
