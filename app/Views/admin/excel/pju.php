<table border="1">
    <thead>
    <tr>
        <th>NO</th>
        <th>Nama Lampu PJU</th>
        <th>Ruas Jalan</th>
        <th>Kondisi</th>
        <th>Posisi</th>
        <th>Koordinate Lat</th>
        <th>Koordinate Lng</th>
        <th>Sumber Listrik</th>
        <th>Sumber</th>
        <th>Daya Sumber</th>
        <th>Charger</th>
        <th>Baterai</th>
        <th>Kapasitas Baterai</th>
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
    foreach ( $idpel as $item) {?>

            <tr>
                <td><?= $n++?></td>
                <td><?= $item->namaperl?></td>
                <td><?=$item->namaruas?></td>
                <td><?= $item->kondisi?></td>
                <td><?= $item->posisi?></td>
                <td><?= $item->coordinate_lat?></td>
                <td><?= $item->coordinate_lng?></td>
                <td><?php if($item->catudaya=='T'){echo "Listrik Tersuplai";}else{echo 'Listrik Mandiri';}?></td>
                <td><?= $item->sumber ?></td>
                <td><?= $item->daya_panel?></td>
                <td><?= $item->charger?></td>
                <td><?= $item->baterai?></td>
                <td><?= $item->kapasitas_baterai?></td>
                <td><?=$item->tglpdl?></td>
                <td><?=$item->tgl_nyala?></td>
                <td>  <?=$item->idpel?>  </td>
                <td><?=$item->namaidpel?></td>
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
    }?>
    </tbody>

    </thead>
    <tbod>

    </tbod>
</table>
