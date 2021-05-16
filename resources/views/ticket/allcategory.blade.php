@extends('layoutcity')


@section('city')


    <section class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('uploads/1.jpg') }}"
        data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">
                <h1>تصنيف الحفلات</h1>
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


                <div class="col-lg-12">


                    <div class="isotope-wrapper">
                        <div class="row">

                            @foreach ($Category as $Tick)

                                <div class="col-md-4 isotope-item lower_price">
                                    <div class="transfer_container">
                                        <div class="ribbon_3 popular"><span>Popular</span>
                                        </div>
                                        <div class="img_container">
                                            <a href="{{ url("Category/{$Tick->id}") }}">
                                                <img src="{{ asset("uploads/$Tick->image") }}" width="800" height="533"
                                                    class="img-fluid" alt="Image">

                                            </a>
                                        </div>
                                        <div class="transfer_title">
                                            <h3><strong> {{ $Tick->name }}</strong> </h3>

                                            <!-- end rating -->


                                            <!-- End wish list-->
                                        </div>
                                    </div>
                                    <!-- End box tour -->
                                </div>
                                <!-- End col-md-6 -->
                            @endforeach

                        </div>
                        <!-- End row -->

                    </div>
                    <!-- End isotope-wrapper -->

                    <hr>


                </div>
                <!-- End col lg 9 -->
            </div>
            <!-- End row -->
        </div>
        <!-- End container -->
    </main>
    <!-- End main -->

@endsection
