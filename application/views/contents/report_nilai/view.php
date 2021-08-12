<style>
    .linktodetail{
        color:#1a237e;
        text-decoration:bold;
    }
</style>
<?php
$dataortu=$this->db->query("SELECT * FROM sv_master_orang_tua WHERE id='".webmastermarketing()."'")->row_array();
if($detailanak->picture>0){
    $pic="https://elearning.darulabidin.com/pluginfile.php/".$detailanak->contextid."/user/icon/enlightlite/f1?rev=".$detailanak->picture;
}else{
    $pic=base_url()."assets/img/default.png";
}
?>
<div id="container" style=" height: auto; margin: 0 " class="col-md-12">
    <!--div class="well-lg">
        <h3><?php echo $detailanak->lastname?></h3>
    </div>
    <hr-->
    <div class="item">
    <div class="item-bg">
      <img src="<?php echo $pic?>" class="blur opacity-3">
    </div>
    <div class="p-a-md">
      <div class="row m-t">
        <div class="col-sm-7">
          <a href class="pull-left m-r-md">
            <span class="avatar w-96">
              <img src="<?php echo $pic?>">
              <i class="on b-white"></i>
            </span>
          </a>
          <div class="clear m-b">
            <h3 class="m-a-0 m-b-xs"><?php echo $detailanak->lastname?></h3>
            <p class="text-muted"><span class="m-r"><?php echo $detailanak->firstname?></span> <small><i class="fa fa-map-marker m-r-xs"></i><?php echo $detailanak->city?>, <?php echo $detailanak->country?></small></p>
            <p class="text-muted" title="Login Terakhir"><small><i class="fa fa-clock-o m-r-xs"></i><?php echo date('d/M/Y H:i:s',$detailanak->lastlogin)?></small></p>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <div class="box">
    <div class="box-header">
      <h2>Laporan Nilai</h2>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-b dt">
        <thead>
          <tr>
            <th  style="width:50%">Modul</th>
            <th  style="width:25%">Grade</th>
            <th  style="width:25%">Ranks</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($enrol as $ac){if(!empty($ac->courseid)){
                $grade=$this->mdlfo->query("SELECT * FROM mdl_grade_grades a left join mdl_grade_items b ON a.itemid=b.id WHERE a.userid=".$this->session->userdata('chosen_kid')." AND b.courseid=".$ac->courseid." AND sortorder=1")->row();
            }
                ?>
          <tr>
              <td  style="width:20%"><a href="<?php echo base_url()?>report_nilai/detail/<?php echo $ac->courseid?>" class="linktodetail"><?php echo $ac->course?></a></td>
            <td  style="width:25%"><?php echo (!empty($grade->finalgrade)?number_format($grade->finalgrade, 2, '.', ','):"-")?></td>
            <td  style="width:25%"></td>
          </tr>
            <?php }?>
        </tbody>
      </table>
    </div>
  </div>
    <?php //echo $api_tes->api_name;?>
    
</div>
<script>
    function kehadiran(){
        window.location.assign("<?php echo base_url()?>report_kehadiran');
    }
    function nilai(){
        window.location.assign('<?php echo base_url()?>report_nilai');
    }
    function nilai_lainnya(){
        window.location.assign('<?php echo base_url()?>report_nilai_lainnya');
    }
    
</script>