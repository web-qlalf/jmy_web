
var updateCat = $('.updateCategory').val();
if(updateCat == 'false'){
  viewCategory();
}else{
  // alert('트루');
}

// if(tmp_0.disabled == true){
//   console.log('tmp_0 트루다');
// }else{
//   console.log('tmp_0 트루가 아니다.');
// }
// if(tmp_1.disabled == true){
//   console.log('tmp_1 트루다');
// }else{
//   console.log('tmp_1 트루가 아니다.');
// }

// for (var i = 0; i < 5; i++) {
//   if($(".aaa").eq(i).attr("disabled") == undefined){
//     console.log($(".aaa").eq(i).attr('id'),'활성');
//   }else{
//     console.log($(".aaa").eq(i).attr('id'),'비활성');
//   }
// }

//썸네일
// 이미지를 업로드 할 준비를 시작한다.
function temporaryFileUpload(num) {
    // 이미지파일의 정보를 받을 배열을 선언한다.
    var tmpFile = new Object();
    tmpFile['file'] = new Array();     // tmpFile['file'] 파일의 정보를 담을 변수
    tmpFile['img'] = new Array();    // tmpFile['file'] 이미지의 경로를 담을 변수
    var tmpNum = 0;
    var addPlus = 0;
    var img_src_substr = '';
      if($(".temporaryFile").eq(num).attr("disabled") == undefined){
        console.log($(".temporaryFile").eq(num).attr("id"),'활성');
        console.log('비활성화인 File,Src는 빼고 선택한 활성 file과 src를 지움');
        console.log('나머지 활성화된 file과 src를 재배열');
      }else{
        console.log($(".temporaryFile").eq(num).attr("id"),'비활성');
        console.log('고른 비활성화 file과 src를 초기화');
        console.log('비활성화인 fie과 src를 우선순위로 배열');
        console.log('활성화인 file과 src 복사해서 배열');
      }
    if(confirm("해당 이미지를 삭제 하시겠습니까?") == true) {
    }else{

    }

    // // 먼저 업로드 된 파일의 존재 유무를 확인한다.
    // if($(".temporaryFile").eq(num).val()) {
    //
    //     // 파일이 존재하면 우선 기존 파일을 삭제한 이후에 작업을 진행한다.
    //     if(confirm("해당 이미지를 삭제 하시겠습니까?") == true) {
    //
    //         // 먼저 업로드 하지 않을 파일을 제거한다.
    //         $(".temporaryFile").eq(num).val("");
    //         console.log('제거');
    //
    //         // 파일이 제거되면 <input type="file"/>의 수만큼 반복문을 돌린다.
    //         $(".temporaryFile").each(function(idx) {
    //           console.log('인풋 파일반복문 시작');
    //           // console.log($(".thumbnailImg").eq(idx).attr("src"));
    //           var deleteImg_Src = $(".thumbnailImg").eq(num).attr("src");
    //           var defaultImg = '/static/lib/assets/images/thumbnails/plus-art.png';
    //           var allImg_Src = $(".thumbnailImg").eq(idx).attr("src");
    //             // 반복문을 돌리는 중에 <input type="file"/>의 값이 존재한는 순서로 배열에 담는다.
    //             if(deleteImg_Src !== allImg_Src){
    //               console.log(deleteImg_Src);
    //               console.log(allImg_Src);
    //               if(defaultImg !== allImg_Src){
    //                 tmpFile['file'][tmpNum] = [$(".temporaryFile").eq(idx).clone()];
    //                     tmpFile['img'][tmpNum] = $(".thumbnailImg").eq(idx).attr("src");
    //                     tmpNum++;
    //               }
    //             }else{
    //                 tmpFile['file'][tmpNum] = [$(".temporaryFile").eq(idx).clone()];
    //                 tmpFile['img'][tmpNum] = $(".thumbnailImg").eq(idx).attr("src");
    //                 tmpNum++;
    //             }
    //             // if($(".temporaryFile").eq(idx).val()) {
    //             //   console.log('정보가 없을 경우');
    //             //   alert('아아악');
    //             //     tmpFile['file'][tmpNum] = [$(".temporaryFile").eq(idx).clone()];
    //             //     tmpFile['img'][tmpNum] = $(".thumbnailImg").eq(idx).attr("src");
    //             //     tmpNum++;
    //             // }else if($(".temporaryFile").eq(idx).val() == false && $(".thumbnailSrc").eq(idx).val() == true){
    //             //   //file에는 값이 없으나 update 정보로 와 있는 정보가 있을 경우
    //             //   console.log('정보가 있을 경우');
    //             //     tmpFile['file'][tmpNum] = [$(".temporaryFile").eq(idx).clone()];
    //             //     tmpFile['img'][tmpNum] = $(".thumbnailImg").eq(idx).attr("src");
    //             //     tmpNum++;
    //             //     alert('제발');
    //             // }else{
    //             //   console.log('tㅅㅂ');
    //             //
    //             // }
    //         });
    //
    //         // 모든 썸네일 이미지 정보를 초기화 한다.
    //         $(".temporaryFile").val("");
    //         $(".thumbnailImg").attr("src", "/static/lib/assets/images/thumbnails/plus-art.png");
    //         $(".thumbnailSrc").val("");
    //         $(".thumbnailImg").css("display", "inline");
    //         // 배열로 받은 파일의 정보를 바탕으로 순서를 재정렬한다.
    //         for(var key in tmpFile['file']) {
    //           $(".temporaryFile").eq(key).replaceWith(tmpFile['file'][key][0].clone(true));
    //           $(".thumbnailSrc").eq(key).val(tmpFile['img'][key]);
    //           $(".thumbnailImg").eq(key).css("display", "inline");
    //           $(".thumbnailImg").eq(key).attr("src", tmpFile['img'][key]);
    //           addPlus++;
    //         }
    //
    //         if(addPlus < 5) {
    //             $(".thumbnailImg").eq(addPlus).css("display", "inline");
    //         }
    //
    //     } else {
    //         return false;
    //     }
    // }
    //
    // // 파일이 존재하지 않다면 업로드를 시작한다.
    // else {
    //
    //
    //       // 반복문을 돌리는 중에 <input type="file"/>의 값이 존재한는 순서로 배열에 담는다.
    //       if($(".thumbnailSrc").eq(num).val()) {
    //         if(confirm("해당 이미지를 삭제 하시겠습니까?") == true) {
    //           $(".temporaryFile").eq(num).val("");
    //           $(".thumbnailSrc").eq(num).val("");
    //           $(".thumbnailImg").eq(num).attr("src", "/static/lib/assets/images/thumbnails/plus-art.png");
    //           $(".thumbnailImg").eq(num).val("");
    //           $(".thumbnailImg").eq(num).css("display", "inline");
    //         }
    //
    //       }else{
    //
    //         $(".temporaryFile").eq(num).click();
    //       }
    //
    // }
}


