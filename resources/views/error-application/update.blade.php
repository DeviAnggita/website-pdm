<div class="modal fade editModal" id="editModalOrder{{ $errorApplication->ERROR_ID }}" tabindex="-1" role="dialog"
    aria-labelledby="editModalLabel{{ $errorApplication->ERROR_ID }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="editModalLabel{{ $errorApplication->ERROR_ID }}" style="color: white;">
                    Edit Error Application - {{ $errorApplication->ERROR_ID }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="POST" action="{{ route('ErrorApplication.update', $errorApplication->ERROR_ID) }}">
                    @csrf
                    @method('PUT')

                    <!-- Tambahkan input untuk menyimpan ID yang akan diupdate -->
                    <input type="hidden" name="ERROR_ID" value="{{ $errorApplication->ERROR_ID }}">

                    <div class="form-group">
                        <label for="ID_USER">User:</label>
                        <select class="form-control" id="ID_USER" name="ID_USER" required>
                            @foreach ($users as $id => $nama_user)
                                <option value="{{ $id }}"
                                    {{ $errorApplication->ID_USER == $id ? 'selected' : '' }}>
                                    {{ $id }} - {{ $nama_user }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="MODULES">Modul</label>
                        <input id="MODULES" type="text" class="form-control" name="MODULES"
                            value="{{ $errorApplication->MODULES }}">
                    </div>

                    <div class="form-group">
                        <label for="CONTROLLER">Controller</label>
                        <input id="CONTROLLER" type="text" class="form-control" name="CONTROLLER"
                            value="{{ $errorApplication->CONTROLLER }}">
                    </div>

                    <div class="form-group">
                        <label for="FUNCTION">Function</label>
                        <input id="FUNCTION" type="text" class="form-control" name="FUNCTION"
                            value="{{ $errorApplication->FUNCTION }}">
                    </div>

                    <div class="form-group">
                        <label for="ERROR_LINE">Error Line</label>
                        <input id="ERROR_LINE" type="text" class="form-control" name="ERROR_LINE"
                            value="{{ $errorApplication->ERROR_LINE }}">
                    </div>

                    <div class="form-group">
                        <label for="ERROR_MESSAGE">Error Message</label>
                        <input id="ERROR_MESSAGE" type="text" class="form-control" name="ERROR_MESSAGE"
                            value="{{ $errorApplication->ERROR_MESSAGE }}">
                    </div>

                    <div class="form-group">
                        <label for="STATUS">Status</label>
                        <input id="STATUS" type="text" class="form-control" name="STATUS"
                            value="{{ $errorApplication->STATUS }}">
                    </div>

                    <div class="form-group">
                        <label for="PARAM">Param</label>
                        <input id="PARAM" type="text" class="form-control" name="PARAM"
                            value="{{ $errorApplication->PARAM }}">
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
