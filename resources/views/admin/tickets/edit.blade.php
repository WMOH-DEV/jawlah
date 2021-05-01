@extends('admin.main-layout')

@section('title') تعديل تذكرة {{ $ticket->name }}@endsection

@section('content')

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title"> تعديل تذكرة {{ $ticket->name }} </h3>
                <div class="block-options">
                    <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                        data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                    <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                        data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                        data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                    <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option" data-action="close">
                        <i class="si si-close"></i>
                    </button>
                </div>
            </div>

            <div class="block-content block-content-full">

                <form action="{{ route('tickets.update', $ticket->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-sm-12  d-flex ">
                            <a href="{{ route('tickets.index') }}" type="button" class="btn btn-alt-secondary mr-1 mb-3">
                                <i class="far fa-arrow-alt-circle-right opacity-50-b mr-1"></i>
                                رجوع
                            </a>
                            <button type="submit" class="btn btn-alt-info mr-1 mb-3">
                                <i class="far fa-save opacity-50 mr-1"></i>
                                حفظ
                            </button>
                        </div>
                    </div>

                    <!-- infos -->
                    <div class="row">
                        <!-- right -->
                        <div class="table-responsive col-12 col-md-6">
                            <table class="table table-bordered table-striped table-vcenter no-footer">
                                <tbody>
                                    <!-- Name -->
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row" style="width: 30%">
                                            <label for="name">
                                                اسم النشاط
                                            </label>
                                        </th>
                                        <td class="font-w600">
                                            <input class="form-control @error('name') is-invalid @enderror unset"
                                                name="name" type="text" value="{{ $ticket->name }}" id="name"
                                                placeholder="اسم النشاط الجديد">
                                        </td>
                                    </tr>

                                    <!-- categories-->
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row">
                                            <label for="category_id">
                                                الفئة
                                            </label>
                                        </th>
                                        <td class="font-w600">
                                            <select name="category_id" id="category_id"
                                                class="js-select2 form-control @error('category_id') is-invalid @enderror js-select2-enabled">
                                                <option></option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if ($ticket->category_id === $category->id) selected @endif>{{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>

                                    <!-- Cities-->
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row">
                                            <label for="city_id">
                                                المدينة
                                            </label>
                                        </th>
                                        <td class="font-w600">
                                            <select name="city_id" id="city_id"
                                                class="js-select2 form-control @error('city_id') is-invalid @enderror js-select2-enabled">
                                                <option></option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}" @if ($ticket->city_id === $city->id) selected @endif>{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>

                                    <!-- audience-->
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row">
                                            <label for="age">
                                                الجمهور
                                            </label>
                                        </th>
                                        <td class="font-w600">
                                            <select name="age" id="age" class="js-select2 form-control js-select2-enabled">
                                                <option value="بالغين" @if ($ticket->age === 'بالغين') selected @endif>بالغين</option>
                                                <option value="أطفال" @if ($ticket->age === 'أطفال') selected @endif>أطفال</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <!-- price-->
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row">
                                            <label for="price_without_vat">
                                                السعر بدون ضريبة
                                            </label>
                                        </th>
                                        <td class="font-w600">
                                            <div class="row align-items-center">
                                                <div class="col-8">
                                                    <input class="form-control @error('price_without_vat') is-invalid @enderror unset"
                                                        name="price_without_vat" type="text" value="{{ $ticket->price_without_vat }}" id="price_without_vat"
                                                        placeholder="00,00">
                                                </div>
                                                <div class="col-4">
                                                    <span>ريال سعودي</span>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- left -->
                        <div class="table-responsive col-12 col-md-6">
                            <table class="table table-bordered table-striped table-vcenter no-footer">
                                <tbody>
                                    <!-- VAT -->
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row" style="width: 30%">
                                            تطبيق الضريبة
                                        </th>
                                        <td class="font-w600">
                                            <div
                                                class="custom-control custom-switch custom-control-primary custom-control-lg">
                                                <input type="checkbox" class="custom-control-input" id="vat" name="vat" @if ($ticket->vat) checked="" @endif>
                                                <label class="custom-control-label " for="vat"></label>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Date -->
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row" style="width: 30%">
                                            <label for="date_party">
                                                تاريخ النشاط
                                            </label>
                                        </th>
                                        <td class="font-w600">
                                            <input type="text" class="js-flatpickr form-control bg-white" id="date_party"
                                                name="date_party" value="{{ $ticket->date_party }}" placeholder="Y-m-d">
                                        </td>
                                    </tr>

                                    <!-- Hour -->
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row" style="width: 30%">
                                            <label for="hour_party">
                                                موعد النشاط
                                            </label>
                                        </th>
                                        <td class="font-w600">
                                            <input type="text"
                                                class="js-flatpickr  @error('hour_party') hour_party @enderror form-control bg-white"
                                                id="hour_party" name="hour_party" data-enable-time="true"
                                                data-no-calendar="true" placeholder="HH:MM"
                                                value="{{ $ticket->hour_party }}" data-date-format="H:i">
                                        </td>
                                    </tr>

                                    <!-- Qty -->
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row" style="width: 30%">
                                            <label for="qty">
                                                الكمية المتوفرة
                                            </label>
                                        </th>
                                        <td class="font-w600">
                                            <input class="form-control  unset" name="qty" type="number"
                                                value="{{ $ticket->qty }}" id="qty" placeholder="0">
                                        </td>
                                    </tr>

                                    <!-- item images -->
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row" style="width: 30%">
                                            <label for="image">
                                                الصورة الرئيسية
                                            </label>
                                        </th>
                                        <td class="font-w600">
                                            <div class="row">
                                                <div class="col-9">
                                                    <input type="file" name="image" class="form-group dropify"
                                                        data-height="30">
                                                    <span class="text-danger" style="font-size: 0.7rem">اقصى حجم 1024
                                                        كيلوبايت - JPG أو PNG</span>
                                                </div>
                                                <div class="col-3">
                                                    <img src="{{ asset("uploads/$ticket->image") }}"
                                                        alt="{{ $ticket->name }}" style="height: 60px">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- middle -->
                    <div class="row">
                        <div class="table-responsive col-12">
                            <table class="table table-bordered table-striped table-vcenter no-footer">
                                <tbody>
                                    <!-- Description -->
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row" style="width: 20%">
                                            <label for="desc">
                                                وصف النشاط
                                            </label>
                                        </th>
                                        <td class="font-w600">
                                            <textarea class="js-summernote" id="desc"
                                                name="desc">{{ $ticket->desc }}</textarea>
                                        </td>
                                    </tr>

                                    <!-- information -->
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row" style="width: 20%">
                                            <label for="information">
                                                معلومات التذكرة
                                            </label>
                                        </th>
                                        <td class="font-w600">
                                            <textarea class="js-summernote" id="information"
                                                name="information">{{ $ticket->information }}</textarea>
                                        </td>
                                    </tr>

                                    <!-- image 2 -->
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row" style="width: 30%">
                                            <label for="image2">
                                                صورة اضافية للنشاط <span class="font-size-xs">(غير إلزامية)</span>
                                            </label>
                                        </th>
                                        <td class="font-w600">
                                            @if ($ticket->image2)
                                                <div class="row">
                                                    <div class="col-9">
                                                        <input type="file" name="image2" class="form-group dropify"
                                                            data-height="30">
                                                        <span class="text-danger" style="font-size: 0.7rem">أقصى حجم
                                                            1024
                                                            كيلوبايت - JPG أو PNG</span>
                                                    </div>
                                                    <div class="col-3">
                                                        <img src="{{ asset("uploads/$ticket->image2") }}"
                                                            alt="{{ $ticket->name }}" style="height: 60px">
                                                    </div>
                                                </div>
                                            @else
                                                <input type="file" name="image2" class="form-group dropify"
                                                    data-height="30">
                                                <span class="text-danger" style="font-size: 0.7rem">الحجم المسموح هو 1024
                                                    كيلوبايت - JPG أو PNG</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <!-- image 3 -->
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row" style="width: 30%">
                                            <label for="image3">
                                                صورة اضافية للنشاط <span class="font-size-xs">(غير إلزامية)</span>
                                            </label>
                                        </th>
                                        <td class="font-w600">
                                            @if ($ticket->image3)
                                                <div class="row">
                                                    <div class="col-9">
                                                        <input type="file" name="image3" class="form-group dropify"
                                                            data-height="30">
                                                        <span class="text-danger" style="font-size: 0.7rem">أقصى حجم
                                                            1024
                                                            كيلوبايت - JPG أو PNG</span>
                                                    </div>
                                                    <div class="col-3">
                                                        <img src="{{ asset("uploads/$ticket->image3") }}"
                                                            alt="{{ $ticket->name }}" style="height: 60px">
                                                    </div>
                                                </div>
                                            @else
                                                <input type="file" name="image3" class="form-group dropify"
                                                    data-height="30">
                                                <span class="text-danger" style="font-size: 0.7rem">الحجم المسموح هو 1024
                                                    كيلوبايت - JPG أو PNG</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <!-- image 4 -->
                                    <tr style="font-size: 0.9rem">
                                        <th scope="row" style="width: 30%">
                                            <label for="image4">
                                                صورة اضافية للنشاط <span class="font-size-xs">(غير إلزامية)</span>
                                            </label>
                                        </th>
                                        <td class="font-w600">
                                            @if ($ticket->image4)
                                                <div class="row">
                                                    <div class="col-9">
                                                        <input type="file" name="image4" class="form-group dropify"
                                                               data-height="30">
                                                        <span class="text-danger" style="font-size: 0.7rem">أقصى حجم
                                                            1024
                                                            كيلوبايت - JPG أو PNG</span>
                                                    </div>
                                                    <div class="col-3">
                                                        <img src="{{ asset("uploads/$ticket->image4") }}"
                                                             alt="{{ $ticket->name }}" style="height: 60px">
                                                    </div>
                                                </div>
                                            @else
                                                <input type="file" name="image4" class="form-group dropify"
                                                       data-height="30">
                                                <span class="text-danger" style="font-size: 0.7rem">الحجم المسموح هو 1024
                                                    كيلوبايت - JPG أو PNG</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection



@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets') }}/js/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('admin/assets') }}/js/plugins/dropzone/dist/min/dropzone.min.css">
    <link rel="stylesheet" href="{{ asset('admin/assets') }}/js/plugins/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('admin/assets') }}/js/plugins/summernote/summernote-bs4.css">


@endsection

@section('js')
    <script src="{{ asset('admin/assets') }}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/ar.min.js"></script>
    <script src="{{ asset('admin/assets') }}/js/plugins/dropzone/dropzone.min.js"></script>
    <script src="{{ asset('admin/assets') }}/js/plugins/flatpickr/flatpickr.min.js"></script>
    <script src="{{ asset('admin/assets') }}/js/plugins/summernote/summernote-bs4.min.js"></script>


    <script>
        jQuery(function() {
            Dashmix.helpers([
                'flatpickr',
                'datepicker',
                'summernote',
                // 'maxlength',
            ]);
        });

        $('.js-summernote').summernote({
            height: 100, //set editable area's height
        });


        jQuery(() => {
            $('.js-select2').niceSelect('destroy');
            $(".js-select2").select2({
                dir: "rtl",
                width: "100%",
                placeholder: "إختيار من متعدد",

            });

            $('.dropify').dropify({
                messages: {
                    'default': '',
                    'replace': 'اضغط للتبديل او اسحب صورة',
                    'remove': 'حذف',
                    'error': 'يوجد خطأ حدث'
                },
                error: {
                    'fileSize': 'حجم الملف  @{{ value }}أكبر من الحجم المسموح ',
                    'minWidth': 'عرض الصورة @{{ value }}} صغير جدا',
                    'maxWidth': 'عرض الصورة كبير جدا @{{ value }}}',
                    'minHeight': 'طول الصورة صغير جدا - @{{ value }}}px على الأقل',
                    'maxHeight': 'طول الصورة كبيرة جدا @{{ value }}px على الأقصى',
                    'imageFormat': 'صيغة الصورة  @{{ value }} غير مسموح بها '
                }
            });


        })

    </script>

@endsection