function temporaryFileUpload2(num) {
    // 이미지파일의 정보를 받을 배열을 선언한다.
    var tmpFile = new Object();
    tmpFile['file'] = new Array();     // tmpFile['file'] 파일의 정보를 담을 변수
    tmpFile['img'] = new Array();    // tmpFile['file'] 이미지의 경로를 담을 변수
    var tmpNum = 0;
    var addPlus = 0;
    var img_src_substr = '';

    // 먼저 업로드 된 파일의 존재 유무를 확인한다.
    if($(".temporaryFile").eq(num).val()) {

        // 파일이 존재하면 우선 기존 파일을 삭제한 이후에 작업을 진행한다.
        if(confirm("해당 이미지를 삭제 하시겠습니까?") == true) {

            // 먼저 업로드 하지 않을 파일을 제거한다.
            $(".temporaryFile").eq(num).val("");
            console.log('제거');

            // 파일이 제거되면 <input type="file"/>의 수만큼 반복문을 돌린다.
            $(".temporaryFile").each(function(idx) {
              console.log('인풋 파일반복문 시작');
              // console.log($(".thumbnailImg").eq(idx).attr("src"));
              var deleteImg_Src = $(".thumbnailImg").eq(num).attr("src");
              var defaultImg = '/static/lib/assets/images/thumbnails/plus-art.png';
              var allImg_Src = $(".thumbnailImg").eq(idx).attr("src");
                // 반복문을 돌리는 중에 <input type="file"/>의 값이 존재한는 순서로 배열에 담는다.
                if(deleteImg_Src !== allImg_Src){
                  console.log(deleteImg_Src);
                  console.log(allImg_Src);
                  if(defaultImg !== allImg_Src){
                    tmpFile['file'][tmpNum] = [$(".temporaryFile").eq(idx).clone()];
                        tmpFile['img'][tmpNum] = $(".thumbnailImg").eq(idx).attr("src");
                        tmpNum++;
                  }
                }else{
                    tmpFile['file'][tmpNum] = [$(".temporaryFile").eq(idx).clone()];
                    tmpFile['img'][tmpNum] = $(".thumbnailImg").eq(idx).attr("src");
                    tmpNum++;
                }
                // if($(".temporaryFile").eq(idx).val()) {
                //   console.log('정보가 없을 경우');
                //   alert('아아악');
                //     tmpFile['file'][tmpNum] = [$(".temporaryFile").eq(idx).clone()];
                //     tmpFile['img'][tmpNum] = $(".thumbnailImg").eq(idx).attr("src");
                //     tmpNum++;
                // }else if($(".temporaryFile").eq(idx).val() == false && $(".thumbnailSrc").eq(idx).val() == true){
                //   //file에는 값이 없으나 update 정보로 와 있는 정보가 있을 경우
                //   console.log('정보가 있을 경우');
                //     tmpFile['file'][tmpNum] = [$(".temporaryFile").eq(idx).clone()];
                //     tmpFile['img'][tmpNum] = $(".thumbnailImg").eq(idx).attr("src");
                //     tmpNum++;
                //     alert('제발');
                // }else{
                //   console.log('tㅅㅂ');
                //
                // }
            });

            // 모든 썸네일 이미지 정보를 초기화 한다.
            $(".temporaryFile").val("");
            $(".thumbnailImg").attr("src", "/static/lib/assets/images/thumbnails/plus-art.png");
            $(".thumbnailSrc").val("");
            $(".thumbnailImg").css("display", "inline");
            // 배열로 받은 파일의 정보를 바탕으로 순서를 재정렬한다.
            for(var key in tmpFile['file']) {
              $(".temporaryFile").eq(key).replaceWith(tmpFile['file'][key][0].clone(true));
              $(".thumbnailSrc").eq(key).val(tmpFile['img'][key]);
              $(".thumbnailImg").eq(key).css("display", "inline");
              $(".thumbnailImg").eq(key).attr("src", tmpFile['img'][key]);
              addPlus++;
            }

            if(addPlus < 5) {
                $(".thumbnailImg").eq(addPlus).css("display", "inline");
            }

        } else {
            return false;
        }
    }

    // 파일이 존재하지 않다면 업로드를 시작한다.
    else {


          // 반복문을 돌리는 중에 <input type="file"/>의 값이 존재한는 순서로 배열에 담는다.
          if($(".thumbnailSrc").eq(num).val()) {
            if(confirm("해당 이미지를 삭제 하시겠습니까?") == true) {
              $(".temporaryFile").eq(num).val("");
              $(".thumbnailSrc").eq(num).val("");
              $(".thumbnailImg").eq(num).attr("src", "/static/lib/assets/images/thumbnails/plus-art.png");
              $(".thumbnailImg").eq(num).val("");
              $(".thumbnailImg").eq(num).css("display", "inline");
            }

          }else{

            $(".temporaryFile").eq(num).click();
          }

    }
}

