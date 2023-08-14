@extends('user.layouts.master')
@section('title')
    {{ env('APP_NAME') }} User | Profile
@endsection
@push('styles')
<style>
    .kbw-signature {
        width: 100%;
        height: 100px;
    }
</style>
@endpush

@section('content')
    <div class="page-wrapper invoice_page">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                    {{-- <div class="breadcrumb-title pe-3">Admin Profile</div> --}}
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">

                            </ol>
                        </nav>
                    </div>

                </div>
                <!--end breadcrumb-->
                <div class="user-profile-page">

                    <div class="card-body">
                        <div class="row">
                            <!--<div class="row">-->
                            <!--    <div class="col-12 col-lg-7 border-right">-->
                            <!--        <div class="d-md-flex align-items-center">-->
                            <!--            <div class="mb-md-0 mb-3">-->
                            <!--                @if (!Auth::user()->logo)-->
                            <!--                    <a href="{{ asset('frontend_assets/img/logo.png') }}" target="_blank">-->
                            <!--                        <img src="{{ asset('frontend_assets/img/logo.png') }}"-->
                            <!--                            class="rounded-circle shadow" width="130" height="130"-->
                            <!--                            alt="" /></a>-->
                            <!--                @else-->
                            <!--                    <a href="{{ Storage::url(Auth::user()->logo) }}" target="_blank">-->
                            <!--                        <img src="{{ Storage::url(Auth::user()->logo) }}"-->
                            <!--                            class="rounded-circle shadow" width="130" height="130"-->
                            <!--                            alt=""></a>-->
                            <!--                @endif-->
                            <!--            </div>-->
                            <!--            <div class="ms-md-4 flex-grow-1">-->
                            <!--                <div class="d-flex align-items-center mb-1">-->
                            <!--                    <h4 class="mb-0">{{ Auth::user()->name }}</h4>-->
                            <!--                </div>-->
                            <!--                <p class="mb-0 text-muted">User</p>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--end row-->

                         <div classs="col-xl-12">
                             <div class="tab-content-wrap">
                                <div class="tab-content mt-3">
                                <div class="tab-pane fade show active" id="Edit-Profile">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-body">
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-6 col-12 border-right mt-3">
                                                      <div class="profile-form-wrap">
                                                          <h2>My Profile</h2>
                                                          <div class="d-md-flex align-items-center">
                                                            <div class="profile-img-1 my-3">
                                                                @if (!Auth::user()->logo)
                                                                                                                <a href="{{ asset('frontend_assets/img/logo3.png') }}" target="_blank">
                                                                        <img src="{{ asset('frontend_assets/img/logo3.png') }}" class="rounded-circle shadow" width="130" height="130" alt=""></a>
                                                                        @else
                                                                        <a href="{{ Storage::url(Auth::user()->logo) }}" target="_blank">
                                                                            <img src="{{ Storage::url(Auth::user()->logo) }}" class="rounded-circle shadow" width="130" height="130" alt=""></a>
                                                                        @endif
                                                                                                        </div>
                                                            <div class="ms-md-4 flex-grow-1">
                                                                <div class="d-flex align-items-center mb-1">
                                                                    <h4 class="mb-0">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h4>
                                                                </div>
                                                                <p class="mb-0 text-muted">User</p>
                                                            </div>
                                                        </div>
                                                         <div class="profile-form">
                                                               <form class="row g-3" action="{{ route('user.profile.update') }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="row mt-2">
                                                                <div class="col-lg-6 col-12 my-1">
                                                                    <div class="form-floating">
                                                                      <input type="text" value="{{ Auth::user()->first_name }}"
                                                                        name="first_name" class="form-control"
                                                                        >
                                                                       <label for="floatingInputValue">First Name</label>
                                                                        @if ($errors->has('first_name'))
                                                                        <div class="error" style="color:red;">
                                                                            {{ $errors->first('first_name') }}</div>
                                                                    @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-12 my-1">
                                                                    <div class="form-floating">
                                                                      <input type="text" value="{{ Auth::user()->last_name }}"
                                                                        name="last_name" class="form-control"
                                                                        >
                                                                       <label for="floatingInputValue">Last Name</label>
                                                                        @if ($errors->has('last_name'))
                                                                        <div class="error" style="color:red;">
                                                                            {{ $errors->last('last_name') }}</div>
                                                                    @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 my-1">
                                                                  <div class="form-floating">
                                                                    <input type="text" value="{{ Auth::user()->email }}"
                                                                        name="email" class="form-control">
                                                                    <label for="floatingInputValue">Email Adress</label>        
                                                                    @if ($errors->has('email'))
                                                                        <div class="error" style="color:red;">
                                                                            {{ $errors->first('email') }}</div>
                                                                    @endif
                                                                  </div>
                                                                </div>
                                                                
                                                                <div class="col-12 my-1">
                                                                  <div class="form-floating">
                                                                    <input type="text" value="{{ Auth::user()->phone }}"
                                                                        name="phone" class="form-control phone-format"
                                                                        >
                                                                        <label for="floatingInputValue">Phone</label>
                                                                    @if ($errors->has('phone'))
                                                                        <div class="error" style="color:red;">
                                                                            {{ $errors->first('phone') }}</div>
                                                                    @endif
                                                                  </div>
                                                                </div>


                                                                <div class="col-12 my-1">
                                                                  <div class="form-floating">
                                                                    <input name="address" class="form-control" value="{{ Auth::user()->address }}">
                                                                      <label for="floatingInputValue">Street address</label>
                                                                    @if ($errors->has('address'))
                                                                        <div class="error" style="color:red;">
                                                                            {{ $errors->first('address') }}</div>
                                                                       @endif
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-12 my-1">
                                                                  <div class="form-floating">
                                                                    <input name="address1" class="form-control" value="{{ Auth::user()->address1 }}">
                                                                      <label for="floatingInputValue">Apt., ste., bldg.</label>
                                                                    @if ($errors->has('address1'))
                                                                        <div class="error" style="color:red;">
                                                                            {{ $errors->first('address') }}</div>
                                                                       @endif
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 col-12 my-1">
                                                                      <div class="form-floating">
                                                                    <input type="text" class="form-control"
                                                                        id="inputPassword3" name="city"
                                                                        value="{{ Auth::user()->city }}"
                                                                        >
                                                                        <label for="floatingInputValue">City</label>
                                                                    @if ($errors->has('city'))
                                                                        <div class="error" style="color:red;">
                                                                            {{ $errors->first('city') }}</div>
                                                                    @endif
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-12 my-1">
                                                                  <div class="form-floating">
                                                                    <select class="form-select" name="state" id="floatingSelect" aria-label="Floating label select example">
                                                                        @foreach ($states as $state)
                                                                            <option value="{{ $state->name }}"
                                                                                @if (Auth::user()->state == $state->name) selected @endif>
                                                                                {{ $state->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                     <label for="floatingInputValue">State</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 my-1">
                                                                  <div class="form-floating">
                                                                    <input type="text" class="form-control"
                                                                        id="inputPassword3" name="zipcode"
                                                                        value="{{ Auth::user()->zipcode }}"
                                                                        >
                                                                        <label for="floatingInputValue">Zip Code</label>
                                                                    @if ($errors->has('zipcode'))
                                                                        <div class="error" style="color:red;">
                                                                            {{ $errors->first('zipcode') }}</div>
                                                                    @endif
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 col-12 my-1">
                                                                  <div class="form-floating">
                                                                    <input type="text"
                                                                        value="{{ Auth::user()->company }}"
                                                                        name="company" class="form-control">
                                                                    <label for="floatingInputValue">Company</label>
                                                                    @if ($errors->has('company'))
                                                                        <div class="error" style="color:red;">
                                                                            {{ $errors->first('company') }}</div>
                                                                    @endif
                                                                 </div>
                                                                </div>
                                                                
                                                                <div class="col-lg-6 col-12  my-1">
                                                                    <div class="form-floating">
                                                                    <input type="text" value="{{ Auth::user()->gst }}"
                                                                        name="gst" class="form-control">
                                                                          <label for="floatingInputValue">Annual Resale Certificate for Sales Tax #</label>
                                                                    @if ($errors->has('gst'))
                                                                        <div class="error" style="color:red;">
                                                                            {{ $errors->first('gst') }}</div>
                                                                    @endif
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-lg-6 col-12 my-1">
                                                                    <label class="form-label">Company Logo</label>
                                                                    <input type="file" name="logo"
                                                                        class="form-control">
                                                                    @if ($errors->has('logo'))
                                                                        <div class="error" style="color:red;">
                                                                            {{ $errors->first('logo') }}</div>
                                                                    @endif
                                                                </div>
                                                                <div  class="col-12 my-1">
                                                                    <div class="sign-box">
                                                                        <div class="sign-box_1">
                                                                            <div class="signature">
                                                                                <h2>Signature</h2>
                                                                                <div id="signature"></div>
                                                                                <br><br>
                                                                              <div class="update-btn-div">
                                                                                <button id="reset" class="btn btn-danger">Clear Signature</button>
                                                                                <button type="submit" class="btn btn-primary update-btn">Update</button> 
                                                                              </div>
                                                                                <textarea id="signature_capture" name="signed" hidden></textarea>
                                                                            </div>
                                    
                                                                    </div>
                                                                </div>

                                                            <!--<div class="update-btn-div">-->
                                                            <!--    <div class="col-3 my-1 d-flex justify-content-end">-->
                                                            <!--    <button type="submit" class="btn btn-primary update-btn">Update</button>-->
                                                            <!--  </div>-->
                                                            <!--</div>-->
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
                             </div>
                         </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--end page-content-wrapper-->
        </div>
    @endsection

    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/willowsystems/jSignature/master/libs/jSignature.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.phone-format').mask('+1 999 999 9999');
            });
        </script>
        <script >
            $(document).ready(function() {
                $('#signature').jSignature();
                var $sigdiv = $('#signature');
                var datapair = $sigdiv.jSignature('getData', 'svgbase64');

                $('#signature').bind('change', function(e) {
                    var data = $('#signature').jSignature('getData');
                    $("#signature_capture").val(data);
                    $("#signature_capture").show();
                });

                $('#reset').click(function(e) {
                    $('#signature').jSignature('clear');
                    var data = $('#signature').jSignature('getData');
                    $("#signature_capture").val('');
                    e.preventDefault();
                });

            });

            $('#invoice-modal').click(function() {
                $('#modelWindow').modal('show');
            });
        </script>
    @endpush
