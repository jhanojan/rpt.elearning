
<?php 
$sisda= GetValue('no_sisda','master_siswa',array('id'=>'where/'.webmasterkid()));
$nilai=$this->db->query("SELECT * FROM sv_nilai_sd WHERE sisda='$sisda' ORDER BY id DESC LIMIT 1")->row_array();
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
<table width="100%" class="table" >
    <tr>
      <td width="40%" class="ctr">Aktivitas</td>
      <td width="10%" class="ctr">Tematik</td>
      <td width="10%" class="ctr">PAI</td>
      <td width="10%" class="ctr">PJOK</td>
      <td width="10%" class="ctr">Al-Qur'an</td>
      <td width="10%" class="ctr">TIK</td>
    </tr>
    <tr>
      <td>Akses Bahan Ajar</td>
      <td><?php echo $nilai['tematik_ba']?></td>
      <td><?php echo $nilai['pai_ba']?></td>
      <td><?php echo $nilai['pjok_ba']?></td>
      <td><?php echo $nilai['quran_ba']?></td>
      <td><?php echo $nilai['tik_ba']?></td>
    </tr>
    <tr>
      <td>Penugasan Awal</td>
      <td><?php echo $nilai['tematik_tugas']?></td>
      <td><?php echo $nilai['pai_tugas']?></td>
      <td><?php echo $nilai['pjok_tugas']?></td>
      <td><?php echo $nilai['quran_tugas']?></td>
      <td><?php echo $nilai['tik_tugas']?></td>
    </tr>
    <tr>
      <td>Penilaian Formatif</td>
      <td><?php echo $nilai['tematik_formatif']?></td>
      <td><?php echo $nilai['pai_formatif']?></td>
      <td><?php echo $nilai['pjok_formatif']?></td>
      <td><?php echo $nilai['quran_formatif']?></td>
      <td><?php echo $nilai['tik_formatif']?></td>
    </tr>
    <tr>
      <td>Penilaian Aktifitas<br> 
Tatap Muka Virtual</td>
      <td><?php echo $nilai['tematik_virtual']?></td>
      <td><?php echo $nilai['pai_virtual']?></td>
      <td><?php echo $nilai['pjok_virtual']?></td>
      <td><?php echo $nilai['quran_virtual']?></td>
      <td><?php echo $nilai['tik_virtual']?></td>
    </tr>
</table>
<?php }?>