@extends('layouts.master')
@section('dish', 'active')
@section('title', 'Dishes')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <h5 class="mt-1">Dishes List Page</h5>
                    <div class="col-12">
                        <a href="{{ route('dish.create') }}"> <i class="fa-duotone fa-circle-plus">Add New
                                Dish</i></a>
                        <div class="card">
                            <div class="card-header">

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="category" class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Name</th>
                                            {{-- <th>Image</th> --}}
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#dish').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{{ route('getDatatableDish') }}',
                columns: [


                    {
                        data: 'name',
                        name: 'name',
                        class: 'text-center',
                    },
                    // {
                    //     data: 'action',
                    //     name: 'action',
                    //     class: 'text-center',
                    // }

                ],
                // order: [
                //     [
                //         0, 'desc',
                //     ]
                // ],
                // columnDefs: [
                //     {
                //         target: 0,
                //         visible: false,
                //     },
                //     {
                //         target: 0,
                //         class: "control",
                //     },
                //     {
                //         target: "no-sort",
                //         orderable: false,
                //     },
                //     {
                //         target: "no-search",
                //         searchable: false,
                //     },
                // ],

            });

            // $(document).on('click', '.delete-btn', function(e) {
            //     e.preventDefault();
            //     var id = $(this).data('id');
            //     Swal.fire({
            //         title: 'Are you sure, you want to delete?',
            //         showCancelButton: true,
            //         confirmButtonText: `Confirm`,
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             $.ajax({
            //                 url: '/category/' + id,
            //                 type: 'DELETE',
            //                 success: function() { // $(document).on('click', '.delete-btn', function(e) {
            //     e.preventDefault();
            //     var id = $(this).data('id');
            //     Swal.fire({
            //         title: 'Are you sure, you want to delete?',
            //         showCancelButton: true,
            //         confirmButtonText: `Confirm`,
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             $.ajax({
            //                 url: '/category/' + id,
            //                 type: 'DELETE',
            //                 success: function() {
            //                     table.ajax.reload();
            //                 }
            //             });
            //         }
            //     })
            // });
            //                     table.ajax.reload();
            //                 }
            //             });
            //         }
            //     })
            // });
        });
    </script>
@endsection
