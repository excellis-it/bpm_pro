@extends('user.layouts.master')
@section('title')
    {{ env('APP_NAME') }} | Create Invoice
@endsection
<!--<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">-->

@push('styles')
    <style>
        .kbw-signature {
            width: 100%;
            height: 100px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin_assets/assets/css/bootstrap.min.css') }}">


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('admin_assets/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/assets/css/responsive.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->

    <style>
        body {
            background-color: #fff;
        }

        .form-div {
            padding: 20px 0px;
        }

        .invoice-div h2 {
            font-size: 26px;
            line-height: 30px;
            padding: 10px 20px;
            font-weight: 600;
            color: #fff;
            border-radius: 30px;
            background: #FF7B02;
            text-align: center;
        }

        .form-left h2 {
            font-size: 20px;
            line-height: 24px;
            font-weight: 600;
            color: #497bac;
        }

        .form-div-wrap {
            padding: 20px 20px 50px 20px;
            box-shadow: 0px 0px 42px rgb(0 0 0 / 10%);
            margin: 20px 0px;
            border-radius: 10px;
        }

        .form-left .form-group {
            padding: 10px 0px;
        }

        .form-left .form-group input {
            margin: 0px 10px;
            line-height: 19px;
            font-weight: 500;
            color: #000;
        }

        .form-left .form-group label {
            font-size: 15px;
            line-height: 19px;
            font-weight: 600;
            color: #000;
        }

        .form-left .form-group select {
            margin: 0px 10px;
            line-height: 19px;
            font-weight: 500;
            color: #6c757d;
        }

        .table thead {
            border-top: 1px solid #000;
            border-Bottom: 1px solid #000;

        }

        .note .form-group label {
            font-size: 15px;
            line-height: 19px;
            font-weight: 600;
            color: #000;
        }

        .signature {
            margin: 20px 0px;
            display: inline-block;
        }

        .signature h2 {
            font-size: 15px;
            line-height: 19px;
            font-weight: 600;
            color: #000;
            display: inline-block;
        }

        /* .signature input {
                                    display: none;
                                } */

        .signature label span {
            width: 100%;
            height: 100%;
            border-radius: inherit;
            cursor: pointer;
            object-fit: cover;
        }

        .signature label {
            width: 35px;
            height: 35px;
            object-fit: cover;
            cursor: pointer;
        }

        .photo h2 {
            font-size: 15px;
            line-height: 19px;
            font-weight: 600;
            color: #000;
            display: inline-block;
        }

        .tax_1 h3 {
            font-size: 15px;
            line-height: 19px;
            font-weight: 600;
            color: #000;
            border-bottom: 1px solid #000;
            padding: 10px 0px;
        }

        .form-right {
            padding: 20px;
            box-shadow: 0px 0px 42px rgb(0 0 0 / 10%);
            margin: 20px 0px;
            border-radius: 10px;
            position: fixed;
            top: 6%;
            right: 2%;
            transform: translate(0%, 0%);
            width: 20%;
            height: 100%;
        }

        .form-right .form-group {
            margin: 20px 0px;
        }

        .form-left .form-group label {
            padding-bottom: 10px;
        }

        .form-item .form-group input {
            margin: 0px 0px;
        }

        .sub-total h3 {
            font-size: 15px;
            line-height: 19px;
            font-weight: 600;
            color: #a79191;
        }

        .sub-total h4 {
            font-size: 15px;
            line-height: 19px;
            font-weight: 600;
            color: #000;
        }

        .add-item-wrap {
            position: relative;
        }

        .cross-btn {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .cross-btn a {
            padding: 5px 10px;
            background: #497bac;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
        }

        .add-btn {
            font-size: 16px;
            padding: 5px 20px;
            font-weight: 600;
            color: #fff;
            border-radius: 30px;
            background: #497bac;
            text-align: center;
        }

        .add-btn:hover {
            color: #fff;
            transition: all ease-in 0.5s;
        }

        .add-item-wrap {
            padding: 35px 20px 20px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            border-radius: 10px;
        }

        .sign-box {
            display: flex;
            justify-content: space-between;
        }

        .sign-box-warp {
            background: rgb(204 204 204 / 31%);
            padding: 20px 100px;
            border-bottom: 1px solid #000;
        }

        .form-left .form-group textarea {
            line-height: 19px;
            font-weight: 500;
            color: #000;
        }

        .invoice-div .form-select {
            color: #fff;
            background-color: #497bac;
            font-size: 20px;
            font-weight: 600;
            text-transform: uppercase;
            border-radius: 10px;
        }

        .item-head h2 {
            font-size: 20px;
            line-height: 24px;
            font-weight: 600;
            color: #000;
        }

        .Item-div h2 {
            font-size: 20px;
            line-height: 24px;
            font-weight: 600;
            color: #fff;
            background: #497bac;
            padding: 10px 20px;
            border-radius: 10px;
        }

        .inv-head h2 {
            font-size: 30px;
            line-height: 34px;
            font-weight: 500;
            color: #000;
        }

        .temp-box {
            padding: 20px 0px;
        }

        .inv-number-div {
            padding: 0px 0px 20px;
        }

        .inv-number {
            margin: 20px 0px;
        }

        .logo-div img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .logo-div {
            width: 80px;
        }

        .bill-head h2 {
            font-size: 20px;
            line-height: 24px;
            font-weight: 600;
            color: #497bac;
        }

        .logo-text h3 {
            font-size: 15px;
            line-height: 19px;
            font-weight: 400;
            color: #000;
            padding: 10px 20px;
        }

        .pre-view {
            padding-right: 20px;
        }

        .pre-view a {
            font-size: 14px;
            color: rgb(0 0 0 / 50%);
            padding: 4px;
            border: 1px solid rgb(0 0 0 / 50%);
            border-radius: 3px;
        }

        /* Responsive */
        @media (max-width:768px) {
            .sign-box {
                display: block;
                .inv-number-div
            }
        }
    </style>
@endpush


@section('content')
    <div class="page-wrapper">
        <section class="form-div">
            <div class="container-fluid">
                <div class="form-div-main">
                    <form method="post" action="{{ route('invoice.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-xl-9 col-md-12 col-12">

                                <div class="inv-head-wrap d-flex justify-content-between">
                                    <div class="inv-head">
                                        <h2>New Invoice No <span id="invoice_show"></span></h2>
                                    </div>

                                    <div class="pre-view-wrap d-flex justify-content-end align-items-center">
                                        <div class="pre-view">
                                            <a href="#" id="invoice-modal"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                        <div class="send-btn">
                                            <button type="submit" class="btn add-btn" id="add">Send</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-div-wrap">
                                    <div class="row justify-content-end">
                                        <div class="col-xl-2 co-md-4 col-12">
                                            <div class="temp-box">
                                                <div class="temp-box-wrap">
                                                    <div class="inv-number">
                                                        <div class="form-floating">
                                                            <select class="form-select" name="type" id="floatingSelect"
                                                                aria-label="Floating label select example" >
                                                                <option selected value="Invoice">Invoice</option>
                                                                <option value="Estimate">Estimate</option>
                                                            </select>
                                                            <label for="floatingSelect">Type</label>
                                                            @if ($errors->has('type'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('type') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 co-md-4 col-12">
                                            <div class="temp-box">
                                                <div class="temp-box-wrap">
                                                    <div class="inv-number">
                                                        <div class="form-floating">
                                                            <select class="form-select" name="currency" id="floatingSelect"
                                                                aria-label="Floating label select example">
                                                                <option selected value="Usd">Usd</option>
                                                            </select>
                                                            <label for="floatingSelect">Curency</label>
                                                             @if ($errors->has('currency'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('currency') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 co-md-4 col-12">
                                            <div class="temp-box">
                                                <div class="temp-box-wrap">
                                                    <div class="inv-number">
                                                        <div class="form-floating">
                                                            <select class="form-select" name="send_in" id="floatingSelect"
                                                                aria-label="Floating label select example">
                                                                <option selected value="1">One time</option>
                                                                <option value="2">Monthly</option>
                                                                <option value="3">Weekly</option>
                                                            </select>
                                                            <label for="floatingSelect">Send in</label>
                                                            @if ($errors->has('send_in'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('send_in') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="row justify-content-end">
                                            <div class="col-xl-12 col-12">
                                                <div class="bill-head">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-12">
                                            <div class="form-left me-3">
                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputEmail3" name="from_name"
                                                            placeholder="Business Name" value="{{ Auth::user()->name }}">
                                                            @if ($errors->has('from_name'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('from_name') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputPassword3"
                                                            placeholder="name@business.com" name="from_email"
                                                            value="{{ Auth::user()->email }}">
                                                            @if ($errors->has('from_email'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('from_email') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">State<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="bill_from_state">
                                                            @foreach ($states as $state)
                                                                <option value="{{ $state->name }}" {{ (Auth::user()->state) == $state->name ? 'selected' : ''}}>{{ $state->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('bill_from_state'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('bill_from_state') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">City<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputPassword3"
                                                            placeholder="City" value="{{ Auth::user()->city }}" name="bill_from_city">
                                                            @if ($errors->has('bill_from_city'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('bill_from_city') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3"
                                                        class="col-sm-2 col-form-label">Address<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputPassword3"
                                                            placeholder="Street" value="{{ Auth::user()->address }}" name="from_address">
                                                            @if ($errors->has('from_address'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('from_address') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Phone<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputPassword3"
                                                            placeholder="(123) 456 789" value="{{ Auth::user()->phone }}" name="bill_from_phone">
                                                            @if ($errors->has('bill_from_phone'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('bill_from_phone') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">GST
                                                        #<span style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputPassword3"
                                                            placeholder="123456789 RT" value="{{ Auth::user()->gst }}" name="bill_from_gst">
                                                            @if ($errors->has('bill_from_gst'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('bill_from_gst') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Company<span style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputPassword3"
                                                             value="{{ Auth::user()->company }}" name="bill_from_company">
                                                             @if ($errors->has('bill_from_company'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('bill_from_company') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-left me-3">
                                                <h2>Bill To</h2>

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="first_name"
                                                            id="inputEmail3" placeholder="First Name">
                                                            @if ($errors->has('first_name'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('first_name') }}</div>
                                                            @endif
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <input type="text" class="form-control" name="last_name"
                                                            id="inputEmail3" placeholder="Last Name">
                                                            @if ($errors->has('last_name'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('last_name') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="bil_to_email"
                                                            id="inputPassword3" placeholder="name@client.com">
                                                            @if ($errors->has('bil_to_email'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('bil_to_email') }}</div>
                                                            @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Street
                                                        address<span style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputPassword3"
                                                            name="bil_to_address" placeholder="Location">
                                                            @if ($errors->has('bil_to_address'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('bil_to_address') }}</div>
                                                            @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">City<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputPassword3"
                                                            name="bil_to_city" placeholder="City">
                                                            @if ($errors->has('bil_to_city'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('bil_to_city') }}</div>
                                                            @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">State<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="bil_to_state">
                                                            @foreach ($states as $state)
                                                                <option value="{{ $state->name }}">{{ $state->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('bil_to_state'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('bil_to_state') }}</div>
                                                            @endif
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="inputPassword3"
                                                        class="col-sm-2 col-form-label">Zipcode<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputPassword3"
                                                            placeholder="Zipcode" name="bil_to_zipcode">
                                                            @if ($errors->has('bil_to_zipcode'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('bil_to_zipcode') }}</div>
                                                            @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Phone<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control phone-format"
                                                            id="bill_to_phone" name="bil_to_phone"
                                                            placeholder="+1 123 456 7890">
                                                            @if ($errors->has('bil_to_phone'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('bil_to_phone') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3"
                                                        class="col-sm-2 col-form-label">Mobile<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control phone-format"
                                                            id="inputPassword3" name="bil_to_mobile"
                                                            placeholder="+1 123 456 7890">
                                                            @if ($errors->has('bil_to_mobile'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('bil_to_mobile') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3"
                                                        class="col-sm-2 col-form-label">Company<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputPassword3"
                                                            name="bil_to_company" placeholder="Company">
                                                            @if ($errors->has('bil_to_company'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('bil_to_company') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3"
                                                        class="col-sm-2 col-form-label">Fax</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="bil_to_faxNo"
                                                            id="inputPassword3" placeholder="123456789">
                                                            @if ($errors->has('bil_to_faxNo'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('bil_to_faxNo') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="Item-div">
                                    <h2>Item Description</h2>
                                </div>
                                <div class="form-div-wrap add_item_box">
                                    <div class="add-item-wrap">
                                        {{-- <div class="cross-btn">
                                        <a href=""><i class="fa-solid fa-xmark"></i></a>
                                    </div> --}}
                                        <div class="row justify-content-between">
                                            <div class="col-xl-12">
                                                <div class="item-head">
                                                    <h2>Item Description</h2>
                                                </div>
                                                <div class="form-left form-item">
                                                    <div class="row justify-content-between">
                                                        <div class="col-xl-6 col-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control" name="item_description[]" placeholder="Item Description" rows="2"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control" name="additional_details[]" placeholder="Additional Description" rows="2"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-12">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control rate"
                                                                    name="rate[]" placeholder="Rate">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-12">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control quantity"
                                                                    name="quantity[]" placeholder="Quantity">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-12">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control amount"
                                                                    name="amount[]" id="amount_1" placeholder="Amount"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="add-item-wrap">
                                    <div class="cross-btn">
                                        <a href=""><i class="fa-solid fa-xmark"></i></a>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-xl-12">
                                            <div class="item-head">
                                                <h2>Item Description</h2>
                                            </div>
                                            <div class="form-left form-item">
                                                <div class="row justify-content-between">
                                                    <div class="col-xl-6 col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="" placeholder="Item Description" rows="2"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="" placeholder="Additional Description" rows="2"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="inputEmail3"
                                                                placeholder="Rate">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="inputEmail3"
                                                                placeholder="Quantity">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="inputEmail3"
                                                                placeholder="Amount">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                    <div class="row">
                                        <div class="add-item">
                                        </div>

                                        <div class="col-xl-3 col-12 mt-3">
                                            <a class="btn add-btn" id="add_more_item">Add Item</a>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-div-wrap">
                                    <div class="form-group row">
                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Notes<span
                                                style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="notes" id="inputPassword3"></textarea>
                                        </div>
                                    </div>
                                    <div class="sign-box">
                                        <div class="signature">
                                            <h2>Signature</h2>
                                            <div id="signature"></div>
                                            <br><br>
                                            <button id="reset" class="btn btn-danger">Clear Signature</button>
                                            <textarea id="signature_capture" name="signed" hidden></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-9 col-12">
                                <div class="form-right">
                                    <div class="logo-div-wrap d-flex align-items-center justify-content-between mt-3">
                                        <div class="logo-div">
                                            <a href="https://excellis.co.in/bpm_pro"><img
                                                    src="{{ Storage::url(Auth::user()->logo) }}" alt=""></a>
                                        </div>
                                        <div class="logo-text">
                                            <h3>{{ Auth::user()->company }}</h3>
                                        </div>
                                    </div>
                                    <div class="inv-number-div">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="inv-number">
                                                    <div class="form-floating">
                                                        <input type="text" name="invoice_no" class="form-control"
                                                            id="invoice_no">
                                                        <label for="floatingInputValue">Invoice Number</label>
                                                        @if ($errors->has('invoice_no'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('invoice_no') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="inv-number">
                                                    <div class="form-floating">
                                                        <input type="date" name="invoice_date" class="form-control">
                                                        <label for="floatingInputValue">Invoice Date</label>
                                                        @if ($errors->has('invoice_date'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('invoice_date') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="inv-number">
                                                    <div class="form-floating">
                                                        <select class="form-select" name="due" id="floatingSelect"
                                                            aria-label="Floating label select example">
                                                            <option selected value="on receipt">On Receipt</option>
                                                            <option value="on receipt">On Receipt</option>

                                                        </select>
                                                        <label for="floatingSelect">Due</label>
                                                        @if ($errors->has('due'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('due') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sub-total">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="sub d-flex justify-content-between">
                                                    <div>
                                                        <h3>Subtotal</h3>
                                                    </div>
                                                    <div>
                                                        <input type="hidden" id="total_amount" name="sub_amount"
                                                            value="0">
                                                        <h4><span class="total_amount">0</span></h4>
                                                        @if ($errors->has('sub_amount'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('sub_amount') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                                {{-- <div class="sub d-flex justify-content-between">
                                                    <div>
                                                        <h3>Other Discount</h3>
                                                    </div>
                                                    <div>
                                                        <h4 style="color: blue; font-weight: 600;">-$25.00</h4>
                                                    </div>
                                                </div> --}}
                                                {{-- <div class="sub d-flex justify-content-between">
                                                    <div>
                                                        <h3>Shipping</h3>
                                                    </div>
                                                    <div>
                                                        <h4 style="color: blue; font-weight: 600;">Add</h4>
                                                    </div>
                                                </div> --}}
                                                <hr />
                                                <div class="sub d-flex justify-content-between">
                                                    <div>
                                                        <h3>Tax(10%)</h3>
                                                    </div>
                                                   
                                                </div>
                                                <div class="sub d-flex justify-content-between">
                                                    <div>
                                                        <h3>Other Amount</h3>
                                                    </div>
                                                    <div>
                                                        <h4 style="color: blue; font-weight: 600;" id="other_amount">Add
                                                        </h4>
                                                        <input type="text" name="other_amount" id="other_amount_input"
                                                            class="form-control" placeholder="Other amount"
                                                            style="display:none;">
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="sub d-flex justify-content-between">
                                                    <div>
                                                        <h3 style="font-weight: 600; color: #000;">Total</h3>
                                                    </div>
                                                    <div>
                                                        <input type="hidden" id="sum_amount" name="sum_amount"
                                                            value="0">
                                                        <h4><span class="sum_amount">0</span></h4>
                                                        @if ($errors->has('sum_amount'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('sum_amount') }}</div>
                                                            @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>


        {{-- invoice view modal --}}

        {{-- modal end  --}}
    @endsection

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.2/dist/parsley.js"></script>

        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="{{ asset('admin_assets/assets/js/custom.js') }}"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/willowsystems/jSignature/master/libs/jSignature.min.js">
        </script>
        <script type="text/javascript">
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



        <script>
            $(document).ready(function() {

                var i = 1;
                $("#add_more_item").click(function() {
                    i++;

                    $(".add-item").append('<div class="add-item-wrap" id="addMoreInputFields_' + i +
                        '"><div class="cross-btn"><a onclick="remove(' + i +
                        ')"><i class="fa-solid fa-xmark"></i></a></div><div class="row justify-content-between"><div class="col-xl-12"><div class="item-head"><h2>Item Description</h2></div><div class="form-left form-item"><div class="row justify-content-between"><div class="col-xl-6 col-12"><div class="form-group"><textarea class="form-control" name="item_description[]" placeholder="Item Description" rows="2"></textarea></div></div><div class="col-xl-6 col-12"><div class="form-group"><textarea class="form-control" name="additional_details[]" placeholder="Additional Description" rows="2"></textarea></div></div><div class="col-xl-4 col-12"><div class="form-group"><input type="text" class="form-control rate" name="rate[]" id="rate_' +
                        i +
                        '"  placeholder="Rate"></div></div><div class="col-xl-4 col-12"><div class="form-group"><input type="text" class="form-control quantity"  name="quantity[]" id="quan_' +
                        i +
                        '"  placeholder="Quantity"></div></div><div class="col-xl-4 col-12"><div class="form-group"><input type="text" class="form-control amount" id="' +
                        i + '" placeholder="Amount" readonly></div></div></div></div></div></div></div>'
                    );
                });


                function calculateTotalAmount() {
                    $('.rate').each(function(index) {
                        const rateValue = parseFloat($(this).val()) || 0;
                        const quantityValue = parseFloat($('.quantity').eq(index).val()) || 0;
                        const totalAmount = rateValue * quantityValue;
                        $('.amount').eq(index).val(totalAmount);
                    });
                }

                // Function to calculate the overall result
                function calculateResult() {
                    let result = 0;
                    $('.amount').each(function() {
                        const totalAmountValue = parseFloat($(this).val()) || 0;
                        result += totalAmountValue;
                    });
                    $('.total_amount').text('$'+result);
                    $('.sum_amount').text('$'+result);
                    $('#total_amount').val(result);
                    $('#sum_amount').val(result);
                }

                // Attach keyup event to the rate and quantity fields
                $(document).on('keyup', '.rate, .quantity', function() {


                    calculateTotalAmount();
                    calculateResult();
                });

                // Initialize the total amount and result on page load
                calculateTotalAmount();
                calculateResult();
            });
        </script>



        <script>
            $(document).ready(function() {
                $('.phone-format').mask('+1 999 999 9999');
            });

            $('#invoice_no').keyup(function() {
                var invoice = $('#invoice_no').val();

                $('#invoice_show').html('(' + invoice + ')');

            });

            $('#other_amount').click(function() {
                $('#other_amount_input').show();
                $('#other_amount').hide();
            })

            $(document).on('change','#other_amount_input',function(){

            // $('#other_amount_input').keyup(function() {
                var other_amount = $('#other_amount_input').val();
                var total = $('#sum_amount').val();
                var sub_total = $('#total_amount').val();
                var sum_total = parseInt(other_amount) + parseInt(total);
                $('.sum_amount').text('$'+sum_total);
                $('#sum_amount').val(sum_total);
                if(other_amount == '')
                {
                    $('.sum_amount').text('$'+sub_total);
                    $('#sum_amount').val(sub_total);
                }
                
            });

        </script>
    @endpush
