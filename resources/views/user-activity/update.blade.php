<div class="modal fade editModal" id="editModalOrder{{ $userActivity->NO_ACTIVITY }}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel{{ $userActivity->NO_ACTIVITY }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="editModalLabel{{ $userActivity->NO_ACTIVITY }}" style="color: white;">
                    Edit USER ACTIVITY - {{ $userActivity->NO_ACTIVITY }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="POST" action="{{ route('UserActivity.update', $userActivity->NO_ACTIVITY) }}">
                    @csrf
                    @method('PUT')

                    <!-- Tambahkan input untuk menyimpan ID yang akan diupdate -->
                    <input type="hidden" name="NO_ACTIVITY" value="{{ $userActivity->NO_ACTIVITY }}">

                    <div class="form-group">
                        <label for="ID_USER">User :</label>
                        <select class="form-control" id="ID_USER" name="ID_USER">
                            <option value="" selected disabled>Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->ID_USER }}"
                                    {{ $user->ID_USER == $userActivity->ID_USER ? 'selected' : '' }}>
                                    {{ $user->NAMA_USER }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="MENU_ID">Menu:</label>
                        <select class="form-control" id="MENU_ID" name="MENU_ID">
                            <option value="" selected disabled>Select Menu</option>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->MENU_ID }}"
                                    {{ $menu->ID_MENU == $userActivity->ID_MENU ? 'selected' : '' }}>
                                    {{ $menu->MENU_NAME }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="DISCRIPSI">Deskripsi</label>
                        <textarea name="DISCRIPSI" class="form-control">{{ $userActivity->DISCRIPSI }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="STATUS">Status</label>
                        <input type="text" name="STATUS" class="form-control"
                            value="{{ old('STATUS', $userActivity->STATUS) }}">
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
