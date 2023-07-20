@extends('admin.layouts.master')
@section('title')
{{ env('APP_NAME') }} | Edit Blog Category Details
@endsection
@push('styles')
@endpush

@section('content')
<div class="page-wrapper">

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Details</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('blog-categories.index') }}">Blog Categories</a></li>
                        <li class="breadcrumb-item active">Edit Blog Category</li>
                    </ul>
                </div>
                <div class="col-auto float-end ms-auto">
                    {{-- <a href="#" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_group"><i
                            class="fa fa-plus"></i> Add Category</a> --}}
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <div class="row">
                    <div class="col-xl-12 mx-auto">
                        <h6 class="mb-0 text-uppercase">Edit Blog Category</h6>
                        <hr>
                        <div class="card border-0 border-4">
                            <div class="card-body">
                                <form action="{{ route('blog-categories.blogCatUpdate') }}" method="POST" >
                                   
                                    @csrf
                                    <div class="border p-4 rounded">
                                        <input type="hidden" name="category_id" value="{{$blog_category->id}}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label"> Name <span style="color: red;">*</span></label>
                                                    <input type="text" name="name" id="" class="form-control" value="{{ $blog_category['name'] }}" placeholder="Blog Category Name">
                                                    @if($errors->has('name'))
                                                        <div class="error" style="color:red;">{{ $errors->first('name') }}</div>
                                                    @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label"> Slug <span style="color: red;">*</span></label>                                        
                                                    <input type="text" name="slug" id="" class="form-control" value="{{ $blog_category['slug'] }}" placeholder="Blog Slug" >                                             
                                                    @if($errors->has('slug'))
                                                        <div class="error" style="color:red;">{{ $errors->first('slug') }}</div>
                                                    @endif
                                            </div>
                                        
                                        <div class="row" style="margin-top: 20px; float: left;">
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn px-5 submit-btn">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

@push('scripts')

@endpush