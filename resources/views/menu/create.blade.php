<!-- Create Modal -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="createModalLabel" style="color: white;">Add New Menu</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('Menu.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="ID_LEVEL">ID LEVEL :</label>
                        <select class="form-control" id="ID_LEVEL" name="ID_LEVEL" required>
                            @foreach ($menuLevels as $menuLevel)
                                <option value="{{ $menuLevel->ID_LEVEL }}">{{ $menuLevel->LEVEL }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="MENU_NAME">MENU NAME :</label>
                        <input type="text" class="form-control" id="MENU_NAME" name="MENU_NAME" required>
                    </div>

                    <div class="form-group">
                        <label for="MENU_ICON">MENU ICON :</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i id="iconPreview"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="MENU_ICON" name="MENU_ICON" required>
                        </div>
                        <small class="form-text text-muted">Use icon classes, e.g., 'fas fa-home'</small>
                    </div>

                    <div class="form-group">
                        <label for="MENU_LINK">MENU LINK :</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="MENU_LINK" name="MENU_LINK" required
                                placeholder="Enter menu link" pattern="https?://.+">
                            <div class="input-group-append">
                                <a href="#" class="btn btn-outline-secondary" id="linkPreview"
                                    target="_blank">Preview</a>
                            </div>
                        </div>
                        <small class="form-text text-muted">Please enter a valid URL starting with http:// or
                            https://</small>
                    </div>


                    <script>
                        // Include FontAwesome library (if not already included)
                        // <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

                        // Add this script for FontAwesome icon picker
                        document.addEventListener('DOMContentLoaded', function() {
                            const iconInput = document.getElementById('MENU_ICON');
                            const iconPreview = document.getElementById('iconPreview');

                            iconInput.addEventListener('input', function() {
                                const iconClass = this.value;
                                iconPreview.className = 'fas ' + iconClass;
                            });
                        });
                    </script>

                    <div class="form-group">
                        <label for="PARENT_ID">PARENT_ID :</label>
                        <input type="text" class="form-control" id="PARENT_ID" name="PARENT_ID" required>
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
