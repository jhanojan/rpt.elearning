<style>
    @media print {
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
}
</style>

<div class="row box">
    <div id="section-to-print">
<table style="width:100%" border="1" cellspacing="0">
    <tr>
        <th colspan="2" align="center">SLIP TAGIHAN SIT DARUL ABIDIN</th>
    </tr>
    <tr>
        <th width="30%" align="left">Nama Siswa</th><th align="left"><?php echo $datapay['nama'] ?></th>
    </tr>
    <tr>
        <th width="30%" align="left">VA BSM</th><th align="left"><?php echo $datapay['va_bsm'] ?>
    </tr>
    <tr>
        <th width="30%" align="left">VA Mandiri</th><th align="left"><?php echo $datapay['va_mandiri'] ?>
    </tr>
</table>
<table border="1" cellspacing="0" style="width:100%">
    <tr>
        <th width="5%">No</th>
        <th width="70%">Uraian</th>
        <th width="25%">Jumlah</th>
    </tr>
    
    <tr>
        <td width="5%" align="left">1</td>
        <td width="70%" align="left">SPP</td>
        <td width="25%" align="right"><?php echo Rupiah($datapay['spp'])?></td>
    </tr>
    
    <tr>
        <td width="5%" align="left">2</td>
        <td width="70%" align="left">KS</td>
        <td width="25%" align="right"><?php echo Rupiah($datapay['ks'])?></td>
    </tr>
    
    <tr>
        <td width="5%" align="left">3</td>
        <td width="70%" align="left">Catering</td>
        <td width="25%" align="right"><?php echo Rupiah($datapay['catering'])?></td>
    </tr>
    
    <tr>
        <td width="5%" align="left">4</td>
        <td width="70%" align="left">Antar Jemput</td>
        <td width="25%" align="right"><?php echo Rupiah($datapay['antar_jemput'])?></td>
    </tr>
    
    <tr>
        <td width="5%" align="left">5</td>
        <td width="70%" align="left">PMB</td>
        <td width="25%" align="right"><?php echo Rupiah($datapay['pmb'])?></td>
    </tr>
    
    <tr>
        <td width="5%" align="left">6</td>
        <td width="70%" align="left">Lain-lain</td>
        <td width="25%" align="right"><?php echo Rupiah($datapay['lainlain'])?></td>
    </tr>
    <tr>
        <th width="75%" align="center" colspan="2">Keterangan PMB</th>
        <th width="25%" align="right"><?php echo $datapay['diskon_persen'] ?>%</th>
    </tr>
    <tr>
        <th width="75%" align="center" colspan="2">Keterangan Lain-Lain</th>
        <th width="25%" align="right"><?php echo $datapay['diskon_persen'] ?>%</th>
    </tr>
    
    <tr>
        <th width="75%" align="center" colspan="2">Diskon SPP</th>
        <th width="25%" align="right"><?php echo $datapay['diskon_persen'] ?>%</th>
    </tr>
    <tr>
        <th width="75%" align="center" colspan="2">Jumlah Diskon</th>
        <th width="25%" align="right"><?php echo Rupiah($datapay['diskon_val']) ?></th>
    </tr>
    <tr>
        <th width="75%" align="center" colspan="2">Jumlah Harus Dibayar</th>
        <th width="25%" align="right"><?php echo Rupiah($datapay['total_diskon']) ?></th>
    </tr>
    <tr>
        <td width="75%" align="left" colspan="2">Keterangan PMB</td>
        <td width="25%" align="right"><?php echo $datapay['ket_pmb'] ?></td>
    </tr>
    <tr>
        <td width="75%" align="left" colspan="2">Keterangan Lain-Lain</td>
        <td width="25%" align="right"><?php echo $datapay['ket_lainlain'] ?></td>
    </tr>
</table>
    <span><?php echo $datapay['status_bayar'] ?> </span> <?php if($datapay['status_bayar']=='Sudah Dibayar'){ ?><span>, Dikonfirmasi Pada : <?php echo tglindo($datapay['modify_on']) ?></span><?php }?>
    </div>
    <br>
    <br>
    <a href="<?php echo base_url()?>" class="btn btn-primary">Kembali</a> &nbsp;&nbsp; 
    <a href="<?php echo base_url()?>" class="btn btn-primary" onclick="cetak()">Cetak</a>

<script type="text/javascript">
    function cetak(){
        window.print();
    }
</script>
</div>