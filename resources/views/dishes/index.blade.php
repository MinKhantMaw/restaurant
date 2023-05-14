@extends('layouts.master')
@section('dish', 'active')
@section('title', 'Dishes')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <h5 class="mt-1 mx-3">Dishes List Page</h5>
                    <div class="col-12">
                        <a href="{{ route('dish.create') }}" class="btn btn-primary my-2"><i class="fas fa-plus-circle"></i>
                            Create New Dish</a>
                        <div class="card">
                            <div class="card-header">

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dish" class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Name</th>
                                            <th>Category Name</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($dishes as $dish)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $dish->name }}</td>
                                                <td>{{ $dish->category->name ?? '' }}</td>
                                                <td>
                                                    <img alt="Product Logo" class="rounded text-center"
                                                        style="height: 100px;"
                                                        src="{{ asset('storage/dishes/' . $dish->image) }}">
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center text-white">
                                                        <a href="{{ route('dish.edit', $dish->id) }}" class="btn btn-outline-warning btn-sm text-dark mt-2 mr-2 "><i class="fas fa-edit "></i> Edit
                                                           </a>
                                                        <form action="{{ route('dish.destroy', $dish->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-outline-danger btn-sm text-dark mt-2"><i
                                                                    class="fas fa-trash-alt"></i> Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
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

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dish').DataTable();
        });
    </script>
@endsection
