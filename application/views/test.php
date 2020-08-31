<style>
    .accordion-header-border-bottom .card-header .btn, .accordion-header-border-bottom .card-header a{
        padding: 0;
    }


</style>


<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>상품관리</h1>
        </div>

        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>상품 등록</h2>
                </div>
                <div class="card-body">
                    <form id="productadd" enctype="multipart/form-data">
                        {% csrf_token %}
                        <input type="hidden" id="test" name="test"/>
                        <div class="form-row">
                            <div class="col-md-12 mb-3 form-group">
                                <label class="text-dark font-weight-medium" for="validationServer01">상품명</label>
                                <span class="mb-2 mr-2 badge badge-pill badge-primary">필수</span>
                                <input type="text" class="form-control" id="validationServer01" name="name"
                                       placeholder="상품명" required="">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3 form-group">
                                    <label class="text-dark font-weight-medium" for="validationServer02">상품 가격</label>
                                    <span class="mb-2 mr-2 badge badge-pill badge-primary">필수</span>
                                    <input type="text" class="form-control" id="validationServer02" name="price"
                                           placeholder="상품 가격" required="">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3 form-group">
                                    <label class="text-dark font-weight-medium">할인 가격</label>
                                    <input type="text" class="form-control" name="sale_price" placeholder="할인 가격">
                                </div>
                            </div>
                            <div class="col-md-12 mb-3 form-group">
                                <label for="exampleFormControlTextarea1">상품 설명</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="description"
                                          rows="3"></textarea>
                            </div>

                            <div class="col-md-12">
                                <label class="text-dark font-weight-medium"></label>
                                <div class="form-group row">
                                    <div class="col-6 col-md-3 text-left" style="max-width: 200px">
                                        <label>상품 진열여부</label>
                                    </div>
                                    <div class="col-12 col-md-9 row">
                                        <label class="control outlined control-radio radio-primary"
                                               style="margin-left: 20px;">진열안함
                                            <input type="radio" name="show_product" value="0" checked="checked">
                                            <div class="control-indicator"></div>
                                        </label>
                                        <label class="control outlined control-radio radio-primary"
                                               style="margin-left: 20px;">진열함
                                            <input type="radio" name="show_product" value="1">
                                            <div class="control-indicator"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-header card-header-border-bottom"></div>
                        <div class="card-header card-header-border-bottom" style="margin-bottom: 30px;">
                            <h2>카테고리</h2>
                        </div>
                        <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                <label>상위 카테고리</label>
                                <select id="parentSelect" name="category_no" class="form-control">
                                    <option>없음</option>
                                    {% for category in category_list.data %}
                                    <option value={{category.category_no}}>
                                        {{category.category_name}}
                                    </option>
                                    {% endfor %}
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>하위 카테고리</label>
                                <select name="category_no" class="form-control" id="lowCategory" disabled>
                                    <option>없음</option>
                                </select>
                            </div>


                        </div>

                        <div class="card-header card-header-border-bottom"></div>
                        <div class="card-header card-header-border-bottom">
                            <h2>재고 / 옵션</h2>
                        </div>

                        <div class="form-row">

                            <div class="col-md-12">
                                <label class="text-dark font-weight-medium"></label>
                                <div class="form-group row">
                                    <div class="col-6 col-md-3 text-left" style="max-width: 200px">
                                        <label>재고 사용여부</label>
                                    </div>
                                    <div class="col-12 col-md-9 row">
                                        <label class="control outlined control-radio radio-primary"
                                               style="margin-left: 20px;">사용안함
                                            <input type="radio" name="stock_use" value="0" checked="checked">
                                            <div class="control-indicator"></div>
                                        </label>
                                        <label class="control outlined control-radio radio-primary"
                                               style="margin-left: 20px;">사용함
                                            <input type="radio" name="stock_use" value="1">
                                            <div class="control-indicator"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div id="stockform2">
                            </div>


                            <div class="col-md-12">
                                <label class="text-dark font-weight-medium"></label>
                                <div class="form-group row">
                                    <div class="col-6 col-md-3 text-left" style="max-width: 200px">
                                        <label>옵션 사용여부</label>
                                    </div>
                                    <div class="col-12 col-md-9 row">
                                        <label class="control outlined control-radio radio-primary"
                                               style="margin-left: 20px;">사용안함
                                            <input type="radio" name="option_use" value="0" checked="checked">
                                            <div class="control-indicator"></div>
                                        </label>
                                        <label class="control outlined control-radio radio-primary"
                                               style="margin-left: 20px;">사용함
                                            <input type="radio" name="option_use" value="1">
                                            <div class="control-indicator"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="row col-md-12" id="optionform1" style="display:none;">
                                <div class="row col-md-12">
                                    <div class="col-md-3 form-group" style="margin-bottom: 0;">
                                        <label class="text-dark font-weight-medium">[옵션명]</label>
                                    </div>

                                    <div class="col-md-9 form-group" style="margin-bottom: 0;">
                                        <label class="text-dark font-weight-medium">[세부옵션명-쉼표로 구분해주세요(ex)
                                            black,white,red)]</label>
                                    </div>
                                </div>
                                <div id="optionform2" class="row col-md-12">
                                    <div id="optionform3" class="row col-md-12">
                                        <div class="col-md-3 mb-3 form-group">

                                            <input type="text" class="form-control option_name" 
                                                   name="optionList[0][name]"
                                                   placeholder="옵션명">
                                        </div>

                                        <div class="col-md-9 mb-3 form-group">
                                            <input type="text" class="form-control detail_name"
                                                   name="optionList[0][optionDetailList]"
                                                   placeholder="세부옵션명">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3 form-group">
                                    <button class="btn btn-sm btn-primary" id="optionAddBtn"
                                            style="margin-top: 10px;">
                                        옵션추가
                                    </button>
                                    <button class="btn btn-sm btn-danger" id="optionDelBtn"
                                            style="margin-top: 10px;">
                                        옵션삭제
                                    </button>
                                </div>
                                <div class="col-md-12 mb-3 form-group">
                                    <button class="btn btn-sm btn-outline-success" id="optionCombineBtn"
                                            style="margin-top: 10px;">
                                        옵션품목 만들긔
                                    </button>

                                    <button class="btn btn-sm btn-outline-info" id="optionResetBtn"
                                            style="margin-top: 10px;">
                                        초기화
                                    </button>
                                </div>


                            </div>


                            <div class="col-md-12 mb-3 form-group" style="display: none;" id="optionlist">
                                <label class="text-dark font-weight-medium">옵션 목록</label>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">옵션코드</th>
                                            <th scope="col">추가가격</th>
                                            <th scope="col">재고여부</th>
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

                        <div class="card-header card-header-border-bottom"></div>
                        <div class="card-header card-header-border-bottom">
                            <h2>상품이미지 등록</h2>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <label class="text-dark font-weight-medium"></label>
                                <div class="form-group row">
                                    <div class="col-6 col-md-3 text-left" style="max-width: 200px">
                                        <label>대표이미지</label>
                                    </div>
                                    <div class="col-12 col-md-9 row">
                                        <div class="form-group" style="margin-left: 20px;">
                                            <input type="file" name="mainImg" class="form-control-file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <label class="text-dark font-weight-medium"></label>
                                <div class="form-group row">
                                    <div class="col-6 col-md-3 text-left" style="max-width: 200px">
                                        <label>추가이미지</label>
                                        <button type="button" class="mb-2 btn btn-twitter" id="addImgPlusBtn"
                                                style="height: 20px; width: 20px; padding: 0; font-size: 0.7rem; vertical-align: none; margin-top: 5px;">
                                            +
                                        </button>
                                        <button type="button" class="mb-2 btn btn-google-plus" id="addImgMinusBtn"
                                                style="height: 20px; width: 20px; padding: 0; font-size: 0.7rem; vertical-align: none; margin-top: 5px;">
                                            -
                                        </button>
                                    </div>
                                    <div class="col-12 col-md-9 row">
                                        <div class="form-group" style="margin-left: 20px;" id="addimgform">
                                            <input type="file" name="addImg" class="form-control-file">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <button class="btn btn-primary col-md-12" type="submit" id="productaddBtn">상품 등록</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>카테고리 목록</h2>
                    </div>
                    <div class="card-body">
                        <div id="accordion4" class="accordion accordion-header-border-bottom ">
                            {% for category in category_list.data %}
                            <div class="card">
                                <div class="card-header" id="heading{{ forloop.counter }}">
                                    <button class="btn btn-link collapsed categoryListBtn" data-toggle="collapse"
                                            data-no="{{category.category_no}}"
                                            data-target="#collapse{{ forloop.counter }}" aria-expanded="false"
                                            aria-controls="collapse{{ forloop.counter }}">
                                        {{category.category_name}}
                                    </button>
                                </div>

                                <div id="collapse{{ forloop.counter }}" class="collapse"
                                     aria-labelledby="heading{{ forloop.counter }}"
                                     data-parent="#accordion{{ forloop.counter }}" style="">
                                    <ul class="card-body" id="category{{category.category_no}}" style="padding: 10px;">
                                    </ul>
                                </div>
                            </div>
                            {% endfor %}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>카테고리 등록</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" id="categoryadd" action="/manager/categoryadd">
                            {% csrf_token %}
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>상위 카테고리</label>
                                    <select name="parent" class="form-control">
                                        <option value=0>default(상위 카테고리 등록)</option>
                                        {% for category in category_list.data %}
                                        <option value={{category.category_no}}>{{category.category_name}}</option>
                                        {% endfor %}
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3 form-group">
                                    <label class="text-dark font-weight-medium">카테고리명</label>
                                    <input type="text" class="form-control" name="category_name"
                                           placeholder="Category Name" required="">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <button class="btn btn-primary col-md-12" id="categoryadd_btn" type="submit">등록</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="stockform1" style="display: none;">
        <div class="col-md-12 mb-3 form-group">
            <label class="text-dark font-weight-medium">재고개수</label>
            <input type="text" class="form-control" name="stock_num" placeholder="재고개수">
        </div>
    </div>

    <div class="card-body" style="display: none;">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">옵션코드</th>
                <th scope="col">추가가격</th>
                <th scope="col">재고여부</th>
                <th scope="col">재고수량</th>
                <th scope="col">삭제</th>
            </tr>
            </thead>
            <tbody>
            <tr id="optionlistform" name="optionInfo">
                <td scope="row"><input type="text" class="form-control" id="optioncode" readonly /></td>
                <td><input type="text" class="form-control" id="add_price"></td>
                <td><select id="stock_use2" style="margin-top: 10px;">
                    <option value="0">NO</option>
                    <option value="1">YES</option>
                </select></td>
                <td><input type="text" class="form-control" id="stock_num2" disabled></td>
                <td>
                    <button class="btn btn-sm btn-danger" id="optionCombiDelBtn" type="submit">X</button>
                </td>
            </tr>

            </tbody>
        </table>
    </div>

