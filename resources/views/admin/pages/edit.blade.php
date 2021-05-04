@extends('admin.main-layout')

@section('title')  تعديل {{ $page->name }} @endsection

@section('content')

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title"> تعديل {{ $page->name }} </h3>
                <div class="block-options">
                    <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                            data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                    <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                            data-action="state_toggle"
                            data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                            data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                    <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                            data-action="close">
                        <i class="si si-close"></i>
                    </button>
                </div>
            </div>

            <div class="block-content block-content-full">

                <form action="{{route('pages.update', $page->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-sm-12  d-flex ">
                            <a href="{{route('pages.index')}}" type="button" class="btn btn-alt-secondary mr-1 mb-3">
                                <i class="far fa-arrow-alt-circle-right opacity-50-b mr-1"></i>
                                رجوع
                            </a>
                            <button type="submit"
                                    class="btn btn-alt-info mr-1 mb-3">
                                <i class="far fa-save opacity-50 mr-1"></i>
                                حفظ
                            </button>
                        </div>
                    </div>
                    <!-- Page form -->
                    <div class="row">
                        <div class="table-responsive col-12">
                            <table class="table table-bordered table-striped table-vcenter no-footer">
                                <tbody>

                                <!-- Name -->
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 30%">
                                        <label for="name">
                                            اسم الصفحة
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <input class="form-control @error('name') is-invalid @enderror unset"
                                               name="name" type="text"
                                               value="{{$page->name}}"
                                               id="name" placeholder="عنوان الصفحة">
                                    </td>
                                </tr>

                                <!-- Description -->
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        <label for="desc">
                                           الوصف
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <textarea class="js-summernote @error('desc') is-invalid @enderror" id="desc" name="desc">{{ $page->desc }}</textarea>
                                    </td>
                                </tr>

                                <!-- content  -->
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 20%">
                                        <label for="content">
                                           المحتوى
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <textarea class="js-summernote2" id="content" name="content">{{$page->content}}</textarea>
                                    </td>
                                </tr>

                                <!-- image  -->
                                <tr style="font-size: 0.9rem">
                                    <th scope="row" style="width: 30%">
                                        <label for="image">
                                           صورة الصفحة
                                        </label>
                                    </th>
                                    <td class="font-w600">
                                        <div class="row">
                                            <div class="col-8">
                                                <input type="file" name="image"
                                                       class="form-group dropify"
                                                       data-max-file-size="1M"
                                                       data-height="70">
                                                <span class="text-danger" style="font-size: 0.7rem">الحجم المسموح هو 1024 كيلوبايت -  JPG أو PNG</span>
                                            </div>
                                            <div class="col-4">
                                                <img src="{{asset("uploads/$page->image")}}" alt="{{$page->name}}">
                                            </div>
                                        </div>
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
    <link rel="stylesheet" href="{{asset('admin/assets')}}/js/plugins/summernote/summernote-bs4.css">


@endsection

@section('js')
    <script src="{{asset('admin/assets')}}/js/plugins/summernote/summernote-bs4.min.js"></script>


    <script>

            jQuery(function () {
                Dashmix.helpers([
                    'flatpickr',
                    'datepicker',
                    'summernote',
                    // 'maxlength',
                ]);
            });

        $('.js-summernote').summernote({
            height: 100,   //set editable area's height
        });

        $('.js-summernote2').summernote({
            height: 250,   //set editable area's height
        });


    jQuery(() => {

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
