         <?php
         $this->mdlfo=$this->load->database('mdb',TRUE);
         $child=$this->db->query("SELECT * FROM sv_parent_child WHERE parent='".webmastermarketing()."'");
         $sisda=GetValue('no_sisda','sv_master_siswa',array('id'=>'where/'. webmasterkid()));
         $detailanak=$this->mdlfo->query("SELECT id,firstname,lastname FROM mdl_user WHERE idnumber='".$sisda."'")->row_array();
         
         ?>

            <div class="collapse navbar-toggleable-sm" id="collapse">
              <!-- link and dropdown -->
              <ul class="nav navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link" href data-toggle="dropdown">
                    <i class="fa fa-fw fa-refresh text-muted"></i>
                    <span><?php echo $detailanak['firstname']?></span>
                  </a>
                    <div class="dropdown-menu dropdown-menu-scale">
                        <?php foreach($child->result_array() as $chk){
                            
                                $sisda=GetValue('no_sisda','sv_master_siswa',array('id'=>'where/'. $chk['child']));
                                    $detailanak=$this->mdlfo->query("SELECT id,firstname,lastname FROM mdl_user WHERE idnumber='".$sisda."'")->row();
                            
                            ?>
                        <a class="dropdown-item" onclick="gantianak(<?php echo $chk['child']?>)">
                            <span><?php echo $detailanak->firstname?></span>
                        </a>
                        <!--a class="dropdown-item" ui-sref="app.note.list">
                            <span>Note</span>
                            <span class="label primary m-l-xs">3</span>
                        </a-->
                        <div class="dropdown-divider"></div>
                        <?php }?>
                    </div>

                </li>
              </ul>
              <!-- / -->
            </div>