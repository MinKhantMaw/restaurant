@extends('layouts.master')
@section('title', 'Table Update')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-2">
                            <div class="card-header">
                                Table
                            </div>
                            <div class="card-body">
                                <form action="{{ route('tables.update', $table->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label class="control-label">Table Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $table->name }}">
                                    </div>
                                    @error('name')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
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

@section('scripts')
{{-- {!! JsValidator::formRequest('App\Http\Requests\CategoryStoreRequest', '#create-form') !!} --}}
@endsection
