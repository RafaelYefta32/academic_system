@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">DataTables.Net</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Datatables</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Data</h4>
                                <a href="{{ route('dosenCreate') }}" class="btn btn-primary btn-round ms-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Data
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Birth Date</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($lecturers as $lecturer)
                                            <tr>
                                                <td>{{ $lecturer->nik }}</td>
                                                <td>{{ $lecturer->name }}</td>
                                                <td>{{ $lecturer->email }}</td>
                                                <td>{{ $lecturer->birth_date }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <button type="button" data-bs-toggle="tooltip" title="Edit Dosen"
                                                            class="btn btn-link btn-primary btn-lg edit-dosen"
                                                            data-original-title="Edit Dosen"
                                                            data-url="{{ route('dosenEdit', [$lecturer->nik]) }}">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <form method="POST"
                                                            action="{{ route('dosenDelete', [$lecturer->nik]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" data-bs-toggle="tooltip" title=""
                                                                class="btn btn-link btn-danger del-dosen"
                                                                data-original-title="Remove">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('ExtraCSS')
@endsection

@section('ExtraJS')
    <script src="{{ asset('assets/js/plugin/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script>
        $(".edit-dosen").click(function() {
            window.location.href = $(this).data("url")
        })
        $(".del-dosen").click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Are you sure want to delete this data?",
                showCancelButton: true,
                confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(e.target).closest("form").submit()
                }
            })
        })
        @if (session('status'))
            $.notify({
                message: "{{ session('status') }}"
            }, {
                delay: 5000,
                type: "info",
            })
        @endif
    </script>
@endsection
