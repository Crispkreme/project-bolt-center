<div class="modal fade" id="add-units">
    <div class="modal-dialog modal-dialog-centered stock-adjust-modal">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Add Unit Variation Attribute</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form id="unit-form" action="{{ route('admin.unit.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-blocks">
                                        <label for="unit-name">Unit Name</label>
                                        <input type="text" id="unit-name" name="unit" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="input-blocks">
                                        <label for="short-name">Short Name</label>
                                        <input type="text" id="short-name" name="unit_slug" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="modal-footer-btn popup">
                                    <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-submit">Create Unit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
