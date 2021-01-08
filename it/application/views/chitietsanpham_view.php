
    <!DOCTYPE html>
<html lang="vi">
<head>
    <title> 
        Phuongphan.vn
    </title>
    <meta name="description" content="">
    <meta name="keywords" content=""/>
    <link rel="icon" href="<?php echo base_url(); ?>images/brand.png"  type="image/x-icon"/>
<meta http-equiv="content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<script src='<?php echo base_url(); ?>js1/jquery-2.2.3.min.js' type='text/javascript'></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>css1/font-awesome.min.css">
<link href='<?php echo base_url(); ?>css1/plugin.scss.css' rel='stylesheet' type='text/css' media='all'/>
<link href='<?php echo base_url(); ?>css1/css.css' rel='stylesheet' type='text/css' media='all'/>
<link href='<?php echo base_url(); ?>css1/base.scss.css' rel='stylesheet' type='text/css' media='all'/>
<link href='<?php echo base_url(); ?>css1/style.scss.css?v=1' rel='stylesheet' type='text/css' media='all'/>
<link href='<?php echo base_url(); ?>css1/update.scss.css' rel='stylesheet' type='text/css' media='all'/>
<link href='<?php echo base_url(); ?>css1/module.scss.css' rel='stylesheet' type='text/css' media='all'/>
<link href='<?php echo base_url(); ?>css1/responsive.scss.css' rel='stylesheet' type='text/css' media='all'/>
<link href='<?php echo base_url(); ?>css1/stylesheet.scss.css' rel='stylesheet' type='text/css' media='all'/>
<link href='<?php echo base_url(); ?>css1/jquery.mmenu.all.css' rel='stylesheet' type='text/css' media='all'/>
<link href='<?php echo base_url(); ?>css1/mobile_chat.scss.css' rel='stylesheet' type='text/css' media='all'/>
<link href='<?php echo base_url(); ?>css1/my-style.css' rel='stylesheet' type='text/css' media='all'/>
<link href='<?php echo base_url(); ?>css1/htt-team.css?v=1' rel='stylesheet' type='text/css' media='all'/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='<?php echo base_url(); ?>css1/sidebar_menu.scss.css' rel='stylesheet' type='text/css' media='all'/>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
    <style type="text/css">
        [v-cloak] {
            display: none
        }
        #navbar {
            /*overflow: hidden;*/
            z-index: 1000;
        }
        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
        }
    </style>
</head>

<body>
<!-- Load Facebook SDK for JavaScript -->



