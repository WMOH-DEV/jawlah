@extends('admin.main-layout')

@section('title')مشاهدة التذكرة@endsection


@section('content')

    <!-- Hero Section -->
    <div class="bg-image" style="background-image: url('{{ asset("uploads/$ticket->image") }}');">
        <div class="bg-gd-white-op-l">
            <div class="content content-boxed content-full py-5">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center py-3">
                        <div class="w-100 text-center text-md-right pr-md-5">
                            <h1 class="h2 mb-2">{{ $ticket->name }}</h1>
                            <h2 class="h4 font-size-sm text-uppercase font-w600 text-muted"><i class="fas fa-table"></i>
                                <span>التاريخ: {{ $ticket->date_party }}</span> - الساعة: {{ $ticket->hour_party }}
                            </h2>
                            <a class="font-w600" href="javascript:void(0)">
                                <i class="fas fa-user text-dark"></i> بواسطة: {{ $ticket->user->name }}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center">
                        <div
                            class="block block-rounded block-link-shadow block-transparent bg-white-75 text-center mb-0 mx-auto">
                            <div class="block-content block-content-full px-5 py-4">
                                <div class="font-size-h2 font-w600 text-black">
                                    {{ $ticket->price }} <span class="text-black-50"> ر.س </span>
                                </div>
                                <div class="font-size-sm font-w600 text-uppercase text-muted mt-1 push">
                                    <span>الكمية: </span><span>{{ $ticket->qty }}</span>
                                </div>
                                <a href="{{ route('tickets.index') }}" class="btn btn-hero-primary"><i
                                        class="fa fa-arrow-right mr-1"></i> رجوع</a>
                                <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-hero-primary"><i
                                        class="fa fa-pen mr-1"></i> تعديل</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Hero Section -->

    <!-- Page Content -->
    <div class="content content-boxed">
        <div class="row">
            <div class="col-md-4 order-md-1">
                <!-- Ticket Summary -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">معلومات آخرى</h3>
                    </div>
                    <div class="block-content">
                        <ul class="fa-ul list-icons">
                            <li>
                                <span class="fa-li text-primary">
                                    <i class="fa fa-map-marker-alt"></i>
                                </span>
                                <div class="font-w600">المدينة</div>
                                <div class="text-muted">{{ $ticket->city->name }}</div>
                            </li>
                            <li>
                                <span class="fa-li text-primary">
                                    <i class="fa fa-briefcase"></i>
                                </span>
                                <div class="font-w600">الفئة</div>
                                <div class="text-muted">{{ $ticket->category->name }}</div>
                            </li>
                            <li>
                                <span class="fa-li text-primary">
                                    <i class="fa fa-money-check-alt"></i>
                                </span>
                                <div class="font-w600">سعر التذكرة</div>
                                <div class="text-muted">{{ $ticket->price }} <span class="text-black-50"> ر.س </span>
                                </div>
                            </li>
                            <li>
                                <span class="fa-li text-primary">
                                    <i class="fas fa-percent"></i>
                                </span>
                                <div class="font-w600">الضريبة</div>
                                <div class="text-muted">{{ $ticket->vat ? 'مطبقة' : 'غير مطبقة' }}</div>
                            </li>

                            <li><span class="fa-li text-primary"><i class="fas fa-table"></i></span>
                                <div class="font-w600">تاريخ النشاط</div>
                                <div class="text-muted">{{ $ticket->date_party }}</div>
                            </li>
                            <li><span class="fa-li text-primary"><i class="fa fa-clock"></i></span>
                                <div class="font-w600">موعد النشاط</div>
                                <div class="text-muted">{{ $ticket->hour_party }}</div>
                            </li>

                            <li><span class="fa-li text-primary"><i class="fas fa-podcast"></i></span>
                                <div class="font-w600">الجمهور</div>
                                <div class="text-muted">{{ $ticket->age }}</div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END Ticket Summary -->
            </div>
            <div class="col-md-8 order-md-0">

                <!-- Ticket info -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">معلومات التذكرة</h3>
                    </div>
                    <div class="block-content">
                        <p>{!! $ticket->desc !!}</p>
                    </div>
                </div>
                <!-- END Ticket info -->

                <!-- Ticket Description -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">وصف النشاط</h3>
                    </div>
                    <div class="block-content">
                        <p>{!! $ticket->information !!}</p>
                    </div>
                </div>
                <!-- END Ticket Description -->

                <!-- Slider with multiple images and center mode -->
                @if ($ticket->image2)
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                <i class="fa fa-play fa-fw text-primary"></i> معرض الصور
                            </h3>
                        </div>
                        <div class="js-slider slick-nav-black slick-nav-hover responsive" dir="ltr" data-dots="true"
                            data-arrows="true" data-slides-to-show="2" data-center-mode="true" data-autoplay="true"
                            data-autoplay-speed="3000">
                            <div>
                                <img class="img-fluid" style="height:250px" src="{{ asset("uploads/$ticket->image") }}"
                                    alt="{{ $ticket->name }}">
                            </div>
                            <div>
                                <img class="img-fluid" style="height:250px" src="{{ asset("uploads/$ticket->image2") }}"
                                    alt="{{ $ticket->name }}">
                            </div>
                            <div>
                                <img class="img-fluid" style="height:250px" src="{{ asset("uploads/$ticket->image3") }}"
                                    alt="{{ $ticket->name }}">
                            </div>
                        </div>
                    </div>
                @endif
                <!-- END Slider with multiple images and center mode -->

            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets') }}/js/plugins/slick-carousel/slick.css">
    <link rel="stylesheet" href="{{ asset('admin/assets') }}/js/plugins/slick-carousel/slick-theme.css">
@endsection
@section('js')
    <script src="{{ asset('admin/assets') }}/js/plugins/slick-carousel/slick.min.js"></script>
    <script>
        jQuery(function() {
            Dashmix.helpers('slick');
        });

    </script>

@endsection
