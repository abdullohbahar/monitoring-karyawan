    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Karyawan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Karyawan</li>
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
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModal">+ Tambah Data Karyawan</button>
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
                                            <th>Nama Karyawan</th>
                                            <th>Jabatan</th>
                                            <th>No HP</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($karyawan as $k) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $k['nama']; ?></td>
                                                <td><?= $k['jabatan']; ?></td>
                                                <td><?= $k['no_hp']; ?></td>
                                                <td><?= $k['email']; ?></td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn btn-info btn-sm" data-id="<?= $k['idKaryawan']; ?>" id="btnUpdate"><i class="fas fa-pencil-alt"></i></button>
                                                        <button type="button" class="btn btn-danger btn-sm" data-id="<?= $k['idKaryawan']; ?>" id="deleteButton"><i class="fas fa-trash"></i></button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tambahKaryawan">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger print-error-msg" style="display:none">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Nama Karyawan</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" name="alamat">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">No HP</label>
                                <input type="text" class="form-control" name="no_hp">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">NIK</label>
                                <input type="text" class="form-control" name="nik">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Status</label>
                                <input type="text" class="form-control" name="status">
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data Karyawan</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updateKaryawan">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger print-error-msg-edit" style="display:none">
                                </div>
                            </div>
                            <input type="hidden" name="idKaryawan" id="idKaryawan">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Nama Karyawan</label>
                                <input type="text" class="form-control" name="nama" id="nama" required>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" required>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">No HP</label>
                                <input type="text" class="form-control" name="no_hp" id="no_hp" required>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Jabatan</label>
                                <input type="text" class="form-control" name="jabatan" id="jabatan" required>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">NIK</label>
                                <input type="text" class="form-control" name="nik" id="nik" required>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Status</label>
                                <input type="text" class="form-control" name="status" id="status" required>
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