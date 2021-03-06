<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>" class="brand-link text-center">
        <span class="brand-text font-weight-light"><b><?= $this->session->userdata('role') == 'admin' ? 'ADMIN' : 'SUPERADMIN'; ?></b></span>
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
                <?php if ($this->session->userdata('role') == 'superadmin' || $this->session->userdata('role') == 'admin') : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('dataKaryawan'); ?>" class="nav-link <?= $active == 'Data Karyawan' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data Karyawan
                            </p>
                        </a>
                    </li>
                <?php endif ?>
                <?php if ($this->session->userdata('role') == 'superadmin') : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('dataAdmin'); ?>" class="nav-link <?= $active == 'Data Admin' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data Admin
                            </p>
                        </a>
                    </li>
                <?php endif ?>
                <li class="nav-item">
                    <a href="<?= base_url('dataPresensi'); ?>" class="nav-link <?= $active == 'Data Presensi' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Presensi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('DataJabatan'); ?>" class="nav-link <?= $active == 'Data Jabatan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Data Jabatan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('login/logout'); ?>" class="nav-link">
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