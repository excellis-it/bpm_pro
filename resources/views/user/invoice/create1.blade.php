@extends('user.layouts.master')
@section('title')
    {{ env('APP_NAME') }} | Create Invoice
@endsection
<!--<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">-->
   
@push('styles')
<style>
    .kbw-signature { width: 100%; height: 100px;}
    #sig canvas{ width: 100% !important; height: auto;}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
<!-- font -->
<link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="{{asset('admin_assets/assets/css/bootstrap.min.css')}}">

<!-- Bootstrap core CSS -->
<link href="{{asset('admin_assets/assets/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('admin_assets/assets/css/style.css')}}" rel="stylesheet">
<link href="{{asset('admin_assets/assets/css/responsive.css')}}" rel="stylesheet">
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
        color: #FF7B02;
    }

    .form-div-wrap {
        padding: 20px;
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
        border-radius: 10px
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
        background: #FF7B02;
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
        background: #FF7B02;
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

    /* Responsive */
    @media (max-width:768px) {
        .sign-box {
            display: block;
        }
    }
</style>

@endpush


@section('content')
  
<div class="page-wrapper">
    <section class="form-div">
        <div class="container-fluid">
            <div class="form-div-main">
                <div class="row">
                    <div class="invoice-div-wrap">
                        <div class="row justify-content-between">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-xl-4 col-md-12 col-12">
                                        <div class="invoice-div">
                                            <h2>Invoice</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-md-12 col-12">
                        <div class="form-div-wrap">
                            <div class="row justify-content-between">
                                <div class="col-xl-6">
                                    <div class="form-left me-3">
                                        <h2>Form</h2>
                                        <form>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputEmail3"
                                                        placeholder="Business Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputPassword3"
                                                        placeholder="name@business.com">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputPassword3"
                                                        placeholder="Street">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputPassword3"
                                                        placeholder="(123) 456 789">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">GST
                                                    #</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputPassword3"
                                                        placeholder="123456789 RT">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-left me-3">
                                        <h2>Bill To</h2>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail3"
                                                    placeholder="Client Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputPassword3"
                                                    placeholder="name@client.com">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputPassword3"
                                                    placeholder="Street">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputPassword3"
                                                    placeholder="(123) 456 789">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Mobile</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputPassword3"
                                                    placeholder="(123) 456 789">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Fax</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputPassword3"
                                                    placeholder="123456789">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-div-wrap">
                            <div class="row justify-content-between">
                                <div class="col-xl-6">
                                    <div class="form-left">
                                        <form>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputEmail3"
                                                        placeholder="INV0001">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">Date</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputPassword3"
                                                        placeholder="Jul 17, 2023">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3"
                                                    class="col-sm-2 col-form-label">Terms</label>
                                                <div class="col-sm-10">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected>On Receipt</option>
                                                        <option value="1">On Receipt</option>
                                                        <option value="2">On Receipt</option>
                                                        <option value="3">On Receipt</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-div-wrap add_item_box">
                            <div class="add-item-wrap">
                                <div class="cross-btn">
                                    <a href=""><i class="fa-solid fa-xmark"></i></a>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-xl-12">
                                        <div class="form-left form-item">
                                            <div class="row justify-content-between">
                                                <div class="col-xl-6 col-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" id=""
                                                            placeholder="Item Description" rows="2"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" id=""
                                                            placeholder="Additional Description" rows="2"></textarea>
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
                            </div>
                            <div class="add-item-wrap">
                                <div class="cross-btn">
                                    <a href=""><i class="fa-solid fa-xmark"></i></a>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-xl-12">
                                        <div class="form-left form-item">
                                            <div class="row justify-content-between">
                                                <div class="col-xl-6 col-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" id=""
                                                            placeholder="Item Description" rows="2"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" id=""
                                                            placeholder="Additional Description" rows="2"></textarea>
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
                            </div>
                            <div class="col-xl-4 col-12 mt-3">
                                <a class="btn add-btn" id="add">Add Item</a>
                            </div>
                        </div>
                        <div class="form-div-wrap">
                            <div class="sign-box">
                                <div class="signature">
                                    <h2>Signature</h2>
                                    <div class="sign-box-warp"></div>
                                    <!-- <input type="file" id="myfile" name="myfile"> -->
                                </div>
                                <div class="signature photo">
                                    <h2>Photos</h2>
                                    <input type="file" id="myfile" name="myfile">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-9 col-12">
                        <div class="form-right">
                            <div class="tax_1">
                                <h3>Tax</h3>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Type</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected="">None</option>
                                        <option value="1">None</option>
                                        <option value="2">None</option>
                                        <option value="3">None</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tax_1">
                                <h3>Currency</h3>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">USD</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected="">None</option>
                                        <option value="1">None</option>
                                        <option value="2">None</option>
                                        <option value="3">None</option>
                                    </select>
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
            </div>
        </div>
    </section>
</div>

@endsection

    @push('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="{{asset('admin_assets/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{asset('admin_assets/assets/js/custom.js')}}"></script>

<script type="text/javascript" src="https://cdn.rawgit.com/willowsystems/jSignature/master/libs/jSignature.min.js"></script>
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
  
    $('#reset').click(function(e){
    $('#signature').jSignature('clear');
        var data = $('#signature').jSignature('getData');
    $("#signature_capture").val('');
    e.preventDefault();
    });
  
});

