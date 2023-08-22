@extends('admin.layouts.master')
@section('title')
{{ env('APP_NAME') }} | Create Customer
@endsection
@push('styles')
@endpush

@section('content')
<div class="page-wrapper">

    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Home Cms</li>
                    </ul>
                </div>
               
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <div class="row">
                    <div class="col-xl-12 mx-auto">
                        <div class="card border-0 border-4">
                            <div class="card-body">
                                <form action="{{route('home.cms.update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="border p-4 rounded">
                                        <input type="hidden" name="home_cms_id" value="{{$home_cms->id}}">
                                        <div class="row">
                                            <label><h3>Banner 1 section :</h3></label>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label">Title <span style="color: red;">*</span></label>
                                                <input type="text" name="banner1_title" id="" class="form-control" value="{{$home_cms->banner1_title }}" placeholder="Enter banner 1 title">
                                                @if($errors->has('banner1_title'))
                                                <div class="error" style="color:red;">{{ $errors->first('banner1_title') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label">Subtitle <span style="color: red;">*</span></label>
                                                <textarea name="banner1_subtitle" id="" class="form-control" value="" placeholder="Enter banner 1 subtitle">{{$home_cms->banner1_subtitle}}</textarea>
                                                @if($errors->has('banner1_subtitle'))
                                                <div class="error" style="color:red;">{{ $errors->first('banner1_subtitle') }}</div>
                                                @endif
                                            </div>
                                            </br>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label"> Image <span style="color: red;">*</span></label>
                                                <input type="file" name="banner1_image" id="" class="form-control" value="{{ old('banner1_image') }}">
                                                @if($errors->has('banner1_image'))
                                                <div class="error" style="color:red;">{{ $errors->first('banner1_image') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <img src="{{ Storage::url($home_cms->banner1_image) }}" alt=""
                                                                        class="image_preview" width="100px" height="100px">
                                            </div>
                                        </div> 
                                        </br>
                                        <div class="row">
                                            <label><h3>Banner 2 section :</h3></label>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label">Title <span style="color: red;">*</span></label>
                                                <input type="text" name="banner2_title" id="" class="form-control" value="{{$home_cms->banner2_title }}" placeholder="Enter banner 2 title">
                                                @if($errors->has('banner2_title'))
                                                <div class="error" style="color:red;">{{ $errors->first('banner2_title') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label">Subtitle <span style="color: red;">*</span></label>
                                                <textarea name="banner2_subtitle" id="" class="form-control" value="{{ old('banner2_subtitle') }}" placeholder="Enter banner 2 subtitle">{{$home_cms->banner2_subtitle }}</textarea>
                                                @if($errors->has('banner2_subtitle'))
                                                <div class="error" style="color:red;">{{ $errors->first('banner2_subtitle') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label"> Image <span style="color: red;">*</span></label>
                                                <input type="file" name="banner2_image" id="" class="form-control" value="{{ old('banner2_image') }}">
                                                @if($errors->has('banner2_image'))
                                                <div class="error" style="color:red;">{{ $errors->first('banner2_image') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <img src="{{ Storage::url($home_cms->banner2_image) }}" alt=""
                                                                        class="image_preview" width="100px" height="100px">
                                            </div>
                                        </div>  
                                        </br>
                                        <div class="row">
                                            <label><h3>Banner 3 section :</h3></label>   
                                             <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label">Title <span style="color: red;">*</span></label>
                                                <input type="text" name="banner3_title" id="" class="form-control" value="{{$home_cms->banner3_title }}" placeholder="Enter banner 3 title">
                                                @if($errors->has('banner3_title'))
                                                <div class="error" style="color:red;">{{ $errors->first('banner3_title') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label">Subtitle <span style="color: red;">*</span></label>
                                                <textarea name="banner3_subtitle" id="" class="form-control" value="{{ old('footer_section') }}" placeholder="Enter banner 3 subtitle">{{$home_cms->banner3_subtitle }}</textarea>
                                                @if($errors->has('banner3_subtitle'))
                                                <div class="error" style="color:red;">{{ $errors->first('banner3_subtitle') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label"> Image <span style="color: red;">*</span></label>
                                                <input type="file" name="banner3_image" id="" class="form-control" value="">
                                                @if($errors->has('banner3_image'))
                                                <div class="error" style="color:red;">{{ $errors->first('banner3_image') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                 <img src="{{ Storage::url($home_cms->banner3_image) }}" alt=""
                                                                        class="image_preview" width="100px" height="100px">
                                            </div>
                                        </div>    
                                        <div class="row">
                                            <label><h3>Body section :</h3></label>   
                                             <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label">Title <span style="color: red;">*</span></label>
                                                <input type="text" name="body_title" id="" class="form-control" value="{{$home_cms->body_title }}" placeholder="Enter body title">
                                                @if($errors->has('body_title'))
                                                <div class="error" style="color:red;">{{ $errors->first('body_title') }}</div>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputEnterYourName" class="col-form-label">Content <span style="color: red;">*</span></label>
                                                <textarea name="body_section"  class="form-control" id="editor1" cols="30" rows="10"  placeholder="Enter body content">{{$home_cms->body_section }}</textarea>
                                                @if($errors->has('body_section'))
                                                <div class="error" style="color:red;">{{ $errors->first('body_section') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label><h3>Footer section :</h3></label>   
                                            <div class="col-md-12">
                                                <label for="inputEnterYourName" class="col-form-label">Content <span style="color: red;">*</span></label>
                                                <textarea name="footer_section" id="editor2" class="form-control"  placeholder="Enter footer content">{{$home_cms->footer_section }}</textarea>
                                                @if($errors->has('footer_section'))
                                                <div class="error" style="color:red;">{{ $errors->first('footer_section') }}</div>
                                                @endif
                                            </div>
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
 <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor1');
        CKEDITOR.on('instanceReady', function(evt) {
            var editor = evt.editor;

            editor.on('change', function(e) {
                var contentSpace = editor.ui.space('contents');
                var ckeditorFrameCollection = contentSpace.$.getElementsByTagName('iframe');
                var ckeditorFrame = ckeditorFrameCollection[0];
                var innerDoc = ckeditorFrame.contentDocument;
                var innerDocTextAreaHeight = $(innerDoc.body).height();
                console.log(innerDocTextAreaHeight);
            });
        });
    </script>
    <script>
        CKEDITOR.replace('editor2');
        CKEDITOR.on('instanceReady', function(evt) {
            var editor = evt.editor;

            editor.on('change', function(e) {
                var contentSpace = editor.ui.space('contents');
                var ckeditorFrameCollection = contentSpace.$.getElementsByTagName('iframe');
                var ckeditorFrame = ckeditorFrameCollection[0];
                var innerDoc = ckeditorFrame.contentDocument;
                var innerDocTextAreaHeight = $(innerDoc.body).height();
                console.log(innerDocTextAreaHeight);
            });
        });
    </script>

@endpush