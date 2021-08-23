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
      <td><?php echo number_format($tg['spp'], 0, ',', '.');?></td>
      <td><?php echo number_format($tg['ks'], 0, ',', '.');?></td>
      <td><?php echo number_format($tg['catering'], 0, ',', '.');?></td>
      <td><?php echo number_format($tg['antar_jemput'], 0, ',', '.');?></td>
      <td><?php echo number_format($tg['pmb'], 0, ',', '.');?></td>
      <td><?php echo number_format($tg['lainlain'], 0, ',', '.');?></td>
      <td><?php echo number_format($tg['total_non_diskon'], 0, ',', '.');?></td>
      <td><?php echo number_format($tg['total_diskon'], 0, ',', '.');?></td>
      <td><?php echo $tg['status_bayar']?></td>
    </tr>
    <?php $no++; }?>
</table>