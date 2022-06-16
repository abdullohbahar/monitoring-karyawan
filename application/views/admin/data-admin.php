    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Admin</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Admin</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-end">
                            <div class="col-0">
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModal">+ Tambah Data Admin</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($admin as $a) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $a['email']; ?></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn btn-info btn-sm" data-id="<?= $a['idAdmin']; ?>" id="btnUpdateAdmin"><i class="fas fa-pencil-alt"></i></button>
                                                        <button type="button" class="btn btn-danger btn-sm" data-id="<?= $a['idAdmin']; ?>" id="deleteButtonAdmin"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Modal Add -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tambahAdmin">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger print-error-msg" style="display:none">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <input type="hidden" name="idAdmin" value="<?= $this->session->userdata('id'); ?>" id="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data Admin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updateAdmin">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger print-error-msg-edit" style="display:none">
                                </div>
                            </div>
                            <input type="hidden" name="idAdmin" id="idAdmin">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Password</label>
                                <input type="password" class="form-control" id="password" autocomplete="off" name="password">
                                <span><i>Biarkan Kosong Jika Tidak Ingin Merubah Password</i></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>