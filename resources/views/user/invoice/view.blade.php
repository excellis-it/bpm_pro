@extends('user.layouts.master')
@section('title')
    Customer Invoice - {{ env('APP_NAME') }}
@endsection
@push('styles')
    <style>
        .dataTables_filter {
            margin-bottom: 10px !important;
        }
    </style>
@endpush

@section('content')
    =
    <section id="loading">
        <div id="loading-content"></div>
    </section>
    <div class="page-wrapper invoice_page">

        <div class="content container">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">#{{ $data['invoice_detail']['invoice_no'] }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">View of Invoice</a></li>
                            <li class="breadcrumb-item active">View</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="{{ route('invoice.index') }}" class="btn add-btn">
                            < Back </a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
                        style="border-radius: 0px; margin: 0 auto;">
                        <tbody>

                            <tr>
                                <td style="padding:10px 30px 0">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left"
                                                        style="width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td
                                                                    style="font-size: 14px; color: #000; font-weight: 800; line-height: 18px; vertical-align: top; text-align: left; width:40%;">
                                                                    <img src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/' . $data['invoice_detail']['image']))) }}"
                                                                        alt="logo" border="0"
                                                                        style="object-fit: contain; width 100px; height: 50px;" />
                                                                    <span
                                                                        style="display: block; text-align: left; padding-top: 5px;">
                                                                        {{ $data['invoice_detail']['from_address'] }}</span>
                                                                    <span
                                                                        style="display: block; text-align: left; padding-top: 5px;">Adress:
                                                                        {{ $data['invoice_detail']['from_city'] }},
                                                                        {{ $data['invoice_detail']['from_state'] }},
                                                                        {{ $data['invoice_detail']['from_zipcode'] }}</span>
                                                                    <span
                                                                        style="display: block; text-align: left; padding-top: 5px;">Phone:{{ $data['invoice_detail']['from_phone'] }}</span>
                                                                    <span
                                                                        style="display: block; text-align: left; padding-top: 5px;">Email
                                                                        :
                                                                        {{ $data['invoice_detail']['from_email'] }}</span>

                                                                </td>

                                                                <td
                                                                    style="font-size: 14px; font-weight: 800; color: #000; line-height: 20px; vertical-align: top; text-align: left; width: 40%;">
                                                                    <table border="0" cellpadding="0" cellspacing="0" align="right" style="width:90%;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <span
                                                                                        style="color: #007DD9;
                                                                                    padding: 3px 0px;
                                                                                    text-align: right;
                                                                                    font-size: 36px;
                                                                                    line-height: 1;
                                                                                    font-weight: 500;
                                                                                    display: inline-block;
                                                                                    width:219px;">{{ $data['invoice_detail']['type'] }}</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><span
                                                                                        style="background: #007DD9; margin: 10px 0px; padding: 5px; color: #fff;  display: flex;
                                                                                    justify-content: space-between">
                                                                                        <span>Invoice#</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                        <span>Date</span></span>
                                                                                    <span
                                                                                        style="color: #000; text-align: center; display: inline-block; width: 100%; font-size: 14px; font-weight: 600; display: flex; justify-content: space-between">
                                                                                        <span>{{ $data['invoice_detail']['invoice_no'] }}
                                                                                        </span>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                        <span>{{ $data['invoice_detail']['invoice_date'] }}</span>
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
                                                    <table border="0" cellpadding="0" cellspacing="0" align="left"
                                                        style="width: 100%; vertical-align: top; margin-top: 18px;">
                                                        <tbody>
                                                            <tr>
                                                                <td
                                                                    style="font-size: 14px; color: #000; font-weight: 800; line-height: 18px; vertical-align: top; text-align: right;">
                                                                    <span
                                                                        style="display: block; text-align: left; background: #007DD9; padding: 5px; color: #fff;">Bill
                                                                        To</span>
                                                                    <span
                                                                        style="display: block; text-align: left; padding-top: 5px;">Name:
                                                                        {{ $data['invoice_detail']['bil_to_name'] }}</span>
                                                                    <span
                                                                        style="display: block; text-align: left; padding-top: 5px;">Company
                                                                        Name:
                                                                        {{ $data['invoice_detail']['company'] }}</span>
                                                                    <span
                                                                        style="display: block; text-align: left; padding-top: 5px;">Address:
                                                                        {{ $data['invoice_detail']['bil_to_address'] }}</span>
                                                                    <span
                                                                        style="display: block; text-align: left; padding-top: 5px;">
                                                                        {{ $data['invoice_detail']['bil_to_city'] }},
                                                                        {{ $data['invoice_detail']['bil_to_state'] }},
                                                                        {{ $data['invoice_detail']['bil_to_zipcode'] }}</span>
                                                                  
                                                                    <span
                                                                        style="display: block; text-align: left; padding-top: 5px;">Phone:
                                                                        {{ $data['invoice_detail']['bil_to_phone'] }}</span>
                                                                    <span
                                                                        style="display: block; text-align: left; padding-top: 5px;">Email
                                                                        :
                                                                        {{ $data['invoice_detail']['bil_to_email'] }}</span>
                                                                </td>
                                                                <td style="vertical-align: top;">
                                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                                        align="right" style="vertical-align: top;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td
                                                                                    style="font-size: 14px; color: #000; font-weight: 800; line-height: 18px; vertical-align: top; text-align: right;">
                                                                                    <span
                                                                                        style="background: #007DD9;
                                                                                    margin: 10px 0px;
                                                                                    padding: 5px;
                                                                                    color: #fff;
                                                                                    width: 211px;
                                                                                    text-align: center;">
                                                                                        Project Name and Address</span>
                                                                                    <span
                                                                                        style="display: block; text-align: left; padding-top: 5px;">Project
                                                                                        Name:
                                                                                        {{ $data['invoice_detail']['project_name'] }}</span>
                                                                                    <span
                                                                                        style="display: block; text-align: left; padding-top: 5px;">Address:
                                                                                        {{ $data['invoice_detail']['project_address'] }}</span>
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
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                                        <tbody>
                                            <tr>
                                                <th style="background: #007DD9; font-size: 16px; font-weight: 800;  color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px;"
                                                    width="52%" align="left">
                                                    Item name
                                                </th>
                                                <th style="background: #007DD9; font-size: 16px;  font-weight: 800;  color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px;"
                                                    align="left">
                                                    Rate
                                                </th>
                                                <th style="background: #007DD9; font-size: 16px;  font-weight: 800; color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px"
                                                    align="center">
                                                    Quantity
                                                </th>
                                                <th style="background: #007DD9; font-size: 16px;  font-weight: 800;  color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px"
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
                                            @foreach ($data['invoice_detail']['items'] as $vall)
                                                <tr>
                                                    <td
                                                        style="font-size: 14px; font-weight: 800;  color: #000;  line-height: 18px;  vertical-align: top; padding:10px; display: flex; align-item: center;">
                                                        {{-- @if ($vall->image)
                                                                <img style="object-fit: contain; width: 20px; height: 20px; padding: 10px; border: 1px solid #000; margin-right: 5px;"
                                                                    src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/' . $vall->image))) }}">
                                                            @else
                                                                <img style="object-fit: contain; width: 20px; height: 20px; padding: 10px; border: 1px solid #000; margin-right: 5px;"
                                                                    src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents('admin_assets/images/image.png')) }}">
                                                            @endif --}}
                                                        {{ $vall->item_description }}

                                                    </td>
                                                    <td
                                                        style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px;">
                                                        ${{ $vall->item_rate }}</td>
                                                    <td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px;"
                                                        align="center">{{ $vall->item_quantity }}</td>
                                                    <td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px;"
                                                        align="right">${{ $vall->item_amount }}</td>
                                                </tr>
                                                <tr>
                                                    <td height="1" colspan="4"
                                                        style="border-bottom:1px solid #e4e4e4"></td>
                                                </tr>
                                            @endforeach

                                            {{-- <tr>
                                                <td
                                                    style="font-size: 14px; font-weight: 800;  color: #000;  line-height: 18px;  vertical-align: top; padding:10px;">
                                                    Web Design
                                                </td>
                                                <td
                                                    style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px;">
                                                    $15000</td>
                                                <td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px;"
                                                    align="center">1</td>
                                                <td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px;"
                                                    align="right">$15000</td>
                                            </tr>
                                            <tr>
                                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                            </tr>
                                            
                                           
                                            --}}


                                            <tr>
                                                <td height="1" colspan="4" style="border-bottom:3px solid #000">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 16px; font-weight: 600; color: #007DD9;  line-height: 14px;  vertical-align: top; padding:10px">
                                                    Notes:
                                                </td>
                                                <td colspan="2"
                                                    style="font-size: 16px; color: #000; line-height: 14px; text-align: left; vertical-align: top; padding: 10px; font-weight: 400; background: #cce7ff;">
                                                    Subtotal:
                                                </td>
                                                <td
                                                    style="font-size: 16px; color: #000; line-height: 14px; text-align: right; vertical-align: top; padding: 10px; font-weight: 400; background: #e6f3ff;">
                                                    ${{ $data['invoice_detail']['sub_total'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td
                                                    style="font-size: 16px; color: #000; line-height: 14px; text-align: left; vertical-align: top; padding: 10px; font-weight: 400; background: #cce7ff;">
                                                    Tax:
                                                </td>
                                                <td
                                                    style="font-size: 16px; color: #000; line-height: 14px; text-align: left; vertical-align: top; padding: 10px; font-weight: 400; background: #cce7ff;">

                                                    @if ($data['invoice_detail']['tax_amount'])
                                                        {{ $data['invoice_detail']['tax_amount'] }}%
                                                    @endif
                                                </td>
                                                @php
                                                    if ($data['invoice_detail']['tax_amount']) {
                                                        $tax = $data['invoice_detail']['tax_amount'];
                                                        $sub_total = $data['invoice_detail']['sub_total'];
                                                        $tax_amount = ($sub_total * $tax) / 100;
                                                    } else {
                                                        $tax_amount = 0;
                                                    }
                                                    
                                                @endphp
                                                <td
                                                    style="font-size: 16px; color: #000; line-height: 14px; text-align: right; vertical-align: top; padding: 10px; font-weight: 400; background: #e6f3ff;">
                                                    {{ $tax_amount }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td colspan="2"
                                                    style="font-size: 16px; color: #000; line-height: 14px; text-align: left; vertical-align: top; padding: 10px; font-weight: 600; background: #cce7ff; border-top:2px solid #000">
                                                    TOTAL
                                                </td>
                                                <td
                                                    style="font-size: 16px; color: #000; line-height: 14px; text-align: right; vertical-align: top; padding: 10px; font-weight: 600; background: #e6f3ff;  border-top:2px solid #000">
                                                    ${{ $data['invoice_detail']['total'] }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="1" colspan="4" style="border-bottom:3px solid #000">
                                                </td>
                                            </tr>
                                            @if(isset($data['invoice_detail']['items'][0]->image))
                                            <tr>
                                                <td colspan="4"
                                                    style="font-size: 16px; font-weight: 600; color: #007DD9;  line-height: 14px;  vertical-align: top; padding:10px">
                                                    Additional Information:
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <div  style="columns: 4; display:block;">
                                                    @foreach ($data['invoice_detail']['items'] as $vall)
                                                        @if ($vall->image)
                                                            <img style="object-fit: cover; width: 150px; height: 150px; padding: 5px; display: inherit;" 
                                                                src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/' . $vall->image))) }}">
                                                        @else
                                                            <img style="object-fit: cover; width: 150px; height: 150px; padding: 5px; display: inherit;"
                                                                src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents('admin_assets/images/image.png')) }}">
                                                        @endif
                                                    @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="1" colspan="4" style="border-bottom:3px solid #000">
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding:0 30px">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                        align="center">
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
                                            <td></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endsection

@push('scripts')
@endpush
