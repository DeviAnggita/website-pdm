<!-- Sidebar -->
<ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
        </div>
        <div class="sidebar-brand-text mx-3">Manajemen <sup>Reimbursement</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item  active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Master Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Master Data:</h6>
                <a class="collapse-item" href="dataKaryawan">Data Karyawan</a>
                <a class="collapse-item" href="dataDivisi">Data Divisi</a>
                <a class="collapse-item" href="dataStrata">Data Strata</a>
                <a class="collapse-item" href="dataRole">Data Role</a>
                <a class="collapse-item" href="dataLampiran">Data Lampiran</a>
                <a class="collapse-item" href="dataSupplier">Data Supplier</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Main Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Ajuan Reimbursement</span>
        </a>
        {{-- <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" --}} <div id="collapsePages"
            class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Jenis Reimbursement :</h6>
                <a class="collapse-item" href="medical">Medical</a>
                <a class="collapse-item" href="perjalananBisnis">Perjalanan Bisnis</a>
                <a class="collapse-item" href="penunjangKantor">Penunjang Kantor</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa fa-history"></i>
            <span>History Reimbursement</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Jenis Reimbursement :</h6>
                <a class="collapse-item" href="/history-medical">Medical</a>
                <a class="collapse-item" href="/history-perjalananBisnis">Perjalanan Bisnis</a>
                <a class="collapse-item" href="/history-penunjangKantor">Penunjang Kantor</a>
            </div>
        </div>
    </li>


    {{--
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>History Reimbursement</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" <div id="collapsePages"
            class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Jenis Reimbursement :</h6>
                <a class="collapse-item" href="medical">Medical</a>
                <a class="collapse-item" href="perjalananBisnis">Perjalanan Bisnis</a>
                <a class="collapse-item" href="penunjangKantor">Penunjang Kantor</a>
            </div>
        </div>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->