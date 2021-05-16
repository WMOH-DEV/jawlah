@extends('layoutcity')
@section('city')


    <section class="parallax-window" data-parallax="scroll" data-image-src="{{ asset('uploads/images.jpg') }}"
        data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-1">
            <div class="animated fadeInDown">


                <h1>عمل تذكرة</h1>

            </div>
        </div>
    </section>



    <main>

        {{-- @foreach ($shahads as $shahad) --}}

        <div id="position">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a>
                    </li>
                    <li><a href="#">Category</a>
                    </li>
                    <li>Page active</li>
                </ul>
            </div>
        </div>
        <!-- End Position -->

        <div class=" container my-4">
            <form method="POST" action="{{ url('createticket') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault01">اسم التذكرة</label>
                        <input type="text" class="form-control" id="validationDefault01" name="name" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault02">معلومات التذكرة</label>
                        <input type="text" class="form-control" id="validationDefault02" name="information"
                            required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault02">تاريخ التذكرة</label>
                        <input type="date" name="date_party" class="form-control" id="validationDefault02"
                            required>
                    </div>
                </div>


                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationDefault01">وقت التذكرة</label>
                        <input type="text" class="form-control" name="hour_party" id="validationDefault01" name="name"
                            required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationDefault02">سعر التذكرة</label>
                        <input type="number" class="form-control" id="validationDefault02" name="price_without_vat"
                            required>
                    </div>


                    <div class="col-md-3 mb-3">
                        <label for="validationDefault02">العدد المتاح التذكرة</label>
                        <input type="number" class="form-control" id="validationDefault02" name="qty"  required>
                    </div>


                    <div class="col-md-3 mb-3">
                        <label for="validationDefault02">وصف التذكرة</label>
                        <input type="text" name="desc" class="form-control" id="validationDefault02"  required>
                    </div>
                </div>


                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationDefault01">الصورة الاساسية للتذكرة</label>
                        <input type="file" name="image" class="form-control" id="validationDefault01" name="name"
                             required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationDefault02">صورة للتذكرة 2</label>
                        <input type="file" name="image2" class="form-control" id="validationDefault02" name="information"
                             required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationDefault02">صورة للتذكرة 3</label>
                        <input type="file" name="image3" name="date_party" class="form-control" id="validationDefault02"
                            required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationDefault02">صورة للتذكرة 4</label>
                        <input type="file" name="image4" name="date_party" class="form-control" id="validationDefault02"
                            required>
                    </div>
                </div>




                <div class="form-row">

                    <div class="col-md-4 mb-3">
                        <label for="age">العمر المسموح</label>
                        <select class="custom-select" name="age" id="age" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="بالغين">بالغين</option>
                            <option value="أطفال">أطفال</option>
                        </select>
                    </div>


                    <div class="col-md-4 mb-3">
                        <label for="city_id">المدينة</label>
                        <select class="custom-select" name="city_id" id="city_id" required>
                            <option selected disabled value="">Choose...</option>
                            @foreach ($City as $Cit)
                                <option value="{{ $Cit->id }}">{{ $Cit->name }}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="col-md-4 mb-3">
                        <label for="category_id">تصنيف التذكرة</label>
                        <select class="custom-select" name="category_id" id="category_id" required>
                            <option selected disabled value="">Choose...</option>
                            @foreach ($Category as $Categor)
                                <option value="{{ $Categor->id }}">{{ $Categor->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>



                <input class="input form-control my-3" type="hidden" value="{{ Auth::user()->id }}" name="user_id"
                    style="text-align: right" placeholder="صورة  للتذكرة">





                <button class="btn btn-primary" type="submit">Submit form</button>

            </form>


        </div>









        <div>
            <p style="color: white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Atque consequatur unde soluta
                obcaecati modi quibusdam quisquam magni dicta commodi voluptatibus libero, cupiditate labore ipsa earum ad.
            <p style="color: white">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Atque consequatur unde soluta
                Dolore esse architecto ratione.</p>

        </div>
    </main>
@endsection



{{-- @foreach ($shahads as $shahad)
    <h2>{{$shahad->ticket->name}}</h2>
@endforeach --}}
