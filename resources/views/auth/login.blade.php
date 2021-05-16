@extends('layoutcity')
@section('city')
    <main>
        <section id="" class="login">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8">
                        <div id="login">
                            <div class="text-center"><img src="img/logo_sticky.png" alt="Image" data-retina="true"></div>
                            <hr>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $err)
                                        <p>{{ $err }}</p>
                                    @endforeach
                                </div>
                            @endif
                            <form method="POST" action="{{ url('/login') }}">
                                @csrf

                                <input class="input form-control my-3" type="email" name="email" style="text-align: right"
                                    placeholder="الاميل">

                                <input class="input form-control my-3" type="password" name="password"
                                    style="text-align: right" placeholder="كلمة المرور">

                                    <input type="checkbox" class=" mb-3" name="remember" id=""> تذكرنى



                                <br>
                                <button type="submit" class="btn_full">تسجيل</button>
                                <p class="lead text-center"> سجل دخولك اول مرة من <span><a
                                            href="{{ url('/register') }}">هنا</a> </span> </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End main -->
@endsection
