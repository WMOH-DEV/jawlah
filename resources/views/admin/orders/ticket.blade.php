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
            line-height: 30px;
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

        .gray {
            background-color: #dddddd;
        }

        @page {
            header: page-header;
            footer: page-footer;
        }

        /*.tableMain tr td {*/
        /*    border: 1px solid #000;*/
        /*}*/
        .test {
            -ms-writing-mode: tb-rl;
            -webkit-writing-mode: vertical-rl;
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            white-space: nowrap;
        }

        .rotate {

            transform: rotate(-90deg);


            /* Legacy vendor prefixes that you probably don't need... */

            /* Safari */
            -webkit-transform: rotate(-90deg);

            /* Firefox */
            -moz-transform: rotate(-90deg);

            /* IE */
            -ms-transform: rotate(-90deg);

            /* Opera */
            -o-transform: rotate(-90deg);

            /* Internet Explorer */
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);

        }

        .dashed {
            border-bottom: 1px dashed #000;
        }
    </style>
</head>


<body>
<div class="ticket-box rtl">

    <table class="tableMain" style="width: 100%; margin-left: auto; margin-right: auto; border-collapse: collapse">
        <tbody>
        <tr>
            <td style="width: 30%; text-align: right;" class="main-bg">
                <img src="{{ asset("uploads/$home->site_logo") }}" style="height:100px;">
            </td>
            <td style="width: 40%; text-align: right;" class="main-bg"></td>
            <td style="width: 2%;"></td>
            <td style="width: 20%; background: #dddddd;"></td>
            <td style="width: 2%;"></td>
            <td style="width: 6%;"></td>
        </tr>
        <tr>
            <td colspan="6"
                style="background-image: url('{{asset('uploads')}}/{{$order->ticket->image}}'); width: 100%;
                    text-align: center;
                    vertical-align: middle;
                    background-position: center;
                    background-size: cover;
                    background-repeat: no-repeat; height: 150px;">
                <div class="bg-black" style=" width: 100%; height: 100%">
                    <h3 style="color: white; font-size: 3.5rem;  text-shadow: 2px 2px #000;">{{$order->ticket->name}}</h3>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width: 30%; text-align: right;" colspan="2">
                <h3 style="padding-right: 20px; font-size:1.3rem">
                    {{$order->user->name}}
                    <span style="padding-right: 30px;color: #7a0c0c">
                         عدد الأشخاص
                        <span>({{$order->qty}})</span>
                    </span>
                </h3>
            </td>
            <td style="width: 2%;"></td>
            <td style="width: 20%; background: #dddddd;"></td>
            <td style="width: 2%;"></td>
            <td style="width: 6%;"></td>
        </tr>

        <tr>
            <td style="width: 30%; text-align: right;">
                <h3 style="padding-right: 20px; font-size:1.3rem">
                    تاريخ ووقت الفاعلية:
                </h3>
            </td>
            <td style="width: 40%;text-align: right;">
                 <span style="padding-right: 30px;display: inline-block;font-size:1.3rem; color: #7a0c0c">
                         {{$order->ticket->hour_party}} |  {{$date}}
                    </span>
            </td>
            <td style="width: 2%; text-align: center" colspan="3" rowspan="4">
                <img src="{{asset("qrcodes/$order->order_number.svg")}}" alt="">
            </td>
            <td style="width: 6%;"></td>
        </tr>

        <tr>
            <td style="width: 30%; text-align: right;font-size:0.8rem;" class="dashed gray">
                <h3 style="padding-right: 20px;">
                    رقم المعاملة:
                    <span style="padding-right: 30px;color: #7a0c0c">
                         {{$order->id}}
                    </span>
                </h3>

            </td>
            <td style="width: 40%;font-size:0.8rem;text-align: right;" class="dashed gray">
                <h3 style="padding-right: 20px;">
                    تاريخ الشراء:
                    <span style="padding-right: 30px;">
                         {{$order->created_at->format('Y/m/d')}}
                    </span>
                </h3>
            </td>
            <td style="width: 6%;"></td>
        </tr>

        <tr>
            <td style="width: 30%; text-align: right;font-size:0.8rem;height: 35px" class="dashed gray">

            </td>
            <td style="width: 40%;font-size:0.8rem;text-align: right;" class="dashed gray">
            </td>

            <td style="width: 6%;"></td>
        </tr>

        <tr>
            <td style="width: 30%; text-align: right;font-size:0.8rem;" class="gray">
                <h3 style="padding-right: 20px;">
                    الرقم الضريبي:
                    <span style="padding-right: 30px;">
                         {{$home->vat_id}}
                    </span>
                </h3>
                <h3>
                    مبلغ ضريبة القيمة :
                <span>
                    {{$vat * $order->qty}}
                </span>
                </h3>

            </td>
            <td style="width: 40%;font-size:0.8rem;text-align: right;" class="gray">
                <h3 style="padding-right: 20px;">
                    السعر يشمل الضريبة:
                    <span style="padding-right: 30px;">
                         {{$order->total}} SAR
                    </span>
                </h3>
            </td>
            <td style="width: 6%;"></td>
        </tr>

        <tr>
            <td style="width: 30%; text-align: right;font-size:1.1rem;">
                <h3 style="padding-right: 20px;">
                    المكان:
                </h3>
            </td>
            <td style="width: 40%;font-size:0.8rem;text-align: right;">
            </td>
            <td style="width: 2%; text-align: center; font-size:0.7rem" colspan="3">{{$order->order_number}}</td>
            <td style="width: 6%;"></td>
        </tr>

        <tr>
            <td colspan="2" style="width: 30%; text-align: center;font-size:1.2rem;">
                <h3 style="padding-right: 20px;">
                    {{$order->ticket->city->name}}
                </h3>
            </td>
            <td style="width: 2%;"></td>
            <td style="width: 20%; background: #dddddd;transform: rotate(20deg);" rowspan="2" class="rotate">
                <span class="test"></span>
            </td>
            <td style="width: 2%;"></td>
            <td style="width: 6%;"></td>
        </tr>
        <tr>
            <td colspan="2" style="width: 30%; text-align: center;font-size:1.2rem; height: 20px">
                <h3 style="padding-right: 20px;">
                </h3>
            </td>
            <td style="width: 2%;"></td>
            <td style="width: 2%;"></td>
            <td style="width: 6%;"></td>
        </tr>


        <tr>
            <td colspan="2" style="width: 30%; text-align: right;font-size:0.8rem;">
                <h3 style="padding-right: 20px;">
                    شروط وأحكام كوفيد-19:
                </h3>
            </td>
            <td style="width: 2%;"></td>
            <td style="width: 20%; background: #dddddd;"></td>
            <td style="width: 2%;"></td>
            <td style="width: 6%;"></td>
        </tr>
        <tr>
            <td colspan="6" style="width: 30%;font-size:0.7rem;  text-align: justify;">
                <h3 style="padding-right: 20px;">
                    {{$home->covid19}}
                </h3>
            </td>

        </tr>

        <tr>
            <td colspan="6" style="width: 30%; text-align: right;font-size:0.8rem;">
                <h3 style="padding-right: 20px;">
                    الشروط والأحكام:
                </h3>
            </td>
        </tr>

        <tr>
            <td colspan="6" style="width: 30%;font-size:0.9rem;  text-align: justify;">
                    {{$home->terms}}
            </td>

        </tr>

        <tr>
            <td colspan="6" style="width: 30%;font-size:1.3rem;  text-align: center;">
                <p>هذه هي تذكرتك النهائية، المرجو الاحتفاظ بها على الهاتف المحمول</p>
                <p>وتقديمها للموظف المختص استعداداً للدخول</p>
            </td>
        </tr>

        </tbody>
    </table>
</div>

<htmlpagefooter name="page-footer">
    <div style="text-align: center; color: white; background-color: #8888FF">
        <table style="width: 100%; margin: auto; text-align: center;color: white">
            <tr>
                <td style="text-align: center; vertical-align: middle; height: 50px">
                    <img src="https://img.icons8.com/office/16/000000/whatsapp.png"/>
                    {{$home->whatsapp}}</td>
                <td>
                    <img style="height: 15px" src="https://img.icons8.com/android/24/ffffff/twitter.png"/>
                    {{$home->twitter}}
                    <img style="height: 15px" src="https://img.icons8.com/android/24/ffffff/facebook-new.png"/>
                    {{$home->facebook}}
                    <img style="height: 15px" src="https://img.icons8.com/ios/64/ffffff/instagram-new--v1.png"/>
                    {{$home->instagram}}
                </td>
            </tr>
        </table>
    </div>
</htmlpagefooter>
</body>
</html>
