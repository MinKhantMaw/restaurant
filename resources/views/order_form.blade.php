<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Order Form</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-body">
            {{-- @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif --}}
            <h3>Order Form</h3>
            <!-- ./row -->
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-12">
                    <div class="card card-primary card-tabs">
                        <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                        href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                        aria-selected="true">New Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                        href="#custom-tabs-one-profile" role="tab"
                                        aria-controls="custom-tabs-one-profile" aria-selected="false">Order Lists</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            {{-- @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif --}}
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-home-tab">
                                    <form action="{{ route('order-submit') }}" method="POST">
                                        @csrf
                                        <div class="row">

                                            @foreach ($dishes as $dish)
                                                <div class="col-sm-3">
                                                    <div class="card" style="width: 18rem;">
                                                        <img src="{{ asset('storage/dishes/' . $dish->image) }}"
                                                            class="card-img-top" alt="..." style="height: 200px;">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Dish Name : <span
                                                                    class="text-bold">{{ $dish->name }}</span></h5>
                                                            <input type="text" class="form-control my-1"
                                                                name="{{ $dish->id }}">

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="form-group">
                                            <select name="table" id="">
                                                @foreach ($tables as $table)
                                                    <option class="form-control" value="{{ $table->id }}">
                                                        {{ $table->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="submit" class="btn btn-success" value="Submit">
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                    aria-labelledby="custom-tabs-one-profile-tab">
                                    {{-- @if (session('serve'))
                                        <div class="alert alert-success">
                                            {{ session('serve') }}
                                        </div>
                                    @endif --}}
                                    <table class="table table-bordered table-striped" id="order-list">
                                        <thead>
                                            <tr>
                                                <th>Dish Name</th>
                                                <th>Table Number</th>
                                                <th>Status</th>
                                                <th>Price</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $order->dishes->name ?? '-' }}</td>
                                                    <td>{{ $order->table->name ?? '-' }}</td>
                                                    <td>{{ $status[$order->status] }}</td>
                                                    <td>{{ $order->dishes->price }}</td>
                                                    <td>
                                                        <div>
                                                           <form action="{{ route('order-done',$order->id) }}" method="POST">
                                                            @csrf
                                                                <button class="btn btn-sm btn-success">Serve</button>
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
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="/plugins/datatables/jquery.dataTables.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(function($) {
        $('#order-list').DataTable();

        @if (session('create'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                title: 'Successfully Created',
                text: "{{ session('create') }}",
                icon: 'success'
            })
        @elseif (session('update'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                title: 'Successfully Updated',
                text: "{{ session('update') }}",
                icon: 'success'
            })
        @endif


    })
</script>

</html>
