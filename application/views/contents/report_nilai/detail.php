
<?php
$dataortu=$this->db->query("SELECT * FROM sv_master_orang_tua WHERE id='".webmastermarketing()."'")->row_array();
if($detailanak->picture>0){
    $pic="https://elearning.darulabidin.com/pluginfile.php/".$detailanak->contextid."/user/icon/enlightlite/f1?rev=".$detailanak->picture;
}else{
    $pic=base_url()."assets/img/default.png";
}
?>
<div id="container" style=" height: auto; margin: 0 " class="col-md-12">
    <!--div class="well-lg">
        <h3><?php echo $detailanak->lastname?></h3>
    </div>
    <hr-->
    <div class="item">
    <div class="item-bg">
      <img src="<?php echo $pic?>" class="blur opacity-3">
    </div>
    <div class="p-a-md">
      <div class="row m-t">
        <div class="col-sm-7">
          <a href class="pull-left m-r-md">
            <span class="avatar w-96">
              <img src="<?php echo $pic?>">
              <i class="on b-white"></i>
            </span>
          </a>
          <div class="clear m-b">
            <h3 class="m-a-0 m-b-xs"><?php echo $detailanak->lastname?></h3>
            <p class="text-muted"><span class="m-r"><?php echo $detailanak->firstname?></span> <small><i class="fa fa-map-marker m-r-xs"></i><?php echo $detailanak->city?>, <?php echo $detailanak->country?></small></p>
            <p class="text-muted" title="Login Terakhir"><small><i class="fa fa-clock-o m-r-xs"></i><?php echo date('d/M/Y H:i:s',$detailanak->lastlogin)?></small></p>
          </div>
        </div>
        
      </div>
    </div>
  </div>
    <hr>
  <div class="item" style="min-height:30px!important">
    <div class="col-md-6 col-sm-12">
    <a href="<?php echo base_url()?>report_nilai" class="btn btn-info">Kembali Ke Halaman Summary</a>
    </div>
    <div class="col-md-6 col-sm-12">
    <a href="<?php echo base_url()?>report_nilai/pdf/<?php echo $enrol->courseid?>/true" class="btn btn-info pull-right">Export PDF</a>
    </div>
  </div>
    
    <hr>
  <div class="box">
    <div class="box-header">
      <h2><?php echo $enrol->course?></h2>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-b" id="dttb">
        <thead>
          <tr>
            <th  style="width:25%">Grade Item</th>
            <th  style="width:5%">Calculated weight</th>
            <th  style="width:5%">Grade</th>
            <th  style="width:5%">Range</th>
            <th  style="width:5%">Percentage</th>
            <th  style="width:5%">Letter Grade</th>
            <th  style="width:5%">Rank</th>
            <th  style="width:5%">Average</th>
            <th  style="width:15%">Feedback</th>
            <th  style="width:5%">Contribution To Course Total</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($rownilai as $rn){
                /*if(!empty($ac->courseid)){
                    $grade=$this->mdlfo->query("SELECT * FROM mdl_grade_grades a left join mdl_grade_items b ON a.itemid=b.id WHERE a.userid=".$this->session->userdata('chosen_kid')." AND b.courseid=".$ac->courseid." AND sortorder=1")->row();
                }*/
                    $prec=$rn->finalgrade/$rn->rawgrademax*100;
                    $cont=$rn->finalgrade/$rowsum->finalgrade*100;
                ?>
          <tr>
            <td  style="width:25%"><a href="<?php echo base_url()?>report_nilai/detail/<?php echo $rn->courseid?>"><?php echo $rn->itemname?></a></td>
            <td  style="width:5%"><?php echo number_format($rn->aggregationweight*100,2).' %'?></td>
            <td  style="width:5%"><?php echo number_format($rn->finalgrade,2)?></td>
            <td  style="width:5%"><?php echo round($rn->rawgrademin).'-'.round($rn->rawgrademax)?></td>
            <td  style="width:5%"><?php echo number_format($prec,2).'%'?></td>
            <td  style="width:5%"><?php echo ( !empty($rn->finalgrade) ? gradeletter($rn->finalgrade/$rn->rawgrademax*100):"-")?></td>
            <td  style="width:5%"></td>
            <td  style="width:5%"></td>
            <td  style="width:15%"><?php echo $rn->feedback?></td>
            <td  style="width:5%"><?php echo number_format($cont,2)?>%</td>
          </tr>
            <?php }?>
        </tbody>
        <tfoot>
            <?php if(empty($rowsum->id)){?>
            <td  style="width:25%"><b>Course Total</b></a></td>
            <td  style="width:5%">-</td>
            <td  style="width:5%">0</td>
            <td  style="width:5%">0</td>
            <td  style="width:5%">-</td>
            <td  style="width:5%">-</td>
            <td  style="width:5%">-</td>
            <td  style="width:5%">-</td>
            <td  style="width:15%">-</td>
            <td  style="width:5%">-</td>
            <?php } else {
                $prect=$rowsum->finalgrade/$rowsum->rawgrademax*100;
                ?>
            <td  style="width:25%"><b>Course Total</b></a></td>
            <td  style="width:5%">-</td>
            <td  style="width:5%"><?php echo number_format($rowsum->finalgrade,2)?></td>
            <td  style="width:5%"><?php echo round($rn->rawgrademin).'-'.round($rowsum->rawgrademax)?></td>
            <td  style="width:5%"><?php echo number_format($prect,2).'%'?></td>
            <td  style="width:5%"><?php echo ( !empty($rowsum->finalgrade) ? gradeletter($prect):"-")?></td>
            <td  style="width:5%"></td>
            <td  style="width:5%"></td>
            <td  style="width:15%"></td>
            <td  style="width:5%">-</td>
            
            <?php }?>
        </tfoot>
      </table>
    </div>
  </div>
    <?php //echo $api_tes->api_name;?>
    
</div>
<script>
</script>