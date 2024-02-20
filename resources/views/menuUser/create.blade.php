<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="createModalLabel" style="color: white;">Add New Menu User</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('MenuUser.store') }}">
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
                        <label for="MENU_ID">Menu :</label>
                        <select class="form-control" id="MENU_ID" name="MENU_ID" required>
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->MENU_ID }}">{{ $menu->MENU_NAME }}</option>
                            @endforeach
                        </select>
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
