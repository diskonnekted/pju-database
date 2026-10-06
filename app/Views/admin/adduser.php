
<div class="mainpanel">

    <div class="contentpanel">

        <ol class="breadcrumb breadcrumb-quirk">
            <li><a href="<?=base_url('admin')?>"><i class="fa fa-home mr5"></i> Home</a></li>
            <li><a href="<?=base_url('admin/ruas')?>">Ruas Jalan</a></li>
            <li class="active">Ruas Jalan</li>
        </ol>

        <div class="row">
            <div class="col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Tambah Ruas Jalan</h4>
                        <p>Form Tambah Ruas Jalan yang ada di Kabupaten Banjarnegara</p>
                    </div>
                    <form action="/admin/user/saveUser" method="post">

                        <div class="panel-body">
                            <?php
                            if (isset($_SESSION['sts'])==1){
                                ?>
                                <div class="alert alert-success">
                                    Data USER Berahasil Disimpan
                                </div>
                                <?php
                            }elseif(isset($_SESSION['sts'])==2){
                                ?>

                                <div class="alert alert-danger">
                                    Terjadi Kesalahan saat menyimpan atau username telah digunakan
                                </div>

                                <?php
                            }
                            ?>
                            <?php
                            if (isset($edit)==1) {
                            ?>

                                <h4 class="panel-title mb10">Username</h4>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $user->username?>"/>
                                </div>

                                <input type="hidden" name="id" value="<?= $user->id_user;?>" class="form-control" />
                                <h4 class="panel-title mb10 mt20">Password</h4>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password"/>
                                </div>

                                <h4 class="panel-title mb10 mt20">Nama</h4>
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= $user->nama?>"/>
                                </div>
                                <h4 class="panel-title mb10 mt20">Jabatan</h4>
                                <div class="form-group">
                                    <input type="text" name="jabatan" class="form-control" value="<?= $user->jabatan?>" placeholder="Jabatan"/>
                                </div>

                                <h4 class="panel-title mb10">Level</h4>
                                <div class="form-group">
                                    <select name="level" id="" class="form-control">
                                        <option value="1" <?php if ($user->status==1){echo 'selected';}?>>Administrator</option>
                                        <option value="2" <?php if ($user->status==2){echo 'selected';}?>>Surveyor</option>
                                    </select>
                                </div>

                                <?php
                            }else{


                            ?>
                            <h4 class="panel-title mb10">Username</h4>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username"/>
                            </div>

                            <h4 class="panel-title mb10 mt20">Password</h4>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password"/>
                            </div>

                            <h4 class="panel-title mb10 mt20">Nama</h4>
                            <div class="form-group">
                                <input type="text" name="nama" class="form-control" placeholder="Nama"/>
                            </div>
                            <h4 class="panel-title mb10 mt20">Jabatan</h4>
                            <div class="form-group">
                                <input type="text" name="jabatan" class="form-control" placeholder="Jabatan"/>
                            </div>

                            <h4 class="panel-title mb10">Level</h4>
                            <div class="form-group">
                                <select name="level" id="" class="form-control">
                                    <option value="1">Administrator</option>
                                    <option value="2">Surveyor</option>
                                </select>
                            </div>
                            <?php }?>
                        </div>
                        <div class="panel-footer align-items-end">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <button class="btn btn-default" type="reset">Batal</button>
                        </div>
                    </form>

                </div><!-- panel -->



            </div><!-- col-sm-6 -->

            <!-- ####################################################### -->

            <div class="col-sm-6">
                <div class="panel sticky sticky-top fixed-top"  style="position: sticky;">
                    <div class="panel-heading">
                        <h4 class="panel-title">Jenis User</h4>
                        <p>Level user hanya ada 2 yaitu administrator dan surveyor</p>
                    </div>

                </div>
            </div><!-- col-sm-6 -->
        </div><!-- row -->

    </div><!-- contentpanel -->
</div><!-- mainpanel -->
