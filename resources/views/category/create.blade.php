@extends('layouts.master')
@section('title', 'Category')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-2">
                            <div class="card-header">
                                Create Category
                            </div>
                            <div class="card-body">
                                <form action="{{ route('category.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label">Category Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    @error('name')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                    <div>
                                        <button type="submit" class="btn btn-sm btn-primary">Create</button>
                                        <a href="{{ route('category.index') }}" class="btn btn-sm btn-danger">Cancle</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
