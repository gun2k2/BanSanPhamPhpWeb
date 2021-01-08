<!DOCTYPE html>
<html lang="en">    
    <head> 
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Quản Lý ADMIN</title>
        <link href="<?php echo base_url(); ?>css/styles.css" rel="stylesheet" />
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
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Thêm mới dữ liệu 
                            </div>
                     <form  method="post"  enctype="multidata/form-data">

                  <div class="form-group row">
                    <label for="param_username" class="col-sm-2 col-form-label">Tên</label>
                    <div class="col-sm-5">
                      <input type="text" autocheck="true" name="name" value="<?php echo set_value('name')?>" class="form-control" id="tenNhanVien"  placeholder="Name..." required="">
                    </div>
                  </div> 

                  <div class="form-group row">
                    <label for="param_username" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-5">
                      <input type="email" autocheck="true" name="email" value="<?php echo set_value('email')?>" class="form-control" id="userName"  placeholder="Email...">
                      <div class="error" name="name_error"><?php echo form_error('email')?></div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="param_sdt" class="col-sm-2 col-form-label">Number Phone</label>
                    <div class="col-sm-5">
                      <input type="tell" autocheck="true" name="sdt" value="<?php echo set_value('sdt')?>" class="form-control" id="param_sdt"  placeholder="Phone..." required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="param_sdt" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-5">
                      <input type="text" autocheck="true" name="username" value="<?php echo set_value('username')?>" class="form-control" id="param_username"  placeholder="Username..." required="">
                       <div class="error" name="name_error"><?php echo form_error('username')  ?></div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="param_username" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-5">
                      <input type="password" autocheck="true" name="password" class="form-control" id="PassWord" placeholder="Password">
                      <div class="error" name="name_error"><?php echo form_error('password')  ?></div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="param_username" class="col-sm-2 col-form-label">rePassword</label>
                    <div class="col-sm-5">
                      <input type="password" autocheck="true" name="re_password" class="form-control" id="rePassWord" placeholder="rePassword">
                      <div class="error" name="name_error"><?php echo form_error('re_password')?></div>
                    </div>
                    <div class="clear"></div>
                  </div>

                   <div class="form-group row">
                    <label for="param_ngaysinh" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-5">
                      <input type="text" autocheck="true" name="diachi" value="<?php echo set_value('diachi')?>" class="form-control" id="param_diachi"  placeholder="Địa chỉ..." required="">                    
                    </div>
                  </div>
                  
                        <div class="form-group row">
                        <label for="" >Tỉnh/ThànhPhố</label>
                        <select name="province" id="province" required="">
                            <option value="">--Chọn Tỉnh--</option>
                            <?php 
                            foreach ($mangtinh as $value) {
                        echo '<option value="'.$value["province_id"].'">'.$value['name']. '</option>';
                            } ?>
                        </select>
                        <label for="">Quận/Huyện</label>
                        <select name="district" id="district" required="">
                            <option value="">--Chọn Quận/Huyện--</option>
                        </select>
                        <label for="">Xã/Phường</label>
                        <select name="ward" id="ward" >
                            <option value="">--Xã/Phường--</option>  
                        </select>
                    </div>
              <div class="form-group row">
                        <label for="param_sale" class="col-sm-2 col-form-label">Nội dung:</label>
                        <div class="col-sm-5">
                            <span class="oneTwo"><textarea cols="" rows="4" id="param_gifts" name="noidung"></textarea></span>
                            <span class="autocheck" name="sale_autocheck"></span>
                        </div>
              </div>  
                    
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn_red danger">Thêm mới</button>

                     <a title="Trở về" class="tipS"  href="<?php echo base_url(); ?>admin/quanlykhachhang_controller">
    <img src="<?php echo base_url(); ?>images/trove.jpg" height="50" style="max-width: 50px">
   </a>
                    </div>
                  </div>
                </form>
                <!-- end form -->
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
        <script>
            
        $(document).ready(function(){

            $('#province').change(function(event){
            var province_id = $('#province') .val();
            if (province_id != '') 
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>admin/quanlykhachhang_controller/district",
                    method: "POST",
                    data: {province_id:province_id},
                    success:function(data)
                    {
                        $('#district').html(data);
                         $('#ward').html('<option value="">--Xã/Phường--</option>');
                    }
                })
            }
             else
            {
                $('#district').html('<option value="">--Chọn Quận/Huyện--</option>');
                $('#ward').html('<option value="">--Xã/Phường--</option>');
            }
                 });

            $('#district').change(function(event){
            var district_id = $('#district').val();
            if(district_id != '')
            {
                 $.ajax({

                    url:"<?php echo base_url(); ?>admin/quanlykhachhang_controller/ward",
                    method:"POST",
                    data:{district_id:district_id},
                    success:function(data)
                    {
                     $('#ward').html(data);
                    }

                   });
            }
            else
            {
                $('#ward').html('<option value="">--Xã/Phường--</option>');
            }
            });
        });

        </script> 
    </body>
</html>
