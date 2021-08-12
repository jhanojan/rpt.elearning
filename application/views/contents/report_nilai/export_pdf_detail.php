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
        <td><b>Modul</b></td>
        <td>:</td>
        <td><?php echo $enrol->coursename?></td>
    </tr>
</table>
<br/>
<table border="1" cellspacing="0">
          <tr>
            <td style="width:25%">Grade Item</td>
            <td style="width:5%" align="center">Calculated weight</td>
            <td style="width:5%" align="center">Grade</td>
            <td style="width:5%" align="center">Range</td>
            <td style="width:5%" align="center">Percentage</td>
            <td style="width:5%" align="center">Letter Grade</td>
            <td style="width:5%" align="center">Rank</td>
            <td style="width:5%" align="center">Average</td>
            <td style="width:15%">Feedback</td>
            <td style="width:5%">Contribution To Course Total</td>
          </tr>
            <?php foreach($rownilai as $rn){
                    $prec=$rn->finalgrade/$rn->rawgrademax*100;
                    $cont=$rn->finalgrade/$rowsum->finalgrade*100;
                ?>
          <tr>
            <td style="width:25%"><?php echo $rn->itemname?></td>
            <td style="width:5%" align="center"><?php echo number_format($rn->aggregationweight*100,2).' %'?></td>
            <td style="width:5%" align="center"><?php echo number_format($rn->finalgrade,2)?></td>
            <td style="width:5%" align="center"><?php echo round($rn->rawgrademin).'-'.round($rn->rawgrademax)?></td>
            <td style="width:5%" align="center"><?php echo number_format($prec,2).'%'?></td>
            <td style="width:5%" align="center"><?php echo ( !empty($rn->finalgrade) ? gradeletter($rn->finalgrade/$rn->rawgrademax*100):"-")?></td>
            <td style="width:5%" align="center"></td>
            <td style="width:5%" align="center"></td>
            <td style="width:15%"><?php echo $rn->feedback?></td>
            <td style="width:5%"><?php echo number_format($cont,2)?>%</td>
          </tr>
            <?php }?>
          <tr>
            <?php if(empty($rowsum->id)){?>
            <td style="width:25%"><b>Course Total</b></td>
            <td style="width:5%" align="center">-</td>
            <td style="width:5%" align="center">0</td>
            <td style="width:5%" align="center">0</td>
            <td style="width:5%" align="center">-</td>
            <td style="width:5%" align="center">-</td>
            <td style="width:5%" align="center">-</td>
            <td style="width:5%" align="center">-</td>
            <td style="width:15%">-</td>
            <td style="width:5%">-</td>
            <?php } else {
                $prect=$rowsum->finalgrade/$rowsum->rawgrademax*100;
                ?>
            <td style="width:25%"><b>Course Total</b></td>
            <td style="width:5%" align="center">-</td>
            <td style="width:5%" align="center"><?php echo number_format($rowsum->finalgrade,2)?></td>
            <td style="width:5%" align="center"><?php echo round($rn->rawgrademin).'-'.round($rowsum->rawgrademax)?></td>
            <td style="width:5%" align="center"><?php echo number_format($prect,2).'%'?></td>
            <td style="width:5%" align="center"><?php echo ( !empty($rowsum->finalgrade) ? gradeletter($prect):"-")?></td>
            <td style="width:5%" align="center"></td>
            <td style="width:5%" align="center"></td>
            <td style="width:15%"></td>
            <td style="width:5%">-</td>
            
            <?php }?>
            
          </tr>
      </table>