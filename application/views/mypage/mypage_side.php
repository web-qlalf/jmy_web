<?php //echo $page_num;?>
<div class="col-xl-2 col-lg-12 col-md-12">
  <div class="card">
    <div class="card-header">
      <?php $mypages_title = $this->lang->line('mypages_title');?>
       <h3 class="card-title"><?=$mypages_title[0]?></h3>
    </div>
    <div class="card-body text-center item-user border-bottom">
      <div class="profile-pic">
        <div class="profile-pic-img">
          <!-- <span class="bg-success dots" data-toggle="tooltip" data-placement="top" title="online"></span> -->
          <img src="/static/lib/assets/theme/images/faces/male/26.jpg" class="brround" alt="user">
        </div>
        <h4 class="mt-3 mb-0 font-weight-semibold"><?=$this->session->userdata('user_name')?>님</h4>
      </div>
      <input type="hidden" class="page_num" value="<?=$page_num?>" />
    </div>
    <div class="item1-links  mb-0">
      <?php
      $mypage = $this->lang->line('mypages');
      $mypages_icon = $this->lang->line('mypages_icon');
      $mypage_URL = $this->lang->line('mypage_URL');

      // @var_dump($mypage);
        for ($i=0; $i < count($mypage) ; $i++) {
          if($i == 4){
            echo '<a href="/logout" class="d-flex border-bottom">';
            echo '<span class="icon1 mr-3"><i class="'.$mypages_icon[$i].'"></i></span>'.$mypage[$i];
            echo '</a>';
          }else{
            echo '<a href="/'.$mypage_URL[$i].'" class="d-flex border-bottom">';
            echo '<span class="icon1 mr-3"><i class="'.$mypages_icon[$i].'"></i></span>'.$mypage[$i];
            echo '</a>';
          }
        }
       ?>
    </div>
  </div>
</div>

<script>
list_select();

function list_select(){
  var page_num = parseInt($('.page_num').val());

  switch (page_num) {
    case 0:
        $('.item1-links').children().eq(0).attr('class','d-flex border-bottom active');
        $('.item1-links').children().eq(1).attr('class','d-flex border-bottom');
        $('.item1-links').children().eq(2).attr('class','d-flex border-bottom');
        $('.item1-links').children().eq(3).attr('class','d-flex border-bottom');
      break;
    case 1:
    console.log(page_num);
        $('.item1-links').children().eq(0).attr('class','d-flex border-bottom');
        $('.item1-links').children().eq(1).attr('class','active d-flex border-bottom');
        $('.item1-links').children().eq(2).attr('class','d-flex border-bottom');
        $('.item1-links').children().eq(3).attr('class','d-flex border-bottom');
      break;
    case 2:
        $('.item1-links').children().eq(0).attr('class','d-flex border-bottom');
        $('.item1-links').children().eq(1).attr('class','d-flex border-bottom');
        $('.item1-links').children().eq(2).attr('class','d-flex border-bottom active');
        $('.item1-links').children().eq(3).attr('class','d-flex border-bottom');
      break;
    case 3:
        $('.item1-links').children().eq(0).attr('class','d-flex border-bottom');
        $('.item1-links').children().eq(1).attr('class','d-flex border-bottom');
        $('.item1-links').children().eq(2).attr('class','d-flex border-bottom');
        $('.item1-links').children().eq(3).attr('class','d-flex border-bottom active');
      break;
    default:
        $('.item1-links').children().eq(0).attr('class','d-flex border-bottom');
        $('.item1-links').children().eq(1).attr('class','d-flex border-bottom');
        $('.item1-links').children().eq(2).attr('class','d-flex border-bottom');
        $('.item1-links').children().eq(3).attr('class','d-flex border-bottom');

  };
}

</script>
