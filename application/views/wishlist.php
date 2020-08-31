<div class="col-xl-9 col-lg-12 col-md-12">
  <div class="card mb-0">
    <div class="card-header">
      <?php
        // var_dump($wishlist_info);
        // var_dump($product_info);
        // var_dump($product_thumnail_info);
        // var_dump($category_info);
       ?>
      <?php
          $mypages = $this->lang->line('mypages');
          echo '<h3 class="card-title lead">'.$mypages[1].'</h3>';
       ?>
    </div>
    <div class="card-body">
      <div class="my-favadd table-responsive border-top userprof-tab">
        <table class="table table-bordered table-hover mb-0 text-nowrap">
          <thead>
            <tr>
              <!-- <th class="text-center"></th> -->
              <th class="text-center">상품이미지</th>
              <th class="text-center">카테고리</th>
              <th class="text-center ">판매가</th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>
            <?php
                for ($i=0; $i < count($wishlist_info); $i++)
                {
                  $product_no = $product_info[$i][0]['no'];
                  $product_name = $product_info[$i][0]['name'];
                  $product_title = $product_info[$i][0]['title'];
                  $product_price = $product_info[$i][0]['price']-$product_info[$i][0]['discount_price'];
                  $img_src = $product_thumnail_info[$i][0]['fileURL'].$product_thumnail_info[$i][0]['filename'].'.'.$product_thumnail_info[$i][0]['fileExe'];
            ?>
            <tr>
              <!-- <td  style="vertical-align: middle">
                <label class="custom-control custom-checkbox p-0 mr-1">
                  <input type="checkbox" class="custom-control-input" name="checkbox" value="checkbox">
                  <span class="custom-control-label"></span>
                </label> -->
              </td>
              <td class="align-self-center"  style="vertical-align: middle">
                <div class="media mt-0 mb-0">
                  <div class="card-aside-img">
                    <a href="/product/<?=$product_no?>"></a>
                    <img src="<?=$img_src?>" alt="img">
                  </div>
                  <div class="media-body">
                    <div class="card-item-desc ml-4 p-0 mt-2">
                      <span>[#product_<?=$product_no?>]</span><br>
                      <a href="/product/<?=$product_no?>" class="text-dark"><h4 class="font-weight-semibold"><?=$product_name?></h4></a>
                      <a href="/product/<?=$product_no?>" class="text-dark"><h4 class="font-weight-semibold"><?=$product_title?></h4></a>
                    </div>
                  </div>
                </div>
              </td>
              <td class="text-center align-self-center"  style="vertical-align: middle"><?=$category_info[$i][0]['name']?></td>
              <td class="font-weight-semibold fs-16 text-center" style="vertical-align: middle"><?=number_format($product_price)?>원</td>
              <td class="text-center"  style="vertical-align: middle">
                <a href="#" class="btn btn-info btn-sm text-white" id="wishlist<?=$product_no?>" onclick="wishlistDelete(this,<?=$product_no?>)" data-toggle="tooltip" data-original-title="삭제"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            <?php
                }
             ?>
          </tbody>
        </table>
      </div>
      <!-- <div class="tab-pane active" id="tab-11">
        <?php
            for ($i=0; $i < count($wishlist_info); $i++)
            {
        ?>
        <div class="card overflow-hidden">
          <div class="d-md-flex">
            <div class="item-card9-img">
              <div class="arrow-ribbon bg-primary">찜</div>
              <div class="item-card9-imgs">
                <a href="#상품번호"></a>
                <img src="/static/lib/assets/theme/images/products/h4.png" alt="img" class="cover-image">
              </div>
            </div>
            <div class="card border-0 mb-0">
              <div class="card-body ">
                <div class="item-card9">
                  <a href="#상품번호"><?=$product_info[$i][0]['name']?></a>
                  <a href="#상품번호" class="text-dark"><h4 class="font-weight-semibold mt-1"><?=$product_info[$i][0]['title']?></h4></a>
                </div>
              </div>
              <div class="card-footer pt-4 pb-4">
                <div class="item-card9-footer d-flex">
                  <div class="item-card9-cost">
                    <h4 class="text-dark font-weight-semibold mb-0 mt-0">$263.99</h4>
                  </div>
                  <div class="ml-auto">
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
            }
         ?>
      </div> -->
    </div>
  </div>
</div>
<script>
function wishlistDelete(argu,num)
{
  var user_no = '<?php echo $_SESSION['user_no']; ?>';
  var wishlist_id = argu.id;
  console.log('user_no: '+user_no);
  console.log('product_no: '+num);
  $.post("/wishlist/wishlist/delete", {
    'product_no' : num,
    'user_no' : user_no
    }, function(data){
    // console.log(data);
    if(data == 0){
      console.log('찜 삭제 실패');

    }else{
      console.log('찜 삭제 성공');
       location.href = '/wishlist';
    }
  });
}
</script>
