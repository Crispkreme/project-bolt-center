<div class="modal fade" id="edit-category" tabindex="-1" aria-labelledby="editCategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCategoryForm" action="{{ route('admin.category.update') }}" method="POST">
                    @csrf
                    <input type="hidden" id="edit-category-id" name="id">
                    <div class="mb-3">
                        <label for="edit-category-name" class="form-label">Category</label>
                        <input type="text" id="edit-category-name" name="category" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select id="edit-category-status" name="category_status" class="form-control">
                            <option value="">Choose</option>
                            <option value="Active">Active</option>
                            <option value="Deactivate">Deactivate</option>
                        </select>
                    </div>
                    <div class="modal-footer-btn">
                        <a href="javascript:void(0);" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</a>
                        <button type="submit" class="btn btn-submit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const editCategoryModal = new bootstrap.Modal('#edit-category');

        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-category');

            editButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const categoryId = this.getAttribute('data-id');

                    $.ajax({
                        url: `/admin/category/${categoryId}/edit`,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {

                            const categoryIdInput = document.getElementById('edit-category-id');
                            const categoryNameInput = document.getElementById('edit-category-name');
                            const categoryStatusSelect = document.getElementById('edit-category-status');

                            if (categoryIdInput && categoryNameInput && categoryStatusSelect) {
                                categoryIdInput.value = data.id;
                                categoryNameInput.value = data.category;
                                categoryStatusSelect.value = data.category_status || ''; 
                                editCategoryModal.show();
                            } else {
                                console.error('Input fields are missing in the modal.');
                            }
                        },
                        error: function (error) {
                            console.error('Error fetching category data:', error);
                        }
                    });
                });
            });

            const editCategoryForm = document.getElementById('editCategoryForm');
            if (editCategoryForm) {
                editCategoryForm.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const formData = new FormData(editCategoryForm);

                    $.ajax({
                        url: '{{ route('admin.category.update') }}',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            editCategoryModal.hide();
                            const categoryRow = document.querySelector(`.category-row[data-id="${response.id}"]`);
                            if (categoryRow) {
                                categoryRow.querySelector('.category-name').textContent = response.category;
                                categoryRow.querySelector('.category-status').textContent = response.status;
                            }

                            if (response.success) {
                                Swal.fire('Success!', 'Category has been updated.', 'success')
                                .then(() => {
                                    location.reload();
                                });
                                document.querySelector('#edit-category .btn-cancel').click();
                                editCategoryForm.reset();
                            } else {
                                alert(data.message || 'An error occurred. Please try again.');
                            }
                        },
                        error: function (error) {
                            console.error('Error updating category:', error);
                        }
                    });
                });
            }
        });

    </script>
@endpush