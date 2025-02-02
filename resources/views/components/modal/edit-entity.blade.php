<div class="modal fade" id="edit-entity" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Edit Supplier/Customer</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form id="editEntityForm" action="{{ route('admin.entity.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="edit-entity-id">
                            <input type="hidden" name="entity_type" id="edit-entity-type">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="new-employee-field">
                                        <div class="profile-pic-upload mb-2">
                                            <div class="profile-pic" id="profile-pic" style="position: relative; width: 100px; height: 100px; border-radius: 50%; overflow: hidden; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                                                <img id="profile-pic-preview" src="" alt="Profile Preview" style="display: none; width: 100%; height: 100%; object-fit: cover;">
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
                                        <input type="text" class="form-control" name="name" id="edit-entity-name" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="input-blocks">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" id="edit-entity-email" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-blocks">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone" id="edit-entity-phone" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-blocks">
                                        <label>Address</label>
                                        <textarea class="form-control mb-1" name="address" id="edit-entity-address" maxlength="600"></textarea>
                                        <p>Maximum 600 Characters</p>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-blocks">
                                        <label>Status</label>
                                        <select class="select form-control" name="entity_status" id="edit-entity-status">
                                            <option value="" disabled>Choose</option>
                                            <option value="Active">Active</option>
                                            <option value="Deactivate">Deactivate</option>
                                        </select>
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

        const editEntityModal = new bootstrap.Modal('#edit-entity');

        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-entity');

            editButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const entityId = this.getAttribute('data-id');

                    $.ajax({
                        url: `/admin/entity/${entityId}/edit`,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {

                            document.getElementById('edit-entity-id').value = data.id;
                            document.getElementById('edit-entity-name').value = data.name;
                            document.getElementById('edit-entity-email').value = data.email;
                            document.getElementById('edit-entity-phone').value = data.phone;
                            document.getElementById('edit-entity-type').value = data.entity_type;
                            document.getElementById('edit-entity-status').value = data.entity_status;
                            document.getElementById('edit-entity-address').value = data.address;

                            if (data.profile_picture) {
                                const preview = document.getElementById('profile-pic-preview');
                                preview.src = data.profile_picture;
                                preview.style.display = 'block';
                                document.getElementById('default-text').style.display = 'none';
                            } else {
                                document.getElementById('profile-pic-preview').style.display = 'none';
                                document.getElementById('default-text').style.display = 'flex';
                            }

                            editEntityModal.show();
                        },
                        error: function (error) {
                            console.error('Error fetching entity data:', error);
                            Swal.fire('Error', 'Failed to fetch entity data. Please try again.', 'error');
                        }
                    });
                });
            });

            const editEntityForm = document.getElementById('editEntityForm');
            editEntityForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(editEntityForm);

                $.ajax({
                    url: '{{ route('admin.entity.update') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        editEntityModal.hide();
                        Swal.fire('Success!', 'Supplier/Customer updated successfully.', 'success')
                            .then(() => location.reload());
                    },
                    error: function (error) {
                        console.error('Error updating entity:', error);
                        Swal.fire('Error', 'Failed to update entity. Please try again.', 'error');
                    }
                });
            });
        });
    </script>
@endpush