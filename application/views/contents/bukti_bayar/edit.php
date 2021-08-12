<?php
if(isset($list)){	
	$val=$list->row_array();
        $siswa=GetAll('master_siswa',array('id'=>'where/'.$val['siswa']))->row();
}
?>
 
    
<div class="row">
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
        <h2> <?php echo $this->title;?></h2>
    </div>
    	<div class="box-content">
       <form id="form" method="post" enctype="multipart/form-data" action="<?php echo base_url($this->utama)?>/submit_bayar" class="form-horizontal formular" role="form">
		   
		   <?php echo form_hidden('id',isset($val['id']) ? $val['id'] : '')?>
				
				<?php echo form_hidden('redirect',isset($_GET['redirect']) ? $_GET['redirect'] : '')?>
				<?php echo form_hidden('formid',isset($_GET['formid']) ? $_GET['formid'] : '')?>
                <div class="row">
                   <div class="form-group"> 
			   
			   <?php $nm_f="tingkat";?>
			   <div class="col-sm-3">
                            <label for="<?php echo $nm_f?>">Siswa</label>
                           </div>
                           <div class="col-sm-9">
                               <span><?php echo $siswa->nama_siswa ?></span>
			   </div>
		   </div>
                </div>
           	<div class="row">
                   <div class="form-group"> 
			   
			   <div class="col-sm-3">
                            <label for="<?php echo $nm_f?>">Keterangan</label>
                           </div>
                           <div class="col-sm-9">
                               <span><?php echo $val['keterangan'] ?></span>
			   </div>
		   </div>
                </div>
           	<div class="row">
                   <div class="form-group"> 
			   
			   <div class="col-sm-3">
                            <label for="<?php echo $nm_f?>">File</label>
                           </div>
                           <div class="col-sm-9">
                               <a href='<?php echo base_url()."bukti_pembayaran/".$val['bukti']?>' target='_blank'><image src="<?php echo base_url().'bukti_pembayaran/'.$val['bukti'] ?>" style="max-width:400px;"></a>
			   </div>
		   </div>
                </div>
           	<div class="row">
                   <div class="form-group"> 
			   
			   <div class="col-sm-3">
                            <label for="<?php echo $nm_f?>">Feedback</label>
                           </div>
                           <div class="col-sm-9">
                               <?php echo form_textarea('feedback',$val['feedback'],"style='height:100px;'")?> 
			   </div>
		   </div>
                </div>
           	<div class="row">
                   <div class="form-group"> 
			   
			   <div class="col-sm-3">
                            <label for="<?php echo $nm_f?>">Status</label>
                           </div>
                           <div class="col-sm-9">
                               <?php echo form_dropdown('status',array('Belum Dikonfirmasi'=>'Belum Dikonfirmasi','Diterima'=>'Diterima','Ditolak'=>'Ditolak'),$val['status'],"")?> 
			   </div>
		   </div>
                </div>
           <h5>Tagihan Siswa</h5>
           <hr>
           <?php
           $tagihan=GetAll('tagihan_siswa',array('sisda'=>'where/'.$siswa->no_sisda))->result();
           foreach($tagihan as $tgh){
           ?>
           	<div class="row">
                   <div class="form-group"> 
			   
			   <div class="col-sm-3">
                            <label for="<?php echo $nm_f?>"><?php echo $tgh->periode ?></label>
                           </div>
			   <div class="col-sm-3">
                            <label for="<?php echo $nm_f?>"><?php echo $tgh->total_diskon ?></label>
                           </div>
                           <div class="col-sm-6">
                               <?php echo form_dropdown("tagihan[".$tgh->id."]",array('Belum Dibayar'=>'Belum Dibayar','Sudah Dibayar'=>'Sudah Dibayar'),$tgh->status_bayar,"")?> 
			   </div>
		   </div>
                </div>
           <?php }?>
    		<div class="form-group">
            <button type="submit" class="btn pull-right">Submit</button>
            
             </div>
			 </form>
    	</div>
    </div>
    </div>
</div>
<script>
	$('#target').mask('9.99');
	$('#comission').mask('9.99');
</script>