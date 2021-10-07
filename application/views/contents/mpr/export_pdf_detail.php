
<img src="<?php echo base_url()?>assets/img/<?php echo $header_img?>" style="width:100%">
<table width="100%">
    <tr>
        <td align="center">
            <h2>LAPORAN PERKEMBANGAN BELAJAR SISWA</h2>																
        </td>
    </tr>
</table>
<table>
    <tr>
        <td><b>Nama</b></td>
        <td>:</td>
        <td><?php echo $detailanak->firstname?></td>
    </tr>
    <tr>
        <td><b>No. SISDA</b></td>
        <td>:</td>
        <td><?php echo $detailanak->idnumber?></td>
    </tr>
    <tr>
        <td><b>Kelas</b></td>
        <td>:</td>
        <td><?php echo $detailanak->lastname?></td>
    </tr>
    <tr>
        <td><b>Periode</b></td>
        <td>:</td>
        <td><?php echo $textperiode?></td>
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
            
        </td>
    </tr>
    <tr>
        <td width="50%" align="left">
            <img src="<?php echo base_url()?>assets/img/<?php echo $sign?>" style="width:200px">
        </td>
        <td width="50%" align="right">&nbsp;
        </td>
    </tr>
    <tr>
        <td width="50%" align="left">
            <u><?php echo $kepsek?></u>
        </td>
        <td width="50%" align="right">
            
        </td>
    </tr>
    
</table>
            <img src="<?php echo base_url()?>assets/img/<?php echo $footer_img?>" style="width:100%">