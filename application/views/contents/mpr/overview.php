
<?php if(!empty($nilai)){?>
         <div class="box">
    <a href="<?php echo base_url()?>mpr/pdf/<?php echo webmasterkid()?>/true/<?php echo $periode?>" class="btn btn-info pull-right">Export PDF</a>
         </div>
<?php }?>
<div class="row">
    <div class="col-md-12">
        <h5>Laporan MPR periode <?php echo $textperiode?></h5>
    </div>
</div>
         <div class="box">
            <div class="col-md-12">
         <?php
         if(!empty($nilai)){
         $kelas=$detailanak->lastname;
         if($kelas=='TKIT'){
            $this->load->view('contents/template_report/tk');
         }
         elseif($kelas=='SDIT'){
            $this->load->view('contents/template_report/sd');
         }elseif($kelas=='SMPIT'){
            $this->load->view('contents/template_report/smp');
         }
         }else{
             echo "Data Belum Tersedia";
         }
         
         ?>
             </div> 
         </div>