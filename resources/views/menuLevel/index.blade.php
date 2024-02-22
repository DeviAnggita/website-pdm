<!DOCTYPE html>
<html lang="en">

@include('template.head')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('template.left-sidebar-Admin')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('template.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables Menu Level</h1>
                    <p class="mb-4">Table berisikan menu level </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTabel Menu Level</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <button href="#"
                                    class="d-none d-sm-inline-block btn btn-primary  btn-sm mb-3 shadow-sm"
                                    data-toggle="modal" data-target="#createModal" type="button">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data Menu Level
                                </button>
                                <!--Modal Tambah Data Karyawan -->
                                @include('MenuLevel.create')

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Level ID</th>
                                            <th>Level</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Level ID</th>
                                            <th>Level</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            @php $no = 1; @endphp
                                            @foreach ($menuLevels as $menuLevel)
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $menuLevel->ID_LEVEL }}</td>
                                                <td>{{ $menuLevel->LEVEL }}</td>

                                                <td class="d-flex">
                                                    <button type="button" class="btn btn-warning btn-circle btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#editModalOrder{{ $menuLevel->ID_LEVEL }}"> <i
                                                            class="fas fa-edit"></i></button>
                                                    @include('menuLevel.update')

                                                    <button type="button"
                                                        class="btn btn-danger btn-circle btn-sm flex-end"
                                                        data-toggle="modal"
                                                        data-target="#deleteModalOrder{{ $menuLevel->ID_LEVEL }}"><i
                                                            class="fas fa-trash"></i></button>
                                                    @include('menuLevel.delete')
                                                </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    @include('template.script')
    @include('sweetalert::alert')


</body>

</html>
