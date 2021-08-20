<?php
$tagihan=$this->db->query("SELECT * FROM sv_tagihan_siswa")->result_array()?>
<table border="1" >
    <tr>
      <th>No<br></th>
      <th>Periode<br></th>
      <th>No. SISDA</th>
      <th>Nama Siswa</th>
      <th>SPP</th>
      <th>KS</th>
      <th>Catering</th>
      <th>Antar Jemput</th>
      <th>PMB</th>
      <th>Lain-lain</th>
      <th>Total Non Diskon</th>
      <th>Total Diskon</th>
      <th>Status Bayar</th>
    </tr>
    <?php 
    $no=1;
    foreach($tagihan as $tg){?>
    <tr>
      <td><?php echo $no?></td>
      <td><?php echo $tg['periode']?></td>
      <td><?php echo $tg['sisda']?></td>
      <td><?php echo GetValue('nama_siswa','sv_master_siswa',array('no_sisda'=>'where/'.$tg['sisda']))?></td>
      <td><?php echo $tg['spp']?></td>
      <td><?php echo $tg['ks']?></td>
      <td><?php echo $tg['catering']?></td>
      <td><?php echo $tg['antar_jemput']?></td>
      <td><?php echo $tg['pmb']?></td>
      <td><?php echo $tg['lainlain']?></td>
      <td><?php echo $tg['total_non_diskon']?></td>
      <td><?php echo $tg['total_diskon']?></td>
      <td><?php echo $tg['status_bayar']?></td>
    </tr>
    <?php $no++; }?>
</table>