</div>

<footer class="footer mt-auto">
    <div class="copyright bg-white">
        <p>
            &copy; <span id="copy-year">2019</span> Copyright Sleek Dashboard Bootstrap Template by
            <a
                    class="text-primary"
                    href="http://www.iamabdus.com/"
                    target="_blank"
            >Abdus</a
            >.
        </p>
    </div>
    <script>
                var d = new Date();
                var year = d.getFullYear();
                document.getElementById("copy-year").innerHTML = year;


    </script>
</footer>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.serializeObject/2.0.3/jquery.serializeObject.min.js" integrity="sha512-DNziaT2gAUenXiDHdhNj6bfk1Ivv72gpxOeMT+kFKXB2xG/ZRtGhW2lDJI9a+ZNCOas/rp4XAnvnjtGeMHRNyg==" crossorigin="anonymous"></script>
<!-- <script src="/assets/vendor/jquery/jquery.serializeObject.min.js"></script> -->

<script>
$(document).ready(function(){
    var productadd = $("#productadd");
    var categoryadd = $("#categoryadd");
    var optionlistform = $("#optionlistform");
    var addimgform = $("#addimgform");

    var optionUse = $("input:radio[name=option_use]");
    var stockUse = $("input:radio[name=stock_use]");

    var optionform2 = $("#optionform2");
    var optionform3 = $("#optionform3");
    var optionform2Clone = $("#optionform2").clone();

    //옵션 및 재고
    optionUse.change(function(e){
        e.preventDefault();

        if($(this).val()==0){
            $("#optionform1").attr("style","display:none;");
            $("#optionlist").attr("style","display:none;");
            $("#option_name").val("");
            $("#detail_name").val("");
        } else {
            $("input:radio[name=stock_use][value='0']").prop('checked', true);
            $("#stockform2").html("");
            $("#optionform1").attr("style","");
            $("#optionlist").attr("style","");
        }
    });

    stockUse.change(function(e){
        e.preventDefault();

        if($(this).val()==0){
            $("#stockform2").html("");
        } else {
            $("input:radio[name=option_use][value='0']").prop('checked', true);
            $("#optionform1").attr("style","display:none;");
            $("#option_name").val("");
            $("#detail_name").val("");
            $("#optionlist").attr("style","display:none;");
            $("#stockform2").html($("#stockform1").html());
            $("#optionform2").html(optionform2Clone)
        }

    });

    var optionnum = 1;
    var optionid = 'option';

    $("#optionAddBtn").click(function(e){
        e.preventDefault();
        var clone = optionform3.clone();
        var tmp = optionid + optionnum;

        clone.find("#option_name").attr("name","optionList[" + optionnum + "][name]");
        clone.find("#detail_name").attr("name","optionList[" + optionnum + "][optionDetailList]");

        optionnum++;

        clone.attr('id', tmp);
        optionform2.append(clone);
    });

    $("#optionDelBtn").click(function(e){
        e.preventDefault();

        optionnum--;
        var tmp = optionid + optionnum;

        $("#" + tmp).remove();
    });

    var optionlistform = $("#optionlistform");
    var optioncode = $("#optioncode");
    var add_price = $("#add_price");
    var stock_use2 = $("#stock_use2");
    var stock_num2 = $("#stock_num2");
    var optionCombiList = $("#optionCombiList");

    $("#optionCombineBtn").click(function(e){
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
        $(".detail_name").attr("readonly","true");
        $(".option_name").attr("readonly","true");
        $("#optionAddBtn").attr("disabled","disabled");
        $("#optionDelBtn").attr("disabled","disabled");

        var detail_name = $(".detail_name")

        var combine_list = [];
        var combine_atom_list = [];

        detail_name.each(function(index, item){
            combine_atom_list.push(item.value.split(',').map(item => item.trim()));
        });
        combine_list = combination(combine_atom_list);

        combine_list.forEach(function(element, index){
            optioncode.val(element);
            optioncode.attr('name','productDetailList[' + index + '][option_code]');
            add_price.attr('name','productDetailList[' + index + '][add_price]');
            stock_use2.attr('name','productDetailList[' + index + '][stock_use2]');
            stock_num2.attr('name','productDetailList[' + index + '][stock_num2]');

            var clone = optionlistform.clone();

            clone.find('#optionCombiDelBtn').click(function(e){
                e.preventDefault();
                $(this).parents('tr').remove();
            });

            clone.find("#stock_use2").change(function(e){
                e.preventDefault();
                if($(this).val()=='1'){
                    clone.find("#stock_num2").removeAttr("disabled");
                } else {
                    clone.find("#stock_num2").val("");
                    clone.find("#stock_num2").attr("disabled","disabled");
                }
            });

            optionCombiList.append(clone);
        });

    });

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

    $("#optionResetBtn").click(function(e){
        e.preventDefault();

        optionCombiList.html("");
        $(".detail_name").removeAttr("readonly");
        $(".option_name").removeAttr("readonly");
        $("#optionAddBtn").removeAttr("disabled");
        $("#optionDelBtn").removeAttr("disabled");
    });


    $("#productaddBtn").click(function(e){
        e.preventDefault();

        var test = JSON.stringify(productadd.serializeObject());

        $("#test").val(test);

        console.log(test);
        // productadd.attr("action","/member/test2").attr("method","post").submit();

    });//end productaddBtn

    //이미지
    var inputnum = 1;
    var inputid = 'addImg'
    $("#addImgPlusBtn").click(function(e){
        e.preventDefault();
        var tmp = inputid + inputnum
        inputnum++;
        addimgform.append("<input type='file' name='addImg' id=" + tmp + " class='form-control-file'>");
    });

    $("#addImgMinusBtn").click(function(e){
        e.preventDefault();
        inputnum--;
        var tmp = inputid + inputnum
        $("#" + tmp).remove();

    });

    //카테고리
    $("#parentSelect").change(function(e){
        e.preventDefault();

        var lowCategory = $("#lowCategory");
        var categoryNo = $(this).val();

        if (categoryNo == '없음'){
            lowCategory.attr("disabled","disabled");
            return;
        }

        lowCategory.html("<option>없음</option>");

        $.ajax({
			url: '/manager/lowlist',
			type : 'GET',
			data : {'parent': categoryNo },
			success : function(result){
                lowCategory.removeAttr("disabled");

                result.data.forEach(function (item, index) {
                    $(lowCategory).append('<option value='+ item.category_no +'>'+ item.category_name +'</option>');
                });

			},
			fail: function(e){
			    console.log("fail categoryListBtn");
			}

		  });// end ajax
    });

    $(".categoryListBtn").click(function(e){
        e.preventDefault();
        var no = $(this).data('no');
        var categoryNoId = '#category' + $(this).data('no');

        $.ajax({
			url: '/manager/lowlist',
			type : 'GET',
			data : {'parent': no },
			success : function(result){
                $(categoryNoId).html("");
                result.data.forEach(function (item, index) {
                    $(categoryNoId).append('<li style="padding-left: 20px; margin-bottom: 10px;">' + item.category_name + '</li>');
                });

			},
			fail: function(e){
			    console.log("fail categoryListBtn");
			}

		  });// end ajax
    });//end categoryListBtn

    $("#categoryadd_btn").click(function(e){
        e.preventDefault();

        categoryadd.attr("action","/manager/categoryadd").attr("method","post").submit();
    });
});

</script>
