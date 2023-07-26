<!doctype html>
<html lang="en">
<title>BPM-PRO </title>
<script src="https://unpkg.com/phosphor-icons"></script>


<body style="background: #f2f2f2;">
    <table width="600" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
        style="border-radius: 0px; margin: 0 auto;">
        <tbody>
            <tr>
                <td style="padding:0 30px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="">
                        <tbody>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table border="0" cellpadding="0" cellspacing="0" align="">
                                        <tbody>
                                            <tr>
                                                <td align="left"><img
                                                        src="{{'data:image/jpg;base64,'.base64_encode(file_get_contents('https://excellis.co.in/bpm-pro/frontend_assets/img/pdf_cc.jpg'))}}"
                                                        width="100%"
                                                        style="height: 120px;
                                                margin-left: -29px;"
                                                        alt="logo" border="0" /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                
                                <td>
                                    <table border="0" cellpadding="0" cellspacing="0" align="right">
                                        <tbody>
                                            <tr>
                                                <td
                                                    style="font-size: 14px; color: #000; font-weight: 800; line-height: 18px; vertical-align: top; text-align: right; padding: 15px 0 0;">
                                                    <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('storage/'.$data['invoice_detail']['image'])))}}"
                                                        width="100%" height="32" alt="logo" border="0"
                                                        style="object-fit: contain;" /><br>
                                                    <span>Adress:{{ $data['invoice_detail']['from_address']}}</span><br>
                                                    <span>Phone: {{ $data['invoice_detail']['from_phone']}}</span><br>
                                                    <span>Mail Id: {{ $data['invoice_detail']['from_email']}}</span><br>

                                                   
                                                   
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
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td>
                                    <table border="0" cellpadding="0" cellspacing="0" align="left">
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
                                                        style="font-size: 20px; font-weight: 900; color: #FF7B02; line-height: 30px;">{{ $data['invoice_detail']['bil_to_name']}}</span>
                                                    <br>
                                                    <span>{{ $data['invoice_detail']['bil_to_address']}}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table border="0" cellpadding="0" cellspacing="0" align="right">
                                        <tbody>
                                            <tr>
                                                <td style="">
                                                    <span
                                                        style="background: #ff8719; color: #fff; padding: 3px 40px; text-align: center; font-size: 36px; line-height: 1; font-weight: 300; display: inline-block;">INVOICE</span><br>
                                                    <span
                                                        style="color: #000; text-align: center; display: inline-block; width: 100%; padding: 8px 0; font-size: 18px; font-weight: 600;">{{ $data['invoice_detail']['invoice_no']}}</span>
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
                                <td height="1" style="background: #bebebe;" colspan="4"></td>
                            </tr>
                            <tr>
                                <td height="10" colspan="4"></td>
                            </tr>
                            @foreach($data['items'] as $vall)
                            <tr>
                                <td
                                    style="font-size: 14px; font-wight: 800;  color: #000;  line-height: 18px;  vertical-align: top; padding:10px;">
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
                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                            </tr>
                            @endforeach
                            {{-- <tr>
                                <td
                                    style="font-size: 14px; font-wight: 800;  color: #000;  line-height: 18px;  vertical-align: top; padding:10px;">
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
                            <tr>
                                <td
                                    style="font-size: 14px; font-wight: 800;  color: #000;  line-height: 18px;  vertical-align: top; padding:10px;">
                                    Web Development
                                </td>
                                <td
                                    style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px;">
                                    $15000</td>
                                <td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px"
                                    align="center">1</td>
                                <td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px"
                                    align="right">$15000</td>
                            </tr>
                            <tr>
                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 14px; font-wight: 800;  color: #000;  line-height: 18px;  vertical-align: top; padding:10px">
                                    Business Card
                                </td>
                                <td
                                    style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px">
                                    $15000</td>
                                <td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px"
                                    align="center">1</td>
                                <td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px"
                                    align="right">$15000</td>
                            </tr>
                            <tr>
                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 14px; font-wight: 800;  color: #000;  line-height: 18px;  vertical-align: top; padding:10px">
                                    Business Proposal
                                </td>
                                <td
                                    style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px">
                                    $15000</td>
                                <td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px"
                                    align="center">1</td>
                                <td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px"
                                    align="right">$15000</td>
                            </tr>
                            <tr>
                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                            </tr>
                            <tr>
                                <td
                                    style="font-size: 14px; font-wight: 800;  color: #000;  line-height: 18px;  vertical-align: top; padding:10px">
                                    Mobile App
                                </td>
                                <td
                                    style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px">
                                    $15000</td>
                                <td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px"
                                    align="center">1</td>
                                <td style="font-size: 14px;  color: #000;  line-height: 14px;  vertical-align: top; padding:10px"
                                    align="right">$15000</td>
                            </tr>

                            <tr>
                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                            </tr> --}}

                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0 30px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
                        <tbody>
                            <tr>
                                <td
                                    style="font-size: 16px;  color: #fff; line-height: 22px; vertical-align: top; text-transform: uppercase; text-align:right; background: #FF7B02; padding: 10px; width: 70%; font-weight: 600;">
                                    Total + ({{ $data['invoice_detail']['tax']}}% Tax)
                                </td>
                                <td
                                    style="font-size: 16px;  color: #646a6e; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap; background: #fff; padding: 10px; border: 3px solid #ff7b02; width: 30%">
                                    ${{ $data['invoice_detail']['total']}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="padding:0 30px">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="">
                        <tbody>
                            <tr>
                                <td>
                                    <table width="220" border="0" cellpadding="0" cellspacing="0"
                                        align="right">
                                        <tbody>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 14px;  color: #000; line-height: 1; vertical-align: top; text-align: right;">
                                                    <strong>Best Regards</strong>
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
                                                    <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('storage/'.$data['invoice_detail']['signature'])))}}" alt="" srcset="" style="width:300px; height:100px; object-fit:contain;"/>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>


                                    <table width="220" border="0" cellpadding="0" cellspacing="0"
                                        align="left">
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
                                                    {{ $data['invoice_detail']['notes']}}
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
                    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center"
                        bgcolor="#ffffff" style="border-radius: 0 0 10px 10px;">

                        <tr>
                            <td height="50"></td>
                        </tr>
                        <tr bgcolor="#000" style="text-align: center;">
                            <td height="50" style="color: #fff; padding: 10px;">
                                <p>lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has
                                    been the industry's standard dummy text ever since the 1500s, when an unknown
                                    printer took a
                                    galley of type and scrambled it to make a type specimen book.</p>
                            </td>
                        </tr>

                    </table>
                </td>
            </tr>
        </tbody>
    </table>


</body>

</html>
