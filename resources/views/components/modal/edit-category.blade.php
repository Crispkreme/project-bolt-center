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
