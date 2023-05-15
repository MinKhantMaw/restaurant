@extends('layouts.master')
@section('table', 'active')
@section('title', 'Table')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <h5 class="mt-1">Table List Page</h5>
                    <div class="col-12">
                        <a href="{{ route('tables.create') }}" class="btn btn-primary my-2"><i class="fas fa-plus-circle"></i>
                            Create New Table</a>
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($tables as $table)
                                            <tr class="text-center">
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $table->name }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('tables.edit', $table->id) }}"
                                                            class="btn btn-sm btn-outline-warning mr-2">Edit</a>
                                                        <form action="{{ route('tables.destroy', $table->id) }}"
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
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
            var table = $('#table').DataTable({});
        });
    </script>
@endsection
