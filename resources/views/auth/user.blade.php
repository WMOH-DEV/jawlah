@extends('layoutcity')
@section('city')


    <section class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('uploads/user.jpg') }}"
        data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">


                <h1>اهلا بيك {{ Auth::user()->name }}</h1>

            </div>
        </div>
    </section>



    <main>

        {{-- @foreach ($shahads as $shahad) --}}

        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="/">Home</a>
                    </li>

                    <li>Page active</li>
                </ul>
            </div>
        </div>
        <!-- End Position -->





        <div class=" container mx-5" style="margin-top: 150px">

            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                            aria-controls="v-pills-home" aria-selected="true">
                            <h5 class=" text-center mt-2"> <i class="fas fa-ticket-alt"></i> الطلبات السابقة</h5>
                        </a>



                        @if (Auth::user()->role_id == 2)
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
                            aria-controls="v-pills-settings" aria-selected="false">  <h5 class=" text-center mt-2"> <i class="fas fa-ticket-alt"></i> التذاكر القديمة</h5></a>
                            @endif







                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                            aria-controls="v-pills-profile" aria-selected="false">
                            <h5 class=" text-center mt-2"> <i class="fas fa-user"></i> التفاصيل</h5>
                        </a>




                    </div>
                </div>
                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">التذكرة</th>
                                        <th scope="col">الحالة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shahads as $shahad)
                                        <tr>
                                            <td> {{ $shahad->ticket->name }}</td>
                                            <td>{{ $shahad->admin_status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>




                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">اسم التذكرة</th>
                                   
                                    <th scope="col">التعديل تذكرة</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr style="margin: 30px">
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <td > {{ $ticket->name }}</td>
                                           
                                            @if (Auth::user()->role_id == 2)
                                            <td><a href="{{ url("edit/{$ticket->id}") }}" class=" btn btn-success">التعديل تذكرة</a>
                                            </td>


                                        @endif                                        </tr>
                                    @endforeach
                                  </tr>

                                </tbody>
                              </table>

                        </div>





                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">



                            <ul style="list-style-type: none">
                                <li> <span class=" lead">الاسم : </span> <span class=" lead ">{{ Auth::user()->name }}</span></li>
                              <hr>
                                <li> <span class=" lead">الاميل : </span> <span class=" lead">{{ Auth::user()->email }}</span></li>
                                <hr>

                                <li> <span class=" lead">الهاتف : </span> <span class=" lead">{{ Auth::user()->phone }}</span></li>
                                <hr>

                                <li> <span class=" lead">المستخدم : </span> <span class=" lead">{{ Auth::user()->role->name }}</span></li>
                                <hr>

                                @if (Auth::user()->role_id == 2)   <li> <span class=" lead p-0"> </span> <span class=" lead">  @if (Auth::user()->role_id == 2)
                                
                            
                            
                                    <a href="{{ url('storeticket') }}" class=" btn  btn-success">عمل تذكرة</a>
                            
                                    @endif

                                </span></li>  @endif
                            </ul>
                            {{-- <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">الاسم</th>
                                        <th scope="col">الاميل</th>
                                        <th scope="col">الهاتف</th>
                                        <th scope="col">المستخدم</th>
                                        @if (Auth::user()->role_id == 2)
                                            <th scope="col">create</th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>

                                  
                                    <tr>
                                        <td>{{ Auth::user()->name }}</td>
                                        <td>{{ Auth::user()->email }}</td>
                                        <td>{{ Auth::user()->phone }}</td>
                                        <td>{{ Auth::user()->role->name }}</td>
                                        @if (Auth::user()->role_id == 2)
                                            <td><a href="{{ url('storeticket') }}" class=" btn btn-primary">عمل تذكرة</a>
                                            </td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table> --}}
                        </div>

                    </div>
                </div>
            </div>

        </div>


        <div>
            <p style="color: white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Atque consequatur unde soluta
                obcaecati modi quibusdam quisquam magni dicta commodi voluptatibus libero, cupiditate labore ipsa earum ad.
                Dolore esse architecto ratione.</p>
            <p style="color: white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Atque consequatur unde soluta
                obcaecati modi quibusdam quisquam magni dicta commodi voluptatibus libero, cupiditate labore ipsa earum ad.
                Dolore esse architecto ratione.</p>

        </div>
    </main>
@endsection



{{-- @foreach ($shahads as $shahad)
    <h2>{{$shahad->ticket->name}}</h2>
@endforeach --}}
