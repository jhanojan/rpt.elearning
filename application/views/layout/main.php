<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
    <title><?php echo GetValue('app_name','setup_app',array('id'=>'where/1')); ?></title>
  <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="<?php echo base_url()?>assets/icons/favicon.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="<?php echo base_url()?>assets/icons/favicon.png">
  <!--link rel="shortcut icon" sizes="196x196" href="<?php echo base_url()?>assets/flatkit/assets/images/logo.png"-->
  
  <?php $this->load->view('layout/style')?>
<!-- jQuery -->
  <!--script src="<?php echo base_url()?>assets/flatkit/libs/jquery/jquery/dist/jquery.js"></script-->

  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
<body>
  <div class="app" id="app">

<!-- ############ LAYOUT START-->

  <!-- aside -->
  <div id="aside" class="app-aside modal fade folded md nav-expand">
  	<div class="left navside indigo-900 dk" layout="column" style="width:12.5rem;">
      <div class="navbar navbar-md no-radius" style="background:white!important;padding:2%;min-height:auto!important;height:85px;">
        <!-- brand -->
        <a class="navbar-brand">
        	<img src="<?php echo base_url()?>assets/img/seahorse2.png" alt="." style="min-width:100%;max-width:100%;height:auto!important;max-height:180px!important;">
        	<!--div ui-include="'<?php echo base_url()?>assets/flatkit/assets/images/logo.svg'"></div>
        	<img src="<?php echo base_url()?>assets/img/seahorse2.png" alt="." class="hide">
        	<span class="hidden-folded inline">Flatkit</span-->
        </a>
        <!-- / brand -->
      </div>
      <div flex class="hide-scroll">
        <?php $this->load->view('layout/menu')?>
      </div>
      <div flex-no-shrink>
          <?php $this->load->view('layout/flatkit/bottom-side')?>
        <!--div ui-include="'<?php echo base_url()?>assets/flatkit/views/blocks/aside.bottom.0.html'"></div-->
      </div>
    </div>
  </div>
  <!-- / aside -->
  
  <!-- content -->
  <div id="content" class="app-content box-shadow-z0" role="main">
    <div class="app-header white box-shadow navbar-md">
        <div class="navbar">
            <!-- Open side - Naviation on mobile -->
            <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up">
              <i class="material-icons">&#xe5d2;</i>
            </a>
            <!-- / -->
         
            <!-- Page title - Bind to $state's title -->
            <div class="navbar-item pull-left h5" ng-bind="$state.current.data.title" id="pageTitle"></div>
        
            <!-- navbar right -->
            <ul class="nav navbar-nav pull-right">
              <!--li class="nav-item dropdown pos-stc-xs">
                <a class="nav-link" href data-toggle="dropdown">
                  <i class="material-icons">&#xe7f5;</i>
                  <span class="label label-sm up warn">3</span>
                </a>
                <div ui-include="'<?php echo base_url()?>assets/flatkit/views/blocks/dropdown.notification.html'"></div>
              </li-->
              <li class="nav-item dropdown">
                <a class="nav-link clear" href data-toggle="dropdown">
                  <span class="avatar w-32">
                    <img src="<?php echo base_url()?>assets/flatkit/assets/images/a0.jpg" alt="...">
                    <i class="on b-white bottom"></i>
                  </span>
                </a>
                  <div class="dropdown-menu pull-right dropdown-menu-scale">
                    <!--a class="dropdown-item" ui-sref="app.inbox.list">
                        <span>Inbox</span>
                        <span class="label warn m-l-xs">3</span>
                    </a-->
                    <a class="dropdown-item" href="<?php echo base_url()?>admin/profile/<?php echo webmastermarketing()?>">
                        <span>Profile</span>
                    </a>
                    <a class="dropdown-item" href="<?php echo base_url()?>admin/form/<?php echo webmasterid()?>">
                        <span>Settings</span>
                        <i class="on b-white bottom"></i>
                    </a>
                    <div class="dropdown-divider"></div>
                    <!--a class="dropdown-item" ui-sref="app.docs">
                        Need help?
                    </a-->
                    <a class="dropdown-item" href="<?php echo base_url()?>login/logout">Sign out</a>
                  </div>
              </li>
              <li class="nav-item hidden-md-up">
                <a class="nav-link" data-toggle="collapse" data-target="#collapse">
                  <i class="material-icons">&#xe5d4;</i>
                </a>
              </li>
            </ul>
            <!-- / navbar right -->
        
            <!-- navbar collapse -->
            <?php 
            if($this->session->userdata('webmaster_grup')==3){
                $this->load->view('layout/c_kid');
            }
            ?>
            <!-- / navbar collapse -->
        </div>
    </div>
    
    <div ui-view class="app-body" id="view">

