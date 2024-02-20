<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="createModalLabel" style="color: white;">Add New Menu Level</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('MenuLevel.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="MENU_NAME">LEVEL NAME :</label>
                        <input type="text" class="form-control" id="LEVEL" name="LEVEL" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Menu Level</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
