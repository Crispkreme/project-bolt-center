<div class="modal fade" id="add-entity" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Add Supplier/Customer</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form action="suppliers" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="new-employee-field">
                                        <span>Avatar</span>
                                        <div class="profile-pic-upload mb-2">
                                            <div class="profile-pic">
                                                <span>
                                                    <i data-feather="plus-circle" class="plus-down-add"></i>
                                                    Profile Photo
                                                </span>
                                            </div>
                                            <div class="input-blocks mb-0">
                                                <div class="image-upload mb-0">
                                                    <input type="file" name="profile" accept="image/*">
                                                    <div class="image-uploads">
                                                        <h4>Change Image</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-blocks">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="input-blocks">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="input-blocks">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-blocks">
                                        <label>Type</label>
                                        <select class="select form-control" name="entity_type" required>
                                            <option value="">Choose</option>
                                            <option value="Customer">Customer</option>
                                            <option value="Supplier">Supplier</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-blocks">
                                        <label>Address</label>
                                        <textarea class="form-control mb-1" name="address" maxlength="600"></textarea>
                                        <p>Maximum 600 Characters</p>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer-btn">
                                <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>