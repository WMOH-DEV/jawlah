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

        .invoice-box table tr.item td{
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
                        <td width="65%" class="title">
                            <img src="{{ asset('images/test-logo.png') }}" style="width:100px; max-width:100px;">
                        </td>

                        <td width="35%">
                            رقـــم الطلب: {{ $order->order_number }}<br>
                            تاريخ الطلب: {{ $order->created_at->format('Y-m-d') }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center"><h1> طلب رقم {{ $order->order_number }}</h1></td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="8">
                <table>
                    <tr>
                        <td width="50%">
                            <h2>موقع جهّز</h2>
                            <h4 dir="ltr">{{$home->phone}}</h4>
                            <h4>العنوان : {{$home->address}}</h4>
                            <h4>البريد الإلكتروني : {{$home->email}}</h4>
                        </td>

                        <td width="50%">
                            <h2>{{ $order->user->name }}</h2>
                            <h4>{{ $order->user->email }}</h4>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td></td>
            <td style="text-align: center">كود المنتج</td>
            <td style="text-align: center">اسم المنتج</td>
            <td style="text-align: center">الكمية</td>
            <td style="text-align: center">سعر الوحدة</td>
            <td style="text-align: center">خصم</td>
            <td style="text-align: center">إجمالي</td>
            <td style="text-align: center">المجموع</td>
        </tr>

            <tr class="item">
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td style="text-align: center">{{ $item['item_code'] ?? '0000' }}</td>
                <td style="text-align: center">{{ $item['name']}}</td>
                <td style="text-align: center">{{ $item->pivot->product_qty }}</td>
                <td style="text-align: center">{{ $item['init_price'] }}</td>
                <td style="text-align: center">{{ $item['sell_discount'] }}</td>
                <td style="text-align: center">{{ $item['sell_price'] }}</td>
                <td style="text-align: center">{{ $item['sell_price'] * $item->pivot->product_qty}}</td>
            </tr>

        <tr class="total">
            <td colspan="6"></td>
            <td>مجموع المنتجات</td>
            <td>{{$subtotal}}</td>
        </tr>

        <tr class="total">
            <td colspan="6"></td>
            <td>الخصم</td>
            <td>{{$discount = $total- $subtotal}}</td>
        </tr>
        <tr class="total">
            <td colspan="6"></td>
            <td>الإجمالي</td>
            <td>{{$total}}</td>
        </tr>
    </table>
</div>
</body>
</html>
