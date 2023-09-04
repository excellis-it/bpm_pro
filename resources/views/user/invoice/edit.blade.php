@extends('user.layouts.master')
@section('title')
    {{ env('APP_NAME') }} | Edit Invoice
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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

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
            margin: 60px 0px 20px 0px;
            border-radius: 10px;
        }
        
        .description_box{
           margin: 20px 0px; 
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
            margin: 10px 0px 20px;
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
            background: #007DD9;
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
            background: #007DD9;
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
            background: #007DD9;
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

        .tax-amt-div{
          position: relative;
        }
        .tax-amt-icon{
            position: absolute;
            top: 14px;
            right: 14px;
            font-size: 14px;
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
                margin: 0px!important;
            }

            .add-item-wrap {
                padding: 10px 10px 10px;
                margin-bottom: 0px;
            }
            .inv-head-wrap {
                text-align: center;
                width: 100%!important;
                padding: 15px;
                display: block!important;
                position: inherit!important;
            }
            .pre-view-wrap{
                justify-content: center!important
            }
            .pre-view {
              padding-right: 0px;
            }
            .inv-number {
                margin: 0px 0px;
            }

            .form-floating .form-control {
                margin-bottom: 15px!important;
            }
            .form-group .data-field{
                margin-bottom: 15px!important;
            }
            .form-group{
                margin: 0px;
            }
            .description_box{
                margin: 20px 0px!important;
            }
            .logo-div-wrap{
                margin-bottom: 10px;
            }
            .form-left h2{
                text-align: center
            }
            .  .inv-number {
                margin: 0px 0px;
            }

            .form-floating .form-control {
                margin-bottom: 15px!important;
            }
            .form-group .data-field{
                margin-bottom: 15px!important;
            }
            .form-group{
                margin: 0px;
            }
            .description_box{
                margin: 20px 0px!important;
            }
            .logo-div-wrap{
                margin-bottom: 10px;
            }
            .form-left h2{
                text-align: center
            }
            .send-btn .add-btn{
              font-size: 14px;
              padding: 5px 10px;
            }
            .edit_cancel_btn {
              font-size: 14px;
            }
            .edit_cancel_btn {
               font-size: 14px!important;
               padding: 5px 22px!important;
            }
            .annual-resale .form-control{
                padding: 60px 10px 20px 10px!important;
            }
            .invoice-type-top{
                padding: 0px 12px;
            }
            .show-dis .form-floating .form-select{
                padding: 5px  15px;
                margin: 0px 10px 0px 10px;
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

        

        .edit_cancel_btn {
            font-size: 16px;
            padding: 5px 35px;
            font-weight: 600;
            color: #fff;
            border-radius: 30px;
            background: red;
            text-align: center;
            margin: 0px 5px;
        }

        .edit_cancel_btn:hover {
            color: #fff;
        }

        .send-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0px 5px;
        }

        #add_more_item {
            float: left !important;
        }

        .inv-head-wrap {
            position: fixed;
            width: 68.5%;
            top: 7%;
            z-index: 99;
            padding: 20px;
            box-shadow: 0px 0px 42px rgb(0 0 0 / 10%);
            margin-bottom: 10px;
            border-radius: 10px;
            background: #fff;
        }

        .dollar-icon {
            position: absolute;
            top: 27px;
            left: 14px;
            font-size: 14px;
        }

        .dollar-icon-div .form-control {
            padding-left: 28px !important;
        }
    </style>
@endpush


