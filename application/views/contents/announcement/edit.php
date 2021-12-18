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
				   <?php echo form_textarea($nm_f,(isset($val[$nm_f]) ? $val[$nm_f] : ''),'id="contents"') ?>
			   </div>
		   </div>
                   </div>
		   <div class="row">
		   <div class="form-group">
			  
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">File Lampiran</label>
				   </div><div class="col-sm-9">
                                        <input type="file" name="filez" >
                                        <?php 
                                            if(!empty($val['id'])){
                                                echo "*) Kosongkan Jika Tidak Ingin Diubah";
                                            }
                                        ?>
			   </div>
            
		   </div>
                   </div>
           
            <?php 
              if(!empty($val['id']) && !empty($val['filez'])){  
             ?>
		   <div class="row">
		   <div class="form-group">
			  
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Preview Lampiran</label>
                           </div><div class="col-sm-9">
                                       <a href="<?php echo base_url()."files/pengumuman/".$val['filez']?>" target="_blank"><i class="fa fa-file"></i></a>
			   </div>
            
		   </div>
                   </div>
           <?php }?>
           
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
<script language="JavaScript" src="<?php echo base_url(); ?>assets/ckeditor_z/ckeditor.js" type="text/javascript"></script>

<script>
    CKEDITOR.replace('contents', {
    skin: 'kama',
    filebrowserBrowseUrl: '<?php echo base_url() ?>assets/ckfinder_z/ckfinder.html',
    filebrowserImageBrowseUrl: '<?php echo base_url() ?>assets/ckfinder_z/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: '<?php echo base_url() ?>assets/ckfinder_z/ckfinder.html?Type=Flash',
    filebrowserUploadUrl: '<?php echo base_url() ?>assets/ckfinder_z/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '<?php echo base_url() ?>assets/ckfinder_z/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: '<?php echo base_url() ?>assets/ckfinder_z/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    toolbar: [
      ['Source', '-', 'Preview', 'Templates', 'Cut', 'Copy', 'Paste'],
      ['Bold', 'Italic', 'Underline', 'Strike', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'NumberedList', 'BulletedList', 'Subscript', 'Superscript', '-'],
      '/',
      ['Link', 'Unlink', '-', 'Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar'],
      ['TextColor', 'BGColor', '-', 'Font', 'FontSize', 'PasteFromWord']
    ]
  });
  $('#savepreview').click(function() {

    /* Before submit */
    for (instance in CKEDITOR.instances) {
      CKEDITOR.instances[instance].updateElement();
    }

    var form = $('#formdata')[0];
    var formData = new FormData(form);
    $.ajax({
      type: "POST",
      data: formData,
      cache: false,
      processData: false,
      contentType: false,
      url: "<?php echo base_url() ?>backoffice/article/submit_preview",
      success: function(data) {
        var win = window.open('<?php echo base_url() ?>article/view_tmp/' + data, '_blank');
        $('#id_tmp').val(data);
        if (win) {
          //Browser has allowed it to be opened
          win.focus();
        } else {
          //Browser has blocked it
          alert('Please allow popups for this website');
        }
      }
    });
    return false;
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