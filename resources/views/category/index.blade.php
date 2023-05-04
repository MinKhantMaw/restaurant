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
                        <a href="{{ route('category.create') }}"> <i class="fa-duotone fa-circle-plus">Add New
                                Category</i></a>
                        <div class="card">
                            <div class="card-header">

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                            {{-- <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($categories as $category)
                                            <tr class="text-center">
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-outline-warning mr-2">Edit</a>
                                                        <form action="{{ route('category.delete', $category->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-outline-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                                {{-- <td>-</td>
                                                <td>-</td>
                                                <td>U</td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
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
