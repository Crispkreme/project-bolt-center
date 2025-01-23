<div class="modal fade" id="add-category" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Add New Category</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <div id="response-message"></div> <!-- Added for displaying response messages -->
                        <form id="categoryForm" action="{{ route('admin.category.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" id="category" name="category" class="form-control" required>
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
        document.addEventListener('DOMContentLoaded', function () {
            const categoryForm = document.getElementById('categoryForm');
            const responseMessage = document.getElementById('response-message');

            categoryForm.addEventListener('submit', async function (e) {
                e.preventDefault();

                responseMessage.innerHTML = '';
                const formData = new FormData(categoryForm);
                const url = categoryForm.getAttribute('action');

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
                            const errors = errorData.errors || {};
                            responseMessage.innerHTML = `
                                <div class="alert alert-danger">
                                    ${Object.values(errors).flat().join('<br>')}
                                </div>`;
                        } else {
                            responseMessage.innerHTML = `
                                <div class="alert alert-danger">
                                    An error occurred. Please try again.
                                </div>`;
                        }
                        return;
                    }

                    const data = await response.json();
                    if (data.success) {
                        Swal.fire('Success!', 'Category has been added successfully.', 'success')
                            .then(() => {
                                location.reload();
                            });
                    } else {
                        responseMessage.innerHTML = `
                            <div class="alert alert-danger">
                                ${data.message || 'An error occurred.'}
                            </div>`;
                    }
                } catch (error) {
                    console.error('Error:', error);
                    responseMessage.innerHTML = `
                        <div class="alert alert-danger">
                            An unexpected error occurred. Please try again.
                        </div>`;
                }
            });
        });
    </script>
@endpush