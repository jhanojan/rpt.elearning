<?php
                    //echo $webmasterkid;
                     $course= $this->mgetdata->getcoursekid($webmasterkid)->result_array();
                    ?>
                     <?php
                     if(empty($course)){
                         echo "Data Belum Tersedia";
                     }
                        foreach($course as $cd){
                            $coursecomplete=$this->mgetdata->getmodulescoursecompleted($cd['id'],$webmasterkid)->num_rows();
                            $coursetotal= $this->mgetdata->getmodulescourse($cd['id'],1)->num_rows();
                            $precentaget=floor($coursecomplete/$coursetotal*100);
                            if($precentaget>100)$precentaget=100;
                            //echo $webmasterkid;
                             ?>
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?php echo base_url()?>dashboard_new/detailcourse/<?php echo $cd['id'] ?>"><?php echo $cd['fullname'] ?></a></h5>
                        <p class="card-text"><?php echo $cd['categoryname'] ?></p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $precentaget?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $precentaget?>%">
                            <?php echo $precentaget?>%
                            </div>
                        </div>
                        <a href="<?php echo base_url()?>dashboard_new/detailcourse/<?php echo $cd['id'] ?>" class="" title="Lihat Detail"><i class="fa fa-external-link" aria-hidden="true"></i> Lihat Detail</a>
                        </div>
                    </div>
                        <?php }?>