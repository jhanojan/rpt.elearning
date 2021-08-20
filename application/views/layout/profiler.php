<ul class="nav navbar-nav pull-right">
                <?php
                
                        if(webmastergrup()!=3){
                            $utama='sv_admin_profile';
                        }else{
                            $utama='sv_master_orang_tua';
                        }
                ?>
              <li class="nav-item dropdown">
                <a class="nav-link clear" href data-toggle="dropdown">
                  <span class="avatar w-32">
                      <img src="<?php echo base_url()?>assets/ace/avatars/<?php echo GetValue('avatar',$utama,array('id'=>'where/'. webmastermarketing())) ?>" alt="...">
                    <i class="on b-white bottom"></i>
                  </span>
                </a>
                  <div class="dropdown-menu pull-right dropdown-menu-scale">
                    <!--a class="dropdown-item" ui-sref="app.inbox.list">
                        <span>Inbox</span>
                        <span class="label warn m-l-xs">3</span>
                    </a-->
                    <a class="dropdown-item" href="<?php echo base_url()?>admin/profile/<?php echo webmastermarketing()?>">
                        <span>Profile</span>
                    </a>
                    <a class="dropdown-item" href="<?php echo base_url()?>admin/form/<?php echo webmasterid()?>">
                        <span>Settings</span>
                        <i class="on b-white bottom"></i>
                    </a>
                    <div class="dropdown-divider"></div>
                    <!--a class="dropdown-item" ui-sref="app.docs">
                        Need help?
                    </a-->
                    <a class="dropdown-item" href="<?php echo base_url()?>login/logout">Sign out</a>
                  </div>
              </li>
              <li class="nav-item hidden-md-up">
                <a class="nav-link" data-toggle="collapse" data-target="#collapse">
                  <i class="material-icons">&#xe5d4;</i>
                </a>
              </li>
            </ul>