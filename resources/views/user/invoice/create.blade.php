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

        #sig canvas {
            width: 100% !important;
            height: auto;
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
                                        <h2>New Invoice No <span>(EIT0065)</span></h2>
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
                                                                aria-label="Floating label select example">
                                                                <option selected value="Invoice">Invoice</option>
                                                                <option value="Estimate">Estimate</option>
                                                            </select>
                                                            <label for="floatingSelect">Type</label>
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
                                                    <h2>Bill To</h2>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-xl-6 col-12">
                                        <div class="form-left me-3">
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Name<span
                                                        style="color: red;">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputEmail3"
                                                        placeholder="Business Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Email<span
                                                        style="color: red;">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputPassword3"
                                                        placeholder="name@business.com">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">State<span
                                                        style="color: red;">*</span></label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" name="state">
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->name }}">{{ $state->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">City<span style="color: red;">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputPassword3"
                                                        placeholder="City">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Address<span
                                                        style="color: red;">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputPassword3"
                                                        placeholder="Street">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Phone<span
                                                        style="color: red;">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputPassword3"
                                                        placeholder="(123) 456 789">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">GST
                                                    #<span style="color: red;">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputPassword3"
                                                        placeholder="123456789 RT">
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                        <div class="col-xl-12">
                                            <div class="form-left me-3">
                                                <!--<h2>Bill To</h2>-->

                                                <div class="form-group row">
                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="bil_to_name"
                                                            id="inputEmail3" placeholder="Client Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="bil_to_email"
                                                            id="inputPassword3" placeholder="name@client.com">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Street
                                                        address<span style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputPassword3"
                                                            name="bil_to_address" placeholder="Location">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">City<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputPassword3"
                                                            name="bil_to_city" placeholder="City">
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
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="inputPassword3"
                                                        class="col-sm-2 col-form-label">Zipcode<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputPassword3"
                                                            placeholder="Zipcode" name="bil_to_zipcode">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Phone<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="bill_to_phone"
                                                            name="bil_to_phone" placeholder="(123) 456 789"
                                                            onblur="formatPhone(this);" onkeypress="formatPhone(this);">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3"
                                                        class="col-sm-2 col-form-label">Mobile<span
                                                            style="color: red;">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputPassword3"
                                                            name="bil_to_mobile" placeholder="(123) 456 789"
                                                            onblur="formatPhone(this);" onkeypress="formatPhone(this);">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputPassword3"
                                                        class="col-sm-2 col-form-label">Fax</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="bil_to_faxNo"
                                                            id="inputPassword3" placeholder="123456789">
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
                                                                <input type="text" class="form-control"
                                                                    id="inputEmail3" placeholder="Rate">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-12">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    id="inputEmail3" placeholder="Quantity">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-12">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    id="inputEmail3" placeholder="Amount">
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
                                                    src="https://excellis.co.in/bpm_pro/frontend_assets/img/logo.png"
                                                    alt=""></a>
                                        </div>
                                        <div class="logo-text">
                                            <h3>BPM PRO</h3>
                                        </div>
                                    </div>
                                    <div class="inv-number-div">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="inv-number">
                                                    <div class="form-floating">
                                                        <input type="text" name="invoice_no" class="form-control"
                                                            id="floatingInputValue" placeholder="" value="EIT0065">
                                                        <label for="floatingInputValue">Invoice Number</label>
                                                    </div>
                                                </div>
                                                <div class="inv-number">
                                                    <div class="form-floating">
                                                        <input type="date" name="invoice_date" class="form-control"
                                                            id="floatingInputValue" placeholder="" value="EIT0065">
                                                        <label for="floatingInputValue">Invoice Date</label>
                                                    </div>
                                                </div>
                                                <div class="inv-number">
                                                    <div class="form-floating">
                                                        <select class="form-select" name="due" id="floatingSelect"
                                                            aria-label="Floating label select example">
                                                            <option selected>On Receipt</option>
                                                            <option value="1">On Receipt</option>

                                                        </select>
                                                        <label for="floatingSelect">Due</label>
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
                                                        <h4>$300.00</h4>
                                                    </div>
                                                </div>
                                                <div class="sub d-flex justify-content-between">
                                                    <div>
                                                        <h3>Other Discount</h3>
                                                    </div>
                                                    <div>
                                                        <h4 style="color: blue; font-weight: 600;">-$25.00</h4>
                                                    </div>
                                                </div>
                                                <div class="sub d-flex justify-content-between">
                                                    <div>
                                                        <h3>Shipping</h3>
                                                    </div>
                                                    <div>
                                                        <h4 style="color: blue; font-weight: 600;">Add</h4>
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="sub d-flex justify-content-between">
                                                    <div>
                                                        <h3>Tax(local...9.75%)</h3>
                                                    </div>
                                                    <div>
                                                        <h4>$26.81</h4>
                                                    </div>
                                                </div>
                                                <div class="sub d-flex justify-content-between">
                                                    <div>
                                                        <h3>Other Amount</h3>
                                                    </div>
                                                    <div>
                                                        <h4 style="color: blue; font-weight: 600;">Add</h4>
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="sub d-flex justify-content-between">
                                                    <div>
                                                        <h3 style="font-weight: 600; color: #000;">Total</h3>
                                                    </div>
                                                    <div>
                                                        <h4>$301.81</h4>
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
        <div class="modal fade" id="modelWindow" role="dialog" style="margin-left:0px">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">


                        <body style="background: #f2f2f2;">
                            <table width="600" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
                                style="border-radius: 0px; margin: 0 auto;">
                                <tbody>
                                    <tr>
                                        <td style="padding:0 30px">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                align="">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                align="">
                                                                <tbody>
                                                                    <tr>
                                                                        <td align="left"><img src=""
                                                                                width="100%"
                                                                                style="height: 120px;
                                                    margin-left: -29px;"
                                                                                alt="logo" border="0" /></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>

                                                        <td>
                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                align="right">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="font-size: 14px; color: #000; font-weight: 800; line-height: 18px; vertical-align: top; text-align: right; padding: 15px 0 0;">
                                                                            <img src="" alt="logo"
                                                                                border="0"
                                                                                style="object-fit: contain;width:100px;" /><br>
                                                                            <span>Address:</span><br>
                                                                            <span>Phone: </span><br>
                                                                            <span>Email: </span><br>
                                                                            <span>Date: </span>




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
                                        <td style="padding:0 30px">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                align="center">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                align="left">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="font-size: 20px; font-weight: 300; color: #000; line-height: 30px; vertical-align: top; text-align: left; text-transform: uppercase;">
                                                                            Invoice to
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="font-size: 14px; font-weight: 800; color: #000; line-height: 20px; vertical-align: top; text-align: left;">
                                                                            <span
                                                                                style="font-size: 20px; font-weight: 900; color: #FF7B02; line-height: 30px;"></span>
                                                                            <br>
                                                                            <span></span><br>
                                                                            <span></span>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td>
                                                            <table border="0" cellpadding="0" cellspacing="0"
                                                                align="right">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="">
                                                                            <span
                                                                                style="background: #ff8719; color: #fff; padding: 3px 40px; text-align: center; font-size: 36px; line-height: 1; font-weight: 300; display: inline-block;">INVOICE</span><br>
                                                                            <span
                                                                                style="color: #000; text-align: center; display: inline-block; width: 100%; padding: 8px 0; font-size: 18px; font-weight: 600;"></span><br>

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
                                                        <th style="background: #ff8719; font-size: 16px; font-wight: 800;  color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px;"
                                                            width="52%" align="left">
                                                            Item description
                                                        </th>
                                                        <th style="background: #ff8719; font-size: 16px;  font-wight: 800;  color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px;"
                                                            align="left">
                                                            Rate
                                                        </th>
                                                        <th style="background: #ff8719; font-size: 16px;  font-wight: 800; color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px"
                                                            align="center">
                                                            Quantity
                                                        </th>
                                                        <th style="background: #ff8719; font-size: 16px;  font-wight: 800;  color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px"
                                                            align="right">
                                                            Amount
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td height="1" style="background: #bebebe;" colspan="4">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="10" colspan="4"></td>
                                                    </tr>

                                                    <tr>
                                                        <td
                                                            style="font-size: 14px; font-wight: 800;  color: #000;  line-height: 18px;  vertical-align: top; padding:10px;">

                                                        </td>
                                                        <td
                                                            style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px;">
                                                            $</td>
                                                        <td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px;"
                                                            align="center"></td>
                                                        <td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px;"
                                                            align="right">$</td>
                                                    </tr>
                                                    <tr>
                                                        <td height="1" colspan="4"
                                                            style="border-bottom:1px solid #e4e4e4"></td>
                                                    </tr>


                                                    <!--<tr>-->
                                                    <!--    <td-->
                                                    <!--        style="font-size: 14px; font-wight: 800;  color: #000;  line-height: 18px;  vertical-align: top; padding:10px">-->
                                                    <!--        Mobile App-->
                                                    <!--    </td>-->
                                                    <!--    <td-->
                                                    <!--        style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px">-->
                                                    <!--        $15000</td>-->
                                                    <!--    <td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px"-->
                                                    <!--        align="center">1</td>-->
                                                    <!--    <td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px"-->
                                                    <!--        align="right">$15000</td>-->
                                                    <!--</tr>-->

                                                    <!--<tr>-->
                                                    <!--    <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>-->
                                                    <!--</tr> -->

                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:0 30px">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                align="center">
                                                <tbody>
                                                    <tr>


                                                        <td
                                                            style="font-size: 16px;  color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap; background: #fff; padding: 10px; border: 3px solid #ff7b02; width: 30%">
                                                            $900
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding:0 30px">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                align="">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <table width="220" border="0" cellpadding="0"
                                                                cellspacing="0" align="right">
                                                                <tbody>
                                                                    <tr>
                                                                        <td height="20"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="font-size: 14px;  color: #000; line-height: 1; vertical-align: top; text-align: right;">
                                                                            <strong>Thanks for your business</strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="100%" height="10"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="font-size: 14px;  color: #000; line-height: 20px; vertical-align: top; text-align: right;">
                                                                            <strong>Signature</strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="text-align: right;">
                                                                            <img src="" alt=""
                                                                                srcset=""
                                                                                style="width:300px; height:100px; object-fit:contain;" />
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>


                                                            <table width="220" border="0" cellpadding="0"
                                                                cellspacing="0" align="left">
                                                                <tbody>
                                                                    <tr>
                                                                        <td height="20"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="font-size: 14px;  color: #000; line-height: 1; vertical-align: top; text-align: left;">
                                                                            <strong>Note</strong>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="100%" height="10"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="font-size: 14px;  color: #000; line-height: 20px; vertical-align: top; ">
                                                                            lorem Ipsum is simply dummy text of the printing
                                                                            and typesetting industry. Lorem
                                                                            Ipsum has
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
                                            <table width="600" border="0" cellpadding="0" cellspacing="0"
                                                align="center" bgcolor="#ffffff" style="border-radius: 0 0 10px 10px;">

                                                <tr>
                                                    <td height="50"></td>
                                                </tr>
                                                <tr bgcolor="#000" style="text-align: center;">
                                                    <td height="50" style="color: #fff; padding: 10px;">
                                                        <p>lorem Ipsum is simply dummy text of the printing and typesetting
                                                            industry. Lorem
                                                            Ipsum has
                                                            been the industry's standard dummy text ever since the 1500s,
                                                            when an unknown
                                                            printer took a
                                                            galley of type and scrambled it to make a type specimen book.
                                                        </p>
                                                    </td>
                                                </tr>

                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                        </body>

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn-close" aria-label="Close"></button>
                    </div>
                </div>
            </div>
            {{-- modal end  --}}
        </div>
        {{-- modal end  --}}
    @endsection

    @push('scripts')
    
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
            var i = 1;
            $("#add_more_item").click(function() {
                i++;

        $(".add-item").append('<div class="add-item-wrap"><div class="cross-btn"><a onclick="remove('+i+')"><i class="fa-solid fa-xmark"></i></a></div><div class="row justify-content-between"><div class="col-xl-12"><div class="item-head"><h2>Item Description</h2></div><div class="form-left form-item"><div class="row justify-content-between"><div class="col-xl-6 col-12"><div class="form-group"><textarea class="form-control" id="" placeholder="Item Description" rows="2"></textarea></div></div><div class="col-xl-6 col-12"><div class="form-group"><textarea class="form-control" id="" placeholder="Additional Description" rows="2"></textarea></div></div><div class="col-xl-4 col-12"><div class="form-group"><input type="text" class="form-control" id="inputEmail3" placeholder="Rate"></div></div><div class="col-xl-4 col-12"><div class="form-group"><input type="text" class="form-control" id="inputEmail3" placeholder="Quantity"></div></div><div class="col-xl-4 col-12"><div class="form-group"><input type="text" class="form-control" id="inputEmail3" placeholder="Amount"></div></div></div></div></div></div></div>');
            });

        $(document).ready(function() 
        {   
            function remove(i) {
                
                var total_amount = $('#total_amount').val();
                var amount = $('#amount_' + i).val();
                var calculate = (total_amount - amount);
                $('#total_amount').val(calculate);
                $('#addMoreInputFields_' + i).remove();
            }
        });
        </script>
        <script>
            function quant(i) {
                var rate = $('#rate_' + i).val();
                var quant = $('#quan_' + i).val();
                var amount = (rate * quant);
                var total_amount = $('#total_amount').val();

                $('#amount_' + i).val(amount);
                //    var sum = parseInt(total_amount)+parseInt(amount);
                //    $('#total_amount').val(sum); 

            }

            function rating(i) {
                var rate = $('#rate_' + i).val();
                var quant = $('#quan_' + i).val();
                var amount = (rate * quant);
                $('#amount_' + i).val(amount);
                //    var total_amount = $('#total_amount').val();
                //    alert(total_amount);
                //    var sum = parseInt(total_amount)+parseInt(amount);
                //    alert(sum);
                //    $('#total_amount').val(sum); 
            }
        </script>

        <script>
            function formatPhone(obj) {
                var numbers = obj.value.replace(/\D/g, ''),
                    char = {
                        0: '(',
                        3: ') ',
                        6: '  '
                    };
                obj.value = '';
                for (var i = 0; i < numbers.length; i++) {
                    obj.value += (char[i] || '') + numbers[i];
                }
            }
        </script>
    @endpush
