<x-app-layout>
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="add-item d-flex">
                        <div class="page-title">
                            <h4>New Employee</h4>
                            <h6>Create new Employee</h6>
                        </div>
                    </div>
                    <ul class="table-top-head">
                        <li>
                            <div class="page-btn">
                                <a href="{{ route('admin.employee.list') }}"
                                    class="btn btn-secondary">
                                    <i data-feather="arrow-left" class="me-2"></i>
                                    Back to Employee List
                                </a>
                            </div>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header">
                                <i data-feather="chevron-up" class="feather-chevron-up"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <x-form.add-employee />
            </div>
        </div>
    </div>

</x-app-layout>