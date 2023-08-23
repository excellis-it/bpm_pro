<!doctype html>
<html lang="en">
<title>Invoiceticket </title>
<head>
<style type="text/css">

/* latin-ext */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/montserrat/v25/JTUHjIg1_i6t8kCHKm4532VJOt5-QNFgpCtr6Hw3aXpsog.woff2) format('woff2');
  unicode-range: U+0100-02AF, U+0304, U+0308, U+0329, U+1E00-1E9F, U+1EF2-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Montserrat';
  font-style: normal;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/s/montserrat/v25/JTUHjIg1_i6t8kCHKm4532VJOt5-QNFgpCtr6Hw5aXo.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+0304, U+0308, U+0329, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
body {
    font-family: Montserrat, sans-serif;
 }
</style>
</head>
<body style="background: #f2f2f2;">
    <table width="600" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
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
                                                    style="font-size: 14px; color: #000; font-weight: 500; line-height: 18px; vertical-align: top; text-align: left; ">
                                                    
                                                    <img src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/' . $data['invoice_detail']['image']))) }}" alt="logo" border="0"
                                                        style="object-fit: contain; width: 100px; height: 50px;" />
                                                        <span
                                                        style="display: block; text-align: left; padding-top: 5px;">
                                                        {{ $data['invoice_detail']['from_company'] }}</span>
                                                    <span
                                                        style="display: block; text-align: left; padding-top: 5px;">
                                                        {{ $data['invoice_detail']['from_address'] }}</span>
                                                        <span
                                                        style="display: block; text-align: left; padding-top: 5px;">
                                                        {{ $data['invoice_detail']['from_city'] }}, {{ $data['invoice_detail']['from_state'] }}, {{ $data['invoice_detail']['from_zipcode'] }}</span>
                                                    <span
                                                        style="display: block; text-align: left; padding-top: 5px;">Phone:{{ $data['invoice_detail']['from_phone'] }}</span>
                                                    <span
                                                        style="display: block; text-align: left; padding-top: 5px;">Email: {{ $data['invoice_detail']['from_email'] }}</span>

                                                </td>

                                                <td
                                                    style="font-size: 14px; font-weight: 500; color: #000; line-height: 20px; vertical-align: top; text-align: left; ">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                        align="right" >
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
                                                                    width:219px;text-transform: uppercase;">{{ $data['invoice_detail']['type'] }}</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="background: #007DD9; margin: 10px 0px; padding: 5px; color: #fff;  display: flex;
                                                                    justify-content: space-between;">
                                                                        <span>INVOICE#</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>DATE</span></span>
                                                                    <span
                                                                        style="color: #000; text-align: center; display: inline-block; width: 100%; font-size: 14px; font-weight: 600; display: flex; justify-content: space-between;">
                                                                        <span>@if(isset($data['invoice_id']))  {{ $data['invoice_id'] }}  @else {{ $data['invoice_detail']['invoice_no'] }} @endif</span>
                                                                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>{{ date('d/m/Y', strtotime($data['invoice_detail']['invoice_date'])) }}</span>
                                                                        
                                                                        
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span
                                                                        style="background: #007DD9; margin: 10px 0px;  padding: 5px; color: #fff;  display: flex;
                                                                        justify-content: start; text-align: left;">
                                                                        TERMS</span>
                                                                        <span style="color: #000; text-align: left; display: inline-block; width: 100%; font-size: 14px; font-weight: 600;">{{ $data['invoice_detail']['due'] }}</span>
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
                                                    style="font-size: 14px; color: #000; font-weight: 400; line-height: 18px; vertical-align: top; text-align: right;  width:300px; display:inline-block;">
                                                    <span
                                                        style="display: block; text-align: left; background: #007DD9; padding: 5px; color: #fff; font-weight:500; ">Bill
                                                        To</span>
                                                    <span
                                                        style="display: block; text-align: left; padding-top: 5px; ">
                                                        {{ $data['invoice_detail']['bil_to_name'] }}</span>
                                                    <span
                                                        style="display: block; text-align: left; padding-top: 5px; ">{{ $data['invoice_detail']['company'] }}</span>
                                                    <span
                                                        style="display: block; text-align: left; padding-top: 5px; ">
                                                        {{ $data['invoice_detail']['bil_to_address'] }}</span>
                                                        <span
                                                        style="display: block; text-align: left; padding-top: 5px; ">
                                                        {{ $data['invoice_detail']['bil_to_city'] }}, {{ $data['invoice_detail']['bil_to_state'] }}, {{ $data['invoice_detail']['bil_to_zipcode'] }}</span>
                                                 
                                                    <span
                                                        style="display: block; text-align: left; padding-top: 5px; ">
                                                        {{ $data['invoice_detail']['bil_to_phone'] }}</span>
                                                    <span
                                                        style="display: block; text-align: left; padding-top: 5px; "> {{ $data['invoice_detail']['bil_to_email'] }}</span>
                                                        
                                                       
                                                </td>
                                                <td style="vertical-align: top; text-align:right;">
                                                    <table border="0" cellpadding="0" cellspacing="0" align="right"
                                                        style="vertical-align: top;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="font-size: 14px; color: #000; font-weight: 500; line-height: 18px; vertical-align: top; text-align: right; "
                                                                ><span
                                                                        style="background: #007DD9;
                                                                    margin:0 0 10px;
                                                                    padding: 5px;
                                                                    color: #fff;
                                                                    width:250px;
                                                                    display:inline-block;
                                                                    text-align: left; ">
                                                                        PROJECT NAME AND ADDRESS</span>
                                                                        
                                                                        <span
                                                                        style="display: inline-block; width:250px; text-align: left; padding: 5px; margin: 0px; ">Project name:
                                                                        {{ $data['invoice_detail']['project_name'] }}</span>
                                                                        <span
                                                                        style="display: inline-block; width:250px; text-align: left; padding: 5px; margin: 0px; ">Address:
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
                                <th style="background: #007DD9; font-size: 16px; font-weight: 500;  color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px; "
                                    width="52%" align="left">
                                    ITEM NAME
                                </th>
                                 <th style="background: #007DD9; font-size: 16px;  font-weight: 500; color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px; "
                                    align="center">
                                    QTY
                                </th>
                                <th style="background: #007DD9; font-size: 16px;  font-weight: 500;  color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px; "
                                    align="left">
                                    UNIT PRICE
                                </th>
                               
                                <th style="background: #007DD9; font-size: 16px;  font-weight: 500;  color: #fff; font-weight: normal; line-height: 1; vertical-align: top; padding: 10px; "
                                    align="right">
                                    EXTENDED PRICE
                                </th>
                            </tr>
                            <tr>
                                <td height="1" style="background: #bebebe;" colspan="4"></td>
                            </tr>
                            <tr>
                                <td height="10" colspan="4"></td>
                            </tr>
                            @foreach ($data['items'] as $vall)
                                <tr>
                                    <td
                                    style="font-size: 14px;  color: #000;  line-height: 18px;  vertical-align: top; padding:10px; display: flex; align-item: center; ">
                                    {{-- @if($vall->image)
                                   
                                    <img style="object-fit: contain; width: 20px; height: 20px; padding: 10px; border: 1px solid #000; margin-right: 5px;" src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents(public_path('storage/' . $vall->image))) }}">
                                  
                                    @else
                                    <img style="object-fit: contain; width: 20px; height: 20px; padding: 10px; border: 1px solid #000; margin-right: 5px;" src="{{'data:image/png;base64,'.base64_encode(file_get_contents('admin_assets/images/image.png'))}}">
                                    @endif --}}
                                    {{ $vall->item_description }}
                                    
                                </td>
                                <td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px; "
                                        align="center">{{ $vall->item_quantity }}</td>
                                    <td
                                        style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px; ">
                                        ${{number_format( $vall->item_rate, 2, '.', ',');  }}</td>
                                    
                                    <td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px; "
                                        align="right">${{number_format($vall->item_amount, 2, '.', ',');  }}</td>
                                </tr>
                                <tr>
                                    <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                </tr>
                            @endforeach

                            {{-- <tr>
                                <td
                                    style="font-size: 14px; font-weight: 500;  color: #000;  line-height: 18px;  vertical-align: top; padding:10px; font-family: Montserrat, sans-serif;">
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
                                <td height="1" colspan="4" style="border-bottom:3px solid #000"></td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 16px; font-weight: 600; color: #007DD9;  line-height: 14px;  vertical-align: top; padding:10px; ">
                                    Notes: <span style="font-size: 14px;  color: #000;  line-height: 18px;  vertical-align: top; padding:10px; display: flex; align-item: center; ">{{ $data['invoice_detail']['notes'] }}</span>
                                </td>
                                <td colspan="2"
                                    style="font-size: 16px; color: #000; line-height: 14px; text-align: left; vertical-align: top; padding: 10px; font-weight: 400; background: #cce7ff; ">
                                    Subtotal:
                                </td>
                                <td
                                    style="font-size: 16px; color: #000; line-height: 14px; text-align: right; vertical-align: top; padding: 10px; font-weight: 400; background: #e6f3ff; ">
                                    ${{number_format($data['invoice_detail']['sub_total'], 2, '.', ',');  }}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td
                                    style="font-size: 16px; color: #000; line-height: 14px; text-align: left; vertical-align: top; padding: 10px; font-weight: 400; background: #cce7ff; ">
                                    Tax:
                                </td>
                                <td
                                    style="font-size: 16px; color: #000; line-height: 14px; text-align: left; vertical-align: top; padding: 10px; font-weight: 400; background: #cce7ff; ">
                                   
                                  @if($data['invoice_detail']['tax_amount'] )  {{ $data['invoice_detail']['tax_amount'] }}% @endif
                                </td>
                                @php
                                if ($data['invoice_detail']['tax_amount']) {
                                    $tax = $data['invoice_detail']['tax_amount'];
                                $sub_total = $data['invoice_detail']['sub_total'];
                                $tax_amount = ($sub_total * $tax )/100;
                                } else {
                                    $tax_amount = 0;
                                }
                                
                                    
                                @endphp
                                <td
                                    style="font-size: 16px; color: #000; line-height: 14px; text-align: right; vertical-align: top; padding: 10px; font-weight: 400; background: #e6f3ff; ">${{number_format($tax_amount, 2, '.', ',');  }}  
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2"
                                    style="font-size: 16px; color: #000; line-height: 14px; text-align: left; vertical-align: top; padding: 10px; font-weight: 600; background: #cce7ff; border-top:2px solid #000; ">
                                    TOTAL
                                </td>
                                <td
                                    style="font-size: 16px; color: #000; line-height: 14px; text-align: right; vertical-align: top; padding: 10px; font-weight: 600; background: #e6f3ff;  border-top:2px solid #000; ">
                                    $ {{number_format($data['invoice_detail']['total'], 2, '.', ',');  }}
                                    
                                </td>
                            </tr>
                            <tr>
                                <td height="1" colspan="4" style="border-bottom:3px solid #000"></td>
                            </tr>
                            @if(isset($data['invoice_detail']['items'][0]->image))
                            <tr>
                                <td colspan="4"
                                    style="font-size: 16px; font-weight: 600; color: #007DD9;  line-height: 14px;  vertical-align: top; padding:10px;">
                                    Additional Information:
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <div  style="columns: 4; display:block; margin-top:30;">
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
                                <p style="color: #606060; padding: 0px; margin: 0; ">Powered by xTriam.com</p>
                                <p style="color: #000; padding: 10px; margin: 0;font-style: italic; font-weight: 600;">
                                    Empowering Window and Door Contractors to Be More Profitable</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