@section('content')
    <div class="page-wrapper invoice_page">
        <section class="form-div">
            <div class="container-fluid">
                <div class="form-div-main">
                    <form method="POST" id="payment-form" data-parsley-validate
                        action="{{ route('invoice.update', $invoice->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-xl-9 col-md-9 col-12">

                                <div class="inv-head-wrap d-flex justify-content-between">
                                    <div class="inv-head">
                                        <h2>New Invoice - <span id="invoice_show" style="color: #ff7c04">
                                                {{ $invoice['invoice_no'] }} </span></h2>
                                    </div>

                                    <div class="pre-view-wrap d-flex justify-content-end align-items-center">
                                        <div class="pre-view">
                                            <a id="invoice-modal"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                        <div class="send-btn">
                                            <button type="submit" class="btn add-btn btn-order"
                                                id="add submitBtn">Update & Send</button>
                                            <a class="edit_cancel_btn" href="{{ route('invoice.index') }}">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-div-wrap">
                                    <div class="invoice-type-top">
                                    <div class="row justify-content-end">
                                        <div class="col-xl-2 co-md-4 col-12">
                                            <div class="temp-box">
                                                <div class="temp-box-wrap">
                                                    <div class="inv-number">
                                                        <div class="form-floating">
                                                            <select class="form-select types" name="type"
                                                                id="floatingSelect"
                                                                aria-label="Floating label select example">
                                                                <option selected value="Invoice"
                                                                    @if ($invoice['type'] == 'Invoice') selected @endif>
                                                                    Invoice</option>
                                                                <option value="Estimate"
                                                                    @if ($invoice['type'] == 'Estimate') selected @endif>
                                                                    Estimate</option>
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
                                                                <option selected value="USD"
                                                                    @if ($invoice['currency'] == 'USD') selected @endif>USD
                                                                </option>
                                                            </select>
                                                            <label for="floatingSelect">Currency</label>
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
                                                                <option value="1"
                                                                    @if ($invoice['send_in'] == '1') selected @endif>One
                                                                    time</option>
                                                                <option value="2"
                                                                    @if ($invoice['send_in'] == '2') selected @endif>Weekly
                                                                </option>
                                                                <option value="3"
                                                                    @if ($invoice['send_in'] == '3') selected @endif>
                                                                    Monthly</option>
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

                                                    <div class="col-sm-5">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="inputEmail3"
                                                                name="from_first_name" placeholder="Business Name"
                                                                value="{{ $invoice['from_first_name'] }}" required
                                                                data-parsley-trigger="keyup">
                                                            <label for="floatingInputValue"
                                                                class="col-sm-12 col-form-label">First Name<span
                                                                    style="color: red;">*</span></label>
                                                            @if ($errors->has('from_first_name'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('from_first_name') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="inputEmail3"
                                                                name="from_last_name" placeholder="Business Name"
                                                                value="{{ $invoice['from_last_name'] }}" required
                                                                data-parsley-trigger="keyup">
                                                            <label for="floatingInputValue"
                                                                class="col-sm-12 col-form-label">Last Name<span
                                                                    style="color: red;">*</span></label>
                                                            @if ($errors->has('from_last_name'))
                                                                <div class="error" style="color:red;">
                                                                    {{ $errors->first('from_last_name') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-10">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control"
                                                                id="bill_from_company" required
                                                                data-parsley-trigger="keyup"
                                                                value="{{ $invoice['from_company'] }}"
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
                                                                name="from_email" value="{{ $invoice['from_email'] }}"
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
                                                            <input type="text" class="form-control"
                                                                id="bill_from_address" id="" required
                                                                data-parsley-trigger="keyup" placeholder="Street"
                                                                value="{{ $invoice['from_address'] }}"
                                                                name="from_address">
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
                                                                id="bill_from_city" placeholder="City"
                                                                value="{{ $invoice['from_city'] }}" required
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
                                                            <select class="form-control" name="bill_from_state" required
                                                                data-parsley-trigger="keyup" id="bill_from_state">
                                                                <option value=""> Select State</option>
                                                                @foreach ($states as $state)
                                                                    <option value="{{ $state->name }}"
                                                                        {{ $invoice['from_state'] == $state->name ? 'selected' : '' }}>
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
                                                                id="bill_from_zipcode"
                                                                value="{{ $invoice['from_zipcode'] }}" required
                                                                data-parsley-trigger="keyup" name="from_zipcode">
                                                            <label for="floatingInputValue"
                                                                class="col-sm-12 col-form-label">Zip Code<span
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
                                                                id="bill_from_phone" required data-parsley-trigger="keyup"
                                                                placeholder="(123) 456 789"
                                                                value="{{ $invoice['from_phone'] }}"
                                                                name="bill_from_phone">
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
                                                        <div class="form-floating annual-resale">
                                                            <input type="text" class="form-control"
                                                                id="floatingInputValue" data-parsley-trigger="keyup"
                                                                placeholder="123456789 RT"
                                                                value="{{ $invoice['from_gst'] }}" name="bill_from_gst">
                                                            <label for="floatingInputValue"
                                                                class="col-sm-12 col-form-label">Annual Resale Certificate
                                                                for Sales Tax #
                                                            </label>
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
                                                    @php
                                                        $explode = explode(' ', $invoice['bil_to_name']);
                                                    @endphp
                                                    <div class="col-xl-6 col-md-6 col-12">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" name="first_name"
                                                                required data-parsley-trigger="keyup"
                                                                value="{{ $explode[0] ?? '' }}" id="billto_first_nm">
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
                                                                value="{{ $explode[1] ?? '' }}" required
                                                                data-parsley-trigger="keyup" id="billto_last_nm">
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
                                                                value="{{ $invoice['company'] }}" name="bil_to_company">
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
                                                                value="{{ $invoice['bil_to_email'] }}"
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
                                                                value="{{ $invoice['bil_to_address'] }}"
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
                                                                value="{{ $invoice['bil_to_city'] }}"
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
                                                                    <option value="{{ $state->name }}"
                                                                        {{ $invoice['bil_to_state'] == $state->name ? 'selected' : '' }}>
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
                                                                value="{{ $invoice['bil_to_zipcode'] }}"
                                                                name="bil_to_zipcode">
                                                            <label for="bil_to_zipcode"
                                                                class="col-sm-12 col-form-label">Zip Code<span
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
                                                                value="{{ $invoice['bil_to_phone'] }}"
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
                                                                value="{{ $invoice['bil_to_mobile'] }}"
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="Item-div">
                                    <h2>Item Description</h2>
                                </div>
                                <div class="form-div-wrap add_item_box description_box">
                                    @foreach ($invoice['items'] as $key => $value)
                                        <div class="add-item-wrap">
                                            @if ($key != 0)
                                                <div class="cross-btn"><a href="javascript:void(0)"><i
                                                            class="fa-solid fa-xmark"></i></a></div>
                                            @endif
                                            <div class="row justify-content-between">
                                                <div class="col-xl-12">
                                                    <div class="item-head">
                                                        <h2>{{ $key + 1 }}. Item Description</h2>
                                                    </div>
                                                    <div class="form-left form-item">
                                                        
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <div class="form-floating">
                                                                    <input type="text"
                                                                        class="form-control data-field item_description"
                                                                        value="{{ $value['item_description'] }}"
                                                                        name="item_description[]" required
                                                                        data-parsley-trigger="keyup"><label
                                                                        for="floatingInputValue"
                                                                        class="col-sm-2 col-form-label">Name</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="hidden" value="{{ $value['image'] }}"
                                                                    name="image_field[]" class="image_field"
                                                                    data-image="{{ Storage::url($value['image']) }}">
                                                                <input type="file"
                                                                    class="form-control image data-field" name="image[]"
                                                                    value="{{ $value['image'] }}" accept="image/*"
                                                                    id="image" placeholder="Amount"
                                                                    data-parsley-required="false"
                                                                    data-parsley-trigger="keyup">
                                                                @if ($value['image'])
                                                                    <img src="{{ Storage::url($value['image']) }}"
                                                                        alt="" class="image_preview"
                                                                        width="100px" height="100px">
                                                                @endif

                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-4">
                                                                <div class="form-floating">
                                                                    <input type="number"
                                                                        class="form-control quantity data-field"
                                                                        value="{{ $value['item_quantity'] }}"
                                                                        name="quantity[]" required
                                                                        data-parsley-trigger="keyup" min="1">
                                                                    <label for="floatingInputValue"
                                                                        class="col-sm-2 col-form-label">Quantity</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-floating dollar-icon-div">
                                                                    <span class="dollar-icon"><i
                                                                        class="fa-solid fa-dollar-sign"></i></span>
                                                                    <input type="text"
                                                                        class="form-control rate data-field priceformat"
                                                                        name="rate[]" required
                                                                        value="{{ $value['item_rate'] }}"
                                                                        data-parsley-trigger="keyup">
                                                                    <label for="floatingInputValue"
                                                                        class="col-sm-12 col-form-label">Unit Price
                                                                        ($)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-floating dollar-icon-div">
                                                                    <span class="dollar-icon"><i
                                                                        class="fa-solid fa-dollar-sign"></i></span>
                                                                    <input type="text"
                                                                        class="form-control amount data-field"
                                                                        name="amount[]"
                                                                        value="{{ $value['item_amount'] }}"
                                                                        id="amount_1" required
                                                                        data-parsley-trigger="keyup" readonly>
                                                                    <label for="floatingInputValue"
                                                                        class="col-sm-12 col-form-label">Extended Price
                                                                        ($)</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <div class="form-floating">
                                                                    <textarea class="form-control additional_details" name="additional_details[]" data-parsley-required="false"
                                                                        value="{{ $value['item_additional_details'] }}" data-parsley-trigger="keyup" rows="2">{{ $value['item_additional_details'] }}</textarea>
                                                                    <label for="floatingInputValue"
                                                                        class="col-sm-2 col-form-label">Description</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
                                    <div class="row justify-content-start">
                                        <div class="add-item">

                                        </div>
                                        <div class="col-xl-3 col-12 mt-3">
                                            <a class="btn add-btn" id="add_more_item">Add Next Item</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-div-wrap description_box">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" name="notes" id="notes" data-parsley-trigger="keyup"
                                                    data-parsley-required="false">{{ $invoice['notes'] }}</textarea>
                                                <label for="floatingInputValue"
                                                    class="col-sm-12 col-form-label">Notes</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-sm-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="project_name" required
                                                    value="{{ $invoice['project_name'] }}" data-parsley-trigger="keyup"
                                                    name="project_name">
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
                                                    value="{{ $invoice['project_address'] }}" required
                                                    data-parsley-trigger="keyup" id="project_address">
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
                                            @if(Auth::user()->logo)
                                            <a href="https://excellis.co.in/bpm_pro">
                                                <img src="{{ Storage::url(Auth::user()->logo) }}" alt="" id="logo" data-id="{{ Storage::url(Auth::user()->logo) }}">
                                            </a>
                                            @endif
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
                                                            id="invoice_no" required data-parsley-trigger="keyup"
                                                            value="{{ $invoice['invoice_no'] }}" readonly>
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
                                                            value="{{ $invoice['invoice_date'] }}" required
                                                            data-parsley-trigger="keyup" id="invoice_date">
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
                                                            <option selected value="On Receipt"
                                                                {{ $invoice['due'] == 'On Receipt' ? 'selected' : '' }}>
                                                                On Receipt</option>
                                                            <option value="No due date"
                                                                {{ $invoice['due'] == 'No due date' ? 'selected' : '' }}>
                                                                No due date</option>
                                                            <option value="On specific date"
                                                                {{ $invoice['due'] == 'On specific date' ? 'selected' : '' }}>
                                                                On specific date</option>
                                                        </select>
                                                        <label for="floatingSelect">Due</label>
                                                        <input type="date" name="due_date" id="date"
                                                            class="form-control" min="{{ date('Y-m-d') }}"
                                                            value="{{ $invoice['due'] == 'On specific date' ? date('Y-m-d') : $invoice['due_date'] }}">
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
                                                            value="{{ $invoice['sub_total'] }}">
                                                        <h4><span class="total_amount">{{ $invoice['sub_total'] }}</span>
                                                        </h4>
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
                                                        <h4 style="color: blue; font-weight: 600;cursor: pointer;">Add</h4>
                                                    </div>
                                                </div> --}}
                                                <hr />

                                                <div class="sub d-flex justify-content-between ">
                                                    <div>
                                                        <h3>Discount Amount</h3>
                                                    </div>
                                                    <div>
                                                        <h4 style="color: #007DD9; font-weight: 600;cursor: pointer;"
                                                            id="button-add">Add
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <div class="me-2 show-dis">
                                                        <div class="form-floating">
                                                            <input type="text" name="discount_price"
                                                                value="{{ $invoice['discount_price'] }}"
                                                                class="form-control discount_price">
                                                            <label for="floatingInputValue">Other Discount</label>
                                                        </div>
                                                    </div>
                                                    <div class="show-dis">
                                                        <div class="form-floating">
                                                            <select class="form-select currency-select"
                                                                name="discount_type" id="floatingSelect"
                                                                aria-label="Floating label select example">
                                                                <option selected="" value="1"
                                                                    {{ $invoice['discount_type'] == 1 ? 'selected' : '' }}>
                                                                    %</option>
                                                                <option value="2"
                                                                    {{ $invoice['discount_type'] == 2 ? 'selected' : '' }}>
                                                                    $</option>
                                                            </select>
                                                            <!--<label for="floatingSelect">Send in</label>-->

                                                        </div>
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="sub d-flex justify-content-between">
                                                    <div>

                                                    </div>

                                                </div>
                                                <div class="sub d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <h3 >Tax (%)</h3>
                                                    </div>
                                                    <div class="tax-amt-div">
                                                        <h4 style="color: blue; font-weight: 600;cursor: pointer;"
                                                            id="tax_amount">Add
                                                        </h4>
                                                        <span class="tax-amt-icon" style="display:none" id="tax-arrow"><i class="fa-solid fa-arrow-right"></i></span>
                                                        <input type="text" name="tax_amount" id="tax_amount_input"
                                                            class="form-control" placeholder="Tax amount" min="0"
                                                            value="{{ $invoice['tax_amount'] }}" max="100"
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
                                                            value="{{ $invoice['total'] }}" value="0">
                                                        <h4><span class="sum_amount">{{ $invoice['total'] }}</span></h4>
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
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
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
                                                                            style="font-size: 14px; color: #000; font-weight: 500; line-height: 18px; vertical-align: top; text-align: left;font-family: Montserrat, sans-serif;">
                                                                            <img src="webex.png" alt="logo"
                                                                                id="popup_logo" border="0"
                                                                                style="object-fit: contain; width: 100px; height: 50px;font-family: Montserrat, sans-serif; display:inline-block;" />
                                                                            <span
                                                                                style="display: block; text-align: left; padding-top: 5px;font-family: Montserrat, sans-serif;"
                                                                                id="popup_comp"></span>
                                                                            <span
                                                                                style="display: block; text-align: left; padding-top: 5px;font-family: Montserrat, sans-serif;"
                                                                                id="popup_add"> </span>
                                                                            <span
                                                                                style="display: block; text-align: left; padding-top: 5px;font-family: Montserrat, sans-serif;"
                                                                                id="popup_citystate"></span>
                                                                            <span
                                                                                style="display: block; text-align: left; padding-top: 5px;font-family: Montserrat, sans-serif;"
                                                                                id="popup_phone"> </span>
                                                                            <span
                                                                                style="display: block; text-align: left; padding-top: 5px;font-family: Montserrat, sans-serif;"
                                                                                id="popup_email"></span>

                                                                        </td>

                                                                        <td
                                                                            style="font-size: 14px; font-weight: 500; color: #000; line-height: 20px; vertical-align: top; text-align: left;font-family: Montserrat, sans-serif;">
                                                                            <table border="0" cellpadding="0"
                                                                                cellspacing="0" align="right">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <span
                                                                                                style="color: #007DD9;
                                                                                                padding: 3px 0px;
                                                                                                text-align: center;
                                                                                                font-size: 36px;
                                                                                                line-height: 1;
                                                                                                font-weight: 500;
                                                                                                display: inline-block;
                                                                                                width:219px;font-family: Montserrat, sans-serif;">INVOICE</span><br>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><span
                                                                                                style="background: #007DD9; margin: 10px 0px; padding: 5px; color: #fff;  display: flex;
                                                                                                justify-content: space-between;font-family: Montserrat, sans-serif; width:250px;">
                                                                                                <span>INVOICE#</span>
                                                                                                <span>DATE</span></span>
                                                                                            <span
                                                                                                style="color: #000; text-align: center; display: inline-block; width: 100%; font-size: 14px;display: flex; justify-content: space-between;font-family: Montserrat, sans-serif;">
                                                                                                <span
                                                                                                    id="popup_invoice_number">2034</span>
                                                                                                <span
                                                                                                    id="popup_date">03/08/2023</span>
                                                                                            </span>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><span
                                                                                                style="background: #007DD9; margin: 10px 0px;  padding: 5px; color: #fff;  display: flex;
                                                                                                justify-content: start;font-family: Montserrat, sans-serif; width:250px;text-align: left;">
                                                                                                TERMS</span>
                                                                                            <span
                                                                                                style="color: #000; text-align: left; display: inline-block; width: 100%; font-size: 14px; font-weight: 400;font-family: Montserrat, sans-serif;"
                                                                                                id="popup_term">
                                                                                            </span>
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
                                                                            style="font-size: 14px; color: #000; font-weight: 400; line-height: 18px; vertical-align: top; text-align: right;font-family: Montserrat, sans-serif;">
                                                                            <span
                                                                                style="display: block; text-align: left; background: #007DD9; padding: 5px; color: #fff;font-family: Montserrat, sans-serif;font-weight:400">Bill
                                                                                To</span>
                                                                            <span
                                                                                style="display: block; text-align: left; padding-top: 5px;font-family: Montserrat, sans-serif;"
                                                                                id="popup_billto_name">Name:
                                                                                Pritam Maity</span>
                                                                            <span
                                                                                style="display: block; text-align: left; padding-top: 5px;font-family: Montserrat, sans-serif;"
                                                                                id="popup_billto_com">Company
                                                                                Name</span>
                                                                            <span
                                                                                style="display: block; text-align: left; padding-top: 5px;font-family: Montserrat, sans-serif;"
                                                                                id="popup_billto_add">Address</span>
                                                                            <span
                                                                                style="display: block; text-align: left; padding-top: 5px;font-family: Montserrat, sans-serif;"
                                                                                id="popup_billto_zip">Zip
                                                                                Code</span>
                                                                            <span
                                                                                style="display: block; text-align: left; padding-top: 5px;font-family: Montserrat, sans-serif;"
                                                                                id="popup_billto_ph">Phone</span>
                                                                            <span
                                                                                style="display: block; text-align: left; padding-top: 5px;font-family: Montserrat, sans-serif;"
                                                                                id="popup_billto_email">Email
                                                                                Address</span>
                                                                        </td>
                                                                        <td style="vertical-align: top;">
                                                                            <table border="0" cellpadding="0"
                                                                                cellspacing="0" align="right"
                                                                                style="vertical-align: top;font-family: Montserrat, sans-serif;">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td><span
                                                                                                style="background: #007DD9;
                                                                                                margin: 0 0 10px;
                                                                                                padding: 5px;
                                                                                                color: #fff;
                                                                                                width: 250px;
                                                                                                display: inline-block;
                                                                                                text-align: center;font-family: Montserrat, sans-serif; font-weight:500;font-size: 14px;">
                                                                                                PROJECT NAME AND ADDRESS</span></br>

                                                                                            <span
                                                                                                style="display: inline-block; text-align: left; padding-top: 5px;font-family: Montserrat, sans-serif;width:250px;"
                                                                                                id="popup_project_name"></span></br>
                                                                                            <span
                                                                                                style="display: inline-block; text-align: left; padding-top: 5px;font-family: Montserrat, sans-serif;width:250px;"
                                                                                                id="popup_project_address"></span>
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
                                                <thead>
                                                    <tr>
                                                        <th style="background: #007DD9; font-size: 16px; font-weight: 500;  color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px;font-family: Montserrat, sans-serif;"
                                                            width="32%" align="left">
                                                            ITEM NAME
                                                        </th>
                                                        <th style="background: #007DD9; font-size: 16px;  font-weight: 500;  color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px;font-family: Montserrat, sans-serif;"
                                                            align="left">
                                                            UNIT PRICE
                                                        </th>
                                                        <th style="background: #007DD9; font-size: 16px;  font-weight: 500; color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px;font-family: Montserrat, sans-serif;"
                                                            align="center">
                                                            QUANTITY
                                                        </th>
                                                        <th style="background: #007DD9; font-size: 16px;  font-weight: 500;  color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px;font-family: Montserrat, sans-serif;"
                                                            align="right">
                                                            EXTENDED PRICE
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td height="1" style="background: #bebebe;" colspan="4"></td>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="tableVal">
                                                    
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td
                                                            style="font-size: 16px; font-weight: 600; color: #007DD9;  line-height: 14px;  vertical-align: top; padding:10px;font-family: Montserrat, sans-serif;">
                                                            Notes: <span id="popup_notes"
                                                                style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; font-weight: 400;  padding:10px;font-family: Montserrat, sans-serif;"
                                                                align="right"></span>
                                                        </td>
                                                        <td colspan="2"
                                                            style="font-size: 16px; color: #000; line-height: 14px; text-align: left; vertical-align: top; padding: 10px; font-weight: 400; background: #cce7ff;font-family: Montserrat, sans-serif;">
                                                            Subtotal:
                                                        </td>
                                                        <td id="popup_total"
                                                            style="font-size: 16px; color: #000; line-height: 14px; text-align: right; vertical-align: top; padding: 10px; font-weight: 400; background: #e6f3ff;font-family: Montserrat, sans-serif;">
                                                            $390.00
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td
                                                            style="font-size: 16px; color: #000; line-height: 14px; text-align: left; vertical-align: top; padding: 10px; font-weight: 400; background: #cce7ff;font-family: Montserrat, sans-serif;">
                                                            Tax:
                                                        </td>
                                                        <td id="popup_tax_percentage"
                                                            style="font-size: 16px; color: #000; line-height: 14px; text-align: left; vertical-align: top; padding: 10px; font-weight: 400; background: #cce7ff;font-family: Montserrat, sans-serif;">
                                                            7.00%
                                                        </td>
                                                        <td id="popup_tax_amount"
                                                            style="font-size: 16px; color: #000; line-height: 14px; text-align: right; vertical-align: top; padding: 10px; font-weight: 400; background: #e6f3ff;font-family: Montserrat, sans-serif;">
                                                            $27.30
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="2"
                                                            style="font-size: 16px; color: #000; line-height: 14px; text-align: left; vertical-align: top; padding: 10px; font-weight: 600; background: #cce7ff; border-top:2px solid #000;font-family: Montserrat, sans-serif;">
                                                            TOTAL
                                                        </td>
                                                        <td id="popup_sum"
                                                            style="font-size: 16px; color: #000; line-height: 14px; text-align: right; vertical-align: top; padding: 10px; font-weight: 600; background: #e6f3ff;  border-top:2px solid #000;font-family: Montserrat, sans-serif;">
                                                            $417.30
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="1" colspan="4"
                                                            style="border-bottom:3px solid #000"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"
                                                            style="font-size: 16px; font-weight: 600; color: #007DD9;  line-height: 14px;  vertical-align: top; padding:10px;font-family: Montserrat, sans-serif;">
                                                            <span id="additional_info">Additional Information:</span>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <div id="item-image" style="columns: 4; display:block;">

                                                            </div>

                                                        </td>
                                                    </tr>
                                                    <!--<tr>-->
                                                    <!--    <td height="1" colspan="4"-->
                                                    <!--        style="border-bottom:3px solid #000">-->
                                                    <!--    </td>-->
                                                    <!--</tr>-->
                                            </table>
                                        </td>
                                    </tr>

                                </tfoot>
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
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center"
                                        bgcolor="#ffffff" style="border-radius: 0 0 10px 10px;">
                                        <tr>
                                            <td height="20"></td>
                                        </tr>
                                        <tr bgcolor="#fff" style="text-align: center;">
                                            <td height="50">
                                                <p style="color: #606060; padding: 0px; margin: 0;">Powered by
                                                    xTriam.com</p>
                                                <p
                                                    style="color: #000; padding: 10px; margin: 0;font-style: italic; font-weight: 600;font-family: Montserrat, sans-serif;">
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
                            <button type="button" class="btn modal-close" data-dismiss="modal"
                                style="background: #007DD9; color: #fff;font-family: Montserrat, sans-serif;">Cancel</button>

                        </div>
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
        <script src="number-divider.js"></script>
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
                @if ($invoice['discount_price'] != null)
                    $('.show-dis').show();
                @else
                    $('.show-dis').hide();
                @endif
                $('#button-add').on('click', function() {
                    $('.show-dis').show();
                    $('#button-add').hide();
                });
            })
        </script>
        <script>
            $(document).ready(function() {
                @if ($invoice['due'] == 'On specific date')
                    $('#date').show();
                @else
                    $('#date').hide();
                @endif
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

                var i = {{ count($invoice['items']) }};
                $("#add_more_item").click(function() {
                    i++;

                    $(".add-item").append('<div class="add-item-wrap" id="addMoreInputFields_' + i +
                        '"><div class="cross-btn"><a href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a></div><div class="row justify-content-between"><div class="col-xl-12"><div class="item-head"><h2>' +
                        i +
                        '. Item Description</h2></div><div class="form-left form-item"><div class="form-group row"><div class="col-sm-6"><div class="form-floating"><input type="text" class="form-control item_description data-field" name="item_description[]" required data-parsley-trigger="keyup" ><label for="floatingInputValue" class="col-sm-2 col-form-label">Name</label></div></div><div class="col-sm-6"><input type="file" class="form-control image data-field" name="image[]"  placeholder="Amount" data-parsley-required="false" data-parsley-trigger="keyup" ></div></div><div class="form-group row"><div class="col-sm-4"><div class="form-floating"><input type="number" class="form-control quantity data-field" min="1"  name="quantity[]" id="quan_' +
                        i +
                        '"  required data-parsley-trigger="keyup"><label for="floatingInputValue" class="col-sm-2 col-form-label">Quantity</label></div></div><div class="col-sm-4"><div class="form-floating dollar-icon-div"><span class="dollar-icon"><i class="fa-solid fa-dollar-sign"></i></span><input type="text" class="form-control rate data-field" required  data-parsley-trigger="keyup" name="rate[]" id="rate_' +
                        i +
                        '"  ><label for="floatingInputValue" class="col-sm-12 col-form-label">Unit Price ($)</label></div></div><div class="col-sm-4"><div class="form-floating dollar-icon-div"><span class="dollar-icon"><i class="fa-solid fa-dollar-sign"></i></span><input type="text" class="form-control amount data-field" id="' +
                        i +
                        '"  name="amount[]" readonly><label for="floatingInputValue" class="col-sm-12 col-form-label">Extended Price ($)</label></div></div></div><div class="form-group row"><div class="col-sm-12"><div class="form-floating"><textarea class="form-control additional_details" data-parsley-required="false" data-parsley-trigger="keyup" name="additional_details[]"  rows="2"></textarea><label for="floatingInputValue" class="col-sm-2 col-form-label"> description</label></div></div></div></div></div></div></div>'
                    );
                });
                $(document).on('click', '.cross-btn', function() {
                    // remove pareent div
                    $(this).parent().remove();
                });

                function calculateTotalAmount() {
                    $('.rate').each(function(index) {
                        const rateValue = parseFloat($(this).val().replace(/,/g, '')) || 0;
                        const quantityValue = parseFloat($('.quantity').eq(index).val()) || 0;
                        const totalAmount = rateValue * quantityValue;
                        const formatAmount = totalAmount.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                        $('.amount').eq(index).val(formatAmount);
                        // not change rate decimal value only replace preg
                        $('.rate').eq(index).val($(this).val().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    });
                }

                // Function to calculate the overall result
                function calculateResult() {

                    //  alert(tax_amount);
                    var rs = 0;
                    var result = 0;
                    $('.amount').each(function() {
                        // Get the value of the current formatted amount
                        const amountValue = parseFloat($(this).val().replace(/,/g, '')) || 0;
                        // Add the value to the result
                        result += amountValue;
                        rs += amountValue;
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
                    $('.total_amount').text('$' + sub_total.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    $('.sum_amount').text('$' + result.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
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

                // Attach click event to the "remove" buttons
                $(document).on('click', '.cross-btn', function() {
                    $(this).prevAll('.amount').val('');
                    $(this).prevAll('.quantity').val('');
                    $(this).prevAll('.rate').val('');
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
                // input field take only numbre
                var inputValue = $(this).val();
                
                var numericValue = inputValue.replace(/\D/g, '');
                $(this).val(numericValue);
                
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
                
                var inputValue = $(this).val();
                $('#tax-arrow').show();

                // Check if the entered value is within the valid range (0 to 100) no floating point numbers allowed
                if (inputValue < 0 || inputValue > 100 || inputValue % 1 !== 0 || inputValue == '') {
                    // Reset the value if it's invalid
                    $(this).val('');
                    $('#tax-arrow').hide();
                }
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
            @if ($invoice['tax_amount'] != null)
                $('#tax_amount_input').show();
                $('#tax_amount').hide();
            @endif
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
                    var image_fields = $("input.image_field");



                    $('#tableVal').html('');
                    $('#item-image').html('');
                    // }
                    for (var i = 0; i < images.length; i++) {
                        var image_field = $(image_fields[i]).data('image') ?? '';
                        var image = $(images[i]).prop('files')[0] ?? '';
                        var reader = new FileReader();
                        
                        if (image) {
                            var new_image = URL.createObjectURL(image);
                        } else {
                            var new_image = "";
                        }
                        console.log(new_image);
                        if (new_image) {
                            var newImage =
                                '<img style="object-fit: cover; width: 150px; height: 150px; padding: 5px;display: inherit;" src="' +
                                new_image + '">';
                            $('#additional_info').show();
                        } else {
                            $('#additional_info').hide();
                        }

                        $('#item-image').append(newImage);
                    }

                    for (var i = 0; i < names.length; i++) {
                        var name = $(names[i]).val();
                        var rate = $(rates[i]).val();
                        var quantity = $(quantities[i]).val();
                        var amount = $(amounts[i]).val();

                      if (name) {
                            var newRow = '<tr>' +
                                '<td style="font-size: 14px;  color: #000;  line-height: 18px;  vertical-align: top; padding: 5px; display: flex; align-item: center;">' +
                                name +
                                '</td>' +
                                '<td style="font-size: 16px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px;">$' +
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

                    }

                    $('#pdfModal').modal('show');
                    var type = $('.types').val();

                    var logo = $('#logo').data('id');
                    var from_company = $('#bill_from_company').val();
                    var bill_from_add = $('#bill_from_address').val();
                    var bill_from_city = $('#bill_from_city').val();
                    var bill_from_state = $('#bill_from_state').val();
                    var bill_from_zip = $('#bill_from_zipcode').val();
                    var bill_from_phone = $('#bill_from_phone').val();
                    var bill_from_email = $('#bill_from_email').val();
                    var invoice_date = $('#invoice_date').val();
                    console.log(invoice_date);
                    var term = $('#due_floatingSelect').val();
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
                    
                    $('#popup_project_name').text(project_name);
                    $('#popup_project_address').text(project_address);
                    $('#popup_type').text(type);
                    $('#popup_comp').text(from_company);
                    $('#popup_add').text(bill_from_add);
                    $('#popup_citystate').text(bill_from_city + ',' + bill_from_state + ',' + bill_from_zip);
                    $('#popup_phone').text('Phone: ' + bill_from_phone);
                    $('#popup_email').text('Email: ' + bill_from_email);
                    if (invoice_date != '') {
                        $('#popup_date').text(invoice_date);
                    }

                    $('#popup_term').text(term);

                    $('#popup_billto_name').text(bill_to_name);
                    $('#popup_billto_email').text(bill_to_email);
                    $('#popup_billto_add').text(bill_to_add);
                    $('#popup_billto_com').text(bill_to_com);
                    $('#popup_billto_zip').text(bill_to_zip);
                    $('#popup_billto_ph').text(bill_to_ph);
                    $('#popup_invoice_number').text(invoice_no);
                    $('#popup_total').text('$' + t_amt.replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    if (tax_percentage != '') {
                        $('#popup_tax_percentage').text(tax_percentage + '%');
                    } else {
                        $('#popup_tax_percentage').text(0);
                    }
                    $('#popup_logo').attr('src', logo);
                    $('#popup_tax_amount').text('$' + tax_amount.toFixed(2));
                    $('#popup_sum').text('$' + sum_amount.replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    $('#popup_notes').text(notes);

                    $('.modal-close').click(function() {
                        $('#pdfModal').modal('hide');
                    });

                });
            })
        </script>

        <script>
            // // Select all elements with class "t_amount"
            // $('.amount').each(function() {
            //     var value = parseFloat($(this).val()) || 0;
            //     const formatAmount = value.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            //     $('.amount').eq(index).val(formatAmount);
            // });
        </script>
    @endpush
