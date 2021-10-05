<?php 
$sisda= GetValue('no_sisda','master_siswa',array('id'=>'where/'.webmasterkid()));
$nilai=$this->db->query("SELECT * FROM sv_nilai_smp WHERE sisda='$sisda' AND periode='".$periode."' ORDER BY id DESC LIMIT 1")->row_array();
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
<table width="100%" border="1" cellspacing='0'>
    <tr>
        <td>Mata Pelajaran</td>
        <td>Presensi</td>
        <td>Bahan Ajar</td>
        <td>Nilai Pengetahuan</td>
        <td>Nilai Keterampilan</td>
    </tr>
    <tr>
      <td class="ctr">PAI</td>
      <td class="ctr"><?php echo $nilai['pai_presensi']?></td>
      <td class="ctr"><?php echo $nilai['pai_ba']?></td>
      <td class="ctr"><?php echo $nilai['pai_pengetahuan']?></td>
      <td class="ctr"><?php echo $nilai['pai_keterampilan']?></td>
    </tr>
    <tr>
      <td class="ctr">PPKn</td>
      <td class="ctr"><?php echo $nilai['pkn_presensi']?></td>
      <td class="ctr"><?php echo $nilai['pkn_ba']?></td>
      <td class="ctr"><?php echo $nilai['pkn_pengetahuan']?></td>
      <td class="ctr"><?php echo $nilai['pkn_keterampilan']?></td>
    </tr>
    <tr>
      <td class="ctr">Bahasa Indonesia</td>
      <td class="ctr"><?php echo $nilai['bi_presensi']?></td>
      <td class="ctr"><?php echo $nilai['bi_ba']?></td>
      <td class="ctr"><?php echo $nilai['bi_pengetahuan']?></td>
      <td class="ctr"><?php echo $nilai['bi_keterampilan']?></td>
    </tr>
    <tr>
      <td class="ctr">Matematika</td>
      <td class="ctr"><?php echo $nilai['mtk_presensi']?></td>
      <td class="ctr"><?php echo $nilai['mtk_ba']?></td>
      <td class="ctr"><?php echo $nilai['mtk_pengetahuan']?></td>
      <td class="ctr"><?php echo $nilai['mtk_keterampilan']?></td>
    </tr>
    <tr>
      <td class="ctr">IPA</td>
      <td class="ctr"><?php echo $nilai['ipa_presensi']?></td>
      <td class="ctr"><?php echo $nilai['ipa_ba']?></td>
      <td class="ctr"><?php echo $nilai['ipa_pengetahuan']?></td>
      <td class="ctr"><?php echo $nilai['ipa_keterampilan']?></td>
    </tr>
    <tr>
      <td class="ctr">IPS</td>
      <td class="ctr"><?php echo $nilai['ips_presensi']?></td>
      <td class="ctr"><?php echo $nilai['ips_ba']?></td>
      <td class="ctr"><?php echo $nilai['ips_pengetahuan']?></td>
      <td class="ctr"><?php echo $nilai['ips_keterampilan']?></td>
    </tr>
    <tr>
      <td class="ctr">Bahasa Inggris</td>
      <td class="ctr"><?php echo $nilai['en_presensi']?></td>
      <td class="ctr"><?php echo $nilai['en_ba']?></td>
      <td class="ctr"><?php echo $nilai['en_pengetahuan']?></td>
      <td class="ctr"><?php echo $nilai['en_keterampilan']?></td>
    </tr>
    <tr>
      <td class="ctr">PJOK</td>
      <td class="ctr"><?php echo $nilai['pjok_presensi']?></td>
      <td class="ctr"><?php echo $nilai['pjok_ba']?></td>
      <td class="ctr"><?php echo $nilai['pjok_pengetahuan']?></td>
      <td class="ctr"><?php echo $nilai['pjok_keterampilan']?></td>
    </tr>
    <tr>
      <td class="ctr">SB</td>
      <td class="ctr"><?php echo $nilai['sb_presensi']?></td>
      <td class="ctr"><?php echo $nilai['sb_ba']?></td>
      <td class="ctr"><?php echo $nilai['sb_pengetahuan']?></td>
      <td class="ctr"><?php echo $nilai['sb_keterampilan']?></td>
    </tr>
    <tr>
      <td class="ctr">Informatika</td>
      <td class="ctr"><?php echo $nilai['tik_presensi']?></td>
      <td class="ctr"><?php echo $nilai['tik_ba']?></td>
      <td class="ctr"><?php echo $nilai['tik_pengetahuan']?></td>
      <td class="ctr"><?php echo $nilai['tik_keterampilan']?></td>
    </tr>
</table>
<br/>
<table width="100%" border="1" cellspacing='0'>
    <tr>
        <td class="ctr" rowspan="2">BBQ</td>
        <td class="ctr">Presensi</td>
        <td class="ctr">Jilid</td>
        <td class="ctr">Nilai</td>
    </tr>
    <tr>
        <td class="ctr"><?php echo $nilai['bbq_presensi']?></td>
        <td class="ctr"><?php echo $nilai['bbq_jilid']?></td>
        <td class="ctr"><?php echo $nilai['bbq_nilai']?></td>
    </tr>
</table>
<?php }?>