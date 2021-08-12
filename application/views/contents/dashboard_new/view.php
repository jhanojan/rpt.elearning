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
                    <?php
                    //echo $webmasterkid;
                     $course= $this->mgetdata->getcoursekid($webmasterkid)->result_array();
                    ?>
                     <?php
                     if(empty($course)){
                         echo "Data Belum Tersedia";
                     }
                        foreach($course as $cd){
                            $coursecomplete=$this->mgetdata->getmodulescoursecompleted($cd['id'],$webmasterkid)->num_rows();
                            $coursetotal= $this->mgetdata->getmodulescourse($cd['id'],1)->num_rows();
                            $precentaget=floor($coursecomplete/$coursetotal*100);
                            //echo $webmasterkid;
                             ?>
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?php echo base_url()?>dashboard_new/detailcourse/<?php echo $cd['id'] ?>"><?php echo $cd['fullname'] ?></a></h5>
                        <p class="card-text"><?php echo $cd['categoryname'] ?></p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $precentaget?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $precentaget?>%">
                            <?php echo $precentaget?>%
                            </div>
                        </div>
                        <a href="<?php echo base_url()?>dashboard_new/detailcourse/<?php echo $cd['id'] ?>" class="" title="Lihat Detail"><i class="fa fa-external-link" aria-hidden="true"></i> Lihat Detail</a>
                        </div>
                    </div>
                        <?php }?>
                </div>
             </div> 
             <div class="col-md-4">
                <div class="box">
                <div class="box-header">
                 <h2>Badges</h2>
                </div>
                     <?php $badges= $this->mgetdata->getbadge($webmasterkid)->result_array();
                     if(empty($badges)){
                         echo "Data Belum Tersedia";
                     }
                        foreach($badges as $bd){     
                             ?><div class="card" style="width: 100%;">
                                 
                                 <a target="_new" href="https://elearning.darulabidin.com/badges/badge.php?hash=<?php echo $bd['uniquehash'] ?>"><img src="<?php echo $this->mgetdata->getbadgeimg($bd['id']) ?>" class="card-img-top" alt="..."></a>
                        <div class="card-body">
                            <h5 class="card-title"><a target="_new" href="https://elearning.darulabidin.com/badges/badge.php?hash=<?php echo $bd['uniquehash'] ?>"><?php echo $bd['badgename'] ?></a></h5>
                        <p class="card-text"><?php echo $bd['Context'] ?></p>
                        <i> Didapatkan Pada : <?php echo tglindo($bd['dateissued']) ?></i>
                        
                        </div>
                    </div>
                        <?php }?>
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
    
</script>