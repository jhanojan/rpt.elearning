
		   <div class="row box">
<div class="well">
    <span style="font-size:24px; margin-bottom:5%; margin-top:5%;">Daftar Bukti Bayar</span>
</div>
<div class="col-md-12">
	
	<!--form enctype="multipart/form-data" method="get" action="<?php echo base_url().$this->utama ?>">
            <div class="col-sm-12 col-md-12" style="margin-top:10px">
                 <div class="row">        
                    <div class="form-group">  
			   <div class="col-sm-3 col-md-3">&nbsp; 
                           </div>
                            <div class="col-sm-6 col-md-6" id="optionjp">
                                <?php echo form_dropdown('col',array(''=>'-Kolom-','sisda'=>'Sisda','va_bsm'=>'VA BSM','va_mandiri'=>'VA Mandiri'),$_GET['col'],'class="select4"')?>&nbsp; &nbsp; &nbsp;
                            </div><br>
                    </div>
                 </div>
                <div class="row"> 
                    <div class="form-group">
			   <div class="col-sm-3 col-md-3">&nbsp; 
                           </div>
                           <div class="col-sm-6 col-md-2">
                                <?php echo form_input('val',$_GET['val'],'class="form-control" id="searchb" placeholder="-Search Value-" ')?>&nbsp; &nbsp; &nbsp;
                           </div>
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
	
	</form-->
    

 <?php if($this->session->flashdata('message')){?>
<div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('message') ?>
                        </div>
 <?php }?>

<div class="col-md-12">
    <?php 
//    if(!empty($contents)){
        ?>
    <table class="tables" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SISWA</th>
                <th>KETERANGAN</th>
                <th>FILE</th>
                <th>KONFIRMASI SEKOLAH</th> 
                <th>FEEDBACK</th> 
                <th>AKSI</th> 
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach($contents as $cts){
            $datasiswa=GetAll('master_siswa',array('id'=>'where/'.$cts['siswa']))->row_array();
            $see="";
            if(!empty($cts['bukti'])){
                $see="<a href='".base_url()."bukti_pembayaran/".$cts['bukti']."' target='_blank'>Lihat File</a>";
            }
            $conf=GetValue('status_bayar','tagihan_siswa',array('sisda'=>'where/'.$datasiswa['no_sisda'],'periode'=>'where/'.$cts['periode']));
            if($conf=='BAYAR')$confirm="<span style='color:green'>SUDAH TERKONFIRMASI</span>";
            else $confirm="<span style='color:red'>BELUM TERKONFIRMASI</span>";
    ?>
    
            <tr>
                <td><?php echo $datasiswa['nama_siswa']?></td>
                <td><?php echo $cts['keterangan']?></td>
                <td><?php echo $see;?></td>
                <td><?php echo (!empty($cts['status']) ? $cts['status'] : "Menunggu Konfirmasi" );?></td>
                <td><?php echo $cts['feedback'];?></td>
                <!--
                <td><?php //echo $confirm?></td>
                -->
                <td>
                    <?php if(webmastermarketing()==$cts['created_by']){?>
                    <a href='<?php echo base_url()."bukti_bayar/delete/".$cts['id']?>'>Hapus</a><?php }?>
                    <?php 
                if($this->session->userdata("webmaster_grup")!=3){
                    ?>
                    
                    <a href='<?php echo base_url()."bukti_bayar/updatestatus/accepted/".$cts['id']?>'>Accept</a> || 
                    <a href='<?php echo base_url()."bukti_bayar/updatestatus/rejected/".$cts['id']?>'>Reject</a>
                    <?php 
                }
                ?>
                </td>
            </tr>
        <?php }?>
        </tbody>
        
    </table>
        
        <?php
        
//        }else{
//            echo '<h5>Belum Ada Data Bukti Pembayaran</h5>';
//     }
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