// 임시폴더에 파일을 업로드하고 그 경로를 받아온다.
function temporaryFileTransmit(num) {
    var form = $("#uploadFrom")[0];
    var formData = new FormData(form);
    formData.append("mode", "temporaryImageUpload");
    formData.append("tmpFile", $(".temporaryFile").eq(num)[0].files[0]);
    formData.append("tmpFile2", $(".temporaryFile").eq(num)[0]);

    // ajax로 파일을 업로드 한다.
    $.ajax({
          url : "/prodImgUpload/do_upload_2"
        , type : "POST"
        , processData : false
        , contentType : false
        , data : formData
        , success:function(response) {
            // data.replace(/\r/gi, '\\r').replace(/\n/gi, '\\n').replace(/\t/gi, '\\t').replace(/\f/gi, '\\f');
            // data.replace(/\n/gi, '\\n');
            // var fixedResponse = response.responseText.replace(/\\'/g, "'");
            // var obj = JSON.parse(fixedResponse);
            var obj = JSON.parse(response);

            // 이미 불러온 데이터인데 다시 부를 필요는 없다.
            // console.log(response);

            if(obj.ret == "succ") {
                // var obj_update = '.'+data.img;
                // 업로드된 버튼을 임시폴더에 업로드된 경로의 이미지 파일로 교체한다.
                var aa = obj.img;
                var substr_src = aa.substring(2)
                $(".thumbnailImg").eq(num).attr("src", substr_src);
                $(".thumbnailSrc").eq(num).val(substr_src);

                // 업로드 버튼이 4개 이하인경우 업로드 버튼을 하나 생성한다.
                if(num < 5) {
                    $(".thumbnailImg").eq(++num).css("display", "inline");
                }

            }else {
                alert(obj.message);
                $(".temporaryFile").eq(num).val("");
                $(".thumbnailImg").eq(num).attr("src", "/static/lib/assets/images/thumbnails/plus-art.png");
                $(".thumbnailSrc").eq(num).val("");
                $(".thumbnailImg").eq(num).css("display", "inline");
                return false;
            }
        }
    });
}


function viewCategory(){
  var dafaultcat = $('.defaultCategory').val();
  $.ajax({
    url : '/productseller/serachCategory',
    type : 'post',
    data: {'categorynum' : dafaultcat},
    dataType:"json",
    success : function(data) {

      $('#categorySelect1 option').remove();
      $('#categorySelect2 option').remove();
      $('#categorySelect3 option').remove();

      var defaultOpt = $("<option value='' name='category1'>선택</option>");
      $('#categorySelect1').append(defaultOpt);

      var result = data.forEach(function (value, index, array) {

      // console.log(value.product_category_name);

      var option = $("<option value='"+value.product_category_no+"' name='category1'>"+value.product_category_name+"</option>");
        $('#categorySelect1').append(option);

      });

    }, error : function(data) {
          alert(data);
      }
    });
}

