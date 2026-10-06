<table border="1">
    <thead>
    <tr>
        <th>NO</th>
        <th>TGLPDL</th>
        <th>TGLNYALA_PB</th>
        <th>IDPEL</th>
        <th>NAMA</th>
        <th>TARIF</th>
        <th>DAYA</th>
        <th>TGL PASANG</th>
        <th>MERK</th>
        <th>TYPE</th>
        <th>NO METER</th>
        <th>SUBKOGOL</th>
        <th>KDGARDU</th>
        <th>NOTIANG</th>
        </td>
    <tbody>
    <?php
    $n=0;
    foreach ( $idpel as $item) {

        if (empty($item->id_pel)){?>

            <tr>
                <td><?= $n++?></td>
                <td><?=$item->tglpdl?></td>
                <td><?=$item->tgl_nyala?></td>
                <td  style="background-color: #f0a238; width: 200">  <?=$item->idpel?>  </td>
                <td><?=$item->nama?></td>
                <td><?=$item->id_tarif?></td>
                <td><?=$item->daya?></td>
                <td><?=$item->tgl_pasang?></td>
                <td><?=$item->merk?></td>
                <td><?=$item->type?></td>
                <td><?=$item->no_meter?></td>
                <td><?=$item->subkogol?></td>
                <td><?=$item->kdgardu?></td>
                <td><?=$item->no_tiang?></td>
            </tr>
            <?php
        }else{

            ?>
            <tr>
                <td><?= $n++?></td>
                <td><?=$item->tglpdl?></td>
                <td><?=$item->tgl_nyala?></td>
                <td><?=$item->idpel?></td>
                <td><?=$item->nama?></td>
                <td><?=$item->id_tarif?></td>
                <td><?=$item->daya?></td>
                <td><?=$item->tgl_pasang?></td>
                <td><?=$item->merk?></td>
                <td><?=$item->type?></td>
                <td><?=$item->no_meter?></td>
                <td><?=$item->subkogol?></td>
                <td><?=$item->kdgardu?></td>
                <td><?=$item->no_tiang?></td>
            </tr>
        <?php }
    }?>
    </tbody>

    </thead>
    <tbod>

    </tbod>
</table>

<table>
    <tr>
        <td colspan="2" text-align="center"><br>
            <br>Keterangan</td>
    </tr>

    <tr>
        <td  style="background-color: #f0a238; width: 20px"></td>
        <td>
            : Idpel tidak terpasang atau belum ter-survey
        </td>
    </tr>
</table>