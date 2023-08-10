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

        /*.form-left .form-group {*/
        /*    padding: 10px 0px;*/
        /*}*/

        .form-left .form-group input {
            margin: 0px 0px;
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
            margin: 0px 0px;
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
            width: 25%;
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

        /*.temp-box {*/
        /*    padding: 20px 0px;*/
        /*}*/

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

        .inv-number .form-select {
            margin-bottom: 15px;
        }

        /* Responsive */
        @media (max-width:768px) {
            .sign-box {
                display: block;
                .inv-number-div
            }
        }

        @media (max-width:767px) {
            .form-right {
                position: inherit;
                width: 100%;
            }

            .inv-head h2 {
                font-size: 20px;
                line-height: 24px;
            }

            .form-left .form-group {
                padding: 0px 0px;
            }

            .form-left {
                margin-top: 0 !important;
            }

            .form-div-wrap {
                padding: 10px 5px 10px 5px;
            }

            .add-item-wrap {
                padding: 10px 10px 10px;
                margin-bottom: 0px;
            }
        }
    </style>
    <style>
        .box {
            width: 100%;
            max-width: 600px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 16px;
            margin: 0 auto;
        }

        input.parsley-success,
        select.parsley-success,
        textarea.parsley-success {
            color: #468847;
            background-color: #DFF0D8;
            border: 1px solid #D6E9C6;
        }

        input.parsley-error,
        select.parsley-error,
        textarea.parsley-error {
            color: #B94A48;
            background-color: #F2DEDE;
            border: 1px solid #EED3D7;
        }

        .parsley-errors-list {
            margin: 2px 0 3px;
            padding: 0;
            list-style-type: none;
            font-size: 0.9em;
            line-height: 0.9em;
            opacity: 0;

            transition: all .3s ease-in;
            -o-transition: all .3s ease-in;
            -moz-transition: all .3s ease-in;
            -webkit-transition: all .3s ease-in;
        }

        .parsley-errors-list.filled {
            opacity: 1;
        }

        .parsley-type,
        .parsley-required,
        .parsley-equalto,
        .parsley-pattern,
        .parsley-length {
            color: #ff0000;
        }

        .modal-content {
            width: 130%;
        }
    </style>
@endpush


@section('content')
    <div class="page-wrapper invoice_page">
        <section class="form-div">
            <div class="container-fluid">
                <div class="form-div-main">
                    <form method="post" id="payment-form" data-parsley-validate action="{{ route('invoice.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-9 col-md-9 col-12">

                                <div class="inv-head-wrap d-flex justify-content-between">
                                    <div class="inv-head">
                                        <h2>New Invoice - <span id="invoice_show" style="color: #ff7c04"></span></h2>
                                    </div>

                                    <div class="pre-view-wrap d-flex justify-content-end align-items-center">
                                        <div class="pre-view">
                                            <a id="invoice-modal"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                        <div class="send-btn">
                                            <button type="submit" class="btn add-btn btn-order"
                                                id="add submitBtn">Send</button>
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
                                                            <select class="form-select types" name="type"
                                                                id="floatingSelect"
                                                                aria-label="Floating label select example">
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
                                                                <option selected value="USD">USD</option>
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
                                                                <option value="2">Weekly</option>
                                                                <option value="3">Monthly</option>
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
                                            <div class="form-left mt-5">
                                                <div class="form-group row">

                                                    <div class="col-sm-10">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="inputEmail3"
                                                                name="from_name" placeholder="Business Name"
                                                                value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}"
                                                                required data-parsley-trigger="keyup">
                                                            <label for="floatingInputValue"
                                                                class="col-sm-2 col-form-label">Name<span
                                                                    style="color: red;">*</span></label>
                                                            @if ($errors->has('from_name'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('from_name') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-10">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="floatingInputValue" required
                                                                data-parsley-trigger="keyup"
                                                                value="{{ Auth::user()->company }}"
                                                                name="bill_from_company">
                                                            <label for="floatingInputValue"
                                                                class="col-sm-2 col-form-label">Company<span
                                                                    style="color: red;">*</span></label>
                                                            @if ($errors->has('bill_from_company'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('bill_from_company') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-10">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="bill_from_email" placeholder="name@business.com"
                                                                name="from_email" value="{{ Auth::user()->email }}"
                                                                required data-parsley-type="email"
                                                                data-parsley-trigger="keyup">
                                                            <label for="bill_from_email"
                                                                class="col-sm-2 col-form-label">Email<span
                                                                    style="color: red;">*</span></label>
                                                            @if ($errors->has('from_email'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('from_email') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-10">
                                                        <div class="form-floating">
                                                            <select class="form-control" name="bill_from_state" required
                                                                data-parsley-trigger="keyup">
                                                                <option value=""> Select State</option>
                                                                @foreach ($states as $state)
                                                                    <option value="{{ $state->name }}"
                                                                        {{ Auth::user()->state == $state->name ? 'selected' : '' }}>
                                                                        {{ $state->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label for="floatingInputValue"
                                                                class="col-sm-2 col-form-label">State<span
                                                                    style="color: red;">*</span></label>
                                                            @if ($errors->has('bill_from_state'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('bill_from_state') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-10">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="floatingInputValue" placeholder="Zipcode"
                                                                value="{{ Auth::user()->zipcode }}" required
                                                                data-parsley-trigger="keyup" name="from_zipcode">
                                                            <label for="floatingInputValue"
                                                                class="col-sm-2 col-form-label">Zipcode<span
                                                                    style="color: red;">*</span></label>
                                                            @if ($errors->has('from_zipcode'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('from_zipcode') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-10">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="floatingInputValue" placeholder="City"
                                                                value="{{ Auth::user()->city }}" required
                                                                data-parsley-trigger="keyup" name="bill_from_city">
                                                            <label for="floatingInputValue"
                                                                class="col-sm-2 col-form-label">City<span
                                                                    style="color: red;">*</span></label>
                                                            @if ($errors->has('bill_from_city'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('bill_from_city') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-10">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="bill_from_address" id="" required
                                                                data-parsley-trigger="keyup" placeholder="Street"
                                                                value="{{ Auth::user()->address }}" name="from_address">
                                                            <label for="bill_from_address"
                                                                class="col-sm-2 col-form-label">Address<span
                                                                    style="color: red;">*</span></label>
                                                            @if ($errors->has('from_address'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('from_address') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-10">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="bill_from_phone" required data-parsley-trigger="keyup"
                                                                placeholder="(123) 456 789"
                                                                value="{{ Auth::user()->phone }}" name="bill_from_phone">
                                                            <label for="bill_from_phone"
                                                                class="col-sm-2 col-form-label">Phone<span
                                                                    style="color: red;">*</span></label>
                                                            @if ($errors->has('bill_from_phone'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('bill_from_phone') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-10">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="floatingInputValue" required
                                                                data-parsley-trigger="keyup" placeholder="123456789 RT"
                                                                value="{{ Auth::user()->gst }}" name="bill_from_gst">
                                                            <label for="floatingInputValue"
                                                                class="col-sm-12 col-form-label">Annual Resale Certificate for Sales Tax #
                                                                <span style="color: red;">*</span></label>
                                                            @if ($errors->has('bill_from_gst'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('bill_from_gst') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-left mt-3">
                                                <h2>Bill To</h2>

                                                <div class="form-group row">

                                                    <div class="col-xl-6 col-md-6 col-12">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" name="first_name"
                                                                required data-parsley-trigger="keyup"
                                                                id="billto_first_nm">
                                                            <label for="floatingInputValue"
                                                                class="col-sm-12 col-form-label">First Name<span
                                                                    style="color: red;">*</span></label>
                                                            @if ($errors->has('first_name'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('first_name') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-12">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" name="last_name"
                                                                required data-parsley-trigger="keyup" id="billto_last_nm" ">
                                                                                                                                    <label for="floatingInputValue"
                                                                                                                                        class="col-sm-12 col-form-label">Last Name<span
                                                                                                                                            style="color: red;">*</span></label>
                                                                                                                                         
                                                                                                                 
                                                                                         @if ($errors->has('last_name'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('last_name') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="bil_to_company" required data-parsley-trigger="keyup"
                                                                name="bil_to_company">
                                                            <label for="bil_to_company"
                                                                class="col-sm-2 col-form-label">Company<span
                                                                    style="color: red;">*</span></label>
                                                            @if ($errors->has('bil_to_company'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('bil_to_company') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-xl-12">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                name="bil_to_email" required data-parsley-type="email"
                                                                data-parsley-trigger="keyup" id="bill_to_email" ">
                                                                                                                                    <label for="floatingInputValue"
                                                                                                                                    class="col-sm-2 col-form-label">Email<span
                                                                                                                                        style="color: red;">*</span></label>
                                                                                                                                         
                                                                                                                 
                                                                                         @if ($errors->has('bil_to_email'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('bil_to_email') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="bill_to_address" required data-parsley-trigger="keyup"
                                                                name="bil_to_address">
                                                            <label for="floatingInputValue"
                                                                class="col-sm-12 col-form-label">Street
                                                                address<span style="color: red;">*</span></label>
                                                            @if ($errors->has('bil_to_address'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('bil_to_address') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="floatingInputValue" required
                                                                data-parsley-trigger="keyup" name="bil_to_city">
                                                            <label for="floatingInputValue"
                                                                class="col-sm-2 col-form-label">City<span
                                                                    style="color: red;">*</span></label>
                                                            @if ($errors->has('bil_to_city'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('bil_to_city') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <div class="form-floating">
                                                            <select class="form-control ms-0" name="bil_to_state" required
                                                                data-parsley-trigger="keyup">
                                                                <option value=""> Select State</option>
                                                                @foreach ($states as $state)
                                                                    <option value="{{ $state->name }}">
                                                                        {{ $state->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <label for="floatingInputValue"
                                                                class="col-sm-2 col-form-label">State<span
                                                                    style="color: red;">*</span></label>
                                                            @if ($errors->has('bil_to_state'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('bil_to_state') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="bil_to_zipcode" required data-parsley-trigger="keyup"
                                                                name="bil_to_zipcode">
                                                            <label for="bil_to_zipcode"
                                                                class="col-sm-2 col-form-label">Zipcode<span
                                                                    style="color: red;">*</span></label>
                                                            @if ($errors->has('bil_to_zipcode'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('bil_to_zipcode') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control phone-format"
                                                                required data-parsley-trigger="keyup" id="bill_to_phone"
                                                                name="bil_to_phone">
                                                            <label for="floatingInputValue"
                                                                class="col-sm-2 col-form-label">Phone<span
                                                                    style="color: red;">*</span></label>
                                                            @if ($errors->has('bil_to_phone'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('bil_to_phone') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control phone-format"
                                                                id="floatingInputValue" name="bil_to_mobile">
                                                            <label for="floatingInputValue"
                                                                class="col-sm-2 col-form-label">Mobile</label>
                                                            @if ($errors->has('bil_to_mobile'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('bil_to_mobile') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">

                                                    {{-- <div class="col-sm-12">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                name="bil_to_faxNo" data-parsley-required="false"
                                                                data-parsley-trigger="keyup" data-parsley-type="digits"
                                                                id="floatingInputValue">
                                                            <label for="floatingInputValue"
                                                                class="col-sm-2 col-form-label">Fax</label>
                                                            @if ($errors->has('bil_to_faxNo'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('bil_to_faxNo') }}</div>
                                                            @endif
                                                        </div>
                                                    </div> --}}
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
                                        <div class="row justify-content-between">
                                            <div class="col-xl-12">
                                                <div class="item-head">
                                                    <h2>Item Description</h2>
                                                </div>
                                                <div class="form-left form-item">
                                                    <div class="row justify-content-between">
                                                        <div class="col-xl-4 col-12">
                                                            <div class="form-group">
                                                                <input type="number"
                                                                    class="form-control quantity data-field"
                                                                    name="quantity[]" placeholder="Quantity" required
                                                                    data-parsley-trigger="keyup" min="1">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-12">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control rate data-field"
                                                                    name="rate[]" placeholder="Rate" required
                                                                    data-parsley-trigger="keyup">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-12">
                                                            <div class="form-group">
                                                                <input type="text"
                                                                    class="form-control amount data-field" name="amount[]"
                                                                    id="amount_1" placeholder="Amount" required
                                                                    data-parsley-trigger="keyup" readonly>
                                                            </div>
                                                        </div>

                                                        <div class="col-xl-6 col-12">
                                                            <div class="form-group">
                                                                <input type="text"
                                                                    class="form-control data-field item_description"
                                                                    name="item_description[]" required
                                                                    data-parsley-trigger="keyup" placeholder="Item Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <div class="form-group">
                                                                <input type="file"
                                                                    class="form-control image data-field" name="image[]"
                                                                    accept="image/*" id="image" placeholder="Amount"
                                                                    data-parsley-required="false"
                                                                    data-parsley-trigger="keyup">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-12">
                                                            <div class="form-group">
                                                                <textarea class="form-control additional_details" name="additional_details[]" data-parsley-required="false"
                                                                    data-parsley-trigger="keyup" placeholder="Item Description" rows="2"></textarea>
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
                                        <div class="col-sm-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" name="notes" id="notes" data-parsley-trigger="keyup"
                                                    data-parsley-required="false"></textarea>
                                                <label for="floatingInputValue"
                                                    class="col-sm-12 col-form-label">Notes</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="project_name" required
                                                    data-parsley-trigger="keyup" name="project_name">
                                                <label for="project_name" class="col-sm-2 col-form-label">Project
                                                    Name<span style="color: red;">*</span></label>
                                                @if ($errors->has('project_name'))
                                                    <div class="error" style="color:red;">
                                                        {{ $errors->first('project_name') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="project_address"
                                                    required data-parsley-trigger="keyup" id="project_address">
                                                <label for="project_address" class="col-sm-2 col-form-label">Project
                                                    Address<span style="color: red;">*</span></label>
                                                @if ($errors->has('project_address'))
                                                    <div class="error" style="color:red;">
                                                        {{ $errors->first('project_address') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="sign-box">
                                        <div class="signature">
                                            <h2>Signature</h2>
                                            <div id="signature"></div>
                                            <br><br>
                                            <button id="reset" class="btn btn-danger">Clear Signature</button>
                                            <textarea id="signature_capture" name="signed" hidden></textarea>
                                        </div>

                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-9 col-12">
                                <div class="form-right">
                                    <div class="logo-div-wrap d-flex align-items-center justify-content-between mt-3">
                                        <div class="logo-div">
                                            <a href="https://excellis.co.in/bpm_pro"><img
                                                    src="{{ Storage::url(Auth::user()->logo) }}" alt=""
                                                    id="logo" data-id="{{ Storage::url(Auth::user()->logo) }}"></a>
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
                                                            id="invoice_no" required data-parsley-trigger="keyup">
                                                        <span style="color:red" class="check-invoice"></span>
                                                        <label for="floatingInputValue">Invoice Number</label>
                                                        @if ($errors->has('invoice_no'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('invoice_no') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="inv-number">
                                                    <div class="form-floating">
                                                        <input type="date" name="invoice_date" class="form-control"
                                                            required data-parsley-trigger="keyup" id="invoice_date"
                                                            value="{{ date('Y-m-d') }}">
                                                        <label for="floatingInputValue">Invoice Date</label>
                                                        @if ($errors->has('invoice_date'))
                                                            <div class="error" style="color:red;">
                                                                {{ $errors->first('invoice_date') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="inv-number">
                                                    <div class="form-floating">
                                                        <select class="form-select" name="due"
                                                            id="due_floatingSelect" required data-parsley-trigger="keyup"
                                                            aria-label="Floating label select example">
                                                            <option selected value="On Receipt">On Receipt</option>
                                                            <option value="No due date">No due date</option>
                                                            <option value="On specific date">On specific date</option>
                                                        </select>
                                                        <label for="floatingSelect">Due</label>
                                                        <input type="date" name="due_date" id="date"
                                                            class="form-control" min="{{ date('Y-m-d') }}"
                                                            value="{{ date('Y-m-d') }}">
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

                                                <div class="sub d-flex justify-content-between ">
                                                    <div>
                                                        <h3>Discount Amount</h3>
                                                    </div>
                                                    <div>
                                                        <h4 style="color: blue; font-weight: 600;" id="button-add">Add
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <div class="me-2 show-dis">
                                                        <div class="form-floating">
                                                            <input type="text" name="discount_price"
                                                                class="form-control discount_price">
                                                            <label for="floatingInputValue">Other Discount</label>
                                                        </div>
                                                    </div>
                                                    <div class="show-dis">
                                                        <div class="form-floating">
                                                            <select class="form-select currency-select"
                                                                name="discount_type" id="floatingSelect"
                                                                aria-label="Floating label select example">
                                                                <option selected="" value="1">%</option>
                                                                <option value="2">$</option>
                                                            </select>
                                                            <!--<label for="floatingSelect">Send in</label>-->

                                                        </div>
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="sub d-flex justify-content-between">
                                                    <div>
                                                        <h3>Tax(%)</h3>
                                                    </div>

                                                </div>
                                                <div class="sub d-flex justify-content-between">
                                                    <div>
                                                        <h3>Tax Amount</h3>
                                                    </div>
                                                    <div>
                                                        <h4 style="color: blue; font-weight: 600;" id="tax_amount">Add
                                                        </h4>
                                                        <input type="text" name="tax_amount" id="tax_amount_input"
                                                            class="form-control" placeholder="Tax amount" min="1"
                                                            max="100" style="display:none;">
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
        <div id="pdfModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <table width="600" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
                            style="border-radius: 0px; margin: 0 auto;">
                            <tbody>

                                <tr>
                                    <td style="padding:10px 30px 0">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                            align="center">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <table border="0" cellpadding="0" cellspacing="0"
                                                            align="left" style="width: 100%;">
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        style="font-size: 14px; color: #000; font-weight: 800; line-height: 18px; vertical-align: top; text-align: left;">
                                                                        <img src="webex.png" alt="logo"
                                                                            id="popup_logo" border="0"
                                                                            style="object-fit: contain; width: 100px; height: 50px;" />
                                                                        <span
                                                                            style="display: block; text-align: left; padding-top: 5px;"
                                                                            id="popup_add">Adress:
                                                                            sfc fsf gdg g d g</span>
                                                                        <span
                                                                            style="display: block; text-align: left; padding-top: 5px;"
                                                                            id="popup_phone">Phone:
                                                                            0123456789</span>
                                                                        <span
                                                                            style="display: block; text-align: left; padding-top: 5px;"
                                                                            id="popup_email">Email: demo@gmail.com</span>
                                                                        <span
                                                                            style="display: block; text-align: left; padding-top: 5px;">Website:
                                                                            https://www.BPM.com</span>
                                                                    </td>

                                                                    <td
                                                                        style="font-size: 14px; font-weight: 800; color: #000; line-height: 20px; vertical-align: top; text-align: left;">
                                                                        <table border="0" cellpadding="0"
                                                                            cellspacing="0" align="right">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span
                                                                                            style="color: #2f75b5;
                                                                                            padding: 3px 0px;
                                                                                            text-align: right;
                                                                                            font-size: 36px;
                                                                                            line-height: 1;
                                                                                            font-weight: 500;
                                                                                            display: inline-block;
                                                                                            width:219px;">INVOICE</span><br>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><span
                                                                                            style="background: #2f75b5; margin: 10px 0px; padding: 5px; color: #fff;  display: flex;
                                                                                            justify-content: space-between">
                                                                                            <span>Invoice#</span>
                                                                                            <span>Date</span></span>
                                                                                        <span
                                                                                            style="color: #000; text-align: center; display: inline-block; width: 100%; font-size: 14px; font-weight: 600; display: flex; justify-content: space-between">
                                                                                            <span
                                                                                                id="popup_invoice_number">2034</span>
                                                                                            <span
                                                                                                id="popup_date">03/08/2023</span>
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td><span
                                                                                            style="background: #2f75b5; margin: 10px 0px;  padding: 5px; color: #fff;  display: flex;
                                                                                            justify-content: center">
                                                                                            Terms</span>
                                                                                        <span
                                                                                            style="color: #000; text-align: center; display: inline-block; width: 100%; font-size: 14px; font-weight: 600;">
                                                                                            Due Upon Receipt</span>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table border="0" cellpadding="0" cellspacing="0"
                                                            align="left"
                                                            style="width: 100%; vertical-align: top; margin-top: 18px;">
                                                            <tbody>
                                                                <tr>
                                                                    <td
                                                                        style="font-size: 14px; color: #000; font-weight: 800; line-height: 18px; vertical-align: top; text-align: right;">
                                                                        <span
                                                                            style="display: block; text-align: left; background: #2f75b5; padding: 5px; color: #fff;">Bill
                                                                            To</span>
                                                                        <span
                                                                            style="display: block; text-align: left; padding-top: 5px;"
                                                                            id="popup_billto_name">Name:
                                                                            Pritam Maity</span>
                                                                        <span
                                                                            style="display: block; text-align: left; padding-top: 5px;"
                                                                            id="popup_billto_com">Company
                                                                            Name</span>
                                                                        <span
                                                                            style="display: block; text-align: left; padding-top: 5px;"
                                                                            id="popup_billto_add">Address</span>
                                                                        <span
                                                                            style="display: block; text-align: left; padding-top: 5px;"
                                                                            id="popup_billto_zip">Zip
                                                                            Code</span>
                                                                        <span
                                                                            style="display: block; text-align: left; padding-top: 5px;"
                                                                            id="popup_billto_ph">Phone</span>
                                                                        <span
                                                                            style="display: block; text-align: left; padding-top: 5px;"
                                                                            id="popup_billto_email">Email
                                                                            Address</span>
                                                                    </td>
                                                                    <td style="vertical-align: top;">
                                                                        <table border="0" cellpadding="0"
                                                                            cellspacing="0" align="right"
                                                                            style="vertical-align: top;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><span
                                                                                            style="    background: #2f75b5;
                                                                                            margin: 10px 0px;
                                                                                            padding: 5px;
                                                                                            color: #fff;
                                                                                            width: 211px;
                                                                                            display: table-cell;
                                                                                            text-align: center;">
                                                                                            Project Name and Address</span>
                                                                                        <span
                                                                                            style="display: block; text-align: left; padding-top: 5px;"
                                                                                            id="popup_project_name">Project
                                                                                            name : ABCD Project</span>
                                                                                        <span
                                                                                            style="display: block; text-align: left; padding-top: 5px;"
                                                                                            id="popup_project_address">Address
                                                                                            : STKK RD, New Ali Pur, 700001
                                                                                            Address</span>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20"></td>
                                </tr>
                                <tr>
                                    <td style="padding:0 30px">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                            align="center">
                                            <tbody>
                                                <tr>
                                                    <th style="background: #2f75b5; font-size: 16px; font-weight: 800;  color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px;"
                                                        width="52%" align="left">
                                                        Item Name
                                                    </th>
                                                    <th style="background: #2f75b5; font-size: 16px;  font-weight: 800;  color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px;"
                                                        align="left">
                                                        Rate
                                                    </th>
                                                    <th style="background: #2f75b5; font-size: 16px;  font-weight: 800; color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px"
                                                        align="center">
                                                        Quantity
                                                    </th>
                                                    <th style="background: #2f75b5; font-size: 16px;  font-weight: 800;  color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px"
                                                        align="right">
                                                        Amount
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td height="1" style="background: #bebebe;" colspan="4"></td>
                                                </tr>
                                                <tr>
                                                    <td height="10" colspan="4"></td>
                                                </tr>
                                                <tr>
                                                    <td height="10" colspan="4">
                                                        <table id="tableVal" width="100%">


                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="font-size: 16px; font-weight: 600; color: #2f75b5;  line-height: 14px;  vertical-align: top; padding:10px">
                                                        Notes:
                                                    </td>
                                                    <td colspan="2"
                                                        style="font-size: 16px; color: #000; line-height: 14px; text-align: left; vertical-align: top; padding: 10px; font-weight: 400; background: #cce7ff;">
                                                        Subtotal:
                                                    </td>
                                                    <td id="popup_total"
                                                        style="font-size: 16px; color: #000; line-height: 14px; text-align: right; vertical-align: top; padding: 10px; font-weight: 400; background: #e6f3ff;">
                                                        $390.00
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td
                                                        style="font-size: 16px; color: #000; line-height: 14px; text-align: left; vertical-align: top; padding: 10px; font-weight: 400; background: #cce7ff;">
                                                        Tax:
                                                    </td>
                                                    <td id="popup_tax_percentage"
                                                        style="font-size: 16px; color: #000; line-height: 14px; text-align: left; vertical-align: top; padding: 10px; font-weight: 400; background: #cce7ff;">
                                                        7.00%
                                                    </td>
                                                    <td id="popup_tax_amount"
                                                        style="font-size: 16px; color: #000; line-height: 14px; text-align: right; vertical-align: top; padding: 10px; font-weight: 400; background: #e6f3ff;">
                                                        $27.30
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="2"
                                                        style="font-size: 16px; color: #000; line-height: 14px; text-align: left; vertical-align: top; padding: 10px; font-weight: 600; background: #cce7ff; border-top:2px solid #000">
                                                        TOTAL
                                                    </td>
                                                    <td id="popup_sum"
                                                        style="font-size: 16px; color: #000; line-height: 14px; text-align: right; vertical-align: top; padding: 10px; font-weight: 600; background: #e6f3ff;  border-top:2px solid #000">
                                                        $417.30
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="1" colspan="4"
                                                        style="border-bottom:3px solid #000"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"
                                                        style="font-size: 16px; font-weight: 600; color: #2f75b5;  line-height: 14px;  vertical-align: top; padding:10px;">
                                                        Additional Information:
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" >
                                                        <div id="item-image"  style="columns: 4; display:block;">

                                                        </div>
                                                         
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="1" colspan="4" style="border-bottom:3px solid #000">
                                                    </td>
                                                </tr>
                                        </table>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        </td>
                        </tr>
                        <tr>
                            <td style="padding:0 30px">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                    <tbody>

                                    </tbody>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center"
                                    bgcolor="#ffffff" style="border-radius: 0 0 10px 10px;">
                                    <tr>
                                        <td height="20"></td>
                                    </tr>
                                    <tr bgcolor="#fff" style="text-align: center;">
                                        <td height="50">
                                            <p style="color: #606060; padding: 0px; margin: 0;">Powered by
                                                xTriam.com</p>
                                            <p
                                                style="color: #000; padding: 10px; margin: 0;font-style: italic; font-weight: 600;">
                                                Empowering Window and Door Contractors to Be More Profitable</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                        </table>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary modal-close" data-dismiss="modal">Cancel</button>

                    </div>
                </div>
            </div>
        </div>
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
        <script src="http://parsleyjs.org/dist/parsley.js"></script>
        <script>
            $(document).ready(function() {
                $('#payment-form').parsley();
            });
        </script>

        <!-- PARSLEY -->
        <script>
            window.ParsleyConfig = {
                errorsWrapper: '<div></div>',
                errorTemplate: '<div class="alert alert-danger parsley" role="alert"></div>',
                errorClass: 'has-error',
                successClass: 'has-success'
            };
        </script>

        <script>
            $(document).ready(function() {
                $('.show-dis').hide();
                $('#button-add').on('click', function() {
                    $('.show-dis').show();
                    $('#button-add').hide();
                });
            })
        </script>
        <script>
            $(document).ready(function() {
                $('#date').hide();
                // Attach change event to the select element
                $('#due_floatingSelect').on('change', function() {
                    const selectedValue = $(this).val();
                    const dateInput = $('#date');

                    if (selectedValue === 'On specific date') {
                        dateInput.show();
                    } else {
                        dateInput.hide();
                    }
                });
            });
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
                        '"><div class="cross-btn"><a href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a></div><div class="row justify-content-between"><div class="col-xl-12"><div class="item-head"><h2>Item Description</h2></div><div class="form-left form-item"><div class="row justify-content-between"><div class="col-xl-4 col-12"><div class="form-group"><input type="number" class="form-control quantity data-field" min="1"  name="quantity[]" id="quan_' +
                        i +
                        '"  placeholder="Quantity" required data-parsley-trigger="keyup"></div></div><div class="col-xl-4 col-12"><div class="form-group"><input type="text" class="form-control rate data-field" required  data-parsley-trigger="keyup" name="rate[]" id="rate_' +
                        i +
                        '"  placeholder="Rate" ></div></div><div class="col-xl-4 col-12"><div class="form-group"><input type="text" class="form-control amount data-field" id="' +
                        i +
                        '" placeholder="Amount" name="amount[]" readonly></div></div><div class="col-xl-6 col-12"><div class="form-group"><input type="text" class="form-control item_description data-field" name="item_description[]" required data-parsley-trigger="keyup" placeholder="Item Name" ></div></div><div class="col-xl-6 col-12"><div class="form-group"><input type="file" accept="image/*" class="form-control image data-field" name="image[]" id="image" placeholder="Amount" data-parsley-required="false" data-parsley-trigger="keyup" ></div></div><div class="col-xl-12 col-12"><div class="form-group"><textarea class="form-control additional_details" data-parsley-required="false" data-parsley-trigger="keyup" name="additional_details[]" placeholder="Item Description" rows="2"></textarea></div></div></div></div></div></div></div>'
                    );
                });
                $(document).on('click', '.cross-btn', function() {
                    // remove pareent div
                    $(this).parent().remove();
                });

                function calculateTotalAmount() {
                    $('.rate').each(function(index) {
                        const rateValue = parseFloat($(this).val()) || 0;
                        const quantityValue = parseFloat($('.quantity').eq(index).val()) || 0;
                        const totalAmount = rateValue * quantityValue;
                        $('.amount').eq(index).val(totalAmount.toFixed(2));
                    });
                }

                // Function to calculate the overall result
                function calculateResult() {

                    //  alert(tax_amount);
                    var rs = 0;
                    var result = 0;
                    $('.amount').each(function() {
                        const totalAmountValue = parseFloat($(this).val()) || 0;
                        result += totalAmountValue;
                        rs += totalAmountValue;
                    });
                    var sub_total = rs;
                    const selectedOption = $('.currency-select').val();
                    const discountPrice = parseFloat($('.discount_price').val()) || 0;
                    // console.log(discountPrice);
                    if (selectedOption === '1') {
                        // Percentage
                        result = result * (1 - discountPrice / 100);
                    } else {
                        // Dollar amount
                        result -= discountPrice;
                    }

                    const taxPercentage = parseFloat($('#tax_amount_input').val()) || 0;
                    const taxAmount = (taxPercentage / 100) * result;
                    result += taxAmount;

                    // alert(main_result);
                    $('.total_amount').text('$' + sub_total.toFixed(2));
                    $('.sum_amount').text('$' + result.toFixed(2));
                    $('#total_amount').val(sub_total.toFixed(2));
                    $('#sum_amount').val(result.toFixed(2));
                }

                // Attach keyup event to the rate and quantity fields
                $(document).on('keyup change',
                    '.rate, .quantity,  #tax_amount_input, .currency-select,  .discount_price',
                    function() {
                        calculateTotalAmount();
                        calculateResult();
                    });

                // Initialize the total amount and result on page load
                calculateTotalAmount();
                calculateResult();
            });
        </script>


        <script>
            $(document).on('keyup', '.rate', function() {
                var inputValue = $(this).val();

                // Use a regular expression to match only numbers with two digits after the decimal point
                var regex = /^\d+(\.\d{0,2})?$/;

                // Test if the input value matches the pattern
                if (!regex.test(inputValue)) {
                    // If the input doesn't match the pattern, remove the last character (invalid input)
                    $(this).val(inputValue.slice(0, -1));
                }
            });

            $(document).on('keyup', '.quantity', function() {
                // Get the current value of the input field
                var inputValue = $(this).val();

                // Use a regular expression to remove any non-numeric characters from the input
                var numericValue = inputValue.replace(/\D/g, '');

                // Update the input field with the numeric value
                $(this).val(numericValue);
            });
        </script>
        <script>
            $(document).on('keyup', '#tax_amount_input', function() {
                // Get the entered value
                var inputValue = parseInt($(this).val());

                // Check if the entered value is within the valid range (0 to 100)
                if (isNaN(inputValue) || inputValue < 0) {
                    // Reset to 0 if the value is less than 0
                    $(this).val('');
                } else if (inputValue > 100) {
                    // Reset to 100 if the value is greater than 100
                    $(this).val(100);
                }
            });
        </script>
        <script>
            $(document).ready(function() {
                $('.phone-format').mask('+1 999 999 9999');
            });

            $('#invoice_no').keyup(function() {
                var invoice = $('#invoice_no').val();

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('invoice.number-check') }}',
                    data: {
                        'invoice_no': invoice
                    },
                    success: function(resp) {
                        if (resp.status == false) {
                            $('.check-invoice').text(resp.message);
                        } else {
                            $('#invoice_show').html('(' + invoice + ')');
                            $('.check-invoice').text('');
                        }
                    }
                });

                // Prevent form submission if condition is met
                $("form").submit(function(e) {
                    if ($('.check-invoice').text() !== '') {
                        alert('Form submission intercepted');
                        e.preventDefault();
                        return false;
                    }
                });

            });

            $('#tax_amount').click(function() {
                $('#tax_amount_input').show();
                $('#tax_amount').hide();
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#invoice-modal').click(function() {

                    var names = $("input.item_description");
                    var rates = $("input.rate");
                    var quantities = $("input.quantity");
                    var amounts = $("input.amount");
                    var images = $("input.image");
                    // console.log(names);
                    $('#tableVal').html('');
                    $('#item-image').html('');
                    // }

                    for (var i = 0; i < names.length; i++) {
                        var name = $(names[i]).val();
                        var rate = $(rates[i]).val();
                        var quantity = $(quantities[i]).val();
                        var amount = $(amounts[i]).val();
                        var image = $(images[i]).prop('files')[0];
                        var reader = new FileReader();
                        if (image) {
                            var new_image = URL.createObjectURL(image);
                        } else {
                            var new_image = "{{ asset('admin_assets/images/image.png') }}";
                        }


                        if (name) {
                            var newRow = '<tr>' +
                                '<td style="font-size: 14px; font-weight: 800;  color: #000;  line-height: 18px;  vertical-align: top; padding: 5px; display: flex; align-item: center;">' +
                                name +
                                '</td>' +
                                '<td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px;">' +
                                rate + '</td>' +
                                '<td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px;" align="center">' +
                                quantity + '</td>' +
                                '<td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px;" align="right">$' +
                                amount + '</td>' +
                                '</tr>' +
                                '<tr>' +
                                '<td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>' +
                                '</tr>';
                            $('#tableVal').append(newRow);
                        }

                        if (new_image) {
                            var newImage = '<img style="object-fit: cover; width: 150px; height: 150px; padding: 5px;display: inherit;" src="'+new_image+'">';
                        }

                        $('#item-image').append(newImage);
                        
                    }



                    $('#pdfModal').modal('show');
                    var type = $('.types').val();

                    var logo = $('#logo').data('id');
                    var bill_from_add = $('#bill_from_address').val();
                    var bill_from_phone = $('#bill_from_phone').val();
                    var bill_from_email = $('#bill_from_email').val();
                    var invoice_date = $('#invoice_date').val();
                    console.log(invoice_date);
                    var bill_to_fnm = $('#billto_first_nm').val();
                    var bill_to_lnm = $('#billto_last_nm').val();
                    var bill_to_name = (bill_to_fnm + ' ' + bill_to_lnm);
                    var bill_to_email = $('#bill_to_email').val();
                    var bill_to_add = $('#bill_to_address').val();
                    var bill_to_com = $('#bil_to_company').val();
                    var bill_to_zip = $('#bil_to_zipcode').val();
                    var bill_to_ph = $('#bill_to_phone').val();
                    var t_amt = $('#total_amount').val();
                    var tax_percentage = $('#tax_amount_input').val();
                    console.log(tax_percentage);
                    var invoice_no = $('#invoice_no').val();
                    var sum_amount = $('#sum_amount').val();
                    var notes = $('#notes').val();
                    var tax_amount = (sum_amount * tax_percentage) / 100;
                    var project_name = $('#project_name').val();
                    var project_address = $('#project_address').val();


                    // console.log(type, bill_from_add);
                    $('#popup_project_address').text('Project Name : ' + project_name);
                    $('#popup_project_name').text('Project Address : ' + project_address);
                    $('#popup_type').text(type);
                    $('#popup_add').text('Address: ' + bill_from_add);
                    $('#popup_phone').text('Phone: ' + bill_from_phone);
                    $('#popup_email').text('Email: ' + bill_from_email);
                    if (invoice_date != '') {
                        $('#popup_date').text(invoice_date);
                    }

                    $('#popup_billto_name').text(bill_to_name);
                    $('#popup_billto_email').text(bill_to_email);
                    $('#popup_billto_add').text(bill_to_add);
                    $('#popup_billto_com').text(bill_to_com);
                    $('#popup_billto_zip').text(bill_to_zip);
                    $('#popup_billto_ph').text(bill_to_ph);
                    $('#popup_invoice_number').text(invoice_no);
                    $('#popup_total').text('$' + t_amt);
                    if (tax_percentage != '') {
                        $('#popup_tax_percentage').text(tax_percentage + '%');
                    } else {
                        $('#popup_tax_percentage').text(0);
                    }
                    $('#popup_logo').attr('src', logo);
                    $('#popup_tax_amount').text('$' + tax_amount.toFixed(2));
                    $('#popup_sum').text('$' + sum_amount);
                    $('#popup_notes').text(notes);

                    $('.modal-close').click(function() {
                        $('#pdfModal').modal('hide');
                    });

                });
            })
        </script>
    @endpush
