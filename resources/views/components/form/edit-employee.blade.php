<form action="{{ route('admin.employee.update') }}" method="POST" enctype="multipart/form-data" id="edit-employee-form">
    @csrf

    <input type="hidden" name="user_id" value="{{ $account->user_id }}">
    <input type="hidden" name="account_id" value="{{ $account->account_id }}">
    <input type="hidden" name="employee_id" value="{{ $account->employee_id }}">
    <input type="hidden" name="profile" value="{{ $account->profile }}">

    <div class="card">
        <div class="card-body">
            <div class="new-employee-field">
                <div class="card-title-head">
                    <h6>
                        <span>
                            <i data-feather="info" class="feather-edit"></i>
                        </span>
                        Employee Information
                    </h6>
                </div>
                <div class="profile-pic-upload">
                    <div class="profile-pic" id="profile-pic-preview">
                        @if ($account->profile)
                            <img src="{{ $account->profile }}" alt="Profile Image" class="img-fluid" style="object-fit: cover;width:115px;height:115px;border-radius:10px;">
                        @else
                            <span><i data-feather="plus-circle" class="plus-down-add"></i> Profile Photo</span>
                        @endif
                    </div>
                    <div class="input-blocks mb-0">
                        <div class="image-upload mb-0">
                            <input type="file" name="profile" id="profile-upload">
                            <div class="image-uploads">
                                <h4>Change Image</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="firstname" class="form-control" value="{{ old('firstname', $account->firstname) }}">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="mb-3">
                            <label class="form-label">M.I.:</label>
                            <input type="text" name="mi" class="form-control" value="{{ old('mi', $account->mi) }}">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="lastname" class="form-control" value="{{ old('lastname', $account->lastname) }}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $account->phone) }}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <select class="select" name="gender">
                                <option value="">Choose</option>
                                <option value="Male" {{ old('gender', $account->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender', $account->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="input-blocks">
                            <label>Date of Birth</label>
                            <div class="input-groupicon calender-input">
                                <i data-feather="calendar" class="info-img"></i>
                                <input type="text" name="birthday" class="datetimepicker form-control" value="{{ old('birthday', $account->birthday) }}" placeholder="Select Date">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Civil Status</label>
                            <select class="select" name="civil_status">
                                <option value="">Choose</option>
                                <option value="Single" {{ old('civil_status', $account->civil_status) == 'Single' ? 'selected' : '' }}>Single</option>
                                <option value="Married" {{ old('civil_status', $account->civil_status) == 'Married' ? 'selected' : '' }}>Married</option>
                                <option value="Divorce" {{ old('civil_status', $account->civil_status) == 'Divorce' ? 'selected' : '' }}>Divorce</option>
                                <option value="Separated" {{ old('civil_status', $account->civil_status) == 'Separated' ? 'selected' : '' }}>Separated</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Religion</label>
                            <input type="text" name="religion" class="form-control" value="{{ old('religion', $account->religion) }}">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="input-blocks summer-description-box transfer mb-3">
                            <label>Address</label>
                            <textarea class="form-control h-100" rows="5" name="address">{{ old('address', $account->address) }}</textarea>
                            <p class="mt-1">Maximum 60 Characters</p>
                        </div>
                    </div>
                </div>

                <div class="other-info">
                    <div class="card-title-head">
                        <h6>
                            <span>
                                <i data-feather="info" class="feather-edit"></i>
                            </span>
                            Employment Information
                        </h6>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Designation</label>
                                <input type="text" name="designation" class="form-control" value="{{ old('designation', $account->designation) }}">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Experience</label>
                                <input type="text" name="experience" class="form-control" value="{{ old('experience', $account->experience) }}">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Salary</label>
                                <input type="text" name="salary" class="form-control" value="{{ old('salary', $account->salary) }}">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="input-blocks">
                                <label>Hired Date</label>
                                <div class="input-groupicon calender-input">
                                    <i data-feather="calendar" class="info-img"></i>
                                    <input type="text" class="datetimepicker form-control" name="hired_date" value="{{ old('hired_date', $account->hired_date) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="input-blocks">
                                <label>Resign Date</label>
                                <div class="input-groupicon calender-input">
                                    <i data-feather="calendar" class="info-img"></i>
                                    <input type="text" class="datetimepicker form-control" name="resign_date" value="{{ old('resign_date', $account->resign_date) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pass-info">
                    <div class="card-title-head">
                        <h6>
                            <span>
                                <i data-feather="info" class="feather-edit"></i>
                            </span>
                            Account Details
                        </h6>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email', $account->email) }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="input-blocks mb-md-0 mb-sm-3">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="input-blocks mb-0">
                                <label>Confirm Password</label>
                                <div class="pass-group">
                                    <input type="password" class="pass-inputa" name="password_confirmation" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-end mb-3">
        <button type="button" class="btn btn-cancel me-2">Cancel</button>
        <button type="submit" class="btn btn-submit">Save Employee</button>
    </div>
</form>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#profile-upload').on('change', function() {
                var file = this.files[0];
                if (file) {
                    var maxSize = 2 * 1024 * 1024;
    
                    if (file.size > maxSize) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'File size exceeds the 2MB limit. Please choose a smaller file.',
                        });
                        $('#profile-upload').val('');
                        return;
                    }

                    var allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                    if (!allowedMimeTypes.includes(file.type)) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Invalid file type. Please upload a PNG, JPG, or JPEG file.',
                        });
                        $('#profile-upload').val('');
                        return;
                    }
    
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#profile-pic-preview').html('<img src="' + e.target.result + '" alt="Profile Image" class="img-fluid" style="object-fit: cover;width:115px;height:115px;border-radius:10px;">');
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("edit-employee-form");

            form.addEventListener("submit", function (e) {
                e.preventDefault();

                const formData = new FormData(form);
                const url = form.action;

                fetch(url, {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                    },
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        form.reset();
                        Swal.fire('Success!', 'Employee updated successfully.', 'success').then(() => {
                            window.location.href = '{{ route('admin.employee.list') }}';
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An unexpected error occurred. Please try again.',
                        });
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while updating the employee. Please try again.',
                    });
                });
            });
        });
    </script>
@endpush