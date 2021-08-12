<div class="box col-md-12">
<div class=" box-inner well well-lg">
    <span style="font-size:24px; margin-bottom:5%; margin-top:5%;"><?php echo $this->title;?></span>
</div>
</div>
<div class="box col-md-12">
<div class=" box-inner well well-lg">
    <form enctype="multipart/form-data" method="get" action="<?php echo base_url().$this->utama ?>">
            <div class="col-sm-12 col-md-12" style="margin-top:10px">
                 
                <div class="row"> 
                    <div class="form-group">
			   <div class="col-sm-3 col-md-3">&nbsp; 
                           </div>
                           <div class="col-sm-6 col-md-2">
                                <?php echo form_input('sisda',get('sisda'),'class="form-control" id="searchb" placeholder="-SISDA-" ')?>&nbsp; &nbsp; &nbsp;
                           </div>
                    </div>
                </div>
                <div class="row"> 
			   
			   <?php $nm_f="periode";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Bulan Tagihan</label>
				   </div><div class="col-sm-2">
				   <?php echo form_input($nm_f,(get('periode') ? get('periode') : ''),"class='datepicker form-control' id='$nm_f' autocomplete='off'")?>
			   </div>
		   </div>
                </div>
            
            <div class="col-sm-12 col-md-12"><div class="col-sm-12 col-md-12"><input type="submit" value="Search" class="btn btn-danger" name="search">&nbsp;</div></div>
	<div class="col-sm-12" style="margin-top:10px"></div>
	
	</form>
</div>
</div>
<?php if(!empty($this->session->flashdata("message"))){?>
<div class="alert alert-success" role="alert">
  <?php echo $this->session->flashdata("message")?>
</div>
<?php }?>

<?php
 echo $js_grid; ?>
<!--input type="button" value="Tambah" onclick="window.location = '<?//= base_url() ?>index.php/ms_con/add'"/-->
<script type="text/javascript">
$(document).ready(function(e){
     $(".datepicker").datepicker( {
        format: "yyyy-mm",
        startView: "months", 
        minViewMode: "months",
        autoclose:true
    });
});
var _base_url = '<?php echo  base_url() ?>';
var controller = '<?php echo $this->utama?>/';
function del(id) { 
  i = confirm('Hapus : ' + id + ' ?');
  if (i) {
    window.location = _base_url + controller + 'delete/' + id;
  }
}
//$('.flex1').flexigrid({height:'auto',width:'auto',striped:false});

function edit(id) {
  window.location = _base_url + controller + 'input/' + id;
}

function detail(id) {
  window.location = _base_url + controller + 'form/' + id;
}
function btn(com,grid)
{
    if (com == 'buat tagihan manual' ) {
		window.location = _base_url + controller + 'form/';
    }
    if (com == 'upload tagihan' ) {
		window.location = _base_url + controller + 'upload/';
    }
    if (com == 'upload status pembayaran' ) {
		window.location = _base_url + controller + 'update/';
    }
	
	
    if (com == 'select' )
    {
		$('.bDiv tbody tr',grid).addClass('trSelected');
    }

    if (com == 'deselect')
    {
		$('.bDiv tbody tr',grid).removeClass('trSelected');
    }
	if(com=='edit tagihan'){
		if($('.trSelected',grid).length==1){ 
    			var abbr = [];
    				$('.hDiv th', flex).each( function(index){
       			 abbr[index] = $(this).attr('abbr');
  				  });
		//var items = $('.trSelected',grid);
 		 window.location = _base_url + controller + 'form/' + $('td:nth-child('+ (1+$.inArray('idnya',abbr)) +')>div', '.trSelected',grid).text();
			} else {
				return false;
			} 
	}
	if (com=='delete')
    {
           if($('.trSelected',grid).length>0){
			   if(confirm('Delete ' + $('.trSelected',grid).length + ' items?')){
		        var flex = $(grid).closest('.flexigrid');
    			var abbr = [];
    				$('.hDiv th', flex).each( function(index){
       			 abbr[index] = $(this).attr('abbr');
  				  });
    	
   				 $('.res').html('');//div.res - area for display result
		            var items = $('.trSelected',grid);
		            var itemlist ='';
		        	for(i=0;i<items.length;i++){
					//itemlist+=items[i].id+",";
					//var iteming=$('td:"no_reg" >div', items[i]).text();
					itemlist+=$('td:nth-child('+ (1+$.inArray('idnya',abbr)) +')>div', items[i]).text()+",";
					}
					  	
					$.ajax({
					   type: "POST",
					   url: "<?php echo site_url($this->utama."/deletec");?>",
					   data: "items="+itemlist,
					   success: function(data){
					   	$('#flex1').flexReload();
						//alert(data);
						alert('Sukses!');
					   }
					});
				}
			} else {
				return false;
			} 
      }    
	if (com=='ubah status pembayaran')
    {
           if($('.trSelected',grid).length>0){
			   if(confirm('Ubah Status ' + $('.trSelected',grid).length + ' items?')){
		        var flex = $(grid).closest('.flexigrid');
    			var abbr = [];
    				$('.hDiv th', flex).each( function(index){
       			 abbr[index] = $(this).attr('abbr');
  				  });
    	
   				 $('.res').html('');//div.res - area for display result
		            var items = $('.trSelected',grid);
		            var itemlist ='';
		        	for(i=0;i<items.length;i++){
					//itemlist+=items[i].id+",";
					//var iteming=$('td:"no_reg" >div', items[i]).text();
					itemlist+=$('td:nth-child('+ (1+$.inArray('idnya',abbr)) +')>div', items[i]).text()+",";
					}
					  	
					$.ajax({
					   type: "POST",
					   url: "<?php echo site_url($this->utama."/gantistatus");?>",
					   data: "items="+itemlist,
					   success: function(data){
					   	$('#flex1').flexReload();
						//alert(data);
						alert('Sukses!');
					   }
					});
				}
			} else {
				return false;
			} 
      }         
}
//setInterval("$('#flex1').flexReload()",50000 );
</script>
<div class="box col-md-12">
    <div class="layout-grid">
	<table id="flex1" style="display:none; "></table>
    </div>
</div>