<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo get_data_info('name');?></title>
    <link rel="shortcut icon" href="<?php echo base_url()."uploads/".get_data_info('logo');?>" />

    <link href="<?php echo base_url()?>template/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>template/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url()?>template/assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()?>template/assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url()?>template/assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

    <link href="<?php echo base_url()?>template/assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    
    <link href="<?php echo base_url()?>template/assets/css/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css" rel="stylesheet">

    <link href="<?php echo base_url()?>template/assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>template/assets/css/style.css" rel="stylesheet">

</head>

<?php
    $stat = $this->session->userdata('status');
    if($stat == 1){
        $status = "Administrator";
    }elseif($stat == 2){
        $status = "Procurement";
    }

    $menuActive = $this->uri->segment(1);
    if($menuActive == 'home'){
        $activeHome = "class='active'";
    }
    if($menuActive == 'info'){
        $activeInfo = "class='active'";
    }
    if($menuActive == 'category'){
        $activeCategory = "class='active'";
    }
    if($menuActive == 'mailbox'){
        $activeMailbox = "class='active'";
    }
    if($menuActive == 'vendor'){
        $activeVendor = "class='active'";
    }
?>

<body>

    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> 
                            <span>
                                <img alt="image" width="48" class="img-circle" src="<?php echo base_url()?>uploads/profile.png" />
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> 
                                    <span class="block m-t-xs"> 
                                        <strong class="font-bold"><?php echo $this->session->userdata('name');?></strong>
                                    </span> 
                                    <span class="text-muted text-xs block">
                                        <?php echo $status;?> <b class="caret"></b>
                                    </span> 
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="<?php echo base_url()?>index.php/info/profile">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url()?>index.php/auth/logout">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            <?php echo get_data_info('alias');?>
                        </div>
                    </li>
                    <li <?php echo $activeHome;?>>
                        <a href="<?php echo base_url()?>index.php/home">
                            <i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> 
                        </a>
                    </li>
                    <?php
                        if($stat == 1){
                    ?>
                    <li <?php echo $activeInfo;?>>
                        <a href="<?php echo base_url()?>index.php/info">
                            <i class="fa fa-gear"></i> <span class="nav-label">Info</span> 
                        </a>
                    </li>
                    
                    <li <?php echo $activeCategory;?>>
                        <a href="<?php echo base_url()?>index.php/category">
                            <i class="fa fa-puzzle-piece"></i> <span class="nav-label">Category</span> 
                            <span class="label label-info pull-right"><?php echo getCountTable("dtbcategory");?></span>
                            <!--<span class="label label-primary pull-right">NEW</span>-->
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                    
                    <?php
                    /*
                    <li <?php echo $activeMailbox;?>>
                        <a href="<?php echo base_url()?>index.php/mailbox">
                            <i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo base_url()?>index.php/mailbox/compose">Compose email</a></li>
                            <li><a href="<?php echo base_url()?>index.php/mailbox/sendmail">Send Mail</a></li>
                        </ul>
                    </li>
                    */
                    ?>

                    <li <?php echo $activeMailbox;?>>
                        <a href="<?php echo base_url()?>index.php/mailbox/sendmail">
                            <i class="fa fa-envelope"></i> <span class="nav-label">Mailbox Sendmail</span>
                            
                        </a>
                    </li>

                    <li <?php echo $activeVendor;?>>
                        <a href="<?php echo base_url()?>index.php/vendor">
                            <i class="fa fa-building-o"></i> <span class="nav-label">Vendor</span>
                            <span class="label label-info pull-right"><?php echo getCountTable("dtbvendor");?></span>
                        </a>
                    </li>
                    <?php
                    /*
                    <li>
                        <a href="<?php echo base_url()?>index.php/projects">
                            <i class="fa fa-suitcase"></i> <span class="nav-label">Projects </span>
                            <span class="label label-info pull-right"><?php echo getCountTable("dtrproject");?></span>
                        </a>
                    </li>
                    */
                    ?>
                    
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome to <?php echo get_data_info('name');?></span>
                        </li>
                        
                        <li>
                            <a href="<?php echo base_url()?>index.php/auth/logout"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2><?php echo strtoupper($this->uri->segment(1));?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url();?>index.php/home"><span class="fa fa-home"></span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>index.php/<?php echo $this->uri->segment(1);?>">
                                <?php echo strtoupper($this->uri->segment(1));?>
                            </a>
                        </li>
                        <li>
                            
                                <?php echo strtoupper($this->uri->segment(2));?>
                            
                        </li>
                        
                    </ol>
                </div>
            </div>
            
            <div class="wrapper wrapper-content animated fadeInRight">
                <?php echo $contents; ?>
            </div>
            <!--
            <div class="col-lg-12">
                <div class="wrapper wrapper-content">
                    <div class="middle-box text-center animated fadeInRightBig">
                        <h3 class="font-bold">This is page content</h3>

                        <div class="error-desc">
                            You can create here any grid layout you want. And any variation layout you imagine:) Check out main dashboard and other site. It use many different layout.
                            <br/><a href="index.html" class="btn btn-primary m-t">Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
            -->

        
            <div class="footer fixed">
                <!--<div class="pull-right">
                    10GB of <strong>250GB</strong> Free.
                </div>-->
                <div>
                    <strong>Copyright</strong> Vendor Management System &copy; 2019
                </div>
            </div>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url()?>template/assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url()?>template/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>template/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url()?>template/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Data Tables -->
    <script src="<?php echo base_url()?>template/assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()?>template/assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url()?>template/assets/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="<?php echo base_url()?>template/assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url()?>template/assets/js/inspinia.js"></script>
    <script src="<?php echo base_url()?>template/assets/js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="<?php echo base_url()?>template/assets/js/plugins/iCheck/icheck.min.js"></script>

    <script src="<?php echo base_url()?>template/assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>


    
    <script src="<?php echo base_url()?>template/assets/jscustom.js"></script>
    <script src="<?php echo base_url()?>template/assets/jsCustomCategory.js"></script>
    <link href="<?php echo base_url()?>template/assets/csscustom.css" rel="stylesheet">


    
    


</body>

</html>
