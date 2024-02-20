<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="createModalLabel" style="color: white;">Add New Error</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('ErrorApplication.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="ID_USER">User :</label>
                        <select class="form-control" id="ID_USER" name="ID_USER" required>
                            @foreach ($users as $id => $nama_user)
                                <option value="{{ $id }}">{{ $id }} - {{ $nama_user }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="MODULES">Modul</label>
                        <input id="MODULES" type="text" class="form-control" name="MODULES" required>
                    </div>

                    <div class="form-group">
                        <label for="CONTROLLER">Controller</label>
                        <input id="CONTROLLER" type="text" class="form-control" name="CONTROLLER" required>
                    </div>

                    <div class="form-group">
                        <label for="FUNCTION">Function</label>
                        <input id="FUNCTION" type="text" class="form-control" name="FUNCTION" required>
                    </div>

                    <div class="form-group">
                        <label for="ERROR_LINE">Error Line</label>
                        <input id="ERROR_LINE" type="text" class="form-control" name="ERROR_LINE" required>
                    </div>

                    <div class="form-group">
                        <label for="ERROR_MESSAGE">Error Message</label>
                        <input id="ERROR_MESSAGE" type="text" class="form-control" name="ERROR_MESSAGE" required>
                    </div>

                    <div class="form-group">
                        <label for="STATUS">Status</label>
                        <input id="STATUS" type="text" class="form-control" name="STATUS" required>
                    </div>

                    <div class="form-group">
                        <label for="PARAM">Param</label>
                        <input id="PARAM" type="text" class="form-control" name="PARAM" required>
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