<!-- ############ PAGE START-->
<div class="padding">
    <?php $this->load->view($content);?>
</div>

<!-- ############ PAGE END-->

    </div>
      <div class="app-footer">
      <div class="p-a text-xs">
        <div class="pull-right text-muted">
          &copy; Copyright <strong>Darul Abidin</strong> <?php echo date('Y')?><span class="hidden-xs-down"></span>
          <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
        </div>
        <!--div class="nav">
          <a class="nav-link" href="../">About</a>
          <span class="text-muted">-</span>
          <a class="nav-link label accent" href="http://themeforest.net/user/flatfull/portfolio?ref=flatfull">Get it</a>
        </div-->
      </div>
    </div>
  </div>

  </div>
<!-- build:js <?php echo base_url()?>assets/flatkit/scripts/app.html.js -->
<!-- Bootstrap -->
  <script src="<?php echo base_url()?>assets/flatkit/libs/jquery/tether/dist/js/tether.min.js"></script>
  <script src="<?php echo base_url()?>assets/flatkit/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
  <script src="<?php echo base_url()?>assets/flatkit/libs/jquery/underscore/underscore-min.js"></script>
  <script src="<?php echo base_url()?>assets/flatkit/libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
  <script src="<?php echo base_url()?>assets/flatkit/libs/jquery/PACE/pace.min.js"></script>

  <script src="<?php echo base_url()?>assets/flatkit/scripts/config.lazyload.js"></script>

  <script src="<?php echo base_url()?>assets/flatkit/scripts/palette.js"></script>
  <script src="<?php echo base_url()?>assets/flatkit/scripts/ui-load.js"></script>
  <script src="<?php echo base_url()?>assets/flatkit/scripts/ui-jp.js"></script>
  <script src="<?php echo base_url()?>assets/flatkit/scripts/ui-include.js"></script>
  <script src="<?php echo base_url()?>assets/flatkit/scripts/ui-device.js"></script>
  <script src="<?php echo base_url()?>assets/flatkit/scripts/ui-form.js"></script>
  <script src="<?php echo base_url()?>assets/flatkit/scripts/ui-nav.js"></script>
  <script src="<?php echo base_url()?>assets/flatkit/scripts/ui-scroll-to.js"></script>
  <script src="<?php echo base_url()?>assets/flatkit/scripts/ui-toggle-class.js"></script>

  <script src="<?php echo base_url()?>assets/flatkit/scripts/app.js"></script>
  
  <!--script src="<?php echo base_url()?>assets/flatkit/libs/jquery/plugins/integration/bootstrap/3/dataTables.bootstrap.js"></script-->

  <!-- ajax -->
  <!--script src="<?php echo base_url()?>assets/flatkit/libs/jquery/jquery-pjax/jquery.pjax.js"></script-->
  <script src="<?php echo base_url()?>assets/flatkit/scripts/ajax.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/flexigrid/js/flexigrid.pack.js"></script>
  <script src="<?php echo base_url('assets')?>/ace/js/date-time/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url('assets')?>/ace/js/date-time/bootstrap-timepicker.js"></script>
  <script src="<?php echo base_url('assets')?>/select2/js/select2.js"></script>
  <script>
      $(document).ready( function () {
      $('.date-picker').datepicker({
				autoclose: true,
                                format:'yyyy-mm-dd',
				todayHighlight: true 
			});
			
			
				$('.timepicker').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				});
      $('.dt').DataTable(); 
      });
  </script>
  
<script>
    
    function gantianak(ids){
        window.location.assign('<?php echo base_url()?>login/assign_child/'+ids);
    }
    
</script>
<!-- endbuild -->
</body>
</html>
<?php $this->output->delete_cache();?>