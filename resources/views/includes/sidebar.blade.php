<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-solid fa-graduation-cap"></i>
            </div>
        <div class="sidebar-brand-text mx-3">Penilaian Siswa</div>
    </a>

    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ request()->routeIs('siswa.*') ? 'active' : '' }}">
        <a class="nav-link" href="/siswa">
            <i class="fas fa-solid fa-users"></i>
            <span>Siswa</span>
        </a>
    </li>
    
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ request()->routeIs('guru.*') ? 'active' : '' }}">
        <a class="nav-link" href="/guru">
            <i class="fas fa-solid fa-users"></i>
            <span>Guru</span>
        </a>
    </li>

    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ request()->routeIs('kelas.*') ? 'active' : '' }}">
        <a class="nav-link" href="/kelas">
            <i class="fas fa-solid fa-chalkboard"></i>
            <span>Kelas</span>
        </a>
    </li>

    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ request()->routeIs('nilai.*') ? 'active' : '' }}">
        <a class="nav-link" href="/nilai">
            <i class="fas fa-solid fa-list"></i>
            <span>Nilai</span>
        </a>
    </li>

    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ request()->routeIs('mata-pelajaran.*') ? 'active' : '' }}">
        <a class="nav-link" href="/mata-pelajaran">
            <i class="fas fa-solid fa-book"></i>
            <span>Mata Pelajaran</span>
        </a>
    </li>

    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ request()->routeIs('topik.*') ? 'active' : '' }}">
        <a class="nav-link" href="/topik">
            <i class="fas fw-regular fa-clone"></i>
            <span>Topik</span>
        </a>
    </li>
</ul>