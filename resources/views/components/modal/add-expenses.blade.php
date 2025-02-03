<div class="modal fade" id="add-expense">
    <div class="modal-dialog modal-dialog-centered custom-modal-two">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="modal-header border-0 custom-modal-header">
                        <div class="page-title">
                            <h4>Add Expense</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <form action="{{ route('admin.expenses.store') }}" method="POST" id="add-expense-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Expense Name</label>
                                        <input type="text" class="form-control" name="expenses" placeholder="Enter Expense Name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Expense For</label>
                                        <input type="text" class="form-control" name="purpose" placeholder="Enter Purpose">
                                    </div>
                                </div>	
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Expense Date</label>
                                        <input type="date" class="form-control" name="expense_date" placeholder="Choose Date">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Amount</label>
                                        <input type="number" class="form-control" name="amount" step="0.01" placeholder="Enter Amount">
                                    </div>
                                </div>							
                                <div class="col-md-12">
                                    <div class="edit-add card">
                                        <div class="edit-add">
                                            <label class="form-label">Description</label>
                                        </div>
                                        <div class="card-body-list input-blocks mb-0">
                                            <textarea class="form-control" name="description" rows="3" maxlength="600" placeholder="Enter description..."></textarea>
                                        </div>
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
        document.addEventListener('DOMContentLoaded', function () {
            const expensesForm = document.getElementById('add-expense-form');
            const responseMessage = document.getElementById('response-message');

            expensesForm.addEventListener('submit', function (e) {
                e.preventDefault();

                responseMessage.innerHTML = '';
                const formData = new FormData(expensesForm);
                const url = expensesForm.getAttribute('action');

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
                            responseMessage.innerHTML = `<div class="alert alert-danger">
                                An error occurred. Please try again.
                            </div>`;
                        }
                        throw new Error('Response not OK');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        Swal.fire('Success!', 'Expenses has been added successfully.', 'success')
                            .then(() => {
                                location.reload();
                            });
                    } else {
                        responseMessage.innerHTML = `
                            <div class="alert alert-danger">
                                ${data.message || 'An error occurred.'}
                            </div>`;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    responseMessage.innerHTML = `
                        <div class="alert alert-danger">
                            An unexpected error occurred. Please try again.
                        </div>`;
                });
            });
        });
    </script>
@endpush