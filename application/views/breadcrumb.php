<!--Breadcrumb-->
<section>
  <div class="bannerimg cover-image bg-background3" data-image-src="/static/lib/assets/theme/images/banners/banner2.jpg">
    <div class="header-text mb-0">
      <div class="container">
        <div class="text-center ">
          <h1 class="text-white">KKULBI</h1>
          <ol class="breadcrumb text-center">
            <?php
            //var_dump($page_info);
            //page_name //page_num
            ?>
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <!-- <li class="breadcrumb-item"><a href="#로그인">로그인</a></li> -->
            <?php if($page_info){
                      switch ($page_info['page_name']) {
                        case 'mypage':
                          echo '<li class="breadcrumb-item pl-0 pr-0"><a href="/member/mypage_get/1">마이페이지</a></li>';
                          $mypages = $this->lang->line('mypages');
                            switch ($page_info['page_num']) {
                              case '0':
                                echo '<li class="breadcrumb-item active text-white" aria-current="page">'.$mypages[0].'</li>';
                                break;
                              case '1':
                                echo '<li class="breadcrumb-item active text-white" aria-current="page">'.$mypages[1].'</li>';
                                break;
                              case '2':
                                echo '<li class="breadcrumb-item active text-white" aria-current="page">'.$mypages[2].'</li>';
                                break;
                              case '3':
                                echo '<li class="breadcrumb-item active text-white" aria-current="page">'.$mypages[3].'</li>';
                                break;

                              default:
                                echo '<li class="breadcrumb-item active text-white" aria-current="page">'.$mypages[0].'</li>';
                                break;
                            };
                          break;

                        case 'category':
                            echo '<li class="breadcrumb-item active text-white pl-0 pr-0">'.$page_info['page_num'][0]['name'].'</li>';
                            break;

                        case 'oderpage':
                          echo '<li class="breadcrumb-item active text-white pl-0 pr-0">주문하기</li>';
                          break;

                        case 'join_page':
                          echo '<li class="breadcrumb-item active text-white pl-0 pr-0">가입하기</li>';
                          break;

                        case 'order_detail':
                          echo '<li class="breadcrumb-item active text-white pl-0 pr-0">주문상세정보</li>';
                          break;

                        case 'forgot_password':
                          echo '<li class="breadcrumb-item active text-white pl-0 pr-0"><a href="#">비밀번호 찾기</a></li>';
                          break;

                        case 'new_password':
                          echo '<li class="breadcrumb-item pl-0 pr-0"><a href="#">비밀번호찾기</a></li>';
                          echo '<li class="breadcrumb-item active text-white pl-0 pr-0" aria-current="page">새 비밀번호</li>';
                          break;
                        case 'order_payment':
                          echo '<li class="breadcrumb-item active text-white pl-0 pr-0" aria-current="page">주문페이지</li>';
                          break;

                        case 'product':
                          // var_dump($page_info['page_num']);
                          $count = count($page_info['page_num']);
                          $count_minus = $count-1;
                          for ($i=0; $i < $count; $i++) {
                            // echo $page_info['page_num'][$i][0]['name'];
                            if($i == $count_minus){
                              echo '<li class="breadcrumb-item active text-white pl-0 pr-0" aria-current="page">'.$page_info['page_num'][$i][0]['name'].'</a></li>';
                            }else{
                              echo '<li class="breadcrumb-item pl-0 pr-0"><a href="/category/'.$page_info['page_num'][$i][0]['id'].'">'.$page_info['page_num'][$i][0]['name'].'</a></li>';
                            }
                          }
                          break;
                      }?>
            <?php  } else{?>
            <li class="breadcrumb-item"><a href="#이전링크">수정</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">수정</li>
            <!-- <li class="breadcrumb-item"><a href="#판매회원가입">판매회원가입</a></li> -->
            <?php } ?>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/Breadcrumb-->
