<!-- WYSIWYG Editor css -->
<link href="/static/lib/assets/theme/plugins/wysiwyag/richtext.css" rel="stylesheet" />
<br />
<br />
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">상품 등록</div>
          </div>
          <form class="form-horizontal" action="/admin/post_test" method="post">
            <div class="card-body">
                <div class="form-group">
                  <input type="hidden" class="form-control main_category_value" name="main_category_value"/>
                  <input type="hidden" class="form-control middle_category_value" name="middle_category_value"/>
                  <input type="hidden" class="form-control sub_category_value" name="sub_category_value"/>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label class="form-label main_category">카테고리 대분류</label>
                    </div>
                    <div class="col-md-8">
                      <select class="form-control select2 main_category_select" data-placeholder="Choose Browser" onChange="category_change(0)">
                      </select>
                    </div>
                    <div class="col-md-1">
                      <button type="button" class="btn btn-primary waves-effect waves-light btn-block" onclick="category_add_on(0)">추가</button>
                    </div>
                  </div>
                  <div class="row mt-2 main_category_add" style="display:none">
                    <div class="col-md-3">
                      <label class="form-label "></label>
                    </div>
                    <div class="col-md-8 col-xs-10">
                      <input type="text" class="form-control main_category_add_name" name="main_category_add_name"  placeholder="추가할 카테고리명" disabled/>
                    </div>
                    <div class="col-md-1 col-xs-2">
                      <button type="button" class="btn btn-primary btn-block waves-effect waves-light" onclick="category_add(0)">추가</button>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label class="form-label middle_category">카테고리 중분류</label>
                    </div>
                    <div class="col-md-8">
                      <select class="form-control select2 middle_category_select" data-placeholder="Choose Browser" onChange="category_change(1)">
                      </select>
                    </div>
                    <div class="col-md-1">
                      <button type="button" class="btn btn-primary waves-effect waves-light btn-block" onclick="category_add_on(1)">추가</button>
                    </div>
                  </div>
                  <div class="row mt-2 middle_category_add" style="display:none">
                    <div class="col-md-3">
                      <label class="form-label "></label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" class="form-control middle_category_add_name" name="middle_category_add_name"  placeholder="추가할 카테고리명" disabled/>
                    </div>
                    <div class="col-md-1">
                      <button type="button" class="btn btn-primary waves-effect waves-light btn-block" onclick="category_add(1)">추가</button>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label class="form-label sub_category">카테고리 소분류</label>
                    </div>
                    <div class="col-md-8">
                      <select class="form-control select2 sub_category_select" data-placeholder="Choose Browser" onChange="category_change(2)">
                      </select>
                    </div>
                    <div class="col-md-1">
                      <button type="button" class="btn btn-primary waves-effect waves-light btn-block" onclick="category_add_on(2)">추가</button>
                    </div>
                  </div>
                  <div class="row mt-2 sub_category_add" style="display:none">
                    <div class="col-md-3">
                      <label class="form-label "></label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" class="form-control sub_category_add_name" name="sub_category_add_name"  placeholder="추가할 카테고리명" disabled/>
                    </div>
                    <div class="col-md-1">
                      <button type="button" class="btn btn-primary waves-effect waves-light btn-block" onclick="category_add(2)">추가</button>
                    </div>
                  </div>
                </div>
                <div class="form-group ">
                  <div class="row">
                    <div class="col-md-3">
                      <label class="form-label mt-2" name="product_title"> 상품 타이틀
                        <span class="label align-self-center text-white" style="background: rgba(172, 50, 228)">필수</span>
                      </label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="product_title" placeholder="" maxlength="50" required/>
                    </div>
                  </div>
                </div>
                <div class="form-group ">
                  <div class="row">
                    <div class="col-md-3">
                      <label class="form-label mt-2" name="product_advertise"> 상품 홍보문구
                        <span class="label align-self-center text-white" style="background: rgba(172, 50, 228)">필수</span>
                      </label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="product_advertise" placeholder="" maxlength="50" required/>
                    </div>
                  </div>
                </div>
                <div class="form-group ">
                  <div class="row">
                    <div class="col-md-3">
                      <label class="form-label mt-2" name="product_price">판매가
                        <span class="label align-self-center text-white" style="background: rgba(172, 50, 228)">필수</span>
                      </label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control product_price" name="product_price"  placeholder="" onchange="price_cal(0)" required/>
                    </div>
                  </div>
                </div>
                <div class="form-group product_discount_price_group" style="display: none">
                  <div class="row">
                    <div class="col-md-3">
                      <label class="form-label mt-2" name="product_discount_price">할인가</label>
                    </div>
                    <div class="col-md-9 mb-2">
                      <input type="text" class="form-control product_discount_price" name="product_discount_price"  onchange="price_cal(1)" placeholder="예) 1000" required/>
                    </div>
                  </div>
                </div>
                <div class="form-group product_discount_rate_group" style="display: none">
                  <div class="row mb-4 mt-2">
                    <div class="col-md-3">
                      <label class="form-label mt-2" name="product_discount_rate_1">할인율(%)</label>
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control product_discount_rate_1" name="product_discount_rate_1" onchange="price_cal(2)" placeholder="예) 10%"required/>
                    </div>
                    <div class="col-md-3">
                      <label class="form-label mt-2" name="product_discount_rate_2">할인금액</label>
                    </div>
                    <div class="col-md-3">
                      <input type="text" class="form-control product_discount_rate_2" name="product_discount_rate_2" onchange="price_cal(3)"  placeholder="예) 1000"required/>
                    </div>
                  </div>
                </div>
                <div class="form-group ">
                  <div class="row">
                    <div class="col-md-3">
                      <label class="form-label">배송비설정</label>
                    </div>
                    <div class="col-md-9">
                      <select class="form-control delivery_select" onchange="delivery_info()">
                        <option selected="">선택</option>
                        <option>무료배송</option>
                        <option>유료배송</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mt-2 delivery_setting" style="display:none">
                    <div class="col-md-3">
                      <label class="form-label"></label>
                    </div>
                    <div class="col-md-9">
												<div class="expanel expanel-default ">
													<div class="expanel-heading">
														<h3 class="expanel-title">배송비 세부 설정</h3>
													</div>
													<div class="expanel-body">
                            <div class="row">
                              <div class="col-md-2">
                                <label class="form-label mt-2" name="delivery_name_1">편도 배송비</label>
                              </div>
                              <div class="col-md-4">
                                <input type="text" class="form-control delivery_value_1" name="delivery_value_1"  placeholder="예) 2500" required/>
                              </div>
                              <div class="col-md-2">
                                <label class="form-label mt-2" name="delivery_name_2">반품 배송비</label>
                              </div>
                              <div class="col-md-4">
                                <input type="text" class="form-control delivery_value_2" name="delivery_value_2"  placeholder="예) 5000" required/>
                              </div>
                            </div>
													</div>
												</div>
											</div>
                  </div>
                </div>
                <div class="form-group ">
                  <div class="row">
                    <div class="col-md-3">
                      <label class="form-label mt-2" name="product_discount_price">옵션</label>
                    </div>
                    <div class="col-md-9">
                      <div class="panel panel-primary">
                        <div class="tab-menu-heading">
                          <div class="tabs-menu1 ">
                            <!-- Tabs -->
                            <ul class="nav panel-tabs option_panel">
                              <li ><a href="#tab0" class="active" data-toggle="tab" onclick="option_info(0)">단품</a></li>
                              <li ><a href="#tab1" data-toggle="tab" onclick="option_info(1)">옵션 1개</a></li>
                              <li ><a href="#tab2" data-toggle="tab" onclick="option_info(2)">옵션 2개</a></li>
                              <li ><a href="#tab3" data-toggle="tab" onclick="option_info(3)">옵션 3개</a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="panel-body tabs-menu-body">
                          <div class="tab-content">
                            <div class="tab-pane active " id="tab0">
                              <div class="row">
                                <div class="col-md-2">
                                  <label class="form-label mt-2" name="product_otp_name_1">옵션명 1</label>
                                </div>
                                <div class="col-md-4">
                                  <input type="text" class="form-control product_otp_name_1" name="product_otp_name_1"  value="단품" readonly required/>
                                </div>
                                <div class="col-md-2">
                                  <label class="form-label mt-2" name="product_otp_value_1">옵션 1</label>
                                </div>
                                <div class="col-md-4">
                                  <input type="text" class="form-control" name="product_otp_value_1"  value="단품" readonly required/>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane " id="tab1">

                            </div>
                            <div class="tab-pane " id="tab2">

                            </div>
                            <div class="tab-pane " id="tab3">

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group ">
                  <div class="row">
                    <div class="col-md-3">
                      <label class="form-label mt-2" name="product_title"> 상품 상세설명
                        <span class="label align-self-center text-white" style="background: rgba(172, 50, 228)">필수</span>
                      </label>
                    </div>
                    <div class="col-md-9">
                      <textarea class="content" name="product_description"></textarea>
                    </div>
                  </div>
                </div>
            </div>
            <div class="form-group ">
              <div class="card-header">
                <div class="card-title">상품 이미지</div>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input img_file" name="img_file[]" id="img_file_0" onChange="file_click(0)" />
                          <label class="custom-file-label img_file_url">이미지 선택</label>
                          <input type="hidden" class="img_src_data" name="img_src_data[]" />
                        </div>
                      </div>
                      <div class="p-2 border mb-4">
                        <div class="upload-images d-flex">
                          <div class="col-6">
                            <img class="img_src" src="/static/lib/assets/theme/images/faces/male/25.jpg" alt="img" class="w73 h73 border p-0">
                          </div>
                          <div class="col-6 ml-3 mt-2">
                            <h6 class="mb-0 mt-1 font-weight-bold img_file_width">가로</h6>
                            <h6 class="mb-0 mt-1 font-weight-bold img_file_height">세로</h6>
                            <h6 class="mb-0 mt-1 img_file_volume">용량</h6>
                            <a href="#" class="btn btn-icon btn-danger btn-sm mt-1" onclick="file_delete(0)"><i class="fa fa-trash-o">삭제</i></a>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input img_file" name="img_file[]" id="img_file_1" onChange="file_click(1)">
                          <label class="custom-file-label img_file_url">이미지 선택</label>
                          <input type="hidden" class="img_src_data" name="img_src_data[]" />
                        </div>
                      </div>
                      <div class="p-2 border mb-4">
                        <div class="upload-images d-flex">
                          <div class="col-6">
                            <img class="img_src" src="/static/lib/assets/theme/images/faces/male/25.jpg" alt="img" class="w73 h73 border p-0">
                          </div>
                          <div class="col-6 ml-3 mt-2">
                            <h6 class="mb-0 mt-1 font-weight-bold img_file_width">가로</h6>
                            <h6 class="mb-0 mt-1 font-weight-bold img_file_height">세로</h6>
                            <h6 class="mb-0 mt-1 img_file_volume">용량</h6>
                            <a href="#" class="btn btn-icon btn-danger btn-sm mt-1" onclick="file_delete(1)"><i class="fa fa-trash-o">삭제</i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input img_file" name="img_file[]" id="img_file_2" onChange="file_click(2)">
                          <label class="custom-file-label img_file_url">이미지 선택</label>
                          <input type="hidden" class="img_src_data" name="img_src_data[]" />
                        </div>
                      </div>
                      <div class="p-2 border mb-4">
                        <div class="upload-images d-flex">
                          <div class="col-6">
                            <img class="img_src" src="/static/lib/assets/theme/images/faces/male/25.jpg" alt="img" class="w73 h73 border p-0">
                          </div>
                          <div class="col-6 ml-3 mt-2">
                            <h6 class="mb-0 mt-1 font-weight-bold img_file_width">가로</h6>
                            <h6 class="mb-0 mt-1 font-weight-bold img_file_height">세로</h6>
                            <h6 class="mb-0 mt-1 img_file_volume">용량</h6>
                            <a href="#" class="btn btn-icon btn-danger btn-sm mt-1" onclick="file_delete(2)"><i class="fa fa-trash-o">삭제</i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input img_file" name="img_file[]" id="img_file_3" onChange="file_click(3)">
                          <label class="custom-file-label img_file_url">이미지 선택</label>
                          <input type="hidden" class="img_src_data" name="img_src_data[]" />
                        </div>
                      </div>
                      <div class="p-2 border mb-4">
                        <div class="upload-images d-flex">
                          <div class="col-6">
                            <img class="img_src" src="/static/lib/assets/theme/images/faces/male/25.jpg" alt="img" class="w73 h73 border p-0">
                          </div>
                          <div class="col-6 ml-3 mt-2">
                            <h6 class="mb-0 mt-1 font-weight-bold img_file_width">가로</h6>
                            <h6 class="mb-0 mt-1 font-weight-bold img_file_height">세로</h6>
                            <h6 class="mb-0 mt-1 img_file_volume">용량</h6>
                            <a href="#" class="btn btn-icon btn-danger btn-sm mt-1" onclick="file_delete(3)"><i class="fa fa-trash-o">삭제</i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          <div class="form-group mb-5 ml-1 mr-1 row justify-content-end">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">등록하기</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>

