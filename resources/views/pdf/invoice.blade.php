
<style>
    th{
        background-color: #00c6b6;
        color: white;
    }
</style>



<html>
<head>
    <title>Invoice</title>
    
</head>
<style>
    table, th, td {
  border: 1px solid rgb(20, 20, 20);
  border-collapse: collapse;
}
</style>
<body>
    <div class="">
        <img src="" style="width: 450px; height:80px; align-items: center; padding: 5px; position: relative;">
       {{ $invoice_details->from_name }},{{ $invoice_details->from_email }}
        <table style="width:100%">
            <thead>
                <tr>
                    <th>Item description</th>
                    <th>Item additional description</th>
                    <th>Item amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $vall)
                <tr>
                    <td align="center">{{$vall->item_description }}</td>
                    <td align="center">{{$vall->item_additional_details }}</td>
                    <td align="center">{{ $vall->item_rate }}
                    </td>                                                                  
                </tr>
                @endforeach
               
            </tbody>
        </table>
        
    
    </div>
    
</body>
</html>