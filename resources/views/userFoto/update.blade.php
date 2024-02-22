<div class="modal fade editModal" id="editModalOrder{{ $user->ID_USER }}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel{{ $user->ID_USER }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="editModalLabel{{ $user->ID_USER }}" style="color: white;">
                    Edit USER - {{ $user->ID_USER }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="POST" action="{{ route('User.update', $user->ID_USER) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Tambahkan input untuk menyimpan ID yang akan diupdate -->
                    <input type="hidden" name="ID_USER" value="{{ $user->ID_USER }}">

                    <!-- Existing Photo -->
                    {{-- <div class="form-group">
                        <label for="existingPhoto">Existing Photo</label>
                        @if ($user->userFoto)
                            <img src="{{ asset('storage/FotoProfile/' . $user->userFoto->FOTO) }}" alt="Existing Photo"
                                class="img-fluid">
                        @else
                            <p>No existing photo available.</p>
                        @endif
                    </div>

                    <!-- Upload New Photo -->
                    <div class="form-group">
                        <label for="FOTO">Upload New Photo (PNG, JPEG, JPG)</label>
                        <input type="file" name="FOTO" class="form-control-file" accept=".png, .jpeg, .jpg">
                    </div>
                    <div class="form-group">
                        <label for="ID_JENIS_USER">JENIS USER :</label>
                        <select class="form-control" id="ID_JENIS_USER" name="ID_JENIS_USER" required>
                            <option value="" selected disabled>Select Jenis User</option>
                            @foreach ($jenisUsers as $jenisUser)
                                <option value="{{ $jenisUser->ID_JENIS_USER }}"
                                    {{ $user->ID_JENIS_USER == $jenisUser->ID_JENIS_USER ? 'selected' : '' }}>
                                    {{ $jenisUser->NAME_JENIS_USER }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="form-group">
                        <label for="NAMA_USER">Full Name</label>
                        <input type="text" name="NAMA_USER" class="form-control"
                            value="{{ old('NAMA_USER', $user->NAMA_USER) }}">
                    </div>

                    <div class="form-group">
                        <label for="USERNAME">Username</label>
                        <input type="text" name="USERNAME" class="form-control"
                            value="{{ old('USERNAME', $user->USERNAME) }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control"
                            value="{{ old('email', $user->email) }}">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Password"
                            value="{{ old('password', $user->password) }}">
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- Ubah teks tombol sesuai dengan aksi update -->
                        <button type="submit" class="btn btn-primary">Update Menu</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