<div class="page-body">
    <div class="hidden-md hidden-lg opacity_menu"></div>
    <div class="opacity_filter"></div>

    <header class="header">

    
    <div class="mainbar topbar">
        <div class="container">
            <div class="row">
                <div class="menu-bar hidden-lg">
                    <a href="#nav-mobile">
                        <i class="fa fa-align-justify"></i>
                    </a>
                </div>
                <!--  ICON MẠNG XÃ HỘI  -->
                <div class="hidden-xs col-sm-4 col-sm-offset-0 col-md-4 col-lg-2 item-mainbar">
                    <div class="header-social">
                        <ul class="inline-list social-icons">
                            <li>
                               <a class="icon-fallback-text txt-facebook hv-bg-facebook hv-bd-facebook" target="_blank" href="https://www.facebook.com/phuongnenenha">
                                                <span class="icon icon-facebook" aria-hidden="true">
                                                    <i class="fa fa-facebook"></i>
                                                </span>
                                </a>
                            </li>
                            <li>
                                <a class="icon-fallback-text txt-twitter hv-bg-twitter hv-bd-twitter"
                                   href="https://twitter.com/">
                                                <span class="icon icon-twitter" aria-hidden="true">
                                                    <i class="fa fa-twitter"></i>
                                                </span>
                                </a>
                            </li>
                            <li>
                                <a class="icon-fallback-text txt-google-plus hv-bg-google-plus hv-bd-google-plus"
                                   href="https://plus.google.com/">
                                                <span class="icon icon-google-plus" aria-hidden="true">
                                                    <i class="fa fa-google-plus"></i>
                                                </span>
                                </a>
                            </li>
                            <li>
                                <a class="icon-fallback-text txt-youtube hv-bg-youtube hv-bd-youtube"
                                   href="https://www.youtube.com">
                                                <span class="icon icon-youtube" aria-hidden="true">
                                                    <i class="fa fa-youtube"></i>
                                                </span>
                                </a>
                            </li>
                            <li>
                                <a class="icon-fallback-text txt-instagram hv-bg-instagram hv-bd-instagram"
                                   href="https://www.instagram.com/">
                                                <span class="icon icon-instagram" aria-hidden="true">
                                                    <i class="fa fa-instagram"></i>
                                                </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END ICON MẠNG XÃ HỘI  -->
            <!--  LOGO CUA TRANG CHỦ -->
                <div class="col-xs-2 hidden-sm hidden-md hidden-lg"></div>
                <div class="col-xs-6 col-xs-offset-1 col-sm-4 col-sm-offset-0 col-md-4 col-lg-3 item-mainbar">
                    <div class="logo">
                        <a title="PHUONGPHAN.VN" href="<?php echo base_url(); ?>trangchu">
                            <img id="logo-header" class="img-responsive" src="<?php echo base_url(); ?>images/brand.png"
                                 alt="">
                        </a>
                    </div>
                </div>
            <!-- END LOGO CUA TRANG CHỦ -->
            
            <!-- TÌM KIẾM -->
                <div class="hidden-xs hidden-sm hidden-md col-lg-5 item-mainbar">
                    <div class="top_right fw ">
                        <div class="search_bar">
                            <div class="input-group">
                                <form action="<?php echo base_url('danhmuc/search'); ?>" method="get">
                                    <input type="text" class="form-control" autocomplete="off" maxlength="70"
                                           name="key-search"  value="<?php echo isset($key) ? $key : ''?>" id="search" title="Nhập từ khoá cần tìm"
                                           placeholder="Tìm theo tên sản phẩm..." required>
                                    <button name="but" class="btn" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="hotline hidden-xs">
                            Hotline: <a href="tel:0799854546"><strong>0799854546</strong></a>
                        </div>
                    </div>
                </div>
            <!-- END TÌM KIẾM -->
            <!-- ĐĂNG NHẬP -->
                <div class="hidden-xs hidden-sm hidden-md col-lg-1 item-mainbar">
                     <div class="top_left fw">
                            <ul>
                                <li class="cp-item">
                                    <?php if($login):?>
                                         <a href="<?php echo base_url(); ?>danhmuc/logout" title="Đăng Xuất" class="btn-transition">
                                        <i class="fa fa-sign-in"></i><span> Đăng Xuất</span> 
                                    </a>
                                    
                                   
                                     <?php else:?>
                                    <a href="<?php echo base_url(); ?>login" title="Đăng Xuất" class="btn-transition">
                                        <i class="fa fa-sign-in"></i><span>Đăng Nhập</span>  
                                    </a>
                                    <?php endif;?>
                                </li>
                            </ul>
                                            </div>
                </div>
            <!-- END ĐĂNG NHẬP -->
             <!-- GIỎ HÀNG -->
                <div class="col-xs-2 col-xs-offset-1 col-sm-4 col-sm-offset-0 col-md-4 col-lg-1 item-mainbar">
                    <div class="top-cart-contain panel_cart">
                        <div class="mini-cart text-xs-center">
                            <div class="heading-cart">
                                <a href="<?php echo base_url(); ?>giohang">
                                    <div class="img">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                             enable-background="new 0 0 50 50" height="50px" id="Layer_1" version="1.1"
                                             viewBox="0 0 50 50" width="50px" xml:space="preserve"><path
                                                    d="M8,14L4,49h42l-4-35H8z" fill="none" stroke="#000000"
                                                    stroke-linecap="round" stroke-miterlimit="10"
                                                    stroke-width="2"></path>
                                            <rect fill="none" height="50" width="50"></rect>
                                            <path d="M34,19c0-1.241,0-6.759,0-8  c0-4.971-4.029-9-9-9s-9,4.029-9,9c0,1.241,0,6.759,0,8"
                                                  fill="none" stroke="#000000" stroke-linecap="round"
                                                  stroke-miterlimit="10" stroke-width="2"></path>
                                            <circle cx="34" cy="19" r="2"></circle>
                                            <circle cx="16" cy="19" r="2"></circle></svg>
                                    </div>
                                    <div class="info">
                                    <span class="cart_info">
                                        <span class="cartCount count_item_pr" id="cart-total"><?php echo $total_items?></span>
                                    </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <!--  END GIỎ HÀNG -->

            </div>
        </div>
    </div>

    <div class="header-menu hidden-md hidden-sm hidden-xs" id="navbar">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <nav>
                <ul id="nav" class="nav container"> <!-- 4 CỘT -->
                     <li class="nav-item "> <!--  CỘT 1 -->

                    <a class="nav-link">Danh mục<i class="fa fa-angle-down" data-toggle="dropdown"></i></a>
                    <ul class="dropdown-menu"> 
                    <?php  foreach ($danhmuc as $key => $value): ?>
                        <li class="dropdown-submenu nav-item-lv2">  <!-- MỤC ĐẦU TIÊN -->
                            <a class="nav-link"  href="<?php echo base_url(); ?>danhmuc/danhmuc/<?=$value['id']?>/<?= $value['name'] ?>" title="<?= $value['name'] ?>">
                            <strong><?= $value['name'] ?></strong><i class="fa fa-caret-right"></i> 
                            </a>

                        <!-- <ul class="dropdown-menu"> 
                            <li class="dropdown-submenu nav-item-lv3">
                            <a class="nav-link" href="https://fugear.vn/categories/82/ban-chu-z">
                            <strong>Bàn chữ Z</strong> </a> 
                             </li>  
                        </ul> -->
                        </li>
                <?php endforeach; ?>
                         
                    </ul>
                </li>

                <li class="nav-item "> <!--  CỘT 2 -->
                    <a href="" class="nav-link">Tin Tức</a>
                 </li>

                 <li class="nav-item "> <!--  CỘT 3 -->
                    <a href="" class="nav-link">Giới Thiệu</a>
                 </li>

                 <li class="nav-item "> <!--  CỘT 4-->
                    <a href="" class="nav-link">Liên Hệ</a>
                 </li>
             </ul>
         </nav>
     </div>
     </div>
    </div>
    </div>
