<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $sites->site_title?> | <?php echo $pages?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url('assets');?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url('assets');?>/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?php echo base_url('assets');?>/css/ionicons.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" media="screen" href="<?php echo base_url('assets')?>/css/jquery-ui.min.css">
    <!-- DATA TABLES -->
    <link href="<?php echo base_url('assets');?>/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?php echo base_url('assets');?>/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?php echo base_url('assets');?>/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url('assets');?>/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url('assets');?>/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the post via file:// -->
    <!--
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    -->
    <!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url('assets');?>/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url('assets');?>/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url('assets');?>/js/jquery-ui.min.js"></script>
    <!-- FastClick -->
    <script src='<?php echo base_url("assets");?>/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets');?>/js/app.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo base_url('assets');?>/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script>
		Number.prototype.formatMoney = function(places, symbol, thousand, decimal) {
			places = !isNaN(places = Math.abs(places)) ? places : 2;
			symbol = symbol !== undefined ? symbol : "$";
			thousand = thousand || ",";
			decimal = decimal || ".";
			var number = this, 
			    negative = number < 0 ? "-" : "",
			    i = parseInt(number = Math.abs(+number || 0).toFixed(places), 10) + "",
			    j = (j = i.length) > 3 ? j % 3 : 0;
			return symbol + negative + (j ? i.substr(0, j) + thousand : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousand) + (places ? decimal + Math.abs(number - i).toFixed(places).slice(2) : "");
		};
		
		function pad (str, max) {
		  str = str.toString();
		  return str.length < max ? pad("0" + str, max) : str;
		}
		
		$(document).ready(function(){
			$(".rupiah").each(function() {				
				var vals = parseInt($(this).text());
				vals = vals.formatMoney(2, "Rp. ", ".", ",");
				$(this).text(vals);
				$(this).val(vals);
			});
        	$(".ui-dialog-titlebar-close").addClass('btn btn-default btn-flat').html('<i style="margin-top:-1px" class="fa fa-times"></i>');
		});
        $(document).ready(function() {
            $('.tip').tooltip();
            $('.alert').click(function(){ $(this).fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); });
            window.setTimeout(function() { $(".alert").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 8000);
        });
	</script>
  </head>
  <body class="skin-red">

    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url()?>" class="logo"><i class="fa fa-th-large"></i> <?php echo $sites->site_name?> </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="<?php echo base_url('logout')?>">
                  <span class="hidden-xs"><b>Logout</b></span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
			<div class="pull-left image">
				<img src="<?php echo base_url($this->session->userdata('pict'));?>" class="img-circle" alt="User Image" />
			</div>
			<div class="pull-left info">
				<p><a href="<?php echo base_url('users/profile')?>"><?php echo $this->session->userdata('name')?></p>
				<i class="fa fa-circle text-success"></i> Online</a>
			</div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <?php $depth = 1;
                //print_r($menus);
                foreach ($menus as $menu){
                $pos = explode('-', $menu->position);
                while ($depth > count($pos)){
                ?>
            </ul>
            </li>
            <?php $depth--;
            }
            $depth = count($pos);
            if ($menu->uri == ''){
                ?>
                <li class="header"><?php echo $menu->content ?></li>
            <?php } else if ($menu->uri != '#'){ ?>
                <li title="<?php echo $menu->title ?>" class="<?php if ($pages == $menu->content) echo 'active' ?>">
                    <a href="<?php echo base_url($menu->uri); ?>">
                        <i class="fa fa-<?php echo $menu->note ?>"></i>
	                    <span>
                            <?php echo $menu->content ?>
                        </span>
                    </a>
                </li>
            <?php } else { ?>
            <li class="treeview <?php if (isset($parent_page) && $parent_page == $menu->content) echo 'active'; ?>">
                <a href="#">
                    <i class="fa fa-<?php echo $menu->note ?>"></i>
                    <span>
                        <?php echo $menu->content ?>
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php }
                    } ?>
                </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

        <!-- Right side column. Contains the navbar and content of the post -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <button class="btn btn-danger btn-sm kembali pull-right" type="button"><i class="fa fa-arrow-left"></i> Kembali</button>
                <h1>
                    <?= $pages ?>
                </h1>
                <ol class="breadcrumb" style="margin-right: 100px;">
                    <li><a href="<?php echo $base = base_url(); ?>"><i
                                class="fa fa-dashboard"></i> <?php echo $sites->site_name ?> </a></li>
                    <?php
                    $segments = $this->uri->segment_array();
                    foreach ($segments as $segment) {
                        if ($segment != end($segments)) {
                            $base .= $segment . '/';
                            echo "<li class='upper><a href='$base'>$segment</a></li>";
                        } else echo '
                        <li class="upper active">' . $segment . '</li>';
                    } ?>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <?= $content ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <?php echo $sites->site_name ?>
            </div>
            <strong>Copyright &copy; 2015 <a href="http://codemastery.net">SMARTSOFT STUDIO</a></strong>&nbsp; All
            rights reserved.
        </footer>

    </div>
    <!-- Sparkline -->
    <script src="<?php echo base_url('assets'); ?>/plugins/sparkline/jquery.sparkline.min.js"
            type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url('assets'); ?>/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/datatables/jquery.dataTables.columnFilter.js"
            type="text/javascript"></script>
    <script src="<?php echo base_url('assets'); ?>/plugins/datatables/dataTables.bootstrap.js"
            type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url('assets'); ?>/plugins/daterangepicker/daterangepicker.js"
            type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url('assets'); ?>/plugins/datepicker/bootstrap-datepicker.js"
            type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets'); ?>/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!--<script src="--><?php //echo base_url('assets'); ?><!--/js/app.min.js" type="text/javascript"></script>-->
    <script>
        $(".kembali").click(function(){
            history.go(-1);
        });
    </script>
  </body>
</html>
