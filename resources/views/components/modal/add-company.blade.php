<!-- Add Warehouse -->
<div class="modal fade" id="add-company">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Add Company</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form action="{{ route('admin.company.store') }}" method="POST">
                            <div class="modal-title-head">
                                <h6>
                                    <span>
                                        <i data-feather="info" class="feather-edit"></i>
                                    </span>
                                    Company Info
                                </h6>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Company Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 war-add">
                                        <label class="mb-2">Phone Number</label>
                                        <input class="form-control" id="phone" name="phone"
                                            type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Industry</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Website</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-title-head">
                                    <h6>
                                        <span>
                                            <i data-feather="map-pin"></i>
                                        </span>
                                        Location
                                    </h6>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control mb-1"></textarea>
                                        <p>Maximum 600 Characters</p>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer-btn">
                                <button type="button" class="btn btn-cancel me-2"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-submit">Create Warehouse</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Add Warehouse -->