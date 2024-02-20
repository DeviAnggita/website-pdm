<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="modal fade editModal" id="editModalOrder{{ $menuUser->NO_SETTING }}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel{{ $menuUser->NO_SETTING }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="editModalLabel{{ $menuUser->NO_SETTING }}" style="color: white;">
                    Edit Menu User - {{ $menuUser->NO_SETTING }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="POST" action="{{ route('MenuUser.update', $menuUser->NO_SETTING) }}">
                    @csrf
                    @method('PUT')

                    <!-- Tambahkan input untuk menyimpan ID yang akan diupdate -->
                    <input type="hidden" name="MENU_ID" value="{{ $menuUser->NO_SETTING }}">

                    <div class="form-group">
                        <label for="ID_USER">User:</label>
                        <select class="form-control" id="ID_USER" name="ID_USER" required>
                            @foreach ($users as $id => $nama_user)
                                <option value="{{ $id }}" {{ $menuUser->ID_USER == $id ? 'selected' : '' }}>
                                    {{ $id }} - {{ $nama_user }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="MENU_ID">Menu:</label>
                        <select class="form-control" id="MENU_ID" name="MENU_ID" required>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->MENU_ID }}"
                                    {{ $menuUser->MENU_ID == $menu->MENU_ID ? 'selected' : '' }}>
                                    {{ $menu->MENU_NAME }}
                                </option>
                            @endforeach
                        </select>
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
