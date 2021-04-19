<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fab fa-accusoft"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Learning<br /><small>Praktikum SMK</small></div>
    </a>

    <?php if (in_groups('guru')) : ?>

        <!-- Divider Guru-->
        <hr class="sidebar-divider my-0">
        <button type="button" class="btn btn-warning btn-sm"><b>KELAS ( <?php echo $kelasaktif; ?> )</b></button>
        <br /><br />

        <!-- Divider Guru-->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            GURU
        </div>

        <!-- Nav Item - Nilai Praktikum-->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('G_identitas'); ?>">
                <i class="fas fa-award"></i>
                <span>Penilaian Praktikum</span>
            </a>
        </li>

        <li class="nav-item">
            <div class="nav-link">
                <a class="text-decoration-none text-white" style="active { color: yellow; }" href="<?= base_url('G_kelas'); ?>">
                    <i class="fas fa-users"></i>
                    <span>Daftar Kelas</span>
                </a>
                <ul>
                    <?php foreach ($kelass as $kelas) {
                        if ($kelas->id_kelas == $id_kelas) { ?>
                            <li>
                                <a class="text-decoration-none text-warning" onclick="aktifasi(<?php echo $kelas->id_kelas; ?>)" style="cursor:pointer;">
                                    <span><?php echo $kelas->nama; ?>&nbsp;( Active )</span>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a class="text-decoration-none text-white" onclick="aktifasi(<?php echo $kelas->id_kelas; ?>)" style="cursor:pointer;">
                                    <span><?php echo $kelas->nama; ?></span>
                                </a>
                            </li>
                    <?php }
                    } ?>
                </ul>
            </div>
        </li>

        <script type="text/javascript">
            function aktifasi(id) {
                // ajax adding data to database
                $.ajax({
                    url: "<?= base_url('G_kelas/aktifasi_edit'); ?>/" + id,
                    type: "POST",
                    data: $('#form').serialize(),
                    dataType: "JSON",
                    success: function(data) {
                        //if success close modal and reload ajax table
                        location.reload(); // for reload a page
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error adding / update data');
                    }
                });
            }
        </script>

        <!-- Nav Item - Identitas Siswa-->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('G_siswa'); ?>">
                <i class="fas fa-users"></i>
                <span>Daftar Siswa / Siswi</span>
            </a>
        </li>

        <!-- Nav Item - Daftar siswa-->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('G_sekolah'); ?>">
                <i class="fas fa-school"></i>
                <span>Identitas Sekolah</span>
            </a>
        </li>

        <!-- Nav Item - Nilai Praktikum-->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('G_identitas'); ?>">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Identitas Guru</span>
            </a>
        </li>

        <!-- Nav Item - Identitas Siswa-->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('G_kelas2'); ?>">
                <i class="fas fa-users"></i>
                <span>Daftar Kelas2</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            FITUR CHAT
        </div>

        <!-- Nav Item - CHAT-->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-envelope"></i>
                <span>Chat</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Logout
        </div>

        <!-- Nav Item - LOGOUT-->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('logout'); ?>">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                <span>Logout</span>
            </a>
        </li>
    <?php endif; ?>


    <?php if (in_groups('siswa')) : ?>

        <!-- Divider Guru-->
        <hr class="sidebar-divider my-0">
        <button type="button" class="btn btn-warning btn-sm"><b>KELAS ( <?php echo $kelasaktif; ?> )</b></button>
        <br />

        <!-- Divider siswa -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            SISWA
        </div>

        <!-- Nav Item - Nilai Praktikum-->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('S_hasilpraktikum'); ?>">
                <i class="fas fa-star"></i>
                <span>Hasil Praktikum</span>
            </a>
        </li>

        <!-- Nav Item - Nilai Praktikum-->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('S_kelas'); ?>">
                <i class="fas fa-school"></i>
                <span>Daftar Kelas</span>
            </a>
        </li>

        <!-- Nav Item - Identitas Siswa-->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('S_identitas'); ?>">
                <i class="fas fa-id-card"></i>
                <span>Identitas Siswa</span>
            </a>
        </li>

        <!-- Nav Item - Daftar siswa-->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('S_siswa'); ?>">
                <i class="fas fa-list"></i>
                <span>Daftar siswa</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            FITUR CHAT
        </div>

        <!-- Nav Item - CHAT-->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-envelope"></i>
                <span>Chat</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Logout
        </div>

        <!-- Nav Item - LOGOUT-->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('logout'); ?>">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                <span>Logout</span>
            </a>
        </li>

    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>