<script>
  category_view();

  /*--카테고리추가 Add--*/
  function category_add(num){
    var parent_id = '';
    var new_category = '';
    var classification ='';
    var add_name = '';
    var select_category='';

    switch (num) {
      case 0:
        add_name= $('.main_category_add_name').val();
        select_category = $('.main_category_add_name');

        parent_id = 0;
        new_category = add_name;
        classification = '대분류';
        break;
      case 1:
        add_name= $('.middle_category_add_name').val();
        select_category = $('.middle_category_add_name');

        parent_id = $('.main_category_select  option:selected').val();
        new_category = add_name;
        classification = '중분류';
        break;
      case 2:
        add_name= $('.sub_category_add_name').val();
        select_category = $('.sub_category_add_name');

        parent_id = $('.middle_category_select  option:selected').val();
        new_category = add_name;
        classification = '소분류';
        break;
      default:
        break;
    }

    if(add_name != '' || add_name != false){
      $.ajax({
          url : "/admin/category_add",
          type : "post",
          data : {
            'product_category_classification': classification,
            'product_category_name': new_category,
            'product_category_parent_id': parent_id
        },
          dataType:"json",
          success : function(response) {
            console.log(response.product_category_name);
            // alert(response.product_category_name+' 카테고리 추가 성공');
            category_view();
          },
          error : function(response) {
            alert('카테고리 추가 실패');
            }
      });
    }else{
      alert('공란입니다.');
      select_category.focus();
    }
  }
  /*--카테고리추가 Add--*/

  /*--카테고리추가ON--*/
  function category_add_on(num){
    switch (num) {
      case 0:
        // alert('대분류');
        // var category_select = $('.main_category_select  option:selected').text();
        $('.main_category_select').children('option').eq(0).prop('selected',true);
        $('.main_category_add').attr('style','');
        $('.middle_category_add').attr('style','display:none');
        $('.sub_category_add').attr('style','display:none');
        $('.sub_category_select').val('');
        $('.middle_category_select').val('');
        $('.sub_category_select').attr('disabled',true);
        $('.middle_category_select').attr('disabled',true);


        $('.main_category_add_name').focus();
        break;
      case 1:
        // alert('중분류');
        var category_select = $('.main_category_select  option:selected').text();
        if(category_select == '' || category_select == '선택'){
          alert('대분류 카테고리부터 선택해 주세요.');
          $('.main_category_add').attr('style','display:none');
          $('.middle_category_add').attr('style','display:none');
          $('.sub_category_add').attr('style','display:none');
          $('.sub_category_select').attr('disabled',true);
          $('.sub_category_select').val('');
        }else{
          $('.main_category_add').attr('style','display:none');
          $('.middle_category_add').attr('style','');
          $('.sub_category_add').attr('style','display:none');
        }

        break;
      case 2:
        // alert('소분류');
        var category_select1 = $('.main_category_select  option:selected').text();
        var category_select2 = $('.middle_category_select  option:selected').text();
        if(category_select1 == '' || category_select2 == '' || category_select1 == '선택' || category_select2 == '선택'){
          alert('상위 카테고리를 선택해 주세요.');
          $('.main_category_add').attr('style','display:none');
          $('.middle_category_add').attr('style','display:none');
          $('.sub_category_add').attr('style','display:none');
        }else{
        $('.main_category_add').attr('style','display:none');
        $('.middle_category_add').attr('style','display:none');
        $('.sub_category_add').attr('style','');
        }
        break;
      default:
        break;

    }

  }
  /*--카테고리추가ON--*/


  /*--카테고리 VIEW--*/
  function category_view(){

    var category = 0;
    // var category = $('.main_category_select  option:selected').text();

    $.ajax({
        url : "/admin/category_view",
        type : "post",
        data : {'category': category},
        dataType:"json",
        success : function(response) {
          $('.main_category_select option').remove();
          $('.middle_category_select option').remove();
          $('.sub_category_select option').remove();
          var defaultOpt = $("<option value='0' name='category1' selected>선택</option>");
          $('.main_category_select').append(defaultOpt);

          var result = response.forEach(function (value, index, array) {

            var option = $("<option value='"+value.product_category_id+"' name='category1'>"+value.product_category_name+"</option>");
              $('.main_category_select').append(option);

          });
          $('.middle_category_select').attr('disabled',true);
          $('.sub_category_select').attr('disabled',true);
          $('.main_category_add').attr('style','display:none');
          $('.middle_category_add').attr('style','display:none');
          $('.sub_category_add').attr('style','display:none');
          $('.main_category_add_name').val('');
          $('.middle_category_add_name').val('');
          $('.sub_category_add_name').val('');

        },
        error : function(response) {
          // console.log(response);
          }
    });
  }
  /*--카테고리 VIEW--*/

  /*--카테고리 change--*/
  function category_change(num){

    var category = '';

    switch (num) {
      case 0:
        category_text = $('.main_category_select  option:selected').text();
        category_value = $('.main_category_select  option:selected').val();
        break;
      case 1:
        category_text = $('.middle_category_select  option:selected').text();
        category_value = $('.middle_category_select  option:selected').val();
        break;
      case 2:
        category_text = $('.sub_category_select  option:selected').text();
        category_value = $('.sub_category_select  option:selected').val();
        break;
      default:
        break;
    }
    if(category_text != '선택'){
      $.ajax({
          url : "/admin/category_view",
          type : "post",
          data : {'category': category_value},
          dataType:"json",
          success : function(response) {

            var defaultOpt = "<option value='0' selected>선택</option>";
            switch (num) {
              case 0:
                $('.middle_category_select option').remove();
                $('.sub_category_select option').remove();
                $('.sub_category_select').attr('disabled',true);
                $('.middle_category_select').attr('disabled',false);
                $('.middle_category_select').append(defaultOpt);

                var result = response.forEach(function (value, index, array) {
                  var option = "<option value='"+value.product_category_id+"'>"+value.product_category_name+"</option>";
                  $('.middle_category_select:last').append(option);
                });

                $('.main_category_value').val(category_value);
                $('.middle_category_value').val('');
                $('.sub_category_value').val('');

                break;
              case 1:
                $('.sub_category_select option').remove();
                $('.middle_category_select').attr('disabled',false);
                $('.sub_category_select').attr('disabled',false);
                $('.sub_category_select').append(defaultOpt);

                var result = response.forEach(function (value, index, array) {
                  var option = "<option value='"+value.product_category_id+"'>"+value.product_category_name+"</option>";
                  $('.sub_category_select:last').append(option);
                });

                $('.middle_category_value').val(category_value);
                $('.sub_category_value').val('');

                break;
              case 2:
                $('.sub_category_value').val(category_value);
                break;
              default:
                break;
            }

          },
          error : function(response) {
            // console.log(response);
            }
      });
    } else{
      switch (num) {
        case 0:
          $('.middle_category_select option').remove();
          $('.sub_category_select option').remove();
          $('.sub_category_select').attr('disabled',true);
          $('.middle_category_select').attr('disabled',true);
          $('.main_category_value').val('');
          $('.middle_category_value').val('');
          $('.sub_category_value').val('');
          break;
        case 1:
          $('.sub_category_select option').remove();
          $('.middle_category_select').attr('disabled',false);
          $('.sub_category_select').attr('disabled',true);
          $('.middle_category_value').val('');
          $('.sub_category_value').val('');
          break;
        case 2:
          $('.sub_category_value').val('');
          break;
        default:
          break;
      }
    }

  }
  /*--카테고리 change--*/

  /*--배송비--*/
  function delivery_info(){
    var delivery_select = $('.delivery_select  option:selected').text();

    switch (delivery_select) {
      case '무료배송':
        $('.delivery_setting').attr('style','');
        $('.delivery_value_1').val('0');
        $('.delivery_value_2').val('');
        $('.delivery_value_1').attr('readonly',true);
        break;
      case '유료배송':
        $('.delivery_setting').attr('style','');
        $('.delivery_value_1').val('');
        $('.delivery_value_2').val('');
        $('.delivery_value_1').attr('readonly',false);
        break;
      default:

    }
  }
  /*--배송비--*/

  /*--옵션--*/
  function option_info(num){
    var template_text = '';
    // console.log(num);
    $('#tab0').empty();
    $('#tab1').empty();
    $('#tab2').empty();
    $('#tab3').empty();
    switch (num) {
      case 0:
          template_text='<div class="row">\n<div class="col-md-2"><label class="form-label mt-2" name="product_otp_name_1">옵션명 1</label></div>\n<div class="col-md-4"><input type="text" class="form-control product_otp_name_1" name="product_otp_name_1"  value="단품" readonly required/></div>\n<div class="col-md-2"><label class="form-label mt-2" name="product_otp_value_1">옵션 1</label></div>\n<div class="col-md-4"><input type="text" class="form-control" name="product_otp_value_1"  value="단품" readonly required/></div>\n</div>';
          $('#tab0:last').append(template_text);
        break;

      case 1:
          template_text='<div class="row">\n<div class="col-md-2"><label class="form-label mt-2" name="product_otp_name_1">옵션명 1</label></div>\n<div class="col-md-4"><input type="text" class="form-control product_otp_name_1" name="product_otp_name_1"  placeholder="예) 색상" required/></div>\n<div class="col-md-2"><label class="form-label mt-2" name="product_otp_value_1">옵션 1</label></div>\n<div class="col-md-4"><input type="text" class="form-control product_otp_value_1" name="product_otp_value_1"  placeholder="예) 블랙,블루" required/></div>\n</div>';
          $('#tab1:last').append(template_text);
        break;

      case 2:
          template_text ='<div class="row">\n<div class="col-md-2"><label class="form-label mt-2" name="product_otp_name_1">옵션명 1</label></div>\n<div class="col-md-4"><input type="text" class="form-control product_otp_name_1" name="product_otp_name_1"  placeholder="예) 색상" required/></div>\n<div class="col-md-2"><label class="form-label mt-2" name="product_otp_value_1">옵션 1</label></div>\n<div class="col-md-4"><input type="text" class="form-control product_otp_value_1" name="product_otp_value_1"  placeholder="예) 블랙,블루" required/></div>\n</div>\n<div class="row mt-2">\n<div class="col-md-2"><label class="form-label mt-2" name="product_otp_name_2">옵션명 2</label></div>\n<div class="col-md-4"><input type="text" class="form-control product_otp_name_2" name="product_otp_name_2"  placeholder="예) 사이즈" required/></div>\n<div class="col-md-2"><label class="form-label mt-2" name="product_otp_value_2">옵션 2</label></div>\n<div class="col-md-4"><input type="text" class="form-control product_otp_value_2" name="product_otp_value_2"  placeholder="예) S,M,L" required/</div>\n</div>';
          $('#tab2:last').append(template_text);
        break;

      case 3:
          template_text='<div class="row">\n<div class="col-md-2"><label class="form-label mt-2" name="product_otp_name_1">옵션명 1</label></div>\n<div class="col-md-4"><input type="text" class="form-control product_otp_name_1" name="product_otp_name_1"  placeholder="예) 색상" required/></div>\n<div class="col-md-2"><label class="form-label mt-2" name="product_otp_value_1">옵션 1</label></div>\n<div class="col-md-4"><input type="text" class="form-control product_otp_value_1" name="product_otp_value_1"  placeholder="예) 블랙,블루" required/></div>\n</div>\n<div class="row mt-2">\n<div class="col-md-2"><label class="form-label mt-2" name="product_otp_name_2">옵션명 2</label></div>\n<div class="col-md-4"><input type="text" class="form-control product_otp_name_2" name="product_otp_name_2"  placeholder="예) 사이즈" required/></div>\n<div class="col-md-2"><label class="form-label mt-2" name="product_otp_value_2">옵션 2</label></div>\n<div class="col-md-4"><input type="text" class="form-control product_otp_value_2" name="product_otp_value_2"  placeholder="예) S,M,L" required/></div>\n</div>\n<div class="row mt-2">\n<div class="col-md-2"><label class="form-label mt-2" name="product_otp_name_3">옵션명 3</label></div>\n<div class="col-md-4"><input type="text" class="form-control product_otp_name_3" name="product_otp_name_3"  placeholder="예) 성별" required/></div>\n<div class="col-md-2"><label class="form-label mt-2" name="product_otp_value_3">옵션 3</label></div>\n<div class="col-md-4"><input type="text" class="form-control product_otp_value_3" name="product_otp_value_3" placeholder="예) 남,여" required/></div>\n</div>';
          $('#tab3:last').append(template_text);
        break;

      default:
        break;

    }
  }
  /*--옵션--*/

  /*--상품가격설정--*/
  function price_cal(num){
    var product_price = $('.product_price');
    var product_discount_price = $('.product_discount_price');
    var product_discount_rate_1 = $('.product_discount_rate_1');
    var product_discount_rate_2 = $('.product_discount_rate_2');
    var price_rate_1 = '';
    var price_rate_2 = '';
    var price_discount = '';
    var price_product = '';

    switch (num) {
      case 0:
        var return_val = price_null(num);
        if(return_val){
          console.log('판매가 적음');
          $('.product_discount_price_group').attr('style','display:inline');
          $('.product_discount_rate_group').attr('style','display:inline');
        }else{
          console.log('판매가 빈칸');
          product_price.val('');
          product_discount_price.val('');
          product_discount_rate_1.val('');
          product_discount_rate_2.val('');
          $('.product_discount_price_group').attr('style','display:none');
          $('.product_discount_rate_group').attr('style','display:none');
          product_price.focus();
        }

        break;

      case 1:
        var return_val = price_null(num);
        if(return_val){
          console.log('할인가 먼저 적음');
          if(parseInt(product_price.val()) <= parseInt(product_discount_price.val())){
            alert('잘못된 금액입니다.');
            product_discount_price.val('');
            product_discount_price.focus();
          }else{
            price_rate_1 = Math.round(parseFloat(1-(parseInt(product_discount_price.val())/parseInt(product_price.val())))*100); //할인율
            price_rate_2 = parseInt(parseInt(product_price.val())-parseInt(product_discount_price.val())); //할인된 금액
            product_discount_rate_1.val(price_rate_1);
            product_discount_rate_2.val(price_rate_2);
          }
        }else{
          console.log('할인가 빈칸');
          product_discount_price.val('');
          product_discount_price.focus();
        }
        break;

      case 2:
        var return_val = price_null(num);
        if(return_val){
          console.log('할인률 먼저 적음');
          if(parseInt(product_discount_rate_1.val()) >= 100){
            alert('잘못된 할인율입니다.');
            product_discount_rate_1.val('');
            product_discount_rate_1.focus();
          }else{
            price_rate_1 = parseInt(product_discount_rate_1.val());
            product_discount_rate_1.val(parseInt(product_discount_rate_1.val()));
            price_product = parseInt(product_price.val());
            price_discount = Math.floor(((1-(price_rate_1/100))/10)*price_product)*10; //10원 단위로 절사
            // price_discount = Math.round((1-(price_rate_1/100))*price_product);
            price_rate_2 =(price_product-price_discount);
            product_discount_price.val(price_discount);
            product_discount_rate_2.val(price_rate_2);
          }
        }else{
          console.log('할인률 빈칸');
          product_discount_rate_1.val('');
          product_discount_rate_1.focus();
        }
        break;

      case 3:
        var return_val = price_null(num);

        if(return_val){
          if(parseInt(product_discount_rate_2.val()) >= parseInt(product_price.val())){
            alert('잘못된 금액입니다.');
            product_discount_rate_2.val('');
            product_discount_rate_2.focus();
          }else{
            console.log('할인금액 먼저 적음');
            price_rate_2 = parseInt(product_discount_rate_2.val());
            price_product = parseInt(product_price.val());
            price_discount = (price_product-price_rate_2);
            product_discount_price.val(price_discount);
            price_rate_1 = Math.round(parseFloat(1-(parseInt(product_discount_price.val())/parseInt(product_price.val())))*100);
            product_discount_rate_1.val(price_rate_1);
          }
        }else{
          console.log('할인금액 빈칸');
          product_discount_rate_2.val('');
          product_discount_rate_2.focus();
        }
        break;

      default:
        break;

    }

  }
  /*--상품가격설정--*/

  /*--상품가격빈칸설정--*/
  function price_null(num){
    switch (num) {
      case 0:
        if($('.product_price').val() == ''){
          return false;
        }else{
          $('.product_discount_price').val('');
          $('.product_discount_rate_1').val('');
          $('.product_discount_rate_2').val('');
          return true;
        }

        break;

      case 1:
          if($('.product_discount_price').val()==''){
            $('.product_discount_rate_1').val('');
            $('.product_discount_rate_2').val('');
            return false;
          }else{
            $('.product_discount_rate_1').val('');
            $('.product_discount_rate_2').val('');
            return true;
          }
        break;

      case 2:
          if($('.product_discount_rate_1').val()==''){
            $('.product_discount_price').val('');
            $('.product_discount_rate_2').val('');
            return false;
          }else{
            $('.product_discount_price').val('');
            $('.product_discount_rate_2').val('');
            return true;
          }
        break;

      case 3:
        if($('.product_discount_rate_2').val() == ''){
          $('.product_discount_price').val('');
          $('.product_discount_rate_1').val('');
          return false;
        }else{
          $('.product_discount_price').val('');
          $('.product_discount_rate_1').val('');
          return true;
        }
        break;

      default:
        break;

    }
  }
  /*--상품가격빈칸설정--*/

  /*--임시폴더파일_저장--*/
  function file_click(num){
    var form = $("#uploadFrom")[0];
    var formData = new FormData(form);
    formData.append("mode", "temporary_image_upload");
    formData.append("tmpFile", $(".img_file").eq(num)[0].files[0]);
    formData.append("tmpFile2", $(".img_file").eq(num)[0]);

    // ajax로 파일을 업로드 한다.
    $.ajax({
          url : "/file_server/temporary_file_upload"
        , type : "POST"
        , processData : false
        , contentType : false
        , data : formData
        , success:function(response) {
          console.log(response);
            var obj = JSON.parse(response);
            if(obj.ret == "succ") {
                // 업로드된 버튼을 임시폴더에 업로드된 경로의 이미지 파일로 교체한다.
                $(".img_src").eq(num).attr("src", obj.img);
                $(".img_src_data").eq(num).val(obj.img);
                $(".img_file_url").eq(num).text(obj.file_name);
                $(".img_file_width").eq(num).text('가로(px): '+obj.file_size[0]);
                $(".img_file_height").eq(num).text('세로(px): '+obj.file_size[1]);
                $(".img_file_volume").eq(num).text('크기(KB): '+obj.file_volume);

            }else {
                alert(obj.message);
                $(".img_file").eq(num).val("");
                $(".img_src").eq(num).attr("src", "/static/lib/assets/theme/images/faces/male/25.jpg");
                $(".img_src_data").eq(num).val("");
                $(".img_file_url").eq(num).text("");
                $(".img_file_width").eq(num).text("");
                $(".img_file_height").eq(num).text("");
                $(".img_file_volume").eq(num).text("");

                return false;
            }
        }
    });
  }
  /*--임시폴더파일_저장--*/

  /*--임시폴더파일삭제--*/
  function file_delete(num){
    console.log(num);
    var form = $("#deleteFrom")[0];
    var formData = new FormData(form);
    formData.append("mode", "temporary_image_delete");
    formData.append("img_src", $(".img_src_data").eq(num).val());
    formData.append("img_name", $(".img_file_url").eq(num).text());
    //ajax를 통해서 php 컨트롤러에서 파일 삭제하고
    //  $(".img_src").eq(num).attr("src", obj.img);
      // $(".img_src_data").eq(num).val(obj.img);
      // $(".img_file_url").eq(num).text(obj.file_name);
      // $(".img_file_width").eq(num).text('가로(px): '+obj.file_size[0]);
      // $(".img_file_height").eq(num).text('세로(px): '+obj.file_size[1]);
      // $(".img_file_volume").eq(num).text('크기(KB): '+obj.file_volume);
      //위 데이터 초기화하기

      $.ajax({
            url : "/file_server/temporary_file_delete"
          , type : "POST"
          , processData : false
          , contentType : false
          , data : formData
          , success:function(response) {
            console.log(response);
              var obj = JSON.parse(response);
              if(obj.ret == "succ") {
                  //데이터 초기화하기
                  $(".img_src").eq(num).attr("src", "/static/lib/assets/theme/images/faces/male/25.jpg");
                  $(".img_src_data").eq(num).val("");
                  $(".img_file_url").eq(num).text("");
                  $(".img_file_width").eq(num).text('가로');
                  $(".img_file_height").eq(num).text('세로');
                  $(".img_file_volume").eq(num).text('크기');

              }else {
                  alert(obj.message);
                  return false;
              }
          }
      });
  }
  /*--임시폴더파일삭제--*/


</script>
