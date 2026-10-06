
<div class="mainpanel">

    <div class="contentpanel">

        <ol class="breadcrumb breadcrumb-quirk">
            <li><a href="<?=base_url('admin')?>"><i class="fa fa-home mr5"></i> Home</a></li>
            <li class="active">User</li>
        </ol>

        <div class="panel">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="btn-toolbar btn-toolbar-media-manager pull-right" role="toolbar">
                            <div class="btn-group" role="group">
                                <a type="button" class="btn btn-primary" href="<?= base_url('admin/User/addUser') ?>"><i class="fa fa-plus-circle"></i>Tambah</a>&nbsp;
                                <a type="button" class="btn btn-success" disabled="disable"> <i class="fa fa-download"></i> Download Excel </a>
                            </div>

                        </div>

                        <h4 class="panel-title">Data User</h4>
                        <p>Tabel data User/ Pengguna aplikasi Simpel-Jalan</p>

                    </div>
                </div>
            </div>
            <div class="panel-body">
                <?php if (isset($_SESSION['sts'])==1){
                ?>
                <div class="alert alert-success">
                    Data User Berhasil Dihapus
                </div>
                <?php
                            }?>
                <div class="table-responsive">
                    <table id="tableuser" class="table table-bordered table-striped-col">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $n=1;
                        foreach ($user as $item) {
                            ?>
                            <tr>
                                <td><?= $n++?></td>
                                <td><?= $item->username?></td>
                                <td><?= $item->nama?></td>
                                <td><?= $item->jabatan?></td>
                                <td><?php if ($item->status==1){ echo 'administrator';}else{
                                    echo 'Surveyor';
                                    }?></td>
                                <td><a href="/admin/user/edit/<?=$item->id_user?>" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>&nbsp; <a href="/admin/user/hapus/<?=$item->id_user?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?')"><i class="fa fa-pencil"></i> Hapus</a></td>
                            </tr>
                            <?php
                        }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- panel -->

    </div><!-- contentpanel -->
</div><!-- mainpanel -->