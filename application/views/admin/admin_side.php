<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar doc-sidebar">
  <div class="app-sidebar__user clearfix">
    <div class="dropdown user-pro-body">
      <div>
        <img src="/static/lib/assets/theme/images/brand/admin_logo.png" alt="user-img" class="avatar avatar-xxl brround">
      </div>
      <div class="user-info">

        <?php
          switch ($this->session->userdata('position'))
          {
            case 0:
            $this->session->sess_destroy();
            $this->session->set_flashdata('message','잘못된 접근입니다.');
            $this->load->helper('url');
            redirect('/admin/login');
              break;
            case 1:
              $position = 'admin';
              break;
            case 2:
              $position = '판매';
              break;
            case 3:
              $position = '고객관리';
              break;
            case 4:
              $position = 'CMS';
              break;
          }
         ?>
        <span><h2><?=$this->session->userdata('user_name')?></h2>[<?=$position?>]</span>
      </div>
    </div>
  </div>
  <ul class="side-menu">
    <li class="slide">
      <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-window-restore"></i><span class="side-menu__label">상품관리</span><i class="angle fa fa-angle-right"></i></a>
      <ul class="slide-menu">
        <li>
          <a href="/admin/product/list" class="slide-item">상품리스트</a>
        </li>
        <li>
          <a href="/admin/product/add" class="slide-item">상품등록</a>
        </li>
      </ul>
    </li>
    <li class="slide">
      <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-shopping-basket"></i><span class="side-menu__label">주문관리</span><i class="angle fa fa-angle-right"></i></a>
      <ul class="slide-menu">
        <li>
          <a href="/admin/order/list" class="slide-item">주문리스트</a>
        </li>
      </ul>
    </li>
    <li class="slide">
      <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-commenting"></i><span class="side-menu__label">문의/리뷰관리</span><i class="angle fa fa-angle-right"></i></a>
      <ul class="slide-menu">
        <li>
          <a href="#Q&A리스트" class="slide-item">상품 Q&A 관리</a>
        </li>
        <li>
          <a href="#후기리스트" class="slide-item">상품 평가/리뷰 관리</a>
        </li>
      </ul>
    </li>
    <li class="slide">
      <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">회원관리</span><i class="angle fa fa-angle-right"></i></a>
      <ul class="slide-menu">
        <li>
          <a href="/admin/member/list" class="slide-item">회원 리스트</a>
        </li>
      </ul>
    </li>
    <li class="slide">
      <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-th-large"></i><span class="side-menu__label">창고 관리</span><i class="angle fa fa-angle-right"></i></a>
      <ul class="slide-menu">
        <li>
          <a href="/admin/delivery/list" class="slide-item">창고 리스트</a>
        </li>
        <li>
          <a href="/admin/delivery/add" class="slide-item">창고 추가</a>
        </li>
      </ul>
    </li>
    <li class="slide">
      <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-cogs"></i><span class="side-menu__label">관리자 모드</span><i class="angle fa fa-angle-right"></i></a>
      <ul class="slide-menu">
        <li>
          <a href="/admin/user/list" class="slide-item">Admin 계정 리스트</a>
        </li>
        <li>
          <a href="/admin/user/new_user" class="slide-item">Admin 계정 생성</a>
        </li>
      </ul>
    </li>
    <li class="slide">
      <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-pencil"></i><span class="side-menu__label">CMS</span><i class="angle fa fa-angle-right"></i></a>
      <ul class="slide-menu">
        <li>
          <a href="#" class="slide-item">배너</a>
          <!--메인 페이지/서브 페이지-->
          <!--로고 버전 1/버전 2-->
          <!--인트로-->
          <!--admin 노출 로고-->
        </li>
        <li>
          <a href="#" class="slide-item">카테고리</a>
          <!--카테고리 추가/삭제/수정  관리-->
          <!--메인 상단바 노출되는 카테고리 추가/삭제/수정-->
        </li>
        <li>
          <a href="#" class="slide-item">노출상품관리</a>
          <!--메인/서브 노출되는 상품 관리-->
          <!--신상/베스트셀러/MD추천상품리스트/일반노출-->
        </li>
        <li>
          <a href="#" class="slide-item">SNS 관리</a>
          <!--상단바 및 기타 SNS 링크-->
        </li>
        <li>
          <a href="#" class="slide-item">기타 관리</a>
          <!--하단 링크 추가 및 연락처 수정-->
          <!--상단바 및 기타 SNS 링크-->
        </li>
      </ul>
    </li>
  </ul>
  <div class="app-sidebar-footer">
    <a href="#후기관리">
      <span class="fe fe-thumbs-up" aria-hidden="true"></span>
    </a>
    <a href="#판매자정보관리">
      <span class="fa fa-user-circle" aria-hidden="true"></span>
    </a>
    <a href="#배송관리">
      <span class="fe fe-truck" aria-hidden="true"></span>
    </a>
    <a href="#상품조회">
      <span class="fe fe-package" aria-hidden="true"></span>
    </a>
    <a href="/admin/login">
      <span class="fa fa-sign-in" aria-hidden="true"></span>
    </a>
  </div>
</aside>
