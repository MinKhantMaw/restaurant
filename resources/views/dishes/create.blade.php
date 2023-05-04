@extends('layouts.master')
@section('title', 'Dish Create')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-2">
                            <div class="card-header">
                                Create Dish
                            </div>
                            <div class="card-body">
                                <form action="{{ route('dish.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label">Dish Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    @error('name')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="form-group">
                                        <label class="control-label">Dish Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    @error('name')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror

                                    <div class="form-group">
                                        <label for="">Category</label>
                                        <select class="form-control" name="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-sm btn-primary">Create</button>
                                        <button type="reset" onclick="history.back()"
                                            class="btn btn-sm btn-danger back-btn">Cancel</button>
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
