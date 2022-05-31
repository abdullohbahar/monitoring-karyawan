<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>" class="brand-link text-center">
        <span class="brand-text font-weight-light"><b>ADMIN</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('dashboard'); ?>" class="nav-link <?= $active == 'dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('dataKaryawan'); ?>" class="nav-link <?= $active == 'Data Karyawan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Karyawan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('dataPresensi'); ?>" class="nav-link <?= $active == 'Data Presensi' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Presensi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('dataPekerjaan'); ?>" class="nav-link <?= $active == 'Data Pekerjaan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Data Pekerjaan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('gajiKaryawan'); ?>" class="nav-link <?= $active == 'Gaji Karyawan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-bookmark"></i>
                        <p>
                            Gaji Karyawan
                        </p>
                    </a>
                </li><i class="fas fa-cloud-upload"></i>
                <li class="nav-item">
                    <a href="<?= base_url('laporan'); ?>" class="nav-link <?= $active == 'Laporan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-file-upload"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>