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
                        <form id="addEntityForm" action="{{ route('admin.entity.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="new-employee-field">
                                        <div class="profile-pic-upload mb-2">
                                            <div class="profile-pic" id="profile-pic" style="position: relative; width: 100px; height: 100px; border-radius: 50%; overflow: hidden; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                                                <img id="profile-pic-preview" src="" alt="Preview" style="display: none; width: 100%; height: 100%; object-fit: cover;">
                                                <span id="default-text" style="position: absolute; text-align: center; color: #aaa;">
                                                    <i data-feather="plus-circle" class="plus-down-add"></i>
                                                    Profile Photo
                                                </span>
                                            </div>
                                            <div class="input-blocks mb-0">
                                                <div class="image-upload mb-0">
                                                    <input type="file" id="profile" name="profile" accept="image/*" onchange="previewImage(event)">
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

@push('scripts')
    <script>
        function previewImage(event) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function () {
                const preview = document.getElementById('profile-pic-preview');
                const defaultText = document.getElementById('default-text');
                preview.src = reader.result;
                preview.style.display = 'block';
                defaultText.style.display = 'none';
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const addEntityForm = document.getElementById('addEntityForm');

            addEntityForm.addEventListener('submit', async function (e) {
                e.preventDefault();

                const formData = new FormData(addEntityForm);
                const url = addEntityForm.getAttribute('action');

                try {
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json',
                        },
                        body: formData,
                    });

                    if (!response.ok) {
                        const errorData = await response.json();
                        if (response.status === 422) {
                            Swal.fire('Error!', 'Validation error occurred. Please check the input fields.', 'error');
                            return;
                        }
                        Swal.fire('Error!', 'An unexpected error occurred. Please try again.', 'error');
                        return;
                    }

                    const data = await response.json();
                    if (data.success) {
                        Swal.fire('Success!', 'Entity has been added successfully.', 'success')
                            .then(() => {
                                location.reload();
                            });
                    } else {
                        Swal.fire('Error!', data.message || 'An error occurred.', 'error');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    Swal.fire('Error!', 'An unexpected error occurred. Please try again.', 'error');
                }
            });
        });
    </script>
@endpush
