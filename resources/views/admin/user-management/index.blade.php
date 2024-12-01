@extends('layouts.dashboard')
@section('custom_css')
    <!-- data table css -->
    <link rel="stylesheet" href="{{ asset('vendor/DataTables-2.1.8/css/dataTables.bootstrap5.min.css') }}">
    <!-- button css -->
    <link rel="stylesheet" href="{{ asset('vendor/Buttons-3.1.2/css/buttons.bootstrap5.min.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('vendor/Responsive-3.0.3/css/responsive.bootstrap5.min.css') }}">
    <style>
        /* custom style datatable
                                                                                                                        *because the template is free version
                                                                                                                        *me must custome it, before, location the paging in the left bellow (under number search result)
                                                                                                                        * */
        .dt-paging {
            display: flex;
            justify-content: right;
            align-items: right;
            gap: 8px;
        }

        .dt-paging .paginate_button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 6px 12px;
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .dt-paging .paginate_button:hover {
            background-color: #0056b3;
        }

        .dt-paging .paginate_button.current {
            background-color: #0056b3;
            color: white;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid p-0">
        <h2 class="mb-3">User Management</h2>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Management</li>
            </ol>
        </nav>
        <hr>
        <div class="mb-3">
            <button class="btn btn-primary btn-add rounded-3" id="btn-add" data-bs-toggle="modal"
                data-bs-target="#modal-add-users"><i class="bi bi-plus-lg"></i> Register New User</button>
            <button class="btn btn-success btn-refresh rounded-3" id="btn-refresh"><i class="bi bi-arrow-clockwise"></i>
                Refresh Data</button>
            <button class="btn btn-secondary btn-reload rounded-3" id="btn-reload"><i class="bi bi-arrow-clockwise"></i>
                Reload Page</button>

        </div>
        <div class="row mb-2">
            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User management table data</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table-user-management" style="width:100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col" style="width: 15px;">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Verified</th>
                                    <th scope="col">Group</th>
                                    <th scope="col">Google Account</th>
                                    <th scope="col">Registered</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- start - modal add user group -->
    <div class="modal fade" id="modal-add-users" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modal-add-users"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-add-user-group-title">Modal add user group</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:;" method="post" id="form-add-user-management">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="mb-2">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Name: e.g. ahmad">
                                </div>
                                <div class="mb-2">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Input the password">
                                </div>
                                <div class="mb-2">
                                    <label for="is-active" class="form-label">Active</label>
                                    <select name="is_active" id="is-active" class="form-control">
                                        <option value="null">-Select active status-</option>
                                        <option value="0">Non active</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Name: e.g. ahmad@account.com">
                                </div>
                                <div class="mb-2">
                                    <label for="password-confirmation" class="form-label">Password confirmation</label>
                                    <input type="password" name="password_confirmation" id="password-confirmation"
                                        class="form-control" placeholder="Input password confirmation">
                                </div>
                                <div class="mb-2">
                                    <label for="group-user" class="form-label">Group user</label>
                                    <select name="group_user" id="group-user" class="form-control">
                                        <option value="null">-Select group user-</option>
                                        @foreach ($userGroup as $ug)
                                            <option value="{{ $ug->id }}">{{ $ug->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end - modal add user group -->
@endsection
@push('custom_js')
    <!-- data table cdn cores start -->
    <script src="{{ asset('vendor/DataTables-2.1.8/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/DataTables-2.1.8/js/dataTables.bootstrap5.min.js') }}"></script>
    <!-- responsive -->
    <script src="{{ asset('vendor/Responsive-3.0.3/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendor/Responsive-3.0.3/js/responsive.bootstrap5.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <!-- button -->
    <script src="{{ asset('vendor/Buttons-3.1.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/Buttons-3.1.2/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendor/Buttons-3.1.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/Buttons-3.1.2/js/buttons.print.min.js') }}"></script>
    <!-- data table cdn cores start -->
    <script src="{{ asset('dist/admin/user-management/view.min.js?q=') . time() }}"></script>
@endpush
