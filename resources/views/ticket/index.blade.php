@extends('layout')


@section('main')



    <main>
        <section class="header-video">
            <div id="hero_video">
                <div class="intro_title">
                    <h3 class="animated fadeInDown">Affordable Paris tours</h3>
                    {{-- <p class="animated fadeInDown">City Tours / Tour Tickets / Tour Guides</p>
                    <a href="#" class="animated fadeInUp button_intro">View Tours</a>
                    <a href="#" class="animated fadeInUp button_intro outline hidden-sm hidden-xs">View Tickets</a> --}}
                    <a href="https://www.youtube.com/watch?v=kDqTPT1SQbU"
                        class="video animated fadeInUp button_intro outline">Play video</a>
                </div>
            </div>
            <img src="" alt="Image" class="header-video--media" data-video-src="" data-teaser-source="video/Saudi"
                data-provider="Youtube" data-video-width="854" data-video-height="480">
        </section>


        <!-- /white_bg -->





        <section style="background-color: white">
            <div class="container margin_60">


                @foreach ($Setting as $Settin)


                    @foreach ($Cityone as $Cit)
                        <h2 style="margin-right: 30px">{{ $Cit->name }}</h2>
                        <div class=" container">
                            <div class=" row">
                                <div class=" col-md-4">
                                    <a href="{{ url("City/{$Cit->id}") }}"> <img class=" img-fluid"
                                            src="{{ asset("uploads/$Cit->image") }}" alt=""> </a>

                                </div>
                                <div class=" col-md-8 mt-2">
                                    <p class=" lead">{{ $Cit->desc }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="owl-carousel owl-theme list_carousel add_bottom_30">

                            @foreach ($Cit->tickets as $ticket)

                                <div class="item">
                                    <div class="tour_container">
                                        <div class="ribbon_3"><span>Top rated</span></div>
                                        <div class="img_container">
                                            <a href="{{ url("Ticket/show/$ticket->id") }}">
                                                <img src="{{ asset("uploads/$ticket->image") }}" width="800"
                                                    height="200px" alt="image">
                                                <div class="badge_save">متاح<strong>{{ $ticket->qty }}</strong></div>
                                                <div class="short_info">
                                                    <i class="icon_set_1_icon-30"></i>{{ $ticket->date_party }}<span
                                                        class="price"><sup>SAR</sup> <?php
                                                        $one = $ticket->price;
                                                        $asd = $Settin->vat_rate;
                                                        $two = $ticket->price_without_vat;
                                                        $tax = $asd / 100;

                                                        $result = $tax * $two;
                                                        $result2 = $result + $two;
                                                        echo $result2;
                                                        ?></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="tour_title">
                                            <h3><strong>{{ $ticket->name }}</strong> <a
                                                    href="{{ url("Category/{$ticket->category->id}") }}">
                                                    {{ $ticket->category->name }}</a></h3>
                                            <div class="rating">
                                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                                    class="icon-smile voted"></i><i
                                                    class="icon-smile voted"></i><i></i><small></small>
                                            </div>
                                            <!-- end rating -->
                                            <div class="wishlist">
                                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);"><span
                                                        class="tooltip-content-flip"></a>
                                            </div>
                                            <!-- End wish list-->
                                        </div>
                                    </div>
                                    <!-- End box tour -->
                                </div>
                            @endforeach
                        </div>


                        <p class="text-center nopadding">
                            <a href="{{ url("City/{$Cit->id}") }}" class="btn_1">View all </a>
                        </p>


                    @endforeach
                @endforeach

        </section>



        <section>
            <div class="container margin_60">


                @foreach ($Setting as $Settin)

                    @foreach ($Cittwo as $Cit)
                        <h2 style="margin-right: 30px">{{ $Cit->name }}</h2>
                        <div class=" container">
                            <div class=" row">
                                <div class=" col-md-4">
                                    <a href="{{ url("City/{$Cit->id}") }}"> <img class=" img-fluid"
                                            src="{{ asset("uploads/$Cit->image") }}" alt=""> </a>

                                </div>
                                <div class=" col-md-8 mt-2">
                                    <p class=" lead">{{ $Cit->desc }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="owl-carousel owl-theme list_carousel add_bottom_30">

                            @foreach ($Cit->tickets as $ticket)

                                <div class="item">
                                    <div class="tour_container">
                                        <div class="ribbon_3"><span>Top rated</span></div>
                                        <div class="img_container">
                                            <a href="{{ url("Ticket/show/$ticket->id") }}">
                                                <img src="{{ asset("uploads/$ticket->image") }}" width="800"
                                                    height="200px" alt="image">
                                                <div class="badge_save">متاح<strong>{{ $ticket->qty }}</strong></div>
                                                <div class="short_info">
                                                    <i class="icon_set_1_icon-30"></i>{{ $ticket->date_party }}<span
                                                        class="price"><sup>SAR</sup> <?php
                                                        $one = $ticket->price;
                                                        $asd = $Settin->vat_rate;
                                                        $two = $ticket->price_without_vat;
                                                        $tax = $asd / 100;

                                                        $result = $tax * $two;
                                                        $result2 = $result + $two;
                                                        echo $result2;
                                                        ?></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="tour_title">
                                            <h3><strong>{{ $ticket->name }}</strong> <a
                                                    href="{{ url("Category/{$ticket->category->id}") }}">
                                                    {{ $ticket->category->name }}</a></h3>
                                            <div class="rating">
                                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                                    class="icon-smile voted"></i><i
                                                    class="icon-smile voted"></i><i></i><small></small>
                                            </div>
                                            <!-- end rating -->
                                            <div class="wishlist">
                                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);"><span
                                                        class="tooltip-content-flip"></a>
                                            </div>
                                            <!-- End wish list-->
                                        </div>
                                    </div>
                                    <!-- End box tour -->
                                </div>
                            @endforeach
                        </div>


                        <p class="text-center nopadding">
                            <a href="{{ url("City/{$Cit->id}") }}" class="btn_1">View all </a>
                        </p>


                    @endforeach
                @endforeach

        </section>

        <section>
            <div class="container margin_60">

                @foreach ($Setting as $Settin)

                    @foreach ($Citythree as $Cit)
                        <h2 style="margin-right: 30px">{{ $Cit->name }}</h2>
                        <div class=" container">
                            <div class=" row">
                                <div class=" col-md-4">
                                    <a href="{{ url("City/{$Cit->id}") }}"> <img class=" img-fluid"
                                            src="{{ asset("uploads/$Cit->image") }}" alt=""> </a>
                                </div>
                                <div class=" col-md-8 mt-2">
                                    <p class=" lead">{{ $Cit->desc }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="owl-carousel owl-theme list_carousel add_bottom_30">

                            @foreach ($Cit->tickets as $ticket)


                                <div class="item">
                                    <div class="tour_container">
                                        <div class="ribbon_3"><span>Top rated</span></div>
                                        <div class="img_container">
                                            <a href="{{ url("Ticket/show/$ticket->id") }}">
                                                <img src="{{ asset("uploads/$ticket->image") }}" width="800"
                                                    height="200px" alt="image">
                                                <div class="badge_save">متاح<strong>{{ $ticket->qty }}</strong></div>
                                                <div class="short_info">
                                                    <i class="icon_set_1_icon-30"></i>{{ $ticket->date_party }}<span
                                                        class="price"><sup>SAR</sup> <?php
                                                        $one = $ticket->price;
                                                        $asd = $Settin->vat_rate;
                                                        $two = $ticket->price_without_vat;
                                                        $tax = $asd / 100;

                                                        $result = $tax * $two;
                                                        $result2 = $result + $two;
                                                        echo $result2;
                                                        ?></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="tour_title">
                                            <h3><strong>{{ $ticket->name }}</strong> <a
                                                    href="{{ url("Category/{$ticket->category->id}") }}">
                                                    {{ $ticket->category->name }}</a></h3>
                                            <div class="rating">
                                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                                    class="icon-smile voted"></i><i
                                                    class="icon-smile voted"></i><i></i><small></small>
                                            </div>
                                            <!-- end rating -->
                                            <div class="wishlist">
                                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);"><span
                                                        class="tooltip-content-flip"></a>
                                            </div>
                                            <!-- End wish list-->
                                        </div>
                                    </div>
                                    <!-- End box tour -->
                                </div>
                            @endforeach
                        </div>


                        <p class="text-center nopadding">
                            <a href="{{ url("City/{$Cit->id}") }}" class="btn_1">View all </a>
                        </p>


                    @endforeach
                @endforeach
        </section>


        <section style="background-color: white">
            <div class="container margin_60">


                @foreach ($Setting as $Settin)

                    @foreach ($Cityfour as $Cit)
                        <h2 style="margin-right: 30px">{{ $Cit->name }}</h2>
                        <div class=" container">
                            <div class=" row">
                                <div class=" col-md-4">
                                    <a href="{{ url("City/{$Cit->id}") }}"> <img class=" img-fluid"
                                            src="{{ asset("uploads/$Cit->image") }}" alt=""> </a>
                                </div>
                                <div class=" col-md-8 mt-2">
                                    <p class=" lead">{{ $Cit->desc }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="owl-carousel owl-theme list_carousel add_bottom_30">

                            @foreach ($Cit->tickets as $ticket)


                                <div class="item">
                                    <div class="tour_container">
                                        <div class="ribbon_3"><span>Top rated</span></div>
                                        <div class="img_container">
                                            <a href="{{ url("Ticket/show/$ticket->id") }}">
                                                <img src="{{ asset("uploads/$ticket->image") }}" width="800"
                                                    height="200px" alt="image">
                                                <div class="badge_save">متاح<strong>{{ $ticket->qty }}</strong></div>
                                                <div class="short_info">
                                                    <i class="icon_set_1_icon-30"></i>{{ $ticket->date_party }}<span
                                                        class="price"><sup>SAR</sup><?php
                                                        $one = $ticket->price;
                                                        $asd = $Settin->vat_rate;
                                                        $two = $ticket->price_without_vat;
                                                        $tax = $asd / 100;

                                                        $result = $tax * $two;
                                                        $result2 = $result + $two;
                                                        echo $result2;
                                                        ?></span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="tour_title">
                                            <h3><strong>{{ $ticket->name }}</strong><a
                                                    href="{{ url("Category/{$ticket->category->id}") }}">
                                                    {{ $ticket->category->name }}</a></h3>
                                            <div class="rating">
                                                <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                                    class="icon-smile voted"></i><i
                                                    class="icon-smile voted"></i><i></i><small></small>
                                            </div>
                                            <!-- end rating -->
                                            <div class="wishlist">
                                                <a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);"><span
                                                        class="tooltip-content-flip"></a>
                                            </div>
                                            <!-- End wish list-->
                                        </div>
                                    </div>
                                    <!-- End box tour -->
                                </div>
                            @endforeach
                        </div>


                        <p class="text-center nopadding">
                            <a href="{{ url("City/{$Cit->id}") }}" class="btn_1">View all </a>
                        </p>


                    @endforeach
                @endforeach

        </section>

    </main>
@endsection
