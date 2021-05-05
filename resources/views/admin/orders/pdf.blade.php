<!doctype html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <title>{{ $order->order_number }}</title>
    <style>
        body {
            font-family: 'XBRiyaz', sans-serif;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            font-size: 9px;
            line-height: 24px;
            font-family: 'XBRiyaz', sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: right;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td {
            text-align: left;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 30px;
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

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td {
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
            font-family: 'XBRiyaz', sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td {
            text-align: right;
        }

        @page {
            header: page-header;
            footer: page-footer;
        }
    </style>
</head>


<body>
<div class="invoice-box rtl">

    <table cellpadding="0">
        <tr class="top">
            <td colspan="8">
                <table>
                    <tr>
                        <td width="50%" class="title" style="text-align: center">
                            <img src="{{ asset("uploads/$home->site_logo") }}" style="height:150px;">
                        </td>

                        <td width="50%" style="text-align: center">
                            <img src="{{asset("qrcodes/$order->order_number.svg")}}" alt=""><br>
                            {{ $order->order_number }}<br>
                            تاريخ الطلب: {{ $order->created_at->format('Y-m-d') }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center"><h1> عدد الأشخاص {{ $order->qty }}</h1></td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="8">
                <table>
                    <tr>
                        <td width="50%">
                            <h2>{{$home->site_name}}</h2>
                            <h4 dir="ltr"> {{$home->site_phone}}</h4>
                            <h4>{{$home->site_web}}</h4>
                            <h4>{{$home->site_email}}</h4>
                            @if ($home->vat_id)
                                <h4>الرقم الضريبي : {{$home->vat_id}}</h4>
                            @endif
                        </td>

                        <td width="50%">
                            <h3>{{ $order->user->name }}</h3>
                            <h4>{{ $order->user->email }}</h4>
                            <h4>تاريخ الشراء: {{ $hijri }}</h4>
                            <h4></h4>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr style="font-size: 1.1rem">
            <th scope="row" style="width: 30%; font-size:20px">
                اسم النشاط
            </th>
            <td class="font-w600" style="font-size:20px">
                {{$order->ticket->name}}
            </td>
        </tr>
        <tr style="font-size: 1.1rem">
            <th scope="row" style="width: 30%"  style="font-size:20px">
                تاريخ النشاط
            </th>
            <td class="font-w600"  style="font-size:20px">
                {{$party_hijri}} - ( {{$order->ticket->date_party}} )
            </td>
        </tr>

        <tr style="font-size: 1.1rem">
            <th scope="row" style="width: 30%"  style="font-size:20px">
                المدينة
            </th>
            <td class="font-w600"  style="font-size:20px">
                {{$order->ticket->city->name}}
            </td>
        </tr>

        <tr style="font-size: 1.1rem">
            <th scope="row" style="width: 30%"  style="font-size:20px">
                الموعد
            </th>
            <td class="font-w600"  style="font-size:20px">
                {{$order->ticket->hour_party}}
            </td>
        </tr>

        <tr style="font-size: 1.1rem">
            <th scope="row" style="width: 30%"  style="font-size:20px">
                عدد الاشخاص
            </th>
            <td class="font-w600"  style="font-size:20px">
                {{$order->qty}}
            </td>
        </tr>

        <tr style="font-size: 1.1rem">
            <th scope="row" style="width: 30%"  style="font-size:20px">
                المبلغ الاجمالي
            </th>
            <td class="font-w600"  style="font-size:20px">
                {{$order->total}} ({{$totalInArabic}})
            </td>
        </tr>

        <tr style="font-size: 1.1rem">
            <th scope="row" style="width: 30%"  style="font-size:20px">
              الضريبة
            </th>
            <td class="font-w600"  style="font-size:20px">
                {{$order->ticket->vat ? "مطبقة" : "غير مطبقة"}}
            </td>
        </tr>



        <htmlpagefooter name="page-footer">
            <div style="text-align: center">
                <table style="width: 100%; margin: auto; text-align: center">
                    <tr>
                        <td>{{$home->facebook}}</td>
                        <td>{{$home->twitter}}</td>
                    </tr>
                    <tr>
                        <td>{{$home->site_web}}</td>
                        <td>{{$home->site_email}}</td>
                    </tr>
                </table>
            </div>
        </htmlpagefooter>

    </table>
</div>
</body>
</html>
