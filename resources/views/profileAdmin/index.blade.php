<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>

    <title>Profile</title>

    @include('template.head')

</head>

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


                    <!-- DataTales Example -->
                    <div class="row">

                        <div class="col-md-3">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="font-weight-bold text-gray-900">
                                        Foto Pengguna
                                    </h6>
                                </div>
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <style>
                                        #preview-image {
                                            width: 200px;
                                            height: 200px;
                                            border-radius: 50%;
                                            object-fit: cover;
                                        }
                                    </style>

                                    <div class="text-center">
                                        @if ($user->userFoto)
                                            <img src="{{ asset('storage/FotoProfile/' . $user->userFoto->FOTO) }}"
                                                alt="Existing Photo" id="preview-image" class="img-fluid">
                                        @else
                                            <img src="{{ asset('template/img/undraw_profile.svg') }}" alt="Foto Profil"
                                                id="preview-image" class="img-fluid">
                                        @endif
                                    </div>

                                    <!-- Upload Profile Picture Form -->
                                    <form action="{{ route('admin.profile.updateFotoProfile', $user->ID_USER) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="id_user" id="id_user">

                                        <div class="form-group mb-3">
                                            <label for="FOTO" class="col-form-label">
                                                <small>* Upload Foto Profil (PNG , JPEG , JPG)</small>
                                            </label>
                                            <input type="file" class="form-control-file" id="FOTO"
                                                name="FOTO" accept=".png, .jpeg, .jpg,"
                                                onchange="previewImage(event)">
                                            @error('FOTO')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="font-weight-bold text-gray-900">
                                        Kelola Pengguna
                                    </h6>
                                </div>
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <!-- Add Reimbursement Form -->
                                    <form method="POST"
                                        action="{{ route('admin.profile.updateKelolaPengguna', $user->ID_USER) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="id_user" id="id_user">

                                        <div class="form-group">
                                            <label for="ID_JENIS_USER">JENIS USER :</label>
                                            <select class="form-control" id="ID_JENIS_USER" name="ID_JENIS_USER"
                                                required>
                                                <option value="" selected disabled>Select Jenis User</option>
                                                @foreach ($jenisUsers as $jenisUser)
                                                    <option value="{{ $jenisUser->ID_JENIS_USER }}"
                                                        {{ $user->ID_JENIS_USER == $jenisUser->ID_JENIS_USER ? 'selected' : '' }}>
                                                        {{ $jenisUser->NAME_JENIS_USER }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="NAMA_USER">Full Name</label>
                                            <input type="text" name="NAMA_USER" class="form-control"
                                                value="{{ old('NAMA_USER', $user->NAMA_USER) }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="NO_HP">No HP :</label>
                                            <input type="text" class="form-control" id="NO_HP" name="NO_HP"
                                                value="{{ old('NO_HP', $user->NO_HP) }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="WA">WA :</label>
                                            <input type="text" class="form-control" id="WA" name="WA"
                                                value="{{ old('WA', $user->WA) }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="PIN">PIN :</label>
                                            <input type="text" class="form-control" id="PIN" name="PIN"
                                                value="{{ old('PIN', $user->PIN) }}" required>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Change</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="font-weight-bold text-gray-900">
                                        Kelola Akun
                                    </h6>
                                </div>
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="{{ route('admin.profile.updateKelolaAkun', $user->ID_USER) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="id_user" id="id_user">



                                        <div class="form-group mb-3 ">
                                            <label for="USERNAME" class="col-form-label"
                                                style="color: black; width: 100%;">Username</label>
                                            <input type="USERNAME" class="form-control" id="USERNAME"
                                                name="USERNAME" value="{{ $user->USERNAME }}">
                                            @error('USERNAME')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3 ">
                                            <label for="email" class="col-form-label"
                                                style="color: black; width: 100%;">Email</label>
                                            {{-- <div class="col-sm-9"> --}}
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ $user->email }}">
                                            @error('email')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            {{-- </div> --}}
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="password" class="col-form-label"
                                                style="color: black; width: 100%;">Password</label>
                                            {{-- <div class="col-sm-9"> --}}
                                            <input type="password" class="form-control" id="password"
                                                name="password" value="********">
                                            <input type="hidden" id="actual_password" name="actual_password"
                                                value="{{ $user->password }}">
                                            @error('password')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            {{-- </div> --}}
                                        </div>

                                        <script>
                                            var passwordInput = document.getElementById('password');
                                            var actualPasswordInput = document.getElementById('actual_password');

                                            passwordInput.addEventListener('focus', function() {
                                                if (passwordInput.value === '********') {
                                                    passwordInput.value = '';
                                                }
                                            });

                                            passwordInput.addEventListener('blur', function() {
                                                if (passwordInput.value === '') {
                                                    passwordInput.value = '********';
                                                }
                                            });

                                            actualPasswordInput.addEventListener('change', function() {
                                                passwordInput.value = '********';
                                            });
                                        </script>



                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('template.footer')

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
