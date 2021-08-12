<?php error_reporting(E_ALL ^ E_NOTICE);
if(!empty(webmastermarketing())){	
	$val=$this->db->query("SELECT * FROM sv_parent_child WHERE parent='".webmastermarketing()."'")->result_array();
        $this->mdlfo=$this->load->database('mdb',TRUE);
        
}
?>
<style>
    .menu-utama{
        min-height:320px;
        cursor:pointer;
        border:1px solid rgba(0,0,0,.1);
        padding-bottom:5px;
    }
    .caption{
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
            <p>Mohon Maaf, Belum Ada Siswa Yang Terdaftar Sebagai Anak Anda,</p>
            <p>Silakan Hubungi Admin,</p>
            <p>Terimakasih</p>

        
        </div>
    	<div class="box-content">
            
    	</div>
    	
    </div>
    </div>
</div>
<script>
</script>