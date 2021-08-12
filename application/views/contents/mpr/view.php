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
    
</style>

         
  <div class="box">
    <div class="box-header">
      <h2>Laporan Nilai MPR</h2>
    </div>
  </div>
<?php if(!empty($nilai)){?>
         <div class="box">
    <a href="<?php echo base_url()?>mpr/pdf/<?php echo webmasterkid()?>/true" class="btn btn-info pull-right">Export PDF</a>
         </div>
<?php }?>
         <div class="box">
            <div class="col-md-12">
         <?php
         
         $kelas=$detailanak->lastname;
         if($kelas=='TKIT'){
            $this->load->view('contents/template_report/tk');
         }
         elseif($kelas=='SDIT'){
            $this->load->view('contents/template_report/sd');
         }elseif($kelas=='SMPIT'){
            $this->load->view('contents/template_report/smp');
         }
         
         
         ?>
             </div> 
         </div>
  <!--div class="box">
    <div class="box-header">
      <h2>Laporan Nilai Bulanan</h2>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-b dt">
        <thead>
          <tr>
            <th  style="width:20%">Modul</th>
            <th  style="width:25%">Waktu Akses Terakhir</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($accesscourse as $ac){?>
          <tr>
            <td  style="width:20%"><?php echo $ac->name_course?></td>
            <td  style="width:25%"><?php echo date('d/M/Y H:i:s',$ac->timeaccess)?></td>
          </tr>
            <?php }?>
        </tbody>
      </table>
    </div>
  </div-->
    <?php //echo $api_tes->api_name;?>
    
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