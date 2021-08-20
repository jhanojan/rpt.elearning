<?php $badges= $this->mgetdata->getbadge($webmasterkid)->result_array();
                     if(empty($badges)){
                         echo "Data Belum Tersedia";
                     }
                        foreach($badges as $bd){     
                             ?><div class="card" style="width: 100%;">
                                 
                                 <a target="_new" href="https://elearning.darulabidin.com/badges/badge.php?hash=<?php echo $bd['uniquehash'] ?>"><img src="<?php echo $this->mgetdata->getbadgeimg($bd['id']) ?>" class="card-img-top" alt="..."></a>
                        <div class="card-body">
                            <h5 class="card-title"><a target="_new" href="https://elearning.darulabidin.com/badges/badge.php?hash=<?php echo $bd['uniquehash'] ?>"><?php echo $bd['badgename'] ?></a></h5>
                        <p class="card-text"><?php echo $bd['Context'] ?></p>
                        <i> Didapatkan Pada : <?php echo tglindo($bd['dateissued']) ?></i>
                        
                        </div>
                    </div>
                        <?php }?>