<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FGAPI</title>
        <link rel="icon" type="image/png" href="<?php echo base_url("img/logo.png"); ?>">
        <link href="<?php echo base_url("css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("font-awesome/css/font-awesome.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("css/animate.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("css/plugins/codemirror/codemirror.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("css/plugins/codemirror/ambiance.css"); ?>" rel="stylesheet">
        <!-- <link href="<?php //echo base_url("css/plugins/dataTables/dataTables.bootstrap.css"); ?>" rel="stylesheet"> -->
        <link href="<?php echo base_url("css/plugins/dataTables/dataTables.bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("css/plugins/dataTables/responsive.bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("css/plugins/dataTables/dataTables.responsive.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("css/plugins/dataTables/dataTables.tableTools.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("css/plugins/datapicker/datepicker3.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("css/plugins/daterangepicker/daterangepicker-bs3.css"); ?>" rel="stylesheet">

        <!-- Sweet Alert -->
        <link href="<?php echo base_url('css/plugins/sweetalert/sweetalert.css'); ?>" rel="stylesheet">
        <!-- croper -->
        <link href="<?php echo base_url('css/plugins/cropper/cropper.min.css'); ?>" rel="stylesheet">
        <!-- summer note -->
        <!-- <link href="<?php echo base_url('css/plugins/summernote/summernote.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('css/plugins/summernote/summernote-bs3.css');?>" rel="stylesheet">  -->
        
        <!-- Mainly scripts -->
        <script src="<?php echo base_url("js/jquery-2.1.1.js"); ?>"></script>
       
        <!-- Jquery Validate -->
        <script src="<?php echo base_url("js/plugins/validate/jquery.validate.min.js"); ?>"></script>
        <!-- Chosen -->
        <script src="<?php echo base_url("js/plugins/chosen/chosen.jquery.js"); ?>"></script>

        <link href="<?php echo base_url("js/plugins/gritter/jquery.gritter.css"); ?>" rel="stylesheet">
        <!-- Chosen -->
        <link href="<?php echo base_url("css/plugins/chosen/chosen.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("css/style.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("css/invoq.css"); ?>" rel="stylesheet">
        <script type="text/javascript">
        var base_url = '<?php echo base_url(); ?>';
        </script>

  </head>
    

    <body class="fixed-sidebar one">
    <div id="wrapper">
       
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span>
                            <!-- <img alt="image" class="img img-responsive logo" src="https://pms.wotr.org.in/assets/common/images/WOTR_Logo.svg" onerror="if (this.src != 'error.jpg') this.src = '<?php //echo base_url('img/wotr.jfif'); ?>';"/ > -->
                            <img alt="image" class="img img-responsive logo" src="<?php echo base_url('img/logo.png'); ?>" onerror="if (this.src != 'error.jpg') this.src = '<?php echo base_url('img/logo.png'); ?>';"/ >
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">
                                        <!-- WOTR -->
                                        <?php //echo $Login['Name']; ?>
                                    </strong>
                                </span>
                                <span class="text-muted text-xs block">
                                    <strong class="font-bold">
                                        <!-- HRMS -->
                                    </strong>
                                    <?php //echo $this->data['Login']['Login_as']; ?>
                                </span>
                            </span> 
                        </a>
                    </div>
                    <div class="logo-element">
                        <i class="fa fa-user padding-right5"></i>
                    </div>
                </li>
                <li class="" id="<?php echo 'A'.md5(base_url('Dashboard')); ?>">
                    <a href="<?php echo base_url('Dashboard') ?>"><i class="fa fa-info"></i>
                        <span class="nav-label">
                            Dashboard
                        </span>
                    </a>
                    
                </li>
                <!-- <li class="<?php echo @$Login['Role_data']['101']['2']['PermissionValue'] == 'true' ? '' : 'hidden'; ?>" id="<?php echo 'A'.md5(base_url('#')); ?>">
                    <a href="<?php echo base_url('#'); ?>"><i class="fa fa-info"></i> <span class="nav-label">Process</span><span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li class="<?php echo @$Login['Role_data']['102']['2']['PermissionValue'] == 'true' ? '' : 'hidden'; ?>" id="<?php echo 'A'.md5(base_url('Process/newprocess')); ?>" >
                            <a href="<?php echo base_url('Process/newprocess') ?>"><i class="fa fa-info"></i>
                                
                                    New Process
                                
                            </a>
                        </li>
                        <li class="<?php echo @$Login['Role_data']['103']['2']['PermissionValue'] == 'true' ? '' : 'hidden'; ?>" id="<?php echo 'A'.md5(base_url('Process/oldprocess')); ?>" >
                            <a href="<?php echo base_url('Process/oldprocess') ?>"><i class="fa fa-info"></i>
                                
                                    Old Process
                                
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php echo @$Login['Role_data']['104']['2']['PermissionValue'] == 'true' ? '' : 'hidden'; ?>" id="<?php echo 'A'.md5(base_url('#')); ?>">
                    <a href="<?php echo base_url('#'); ?>"><i class="fa fa-info"></i> <span class="nav-label">Admin</span><span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level collapse">
                        <li class="<?php echo @$Login['Role_data']['105']['2']['PermissionValue'] == 'true' ? '' : 'hidden'; ?>" id="<?php echo 'A'.md5(base_url('Admin/roles')); ?>" >
                            <a href="<?php echo base_url('Admin/roles') ?>"><i class="fa fa-info"></i>
                                
                                    Roles
                                
                            </a>
                        </li>
                        <li class="<?php echo @$Login['Role_data']['106']['2']['PermissionValue'] == 'true' ? '' : 'hidden'; ?>" id="<?php echo 'A'.md5(base_url('Admin/users')); ?>" >
                            <a href="<?php echo base_url('Admin/users') ?>"><i class="fa fa-info"></i>
                                
                                    User Management
                                
                            </a>
                        </li>

                        <li class="<?php echo @$Login['Role_data']['106']['2']['PermissionValue'] == 'true' ? '' : 'hidden'; ?>" id="<?php echo 'A'.md5(base_url('Admin/employee')); ?>" >
                            <a href="<?php echo base_url('Admin/employee') ?>"><i class="fa fa-info"></i>
                                
                                    Employee
                                
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="<?php echo @$Login['Role_data']['107']['2']['PermissionValue'] == 'true' ? '' : 'hidden'; ?>" id="<?php echo 'A'.md5(base_url('Myprofile')); ?>" >
                    <a href="<?php echo base_url('Myprofile') ?>"><i class="fa fa-info"></i>
                        <span class="nav-label">
                            My Profile
                        </span>
                    </a>
                </li> -->
            </ul>
        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome <?php echo @$Login['Name']; ?></span>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                           <span class="text-xs block"><i class="fa fa-gear"></i>Options<b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            
                            <li>
                                <a href="<?php echo base_url('Login/logout'); ?>"><i class="fa fa-sign-out padding-right5"></i> Log out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2><?php echo @$breadcrumb['heading']; ?></h2>
                
            </div>
            <div class="col-lg-2">
            </div>
        </div>
        
        
    <script type="text/javascript">
        $(document).ready(function() {
            var curl = '<?php echo current_url(); ?>';

            // console.log(curl.indexOf('Admin'));
            if (curl.indexOf('Admin/useradd') > -1 || curl.indexOf('Admin/useredit') > -1) 
            {
                $('#A<?php echo md5(base_url('Admin/users')); ?>').addClass('active');
                $("#A<?php echo md5(base_url('Admin/users')); ?>").parent().parent().addClass("active");
                $("#A<?php echo md5(base_url('Admin/users')); ?>").parent().addClass("in");
            }
            else if (curl.indexOf('Admin/roleedit') > -1) 
            {
                $('#A<?php echo md5(base_url('Admin/roles')); ?>').addClass('active');
                $("#A<?php echo md5(base_url('Admin/roles')); ?>").parent().parent().addClass("active");
                $("#A<?php echo md5(base_url('Admin/roles')); ?>").parent().addClass("in");
            }
            else
            {
                $('#A<?php echo md5(current_url()); ?>').addClass('active');
                $("#A<?php echo md5(current_url()); ?>").parent().parent().addClass("active");
                $("#A<?php echo md5(current_url()); ?>").parent().addClass("in");
            }
            // console.log('<?php //echo current_url(); ?>');
            // console.log('#A<?php //echo md5(current_url()); ?>');
                
        });
    </script>
    <div class="stretch wrapper wrapper-content animated fadeInRight">
        <?php echo $this->session->flashdata('itemUpdate');?>