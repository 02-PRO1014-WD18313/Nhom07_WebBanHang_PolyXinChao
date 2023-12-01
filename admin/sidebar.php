 <!-- Main Sidebar Container -->
 <h1>llll</h1>
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="../index.php?act=index.php" class="brand-link">
         <img src="./images/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">POLYXINCHAO</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="./images/hoang.jpg" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">Xuân Hoàng (ADMIN)</a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                 <!-- 
                Tổng quan - begin
                 -->
                 <li class="nav-item">
                     <a href="http://localhost/Nhom07_WebBanHang_PolyXinChao/admin/index.php" class="nav-link">
                         <i class="nav-icon fa fa-tachometer-alt"></i>
                         <p>
                             Tổng quan
                         </p>
                     </a>
                 </li>

                 <!-- 
                    Tổng quan - end
                 -->

                 <!-- 
                    subject - begin 
                -->
                <hr>
                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fa fa-file"></i>
                         <p>
                             Quản lý danh mục
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="index.php?act=listdm" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh sách</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="index.php?act=adddm" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Thêm mới</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="index.php?act=suadm" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Sửa</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <!-- 
                    subject -end 
                -->

                <!-- 
                    subject - begin 
                -->
                <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                     <i class="nav-icon fa fa-file"></i>
                        <p>
                             Quản lý sản phẩm
                             <i class="fas fa-angle-left right"></i>
                        </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="index.php?act=listsp" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh sách sản phẩm</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="index.php?act=addsp" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Thêm mới sản phẩm</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="index.php?act=listsp" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Sửa sản phẩm</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <!-- 
                    subject -end 
                -->

                 <!-- 
                    subject - begin 
                -->
                <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-flask"></i>
                            <p>
                                Ql Thuộc tính biến thể
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                    <ul class="nav nav-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-file"></i>
                                <p>
                                    Quản lý size
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?act=listsz" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?act=addsz" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Thêm mới</p>
                                </a>
                            </li>
                        </ul>
                    </ul>

                    <ul class="nav nav-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-file"></i>
                                <p>
                                    Quản lý topping
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.php?act=listtp" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?act=addtp" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Thêm mới</p>
                                </a>
                            </li>
                            
                        </ul>
                    </ul>
                     
                </li>
                <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fa fa-truck"></i>
                         <p>
                             Quản lý đơn hàng
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="index.php?act=listbill" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh sách xác nhận</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="index.php?act=listbill" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Sửa</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                         
                 

                <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fa fa-user"></i>
                         <p>
                             Quản lý người dùng
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="index.php?act=listtk" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh sách</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="?module=subject&action=add" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Thêm mới</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="?module=subject&action=add" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>sửa</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fa fa-comment"></i>
                         <p>
                             Phản hồi khách hàng
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="?module=subject&action=lists" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh sách</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="?module=subject&action=add" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Thêm mới</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="?module=subject&action=add" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>sửa</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fa fa-plus"></i>
                         <p>
                             Quản lý thống kê
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="index.php?act=thongke" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Danh sách</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="index.php?act=bieudo" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Biểu đồ</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item has-treeview">
                     <a href="index.php?act=bieudo" class="nav-link">
                         
                         <p>
                                Biểu đồ
                             
                         </p>
                     </a>
                 </li>

                 <li class="nav-item has-treeview">
                     <a href="index.php?act=binhluan" class="nav-link">
                         <i class="nav-icon fa fa-plus"></i>
                         <p>
                               Quản lý bình luận
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                 </li>

                 <!-- 
                    subject -end 
                -->
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>

 <div class="content-wrapper">