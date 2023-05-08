@extends('layouts.master')
@section('category', 'active')
@section('title', 'Category')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <h5 class="mt-1">Category List Page</h5>
                    <div class="col-12">
                        <a href="{{ route('category.create') }}" class="btn btn-primary my-2"><i class="fas fa-plus-circle"></i>
                            Create New Category</a>
                        <div class="card">
                            <div class="card-header">

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="category" class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            {{-- <th>No.</th> --}}
                                            <th>Name</th>
                                            <th>Action</th>
                                            {{-- <th>Action</th> --}}
                                            {{-- <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th> --}}
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($categories as $category)
                                            <tr class="text-center">
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('category.edit', $category->id) }}"
                                                            class="btn btn-sm btn-outline-warning mr-2">Edit</a>
                                                        <form action="{{ route('category.delete', $category->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-outline-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody> --}}
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
            var table = $('#category').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{{ route('getDatatable') }}',
                columns: [


                    {
                        data: 'name',
                        name: 'name',
                        class: 'text-center',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        class: 'text-center',
                    }

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

            $(document).on('click', '.delete-btn', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure, you want to delete?',
                    showCancelButton: true,
                    confirmButtonText: `Confirm`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/category/' + id,
                            type: 'DELETE',
                            success: function() {
                                table.ajax.reload();
                            }
                        });
                    }
                })
            });
        });
    </script>
@endsection