function selectCat(num){
    var selectcat = $("#categorySelect"+num+" option:selected").val();
    var defaultOpt = '';
    var categorySelect1 = '';
    var categorySelect2 = '';
    var categorySelect3 = '';
    switch (num) {
      case 1:
      $('#categorySelect2 option').remove();
      $('#categorySelect3 option').remove();
          $.ajax({
                url : '/productseller/serachCategory',
                type : 'post',
                data: {'categorynum' : selectcat },
                dataType:"json",
                success : function(data) {

                 defaultOpt = $("<option value='' name='category2'>선택</option>");
                 $('#categorySelect2').append(defaultOpt);

                 $('input[name=categorySelect1]').val(selectcat);
                 $('input[name=categorySelect2]').val('');
                 $('input[name=categorySelect3]').val('');

                var result = data.forEach(function (value, index, array) {
                   // console.log(value.product_category_name);

                   var option = $("<option value='"+value.product_category_no+"' name='category2'>"+value.product_category_name+"</option>");
                     $('#categorySelect2').append(option);

                 });

                 }, error : function() {
                     alert('불러오기 실패2');
                 }
                });
        break;
      case 2:
            $('#categorySelect3 option').remove();
          $.ajax({
                url : '/productseller/serachCategory',
                type : 'post',
                data: {'categorynum' : selectcat },
                dataType:"json",
                success : function(data) {

                  $('input[name=categorySelect2]').val(selectcat);
                  $('input[name=categorySelect3]').val('');

                defaultOpt = $("<option value='' name='category3'>선택</option>");
                $('#categorySelect3').append(defaultOpt);

                var result = data.forEach(function (value, index, array) {
                    // console.log(value.product_category_name);

                    var option = $("<option value='"+value.product_category_no+"' name='category3'>"+value.product_category_name+"</option>");
                      $('#categorySelect3').append(option);

                });

                }, error : function() {
                    alert('불러오기 실패2');
                }
                });
        break;
      case 3:

              $('input[name=categorySelect3]').val(selectcat);
        break;
      default:

    }

  }


function optionAdd(){
  window.open( "/productseller/optionAdd", //URL
  "childForm", //window name
  "toolbar=yes,scrollbars=yes,resizable=yes,location=no,width=900,height=600" // windoeFeatures
  );
}

var openWin ='';
function optionUpdate(){
  window.name="parentPage";
  var pop_title = 'childForm';
  openWin  = window.open( "/productseller/optionAdd","childForm","toolbar=yes,scrollbars=yes,resizable=yes,location=no,width=900,height=600");

  var frmData = document.optUdateData ;
        frmData.target = 'childForm' ;
        frmData.action = '/productseller/optionAdd' ;
        frmData.method = 'POST'
        frmData.submit() ;

  // openWin  = window.open( "/productseller/optionAdd", //URL
  // "childForm", //window name
  // "toolbar=yes,scrollbars=yes,resizable=yes,location=no,width=900,height=600" // windoeFeatures
  // );
  // $('#contentdataGrid > form', openWin.document).remove();
  // setChildText();
}

function setChildText(){
  var tr_length = $('#optionList').children().length;
  var td_length = $('#optionList > div:first input').length;

    switch (td_length) {
      case 4:
      var optionK = $('#optionList > div:first input').eq(0).val();
      alert(optionK);
      $('#contentdataGrid',openWin.document).append('<form name="formGrid" method="get"><table class="table" style="overflow:auto;" id="optGrid"><thead><tr><th><div class="chkAll"><input type="checkbox" class="chk" id="optAllSelect" onclick="javascript:checkAll()"></div></th><th>'+optionK+'</th><th>재고수량</th><th>옵션가격</th><th><div class="tdW text-center"><span class="d-inline float-right"><a href="javascript:minusOptShage();" class="btn_minus">-</a></span></div></th></tr></thead><tbody></tbody></table></form>');
        // openWin.$('#contentdataGrid').append('<form name="formGrid" method="get"><table class="table" style="overflow:auto;" id="optGrid"><thead><tr><th><div class="chkAll"><input type="checkbox" class="chk" id="optAllSelect" onclick="javascript:checkAll()"></div></th><th>'+optionK]+'</th><th>재고수량</th><th>옵션가격</th><th><div class="tdW text-center"><span class="d-inline float-right"><a href="javascript:minusOptShage();" class="btn_minus">-</a></span></div></th></tr></thead><tbody></tbody></table></form>');
        break;
      case 6:

        break;
      case 8:

        break;
      default:

    }

}
