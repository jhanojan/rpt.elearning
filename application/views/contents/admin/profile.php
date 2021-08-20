<?php error_reporting(E_ALL ^ E_NOTICE);
if(isset($list)){	
	$val=$list->row_array();
}

                        if(webmastergrup()!=3){
                            $utama='sv_admin_profile';
                        }else{
                            $utama='sv_master_orang_tua';
                        }
?>

 <div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="<?php echo base_url($this->utama)?>">Profile</a>
        </li>
        <li>
            <a href="#"><?php echo $type?></a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Profile</h2>

        
    </div>
    	<div class="box-content">
       <form method="post" enctype="multipart/form-data" action="<?php echo base_url($this->utama)?>/submit_profile" class="form-horizontal formular">
				<?php echo form_hidden('id',isset($val['id']) ? $val['id'] : '')?>
			<div class="col-md-6">
			<div class="form-group">
				<?php $nm_f="nama_lengkap";?>
				<div class="col-md-3">
					<label for="<?php echo $nm_f?>"><?php echo str_replace('_',' ',ucfirst($nm_f))?></label>
					</div><div class="col-md-7">
					<?php echo form_input($nm_f,(isset($val[$nm_f]) ? $val[$nm_f] : ''), "id='$nm_f' class='form-control'");  ?>
				</div>
             </div>
    		<div class="form-group">
				<?php $nm_f="jenis_kelamin";?>
				<div class="col-md-3">
					<label for="<?php echo $nm_f?>"><?php echo str_replace('_',' ',ucfirst($nm_f))?></label>
					</div><div class="col-md-7">
					<?php echo form_dropdown($nm_f,array(''=>'- Jenis Kelamin -','Laki-laki'=>'Laki-Laki','Perempuan'=>'Perempuan'),(isset($val[$nm_f]) ? $val[$nm_f] : ''), "id='$nm_f' class='form-control'");  ?>
				</div>
             </div>
    		<div class="form-group">
				<?php $nm_f="tanggal_lahir";?>
				<div class="col-sm-3">
					<label for="<?php echo $nm_f?>"><?php echo ucfirst($nm_f)?></label>
				</div>
				<div class="col-sm-9">
					<div class="input-group">
						<?php echo form_input($nm_f,(isset($val[$nm_f]) ? $val[$nm_f] : ''),"id='$nm_f' class='form-control date-picker' data-date-format='yyyy-mm-dd'");?>
						<span class="input-group-addon">
							<i class="fa fa-calendar bigger-110"></i>
						</span>
					</div>
				</div>
             </div>
    		<div class="form-group">
				<?php $nm_f="alamat";?>
				<div class="col-md-3">
					<label for="<?php echo $nm_f?>"><?php echo ucfirst($nm_f)?></label>
					</div><div class="col-md-7">
					<?php echo form_textarea($nm_f,(isset($val[$nm_f]) ? $val[$nm_f] : ''), "id='$nm_f' class='form-control'");  ?>
				</div>
             </div>
    		<div class="form-group">
				<?php $nm_f="tlp";?>
				<div class="col-md-3">
					<label for="<?php echo $nm_f?>"><?php echo ucfirst($nm_f)?></label>
					</div><div class="col-md-7">
					<?php echo form_input($nm_f,(isset($val[$nm_f]) ? $val[$nm_f] : ''), "id='$nm_f' class='form-control'");  ?>
				</div>
             </div>
    		<div class="form-group">
				<?php $nm_f="email";?>
				<div class="col-md-3">
					<label for="<?php echo $nm_f?>"><?php echo ucfirst($nm_f)?></label>
					</div><div class="col-md-7">
					<?php echo form_input($nm_f,(isset($val[$nm_f]) ? $val[$nm_f] : ''), "id='$nm_f' class='form-control'");  ?>
				</div>
             </div>
			 </div>
			 <div class="col-md-6">
				<fieldset class="col-md-12">
				<legend>Avatar</legend>
                                <img src="<?php echo base_url('assets')?>/ace/avatars/<?php echo GetValue('avatar',$utama,array('id'=>'where/'. webmastermarketing()))?>" style="max-width:80%" />
					<br/>
					<br/>
					<br/>
					<div class="form-group">
						<?php $nm_f="avatar";?>
                        <label for="<?php echo $nm_f?>">Avatar<?php if($type=="Edit"){echo " (Kosongkan Jika Foto tidak diganti)";}?></label>
                        <input type="file" name="<?php echo $nm_f?>" id="<?php echo $nm_f?>">
					</div>
				</fieldset>
				
			 </div>
			 <div class="col-md-12">
    		<div class="form-group">
            <button type="submit" class="btn ">Submit</button>
            </div>
             </div>
			 </form>
    	</div>
    	
    </div>
    </div>
</div>