    <div class="page-header">
      <h1 class="page-title">Users</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Apps</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
      </ol>
    </div>
    <div class="row ">
      <div class="col-lg-12">
        <div class="input-group mb-3">
          <input type="text" class="form-control br-tl-7 br-bl-7" placeholder="">
          <div class="input-group-append ">
            <button type="button" class="btn btn-white br-tr-7 br-br-7">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="table-responsive border-top">
              <table class="table card-table table-bordered table-hover table-vcenter">
                <thead>
                  <tr>
                    <th class="w-1"></th>
                    <th>ID</th>
                    <th>이름</th>
                    <th>이메일</th>
                    <th>연락처</th>
                    <th>직급</th>
                    <th class="w-1"></th>
                  </tr>
                </thead>
                <tbody class="tbody_list" id="tbody_list">

                </tbody>
              </table>
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
    <div style="display:none">
      <table class="table card-table table-bordered table-hover table-vcenter">
        <thead>
          <tr>
            <th class="w-1"></th>
            <th>ID</th>
            <th>이름</th>
            <th>이메일</th>
            <th>연락처</th>
            <th>직급</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
        <tr class="tbody_val" id="tbody_val">
          <th>
            <label class="custom-control custom-checkbox">
              <input type="checkbox admin_no" class="custom-control-input" name="checkbox" value="">
              <span class="custom-control-label"></span>
            </label>
          </th>
          <td class="admin_id">admin_01</td>
          <td class="admin_name">Jane Pearson</td>
          <td class="admin_email">Jane@gmail.com</td>
          <td class="admin_tel">010-5555-3333</td>
          <td class="admin_position">Web Designer</td>
          <td>
            <a href="javascript:void(0)" class="dropdown-item admin_update"><i class="dropdown-icon fe fe-edit-2"></i> 수정 </a>
          </td>
        </tr>
        </tbody>
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
          url: '/admin/user/info_List',
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
                  clone.find('.admin_no').val(data[index].no);
                  clone.find('.admin_id').text(data[index].id);
                  clone.find('.admin_name').text(data[index].name);
                  clone.find('.admin_email').text(data[index].email);
                  clone.find('.admin_tel').text(data[index].tel);

                  var position = data[index].position;
                  var position_val = '';
                  position = parseInt(position);
                  switch (position) {
                    case 1:
                      position_val = 'admin';
                      break;
                    case 2:
                    position_val = '판매/상품관리';
                      break;
                    case 3:
                    position_val = '고객관리';
                      break;
                    case 4:
                    position_val = 'CMS';
                      break;
                  }
                  clone.find('.admin_position').text(position_val);
                  clone.find('.admin_update').attr('href','/admin/user/detail/'+data[index].no);

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
