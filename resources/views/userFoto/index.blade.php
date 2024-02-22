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
                    <h1 class="h3 mb-2 text-gray-800">Tables Data Users</h1>
                    <p class="mb-4">Table berisikan data user </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTabel User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <button href="#"
                                    class="d-none d-sm-inline-block btn btn-primary  btn-sm mb-3 shadow-sm"
                                    data-toggle="modal" data-target="#createModal" type="button">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data User
                                </button>
                                <!--Modal Tambah Data Karyawan -->
                                @include('user.create')

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id </th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Jenis User</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Id </th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Jenis User</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            @php $no = 1; @endphp
                                            @foreach ($users as $user)
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $user->ID_USER }}</td>
                                                <td>{{ $user->NAMA_USER }}</td>
                                                <td>{{ $user->USERNAME }}</td>
                                                <td>{{ $user->jenisUser->NAME_JENIS_USER }}</td>
                                                <td>{{ $user->STATUS_USER == 1 ? 'Aktif' : 'Non-Aktif' }}</td>
                                                <td class="d-flex">
                                                    <button type="button" class="btn btn-warning btn-circle btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#editModalOrder{{ $user->ID_USER }}"> <i
                                                            class="fas fa-edit"></i></button>
                                                    @include('user.update')

                                                    <button type="button"
                                                        class="btn btn-danger btn-circle btn-sm flex-end"
                                                        data-toggle="modal"
                                                        data-target="#deleteModalOrder{{ $user->ID_USER }}"><i
                                                            class="fas fa-trash"></i></button>
                                                    @include('user.delete')
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
