<?php 
    session_start();
    $name = $_SESSION['name'];
    if(isset($_SESSION['role'])){
        if($_SESSION['role'] != 'admin'){
            header('location: ../login.php');
        }
    }else{
        header('location: ../login.php');
    }
?>
<!--  wrapper -->
<div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/logo.png" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"><?php echo $name; ?></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="logoutadmin.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">                  
                        <div class="input-group custom-search-form" >
                            <input type="text" class="form-control" style="background-color: #04B173;"  placeholder="Search...">
                            <span class="input-group-btn" >
                                <button class="btn btn-default" type="button" style="background-color: #04B173;">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!--end search section-->
                    <li class="">
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i>Trang ch???</a>
                    </li>
                    <li>
                        <a href="contactus.php"><i class="fa fa-edit fa-fw"></i>H???p th??</a>
                    </li>
                    <li>
                        <a href="quanlidonhang.php"><i class="fa fa-table fa-fw"></i>????n h??ng</a>
                    </li>
                    <li>
                        <a href="quanlidanhmuc.php"><i class="fa fa-files-o fa-fw"></i>Danh m???c h??ng h??a</a>
                    </li>
                    <li>
                        <a href="quanlidanhmuctintuc.php"><i class="fa fa-sitemap fa-fw"></i>Danh m???c tin t???c</a>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-wrench fa-fw"></i>Qu???n l??<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="selected">
                                <a href="taikhoan.php" style="background-color: #04B173;">Qu???n l?? ng?????i d??ng</a>
                            </li>
                            <li>
                                <a href="quanlisanpham.php">Qu???n l?? s???n ph???m</a>
                            </li>
                            <li>
                                <a href="quanlitintuc.php">Qu???n l?? tin t???c</a>
                            </li>
                            <li>
                                <a href="quanlibinhluan.php">Qu???n l?? b??nh lu???n</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
            <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        </nav>