<?php error_reporting(E_ALL ^ E_NOTICE);
if(isset($list)){	
	$val=$list->row_array();
}
?>
<?php
$cekdup=($type=='New' ? ',ajax[ajaxcekcode]' : '');
?>

    
<div class="row">
	<ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="<?php echo base_url($this->utama)?>"><?php echo ucfirst($this->title)?></a>
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
			
		   <div class="row">
		   <div class="form-group">
			   
			   <?php $nm_f="title";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Judul</label>
				   </div><div class="col-sm-9">
				   <input type="text" name="<?php echo $nm_f?>"  id="<?php echo $nm_f?>" value="<?php echo $a= (isset($val[$nm_f]) ? $val[$nm_f] : '') ?>" class="col-sm-4">
			   </div>
		   </div>
                   </div>
		   <div class="row">
                    <div class="form-group">
			   
			   <?php $nm_f="content";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Isi Pengumuman</label>
				   </div><div class="col-sm-9">
				   <?php echo form_textarea($nm_f,(isset($val[$nm_f]) ? $val[$nm_f] : ''),'') ?>
			   </div>
		   </div>
                   </div>
		   <div class="row">
		   <div class="form-group">
			  
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">File Lampiran</label>
				   </div><div class="col-sm-9">
                                       <div class="form-file">
                                        <input type="file" name="filez"  onchange="loadFile(event)">
                                        <button class="btn white">Select file ...</button>
                                        </div>
			   </div>
            
		   </div>
                   </div>
           
		   <div class="row">
		   <!--div class="form-group">
			   
			   <?php $nm_f="code";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Code</label>
				   </div><div class="col-sm-9">
				   <input type="text" name="<?php echo $nm_f?>"  id="<?php echo $nm_f?>_master_brand" value="<?php echo $a= (isset($val[$nm_f]) ? $val[$nm_f] : '') ?>" class="col-sm-4 validate[required<?php echo $cekdup?>]">
			   </div>
		   </div-->
		   <div class="form-group">
			   
			   <?php $nm_f="status";?> 
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Status</label>
				   </div><div class="col-sm-9">
                                   <?php echo form_dropdown($nm_f,array('Aktif'=>'Aktif','NonAktif'=>'NonAktif'),(isset($val[$nm_f]) ? $val[$nm_f] : ''),'class="select2"'); ?>
			   </div>
		   </div>
                   </div>
		   <!--div class="row">
		   <div class="form-group">
			   
			   <?php $nm_f="target";?> 
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Target</label>
				   </div><div class="col-sm-9">
                                   <?php echo form_dropdown($nm_f,array('all'=>'All','divisi'=>'Divisi','grup'=>'Group','person'=>'Perorangan'),(isset($val[$nm_f]) ? $val[$nm_f] : ''),'class="select2" onchange="gantitarget()" id="'.$nm_f.'"'); ?>
			   </div>
		   </div>
                   </div>
		   <div class="row">
		   <div class="form-group" id="divdivisi">
			   
			   <?php $nm_f="divisi";?> 
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Divisi</label>
				   </div><div class="col-sm-9">
                                   <?php echo form_dropdown($nm_f,$opt_divisi,(isset($val[$nm_f]) ? $val[$nm_f] : ''),'class="select2" onchange="gantidivisi()" id="'.$nm_f.'"'); ?>
			   </div>
		   </div>
                   </div>
		   <div class="row">
		   <div class="form-group" id="divgrup">
			   
			   <?php $nm_f="grup";?> 
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Group</label>
				   </div><div class="col-sm-9" id="load_grup">
                                   <?php echo form_dropdown($nm_f,$opt_grup,(isset($val[$nm_f]) ? $val[$nm_f] : ''),'class="select2" onchange="gantigrup()" id="'.$nm_f.'"'); ?>
			   </div>
		   </div>
                   </div>
		   <div class="row">
		   <div class="form-group" id="divsales">
			   
			   <?php $nm_f="marketing";?> 
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Marketing</label>
				   </div><div class="col-sm-9" id="load_marketing">
                                   <?php echo form_dropdown($nm_f,$opt_marketing,(isset($val[$nm_f]) ? $val[$nm_f] : ''),'class="select2" id="'.$nm_f.'"'); ?>
			   </div>
		   </div>
                   </div-->
		   <div class="row">
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
        $("#form").validate({
            submitHandler: function(form) {
    form.submit();
  },
           ignore: [],      
            rules: {
                'title': {required:true},
                'tag': {required:true}
            }
            , 
            messages: {
                'title': 'Wajib diisi',
                'tag': 'Wajib diisi'
            }
            });
    });
</script>
<script language="JavaScript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js" type="text/javascript"></script>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea',
    menubar:false,
    statusbar: false,init_instance_callback : function(editor) {
    var freeTiny = document.querySelector('.tox .tox-notification--in');
   freeTiny.style.display = 'none';
  }});</script>
<script>
    
    var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
  
CKEDITOR.replace( 'contents',
{
toolbar :
[
['Source','-','Copy','Paste','Bold','Italic','Underline','Strike','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','Subscript','Superscript','PasteFromWord']
]
});
$(document).ready(function(e){
    gantitarget();
});
function gantitarget(){
    var t=$('#target').val();
    if(t=='all'){
        $('#divdivisi').hide();
        $('#divgrup').hide();
        $('#divsales').hide();
        
        $('#divisi').val('').trigger('change');
        $('#grup').val('').trigger('change');
        $('#marketing').val('').trigger('change');
    }else if(t=='divisi'){
        $('#divdivisi').show();
        $('#divgrup').hide();
        $('#divsales').hide();
        
        //$('#divisi').val('').trigger('change');
        $('#grup').val('').trigger('change');
        $('#marketing').val('').trigger('change');
    }else if(t=='grup'){
        $('#divdivisi').show();
        $('#divgrup').show();
        $('#divsales').hide();
        
        //$('#divisi').val('').trigger('change');
        //$('#grup').val('').trigger('change');
        $('#marketing').val('').trigger('change');
    }else{
        $('#divdivisi').show();
        $('#divgrup').show();
        $('#divsales').show();
        
        //$('#divisi').val('').trigger('change');
        //$('#grup').val('').trigger('change');
        //$('#marketing').val('').trigger('change');
    }
}
function gantidivisi(){
    
        var d=$('#divisi').val();
        var g=$('#grup').val();
        $('#load_grup').load('<?php echo base_url()?>announcements/loadgrup',{d:d});
        $('#load_marketing').load('<?php echo base_url()?>announcements/loadmarketing',{d:d,g:g});
}
function gantigrup(){
    
        var d=$('#divisi').val();
        var g=$('#grup').val();
        $('#load_marketing').load('<?php echo base_url()?>announcements/loadmarketing',{d:d,g:g});
}

</script>