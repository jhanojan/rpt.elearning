
<?php 
$sisda= GetValue('no_sisda','master_siswa',array('id'=>'where/'.webmasterkid()));
$nilai=$this->db->query("SELECT * FROM sv_nilai_sd WHERE sisda='$sisda' AND periode='".$periode."' ORDER BY id DESC LIMIT 1")->row_array();
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
    .disables{
        background-color:grey;
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
<table width="100%" class="table" cellspacing='0' >
    <tr>
      <td width="40%" class="ctr">Aktivitas</td>
      <td class="ctr">Akses Bahan Ajar</td>
      <td class="ctr">Penugasan Awal</td>
      <td class="ctr">Penilaian Formatif</td>
      <td class="ctr">Penilaian Aktifitas<br> 
        Tatap Muka Virtual</td>
    </tr>
    <tr>
      <td width="10%" class="ctr">Tematik</td>
      <td class="ctr"><?php echo $nilai['tematik_ba']?></td>
      <td class="ctr"><?php echo $nilai['tematik_tugas']?></td>
      <td class="ctr"><?php echo $nilai['tematik_formatif']?></td>
      <td class="ctr"><?php echo $nilai['tematik_virtual']?></td>
        
    </tr>
    <tr>
      <td width="10%" class="ctr">PAI</td>
      <td class="ctr"><?php echo $nilai['pai_ba']?></td>
      <td class="ctr"><?php echo $nilai['pai_tugas']?></td>
      <td class="ctr"><?php echo $nilai['pai_formatif']?></td>
      <td class="ctr"><?php echo $nilai['pai_virtual']?></td>
    </tr>
    <tr>
      <td width="10%" class="ctr">PJOK</td>
      <td class="ctr"><?php echo $nilai['pjok_ba']?></td>
      <td class='disables'>&nbsp;</td>
      <td class="ctr"><?php echo $nilai['pjok_formatif']?></td>
      <td class="ctr"><?php echo $nilai['pjok_virtual']?></td>
    </tr>
    <tr>
      <td width="10%" class="ctr">Al-Qur'an</td>
      <td class="ctr"><?php echo $nilai['quran_ba']?></td>
      <td class="ctr"><?php echo $nilai['quran_tugas']?></td>
      <td class="ctr"><?php echo $nilai['quran_formatif']?></td>
      <td class="ctr"><?php echo $nilai['quran_virtual']?></td>
        
    </tr>
    <tr>
      <td width="10%" class="ctr">TIK</td>
      <td class="ctr"><?php echo $nilai['tik_ba']?></td>
      <td class='disables'>&nbsp;</td>
      <td class="ctr"><?php echo $nilai['tik_formatif']?></td>
      <td class="ctr"><?php echo $nilai['tik_virtual']?></td>
    </tr>
    <tr>
      <td width="10%" class="ctr">English</td>
      <td class="ctr"><?php echo $nilai['english_ba']?></td>
      <td class="ctr"><?php echo $nilai['english_tugas']?></td>
      <td class="ctr"><?php echo $nilai['english_formatif']?></td>
      <td class="ctr"><?php echo $nilai['english_virtual']?></td>
    </tr>
</table>
<?php }?>