</header>
     <!--  SILDE  -->
    <section class="lib-section-1">
    <div class="section_slider fw">
        <div class="home-slider owl-carousel owl-theme dots-enable owl-loaded owl-drag" data-lg-items="1" data-md-items="1" data-sm-items="1" data-xs-items="1" data-margin="0" data-dot="true" data-loop="true">
                            
                    <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-2376px, 0px, 0px); transition: all 0s ease 0s; width: 5940px;">
                        <!-- SILDE ĐẦU -->
                     <?php  foreach ($silde as $key => $value): ?>
                    <div class="owl-item cloned" style="width: 1188px;">
                    <div class="item image-item">
                    <a href="<?php echo base_url(); ?>index" target="_blank">
                        <img class="img-responsive" src="<?php echo base_url(); ?>images/<?= $value['image'] ?>" alt="slider-1">
                    </a>
                    </div>
                    </div>
                    <?php endforeach ?>

            </div>

            </div>

            <div class="owl-nav disabled"><span role="presentation" class="owl-prev"><i class="fa fa-angle-left"></i></span><span role="presentation" class="owl-next"><i class="fa fa-angle-right"></i></span></div><div class="owl-dots disabled"><button role="button" class="owl-dot active"><span></span></button></div>
        </div>
    </div>
    </section>
     <!-- END SILDE  -->
    <section class="mega-menu gearvn-header-menu">
   
    <!-- LEFT DANH MỤC SẢN PHẨM -->
    <div class="sidebar-item sidebar-menu sidebar-collection-menu">
        <div class="module-header">
            <h2 class="title-head module-title sidebar-title">
                <a href="javascript:;">
                    <span>Danh mục sản phẩm</span>
                </a>
            </h2>
        </div>
        <div class="sidebar-menu-content module-content">
            <div class="sidebar-linklists">
                <?php  foreach ($danhmuc as $key => $value): ?>
                <ul>
                        <li class="sidebar-menu-list collection-sidebar-menu">
                            <a class="ajaxLayer"
                               href="<?php echo base_url(); ?>danhmuc/danhmuc/<?=$value['id']?>/<?= $value['name'] ?>"
                               title="<?= $value['name'] ?>">
                               <b> <span><?= $value['name'] ?></span> </b>
                            </a>
                        </li>
                        
                </ul>
            <?php endforeach ?>
            </div>
        </div>
    </div>

    </section>

    <!-- END LEFT DANH MỤC SẢN PHẨM -->


    <!-- DƯỚI SILDE  -->
    <section class="lib-section-3">

    <div class="flex-container container">
        <div class="column-wrap active-ani">
            <div class="support-inner">
                <div class="inner-icon">
                    <img src="<?php echo base_url(); ?>images/giaohangtoanquoc.png" alt="FREE_DELIVERY">
                </div>
                <div class="inner-content">
                    <h5><span><strong>GIAO HÀNG TOÀN QUỐC</strong></span></h5>
                </div>
            </div>
        </div>
        <div class="column-wrap  active-ani">
            <div class="support-inner">
                <div class="inner-icon">
                    <img src="<?php echo base_url(); ?>images/baohanhcucnhanh.png" alt="FREE_CHANGE_RETURN">
                </div>
                <div class="inner-content">
                    <h5><span><strong>BẢO HÀNH CỰC NHANH</strong></span></h5>
                </div>
            </div>
        </div>
        <div class="column-wrap  active-ani">
            <div class="support-inner">
                <div class="inner-icon">
                    <img src="<?php echo base_url(); ?>images/luoncouudai.png" alt="hotline">
                </div>
                <div class="inner-content">
                    <h5><span><strong>LUÔN CÓ ƯU ĐÃI</strong></span></h5>
                </div>
            </div>
        </div>
        <div class="column-wrap  active-ani">
            <div class="support-inner">
                <div class="inner-icon">
                    <img src="<?php echo base_url(); ?>images/hotrohetminh.png" alt="SUPPORT">
                </div>
                <div class="inner-content">
                    <h5><span><strong>HỖ TRỢ HẾT MÌNH</strong></span></h5>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    @media (max-width: 767px) {
        .lib-section-3 .flex-container .column-wrap {
             width: 25% !important;
        }
    }