</script>

<script>
    selectImage.onchange = evt => {
        preview = document.getElementById('preview');
        preview.style.display = 'block';
        const [file] = selectImage.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    }
</script>

<script>
    var i = 1;
    $("#add").click(function(){
        i++;
        
        $(".add-item").append('<div class="row" id="addMoreInputFields_'+i+'"><div class="col-md-6"><label for="inputEnterYourName" class="col-form-label"> Item Description <span style="color: red;">*</span></label><input type="text" name="item_description[]"  class="form-control"  placeholder="Enter Description">@if ($errors->has('item_description'))<div class="error" style="color:red;">{{ $errors->first('item_description') }}</div>@endif</div><div class="col-md-6"><label for="inputEnterYourName" class="col-form-label"> AdditionalDetails <span style="color: red;">*</span></label><input type="text" name="additional_details[]" id="" class="form-control"  placeholder="Enter Description">@if ($errors->has('additional_details'))<div class="error" style="color:red;">{{ $errors->first('additional_details') }}</div>@endif</div><div class="col-md-3"><label for="inputEnterYourName" class="col-form-label"> Rate <span style="color: red;">*</span></label><input type="text" name="rate[]" id="rate_'+i+'"  class="form-control"  oninput="rating('+i+')" placeholder="Enter Rate">@if ($errors->has('rate'))<div class="error" style="color:red;">{{ $errors->first('rate') }}</div>@endif</div><div class="col-md-3" ><label for="inputEnterYourName" class="col-form-label"> Quantity<span style="color: red;">*</span></label><input type="text" name="quantity[]" id="quan_'+i+'" class="form-control" oninput="quant('+i+')"  placeholder="Enter Quantity">@if ($errors->has('quantity'))<div class="error" style="color:red;">{{ $errors->first('quantity') }}</div>@endif</div><div class="col-md-2"><label for="inputEnterYourName" class="col-form-label"> Amount</label><input type="text" id="amount_'+i+'" name="amount[]" style="border:none;border-bottom: 2px solid rgb(223, 123, 10);" readonly></div><div class="col-md-2"><label for="inputEnterYourName" class="col-form-label"></lable><a class="btn btn-danger btn_remove" onclick="remove('+i+')" >remove</a></div></div>');
    });

    function remove(i)
    {
        var total_amount = $('#total_amount').val();
        var amount = $('#amount_'+i).val();
        var calculate = (total_amount - amount);
        $('#total_amount').val(calculate); 
        $('#addMoreInputFields_'+i).remove();
    }

</script>
 <script>
    
    function quant(i)
    {
       var rate = $('#rate_'+i).val();
       var quant = $('#quan_'+i).val();
       var amount = (rate * quant);
       var total_amount = $('#total_amount').val();
       
       $('#amount_'+i).val(amount);
    //    var sum = parseInt(total_amount)+parseInt(amount);
    //    $('#total_amount').val(sum); 
       
    }

    function rating(i)
    {
       var rate = $('#rate_'+i).val();
       var quant = $('#quan_'+i).val();
       var amount = (rate * quant);
       $('#amount_'+i).val(amount);
    //    var total_amount = $('#total_amount').val();
    //    alert(total_amount);
    //    var sum = parseInt(total_amount)+parseInt(amount);
    //    alert(sum);
    //    $('#total_amount').val(sum); 
    }
    </script> 

    


@endpush
