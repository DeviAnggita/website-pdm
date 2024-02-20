<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="modal fade editModal" id="editModalOrder{{ $menu->MENU_ID }}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel{{ $menu->MENU_ID }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="editModalLabel{{ $menu->MENU_ID }}" style="color: white;">
                    Edit Menu - {{ $menu->MENU_ID }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="POST" action="{{ route('Menu.update', $menu->MENU_ID) }}">
                    @csrf
                    @method('PUT')

                    <!-- Tambahkan input untuk menyimpan ID yang akan diupdate -->
                    <input type="hidden" name="MENU_ID" value="{{ $menu->MENU_ID }}">

                    <div class="form-group">
                        <label for="ID_LEVEL">ID LEVEL :</label>
                        <select class="form-control" id="ID_LEVEL" name="ID_LEVEL" required>
                            @foreach ($menuLevels as $menuLevel)
                                <option value="{{ $menuLevel->ID_LEVEL }}"
                                    {{ $menu->ID_LEVEL == $menuLevel->ID_LEVEL ? 'selected' : '' }}>
                                    {{ $menuLevel->LEVEL }}
                                </option>
                            @endforeach
                        </select>
                    </div>




                    <!-- Sisipkan input untuk menyimpan ID_LEVEL lama -->
                    <input type="hidden" name="old_ID_LEVEL" value="{{ $menu->ID_LEVEL }}">

                    <!-- Sisipkan input untuk menyimpan MENU_NAME lama -->
                    <input type="hidden" name="old_MENU_NAME" value="{{ $menu->MENU_NAME }}">

                    <!-- Sisipkan input untuk menyimpan MENU_ICON lama -->
                    <input type="hidden" name="old_MENU_ICON" value="{{ $menu->MENU_ICON }}">

                    <!-- Sisipkan input untuk menyimpan MENU_LINK lama -->
                    <input type="hidden" name="old_MENU_LINK" value="{{ $menu->MENU_LINK }}">

                    <div class="form-group">
                        <label for="MENU_NAME">MENU NAME :</label>
                        <input type="text" class="form-control" id="MENU_NAME" name="MENU_NAME"
                            value="{{ $menu->MENU_NAME }}" required>
                    </div>

                    <!-- Include FontAwesome library (if not already included) -->
                    {{-- <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> --> --}}

                    <div class="form-group">
                        <label for="MENU_ICON">MENU ICON :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i id="iconPreview" class="fas {{ $menu->MENU_ICON }}"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="MENU_ICON" name="MENU_ICON"
                                value="{{ $menu->MENU_ICON }}">
                        </div>
                        <small class="form-text text-muted">Use icon classes, e.g., 'fas fa-home'</small>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const iconInput = document.getElementById('MENU_ICON');
                            const iconPreview = document.getElementById('iconPreview');

                            function updateIconPreview() {
                                const iconClass = iconInput.value;
                                iconPreview.className = 'fas ' + iconClass;
                            }

                            // Initial update when the page loads
                            updateIconPreview();

                            iconInput.addEventListener('input', function() {
                                updateIconPreview();
                            });
                        });
                    </script>

                    <div class="form-group">
                        <label for="MENU_LINK">MENU LINK :</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="MENU_LINK" name="MENU_LINK"
                                value="{{ $menu->MENU_LINK }}" placeholder="Enter menu link" pattern="https?://.+">
                            <div class="input-group-append">
                                <a href="#" class="btn btn-outline-secondary" id="linkPreview"
                                    target="_blank">Preview</a>
                            </div>
                        </div>
                        <small class="form-text text-muted">Please enter a valid URL starting with http:// or
                            https://</small>
                    </div>


                    <div class="form-group">
                        <label for="PARENT_ID">PARENT_ID :</label>
                        <input type="text" class="form-control" id="PARENT_ID" name="PARENT_ID"
                            value="{{ $menu->PARENT_ID }}" required>
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
