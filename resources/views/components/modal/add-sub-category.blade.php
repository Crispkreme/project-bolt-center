<div class="modal fade" id="add-sub-category" tabindex="-1" aria-labelledby="addSubCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubCategoryLabel">Add New Sub Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-sub-category-form" method="POST" action="{{ route('admin.sub.category.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" name="category_id" id="category_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="sub_category" class="form-label">Sub Category</label>
                        <input type="text" class="form-control" id="sub_category" name="sub_category" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" id="save-sub-category">Save Sub Category</button>
                        <a href="javascript:void(0);" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </form>
                <div id="response-message"></div>
            </div>
        </div>
    </div>
</div>
