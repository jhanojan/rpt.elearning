<?php 
$sisda= GetValue('no_sisda','master_siswa',array('id'=>'where/'.webmasterkid()));
$nilai=$this->db->query("SELECT * FROM sv_nilai_tk WHERE sisda='$sisda' AND periode='".$periode."' ORDER BY id DESC LIMIT 1")->row_array();
if(empty($nilai)){
    echo "Data Belum Tersedia";
}else{?>

<style>
    .table td{
        border:1px solid black!important;
        text-align: center;
    }    
    .ctr{
        text-align: center;
    }
    .bld{
        font-weight: bold;
    }
</style>
<table>
    <tr>
        <td><b>Kehadiran</b></td>
        <td>:</td>
        <td class="ctr"><?php echo $nilai['kehadiran']?></td>
    </tr>
    <tr>
        <td><b>Laporan Harian Siswa</b></td>
        <td>:</td>
        <td class="ctr"><?php echo $nilai['lhs']?></td>
    </tr>
</table>
<table width="100%" border="1">
    <tr>
      <td class="ctr bld">Aktivitas</td>
      <td class="ctr bld">Tematik</td>
      <td class="ctr bld">Keislaman</td>
      <td class="ctr bld">PKH</td>
    </tr>
    <tr> 
      <td class="ctr bld">Akses Bahan Ajar</td>
      <td class="ctr"><?php echo $nilai['tematik_ba_angka']?></td>
      <td class="ctr"><?php echo $nilai['keislaman_ba_angka']?></td>
      <td class="ctr"><?php echo $nilai['pkh_ba_angka']?></td>
    </tr>
    <tr>
      <td class="ctr bld">Penugasan Elearning</td>
      <td class="ctr"><?php echo $nilai['tematik_tugas_angka']?></td>
      <td class="ctr"><?php echo $nilai['keislaman_tugas_angka']?></td>
      <td class="ctr"><?php echo $nilai['pkh_tugas_angka']?></td>
    </tr>
    <tr>
      <td class="ctr bld">Penilaian Standar Tingkat Pencapaian Perkembangan Anak</td>
      <td class="ctr"><?php echo $nilai['tematik_stppa']?></td>
      <td class="ctr"><?php echo $nilai['keislaman_stppa']?></td>
      <td class="ctr"><?php echo $nilai['pkh_stppa']?></td>
    </tr>
    <tr>
      <td class="ctr bld">Penilaian Aktifitas<br> 
Tatap Muka Virtual</td>
      <td class="ctr"><?php echo $nilai['tematik_virtual']?></td>
      <td class="ctr"><?php echo $nilai['keislaman_virtual']?></td>
      <td class="ctr"><?php echo $nilai['pkh_virtual']?></td>
    </tr>
</table>
<table width='200px;'>
    <tr>
        <td colspan='2'>Deskripsi Penilaian</td>
    </tr>
    <tr>
        
        <td class="ctr">A</td>
        <td>Berkembang Sangat Baik</td>
    </tr>
    <tr>
        
        <td class="ctr">B</td>
        <td>Berkembang Sesuai Harapan</td>
    </tr>
    <tr>
        
        <td class="ctr">C</td>
        <td>Mulai Berkembang</td>
    </tr>
    <tr>
        
        <td class="ctr">D</td>
        <td>Belum Berkembang</td>
    </tr>
</table>
<?php }?>