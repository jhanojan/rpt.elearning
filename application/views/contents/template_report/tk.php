<?php 
$sisda= GetValue('no_sisda','master_siswa',array('id'=>'where/'.webmasterkid()));
$nilai=$this->db->query("SELECT * FROM sv_nilai_tk WHERE sisda='$sisda' ORDER BY id DESC LIMIT 1")->row_array();
if(empty($nilai)){
    echo "Data Belum Tersedia";
}else{?>

<style>
    .table td{
        border:1px solid black!important;
    }    
    .ctr{
        text-align: center;
    }
</style>
<table>
    <tr>
        <td><b>Kehadiran</b></td>
        <td>:</td>
        <td><?php echo $nilai['kehadiran']?></td>
    </tr>
    <tr>
        <td><b>Laporan Harian Siswa</b></td>
        <td>:</td>
        <td><?php echo $nilai['lhs']?></td>
    </tr>
</table>
<table width="100%" border="1">
    <tr>
      <td class="ctr">Aktivitas</td>
      <td class="ctr">Tematik</td>
      <td class="ctr">Keislaman</td>
      <td class="ctr">PKH</td>
    </tr>
    <tr> 
      <td>Akses Bahan Ajar</td>
      <td><?php echo $nilai['tematik_ba_angka']?></td>
      <td><?php echo $nilai['keislaman_ba_angka']?></td>
      <td><?php echo $nilai['pkh_ba_angka']?></td>
    </tr>
    <tr>
      <td>Penugasan Elearning</td>
      <td><?php echo $nilai['tematik_tugas_angka']?></td>
      <td><?php echo $nilai['keislaman_tugas_angka']?></td>
      <td><?php echo $nilai['pkh_tugas_angka']?></td>
    </tr>
    <tr>
      <td>Penilaian Standar Tingkat Pencapaian Perkembangan Anak</td>
      <td><?php echo $nilai['tematik_stppa']?></td>
      <td><?php echo $nilai['keislaman_stppa']?></td>
      <td><?php echo $nilai['pkh_stppa']?></td>
    </tr>
    <tr>
      <td>Penilaian Aktifitas<br> 
Tatap Muka Virtual</td>
      <td><?php echo $nilai['tematik_virtual']?></td>
      <td><?php echo $nilai['keislaman_virtual']?></td>
      <td><?php echo $nilai['pkh_virtual']?></td>
    </tr>
</table>
<?php }?>