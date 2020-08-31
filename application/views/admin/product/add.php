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
          <form class="form-horizontal" action="/admin/product/addInfo" method="post">
            <input type="hidden" name="admin_no" value="<?=$this->session->userdata('user_no')?>"/>
            <input type="hidden" id="product_no" name="product_no" value="<?=$product_no?>" readonly required/>
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
                      <label class="form-label mt-2" name="product_name"> 상품명
                        <span class="label align-self-center text-white" style="background: rgba(172, 50, 228)">필수</span>
                      </label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="product_name" placeholder="" maxlength="50" required/>
                    </div>
                  </div>
                </div>
                <div class="form-group ">
                  <div class="row">
                    <div class="col-md-3">
                      <label class="form-label mt-2" name="product_code"> 상품코드</label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="product_code" placeholder="" maxlength="50" />
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
                  <div class="row" id ="parent_id1">
                    <div class="col-md-3">
                      <label class="form-label">출고지 설정</label>
                      <input type="hidden" name="output_info" value="">
                    </div>
                    <div class="col-md-9">
                      <select class="form-control delivery_select1" id="delivery_select1" onchange="delivery_info(this,1)">
                        <option selected="">선택</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mt-2 delivery_setting1" style="display:none">
                    <div class="col-md-3">
                      <label class="form-label"></label>
                    </div>
                    <div class="col-md-9">
												<div class="expanel expanel-default ">
													<div class="expanel-heading">
														<h3 class="expanel-title">출고지 정보</h3>
													</div>
													<div class="expanel-body">
                            <div class="row mt-2">
                              <div class="col-md-2">
                                <label class="form-label mt-2 ">배송지</label>
                              </div>
                              <div class="col-md-4">
                                <input type="text" class="form-control delivery_name" disabled readonly/>
                              </div>
                              <div class="col-md-2">
                                <label class="form-label mt-2 ">택배사</label>
                              </div>
                              <div class="col-md-4">
                                <input type="text" class="form-control delivery_company" disabled readonly/>
                              </div>
                            </div>
                            <div class="row mt-2">
                              <div class="col-md-2">
                                <label class="form-label mt-2">주소</label>
                              </div>
                              <div class="col-md-10">
                                <input type="text" class="form-control delivery_address" disabled readonly/>
                              </div>
                            </div>
                            <div class="row mt-2">
                              <div class="col-md-2">
                                <label class="form-label mt-2 ">편도배송비</label>
                              </div>
                              <div class="col-md-4">
                                <input type="text" class="form-control delivery_fee1" disabled readonly/>
                              </div>
                              <div class="col-md-2">
                                <label class="form-label mt-2 ">반품배송비</label>
                              </div>
                              <div class="col-md-4">
                                <input type="text" class="form-control delivery_fee2" disabled readonly/>
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
                      <label class="form-label">수거지 설정</label>
                      <input type="hidden" name="input_info" value="">
                    </div>
                    <div class="col-md-9">
                      <select class="form-control delivery_select2" id="delivery_select2" onchange="delivery_info(this,2)">
                        <option selected="">선택</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mt-2 delivery_setting2" style="display:none">
                    <div class="col-md-3">
                      <label class="form-label"></label>
                    </div>
                    <div class="col-md-9">
												<div class="expanel expanel-default ">
													<div class="expanel-heading">
														<h3 class="expanel-title">수거지 정보</h3>
													</div>
													<div class="expanel-body">
                            <div class="row mt-2">
                              <div class="col-md-2">
                                <label class="form-label mt-2 ">배송지</label>
                              </div>
                              <div class="col-md-4">
                                <input type="text" class="form-control delivery_name" disabled readonly/>
                              </div>
                              <div class="col-md-2">
                                <label class="form-label mt-2 ">택배사</label>
                              </div>
                              <div class="col-md-4">
                                <input type="text" class="form-control delivery_company" disabled readonly/>
                              </div>
                            </div>
                            <div class="row mt-2">
                              <div class="col-md-2">
                                <label class="form-label mt-2">주소</label>
                              </div>
                              <div class="col-md-10">
                                <input type="text" class="form-control delivery_address" disabled readonly/>
                              </div>
                            </div>
                            <div class="row mt-2">
                              <div class="col-md-2">
                                <label class="form-label mt-2 ">편도배송비</label>
                              </div>
                              <div class="col-md-4">
                                <input type="text" class="form-control delivery_fee1" disabled readonly/>
                              </div>
                              <div class="col-md-2">
                                <label class="form-label mt-2 ">반품배송비</label>
                              </div>
                              <div class="col-md-4">
                                <input type="text" class="form-control delivery_fee2" disabled readonly/>
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
                      <label class="form-label">옵션</label>
                    </div>
                    <div class="col-md-9">
                      <select class="form-control option_select" onchange="option_select()">
                        <option selected="">선택</option>
                        <option>단품</option>
                        <option>옵션</option>
                      </select>
                    </div>
                  </div>
                  <div class="row mt-2 option_setting_single" style="display:none">
                    <div class="col-md-3">
                      <label class="form-label"></label>
                    </div>
                    <div class="col-md-9">
                      <div class="card" style="box-shadow:0 0 0 0">
      									<div class="card-header">
      										<h3 class="card-title">재고설정</h3>
      									</div>
      									<div class="card-body">
                          <div class="row" id="optionform">
                            <div class="col-md-2">
                              <label class="form-label mt-2" name="optionList[0][optionDetailList]">옵션명</label>
                            </div>
                            <div class="col-md-4">
                              <input type="text" class="form-control single_option_List" name="optionList[0][optionDetailList]"  value="단품" required readonly/>
                            </div>
                            <div class="col-md-2">
                              <label class="form-label mt-2" name="productDetailList[0][stock_use1]">재고</label>
                            </div>
                            <div class="col-md-4">
                              <input type="text" class="form-control single_option_srock_use1" name="productDetailList[0][stock_use1]"  placeholder="500" required/>
                            </div>
                          </div>
      									</div>
      								</div>
  									</div>
                  </div>
                  <div class="row mt-2 option_setting_multi" style="display:none">
                    <div class="col-md-3">
                      <label class="form-label"></label>
                    </div>
                    <div class="col-md-9">
      								<div class="card" style="box-shadow:0 0 0 0">
      									<div class="card-header">
      										<h3 class="card-title">옵션설정</h3>
      										<div class="card-options">
      											<a href="#" class="btn btn-purple btn-sm" id="optionformAdd">옵션추가</a>
      											<a href="#" class="btn btn-gray btn-sm ml-2" id="optionformDelete">옵션삭제</a>
      										</div>
      									</div>
      									<div class="card-body" id="optionform1">
                          <div class="row mt-2" id="optionform2">
                            <div class="col-md-2">
                              <label class="form-label mt-2" name="optionListName">옵션명</label>
                            </div>
                            <div class="col-md-4">
                              <input type="text" class="form-control option_name" name="optionList[0][name][]"  placeholder="예) 색상" required/>
                            </div>
                            <div class="col-md-2">
                              <label class="form-label mt-2" name="optionDetailList">세부옵션</label>
                            </div>
                            <div class="col-md-4">
                              <input type="text" class="form-control detail_name" name="optionList[0][optionDetailList][]" placeholder="예) 레드,블루" required/>
                            </div>
                          </div>
      									</div>
                        <div class="card-body" id="optionlist">
                            <div class="row">
                              <div class="col-md-12">
                                <label class="text-dark font-weight-medium">옵션 목록</label>
                              </div>
                              <div class="col-md-12">
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th scope="col">옵션코드</th>
                                      <th scope="col">추가가격</th>
                                      <th scope="col">재고수량</th>
                                      <th scope="col">삭제</th>
                                    </tr>
                                  </thead>
                                  <tbody id="optionCombiList">


                                  </tbody>
                                </table>
                              </div>
                            </div>
                        </div>
                        <div class="card-footer">
                          <div class="row mt-3">
                            <div class="col-md-6">
                              <button class="btn btn-indigo btn-block waves-effect waves-light" id="optionCombine">품목만들기</button>
                            </div>
                            <div class="col-md-6">
                              <button class="btn btn-gray btn-block waves-effect waves-light" id="optionReset">초기화</button>
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
                      <label class="form-label mt-2"> 상품 상세설명
                        <span class="label align-self-center text-white" style="background: rgba(172, 50, 228)">필수</span>
                      </label>
                    </div>
                    <div class="col-md-9">
                      <script type="text/javascript" src="/static/lib/ckeditor/ckeditor_4.14.1_basic/ckeditor.js"></script>
                      <textarea class="content2" name="product_content"></textarea>
                      <script>
                            CKEDITOR.replace( 'product_content' );
                      </script>
                    </div>
                  </div>
                </div>
            </div>
            <div class="form-group ">
              <div class="card-header">
                <div class="card-title">
                  <label class="form-label mt-2"><h4>상품이미지</h4><span class="label align-self-center text-white" style="background: rgba(172, 50, 228)">4장 필수</span></label>
                </div>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input img_file" name="img_file[]" id="img_file_0" onChange="file_click(0)" required />
                          <label class="custom-file-label img_file_url">이미지 선택</label>
                          <input type="hidden" class="img_src_data" name="img_src_data[]" />
                          <input type="hidden" class="img_exe" name="img_exe[]" />
                          <input type="hidden" class="img_name" name="img_name[]" />
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
                          <input type="file" class="custom-file-input img_file" name="img_file[]" id="img_file_1" onChange="file_click(1)" required />
                          <label class="custom-file-label img_file_url">이미지 선택</label>
                          <input type="hidden" class="img_src_data" name="img_src_data[]" />
                          <input type="hidden" class="img_exe" name="img_exe[]" />
                          <input type="hidden" class="img_name" name="img_name[]" />
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
                          <input type="file" class="custom-file-input img_file" name="img_file[]" id="img_file_2" onChange="file_click(2)" required />
                          <label class="custom-file-label img_file_url">이미지 선택</label>
                          <input type="hidden" class="img_src_data" name="img_src_data[]" />
                          <input type="hidden" class="img_exe" name="img_exe[]" />
                          <input type="hidden" class="img_name" name="img_name[]" />
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
                          <input type="file" class="custom-file-input img_file" name="img_file[]" id="img_file_3" onChange="file_click(3)" required />
                          <label class="custom-file-label img_file_url">이미지 선택</label>
                          <input type="hidden" class="img_src_data" name="img_src_data[]" />
                          <input type="hidden" class="img_exe" name="img_exe[]" />
                          <input type="hidden" class="img_name" name="img_name[]" />
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

    <div class="card-body" style="display: none;">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">옵션코드</th>
                <th scope="col">추가가격</th>
                <th scope="col">재고수량</th>
                <th scope="col">삭제</th>
            </tr>
            </thead>
            <tbody>
            <tr id="optionlistform" name="optionInfo">
                <td scope="row"><input type="text" class="form-control" id="optioncode" readonly /></td>
                <td><input type="text" class="form-control" id="add_price"></td>
                <td><input type="text" class="form-control" id="stock_num2"></td>
                <td>
                    <button class="btn btn-sm btn-danger" id="optionCombiDelBtn">X</button>
                </td>
            </tr>

            </tbody>
        </table>
    </div>

