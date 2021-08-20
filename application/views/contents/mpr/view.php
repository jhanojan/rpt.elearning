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
      <h2>Laporan Hasil Belajar</h2>
    </div>
  </div>
<div class="row">
    
        <div class="input-group mb-3">
    
<?php $nm_f="periode";?>
 <?php echo form_input($nm_f,(isset($val['periode']) ? $val['periode'] : ''),"class='datepicker col-md-9' id='$nm_f' required readonly='readonly' placeholder='Periode Laporan' aria-label='Periode Laporan' aria-describedby='basic-addon2'")?>
 
  <div class="input-group-append">
      <button class="btn btn-primary" onclick="searchoverview()" type="button"><i class="fa fa-search"></i>Search</button>
  </div>
</div>
    <div id="overview">
        
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
<script>
    $(document).ready(function(e){
        
    $(".datepicker").datepicker( {
        format: "yyyy-mm",
        startView: "months", 
        minViewMode: "months",
        autoclose:true
    });
    });
    function searchoverview(){
        var periode=$('#periode').val();
        $('#overview').empty();
        $('#overview').append('<img src="<?php echo base_url()?>assets/img/load.gif" style="max-width:50px;">');
        $('#overview').load('<?php echo base_url()?>mpr/overview',{p:periode});
    }

</script>