</style>
    <!--END DƯỚI SILDE  -->
    
     <!-- END CHI TIẾT SẢN PHẨM  -->
   <section class="lib-section-5">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    
    <ol class="breadcrumb breadcrumb-arrows" itemscope="" itemtype="http://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
        <a href="<?php echo base_url(); ?>trangchu" target="_self" itemprop="item"><span itemprop="name"><strong>Trang chủ</strong></span></a>
        <meta itemprop="position" content="1">
    </li>
    
    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
       
            <a target="_self" itemprop="item">
                <?php foreach ($sanpham as $value):?>
                <span itemprop="name">
                     
                   <strong><?php echo $value['name']; ?></strong>
                  
                </span>
                 <?php endforeach;?>
            </a>
            <meta itemprop="position" content="2">

    </li>
     
     </ol>
     

    <section class="product product-template">
   
     <div class="row details-product">
        <!--  ẢNH -->
         <?php foreach ($sanpham as $value):?>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 product_images_list">
                       <!--  ẢNH CHÍNH -->
                        <div class="large-image">
                            
                            <img id="img_01" src="<?php echo base_url(); ?>images/product/<?php echo $value['image_link']; ?>" alt="<?php echo $value['name']; ?>">
                        </div>

 
                                  
            <div id="gallery_01" class="owl-carousel owl-theme thumbnail-product owl-loaded owl-drag" data-lg-items="6" data-md-items="4" data-sm-items="3" data-xs-items="4" data-xxs-items="3" data-margin="5" data-nav="true">
                                                            
                                            
                                    
        <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 228px;">
            <div class="owl-item active" style="width: 108.667px; margin-right: 5px;"><div class="item">
                  <a class="zoomThumbActive" href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '<?php echo base_url('images/product/'.$value['image_link'])?>',largeimage: '<?php echo base_url('images/product/'.$value['image_link'])?>'}">
                           <img class="changeimg" src=' <?php echo base_url('images/product/'.$value['image_link'])?> '> </a>  </div>
             </div>
             <?php if(is_array($image_list)):?>
                <?php foreach ($image_list as $img):?>
             <div class="owl-item active" style="width: 108.667px; margin-right: 5px;"><div class="item">
                <a  href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '<?php echo base_url('images/product/'.$img)?>',largeimage: '<?php echo base_url('images/product/'.$img)?>'}">
                            <img  class="changeimg" src='<?php echo base_url('images/product/'.$img)?>'> </a>
                        </div>
             </div>
             <?php endforeach;?>
             <?php endif;?>

                    </div>
            </div><div class="owl-nav disabled"><span role="presentation" class="owl-prev"><i class="fa fa-angle-left"></i></span><span role="presentation" class="owl-next"><i class="fa fa-angle-right"></i></span></div><div class="owl-dots disabled"></div>
            </div>
                
                                

        </div>
        <?php endforeach;?>
    <!-- END ẢNH -->
    
    <!-- TỔNG INFO SẢN PHẨM -->
      <?php foreach ($sanpham as $value):?>
     <div id="product_detail_vue">
       
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 details-pro">
                <!-- INFO SẢN PHẨM -->
                <h1 class="title-head product-title" itemprop="name"><?php echo $value['name']; ?></h1>
                <ul class="product-info">
                    <li class="product_sku">
                        <span>Mã sản phẩm: </span><span class="normal-text"><?php echo $value['masp']; ?></span>
                    </li>

                    <li class="product-vendor" itemprop="brand">
                        <span>Hãng sản xuất: </span><span class="normal-text"><?php echo $value['hangsx']; ?></span>
                    </li>
                    <li class="product-vendor" itemprop="brand">
                         <span>Thời gian bảo hành: </span><span class="normal-text"><?php echo $value['baohanh']; ?></span>
                    </li>
                    <li class="product-vendor" itemprop="brand">
                        <span>Tình trạng: </span><span
                         class="normal-text"><?php echo $value['trangthai']; ?></span>
                    </li>
                </ul>
                 <!-- END INFO SẢN PHẨM -->
                 <!-- GIÁ TIỀN SẢN PHẨM -->
                <div class="price-box price-box-product">
                    <span class="special-price">
                        <?php if($value['discount'] > 0):?>
                            <?php $price_new = $value['price'] - $value['discount'];?>
                        <div class="price-box price-box-product">
                       <span class="special-price"> <span class="price" itemprop="price">Giá : <?php echo number_format($price_new)?> ₫</span><meta itemprop="priceCurrency" content="VND"></span>
                  
                            <div class="price-box price-box-product">
                          <span class="old-price"><span class="price">Giá cũ : <?php echo number_format( $value['price'] )?> ₫</span><meta itemprop="priceCurrency" content="VND"></span>
                      </div>
                         <?php else:?>
                            <span class="old-price"><span class="price">Giá cũ : <?php echo number_format( $value['price'] )?> ₫</span><meta itemprop="priceCurrency" content="VND"></span>
                         <?php endif;?>  
                         </div>

                        <meta itemprop="priceCurrency" content="VND">
                    </span>
                </div> 
                <!-- END GIÁ TIỀN SẢN PHẨM -->
               <!--  THÊM VÀO GIỎ HÀNG -->
                <div class="form-product">
                    <div class="quantity_contact" style="display: none">
                        <div class="form-group product_quantity">
                            <input type="hidden" v-model="product.id">
                            <label class="form-control-label">
                                Số lượng
                            </label>
                            <div class="wrapup-qty">
                                <button @click="decreaseQty" class="reduced btn btn-ipnb" type="button">-
                                </button>
                                <input type="text" class="form-control text-xs-center qty" title="Số lượng"
                                       v-model.number="quantity" maxlength="3" id="qty" name="quantity">
                                <button @click="increaseQty" class="increase btn btn-ipnb" type="button">+
                                </button>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 50px" class="clearfix col-md-12 col-12 col-lg-12 col-sm-12"></div>
               
                    <div class="button_actions col-md-6 col-12 col-lg-6 col-sm-12" v-show="product.status === 1">
                        
                       
                               
                           <a class="btn btn-buy btn-transition add_to_cart button-hover-3"  href="<?php echo base_url()."giohang/add/".$value['id']; ?>" title='Mua ngay'><span>Thêm vào giỏ hàng</span></a>
                            
                     
                        
                    </div>
                   
               
                </div>
                <!-- END THÊM VÀO GIỎ HÀNG -->
            </div>
          
       <!--  TAB ĐỂ THANH TOÁN -->
     <di v id="success_tic" class="modal fade in col-sm-12 col-12" role="dialog" style="display: none;">
    <div id="popup-cart-desktop" class="clearfix">
        <div class="title-popup-cart">
            <img src="https://fugear.vn/images/add_to_cart.svg" alt="add_to_cart" class="img-responsive">
            <div class="cart-popup-info">
                <span class="cart-noti-info">Sản phẩm đã thêm</span>
            </div>
            <a title="Close" class="quickview-close close-window" href="javascript:;"
               onclick="$('#success_tic').fadeOut();"><i class="fa  fa-close"></i></a>
        </div>
        <div class="content-popup-cart desktop">
            <div class="thead-popup">
                <div style="width: 49%;" class="text-left">Sản phẩm</div>
                <div style="width: 16%;" class="text-center">Đơn giá</div>
                <div style="width: 14%;" class="text-center">Số lượng</div>
                <div style="width: 19%;" class="text-right">Thành tiền</div>
            </div>
            <div class="tbody-popup">


                <div class="item-popup productid-1034709138" v-for="product in cart_content" :key="product.rowId">
                    <div style="width: 49%;" class="text-left">
                        <div class="item-image">
                            <img alt="undefined"
                                 v-bind:src="product.options.hinhanhsp">
                        </div>
                        <div class="item-info"><p class="item-name">{{product.name}}</p>
                            <p class="variant-title-popup"></p>
                            <p class="item-remove"><a @click="deleteProduct(product)" class="remove-item-cart"
                                                      title="Xóa"
                                                      data-id="1034709138"><i class="fa fa-close"></i> Xóa</a></p>

                        </div>
                    </div>
                    <div style="width: 16%;" class="text-center">
                        <div class="item-price"><span
                                    class="price">{{ addComma(product.price) }} ₫</span></div>
                    </div>
                    <div style="width: 14%;" class="text-center">
                        <div class="relative fixqtyflex"><input class="variantID" type="hidden" name="variantId"
                                                                value="1034709138">
                            <button class="items-count " type="button" @click="minusQty(product)">–
                            </button>
                            <input type="text" maxlength="3" min="0"
                                   class="input-text number-sidebar"
                                   readonly
                                   name="Lines" size="4" v-model="product.qty">
                            <button class="items-count " type="button" @click="plusQty(product)">+
                            </button>
                        </div>
                    </div>
                    <div style="width: 19%;" class="text-center"><span class="cart-price"><span class="price">
                                {{ addComma(product.price * product.qty) }} ₫</span></span>
                    </div>
                </div>


            </div>
           <!--  TỔNG TIỀN VÀ TIẾP TỤC MUA HÀNG -->
            <div class="tfoot-popup">
                <div class="tfoot-popup-1 clearfix">
                    <div class="pull-left popup-ship">
                        <p>Giao hàng trên toàn quốc</p>
                    </div>
                    <div class="pull-right popup-total">
                        <p>Thành tiền: <span class="total-price">{{total_money}} ₫</span></p>
                    </div>
                </div>
                <div class="tfoot-popup-2 clearfix">
                    <a class="button btn-proceed-checkout button-hover-3" title="Tiến hành đặt hàng"
                       href="https://fugear.vn/view-cart"><span>Tiến hành đặt hàng <i class="fa fa-long-arrow-right"
                                                                                 aria-hidden="true"></i></span></a>
                    <a class="button btn-continue" title="Tiếp tục mua hàng" onclick="$('#success_tic').fadeOut();">
                        <span><i class="fa fa-caret-left" aria-hidden="true"></i> Tiếp tục mua hàng</span>
                    </a>
                </div>
            </div>
            <!--  TỔNG TIỀN VÀ TIẾP TỤC MUA HÀNG -->
        </div>
        <!--  LƯU GIÁ TRỊ VÀ TIẾN HÀNH THANH TOÁN -->
        <div class="content-popup-cart mobile">
            <div class="modal-body">
                <div class="media" v-for="product in cart_content" :key="product.rowId">
                    <div class="media-left">
                        <div class="thumb-1x1">
                            <img alt="undefined"
                                 v-bind:src="product.options.hinhanhsp" width="70px">
                        </div>
                        <div class="media-body">
                            <div class="product-title">{{product.name}}</div>
                            <div class="product-new-price"><span>{{ addComma(product.price) }} ₫</span><span
                                        class="qty">Số lượng: {{ addComma(product.qty) }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <a onclick="$('#success_tic').fadeOut();" class="btn btn-block btn-outline-red" data-dismiss="modal">Tiếp
                tục mua hàng</a>
            <a href="https://fugear.vn/view-cart" class="btn btn-block btn-red">Tiến hành thanh toán »</a>
        </div>
         <!-- END  LƯU GIÁ TRỊ VÀ TIẾN HÀNH THANH TOÁN -->
    </div>
</div>
<?php endforeach;?>
 <!-- END TAB ĐỂ THÀNH TOÁN -->
        </div>
         
    </div>
    <!-- END TỔNG INFO SẢN PHẨM -->

    <!--   NỘI DUNG CHI TIẾT SẢN PHẨM -->
    <div class="product-overview-tab">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-hg-12">
                <div class="fw">
                    <link href="//theme.hstatic.net/1000340279/1000431896/14/product_tabs.scss.css?v=7" rel="stylesheet" type="text/css" media="all">
                    <div class="product_tabs panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading-1">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> <span><strong>Thông tin sản phẩm</strong></span>
                                    </a>
                                </h4>
                            </div>
                   <!--  NỘI DUNG SẢN PHẨM -->
                            <div id="collapse-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-1" aria-expanded="true">
                                <div class="panel-body rte">
                                    <p></p><p><span style="font-size:26px"><span style="font-family:Times New Roman,Times,serif">2 mô tơ điện vận hành êm ái</span></span></p>

<p><span style="font-size:26px"><span style="font-family:Times New Roman,Times,serif">Pad chuột siêu lớn 110/220V </span></span></p>

<p><span style="font-size:26px"><span style="font-family:Times New Roman,Times,serif">Power Adapter</span></span></p>

<p><span style="font-size:26px"><span style="font-family:Times New Roman,Times,serif">Vật liệu : Steel + ABS + PB </span></span></p>

<p><span style="font-size:26px"><span style="font-family:Times New Roman,Times,serif">Kích thước : 140x65x72~122cm </span></span></p>

<p><span style="font-size:26px"><span style="font-family:Times New Roman,Times,serif">Cân nặng : 40.5 KG</span></span></p><p></p>
                                </div>
                            </div>
                    <!-- END NỘI DUNG SẢN PHẨM -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- END NỘI DUNG CHI TIẾT SẢN PHẨM -->
</section>
    <!-- END SẢN PHẨM -->
                
                </div>
            </div>
        </div>
    </section>
    <!-- END CHI TIẾT SẢN PHẨM  -->

   
    </div>   <!-- END PAGE BODY  -->

    <!-- ĐỐI TÁC -->
     <section class="lib-section-10">
    <section class="fw section_brands">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="module-header">
                        <h2 class="title-head module-title module-index-title">
                            <a href="javascript:;">
                                <span>Đối tác</span>
                            </a>
                        </h2>
                    </div>
                    <div class="module-content">
                        <div class="owl-brand owl-theme owl-carousel nav-enable nav-left-right" data-lg-items="7"
                             data-md-items="5" data-sm-items="4" data-xs-items="3" data-xxs-items="4"
                             data-margin="50" data-autoplay="true">
                                                            <div class="item">
                                    <img src="<?php echo base_url(); ?>images/doitac1.jpg"
                                         class="img-responsive">
                                </div>
                                                            <div class="item">
                                    <img src="<?php echo base_url(); ?>images/doitac2.jpg"
                                         class="img-responsive">
                                </div>
                                                            <div class="item">
                                    <img src="<?php echo base_url(); ?>images/doitac3.png"
                                         class="img-responsive">
                                </div>
                                                            <div class="item">
                                    <img src="<?php echo base_url(); ?>images/doitac8.png"
                                         class="img-responsive">
                                </div>
                                                            <div class="item">
                                    <img src="<?php echo base_url(); ?>images/doitac9.jpg"
                                         class="img-responsive">
                                </div>
                                                            <div class="item">
                                    <img src="<?php echo base_url(); ?>images/doitac4.png"
                                         class="img-responsive">
                                </div>
                                                            <div class="item">
                                    <img src="<?php echo base_url(); ?>images/doitac5.jpg"
                                         class="img-responsive">
                                </div>
                                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
    <!-- END ĐỐI TÁC -->
    
   <!--  FOOTER -->
    <footer class="footer">

    <div class="container"><!--  FOOTER TRÁI -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 footer-info">
                <div class="footer-widget">
                    <h4 class="footer-title">
                        <span>phuongphan.vn</span>
                    </h4>
                    <div class="footer-details">
                        <div class="footer-detail rte">
                            Phương Phan cung cấp tất cả các sản phẩm công nghệ tin học 
Pc Gaming - Phụ Kiện Trang Trí - Laptop - Bàn Ghế.
                        </div>
                        <div class="footer-detail rte">
                            <label class="contact-info-title">
                                Địa chỉ :
                            </label>
                            <div class="contact-info">
                                35/14 đường số 10, phường Linh Trung, Quận Thủ Đức, Thành phố Hồ Chí Minh, Việt Nam
                            </div>
                        </div>
                        <div class="footer-detail">
                            <label class="contact-info-title">
                                Điện thoại :
                            </label>
                            <div class="contact-info">
                                <a href="tel: 0799854546"> 0799854546</a>
                            </div>
                        </div>
                        <div class="footer-detail">
                            <label class="contact-info-title">
                                Email :
                            </label>
                            <div class="contact-info">
                                <a target="_blank" href=""> <span data-cfemail="contact.gaming@gmail.com">contact.gaming@gmail.com</span></a>
                            </div>
                        </div>
                        <div class="footer-detail">
                            <a href="/">
                                <img src="<?php echo base_url(); ?>images/brand.png" >
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- END FOOTER TRÁI -->
            <!--  FOOTER MAIN -->
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                <div class="row">
                    <div class="top-footer">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 foo-col">
                            <div class="footer-widget">
                                <h4 class="footer-title">
                                    <span>Hỗ trợ</span>
                                </h4>
                                <ul class="list-menu">
                                    <li><a href="/" title="Giới thiệu">Giới
                                            thiệu</a></li>
                                    <li><a href="/"
                                           title="Chính sách đổi trả">Chính sách
                                            đổi trả</a></li>
                                    <li><a href="/"
                                           title="Chính sách bảo mật">Chính sách
                                            bảo mật</a></li>
                                    <li><a href="/"
                                           title="Điều khoản dịch vụ">Điều khoản
                                            dịch vụ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 foo-col">
                            <div class="footer-widget">
                                <h4 class="footer-title">
                                    <span>Hướng dẫn</span>
                                </h4>
                                <ul class="list-menu">
                                    <li><a href="/" title="Tìm kiếm">Tìm kiếm</a></li>
                                    <li><a href="/" title="Giới thiệu">Giới thiệu</a></li>
                                    <li><a href="/" title="Chính sách đổi trả">Chính sách
                                            đổi trả</a></li>
                                    <li><a href="/" title="Chính sách bảo mật">Chính sách
                                            bảo mật</a></li>
                                    <li><a href="/" title="Điều khoản dịch vụ">Điều khoản
                                            dịch vụ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 foo-col">
                            <div class="footer-widget">
                                <h4 class="footer-title">
                                    <span>Chính sách</span>
                                </h4>
                                <ul class="list-menu">
                                    <li><a href="/" title="Tìm kiếm">Tìm kiếm</a></li>
                                    <li><a href="/" title="Giới thiệu">Giới thiệu</a></li>
                                    <li><a href="/" title="Chính sách đổi trả">Chính sách
                                            đổi trả</a></li>
                                    <li><a href="/" title="Chính sách bảo mật">Chính sách
                                            bảo mật</a></li>
                                    <li><a href="/" title="Điều khoản dịch vụ">Điều khoản
                                            dịch vụ</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="site-footer">
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 payment_methods">
                            <div class="footer-widget">
                                <h4 class="footer-title">
                                    <span>Chấp nhận thanh toán</span>
                                </h4>
                                <div class="fw">
                                    <div class="item">
                                        <img class="img-responsive" src=""
                                             data-lazyload="<?php echo base_url(); ?>images/momo.png"
                                             alt="method-title-visa"
                                             title="Thanh toán qua VISA"/>
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src=""
                                             data-lazyload="<?php echo base_url(); ?>images/visa.png"
                                             alt="method-title-master-card" title="Thanh toán qua MASTER CARD"/>
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src=""
                                             data-lazyload="<?php echo base_url(); ?>images/paypay.png"
                                             alt="method-title-paypal" title="Thanh toán qua PAYPAL"/>
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src=""
                                             data-lazyload="<?php echo base_url(); ?>images/jcp.png"
                                             alt="method-title-jcb"
                                             title="Thanh toán qua JCB"/>
                                    </div>
                                    <div class="item">
                                        <img class="img-responsive" src=""
                                             data-lazyload="<?php echo base_url(); ?>images/bitcoin.png"
                                             alt="method-title-bitcoin" title="Thanh toán qua BITCOIN"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 customer-care">
                            <div class="footer-widget">
                                <h4 class="footer-title">
                                    <span>Chăm sóc khách hàng</span>
                                </h4>
                                <div class="customer-care-info">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                         x="0px" y="0px" viewBox="0 0 32.667 32.667"
                                         style="enable-background:new 0 0 32.667 32.667;" xml:space="preserve">
                                                    <g>
                                                        <path d="M16.333,0C7.327,0,0,7.327,0,16.334c0,9.006,7.326,16.333,16.333,16.333c0.557,0,1.007-0.451,1.007-1.006   c0-0.556-0.45-1.007-1.007-1.007c-7.896,0-14.318-6.424-14.318-14.319c0-7.896,6.422-14.32,14.318-14.32   c7.896,0,14.317,6.424,14.317,14.32c0,3.299-1.756,6.571-4.269,7.955c-0.913,0.502-1.903,0.751-2.959,0.761   c0.634-0.378,1.183-0.887,1.591-1.531c0.08-0.121,0.186-0.226,0.238-0.359c0.328-0.789,0.357-1.684,0.555-2.516   c0.243-1.066-4.658-3.143-5.084-1.815c-0.154,0.493-0.39,2.048-0.699,2.458c-0.275,0.365-0.953,0.193-1.377-0.168   c-1.117-0.952-2.364-2.352-3.458-3.457l0.002-0.001c-0.028-0.029-0.062-0.062-0.092-0.091c-0.031-0.03-0.062-0.062-0.093-0.092l0,0   c-1.106-1.093-2.506-2.338-3.457-3.458c-0.36-0.424-0.534-1.1-0.168-1.376c0.41-0.31,1.966-0.543,2.458-0.698   c1.326-0.425-0.75-5.329-1.816-5.084c-0.832,0.195-1.727,0.225-2.516,0.552c-0.134,0.056-0.238,0.16-0.359,0.24   c-2.799,1.775-3.16,6.083-0.428,9.292c1.041,1.228,2.127,2.416,3.245,3.576l-0.006,0.004c0.031,0.031,0.063,0.06,0.095,0.09   c0.03,0.031,0.059,0.062,0.088,0.095l0.006-0.006c1.16,1.118,2.535,2.764,4.769,4.255c4.703,3.141,8.312,2.264,10.438,1.098   c3.67-2.021,5.312-6.338,5.312-9.719C32.667,7.327,25.339,0,16.333,0z"
                                                              fill="#FFFFFF"/>
                                                    </g>
                                                </svg>
                                    <div class="customer-care-detail">
                                        <a href="tel: 0799854546"> 0799854546</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="back-to-top"><i class="fa fa-arrow-circle-up"></i></div>
</footer>

<!-- END  FOOTER  -->



    

<script data-cfasync="false" src="<?php echo base_url(); ?>js1/email-decode.min.js"></script>
<script src='<?php echo base_url(); ?>js1/option-selectors.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>js1/plugin.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>js1/jquery.mmenu.all.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>js1/cs.script.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>js1/main.js' type='text/javascript'></script>
<script src='<?php echo base_url(); ?>js1/HTT-team.js' type='text/javascript'></script>


 

<script type="text/javascript">
$(document).ready(function(){
    $('a.tab').click(function(){
    var an_di=$('a.selected').attr('rel');//lấy title của thẻ <a class='active'>
    $('div#'+an_di).hide();//ẩn thẻ <div id='an_di'>
    $('a.selected').removeClass('selected');
    $(this).addClass('selected');
    var hien_thi=$(this).attr('rel');//lấy title của thẻ <a> khi ta kick vào nó
    $('div#'+hien_thi).show();//hiện lên thẻ <div id='hien_thi'>
    });
});
</script> 



<script>
  window.onscroll = function() {myFunction()};

  var navbar = document.getElementById("navbar");
  var sticky = navbar.offsetTop;

  function myFunction() {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky")
    } else {
      navbar.classList.remove("sticky");
    }
  }
</script>
<script>
      $(document).ready(function () {
        $('.changeimg').on('click', function () {
          $('#img_01').prop('src', this.src);
        });
      });
      
    </script>


</body>
</html>