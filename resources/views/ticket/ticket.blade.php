@extends('layoutcity')
@section('city')

    @foreach ($Setting as $Settin)

        <section class="parallax-window" data-parallax="scroll" data-image-src="{{ asset("uploads/$Ticket->image") }}"
            data-natural-width="1400" data-natural-height="470">
            <div class="parallax-content-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h1>{{ $Ticket->name }}</h1>
                            <span>{{ $Ticket->city->name }} ...., {{ $Ticket->date_party }}.</span>
                            <span class="rating"><i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                    class="icon-smile voted"></i><small>{{ $Ticket->qty }}</small></span>
                        </div>
                        <div class="col-md-4">
                            <div id="price_single_main">
                                from/per person <span><sup>Sar</sup>

                                    <?php
                                    $one = $Ticket->price;
                                    $asd = $Settin->vat_rate;
                                    $two = $Ticket->price_without_vat;
                                    $tax = $asd / 100;

                                    $result = $tax * $two;
                                    $result2 = $result + $two;
                                    echo $result2;
                                    ?>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <!-- End section -->

    <main>
        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="/">Home</a>
                    </li>
                    <li><a href="{{ url("Category/{$Ticket->category->id}") }}">{{ $Ticket->category->name }}</a>
                    </li>
                    <li>Page active</li>
                </ul>
            </div>
        </div>
        <!-- End Position -->


        <div class="collapse" id="collapseMap">
            <div id="map" class="map"></div>
        </div>
        <!-- End Map -->
        @if (session('succes') !== null)

            <div id="cart" class="alert form-control text-white text-white  position-absolute rounded-pill ">

                <div class="car  d-flex justify-content-center align-items-center ">
                    <i class="caty far fa-check-circle" style="margin-left: 10px ; font-size:40px ;color:rgb(31, 223, 31)"></i>
                    <h5 class="cartt">{{ session('succes') }}</h5>
                </div>

           </div>

        @endif
        <div class="container margin_60">
            <div class="row">
                <div class="col-lg-8    " id="single_tour_desc">
                    <div id="single_tour_feat">
                        <ul>
                            <li>
                                <div class=" text-center mt-auto" style="font-size: 15px">
                                    <i class="fas fa-camera" style="font-size:15px"></i>
                                    <p style="font-size: 15px" class=" lead mt-2">مسموح التصوير </p>
                                </div>
                            </li>

                            <li>
                                <div class=" text-center mt-auto">
                                    <i class="fas fa-hotdog" style="font-size:15px"></i>
                                    <p style="font-size: 15px" class=" lead mt-2">متاح الطعام</p>
                                </div>
                            </li>

                            <li>
                                <div class=" text-center mt-auto">
                                    <i class="fas fa-id-card" style="font-size:15px"></i>
                                    <p style="font-size: 15px" class=" lead mt-2">مطلوب الهوية</p>
                                </div>
                            </li>


                            <li>
                                <div class=" text-center mt-auto">
                                    <i class="fas fa-car" style="font-size:15px"></i>
                                    <p style="font-size: 15px" class=" lead mt-2">الموصلات متاحة</p>
                                </div>
                            </li>

                            {{-- <li>
                        <div class=" text-center mt-auto">
                            <i class="fas fa-chair" style="font-size:20px"></i>
                            <p class=" lead mt-2"> المقاعد متاحة </p>
                        </div>
                       </li> --}}

                            <li>
                                <div class=" text-center mt-auto">
                                    <i class="fas fa-people-arrows" style="font-size:15px"></i>
                                    <p style="font-size: 15px" class=" lead mt-2"> مرشد سياحى </p>
                                </div>
                            </li>
                            <li>
                                <div class=" text-center mt-auto">
                                    <i class="fas fa-user-shield" style="font-size:15px"></i>
                                    <p style="font-size: 15px" class=" lead mr-2 mt-2"> السلامة العامة </p>
                                </div>
                            </li>
                        </ul>
                    </div>


                    <div class=" row m-auto text-center">
                        <img width="300px" alt="Image" class="sp-thumbnail mr-1"
                            src="{{ asset("uploads/$Ticket->image2") }}">
                        <img width="300px" alt="Image" class="sp-thumbnail" src="{{ asset("uploads/$Ticket->image3") }}">
                    </div>


                    <hr>

                    <div class="row">
                        <div class="col-lg-3">
                            <h3>Description</h3>
                        </div>
                        <div class="col-lg-9">
                            <p>
                                {{ $Ticket->desc }}
                            </p>
                            <h4>التفاصيل</h4>
                            <p>
                                {{ $Ticket->information }} </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list_ok">
                                        <li>
                                            <p class="lead" style="font-size: 15px">التصنيف : <a
                                                    href="{{ url("Category/{$Ticket->id}") }}"><span
                                                        style="font-size: 17px" class="mx-1"> {{ $Ticket->Category->name }}
                                                    </span> </a></p>
                                        </li>
                                        <li>
                                            <p class="lead" style="font-size: 15px">المدينة : <a
                                                    href="{{ url("City/{$Ticket->id}") }}"><span style="font-size: 17px"
                                                        class="mx-1"> {{ $Ticket->city->name }} </span> </a></p>
                                        </li>
                                        <li>
                                            <p class="lead" style="font-size: 15px">التاريخ : <span style="font-size: 17px"
                                                    class="mx-1"> {{ $Ticket->date_party }} </span> </p>
                                        </li>

                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list_ok">
                                        <li>
                                            <p class="lead" style="font-size: 15px">العمر المسموح : <span
                                                    style="font-size: 17px" class="mx-1"> {{ $Ticket->age }} </span> </p>
                                        </li>
                                        <li>
                                            <p class="lead" style="font-size: 15px">الوقت : <span style="font-size: 17px"
                                                    class="mx-1"> {{ $Ticket->hour_party }} </span> </p>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <!-- End row  -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <h3>Reviews </h3>
                        </div>
                        <div class="col-lg-9">
                            <div id="general_rating">{{ $Comments->count() }} Reviews

                            </div>

                            <hr>

                            @foreach ($Comments as $Comment)

                                <div class="review_strip_single last">
                                    <img src="{{ asset('uploads/comment.jpg') }}" alt="Image"
                                        class="rounded-circle  img-fluid" width="60px">
                                    <small>{{ $Comment->created_at }}</small>
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <p>
                                        {{ $Comment->comment }} </p>
                                    <div class="rating">
                                        <i class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                            class="icon-smile voted"></i><i class="icon-smile voted"></i><i
                                            class="icon-smile voted"></i>
                                    </div>
                                </div>


                            @endforeach
                            <hr>

                            {{-- <div class="box_style_1 expose">
                            <h3 class="inner">- Booking -</h3>
                            <form action="{{url('comment')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>quantity</label>

                                    <div>
                                        <input type="test" value="{{$Ticket->id}}" id="adults" class=" form-control" name="ticket_id">
                                    </div>

                                    <div>
                                        <input type="test"  id="adults" class=" form-control" name="comment">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                            <br>
                        </div> --}}


                            <div class="review_strip_single last">
                                <div class="col-md-12">
                                    <div class="form_title">
                                        <h3><strong><i class="icon-pencil"></i></strong>Fill the form below</h3>
                                        <p>
                                            Mussum ipsum cacilds, vidis litro abertis.
                                        </p>
                                    </div>
                                    <div class="step">

                                        <div id="message-contact"></div>
                                        <form action="{{ url('comment') }}" method="POST" id="contactform">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Message</label>
                                                        <textarea rows="5" id="message_contact" name="comment"
                                                            class="form-control" placeholder="Write your comment"
                                                            style="height:200px;"></textarea>
                                                        <input type="hidden" value="{{ $Ticket->id }}" id="adults"
                                                            class=" form-control" name="ticket_id">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End review strip -->
                        </div>
                    </div>
                </div>
                <!--End  single_tour_desc-->

                <aside class="col-lg-4">

                    <div class="box_style_1 expose">
                        <h3 class="inner">- Booking -</h3>
                        <form action="{{ url('requestTicket') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>عدد التذاكر المطلوبة :</label>
                                <div class="numbers-row">
                                    <input type="text" value="1" id="adults" class="qty2 form-control btn_full" name="qty">
                                </div>
                                <div>
                                    <input type="hidden" value="{{ $Ticket->id }}" id="adults"
                                        class=" form-control btn_full" name="ticket_id">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn_full">Submit</button>
                        </form>

                        <br>
                        <table class="table table_summary">
                            <tbody>


                                <tr class="total">

                                    {{-- {{dump($order ?? 0)}} --}}
                                    {{-- @php
                                    $total =  $order->qty?? 0 * $Ticket->price
                                    echo $total
                                @endphp --}}



                                </tr>
                            </tbody>
                        </table>
                    </div>
























                    {{-- <div class="box_style_1 expose">
                    <h3 class="inner">- Booking -</h3>
                    <form action="{{url('comment')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>quantity</label>

                            <div>
                                <input type="test" value="{{$Ticket->id}}" id="adults" class=" form-control" name="ticket_id">
                            </div>

                            <div>
                                <input type="test"  id="adults" class=" form-control" name="comment">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <br>
                </div> --}}





















                    <!--/box_style_1 -->

                    <div class="box_style_4">
                        <i class="icon_set_1_icon-90"></i>
                        <h4><span>Book</span> by phone</h4>
                        <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                        <small>Monday to Friday 9.00am - 7.30pm</small>
                    </div>

                </aside>
            </div>
            <!--End row -->
        </div>
        <!--End container -->

        <div id="overlay"></div>
        <!-- Mask on input focus -->



    </main>
    <!-- End main -->
@endsection
