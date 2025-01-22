<!-- Edit Company -->
<div class="modal fade" id="edit-company">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Edit Company</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form action="" method="POST" id="edit-company-form">
                            @csrf
                            <input type="hidden" class="form-control" name="id" id="edit-company-id">
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
                                        <input type="text" class="form-control" name="company_name" id="edit-company-name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="mb-2">Phone Number</label>
                                        <input class="form-control" name="company_phone" type="text" id="edit-company-phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="company_email" id="edit-company-email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Industry</label>
                                        <input type="text" class="form-control" name="industry" id="edit-company-industry">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Website</label>
                                        <input type="url" class="form-control" name="company_website" id="edit-company-website" placeholder="https://example.com">
                                    </div>                                    
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select id="edit-company-status" name="company_status" class="form-control">
                                            <option>Choose</option>
                                            <option value="Active">Active</option>
                                            <option value="Deactivate">Deactivate</option>
                                        </select>
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
                                        <textarea class="form-control" name="address" id="edit-company-address"></textarea>
                                        <p>Maximum 600 Characters</p>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer-btn">
                                <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-submit">Update Company</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Company -->

@push('scripts')
    <script>
        const editCompanyModal = new bootstrap.Modal('#edit-company');

        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-company');

            editButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const companyId = this.getAttribute('data-id');

                    $.ajax({
                        url: `/admin/company/${companyId}/edit`,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            document.getElementById('edit-company-id').value = data.id;
                            document.getElementById('edit-company-name').value = data.company_name;
                            document.getElementById('edit-company-phone').value = data.company_phone;
                            document.getElementById('edit-company-email').value = data.company_email;
                            document.getElementById('edit-company-industry').value = data.industry;
                            document.getElementById('edit-company-website').value = data.company_website;
                            document.getElementById('edit-company-status').value = data.company_status;
                            document.getElementById('edit-company-address').value = data.address;

                            editCompanyModal.show();
                        },
                        error: function (error) {
                            console.error('Error fetching company data:', error);
                        }
                    });
                });
            });

            const editCompanyForm = document.getElementById('edit-company-form');
            if (editCompanyForm) {
                editCompanyForm.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const formData = new FormData(editCompanyForm);

                    $.ajax({
                        url: '{{ route('admin.company.update') }}',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            editCompanyModal.hide();
                            Swal.fire('Success!', 'Company has been added successfully.', 'success')
                                .then(() => {
                                    location.reload();
                                });
                            document.querySelector('#edit-company .btn-cancel').click();
                            editCompanyForm.reset();
                        },
                        error: function (error) {
                            console.error('Error updating company:', error);
                            Swal.fire('Error!', 'An unexpected error occurred.', 'error');
                        }
                    });
                });
            }
        });
    </script>
@endpush
