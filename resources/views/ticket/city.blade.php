@extends('layoutcity')


@section('city')


    <section class="parallax-window" data-parallax="scroll" data-image-src="{{ asset("uploads/$City->image") }}"
        data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>{{ $City->name }}</h1>
                <p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.</p>
            </div>
        </div>
    </section>
    <!-- End section -->


    <main>

        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="/">Home</a>
                    </li>

                    <li>Page active</li>
                </ul>
            </div>
        </div>
        <!-- Position -->

        <div class="collapse" id="collapseMap">
            <div id="map" class="map"></div>
        </div>
        <!-- End Map -->


        <div class="container margin_60">

            <div class="row">
                <aside class="col-lg-3">
                    <p>

                    </p>


                </aside>
                <!--End aside -->
                <div class="col-lg-12">

                    <div id="tools">
                        <div class="row">
                          
                        </div>
                    </div>


                    @foreach ($Setting as $Settin)


                        @foreach ($City->tickets as $ticket)


                            <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.5s">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="ribbon_3"><span>Top rated</span>
                                        </div>
                                        <div class="wishlist">
                                        </div>
                                        <div class="img_list">
                                            <a href="{{ url("Ticket/show/$ticket->id") }}"><img
                                                    src="{{ asset("uploads/$ticket->image") }}" alt="Image">
                                                <div class="short_info"><i
                                                        class="icon_set_1_icon-28"></i>{{ $ticket->date_party }}</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="tour_list_desc">
                                            <div class="rating"><i class="icon-smile voted"></i><i
                                                    class="icon-smile  voted"></i><i class="icon-smile  voted"></i><i
                                                    class="icon-smile  voted"></i><i
                                                    class="icon-smile voted"></i><small>متاح ({{ $ticket->qty }})</small>
                                            </div>
                                            <h3>{{ $ticket->category->name }} <strong>{{ $ticket->name }}</strong> </h3>
                                            <p>{{ $ticket->desc }}</p>
                                            <ul class="add_info">
                                                <li>
                                                    <div class="tooltip_styled tooltip-effect-4">
                                                        <span class="tooltip-item"><i class="icon_set_1_icon-83"></i></span>
                                                        <div class="tooltip-content">

                                                            <h4>الساعة</h4>

                                                            <strong>{{ $ticket->hour_party }}</strong>

                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="tooltip_styled tooltip-effect-4">
                                                        <span class="tooltip-item"><i class="icon_set_1_icon-41"></i></span>
                                                        <div class="tooltip-content">
                                                            <h4>المكان</h4> {{ $ticket->city->name }}
                                                            <br>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="tooltip_styled tooltip-effect-4">
                                                        <span class="tooltip-item"><i class="icon_set_1_icon-27"></i></span>
                                                        <div class="tooltip-content">
                                                            <h4>جراج</h4> متاح مكان لركن السيارات

                                                        </div>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <div class="price_list">
                                            <div style="font-size: 20px !important"><span class=" m-2"> SAR</span>

                                                <?php
                                                $one = $ticket->price;
                                                $asd = $Settin->vat_rate;
                                                $two = $ticket->price_without_vat;
                                                $tax = $asd / 100;

                                                $result = $tax * $two;
                                                $result2 = $result + $two;
                                                echo $result2;
                                                ?>

                                                <span class="normal_price_list">
                                                    <?php
                                                    $pr = $ticket->price;
                                                    $price = $ticket->price + 70;
                                                    echo $price;
                                                    ?>
                                                </span><small>*Per person</small>
                                                <p><a href="{{ url("Ticket/show/$ticket->id") }}" class="btn_1">Details</a>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End strip -->
                        @endforeach
                    @endforeach

                    <hr>



                </div>
                <!-- End col lg-9 -->
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </main>
    <!-- End main -->


@endsection




{{-- @foreach ($City->tickets as $ticket)
    <h2>{{$ticket->name}}</h2>
@endforeach --}}
