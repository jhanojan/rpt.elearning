
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
    .bld{
        font-weight: bold;
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
      <td width="40%" class="ctr bld">Aktivitas</td>
      <td class="ctr bld">Akses Bahan Ajar</td>
      <td class="ctr bld">Penugasan Awal</td>
      <td class="ctr bld">Penilaian Formatif</td>
      <td class="ctr bld">Penilaian Aktifitas<br> 
        Tatap Muka Virtual</td>
    </tr>
    <tr>
      <td width="10%" class="ctr bld">Tematik</td>
      <td class="ctr"><?php echo $nilai['tematik_ba']?></td>
      <td class="ctr"><?php echo $nilai['tematik_tugas']?></td>
      <td class="ctr"><?php echo $nilai['tematik_formatif']?></td>
      <td class="ctr"><?php echo $nilai['tematik_virtual']?></td>
        
    </tr>
    <tr>
      <td width="10%" class="ctr bld">PAI</td>
      <td class="ctr"><?php echo $nilai['pai_ba']?></td>
      <td class="ctr"><?php echo $nilai['pai_tugas']?></td>
      <td class="ctr"><?php echo $nilai['pai_formatif']?></td>
      <td class="ctr"><?php echo $nilai['pai_virtual']?></td>
    </tr>
    <tr>
      <td width="10%" class="ctr bld">PJOK</td>
      <td class="ctr"><?php echo $nilai['pjok_ba']?></td>
      <td class='disables'>&nbsp;</td>
      <td class="ctr"><?php echo $nilai['pjok_formatif']?></td>
      <td class="ctr"><?php echo $nilai['pjok_virtual']?></td>
    </tr>
    <tr>
      <td width="10%" class="ctr bld">Al-Qur'an</td>
      <td class="ctr"><?php echo $nilai['quran_ba']?></td>
      <td class="ctr"><?php echo $nilai['quran_tugas']?></td>
      <td class="ctr"><?php echo $nilai['quran_formatif']?></td>
      <td class="ctr"><?php echo $nilai['quran_virtual']?></td>
        
    </tr>
    <tr>
      <td width="10%" class="ctr bld">TIK</td>
      <td class="ctr"><?php echo $nilai['tik_ba']?></td>
      <td class='disables'>&nbsp;</td>
      <td class="ctr"><?php echo $nilai['tik_formatif']?></td>
      <td class="ctr"><?php echo $nilai['tik_virtual']?></td>
    </tr>
    <tr>
      <td width="10%" class="ctr bld">English</td>
      <td class="ctr"><?php echo $nilai['english_ba']?></td>
      <td class="ctr"><?php echo $nilai['english_tugas']?></td>
      <td class="ctr"><?php echo $nilai['english_formatif']?></td>
      <td class="ctr"><?php echo $nilai['english_virtual']?></td>
    </tr>
</table>

<br/>
<table width='200px;'>
    <tr>
        <td colspan='2'>Keterangan</td>
    </tr>
    <tr>
        
        <td class='disables' >&nbsp;</td>
        <td>Tidak ada penilaian</td>
    </tr>
    <tr>
        
        <td class="ctr">A</td>
        <td>Sangat Aktif</td>
    </tr>
    <tr>
        
        <td class="ctr">B</td>
        <td>Aktif</td>
    </tr>
    <tr>
        
        <td class="ctr">C</td>
        <td>Cukup Aktif</td>
    </tr>
</table>
<?php }?>