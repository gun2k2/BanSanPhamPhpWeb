<!DOCTYPE html>
<html lang="en">    
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Quản Lý ADMIN</title>
        <link  type="text/css" href="<?php echo base_url(); ?>css/styles.css" rel="stylesheet" />

        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
       <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href=""><img src="<?php echo base_url(); ?>images/ironman.png" height="40" style="max-width: 40px" ><?= $this->session->userdata('loginadmin'); ?> </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>images/home.png" height="40" style="max-width: 40px" ></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#"><img src="<?php echo base_url(); ?>images/setting.jpg" height="40" style="max-width: 40px" >Setting</a>
                        <a class="dropdown-item" href="#"><img src="<?php echo base_url(); ?>images/activyty.png" height="40" style="max-width: 40px" >Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a title="Đăng Xuất" class="dropdown-item" href="<?php echo base_url(); ?>admin/index/logout">
                             <img src="<?php echo base_url(); ?>images/home.jpg" height="40" style="max-width: 40px" >Đăng Xuất
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
          <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/index">
                                <img src="<?php echo base_url(); ?>images/dash.jpg" height="40" style="max-width: 40px" >
                                Dashboard
                            </a>
                                 <a class="nav-link" href="<?php echo base_url(); ?>admin/thongke_controller">
                                <img src="<?php echo base_url(); ?>images/thongke.jpg" height="40" style="max-width: 40px" >
                                Thống kê
                            </a>
                            <div class="sb-sidenav-menu-heading">Quản lý</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                               <img src="<?php echo base_url(); ?>images/sanpham.jpg" height="40" style="max-width: 40px" >
                                Sản phẩm
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/quanlysanpham_controller">Sản phẩm</a>
                                    <a class="nav-link" href="<?php echo base_url(); ?>admin/quanlydanhmuc_controller">Nhóm sản phẩm</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                               <img src="<?php echo base_url(); ?>images/nguoidung.png" height="40" style="max-width: 40px" >
                                Người dùng
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Admin
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?php echo base_url(); ?>admin/quanlyadmin_controller">Danh sách</a>
                                            <a class="nav-link" href="<?php echo base_url(); ?>admin/quanlyadmin_controller/add">Thêm</a>
                                          
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Khách hàng
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?php echo base_url(); ?>admin/quanlykhachhang_controller">Danh sách</a>
                                            <a class="nav-link" href="<?php echo base_url(); ?>admin/quanlykhachhang_controller/add">Thêm</a>
                                            
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="<?php echo base_url(); ?>Error_controller/E401">401 Page</a>
                                            <a class="nav-link" href="<?php echo base_url(); ?>Error_controller/E404">404 Page</a>
                                            <a class="nav-link" href="<?php echo base_url(); ?>Error_controller/E500">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/bieudo_controller">
                               <img src="<?php echo base_url(); ?>images/bieudo.jpg" height="40" style="max-width: 40px" >
                               
                                Charts
                            </a>
                            <a class="nav-link" href="<?php echo base_url(); ?>admin/Contact_controller">
                               <img src="<?php echo base_url(); ?>images/contact.png" height="40" style="max-width: 40px" >
                               
                                Contact
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Phương Phan
                    </div>
                </nav>
            </div>
            <div style="color: red; font-weight: bold; text-align: center;">  <?=$this->session->flashdata('message'); ?> </div>
           <!--  <?php $this->load->view('admin/message_view', $this->data);?> -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/index">Trang chủ</a></li>
                            <li class="breadcrumb-item active">Thêm mới</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Đây là danh sách quản lý quản trị viên, nếu có thắc mắc gì,vui lòng truy cập
                                <a target="_blank" href="https://www.facebook.com/phuongnenenha">Facebook của Admin</a>
                                .
                            </div>
                        </div>
                       <div class="wrapper">
      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Thêm mới dữ liệu 
                            </div>
                <form enctype="multipart/form-data" method="post" id="form" class="form">
                     <fieldset>
                <div class="widget">
                    
                 <div class="tab_container">
                         
                     <div class="form-group row">
                    <label for="param_username" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                    <div class="col-sm-5">
                      <input type="text" autocheck="true" name="name" value="" class="form-control" id="tenNhanVien"  placeholder="Name..." required="">
                    </div>
                  </div> 

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Hình ảnh:<span class="req">*</span></label>
                        <div class="col-sm-5">
                            <input type="file" name="image" id="image" size="25" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Ảnh kèm theo:</label>
                        <div class="col-sm-5">
                            <input type="file" multiple="" name="image_list[]" id="image_list" size="25"  >
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="form-group row">
                        <label for="param_price" class="col-sm-2 col-form-label">
                            Giá :
                            <span class="req">*</span>
                        </label>
                        <div class="col-sm-5">
                            <span class="oneTwo">
                                <input type="text" _autocheck="true" class="format_number" id="param_price" style="width:100px" name="price" required="">
                                <img src="" style="margin-bottom:-8px" class="tipS" original-title="Giá bán sử dụng để giao dịch">
                            </span>
                            <span class="autocheck" name="price_autocheck"></span>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="form-group row">
                        <label for="param_discount" class="col-sm-2 col-form-label">
                            Giảm giá (VND) 
                            <span></span>:
                        </label>
                        <div class="col-sm-5">
                            <span>
                                <input type="text" class="format_number" id="param_discount" style="width:100px" name="discount" >
                                <img src="" style="margin-bottom:-8px" class="tipS" original-title="Số tiền giảm giảm giá">
                            </span>
                            <span class="autocheck" name="discount_autocheck"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="param_price" class="col-sm-2 col-form-label">
                            Hãng sản xuất :
                            <span class="req">*</span>
                        </label>
                        <div class="col-sm-5">
                            <span class="oneTwo">
                                <input type="text" _autocheck="true" class="format_number" id="param_price" style="width:100px" name="hangsx" required="">
                                <img src="" style="margin-bottom:-8px" class="tipS" original-title="hãng sản phẩm">
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="param_price" class="col-sm-2 col-form-label">
                            Bảo hành :
                            <span class="req">*</span>
                        </label>
                        <div class="col-sm-5">
                            <span class="oneTwo">
                                <input type="text" _autocheck="true" class="format_number" id="param_price" style="width:100px" name="baohanh" required="">
                                <img src="" style="margin-bottom:-8px" class="tipS" original-title="thời gian bảo hành sản phẩm">
                            </span>
                        </div>
                    </div>



                     <div class="form-group row">
                    <label for="param_gioitinh" class="col-sm-2 col-form-label" >Lực chọn danh mục</label>
                    <select autocheck="true" id="param_id" name="catalog_id">
                        <?php foreach($list as $value): ?>
                    <option value="<?php echo $value['id']?>"><?php echo $value['name'];?></option>
                        <?php endforeach;?>
                    </select>
                  </div>

                    <div class="form-group row">
                    <label for="param_gioitinh" class="col-sm-2 col-form-label" >Trạng thái</label>
                    <select autocheck="true" id="param_id" name="trangthai">
                    <option value="1">Còn hàng</option>
                        
                    <option value="0">Hết hàng</option>
                     
                    </select>
                  </div>


                    <div class="form-group row">
                        <label for="param_sale" class="col-sm-2 col-form-label">Nội dung:</label>
                        <div class="col-sm-5">
                            <span class="oneTwo"><textarea cols="" rows="4" id="param_gifts" name="noidung"></textarea></span>
                            <span class="autocheck" name="sale_autocheck"></span>
                        </div>
                    </div>                           
                 </div>
                                                     
                     </div><!-- End tab_container-->
                                        
                                        <div class="formSubmit">
                                            <input type="submit" class="redB" value="Thêm mới">
                                           <a title="Trở về" class="tipS"  href="<?php echo base_url(); ?>admin/quanlysanpham_controller">
    <img src="<?php echo base_url(); ?>images/trove.jpg" height="50" style="max-width: 50px">
   </a>
                                        </div>
                                        <div class="clear"></div>
                                    
                                </fieldset>
                            </form>
                    </div>
                     
                    </div>
                </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>assets/demo/datatables-demo.js"></script>
    
    </body>
</html>
