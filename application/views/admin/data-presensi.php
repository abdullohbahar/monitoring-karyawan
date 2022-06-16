    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Presensi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Presensi</li>
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
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModal">+ Tambah Presensi</button>
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
                                            <th>Keterangan Presensi</th>
                                            <th>Jam</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($presensi as $p) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $p['nama']; ?></td>
                                                <td><?= $p['keterangan']; ?></td>
                                                <td><?= $p['jam']; ?></td>
                                                <td><?= $p['tanggal']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info btn-sm" data-id="<?= $p['idPresensi']; ?>" data-keterangan="<?= $p['keterangan']; ?>" id="btnUpdatePresensi"><i class="fas fa-pencil-alt"></i></button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Presensi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="tambahPresensi">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger print-error-msg" style="display:none">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label for="">Nama Karyawan</label>
                                <select name="idKaryawan" class="form-control" required>
                                    <option value="">-- Pilih Karyawan --</option>
                                    <?php foreach ($karyawan as $k) : ?>
                                        <option value="<?= $k['idKaryawan']; ?>"><?= $k['nama']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label for="">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan" required>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Presensi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Presensi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updatePresensi">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger print-error-msg" style="display:none">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label for="">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                                <input type="hidden" name="id" id="id">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit Presensi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>