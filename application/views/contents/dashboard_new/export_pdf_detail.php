<table width="100%">
    <tr>
        <td align="center">
            LAPORAN PERKEMBANGAN BELAJAR SISWA																
        </td>
    </tr>
</table>
<table>
    <tr>
        <td><b>Nama</b></td>
        <td>:</td>
        <td><?php echo $detailanak->lastname?></td>
    </tr>
    <tr>
        <td><b>Kelas</b></td>
        <td>:</td>
        <td><?php echo $detailanak->firstname?></td>
    </tr>
    <tr>
        <td><b>Bulan</b></td>
        <td>:</td>
        <td><?php echo date('M - Y')?></td>
    </tr>
</table>
<br/>
<?php $this->load->view($tbl);?>

<table width="100%">
    <tr>
        <td colspan="2" align="right">
            Depok, <?php echo date('d-m-Y')?>
        </td>
    </tr>
    <tr>
        <td width="50%" align="left">
            Kepala Sekolah
        </td>
        <td width="50%" align="right">
            Wali Kelas
        </td>
    </tr>
    <tr>
        <td width="50%" align="left">&nbsp;
        </td>
        <td width="50%" align="right">&nbsp;
        </td>
    </tr>
    <tr>
        <td width="50%" align="left">
            __________
        </td>
        <td width="50%" align="right">
            __________
        </td>
    </tr>
    
</table>
            <img src="<?php echo base_url()?>assets/img/footer_rpt.png" style="width:100%">