<script>
window.onload = function () {
  // $('#img_file_1').attr('disabled', true);
  // $('#img_file_2').attr('disabled', true);
  // $('#img_file_3').attr('disabled', true);

  category_view();
  output_view(1); //출고지
  output_view(2); //수거지

  /*--옵션명추가--*/
  var optionnum = 1;
  var optionid = 'option';
  var optionform1 = $('#optionform1');
  var optionform2 = $('#optionform2');

    $("#optionformAdd").click(function(e){
        e.preventDefault();
        var clone = optionform2.clone();
        var tmp = optionid + optionnum;

        clone.find("#option_name").attr("name","optionList[" + optionnum + "][name]");
        clone.find("#detail_name").attr("name","optionList[" + optionnum + "][optionDetailList]");

        optionnum++;

        clone.attr('id', tmp);
        optionform1.append(clone);
    });

    var optionlistform = $("#optionlistform");
    var optioncode = $("#optioncode");
    var add_price = $("#add_price");
    var stock_use2 = $("#stock_use2");
    var stock_num2 = $("#stock_num2");
    var optionCombiList = $("#optionCombiList");

    $("#optionformDelete").click(function(e){
        e.preventDefault();

        optionnum--;
        var tmp = optionid + optionnum;

        $("#" + tmp).remove();
    });

    $("#optionCombine").click(function(e){
        e.preventDefault();

        var tmpReturn1 = 0;
        var tmpReturn2 = 0;

        $(".option_name").each(function(index, item){
            if (item.value==''){
                tmpReturn1 = 1;
            }
        });

        $(".detail_name").each(function(index, item){
            if (item.value==''){
                tmpReturn2 = 1;
            }
        });

        if(tmpReturn1 == 1){
            alert("옵션명을 입력해주세요");
            return;
        }

        if(tmpReturn2 == 1){
            alert("세부옵션명을 입력해주세요");
            return;
        }

        optionCombiList.html("");
        $(".detail_name").attr("readonly",true);
        $(".option_name").attr("readonly",true);
        $("#optionformAdd").attr("class","btn btn-purple btn-sm disabled");
        $("#optionformDelete").attr("class","btn btn-gray btn-sm ml-2 disabled");


        var detail_name = $(".detail_name")

        var combine_list = [];
        var combine_atom_list = [];

        detail_name.each(function(index, item){
            combine_atom_list.push(item.value.split(',').map(item => item.trim()));
        });
        combine_list = combination(combine_atom_list);
        console.log(combine_list);

        combine_list.forEach(function(element, index){
            optioncode.val(element);
            optioncode.attr('name','productDetailList[' + index + '][option_code]');
            add_price.attr('name','productDetailList[' + index + '][add_price]');
            stock_num2.attr('name','productDetailList[' + index + '][stock_num2]');

            var clone = optionlistform.clone();

            clone.find('#optionCombiDelBtn').click(function(e){
                e.preventDefault();
                $(this).parents('tr').remove();
            });

            optionCombiList.append(clone);
        });

    });

    $("#optionReset").click(function(e){
        e.preventDefault();

        optionCombiList.html("");
        $(".detail_name").attr("readonly",false);
        $(".option_name").attr("readonly",false);
        $(".detail_name").val("");
        $(".option_name").val("");
        $("#optionformAdd").attr("class","btn btn-purple btn-sm");
        $("#optionformDelete").attr("class","btn btn-gray btn-sm ml-2");
    });

    $("#productaddBtn").click(function(e){
        e.preventDefault();

        var test = JSON.stringify(productadd.serializeObject());

        $("#test").val(test);

        console.log(test);
        // productadd.attr("action","/member/test2").attr("method","post").submit();

    });//end productaddBtn

    //조합 알고리즘
    function combination(arr) {
        if (arr.length == 1) {
            return arr[0];
        } else {
        var result = [];
        var calculate = combination(arr.slice(1));

        for (var i = 0; i < calculate.length; i++) {
            for (var j = 0; j < arr[0].length; j++) {
                result.push(arr[0][j] + "/" + calculate[i]);
            }
        }
        return result;
        }
    }
  /*--옵션명추가--*/
}

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
          url : "/admin/category/add",
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
        url : "/admin/category/view",
        type : "post",
        data : {'category': category},
        dataType:"json",
        success : function(response) {
          console.log(response);
          $('.main_category_select option').remove();
          $('.middle_category_select option').remove();
          $('.sub_category_select option').remove();
          var defaultOpt = $("<option value='0' name='category1' selected>선택</option>");
          $('.main_category_select').append(defaultOpt);

          var result = response.forEach(function (value, index, array) {

            var option = $("<option value='"+value.id+"' name='category1'>"+value.name+"</option>");
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
          console.log(response);
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
          url : "/admin/category/view",
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
                  var option = "<option value='"+value.id+"'>"+value.name+"</option>";
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
                  var option = "<option value='"+value.id+"'>"+value.name+"</option>";
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

  /*--출고지&수거지 VIEW--*/
  function output_view(num){
    var delivery_select = '.delivery_select'+num;
    $.ajax({
        url : "/admin/delivery/deliveryView",
        type : "post",
        dataType:"json",
        success : function(response) {
          console.log(response);
          $(delivery_select).empty();
          var defaultOpt = $("<option value='0' selected>선택</option>");
          $(delivery_select).append(defaultOpt);

          var result = response.forEach(function (value, index, array) {

            var option = $("<option value='"+value.no+"'>"+value.name+"</option>");
              $(delivery_select).append(option);

          });
        },
        error : function(response) {
          console.log(response);
          }
    });
  }
  /*--출고지&수거지 VIEW--*/

  /*--배송비--*/
  function delivery_info(select,num){
    var select = select.id;
    var select_id = '#' + select;
    var option = select_id + ' option:selected';
    var selected = $(option).val();
    var selected_txt = $(option).text();
    var add_box = ".delivery_setting"+num;

    // console.log(selected);
    // console.log(selected_txt);

    $(add_box).attr('style','');
    var delivery_num = selected;
    var delivery_setting = '.delivery_setting'+num

    $.ajax({
        url : "/admin/delivery/infoView",
        type : "post",
        data : {"delivery_num":delivery_num},
        dataType:"json",
        success : function(response) {
          var adr = response[0].zipcode + " " + response[0].address1 + " " + response[0].address2 + " " + response[0].address3;
          console.log(response);
          $(delivery_setting + " .delivery_name").val(response[0].name);
          $(delivery_setting + " .delivery_address").val(adr);
          $(delivery_setting + " .delivery_company").val(response[0].delivery_company);
          $(delivery_setting + " .delivery_fee1").val(response[0].delivery_fee1);
          $(delivery_setting + " .delivery_fee2").val(response[0].delivery_fee2);

          switch (num) {
            case 1:
            $('input[name="output_info"]').val(selected);
              break;
            case 2:
            $('input[name="input_info"]').val(selected);
              break;
          }

        },
        error : function(response) {
          console.log(response);
          }
    });



  }
  /*--배송비--*/

  /*--배송비 OLD--*/
  /*
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
  */
  /*--배송비--*/

  /*--옵션선택--*/
  function option_select(){
    var option_select = $('.option_select  option:selected').text();

    switch (option_select) {
      case '단품':
        $('.option_setting_single').attr('style','');
        $('.option_setting_multi').attr('style','display:none');
        $('.option_value_1').val('0');
        $('.option_value_2').val('');
        $('.option_value_1').attr('readonly',true);
        $('.single_option_srock_use1').attr('disabled', false);
        $('.single_option_List').attr('disabled', false);
        $('.option_name').attr('disabled', true);
        $('.detail_name').attr('disabled', true);
        break;
      case '옵션':
        $('.option_setting_single').attr('style','display:none');
        $('.option_setting_multi').attr('style','');
        $('.option_value_1').val('');
        $('.option_value_2').val('');
        $('.option_value_1').attr('readonly',false);
        $('.single_option_srock_use1').attr('disabled', true);
        $('.single_option_List').attr('disabled', true);
        $('.option_name').attr('disabled', false);
        $('.detail_name').attr('disabled', false);


        break;
      default:

    }
  }
  /*--옵션선택--*/

  /*--옵션--*/
  function option_info(num){
    var template_text = '';
    // console.log(num);
    $('#tab0').empty();
    $('#tab1').empty();
    switch (num) {
      case 0:
          template_text='<div class="row">\n<div class="col-md-1"><label class="form-label mt-2" name="product_otp_name">옵션명</label></div>\n<div class="col-md-3"><input type="text" class="form-control product_otp_name" name="product_otp_name"  value="단품" readonly required/></div>\n\n<div class="col-md-1"><label class="form-label mt-2" name="product_otp_value">옵션</label></div>\n<div class="col-md-3"><input type="text" class="form-control product_otp_value" name="product_otp_value"  value="단품" readonly required/></div>\n<div class="col-md-1"><label class="form-label mt-2" name="product_stock">재고</label></div>\n<div class="col-md-3"><input type="text" class="form-control product_stock" name="product_stock"  value="" required/></div>\n</div>\n';
          $('#tab0:last').append(template_text);
          $('.option_set').attr('style','display:none');
        break;
      case 1:
          template_text='<div class="row">\n<div class="col-md-2"><label class="form-label mt-2" name="product_otp_name_1">옵션명 1</label></div>\n<div class="col-md-4"><input type="text" class="form-control product_otp_name_1" name="product_otp_name_1"  placeholder="예) 색상" required/></div>\n<div class="col-md-2"><label class="form-label mt-2" name="product_otp_value_1">옵션 1</label></div>\n<div class="col-md-4"><input type="text" class="form-control product_otp_value_1" name="product_otp_value_1"  placeholder="예) 블랙,블루" required/></div>\n</div>';
          $('#tab1:last').append(template_text);
          $('.option_set').attr('style','display:inline');
        break;
      default:

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
    formData.append("product_no", $("#product_no").val());
    formData.append("img_no", num);

    // ajax로 파일을 업로드 한다.
    $.ajax({
          url : "/file/thumbnail/upload"
        , type : "POST"
        , processData : false
        , contentType : false
        , data : formData
        , success:function(response) {
          console.log(response);
            var obj = JSON.parse(response);
            if(obj.ret == "succ") {
                // 업로드된 버튼을 임시폴더에 업로드된 경로의 이미지 파일로 교체한다.
                $(".img_src").eq(num).attr("src", obj.img_src);
                $(".img_src_data").eq(num).val(obj.img);
                $(".img_exe").eq(num).val(obj.file_exe);
                $(".img_name").eq(num).val(obj.file_name_after);
                $(".img_file_url").eq(num).text(obj.file_name);
                $(".img_file_width").eq(num).text('가로(px): '+obj.file_size[0]);
                $(".img_file_height").eq(num).text('세로(px): '+obj.file_size[1]);
                $(".img_file_volume").eq(num).text('크기(KB): '+obj.file_volume);

                // if(num <4){
                //   var next_file = num+1;
                //   $('.img_file').eq(next_file).attr('disabled', false);
                // }

            }else {
                alert(obj.message);
                $(".img_file").eq(num).val("");
                $(".img_src").eq(num).attr("src", "/static/lib/assets/theme/images/faces/male/25.jpg");
                $(".img_src_data").eq(num).val("");
                $(".img_exe").eq(num).val("");
                $(".img_name").eq(num).val("");
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
