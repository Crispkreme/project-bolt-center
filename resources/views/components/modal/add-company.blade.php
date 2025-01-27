<!-- Add Company -->
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
                        <form action="{{ route('admin.company.store') }}" method="POST" id="add-company-form">
                            @csrf
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
                                        <label class="form-label">Supplier</label>
                                        <select class="select" name="supplier_id">
                                            <option>Choose Supplier</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Company Name</label>
                                        <input type="text" class="form-control" name="company_name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="mb-2">Phone Number</label>
                                        <input class="form-control" name="company_phone" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="company_email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Industry</label>
                                        <input type="text" class="form-control" name="industry">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Website</label>
                                        <input type="url" class="form-control" name="company_website" placeholder="https://example.com">
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
                                        <textarea class="form-control" name="address"></textarea>
                                        <p>Maximum 600 Characters</p>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer-btn">
                                <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-submit">Create Company</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Add Company -->

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const companyForm = document.getElementById('add-company-form');
            const responseMessage = document.getElementById('response-message');

            companyForm.addEventListener('submit', function (e) {
                e.preventDefault();

                responseMessage.innerHTML = '';
                const formData = new FormData(companyForm);
                const url = companyForm.getAttribute('action');

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                    },
                    body: formData,
                })
                .then(async response => {
                    if (!response.ok) {
                        const errorData = await response.json();
                        if (response.status === 422) {
                            const errors = errorData.errors || {};
                            responseMessage.innerHTML = `
                                <div class="alert alert-danger">
                                    ${Object.values(errors).flat().join('<br>')}
                                </div>`;
                        } else {
                            responseMessage.innerHTML = `<div class="alert alert-danger">An error occurred. Please try again.</div>`;
                        }
                        throw new Error('Response not OK');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        Swal.fire('Success!', 'Company has been added successfully.', 'success')
                            .then(() => {
                                location.reload();
                            });
                    } else {
                        responseMessage.innerHTML = `<div class="alert alert-danger">${data.message || 'An error occurred.'}</div>`;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    responseMessage.innerHTML = `<div class="alert alert-danger">An unexpected error occurred. Please try again.</div>`;
                });
            });
        });
    </script>
@endpush