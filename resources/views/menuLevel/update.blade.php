<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="modal fade editModal" id="editModalOrder{{ $menuLevel->ID_LEVEL }}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel{{ $menuLevel->ID_LEVEL }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="editModalLabel{{ $menuLevel->ID_LEVEL }}" style="color: white;">
                    Edit Menu Level- {{ $menuLevel->ID_Level }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="POST" action="{{ route('MenuLevel.update', $menuLevel->ID_LEVEL) }}">
                    @csrf
                    @method('PUT')

                    <!-- Tambahkan input untuk menyimpan ID yang akan diupdate -->
                    <input type="hidden" name="ID_LEVEL" value="{{ $menuLevel->ID_LEVEL }}">

                    <div class="form-group">
                        <label for="MENU_NAME">LEVEL NAME :</label>
                        <input type="text" class="form-control" id="LEVEL" name="LEVEL"
                            value="{{ $menuLevel->LEVEL }}">
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
