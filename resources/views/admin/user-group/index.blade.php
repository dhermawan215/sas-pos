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
        <h2 class="mb-3">User Group</h2>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Group</li>
            </ol>
        </nav>
        <hr>
        <div class="mb-3">
            <button class="btn btn-primary btn-add rounded-3" id="btn-add" data-bs-toggle="modal"
                data-bs-target="#modal-add-user-group"><i class="bi bi-plus-lg"></i> User
                Group</button>
            <button class="btn btn-success btn-refresh rounded-3" id="btn-refresh"><i class="bi bi-arrow-clockwise"></i>
                Refresh Data</button>
            <button class="btn btn-secondary btn-reload rounded-3" id="btn-reload"><i class="bi bi-arrow-clockwise"></i>
                Reload Page</button>
            <button class="btn btn-danger btn-delete rounded-3" id="btn-delete"><i class="bi bi-trash3"></i>
                Delete Page</button>
        </div>
        <div class="row mb-2">
            <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User group table data</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table-user-group" style="width:100%">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col" style="width: 15px;">#</th>
                                    <th scope="col" style="width: 15px;">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
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
    <div class="modal fade" id="modal-add-user-group" tabindex="-1" aria-labelledby="modal-add-user-group"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-add-user-group-title">Modal add user group</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:;" method="post" id="form-add-user-group">
                        @csrf
                        <div class="mb-2">
                            <label for="name-user-group" class="form-label">Name user group</label>
                            <input type="text" name="name" id="name-user-group" class="form-control"
                                placeholder="Name of user group: e.g. Admin/User">
                        </div>
                        <div class="mb-2">
                            <button type="submit" class="btn btn-primary">Save</button>
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
    <!-- start - modal edit user group -->
    <div class="modal fade" id="modal-edit-user-group" tabindex="-1" aria-labelledby="modal-edit-user-group"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-add-user-group-title">Modal edit user group</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:;" method="post" id="form-edit-user-group">
                        @csrf
                        <input type="hidden" name="xValue" id="x-value">
                        <div class="mb-2">
                            <label for="name-user-group-edit" class="form-label">Name user group</label>
                            <input type="text" name="name" id="name-user-group-edit" class="form-control"
                                placeholder="Name of user group: e.g. Admin/User">
                        </div>
                        <div class="mb-2">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end - modal edit user group -->
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
    <script src="{{ asset('dist/admin/user-group/view.min.js?q=') . time() }}"></script>
@endpush
