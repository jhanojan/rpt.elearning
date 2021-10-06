<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="<?php echo base_url()?>assets/flatkit/libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
  <script src="<?php echo base_url('assets')?>/ace/js/date-time/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url('assets')?>/ace/js/date-time/bootstrap-timepicker.js"></script>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/flatkit/assets/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url()?>assets/flatkit/assets/styles/app.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url('assets')?>/ace/css/datepicker.css" />

<?php error_reporting(E_ALL ^ E_NOTICE);
if(isset($list)){	
	
}
?>

    
<div class="padding">
<div class="row box">
	
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2>Upload Rekap MPR</h2>

        
    </div>
    	<div class="box-content">
       <form id="form" method="post" enctype="multipart/form-data" action="<?php echo base_url($this->utama)?>/upload_mpr_submit" class="form-horizontal formular" role="form">
		   
		   <?php echo form_hidden('id',isset($val['id']) ? $val['id'] : '')?>
				
				<?php echo form_hidden('redirect',isset($_GET['redirect']) ? $_GET['redirect'] : '')?>
				<?php echo form_hidden('formid',isset($_GET['formid']) ? $_GET['formid'] : '')?>
                  <div class="row">
                      
		    <div class="form-group">
			   
			   <?php $nm_f="periode";
                                 $opt_periode=GetOptAll('sv_ref_periode','-Periode-',array('status'=>'where/1'),'ta','id','title');?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Periode Laporan</label>
				   </div><div class="col-sm-9">
				   <?php echo form_dropdown($nm_f,$opt_periode,(isset($val['periode']) ? $val['periode'] : ''),"class='col-md-9 col-sm-12 form-control' id='$nm_f' required ");
         ?>
			   </div>
		   </div>
                  </div>
		   <div class="row">
		    <div class="form-group">
			   
			   <?php $nm_f="tingkat";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Tingkat</label>
				   </div><div class="col-sm-9">
				   <?php echo form_dropdown($nm_f,array('tk'=>'TK','sd'=>'SD','smp'=>'SMP'),(isset($val['ta']) ? $val['ta'] : '')," id='$nm_f' required")?>
			   </div>
		   </div>
                   </div>
		   <div class="row">
		   <div class="form-group">
			  
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">File</label>
				   </div><div class="col-sm-9">
                                       <div class="form-file">
                                        <input type="file" name="filez">
                                        <button class="btn white">Select file ...</button>
                                        </div>
			   </div>
            
		   </div>
                   </div>
		   <div class="row">
		   <div class="form-group">
			  
			   <div class="col-sm-12">
                               <a href="<?php echo base_url()?>assets/template/mpr/tk.xlsx" class="btn btn-primary">Download Template Rekap TK</a>&nbsp;
                               <a href="<?php echo base_url()?>assets/template/mpr/sd.xlsx" class="btn btn-primary">Download Template Rekap SD</a>&nbsp;
                               <a href="<?php echo base_url()?>assets/template/mpr/smp.xlsx" class="btn btn-primary">Download Template Rekap SMP</a>&nbsp;
			   </div>
                           
			   <div class="col-sm-12">
			   </div>
			   <div class="col-sm-12">
			   </div>
		   </div>
                   </div>
           
    		<div class="form-group">
            <button type="submit" class="btn pull-right">Submit</button>
            
             </div>
			 </form>
    	</div>
    </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function(e){
        
    $(".datepicker").datepicker( {
        format: "yyyy-mm",
        startView: "months", 
        minViewMode: "months",
        autoclose:true
    });
    })

</script>