<?php
session_start();
include '../../util/util.php';
$util = new UtilClass();
if ( ! $util->haveAcces( 'permit', $_SESSION["userid"] ) ) {
    exit;
}

if ( $_SESSION['hashuser'] != $util->hashuser( $_SESSION["userid"] . $_SESSION["username"] . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'] ) ) {
    header( "Location: logout.php" );
    exit();
}

include '../permit/lib/permit-config.php';
include '../permit/lib/permitUtil.php';
$putil  = new permitUtil();
$roleid = $putil->getUserRoleID( $_SESSION['userid'] );
$roleid = $roleid[0];
include '../permit/lib/showrequest.php';
$show_req_obj = new show_request();
$permit_ids = $show_req_obj->get_all_permit_id();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>فرم پیشرفته | کنترل پنل</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../css/assets/dist/css/bootstrap-theme.css">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="../../css/assets/dist/css/rtl.css">
    <!-- babakhani datepicker -->
    <link rel="stylesheet" href="../../css/assets/dist/css/persian-datepicker-0.4.5.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../css/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../css/assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../../css/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../../css/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../../css/assets/plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../../css/assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../../css/assets/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../css/assets/bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../css/assets/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../css/assets/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="../../index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">بایگانی</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>سیستم جامع بهره برداری قطار شهری شیراز و حومه</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>





            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">۴ پیام خوانده نشده</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-right">
                                                <img src="../../css/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                 مهدی
                                                <small><i class="fa fa-clock-o"></i> ۵ دقیقه پیش</small>
                                            </h4>
                                            <p>متن پیام</p>
                                        </a>
                                    </li>
                                    <!-- end message -->

                                </ul>
                            </li>
                            <li class="footer"><a href="#">نمایش تمام پیام ها</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">۱۰</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">۱۰ اعلان جدید</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> ۵ کاربر جدید ثبت نام کردند
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-yellow"></i> اخطار دقت کنید
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-red"></i> ۴ کاربر جدید ثبت نام کردند
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart text-green"></i> ۲۵ سفارش جدید
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-red"></i> نام کاربریتان را تغییر دادید
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">نمایش همه</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">۹</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">۹ کار برای انجام دارید</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                ساخت تونل
                                                <small class="pull-left">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% تکمیل شده</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                توسعه آپ مترو
                                                <small class="pull-left">40%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">40% تکمیل شده</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                تبلیغات
                                                <small class="pull-left">60%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">60% تکمیل شده</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                ساخت دپو
                                                <small class="pull-left">80%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                                                     aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">80% تکمیل شده</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">نمایش همه</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../../css/assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">مهدی زاده مینایی</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="../../css/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    مهدی زاده مینایی
                                    <small>SURO->ICT->EMP</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">صفحه من</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">به روز رسانی</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">همکاران</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">پروفایل</a>
                                </div>
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">خروج</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- right side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-right image">
                    <img src="../../css/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-right info">
                    <p>مهدی زاده مینایی</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="جستجو">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">منوها</li>
                <li class="active treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>بایگانی</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="../../index.html"><i class="fa fa-circle-o"></i> داشبرد اول</a></li>
                        <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> داشبرد دوم</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>مجوز های جدید</span>
                        <span class="pull-left-container">
              <span class="label label-primary pull-left">4</span>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../../pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> نوار بالا</a></li>
                        <li><a href="../../pages/layout/boxed.html"><i class="fa fa-circle-o"></i> باکس ها</a></li>
                        <li><a href="../../pages/layout/fixed.html"><i class="fa fa-circle-o"></i> فیکس شده</a></li>
                        <li><a href="../../pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> سایدبار</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../../pages/widgets.html">
                        <i class="fa fa-th"></i> <span>تايید شده ها</span>
                        <span class="pull-left-container">
              <small class="label pull-left bg-green">جدید</small>
            </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>نمودارها</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../../pages/charts/chartjs.html"><i class="fa fa-circle-o"></i>نمودار ChartJS</a></li>
                        <li><a href="../../pages/charts/morris.html"><i class="fa fa-circle-o"></i>نمودار Morris</a></li>
                        <li><a href="../../pages/charts/flot.html"><i class="fa fa-circle-o"></i>نمودار Flot</a></li>
                        <li><a href="../../pages/charts/inline.html"><i class="fa fa-circle-o"></i>نمودار Inline charts</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>گزارشات جامع</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../../pages/UI/general.html"><i class="fa fa-circle-o"></i> عمومی</a></li>
                        <li><a href="../../pages/UI/icons.html"><i class="fa fa-circle-o"></i> آیکون</a></li>
                        <li><a href="../../pages/UI/buttons.html"><i class="fa fa-circle-o"></i> دکمه</a></li>
                        <li><a href="../../pages/UI/sliders.html"><i class="fa fa-circle-o"></i> اسلایدر</a></li>
                        <li><a href="../../pages/UI/timeline.html"><i class="fa fa-circle-o"></i> تایم لاین</a></li>
                        <li><a href="../../pages/UI/modals.html"><i class="fa fa-circle-o"></i> مدال</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>فرم ها</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../../pages/forms/general.html"><i class="fa fa-circle-o"></i> اجزای عمومی</a></li>
                        <li><a href="../../pages/forms/advanced.html"><i class="fa fa-circle-o"></i> پیشرفته</a></li>
                        <li><a href="../../pages/forms/editors.html"><i class="fa fa-circle-o"></i> ویرایشگر</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-table"></i> <span>ارسال به ...</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../../pages/tables/simple.html"><i class="fa fa-circle-o"></i> جدول ساده</a></li>
                        <li><a href="../../pages/tables/data.html"><i class="fa fa-circle-o"></i> جدول داده</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../../pages/calendar.html">
                        <i class="fa fa-calendar"></i> <span>تقویم</span>
                        <span class="pull-left-container">
              <small class="label pull-left bg-red">۳</small>
              <small class="label pull-left bg-blue">۱۷</small>
            </span>
                    </a>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>خروج از سیستم</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> سطح اول</a></li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i> سطح اول
                                <span class="pull-left-container">
                  <i class="fa fa-angle-right pull-left"></i>
                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> سطح دوم</a></li>
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-circle-o"></i> سطح دوم
                                        <span class="pull-left-container">
                      <i class="fa fa-angle-right pull-left"></i>
                    </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-circle-o"></i> سطح سوم</a></li>
                                        <li><a href="#"><i class="fa fa-circle-o"></i> سطح سوم</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> سطح اول</a></li>
                    </ul>
                </li>
                <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>راهنمای کاربر</span></a></li>
                <li class="header">برچسب ها</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>مهم</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>هشدار</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>اطلاعات</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                جستجوی پیشرفته
                <small>جهت انجام جستجوی دقیق تر می توانید از روش زیر استفاده نمایید.</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> داشبورد</a></li>
                <li><a href="#">بایگانی</a></li>
                <li class="active">جستجوی پیشرفته</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
<div class="row">
    <div class="col-md-12">
            <!-- Archive-Filter -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">فیلتر های جستجو  </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.box-Archive-Filter -->
                <div class="messages"></div>
                <!-- <form id="filter-form" method="post" action="filter_ajax.php" role="form"> -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                            <div class="form-group">
                                <label>شماره مجوز</label>
                                <select class="form-control select2" style="width: 100%;" id="shomareh_mojavez">
                                  <?php echo($permit_ids); ?>

                                </select>
                            </div>
                                </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>انجام عملیات</label>
                                            <select class="form-control select2" style="width: 100%;" id="anjameh-amaliat">
                                                <option selected="selected">2215489</option>
                                                <option>102213</option>
                                                <option>52446</option>
                                                <option>12345</option>
                                                <option>88795</option>
                                                <option>8546</option>
                                                <option>1321</option>
                                            </select>
                                        </div>
                                    </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>مکان</label>
                                        <select class="form-control select2" style="width: 100%;" id="makan">

                                            <option selected="selected">2215489</option>
                                            <option>102213</option>
                                            <option>52446</option>
                                            <option>12345</option>
                                            <option>88795</option>
                                            <option>8546</option>
                                            <option>1321</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <a id="search_btn" class="btn hidden-xs" style="background-color:#d61577;border-color:#ad0b5d;font-weight:bold;color:#FFF">شروع جستجو</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>نام پیمانکار</label>
                                        <select class="form-control select2" style="width: 100%;" id="name_peymankar">
                                            <option selected="selected">محمد محتشم</option>
                                            <option>محمد محتشم</option>
                                            <option>هاشم افسری</option>
                                            <option>نیما یوشیج</option>
                                            <option>الکساندر گراهامبل</option>
                                            <option>دروازه بان ایران</option>
                                            <option>قرمزته</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>حوزه کاری:</label>
                                        <select class="form-control select2" style="width: 100%;" id="hoze_kari">
                                            <option selected="selected">انتخاب حوزه</option>
                                            <option>توقف گاه</option>
                                            <option>هاشم افسری</option>
                                            <option>نیما یوشیج</option>
                                            <option>الکساندر گراهامبل</option>
                                            <option>دروازه بان ایران</option>
                                            <option>قرمزته</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>نوع مجوز:</label>
                                        <select class="form-control select2" style="width: 100%;" id="noe_mojavez">
                                            <option selected="selected">انتخاب نوع مجوز</option>
                                            <option>بهره برداری</option>
                                            <option>هاشم افسری</option>
                                            <option>نیما یوشیج</option>
                                            <option>الکساندر گراهامبل</option>
                                            <option>دروازه بان ایران</option>
                                            <option>قرمزته</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <!-- /.form-group -->
                                <!--<div class="form-group">
                                    <label>غیرفعال</label>
                                    <select class="form-control select2" disabled="disabled" style="width: 100%;">
                                        <option selected="selected">تهران</option>
                                        <option>مشهد</option>
                                        <option>اصفهان</option>
                                        <option>شیراز</option>
                                        <option>اهواز</option>
                                        <option>تبریز</option>
                                        <option>کرج</option>
                                    </select>-->
                                </div>
                                <!-- /.form-group -->
                        <!-- /.col -->
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group">
                                <label>انتخاب تاریخ مجوز </label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="tarikh1" class="form-control pull-right">
                                </div>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="tarikh2" class="form-control pull-right">
                                </div>
                                <!-- /.input group -->
                                <br>
                            </div>
                                </div>
                                <div class="col-md-12">
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox" class="flat-red" id="act_gheyre_fani">
                                                    فعالیت در اماکن غیر فنی
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox" class="flat-red" id="osc_on_off">
                                                    نیاز به قطع برق(OCS) دارد</label>
                                            </div>

                                </div>
                                        <!-- /.box -->
                                </div>

                            <!--    <div class="form-group">
                                    <label>چند انتخابی</label>
                                    <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                            style="width: 100%;">
                                        <option>تهران</option>
                                        <option>مشهد</option>
                                        <option>اصفهان</option>
                                        <option>شیراز</option>
                                        <option>اهواز</option>
                                        <option>تبریز</option>
                                        <option>کرج</option>
                                    </select>
                            </div>-->
                            <!-- /.form-group -->
                            <!--<div class="form-group">
                                <label>گزینه های غیرفعال</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">تهران</option>
                                    <option>مشهد</option>
                                    <option disabled="disabled">اصفهان غیرفعال</option>
                                    <option>شیراز</option>
                                    <option>اهواز</option>
                                    <option>تبریز</option>
                                    <option>کرج</option>
                                </select>
                            </div>-->
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-3">
                            <!-- iCheck -->
                            <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">وضعیت مجوز</h3>
                                </div>
                                <div class="box-body">
                                    <!-- Minimal style -->





                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" class="flat-red" id="ocs_accepted">
                                            تایید شده توسط OCC
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" class="flat-red" id="nazer_accepted">
                                            تایید شده توسط ناظر
                                        </label>
                                    </div> <div class="form-group">
                                        <label>
                                            <input type="checkbox" class="flat-red" id="ocs_reject">
                                            رد شده توسط OCC
                                        </label>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    راهنمای انتخاب<a href="#"> گزینه ها  </a>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- </form> -->
                <!-- /.box-body -->
                <div class="box-footer" id="div-message">

                    برای کسب اطلاعات بیشتر و استفاده از راهنمای سیستم جامع صدور مجوز به بخش <a href="https://select2.github.io/">مستندات </a> مراجعه کنید
                </div>
            </div>
            <!-- /.box -->

        <div class="row">
            <div class="col-xs-12">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">نتایج جستجو</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>شماره مجوز</th>
                                <th> نام پیمانکار </th>
                                <th> انجام عملیات </th>
                                <th>حوزه کاری</th>
                                <th>نوع مجوز</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>۱۱۲۳۴۲۱</td>
                                <td>عزت الله انظامی</td>
                                <td>ریلی</td>
                                <td> توقف گاه</td>
                                <td>غیر بهره برداری</td>
                            </tr>
                            <tr>
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.0
                                </td>
                                <td>Win 95+</td>
                                <td>5</td>
                                <td>C</td>
                            </tr>
                            <tr>
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 5.5
                                </td>
                                <td>Win 95+</td>
                                <td>5.5</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Trident</td>
                                <td>Internet
                                    Explorer 6
                                </td>
                                <td>Win 98+</td>
                                <td>6</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Trident</td>
                                <td>Internet Explorer 7</td>
                                <td>Win XP SP2+</td>
                                <td>7</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Trident</td>
                                <td>AOL browser (AOL desktop)</td>
                                <td>Win XP</td>
                                <td>6</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Firefox 1.0</td>
                                <td>Win 98+ / OSX.2+</td>
                                <td>1.7</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Firefox 1.5</td>
                                <td>Win 98+ / OSX.2+</td>
                                <td>1.8</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Firefox 2.0</td>
                                <td>Win 98+ / OSX.2+</td>
                                <td>1.8</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Firefox 3.0</td>
                                <td>Win 2k+ / OSX.3+</td>
                                <td>1.9</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Camino 1.0</td>
                                <td>OSX.2+</td>
                                <td>1.8</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Camino 1.5</td>
                                <td>OSX.3+</td>
                                <td>1.8</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Netscape 7.2</td>
                                <td>Win 95+ / Mac OS 8.6-9.2</td>
                                <td>1.7</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Netscape Browser 8</td>
                                <td>Win 98SE+</td>
                                <td>1.7</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Netscape Navigator 9</td>
                                <td>Win 98+ / OSX.2+</td>
                                <td>1.8</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Mozilla 1.0</td>
                                <td>Win 95+ / OSX.1+</td>
                                <td>1</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Mozilla 1.1</td>
                                <td>Win 95+ / OSX.1+</td>
                                <td>1.1</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Mozilla 1.2</td>
                                <td>Win 95+ / OSX.1+</td>
                                <td>1.2</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Mozilla 1.3</td>
                                <td>Win 95+ / OSX.1+</td>
                                <td>1.3</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Mozilla 1.4</td>
                                <td>Win 95+ / OSX.1+</td>
                                <td>1.4</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Mozilla 1.5</td>
                                <td>Win 95+ / OSX.1+</td>
                                <td>1.5</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Mozilla 1.6</td>
                                <td>Win 95+ / OSX.1+</td>
                                <td>1.6</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Mozilla 1.7</td>
                                <td>Win 98+ / OSX.1+</td>
                                <td>1.7</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Mozilla 1.8</td>
                                <td>Win 98+ / OSX.1+</td>
                                <td>1.8</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Seamonkey 1.1</td>
                                <td>Win 98+ / OSX.2+</td>
                                <td>1.8</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Gecko</td>
                                <td>Epiphany 2.20</td>
                                <td>Gnome</td>
                                <td>1.8</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Webkit</td>
                                <td>Safari 1.2</td>
                                <td>OSX.3</td>
                                <td>125.5</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Webkit</td>
                                <td>Safari 1.3</td>
                                <td>OSX.3</td>
                                <td>312.8</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Webkit</td>
                                <td>Safari 2.0</td>
                                <td>OSX.4+</td>
                                <td>419.3</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Webkit</td>
                                <td>Safari 3.0</td>
                                <td>OSX.4+</td>
                                <td>522.1</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Webkit</td>
                                <td>OmniWeb 5.5</td>
                                <td>OSX.4+</td>
                                <td>420</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Webkit</td>
                                <td>iPod Touch / iPhone</td>
                                <td>iPod</td>
                                <td>420.1</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Webkit</td>
                                <td>S60</td>
                                <td>S60</td>
                                <td>413</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Presto</td>
                                <td>Opera 7.0</td>
                                <td>Win 95+ / OSX.1+</td>
                                <td>-</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Presto</td>
                                <td>Opera 7.5</td>
                                <td>Win 95+ / OSX.2+</td>
                                <td>-</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Presto</td>
                                <td>Opera 8.0</td>
                                <td>Win 95+ / OSX.2+</td>
                                <td>-</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Presto</td>
                                <td>Opera 8.5</td>
                                <td>Win 95+ / OSX.2+</td>
                                <td>-</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Presto</td>
                                <td>Opera 9.0</td>
                                <td>Win 95+ / OSX.3+</td>
                                <td>-</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Presto</td>
                                <td>Opera 9.2</td>
                                <td>Win 88+ / OSX.3+</td>
                                <td>-</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Presto</td>
                                <td>Opera 9.5</td>
                                <td>Win 88+ / OSX.3+</td>
                                <td>-</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Presto</td>
                                <td>Opera for Wii</td>
                                <td>Wii</td>
                                <td>-</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Presto</td>
                                <td>Nokia N800</td>
                                <td>N800</td>
                                <td>-</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Presto</td>
                                <td>Nintendo DS browser</td>
                                <td>Nintendo DS</td>
                                <td>8.5</td>
                                <td>C/A<sup>1</sup></td>
                            </tr>
                            <tr>
                                <td>KHTML</td>
                                <td>Konqureror 3.1</td>
                                <td>KDE 3.1</td>
                                <td>3.1</td>
                                <td>C</td>
                            </tr>
                            <tr>
                                <td>KHTML</td>
                                <td>Konqureror 3.3</td>
                                <td>KDE 3.3</td>
                                <td>3.3</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>KHTML</td>
                                <td>Konqureror 3.5</td>
                                <td>KDE 3.5</td>
                                <td>3.5</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Tasman</td>
                                <td>Internet Explorer 4.5</td>
                                <td>Mac OS 8-9</td>
                                <td>-</td>
                                <td>X</td>
                            </tr>
                            <tr>
                                <td>Tasman</td>
                                <td>Internet Explorer 5.1</td>
                                <td>Mac OS 7.6-9</td>
                                <td>1</td>
                                <td>C</td>
                            </tr>
                            <tr>
                                <td>Tasman</td>
                                <td>Internet Explorer 5.2</td>
                                <td>Mac OS 8-X</td>
                                <td>1</td>
                                <td>C</td>
                            </tr>
                            <tr>
                                <td>Misc</td>
                                <td>NetFront 3.1</td>
                                <td>Embedded devices</td>
                                <td>-</td>
                                <td>C</td>
                            </tr>
                            <tr>
                                <td>Misc</td>
                                <td>NetFront 3.4</td>
                                <td>Embedded devices</td>
                                <td>-</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>Misc</td>
                                <td>Dillo 0.8</td>
                                <td>Embedded devices</td>
                                <td>-</td>
                                <td>X</td>
                            </tr>
                            <tr>
                                <td>Misc</td>
                                <td>Links</td>
                                <td>Text only</td>
                                <td>-</td>
                                <td>X</td>
                            </tr>
                            <tr>
                                <td>Misc</td>
                                <td>Lynx</td>
                                <td>Text only</td>
                                <td>-</td>
                                <td>X</td>
                            </tr>
                            <tr>
                                <td>Misc</td>
                                <td>IE Mobile</td>
                                <td>Windows Mobile 6</td>
                                <td>-</td>
                                <td>C</td>
                            </tr>
                            <tr>
                                <td>Misc</td>
                                <td>PSP browser</td>
                                <td>PSP</td>
                                <td>-</td>
                                <td>C</td>
                            </tr>
                            <tr>
                                <td>Other browsers</td>
                                <td>All others</td>
                                <td>-</td>
                                <td>-</td>
                                <td>U</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>موتور رندر</th>
                                <th>مرورگر</th>
                                <th>سیستم عامل</th>
                                <th>ورژن</th>
                                <th>امتیاز</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </div>
    <div class="col-md-4">
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">فیلتر های جستجو </h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>شماره مجوز</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">2215489</option>
                                    <option>102213</option>
                                    <option>52446</option>
                                    <option>12345</option>
                                    <option>88795</option>
                                    <option>8546</option>
                                    <option>1321</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>نام پیمانکار</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">محمد محتشم</option>
                                    <option>محمد محتشم</option>
                                    <option>هاشم افسری</option>
                                    <option>نیما یوشیج</option>
                                    <option>الکساندر گراهامبل</option>
                                    <option>دروازه بان ایران</option>
                                    <option>قرمزته</option>
                                </select>
                            </div>

                            <!-- /.form-group -->
                            <!--<div class="form-group">
                                <label>غیرفعال</label>
                                <select class="form-control select2" disabled="disabled" style="width: 100%;">
                                    <option selected="selected">تهران</option>
                                    <option>مشهد</option>
                                    <option>اصفهان</option>
                                    <option>شیراز</option>
                                    <option>اهواز</option>
                                    <option>تبریز</option>
                                    <option>کرج</option>
                                </select>-->
                        </div>
                        <!-- /.form-group -->
                        <!-- /.col -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>انتخاب تاریخ مجوز </label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="tarikh1" class="form-control pull-right">
                                </div>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" id="tarikh2" class="form-control pull-right">
                                </div>
                                <!-- /.input group -->
                                <br>
                            </div>
                            <!--    <div class="form-group">
                                    <label>چند انتخابی</label>
                                    <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                            style="width: 100%;">
                                        <option>تهران</option>
                                        <option>مشهد</option>
                                        <option>اصفهان</option>
                                        <option>شیراز</option>
                                        <option>اهواز</option>
                                        <option>تبریز</option>
                                        <option>کرج</option>
                                    </select>
                            </div>-->
                            <!-- /.form-group -->
                            <!--<div class="form-group">
                                <label>گزینه های غیرفعال</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option selected="selected">تهران</option>
                                    <option>مشهد</option>
                                    <option disabled="disabled">اصفهان غیرفعال</option>
                                    <option>شیراز</option>
                                    <option>اهواز</option>
                                    <option>تبریز</option>
                                    <option>کرج</option>
                                </select>
                            </div>-->
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-3">
                            <!-- iCheck -->
                            <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">وضعیت مجوز</h3>
                                </div>
                                <div class="box-body">
                                    <!-- Minimal style -->





                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" class="flat-red">
                                            تایید شده توسط OCC
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <input type="checkbox" class="flat-red">
                                            تایید شده توسط ناظر
                                        </label>
                                    </div> <div class="form-group">
                                        <label>
                                            <input type="checkbox" class="flat-red">
                                            رد شده توسط OCC
                                        </label>

                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        راهنمای انتخاب<a href="#"> گزینه ها  </a>
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    برای کسب اطلاعات بیشتر و استفاده از راهنمای سیستم جامع صدور مجوز به بخش <a href="#">مستندات </a> مراجعه کنید
                </div>
            </div>
            <!-- /.box -->
    </div>

</div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer text-left">
        <strong>Copyleft &copy; 2020 <a href="https://arput.com">Mehdi Minaee</a> & <a href="https://arput.com">Mehdi Minaee</a></strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">فعالیت ها</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">تولد غلوم</h4>

                                <p>۲۴ مرداد</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">آپدیت پروفایل مهدی</h4>

                                <p>تلفن جدید (800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">نورا به خبرنامه پیوست</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">کرون جابز اجرا شد</h4>

                                <p>۵ ثانیه پیش</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">پیشرفت کارها</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                ساخت پوستر های تبلیغاتی
                                <span class="label label-danger pull-left">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                آپدیت رزومه
                                <span class="label label-success pull-left">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                آپدیت لاراول
                                <span class="label label-warning pull-left">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                بخش پشتیبانی سایت
                                <span class="label label-primary pull-left">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">وضعیت</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">تنظیمات عمومی</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            گزارش کنترلر پنل
                            <input type="checkbox" class="pull-left" checked>
                        </label>

                        <p>
                            ثبت تمامی فعالیت های مدیران
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            ایمیل مارکتینگ
                            <input type="checkbox" class="pull-left" checked>
                        </label>

                        <p>
                            اجازه به کاربران برای ارسال ایمیل
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            در دست تعمیرات
                            <input type="checkbox" class="pull-left" checked>
                        </label>

                        <p>
                            قرار دادن سایت در حالت در دست تعمیرات
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">تنظیمات گفتگوها</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            آنلاین بودن من را نشان نده
                            <input type="checkbox" class="pull-left" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            اعلان ها
                            <input type="checkbox" class="pull-left">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            حذف تاریخته گفتگوهای من
                            <a href="javascript:void(0)" class="text-red pull-left"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../css/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../css/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../../css/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../css/assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../css/assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../css/assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../../css/assets/bower_components/moment/min/moment.min.js"></script>
<script src="../../css/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../../css/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="../../css/assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../css/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../../css/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../css/assets/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../css/assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../css/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../css/assets/dist/js/demo.js"></script>
<!-- babakhani datepicker -->
<script src="../../css/assets/dist/js/persian-date-0.1.8.min.js"></script>
<script src="../../css/assets/dist/js/persian-datepicker-0.4.5.min.js"></script>
<!-- START MYCODES-->

<script src="filter.js"></script>

<!-- ENDS MYCODES-->

<!-- Page script -->
<script>
    $(document).ready(function () {
      /*  $('#tarikh').persianDatepicker({
            altField: '#tarikhAlt',
            altFormat: 'X',
            format: 'D MMMM YYYY HH:mm a',
            observer: true,
            timePicker: {
                enabled: true
            },
        });*/
        $('#tarikh1').persianDatepicker();
        $('#tarikh2').persianDatepicker();
    });
    <!-- START MYCODES-->



    <!-- ENDS MYCODES-->
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })
</script>
</body>
</html>