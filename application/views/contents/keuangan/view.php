
		   <div class="row box">
<div class="well">
    <span style="font-size:24px; margin-bottom:5%; margin-top:5%;">History <?php echo $this->title;?></span>
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
    if(!empty($contents)){
        ?>
    <table class="tables" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Periode</th>
                <th>SISDA</th>
                <th>Nama</th>
                <th>SPP</th>
                <th>KS</th>
                <th>Catering</th>
                <th>Antar Jemput</th>
                <th>Lain-lain</th>
                <th>Total</th>
                <th>Status Bayar</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach($contents as $cts){
    ?>
    
            <tr>
                <td><?php echo $cts['periode']?></td>
                <td><?php echo $cts['sisda']?></td>
                <td><?php echo $cts['nama']?></td>
                <td><?php echo Rupiah($cts['spp'])?></td>
                <td><?php echo Rupiah($cts['ks'])?></td>
                <td><?php echo Rupiah($cts['catering'])?></td>
                <td><?php echo Rupiah($cts['antarjemput'])?></td>
                <td><?php echo Rupiah($cts['lainlain'])?></td>
                <td><?php echo Rupiah($cts['total_non_diskon'])?></td>
                <td><?php echo $cts['status_bayar']?></td>
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
        "bFilter": true
    });
})
</script>