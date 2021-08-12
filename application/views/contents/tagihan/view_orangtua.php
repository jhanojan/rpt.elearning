<?php
         $child=$this->db->query("SELECT * FROM sv_parent_child WHERE parent='".webmastermarketing()."'");
         $daftaranak[]='-Siswa-';
         //print_mz($child->result_array());
          foreach($child->result_array() as $chk){
              $anaks=GetAll('master_siswa',array('id'=>'where/'.$chk['child']))->row_array();
              $daftaranak[$anaks['no_sisda']]=$anaks['nama_siswa'];
          }
?>
<div class="row box">
<div class="well">
    <span style="font-size:24px; margin-bottom:5%; margin-top:5%;"><?php echo $this->title;?> Siswa</span>
</div>
<div class="col-md-12">
	
	<form enctype="multipart/form-data" method="get" action="<?php echo base_url().$this->utama ?>/orangtua">
            <div class="col-sm-12 col-md-12" style="margin-top:10px">
                 <div class="row">        
                    <div class="form-group">  
			   <div class="col-sm-3 col-md-3">&nbsp; 
                           </div>
                            <div class="col-sm-6 col-md-6" id="optionjp">
                                <?php echo form_dropdown('anak',$daftaranak,$_GET['anak'],'class="select4"')?>&nbsp; &nbsp; &nbsp;
                            </div><br>
                    </div>
                 </div>
                <div class="row"> 
			   
			   <?php $nm_f="periode";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Bulan Tagihan</label>
				   </div><div class="col-sm-2">
				   <?php echo form_input($nm_f,(get('periode') ? get('periode') : ''),"class='datepicker form-control' id='$nm_f'")?>
			   </div>
		   </div>
                </div>
                            
                           </div>
            
            <div class="col-sm-12 col-md-12"><div class="col-sm-12 col-md-12"><input type="submit" value="Search" class="btn btn-danger" name="search">&nbsp;</div></div>
	<div class="col-sm-12" style="margin-top:10px"></div>
	
	</form>
    

 <?php if($this->session->flashdata('message')){?>
<div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('message') ?>
                        </div>
 <?php }?>

<div class="col-md-12">
    <?php 
    if(!empty($contents)){
        ?>
    <table class="tables" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SISDA</th>
                <th>VA BSM</th>
                <th>VA Mandiri</th>
                <th>Nama</th>
                <th>Periode</th>
                <th>Total</th>
                <th>Status Bayar</th>
                <!---th>Bukti Bayar</th>
                <th>Aksi</th-->
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach($contents as $cts){
            
        $siswa=GetValue('id','master_siswa',array('no_sisda'=>'where/'.$cts['sisda']));
        $caribukti=GetAll('bukti_bayar',array('periode'=>'where/'.$cts['periode'],'siswa'=>'where/'.$siswa))->row_array();
        $see="";
            if(!empty($caribukti['bukti'])){
                $see="<a href='".base_url()."bukti_pembayaran/".$caribukti['bukti']."' target='_blank'>Lihat File</a>";
            }
    ?>
    
            <tr>
                <td><?php echo $cts['sisda']?></td>
                <td><?php echo $cts['va_bsm']?></td>
                <td><?php echo $cts['va_mandiri']?></td>
                <td><?php echo $cts['nama']?></td>
                <td><?php echo $cts['periode']?></td>
                <td><?php echo rupiah($cts['total_diskon'])?></td>
                <td><?php echo $cts['status_bayar']?></td>
                <!--td><?php echo $see?></td>
                <td><a href='<?php echo base_url()."tagihan/gantistatus/".$cts['id']."?col=".$_GET['col']."&val=".$_GET['val']."&periode=".$_GET['periode']."&search=".$_GET['search']?>'>Ubah Status</a></td-->
            </tr>
        <?php }?>
        </tbody>
        
    </table>
        
        <?php
        
        }else{
        if($this->input->get('search')){
            echo 'No Data Found';
        }
    }
    ?>
</div>
</div>

<script>
//setInterval("$('#flex1').flexReload()",50000 );
$(document).ready(function(e){

        $('.select3').css('width','600px').select2();
        $('.select4').css('width','200px').select2();
        <?php if($this->input->get('search')){?>
                $('#searchbutton').click();
        <?php }?>
    $(".datepicker").datepicker( {
        format: "yyyy-mm",
        startView: "months", 
        minViewMode: "months",
        autoclose:true
    });
    $('.tables').DataTable({
        "bFilter": false
    });
})
</script>