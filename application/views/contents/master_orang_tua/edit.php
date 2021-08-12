<?php error_reporting(E_ALL ^ E_NOTICE);
if(isset($list)){	
	$val=$list->row_array();
}
?>

    
<div class="row">
    <div class="card card-body bg-light" data-original-title="">
        <h3><!--i class="<?php echo GetValue('icon','sv_menu',array('filez'=>'where/'.$this->utama))?>"></i--> <?php echo $this->title;?></h3>
    </div>

	<ul class="breadcrumb">
        <li>
            <a href="#"><?php echo GetValue('title','sv_menu',array('id'=>'where/'.GetValue('id_parents','sv_menu',array('filez'=>'where/'.$this->utama))));?></a>
        </li>
        <li>
            <a href="<?php echo base_url($this->utama)?>"><?php echo ucwords(str_replace('_',' ',$this->utama))?></a>
        </li>
        <li>
            <a href="#"><?php echo $type?></a>
        </li>
    </ul>
        
    <div class="box col-md-12">
    <div class="box-inner">
    
    </div>
    	<div class="box-content">
       <form id="form" method="post" enctype="multipart/form-data" action="<?php echo base_url($this->utama)?>/submit" class="form-horizontal formular" role="form">
		   
		   <?php echo form_hidden('id',isset($val['id']) ? $val['id'] : '')?>
				
				<?php echo form_hidden('redirect',isset($_GET['redirect']) ? $_GET['redirect'] : '')?>
				<?php echo form_hidden('formid',isset($_GET['formid']) ? $_GET['formid'] : '')?>
			
                       <h4>Informasi Personal</h4>
                       <hr/>
		   <div class="row">
		   <div class="form-group">
			   
			   <?php $nm_f="nama_lengkap";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>"><?php echo ucwords(str_replace('_',' ',$nm_f))?></label>
				   </div><div class="col-sm-9">
                                       <?php echo form_input($nm_f,(isset($val[$nm_f]) ? $val[$nm_f] : ''),"class='col-sm-4 ' id='$nm_f' required='required'")?>
				  
			   </div>
		   </div>
                   </div>
		   <div class="row">
		   <div class="form-group">
			   
			   <?php $nm_f="tempat_lahir";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>"><?php echo ucwords(str_replace('_',' ',$nm_f))?></label>
				   </div><div class="col-sm-9">
                                       <?php echo form_input($nm_f,(isset($val[$nm_f]) ? $val[$nm_f] : ''),"class='col-sm-4 ' id='$nm_f' required='required'")?>
				  
			   </div>
		   </div>
                   </div>
		   <div class="row">
		   <div class="form-group">
			   
			   <?php $nm_f="tanggal_lahir";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>"><?php echo ucwords(str_replace('_',' ',$nm_f))?></label>
				   </div><div class="col-sm-9">
                                       <?php echo form_input($nm_f,(isset($val[$nm_f]) ? $val[$nm_f] : ''),"class='col-sm-4  date-picker' id='$nm_f' data-date-format='yyyy-mm-dd' required='required'")?>
				  
			   </div>
		   </div>
                   </div>
		   <div class="row">
		   <div class="form-group">
			   
			   <?php $nm_f="jenis_kelamin";?> 
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>"><?php echo ucwords(str_replace('_',' ',$nm_f))?></label>
				   </div><div class="col-sm-9">
                                       <?php echo form_radio($nm_f,'Laki-laki',(isset($val[$nm_f]) ? $val[$nm_f] : ''),"class='' id='$nm_f'")?>&nbsp;&nbsp;<label>Laki-laki</label>&nbsp;
                                           <?php echo form_radio($nm_f,'Perempuan',(isset($val[$nm_f]) ? $val[$nm_f] : ''),"class='' id='$nm_f'")?>&nbsp;&nbsp;<label>Perempuan</label>
				  
			   </div>
		   </div>
                   </div>
		   <div class="row">
		   <div class="form-group">
			   
			   <?php $nm_f="alamat";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>"><?php echo ucwords(str_replace('_',' ',$nm_f))?></label>
				   </div><div class="col-sm-9">
                                       <?php echo form_textarea($nm_f,(isset($val[$nm_f]) ? $val[$nm_f] : ''),"class='col-sm-4 ' id='$nm_f'")?>
				  
			   </div>
		   </div>
                   </div>
		   <div class="row">
		   <div class="form-group">
			   
			   <?php $nm_f="tlp";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>"><?php echo ucwords(str_replace('_',' ',$nm_f))?></label>
				   </div><div class="col-sm-9">
                                       <?php echo form_input($nm_f,(isset($val[$nm_f]) ? $val[$nm_f] : ''),"class='col-sm-4 ' id='$nm_f' required")?>
				  
			   </div>
		   </div>
                   </div>
		   <div class="row">
		   <div class="form-group">
			   
			   <?php $nm_f="wa";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>"><?php echo strtoupper(str_replace('_',' ',$nm_f))?></label>
				   </div><div class="col-sm-9">
                                       <?php echo form_input($nm_f,(isset($val[$nm_f]) ? $val[$nm_f] : ''),"class='col-sm-4 ' id='$nm_f'")?>
				  
			   </div>
		   </div>
                   </div>
		   <div class="row">
		   <div class="form-group">
			   
			   <?php $nm_f="email";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>"><?php echo ucwords(str_replace('_',' ',$nm_f))?></label>
				   </div><div class="col-sm-9">
                                       <?php echo form_input($nm_f,(isset($val[$nm_f]) ? $val[$nm_f] : ''),"class='col-sm-4 ' id='$nm_f' required")?>
				  
			   </div>
		   </div>
                   </div>
		   <div class="row">
		   <div class="form-group">
			   
			   <?php $nm_f="alt_email";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>">Alternate Email</label>
				   </div><div class="col-sm-9">
                                       <?php echo form_input($nm_f,(isset($val[$nm_f]) ? $val[$nm_f] : ''),"class='col-sm-4 ' id='$nm_f' required")?>
				  
			   </div>
		   </div>
                   </div>
                       <h4>Informasi Login</h4>
                       <hr/>
                   <div class="row">
                   <div class="form-group">
            
            <?php $nm_f="username";?>
			   <div class="col-sm-3">
                               <label for="<?php echo $nm_f?>"><?php echo ucfirst($nm_f)?></label></div>
                       <div class="col-sm-9">
				<input type="text" name="<?php echo $nm_f?>"  id="<?php echo $nm_f?>" value="<?php echo $a= (isset($val['id']) ? GetValue('username','sv_admin',array('marketing'=>'where/'.$val['id'])) : '') ?>">
                       </div>
                   </div>
                   </div>
                   <div class="row">
                   <div class="form-group">
            
            <?php $nm_f="alt_username";?>
			   <div class="col-sm-3">
                               <label for="<?php echo $nm_f?>">Alternate Username</label></div>
                       <div class="col-sm-9">
				<input type="text" name="<?php echo $nm_f?>"  id="<?php echo $nm_f?>" value="<?php echo (isset($val['id']) ? GetValue('alt_username','sv_admin',array('marketing'=>'where/'.$val['id'])) : '') ?>">
                       </div>
                   </div>
                   </div>
                   <div class="row">
		   <div class="form-group">
			   <?php 
                           $req='required';
                           if(!empty($val['id']))$req='';?>
			   <?php $nm_f="password";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>"><?php echo ucwords(str_replace('_',' ',$nm_f))?> Login <?php if(!empty($val['id'])) echo "*) Kosongkan Bila Tidak Ingin Mengganti Password"?></label>
				   </div><div class="col-sm-9">
                                       <?php echo form_password($nm_f,'',"id='$nm_f' $req")?>
				  
			   </div>
		   </div>
                   </div>
                   <div class="row">
		   <div class="form-group">
			   
			   <?php $nm_f="konfirmasi_password";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>"><?php echo ucwords(str_replace('_',' ',$nm_f))?> Login</label>
				   </div><div class="col-sm-9">
                                       <?php echo form_password($nm_f,'',"class='validate[equals[password]]' id='$nm_f' $req")?>
                                      
			   </div>
		   </div>
                   </div>
                   <div class="row">
		   <div class="form-group">
			   
			   <?php $nm_f="status";?>
			   <div class="col-sm-3">
				   <label for="<?php echo $nm_f?>"><?php echo ucwords(str_replace('_',' ',$nm_f))?> </label>
				   </div><div class="col-sm-9"> <?php echo form_dropdown($nm_f,array('Aktif'=>'Aktif','Non Aktif'=>'Non Aktif'),(isset($val[$nm_f]) ? $val[$nm_f] : ''),"class='select2' id='$nm_f' ")?>
				  
				  
			   </div>
                   </div>
                   </div>
		  <div id="daftaranak">
                       <h4>Daftar Nama Anak</h4>
                       <hr/>
                       <button type="button" class="btn btn-info" onclick="tambahanak()">+</button>
                  </div>
                       <?php
                       if(!empty($val['id'])){
                        $child=GetAll('sv_parent_child',array('parent'=>'where/'.$val['id']));
                            if($child->num_rows()>0){
                                ?>
                       <hr>
                       <?php 
                                foreach($child->result_array() as $anaks){
                                    $detailanak=$this->db->query("SELECT id,no_sisda,nama_siswa,kelas FROM sv_master_siswa WHERE id='".$anaks['child']."'")->row();
                        ?>
                            <div class="row">
                                <div class="col-md-6"><?php echo $detailanak->nama_siswa.' <b>('.$detailanak->no_sisda.')</b>' ?></div><div class="col-md-3"><button type="button" onclick="hapusanak(<?php echo $anaks['id'] ?>)">Hapus</button></div>
                            </div>
                       
                       <hr>
                       <?php 
                                }?>
                       <?php
                            }
                       
                        }?>
                       <div class="row">
                           
                        <div id="divanak">
                            
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
        
         
    });
    var password = document.getElementById("password");
     confirm_password = document.getElementById("konfirmasi_password");
  
    function validatePassword(){
    if(!confirm_password.value){
        
    }else{
        if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
        confirm_password.setCustomValidity('');
    }
    }
    }

    password.onchange = validatePassword();
    confirm_password.onkeyup = validatePassword();
    
    function tambahanak(){
        var rowanak=$('.rowanak').length+1;
        $('#divanak').append("<div class='col-md-12 rowanak' id='rowanak"+rowanak+"'></div>");
        $('#rowanak'+rowanak).load('<?php echo base_url()?>master_orang_tua/carisiswaopt',{id:rowanak});
        //alert(rowanak);
    }
    function hapusdivnew(ids){
        $('#rowanak'+ids).remove();
    }
    
    function hapusanak(ids){
        i = confirm('Hapus Anak ?');
        if (i) {
            window.location = '<?php echo base_url()?>master_orang_tua/delete_anak/<?php echo $val['id'] ?>/' + ids;
        }else{
            
            }
    }
</script>