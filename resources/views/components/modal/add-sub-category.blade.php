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
                    <div class="mb-3 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary" id="save-sub-category">Save Sub Category</button>
                        <a href="javascript:void(0);" class="btn btn-secondary btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </form>
                <div id="response-message" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const subCategoryForm = document.getElementById('add-sub-category-form');
            const responseMessage = document.getElementById('response-message');

            subCategoryForm.addEventListener('submit', function (e) {
                e.preventDefault();

                responseMessage.innerHTML = '';
                const formData = new FormData(subCategoryForm);
                const url = subCategoryForm.getAttribute('action');

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
                            Swal.fire('Success!', 'Sub Category has been added successfully.', 'success')
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