<div class="modal fade" id="edit-sub-category" tabindex="-1" aria-labelledby="editSubCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubCategoryLabel">Edit Sub Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="edit-sub-category-form" method="POST" action="{{ route('admin.sub.category.update') }}">
                    @csrf
                    <input type="hidden" name="id" id="edit-sub-category-id">

                    <div class="mb-3">
                        <label for="edit-category-id" class="form-label">Category</label>
                        <select id="edit-category-id" name="category_id" class="form-select" required>
                            <option value="" disabled>Choose a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="edit-sub-category" class="form-label">Sub Category</label>
                        <input type="text" class="form-control" id="sub-category" name="sub_category" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit-sub-description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit-sub-description" name="description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="edit-sub-category-status" class="form-label">Status</label>
                        <select id="edit-sub-category-status" name="sub_category_status" class="form-select">
                            <option value="" disabled selected>Choose status</option>
                            <option value="Active">Active</option>
                            <option value="Deactivate">Deactivate</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" id="save-sub-category">Save Sub Category</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
