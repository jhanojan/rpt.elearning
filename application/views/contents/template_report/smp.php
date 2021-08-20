<?php 
$sisda= GetValue('no_sisda','master_siswa',array('id'=>'where/'.webmasterkid()));
$nilai=$this->db->query("SELECT * FROM sv_nilai_smp WHERE sisda='$sisda' ORDER BY id DESC LIMIT 1")->row_array();
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
        <td><b>Laporan Harian Siswa</b></td>
        <td>:</td>
        <td><?php echo $nilai['lhs']?></td>
    </tr>
</table>
<table width="200" border="1">
    <tr>
      <td class="ctr">I. Aktivitas Luring (Asinkronus)</td>
      <td class="ctr">PAI</td>
      <td class="ctr">PPKn</td>
      <td class="ctr">B. Indonesia</td>
      <td class="ctr">Matematika</td>
      <td class="ctr">IPA</td>
      <td class="ctr">IPS</td>
      <td class="ctr">B. Inggris</td>
      <td class="ctr">SBdP</td>
      <td class="ctr">PJOK</td>
      <td class="ctr">Al Qur’an</td>
      <td class="ctr">TIK</td>
      <td class="ctr">CiBiCi</td>
    </tr>
    <tr>
      <td>Akses Bahan Ajar</td>
      <td><?php echo $nilai['pai_ba']?></td>
      <td><?php echo $nilai['pkn_ba']?></td>
      <td><?php echo $nilai['bi_ba']?></td>
      <td><?php echo $nilai['mtk_ba']?></td>
      <td><?php echo $nilai['ipa_ba']?></td>
      <td><?php echo $nilai['ips_ba']?></td>
      <td><?php echo $nilai['en_ba']?></td>
      <td><?php echo $nilai['sbdp_ba']?></td>
      <td><?php echo $nilai['pjok_ba']?></td>
      <td><?php echo $nilai['quran_ba']?></td>
      <td><?php echo $nilai['tik_ba']?></td>
      <td><?php echo $nilai['cibici_ba']?></td>
    </tr>
    <tr>
      <td>Penugasan Awal</td>
      <td><?php echo $nilai['pai_tugas']?></td>
      <td><?php echo $nilai['pkn_tugas']?></td>
      <td><?php echo $nilai['bi_tugas']?></td>
      <td><?php echo $nilai['mtk_tugas']?></td>
      <td><?php echo $nilai['ipa_tugas']?></td>
      <td><?php echo $nilai['ips_tugas']?></td>
      <td><?php echo $nilai['en_tugas']?></td>
      <td><?php echo $nilai['sbdp_tugas']?></td>
      <td><?php echo $nilai['pjok_tugas']?></td>
      <td><?php echo $nilai['quran_tugas']?></td>
      <td><?php echo $nilai['tik_tugas']?></td>
      <td><?php echo $nilai['cibici_tugas']?></td>
    </tr>
    <tr>
      <td>Forum E-learning</td>
      <td><?php echo $nilai['pai_forum']?></td>
      <td><?php echo $nilai['pkn_forum']?></td>
      <td><?php echo $nilai['bi_forum']?></td>
      <td><?php echo $nilai['mtk_forum']?></td>
      <td><?php echo $nilai['ipa_forum']?></td>
      <td><?php echo $nilai['ips_forum']?></td>
      <td><?php echo $nilai['en_forum']?></td>
      <td><?php echo $nilai['sbdp_forum']?></td>
      <td><?php echo $nilai['pjok_forum']?></td>
      <td><?php echo $nilai['quran_forum']?></td>
      <td><?php echo $nilai['tik_forum']?></td>
      <td><?php echo $nilai['cibici_forum']?></td>
    </tr>
    <tr>
      <td>Penilaian Formatif</td>
      <td><?php echo $nilai['pai_formatif']?></td>
      <td><?php echo $nilai['pkn_formatif']?></td>
      <td><?php echo $nilai['bi_formatif']?></td>
      <td><?php echo $nilai['mtk_formatif']?></td>
      <td><?php echo $nilai['ipa_formatif']?></td>
      <td><?php echo $nilai['ips_formatif']?></td>
      <td><?php echo $nilai['en_formatif']?></td>
      <td><?php echo $nilai['sbdp_formatif']?></td>
      <td><?php echo $nilai['pjok_formatif']?></td>
      <td><?php echo $nilai['quran_formatif']?></td>
      <td><?php echo $nilai['tik_formatif']?></td>
      <td><?php echo $nilai['cibici_formatif']?></td>
    </tr>
    <tr>
      <td class="ctr">II. Aktivitas Daring (Sinkronus)</td>
      <td class="ctr">PAI</td>
      <td class="ctr">PPKn</td>
      <td class="ctr">B. Indonesia</td>
      <td class="ctr">Matematika</td>
      <td class="ctr">IPA</td>
      <td class="ctr">IPS</td>
      <td class="ctr">B. Inggris</td>
      <td class="ctr">SBdP</td>
      <td class="ctr">PJOK</td>
      <td class="ctr">Al Qur’an</td>
      <td class="ctr">TIK</td>
      <td class="ctr">CiBiCi</td>
    </tr>
    <tr>
      <td>Chat E-learning</td>
      <td><?php echo $nilai['pai_chat']?></td>
      <td><?php echo $nilai['pkn_chat']?></td>
      <td><?php echo $nilai['bi_chat']?></td>
      <td><?php echo $nilai['mtk_chat']?></td>
      <td><?php echo $nilai['ipa_chat']?></td>
      <td><?php echo $nilai['ips_chat']?></td>
      <td><?php echo $nilai['en_chat']?></td>
      <td><?php echo $nilai['sbdp_chat']?></td>
      <td><?php echo $nilai['pjok_chat']?></td>
      <td><?php echo $nilai['quran_chat']?></td>
      <td><?php echo $nilai['tik_chat']?></td>
      <td><?php echo $nilai['cibici_chat']?></td>
    </tr>
    <tr>
      <td>Presensi Tatap Muka Virtual</td>
      <td><?php echo $nilai['pai_virtual']?></td>
      <td><?php echo $nilai['pkn_virtual']?></td>
      <td><?php echo $nilai['bi_virtual']?></td>
      <td><?php echo $nilai['mtk_virtual']?></td>
      <td><?php echo $nilai['ipa_virtual']?></td>
      <td><?php echo $nilai['ips_virtual']?></td>
      <td><?php echo $nilai['en_virtual']?></td>
      <td><?php echo $nilai['sbdp_virtual']?></td>
      <td><?php echo $nilai['pjok_virtual']?></td>
      <td><?php echo $nilai['quran_virtual']?></td>
      <td><?php echo $nilai['tik_virtual']?></td>
      <td><?php echo $nilai['cibici_virtual']?></td>
    </tr>
</table>
<?php }?>