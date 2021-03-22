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
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Identitas Guru</span>
            </a>
        </li>

        <!-- Nav Item - Identitas Siswa-->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('G_kelas'); ?>">
                <i class="fas fa-users"></i>
                <span>Daftar Kelas</span>
            </a>
        </li>

        <!-- Nav Item - Identitas Siswa-->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('G_kelas2'); ?>">
                <i class="fas fa-users"></i>
                <span>Daftar Kelas2</span>
            </a>
        </li>

        <!-- Nav Item - Daftar siswa-->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('G_sekolah'); ?>">
                <i class="fas fa-school"></i>
                <span>Identitas Sekolah</span>
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

        <!-- Divider siswa -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            SISWA
        </div>

        <!-- Nav Item - Nilai Praktikum-->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-star"></i>
                <span>Nilai Praktikum</span>
            </a>
        </li>

        <!-- Nav Item - Identitas Siswa-->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-id-card"></i>
                <span>Identitas Siswa</span>
            </a>
        </li>

        <!-- Nav Item - Daftar siswa-->
        <li class="nav-item">
            <a class="nav-link" href="#">
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

    <!-- Nav Item - Pages Collapse Menu -->
    <!--<li class="nav-item active">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Chat</span>
    </a>
    <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item active" href="blank.html">Blank Page</a>
        </div>
    </div>
</li>-->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>