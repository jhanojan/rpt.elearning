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
    #kehadiran_bg{
        background-image:url('<?php echo base_url()?>assets/img/kehadiran.png') ;
        background-repeat: no-repeat;
        background-size: 100% 100%;

    }
    #nilai_bg{
        background-image:url('<?php echo base_url()?>assets/img/nilai.png') ;
        background-repeat: no-repeat;
        background-size: 100% 100%;

    }
    #nilai_lainnya_bg{
        background-image:url('<?php echo base_url()?>assets/img/nilai_lainnya.png') ;
        background-repeat: no-repeat;
        background-size: 100% 100%;

    }
    
</style>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 " class="col-md-12">
    <div class="well-lg">
        <h3>Selamat Datang, <?php echo $this->session->userdata('webmaster_nama')?></h3>
    </div>
    <hr>
    
    <?php //echo $api_tes->api_name;?>
    
</div>
<script>
</script>