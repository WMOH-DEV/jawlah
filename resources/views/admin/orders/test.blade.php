<!doctype html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <title>{{ $order->order_number }}</title>
    <style>
        body {
            font-family: 'XBRiyaz', sans-serif;
        }


        .ticket-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            font-size: 9px;
            line-height: 24px;
            font-family: 'XBRiyaz', sans-serif;
            color: #555;
        }

        .ticket-box table {
            width: 100%;
            line-height: inherit;
            text-align: right;
        }

        .bg-black {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgb(0 0 0 / 10%) 0 linear-gradient(
                90deg, rgb(0 0 0 / 10%) 0 0, rgb(0 0 0 / 30%) 50% 100%) !important;
        }


        .ticket-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .ticket-box table tr td {
            text-align: left;
        }

        .ticket-box table tr.top table td {
            padding-bottom: 20px;
        }

        .ticket-box table tr.top table td.title {
            font-size: 30px;
            line-height: 45px;
            color: #333;
        }

        .ticket-box table tr.information table td {
            padding-bottom: 40px;
        }

        .ticket-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .ticket-box table tr.details td {
            padding-bottom: 20px;
        }

        .ticket-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .barcode {
            height: 170px;
            width: 210px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .ticket-box table tr.item.last td {
            border-bottom: none;
        }

        .ticket-box table tr.total td {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .ticket-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .ticket-box table tr.information table td {
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

        .tableMain tr td{
            border: 1px solid #000;
        }
    </style>
</head>


<body>
<div class="ticket-box rtl">

    <table class="tableMain" style="width: 100%; margin-left: auto; margin-right: auto; border-collapse: collapse">
        <tbody>
        <tr>
            <td style="width: 70%; text-align: right;" class="main-bg">
                <img src="{{ asset("uploads/$home->site_logo") }}" style="height:150px;">
            </td>
            <td style="width: 2%;"></td>
            <td style="width: 20%; background: #dddddd;"></td>
            <td style="width: 2%;"></td>
            <td style="width: 6%;"></td>
        </tr>
        <tr>
            <td colspan="5"
                style="background-image: url('{{asset('uploads')}}/{{$order->ticket->image}}'); width: 100%; text-align: center; vertical-align: middle;background-position: center; background-repeat: no-repeat; height: 250px;background-size: cover;">

                <div class="bg-black" style=" width: 100%; height: 100%">
                    <h3 style="color: white; font-size: 5rem;  text-shadow: 2px 2px #000;">{{$order->ticket->name}}</h3>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width: 70%; text-align: right;">
                <h3 style="padding-right: 20px; padding-right: 10px; font-size:1.3rem">{{$order->user->name}}</h3>
            </td>
            <td style="width: 2%;"></td>
            <td style="width: 20%; background: #dddddd;"></td>
            <td style="width: 2%;"></td>
            <td style="width: 6%;"></td>
        </tr>

        <tr>
            <td style="width: 70%; text-align: right;">
                <h3 style="padding-right: 20px; padding-right: 10px; font-size:1.3rem">
                   تاريخ ووقت الفاعلية:
                <span>
{{--                    {{$order->ticket->date_party}}--}}
                    {{\Carbon\Carbon::parse($order->ticket->date_party)->format('D-M-Y')}}

                </span>
                </h3>
            </td>
            <td style="width: 2%;"></td>
            <td style="width: 20%; background: #dddddd;"></td>
            <td style="width: 2%;"></td>
            <td style="width: 6%;"></td>
        </tr>


        </tbody>
    </table>

    {{--    <div class="head" style="display: flex; background: #f00;">--}}
    {{--        <div class="logo" style="width: 70%">--}}
    {{--            <img src="{{ asset("uploads/$home->site_logo") }}" style="height:150px;">--}}
    {{--        </div>--}}
    {{--        <div class="left-side" style="background: #8888FF;width: 20%"></div>--}}
    {{--    </div>--}}
    {{--    <div class="main-bg"--}}
    {{--         style="background-image: url('{{asset('uploads')}}/{{$order->ticket->image}}'); width: 100%; background-position: center; background-repeat: no-repeat; height: 250px;background-size: cover;">--}}
    {{--        <div class="bg-black">--}}
    {{--            <h3 style="color: white; font-size: 5rem;">{{$order->ticket->name}}</h3>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <div class="order-info" style="display: flex;position: relative;">--}}
    {{--        <div class="info" style="width: 70%; background: #00bfff;">--}}
    {{--            <h3 style="padding-right: 20px; font-size:1.3rem">{{$order->user->name}}</h3>--}}
    {{--        </div>--}}
    {{--        <div class="info" style="width: 20%;background: #4b88a6;"></div>--}}
    {{--        <div class="barcode" style="background: black;position: absolute; left: 60px; top: 50px;">--}}
    {{--            <img src="{{asset("qrcodes/$order->order_number.svg")}}" alt="">--}}
    {{--        </div>--}}
    {{--    </div>--}}

</div>
</body>
</html>
