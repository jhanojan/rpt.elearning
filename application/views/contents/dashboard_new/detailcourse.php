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
    .card-body{
        -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
    }
    .progress-bar{
        color:white;
        text-height: bold;
    }
    .card{
        margin-bottom:0px!important;
    }
</style>
<?php 

        $sisda= GetValue('no_sisda','master_siswa',array('id'=>'where/'. webmasterkid()));
        $webmasterkids=$this->mdlfo->query("SELECT id FROM mdl_user WHERE idnumber='$sisda'")->row_array();
        $webmasterkid=$webmasterkids['id'];
        //$webmasterkid=1664;
?>
<div id="container" style=" height: auto; margin: 0 " class="col-md-12">
    
    
         
             <div class="col-md-12">
                <div class="box">
                <div class="box-header">
                 <h1><?php echo $coursetotal[0]['Course']?></h1>
                 
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $precentaget?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $precentaget?>%">
                            <?php echo $precentaget?>%
                            </div>
                        </div>
                </div>
                    <?php
                     $course= $this->mgetdata->getcoursekid($webmasterkid)->result_array();
                    ?>
                     <?php
                     //echo count($coursetotal);
                            $section="";
                        foreach($coursetotal as $cd){
                            $completed=$this->mgetdata->getmodulescoursecompleted($cd['id'],$webmasterkid,$cd['coursemodule'])->row_array();
                            if($section!=$cd['sectionname']){
                                $section=$cd['sectionname'];
                                $echosection="<b>".$cd['sectionname']."</b>";
                            }else{
                                $echosection="";
                            }
                            //$coursecomplete=$this->mgetdata->getmodulescoursecompleted($cd['id'],$webmasterkid)->num_rows();
                            //$coursetotal= $this->mgetdata->getmodulescourse($cd['id'])->num_rows();
                            //$precentaget=floor($coursecomplete/$coursetotal*100);
                            if($cd['completion']!=0){
                             ?>
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                        <h4 class="card-title"><?php echo $echosection ?></h4>
                        <p class="card-text" > <h5 <?php echo !empty($completed)? "style='color:green'" : "style='color:red'";?>> <i class="fa <?php echo !empty($completed)? "fa-check-square-o" : "fa-square-o";?>" aria-hidden="true"></i> &nbsp;<?php echo $cd['Actvityname'] ?></h5></p>
                        <?php echo $cd['Intro']?>
                         <?php echo !empty($completed)? "<i><b>(Dikerjakan pada ".tglindofull($completed['When']).")</b></i>" : "";?>
                        </div>
                    </div>
                        <?php
                            }else{
                                ?>
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                        <h4 class="card-title"><?php echo $echosection ?></h4>
                            <p class="card-text">&nbsp;<?php echo $cd['Actvityname'] ?></p>
                        </div>
                    </div>
                    
                    <?php
                            }
                        }?>
                </div>
                 <div class="box">
                     
                    <a href="<?php echo base_url()?>" class="btn btn-primary">Kembali</a>
                 </div>
             </div> 
             
 
    
</div>
<script>
    function kehadiran(){
        window.location.assign('<?php echo base_url()?>report_kehadiran');
    }
    function nilai(){
        window.location.assign('<?php echo base_url()?>report_nilai');
    }
    function nilai_lainnya(){
        window.location.assign('<?php echo base_url()?>report_nilai_lainnya');
    }
    
</script>