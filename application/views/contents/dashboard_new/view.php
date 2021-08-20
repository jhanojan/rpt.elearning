<style>
    .menu-utama{
        min-height:320px;
        cursor:pointer;
        border:1px solid rgba(0,0,0,.1);
        padding-bottom:5px;
    }
    .caption{
        border:1px solid rgba(0,0,0,.1);
        padding-top:5px;
        margin-bottom:10px;
        background:#1a237e;
        color:white;
        font-family:"Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
    .card-body{
        -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
    }
    .progress-bar{
        color:white;
        text-height: bold;
    }
    .box{
        background:none!important;
    }
</style>
<?php

        $sisda= GetValue('no_sisda','master_siswa',array('id'=>'where/'. webmasterkid()));
        $webmasterkids=$this->mdlfo->query("SELECT id FROM mdl_user WHERE idnumber='$sisda'")->row_array();
        $webmasterkid=$webmasterkids['id'];
        //$webmasterkid=1664;
$dataortu=$this->db->query("SELECT * FROM sv_master_orang_tua WHERE id='".webmastermarketing()."'")->row_array();
if($detailanak->picture>0){
    $pic="https://elearning.darulabidin.com/pluginfile.php/".$detailanak->contextid."/user/icon/enlightlite/f1?rev=".$detailanak->picture;
}else{
    $pic=base_url()."assets/img/default.png";
}
?>
<div id="container" style=" height: auto; margin: 0 " class="col-md-12">
    <div class="well-lg">
        <h3>Selamat Datang</h3> <?php //echo ($dataortu['jenis_kelamin']=='Laki-laki'?"Bpk. ":"Ibu ").' '.$dataortu['nama_lengkap']?>
    </div>
    <hr>
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
            <h3 class="m-a-0 m-b-xs"><?php echo $detailanak->firstname?></h3>
            <p class="text-muted"><span class="m-r"><?php echo $detailanak->lastname?></span> <small><i class="fa fa-map-marker m-r-xs"></i><?php echo $detailanak->city?>, <?php echo $detailanak->country?></small></p>
            <p class="text-muted" title="Login Terakhir"><small><i class="fa fa-clock-o m-r-xs"></i><?php echo date('d/M/Y H:i:s',$detailanak->lastlogin)?></small></p>
          </div>
        </div>
        
      </div>
    </div>
  </div>
    <hr>
	Status Tagihan :
        <?php echo date('M Y')?> -
        <?php if(empty($tagihan)){?>
        Belum Tersedia
        <?php }else{?>
        <?php echo Rupiah($tagihan['total_diskon']) . ' - '. $tagihan['status_bayar']." - <a class='btn btn-danger' href='".base_url()."keuangan/cetak_tagihan/".$tagihan['id']."'>Detail</a>"?>
        <?php }?>
	 <hr>
         
             <div class="col-md-8">
                <div class="box">
                <div class="box-header">
                 <h2>Course Overview</h2>
                </div>
                    <div id="coursecontent">
                        <img src="<?php echo base_url()?>assets/img/load.gif" style="max-width:30px;">
                    </div>
                </div>
             </div> 
             <div class="col-md-4">
                <div class="box">
                <div class="box-header">
                 <h2>Badges</h2>
                </div>
                    <div id="badgecontent">
                        <img src="<?php echo base_url()?>assets/img/load.gif" style="max-width:30px;">
                    </div>
                </div>
             </div> 
 
    
</div>
<script>
    function kehadiran(){
        window.location.assign('<?php echo base_url()?>report_kehadiran');
    }
    function nilai(){
        window.location.assign('<?php echo base_url()?>report_nilai');
    }
    function nilai_lainnya(){
        window.location.assign('<?php echo base_url()?>report_nilai_lainnya');
    }
    $(document).ready(function(e){
        $('#coursecontent').load('<?php echo base_url()?>dashboard_new/loadcourse/<?php echo $webmasterkid?>');
        $('#badgecontent').load('<?php echo base_url()?>dashboard_new/loadbadge/<?php echo $webmasterkid?>');
    });
</script>