


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>تحميل فاتورة</title>
    
<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    #qrcode > img{
			width: 40%;
            text-align: center;
    }

</style>
</head>

<body >
    <div class="invoice-box rtl">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://firebasestorage.googleapis.com/v0/b/smartcell-acff1.appspot.com/o/Engraving%2Ficon?alt=media&token=5c363e4b-38e8-4ba8-955d-3574b0e9abae" style="width:100%; max-width:64px;">
                                <img src="{{asset('image2/dashbord/logo/logo.jpg')}}" alt="" srcset="">
                                {{-- <div id="qrcode" style="display: block ruby;"></div> --}}

                            </td>
                            
                            <td>
                                رقم الفاتورة : {{$order['رقم الطلبية']}}<br>
                                تاريخ :  {{$order['تاريخ الانشاء']}}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    <table>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                               المدينة :  {{$order['المدينة']}}<br>
                               المنطقة : {{$order['المنطقة']}}<br>
                            </td>
                            
                            <td>
                                الاسم :  {{$order['الاسم']}}<br>
                                بروفايل :   {{$order['بروفايل']}}<br>
                                رقم الهاتف :  {{$order['رقم الهاتف']}}<br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        
            
            <tr class="heading">
                {{-- <td>
                    رقم
                </td> --}}
                <td>
                    المنتج
                </td>
                
                <td>
                    العدد
                </td>
                
                <td>
                    السعر
                </td>
            </tr>
         
          
               @for ($i = 1; $i < 10; $i++)
                   @if ($order['المنتج '.$i] != "")
                    <tr class="item">
                        <td>
                        {{$order['المنتج '.$i]}}
                        </td>
                        
                        <td>
                        {{$order['عدد قطع المنتج '.$i]}}
                        </td>
                        
                        <td>
                            {{$order['سعر المنتج '.$i]}}
                        </td>
                    </tr> 
                   @endif
               @endfor
                {{-- <td>
                    Website design
                </td>
                
                <td>
                    $300.00
                </td> --}}
         
         
            
            
        </table>
        <br>
        <br>
        <br>
        <table>
            <tr class="total">
                <td>
                المجموع :
                </td>   
                <td>
                    دينار   {{$order['اجمالي الفتورة']}}
                   
                </td>
            </tr>
        </table>
    </div>                  



</body>
</html>