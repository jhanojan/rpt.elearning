<?php error_reporting(E_ALL ^ E_NOTICE);
if(!empty(webmastermarketing())){	
	$val=$this->db->query("SELECT * FROM sv_parent_child WHERE parent='".webmastermarketing()."'")->result_array();
        $this->mdlfo=$this->load->database('mdb',TRUE);
        
}
?>
<style>
    .menu-utama{
        /*min-height:320px;*/
        min-height:130px;
        cursor:pointer;
        border:1px solid rgba(0,0,0,.1);
        padding-bottom:5px;
    }
    .caption{
        min-height:150px;
        border:1px solid rgba(0,0,0,.1);
        padding-top:5px;
        margin-bottom:10px;
        background:#1a237e;
        color:white;
        font-family:"Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
</style>

<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
        <div class="box-header well" data-original-title="">
            <h2>Silahkan Pilih Laporan Anak Anda</h2>

        
        </div>
    	<div class="box-content">
            <div class="row">
                <?php
                $hitung=1;
                foreach($val as $an){
                     //$detailanak=$this->mdlfo->query("SELECT a.id,a.lastlogin,a.firstname,a.lastname,a.picture,b.contextid FROM mdl_user a LEFT JOIN mdl_files b ON b.id=a.picture WHERE a.id='".$an['child']."'")->row();
                    //$detailanak=$this->db->query("SELECT * FROM sv_master_siswa WHERE id='".$an['child']."'")->row();
                    $sisda=GetValue('no_sisda','sv_master_siswa',array('id'=>'where/'.$an['child']));
                    //$mid=$this->mdlfo->query("SELECT id FROM mdl_user WHERE idnumber='".$sisda."'")->row();
                
                    $detailanak=$this->mdlfo->query("SELECT a.idnumber,a.city,a.lastlogin,a.country,a.id,a.firstname,a.lastname,a.picture,b.contextid FROM mdl_user a LEFT JOIN mdl_files b ON b.id=a.picture WHERE idnumber='".$sisda."'")->row();
                    ?>
                <div class="col-lg-4 col-xs-4" onclick="pilihanak(<?php echo $an['child']?>)">
                    <div class="col-md-12 menu-utama" id="kehadiran_bg">
                        <?php if($detailanak->picture>0){?>
                        <img src="https://elearning.darulabidin.com/pluginfile.php/<?php echo $detailanak->contextid?>/user/icon/enlightlite/f1?rev=<?php echo $detailanak->picture?>" width="100%"/>
                        <?php }else{?>
                        <img src="<?php echo base_url()?>assets/img/default.png" width="100%"/>
                        <?php }?>
                    </div>
                    <div class="col-md-12 caption" style="text-align:center">
                        <h5><?php echo $detailanak->firstname.' - '.$detailanak->kelas.' ('.$detailanak->lastname.')'?></h5>
                    </div>
                </div>
                <?php if($hitung%3==0){?>
                
                    <div style="clear:both"></div>
                <?php }?>
                <?php
                
                $hitung++;
                        }?>
            </div>
    	</div>
    	
    </div>
    </div>
</div>
<script>
    
    function pilihanak(ids){
        window.location.assign('<?php echo base_url()?>login/assign_child/'+ids);
    }
    
</script>