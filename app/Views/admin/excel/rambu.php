<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Rambu</th>
            <th>Jenis Rambu</th>
            <th>koordinat lat</th>
            <th>koordinat lng</th>
            <th>ruas jalan </th>
            <th>Kondisi</th>
            <th>Posisi</th>
            <th>tgl Insert</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $n=0;
    foreach ($data as $datum) {

    ?>
    <tr>
        <td><?= $n++ ?></td>
        <td><?= $datum->nama ?></td>
        <td><?= $datum->nama_jenis ?></td>
        <td><?= $datum->coordinate_lat ?></td>
        <td><?= $datum->coordinate_lng ?></td>
        <td><?= $datum->nama_ruas ?> </td>
        <td><?= $datum->kondisi ?></td>
        <td><?= $datum->posisi ?></td>
        <td><?= $datum->tgl_insert?></td>
    </tr>
    <?php } ?>
    </tbody>
</table>