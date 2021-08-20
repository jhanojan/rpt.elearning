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
				
				<?php echo form_hidden('redirect',isset($_GET['redirect']) ? $_GET['redirect'] : '')?>
				<?php echo form_hidden('formid',isset($_GET['formid']) ? $_GET['formid'] : '')?>
                  <div class="row">
                   <div class="form-group">
			   
			   <?php $nm_f="periode";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Periode</label>
                           </div>
                           <div class="col-sm-9">
				<?php echo form_input($nm_f,isset($val[$nm_f]) ? $val[$nm_f] : '',"id='$nm_f' class='datepicker' readonly='readonly'")?>
			   </div>
		   </div>
                  </div>
                  <div class="row">
                   <div class="form-group">
			   
			   <?php $nm_f="sisda";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">No SISDA</label>
                           </div>
                           <div class="col-sm-9">
				<?php echo form_input($nm_f,isset($val[$nm_f]) ? $val[$nm_f] : '',"id='$nm_f'")?>
			   </div>
		   </div>
                  </div>
                  <!--div class="row">
                   <div class="form-group">
			   
			   <?php $nm_f="nama";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Nama</label>
                           </div>
                           <div class="col-sm-9">
				<?php echo form_input($nm_f,isset($val[$nm_f]) ? $val[$nm_f] : '',"id='$nm_f'")?>
			   </div>
		   </div>
                  </div-->
                  <div class="row">
                   <div class="form-group">
			   <?php $nm_f="spp";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">SPP</label>
                           </div>
                           <div class="col-sm-9">
				<?php echo form_input($nm_f,isset($val[$nm_f]) ? $val[$nm_f] : '0',"id='$nm_f' clas='duit' oninput='hitungsemua()'")?>
			   </div>
		   </div>
                  </div>
                  <div class="row">
                   <div class="form-group">
			   <?php $nm_f="ks";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">KS</label>
                           </div>
                           <div class="col-sm-9">
				<?php echo form_input($nm_f,isset($val[$nm_f]) ? $val[$nm_f] : '0',"id='$nm_f' clas='duit' oninput='hitungsemua()'")?>
			   </div>
		   </div>
                  </div>
                  <div class="row">
                   <div class="form-group">
			   <?php $nm_f="catering";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Catering</label>
                           </div>
                           <div class="col-sm-9">
				<?php echo form_input($nm_f,isset($val[$nm_f]) ? $val[$nm_f] : '0',"id='$nm_f' clas='duit' oninput='hitungsemua()'")?>
			   </div>
		   </div>
                  </div>
                  <div class="row">
                   <div class="form-group">
			   <?php $nm_f="antar_jemput";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Antar Jemput</label>
                           </div>
                           <div class="col-sm-9">
				<?php echo form_input($nm_f,isset($val[$nm_f]) ? $val[$nm_f] : '0',"id='$nm_f' clas='duit' oninput='hitungsemua()'")?>
			   </div>
		   </div>
                  </div>
                  <div class="row">
                   <div class="form-group">
			   <?php $nm_f="pmb";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">PMB</label>
                           </div>
                           <div class="col-sm-9">
				<?php echo form_input($nm_f,isset($val[$nm_f]) ? $val[$nm_f] : '0',"id='$nm_f' clas='duit' oninput='hitungsemua()'")?>
			   </div>
		   </div>
                  </div>
                  <div class="row">
                   <div class="form-group">
			   <?php $nm_f="ket_pmb";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Keterangan PMB</label>
                           </div>
                           <div class="col-sm-9">
				<?php echo form_textarea($nm_f,isset($val[$nm_f]) ? $val[$nm_f] : '',"id='$nm_f' ")?>
			   </div>
		   </div>
                  </div>
                  <div class="row">
                   <div class="form-group">
			   <?php $nm_f="lainlain";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Lain Lain</label>
                           </div>
                           <div class="col-sm-9">
				<?php echo form_input($nm_f,isset($val[$nm_f]) ? $val[$nm_f] : '0',"id='$nm_f' class='duit' oninput='hitungsemua()'")?>
			   </div>
		   </div>
                  </div>
                  <div class="row">
                   <div class="form-group">
			   <?php $nm_f="ket_lainlain";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Keterangan Lain-lain</label>
                           </div>
                           <div class="col-sm-9">
				<?php echo form_textarea($nm_f,isset($val[$nm_f]) ? $val[$nm_f] : '',"id='$nm_f' ")?>
			   </div>
		   </div>
                  </div>
                  <div class="row">
                   <div class="form-group">
			   <?php $nm_f="diskon_persen";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Diskon SPP Dalam Persen</label>
                           </div>
                           <div class="col-sm-9">
				<?php echo form_input($nm_f,isset($val[$nm_f]) ? $val[$nm_f] : '0',"id='$nm_f' clas='duit' oninput='hitungsemua()'")?> %
			   </div>
		   </div>
                  </div>
                  <div class="row">
                   <div class="form-group">
			   <?php $nm_f="diskon_val";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Jumlah Diskon SPP</label>
                           </div>
                           <div class="col-sm-9">
				<?php echo form_input($nm_f,isset($val[$nm_f]) ? $val[$nm_f] : '0',"id='$nm_f' clas='duit' readonly='readonly'")?>
			   </div>
		   </div>
                  </div>
                  <div class="row">
                   <div class="form-group">
			   <?php $nm_f="total_diskon";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Total Diskon</label>
                           </div>
                           <div class="col-sm-9">
				<?php echo form_input($nm_f,isset($val[$nm_f]) ? $val[$nm_f] : '0',"id='$nm_f' clas='duit' readonly='readonly'")?>
			   </div>
		   </div>
                  </div>
                  <div class="row">
                   <div class="form-group">
			   <?php $nm_f="total_non_diskon";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Total Non Diskon</label>
                           </div>
                           <div class="col-sm-9">
				<?php echo form_input($nm_f,isset($val[$nm_f]) ? $val[$nm_f] : '0',"id='$nm_f' clas='duit' readonly='readonly'")?>
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
	//$('.duit').mask('9.99');
	//$('#comission').mask('9.99');
$(document).ready(function(e){
    $(".datepicker").datepicker( {
        format: "yyyy-mm",
        startView: "months", 
        minViewMode: "months",
        autoclose:true
    });
    
    
});
function hitungsemua(){
        var spp = parseInt($('#spp').val());
        var ks = parseInt($('#ks').val());
        var catering = parseInt($('#catering').val());
        var antar_jemput = parseInt($('#antar_jemput').val());
        var pmb = parseInt($('#pmb').val());
        var lainlain = parseInt($('#lainlain').val());
        var dp = parseInt($('#diskon_persen').val());
        var dv = spp*(dp/100);
        
        var sppdihitung=spp-dv;
        
        var tnd=spp+ks+catering+antar_jemput+pmb+lainlain;
        var td=sppdihitung+ks+catering+antar_jemput+pmb+lainlain;
        
        $('#diskon_val').val(dv);
        $('#total_non_diskon').val(tnd);
        $('#total_diskon').val(td);
        
        
    }
</script>