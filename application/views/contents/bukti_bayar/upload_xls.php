<?php error_reporting(E_ALL ^ E_NOTICE);
if(isset($list)){	
	
}

         $this->mdlfo=$this->load->database('mdb',TRUE);
         $child=$this->db->query("SELECT * FROM sv_parent_child WHERE parent='".webmastermarketing()."'");
         //$detailanak=$this->mdlfo->query("SELECT id,firstname,lastname FROM mdl_user WHERE id='".$this->session->userdata('chosen_kid')."'")->row_array();
         $opt_kid['']='-Siswa-';
         foreach($child->result_array() as $chk){
             //$detailanak=$this->mdlfo->query("SELECT id,firstname,lastname FROM mdl_user WHERE id='".$chk['child']."'")->row();
             $detailanak=$this->db->query("SELECT id,no_sisda,nama_siswa FROM sv_master_siswa WHERE id='".$chk['child']."'")->row();
             $opt_kid[$detailanak->id]= $detailanak->nama_siswa;
         }
?>

    
<div class="row box">
	<ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="<?php echo base_url($this->utama)?>"><?php echo ucfirst($this->utama)?></a>
        </li>
        <li>
            <a href="#"><?php echo $type?></a>
        </li>
    </ul>
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2>Upload Bukti Pembayaran</h2>

        
    </div>
    	<div class="box-content">
       <form id="form" method="post" enctype="multipart/form-data" action="<?php echo base_url($this->utama)?>/upload_submit" class="form-horizontal formular" role="form">
		   
		   <?php echo form_hidden('id',isset($val['id']) ? $val['id'] : '')?>
				
				<?php echo form_hidden('redirect',isset($_GET['redirect']) ? $_GET['redirect'] : '')?>
				<?php echo form_hidden('formid',isset($_GET['formid']) ? $_GET['formid'] : '')?>
			<div class="row">
		    <div class="form-group">
			   
			   <?php $nm_f="siswa";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Siswa</label>
				   </div><div class="col-sm-9">
				   <?php echo form_dropdown($nm_f,$opt_kid,$this->session->userdata('chosen_kid'),"class='form-control select2' id='$nm_f' required")?>
			   </div>
		   </div>
                   </div>
		   <div class="row">
		    <div class="form-group">
			   
			   <?php $nm_f="keterangan";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Keterangan</label>
				   </div><div class="col-sm-9">
				   <?php echo form_textarea($nm_f,(isset($val['ta']) ? $val['ta'] : ''),"class='form-control' id='$nm_f' required")?>
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
           
    		<div class="form-group">
            <button type="submit" class="btn pull-right">Submit</button>
            
             </div>
			 </form>
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