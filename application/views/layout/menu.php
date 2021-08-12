<nav class="scroll nav-active-primary">
          
            <ul class="nav" ui-nav>
              <li class="nav-header hidden-folded">
                <small class="text-muted">Main</small>
              </li>
              
              
          <?php
			$webmaster_grup=$this->session->userdata('webmaster_grup');
			$q=GetAll('menu',array('id_parents'=>'where/0','sort'=>'order/ASC','is_active'=>'where/Active'));
			if($q->num_rows()>0){
				foreach($q->result() as $hasil){
					if($webmaster_grup=='2706'){$allow=1;}else{

						if($this->session->userdata("webmaster_id")=='38'){								
							$allow=GetValue('view','users_permission',array('menu_id'=>'where/'.$hasil->id,'user_group'=>'where/'.$webmaster_grup));
                                                        
                                                }else{
								$allow=GetValue('view','users_permission_sf',array('menu_id'=>'where/'.$hasil->id,'user_group'=>'where/'.$webmaster_grup));
                                                }								}
								if($allow==1){
									if($hasil->icon==NULL){$hasil->icon='fa fa-cog';}
									if($hasil->img==''){$hasil->icon=$hasil->icon;}else{
										$hasil->icon='';
									}
									?>
              <li id="menuutama<?php echo $hasil->id?>">
                  
                <a href="<?php echo ($hasil->filez=='#'? '#':base_url().$hasil->filez);?>">
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-icon">
                    	<i class="menu-icon <?php echo $hasil->icon;?>" ><?php if($hasil->img!=NULL){ ?><img src="<?php echo base_url()?>assets/icons/<?php echo $hasil->img;?>" width="24px" height="24px"><?php } ?></i>
                  </span>
                  <span class="menu-text" > <?php echo $hasil->title;?> </span>
                </a>
                <ul class="nav-sub">
                    <?php
											$webmaster_grup=$this->session->userdata('webmaster_grup');

											$qz=GetAll('menu',array('id_parents'=>'where/'.$hasil->id,'sort'=>'order/ASC','is_active'=>'where/Active'));
											if($hasil->id == '99') $qz=GetAll('menu',array('id_parents'=>'where/'.$hasil->id,'sort'=>'order/ASC','is_active'=>'where/Active','id'=>'not_like/134'));
											if($hasil->id == '113') $qz=GetAll('menu',array('id'=>'where/zxzs')); 
											if($hasil->id == '122') $qz=GetAll('menu',array('id_parents'=>'where/'.$hasil->id,'sort'=>'order/ASC','is_active'=>'where/Active','id'=>'not_like/119'));
						//lastq();
											if($qz->num_rows()>0){
												foreach($qz->result() as $hasilz){
													if($webmaster_grup=='2706'){$allow=1;}else{
														if($this->session->userdata("webmaster_id")=='38'){	
															$allow=GetValue('view','users_permission',array('menu_id'=>'where/'.$hasilz->id,'user_group'=>'where/'.$webmaster_grup));}else{
																$allow=GetValue('view','users_permission_sf',array('menu_id'=>'where/'.$hasilz->id,'user_group'=>'where/'.$webmaster_grup));} 
															}
															if($allow==1){
																if($hasilz->icon==NULL){$hasilz->icon='fa fa-cog';}
																if($hasilz->img==''){$hasilz->icon=$hasilz->icon;}else{
																	$hasilz->icon='';
																}
																?>
                  <li>
                    <a href="<?php echo base_url().$hasilz->filez?>">
                        <i class="<?php echo $hasilz->icon;?>"><?php if($hasilz->img!=NULL){ ?><img src="<?php echo base_url()?>assets/icons/<?php echo $hasilz->img;?>" width="16px" height="16px"><?php } ?>
                        </i>&nbsp; 
                      <span class="nav-text" style="display:inline!important"><?php echo $hasilz->title?></span>
                    </a>
                  </li>
                  <?php } 
                        }   
                    }?>
                </ul>
              </li>
              <?php  }?>          
															<?php	}
														}?>
              
                <?php if($this->session->userdata('user_type')=='superuser' || $this->session->userdata('webmaster_grup')=='1'){?>
              <li>
                <a>
                  <span class="nav-caret">
                    <i class="fa fa-caret-down"></i>
                  </span>
                  <span class="nav-icon">
                    <i class="fa fa-gears">
                    </i>
                  </span>
                  <span class="nav-text">Super User Menu</span>
                </a>
                <ul class="nav-sub">
                  <?php if($this->session->userdata('webmaster_grup')=='2706' ){?>
                    <li class="hover"><a href="<?php echo base_url()?>admin"><i class="glyphicon glyphicon-user"></i> User Management</a></li><?php }?>
                    <li class="hover"><a href="<?php echo base_url()?>admin_grup"><i class="glyphicon glyphicon-user"></i> Admin Grup</a></li>
                    <li class="hover"><a href="<?php echo base_url()?>menu"><i class="glyphicon glyphicon-list"></i> Menu</a></li>
                </ul>
              </li>
                <?php }?>
              
          
            </ul>
        </nav>