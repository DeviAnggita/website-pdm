<!-- Create Modal -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="createModalLabel" style="color: white;">Add New User</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('User.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="ID_JENIS_USER">JENIS USER :</label>
                        <select class="form-control" id="ID_JENIS_USER" name="ID_JENIS_USER" required>
                            <option value="" selected disabled>Select Jenis User</option>
                            @foreach ($jenisUsers as $jenisUser)
                                <option value="{{ $jenisUser->ID_JENIS_USER }}">{{ $jenisUser->NAME_JENIS_USER }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="FOTO">Photo (PNG , JPEG , JPG)</label>
                        <input type="file" name="FOTO" class="form-control-file" accept=".png, .jpeg, .jpg,">
                    </div>

                    <div class="form-group">
                        <label for="NAMA_USER">Full Name</label>
                        <input type="text" name="NAMA_USER" class="form-control" value="{{ old('NAMA_USER') }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="USERNAME">Username</label>
                        <input type="text" name="USERNAME" class="form-control" value="{{ old('USERNAME') }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" class="form-control" type="password" name="password"
                            placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <label for="NO_HP">No HP :</label>
                        <input type="text" class="form-control" id="NO_HP" name="NO_HP" required>
                    </div>

                    <div class="form-group">
                        <label for="WA">WA :</label>
                        <input type="text" class="form-control" id="WA" name="WA" required>
                    </div>

                    <div class="form-group">
                        <label for="PIN">PIN :</label>
                        <input type="text" class="form-control" id="PIN" name="PIN" required>
                    </div>






                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Menu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
