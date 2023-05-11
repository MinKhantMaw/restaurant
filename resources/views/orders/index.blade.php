@extends('layouts.master')
@section('order', 'active')
@section('title', 'Order List')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <h5 class="mt-1 mx-3">Order List Page</h5>
                    <div class="col-12">
                        {{-- <a href="{{ route('dish.create') }}" class="btn btn-primary my-2"><i class="fas fa-plus-circle"></i>
                            Create New Dish</a> --}}
                        <div class="card">
                            <div class="card-header">

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="order" class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No.</th>
                                            <th>Order ID</th>
                                            <th>Table Name</th>
                                            <th>Dish Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $order->order_id }}</td>
                                                <td>{{ $order->table->name }}</td>
                                                <td>{{ $order->dishes->name }}</td>
                                                <td>
                                                    <img alt="Product Logo" class="rounded text-center"
                                                        style="height: 100px;"
                                                        src="{{ asset('storage/dishes/' . $order->dishes->image) }}">
                                                </td>
                                                {{-- <td>
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
                                                </td> --}}
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
            $('#order').DataTable();
        });
    </script>
@endsection
