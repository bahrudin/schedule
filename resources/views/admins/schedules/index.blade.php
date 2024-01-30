@extends('admins.layouts.app')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('contents')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Table List</h3>
                        <button class="btn btn-xs btn-primary float-right btnAdd">
                            <span><i class="fa fa-plus-circle"></i></span> Tambah
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Group Piket</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </div>
    </div>
@endsection

@section('modals')
    @includeIf('admins.categories.modal_add')
    @includeIf('admins.categories.modal_edit')
@endsection

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let eTable = $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                "bFilter": true,
                "bInfo": true,
                "order": [[0, 'desc']],
                "ajax": {
                    "url": "{{ route('schedule.json.list') }}",
                    "dataType": "json",
                    "type": "GET",
                    "data": {"_token": "{{ csrf_token() }}"}
                },
                columns: [
                    {data: "DT_RowIndex", name: 'DT_RowIndex', orderable: false, serachable: false},
                    {data: 'first_name', name: 'first_name'},
                    {data: 'jabatan', name: 'jabatan'},
                    {data: 'name', name: 'name'},
                    {data: "Actions", orderable: false, serachable: false, sClass: 'text-center'},
                ]
            });

            //Button add
            $('body').on('click', '.btnAdd', function () {
                $('#myModalAdd').modal('show');
                $('#formAdd').trigger('reset');
            });

            /* Button submit add data */
            $('#formAdd').submit(function (e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    type: "POST",
                    {{--url: "{{ route('') }}", /* endpoint */--}}
                    data: formData,
                    success: function (response) {
                        if (response.status == true) {
                            $('#myModalAdd').modal('hide');
                            $('#formAdd').trigger('reset');
                            eTable.draw();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Good Job',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        } else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: 'Validation',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    },
                    error: function (response) {
                        console.log(response.message);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                            confirmButtonText: "Close"
                        });
                    }
                });
            });

            //Button Edit
            $(document).on('click', '.btnEdit', function () {
                let dataId = $(this).data('id');
                $.ajax({
                    type: 'GET',
                    url: '' + dataId,
                    success: function (data) {
                        $('#formEdit input[name="id"]').val(data.id);
                        $('#formEdit input[name="name"]').val(data.name);
                        $('#formEdit input[name="sort_order"]').val(data.sort_order);
                        $('#formEdit #txtDescriptions').val(data.descriptions);
                    },
                    error: function () {
                    }
                });
            });

            //Button Edit Saved
            $('#formEdit').submit(function (e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let dataId = $('#formEdit').find('input[name="id"]').val();
                $.ajax({
                    type: 'PUT',
                    url: '/admin/blog-category/' + dataId, //endpoint
                    data: formData,
                    success: function (response) {
                        if (response.status == true) {
                            $('#myModalEdit').modal('hide');
                            $('#formEdit').trigger('reset');
                            eTable.draw();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Good Job',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.status);
                        console.log(xhr.status);
                    }
                });
            });

            //Button Delete
            $(document).on('click', '.btnDelete', function () {
                Swal.fire({
                    title: 'Anda Yakin! Hapus Data?',
                    showCancelButton: true,
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    /*isConfirmed */
                    if (result.isConfirmed) {
                        let dataId = $(this).data('id');
                        $.ajax({
                            type: 'DELETE',
                            url: '' + dataId, // endpoint
                            success: function (response) {
                                if (response.status == true) {
                                    eTable.draw();
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: 'success',
                                        title: 'Good Job',
                                        text: response.message,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                if (xhr.status == 404) {
                                    eTable.draw();
                                }
                            }
                        });
                    }
                });
            });

        });

    </script>
@endpush
