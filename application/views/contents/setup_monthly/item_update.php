<?php
$opt_item['']='-Item-';
$lengkap=$this->db->query("SELECT * FROM sv_setup_itempay WHERE id='".$item_."'")->row_array();
//lastq();
$q="SELECT * FROM sv_setup_itempay WHERE ta='".$lengkap['ta']."' AND (jenjang='all' OR jenjang='".$lengkap['jenjang']."') AND (tingkat='all' OR tingkat='".$lengkap['tingkat']."')";
$item=$this->db->query($q)->result_array();
//lastq();
foreach($item as $i){
    
$opt_item[$i['id']]=$i['title'];
    
}

?>

<div class="col-md-12">
<div class="input-produk form-group" id="input-produk-<?php echo $id ?>" style="border-bottom:1px #0044cc dashed;margin-bottom:20px;">
                   <div class="form-group">
			   
			   <?php $nm_f="item";?>
			   <div class="col-sm-2">
                               <?php echo form_dropdown($nm_f.'[]',$opt_item,$item_,'class="select2" onchange="gantiitem_'.$id.'()" id="'.$nm_f.'-'.$id.'"');
                //lastq();?>
				   </div><div class="col-sm-5">
                                <?php echo form_input('price[]',uang(GetValue('price','setup_itempay',array('id'=>'where/'.$item_))),'class="hargasatuan currency" style="background:white!important;border:0px;" id="item-price-'.$id.'" readonly')?>
			   </div>
		   </div>
		   
    <label style="cursor:pointer;float:right;" onclick="deletebaru(<?php echo $id ?>,<?php echo $val['id'] ?>)">(Hapus)</label>
                </div>
</div>
<script>
                  $(document).ready(function(e){
                           $('#item-<?php echo $id ?>').css('max-width','100%').select2({});
                           $('.date-picker').datepicker({
                               format:'yyyy-mm-dd'
                           });
                            $('.currency').maskMoney({thousands:".",decimal:",",precision:0});
                 });
       function gantiitem_<?php echo $id?>(){
        
        var pn=$('#item-<?php echo $id?>').val();
        $.post('<?php echo base_url()?>kelas_siswa/ambil_item',{v:pn},function(e){
            balik = JSON.parse(e);
            
            document.getElementById("item-price-<?php echo $id?>").value = balik.price;
            
            hitungtotal();
        });
        }
              </script> 