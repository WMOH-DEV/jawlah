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
                            <form method="POST" action="{{ url('/register') }}">
                                @csrf



                                <input class="input form-control my-3 " type="text" style="text-align: right" name="name"
                                    placeholder="الاسم">
                                <input class="input form-control my-3" type="email" name="email" style="text-align: right"
                                    placeholder="الاميل">
                                <input class="input form-control my-3 " type="text" style="text-align: right" name="phone"
                                    placeholder="التليفون">

                                <input class="input form-control my-3" type="password" name="password"
                                    style="text-align: right" placeholder="كلمة المرور">
                                <input class="input form-control my-3" type="password" name="password_confirmation"
                                    style="text-align: right" placeholder="تاكيد كلمة المرور">

                                <div class="form-group col-md-12 d-flex " for="role_id">

                                    <select name="role_id" required class="form-control w-100">
                                        <option value="1">مستخدم</option>
                                        <option value="2">التاجر</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn_full">تسجيل</button>
                               


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End main -->
@endsection
