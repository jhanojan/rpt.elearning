<?php error_reporting(E_ALL ^ E_NOTICE);
if(isset($list)){	
	$val=$list->row_array();
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
        <h2><i class="<?php echo GetValue('icon','sv_menu',array('filez'=>'where/'.$this->utama))?>"></i> <?php echo $this->title;?></h2>

        
    </div>
    	<div class="box-content">
			<form id="form" method="post" enctype="multipart/form-data" action="<?php echo base_url($this->utama)?>/submit" class="form-horizontal formular" role="form">
				<?php echo form_hidden('id',isset($val['id']) ? $val['id'] : '')?>
		   
			
		   
		   <div class="form-group">
			   
			   <?php $nm_f="coa";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Akun</label>
				   </div><div class="col-sm-9">
				   <?php echo form_dropdown($nm_f,$opt_coa, (isset($val[$nm_f]) ? $val[$nm_f] : ''),"class='chosen-select'")?>
			   </div>
		   </div>
		   <div class="form-group">
			   <?php $nm_f="title";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>"><?php echo ucfirst($nm_f)?></label>
				   </div><div class="col-sm-9">
				   <input type="text" name="<?php echo $nm_f?>"  id="<?php echo $nm_f?>" value="<?php echo $a= (isset($val[$nm_f]) ? $val[$nm_f] : '') ?>" class="col-sm-4 validate[required]">
			   </div>
		   </div>
		   <div class="form-group">
			   
			   <?php $nm_f="transaksi";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Transaksi</label>
				   </div><div class="col-sm-9">
				   <?php echo form_dropdown($nm_f,array('debit'=>'DEBIT','kredit'=>'KREDIT'), (isset($val[$nm_f]) ? $val[$nm_f] : ''),"class='chosen-select'")?>
			   </div>
		   </div>
		   <div class="form-group">
			   
			   <?php $nm_f="type";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Type</label>
				   </div><div class="col-sm-9">
				   <?php echo form_dropdown($nm_f,array('profit'=>'PROFIT','loss'=>'LOSS'), (isset($val[$nm_f]) ? $val[$nm_f] : ''),"class='chosen-select'")?>
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