@extends('admin.main-layout')

@section('title') المدن @endsection

@section('css')

    <link rel="stylesheet" href="{{asset('admin/assets')}}/js/plugins/datatables/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{asset('admin/assets')}}/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">
    <link href="https://nightly.datatables.net/select/css/select.dataTables.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{asset('admin/assets')}}/js/plugins/select2/css/select2.min.css">

@endsection

@section('content')

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">  المدن </h3>
                <div class="block-options">
                    <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                            data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                    <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option" data-action="state_toggle"
                            data-action-mode="demo">
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
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <button type="button"
                                class="btn btn-outline-success mr-1 mb-3 btn-sm"
                                data-toggle="modal"
                                data-target="#modal-add">
                            <i class="fa fa-fw fa-plus mr-1"></i>
                            {{ __('global.add') }}
                        </button>
                        <!-- Add modal -->
                        @include('admin.cities.inc.add_modal')
                    </div>
                    <div class="col-sm-12 col-md-6 d-flex">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped table-vcenter js-dataTable-buttons dataTable no-footer"
                           id="DataTables_products" role="grid" aria-describedby="DataTables_Table_1_info">
                        <thead style="font-size: 0.7rem">
                        <tr>
                          <th style="width: 2%">#</th>
                          <th style="width: 10%">الصورة </th>
                          <th class="text-center">اسم المدينة</th>
                          <th class="text-center">الوصف</th>
                          <th class="text-center">تاريخ الإضافة</th>
                          <th class="text-center">الإجراءات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($cities as $index => $city)
                        <tr>
                          <td class="text-center" style="width: 2%">{{$index+1}}</td>
                          <td class="text-center"><img src="{{asset('uploads')}}/{{$city->image}}" alt="{{$city->name}}" style="height: 50px; margin:auto"></td>
                          <td class="text-center">{{$city->name}}</td>
                          <td class="text-center" style="width:40%">{{strlen(utf8_decode($city->desc)) >= 70 ? mb_substr($city->desc, 0, 70,'utf-8').'...': $city->desc}}</td>
                          <td class="text-center">{{ $city->created_at->format('Y-m-d') }}</td>
                          <td class="text-center">
                            <div class="btn-group">
                              <a href="{{route('cities.edit', $city->id)}}" type="button" class="btn-right btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip"  title="تعديل" data-original-title="Edit">
                                <i class="fa fa-pencil-alt"></i>
                              </a>
                                <!-- Delete-->
                                <button type="button" class="btn btn-left btn-sm btn-primary js-tooltip-enabled"
                                        title="حذف" data-original-title="delete" data-toggle="modal"
                                        data-target="#modal-cat-delete{{$city->id}}">
                                  <i class="fa fa-times"></i>
                                </button>

                                <!-- Delete Modal -->
                              @include('admin.cities.inc.del-modal')
                            </div>
                          </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('admin/assets')}}/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/plugins/datatables/buttons/dataTables.buttons.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/plugins/datatables/buttons/buttons.print.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/plugins/datatables/buttons/buttons.html5.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/plugins/datatables/buttons/buttons.flash.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/plugins/datatables/buttons/buttons.colVis.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <link rel="stylesheet" href="{{asset('admin/assets')}}/js/plugins/dropzone/dist/min/dropzone.min.css">


    <!-- Page JS Code -->
    <script src="{{asset('admin/assets')}}/_js/pages/be_tables_datatables.js"></script>
{{--    <script src="https://nightly.datatables.net/select/js/dataTables.select.js"></script>--}}
    <script src="{{asset('admin/assets')}}/js/plugins/dropzone/dropzone.min.js"></script>



    <script>
        $('#desc-maxlength150').maxlength({
            threshold: 150
        });
        $('.dropify').dropify({
            messages: {
                'default': '',
                'replace': 'اضغط للتبديل او اسحب صورة',
                'remove':  'حذف',
                'error':   'يوجد خطأ حدث'
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
        // Override a few default classes
        jQuery.extend(jQuery.fn.dataTable.ext.classes, {
            sWrapper: "dataTables_wrapper dt-bootstrap4",
            sFilterInput: "form-control unset w-100",
            sLengthSelect: "form-control unset"
        });


    //languages
        jQuery.extend(true, jQuery.fn.dataTable.defaults, {
            language: {
                "emptyTable": "ليست هناك بيانات متاحة في الجدول",
                "loadingRecords": "جارٍ التحميل...",
                "processing": "جارٍ التحميل...",
                "lengthMenu": "أظهر _MENU_ مدخلات",
                "zeroRecords": "لم يعثر على أية سجلات",
                "info": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "infoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "infoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "search": "",
                "paginate": {
                    "first": "الأول",
                    "previous": "السابق",
                    "next": "التالي",
                    "last": "الأخير"
                },
                "aria": {
                    "sortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                    "sortDescending": ": تفعيل لترتيب العمود تنازلياً"
                },
                "select": {
                    "rows": {
                        "_": "%d قيمة محددة",
                        "0": "",
                        "1": "1 قيمة محددة"
                    },
                    "1": "%d سطر محدد",
                    "_": "%d أسطر محددة",
                    "cells": {
                        "1": "1 خلية محددة",
                        "_": "%d خلايا محددة"
                    },
                    "columns": {
                        "1": "1 عمود محدد",
                        "_": "%d أعمدة محددة"
                    }
                },
                "buttons": {
                    "print": "طباعة",
                    "copyKeys": "زر <i>ctrl<\/i> أو <i>⌘<\/i> + <i>C<\/i> من الجدول<br>ليتم نسخها إلى الحافظة<br><br>للإلغاء اضغط على الرسالة أو اضغط على زر الخروج.",
                    "copySuccess": {
                        "_": "%d قيمة نسخت",
                        "1": "1 قيمة نسخت"
                    },
                    "pageLength": {
                        "-1": "اظهار الكل",
                        "_": "إظهار %d أسطر"
                    },
                    "collection": "مجموعة",
                    "copy": "نسخ",
                    "copyTitle": "نسخ إلى الحافظة",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pdf": "PDF",
                    "colvis": "إظهار الأعمدة",
                    "colvisRestore": "إستعادة العرض"
                },
                "autoFill": {
                    "cancel": "إلغاء",
                    "info": "مثال عن الملئ التلقائي",
                    "fill": "املأ جميع الحقول بـ <i>%d&lt;\\\/i&gt;<\/i>",
                    "fillHorizontal": "تعبئة الحقول أفقيًا",
                    "fillVertical": "تعبئة الحقول عموديا"
                },
                "searchBuilder": {
                    "add": "اضافة شرط",
                    "clearAll": "ازالة الكل",
                    "condition": "الشرط",
                    "data": "المعلومة",
                    "logicAnd": "و",
                    "logicOr": "أو",
                    "title": [
                        "منشئ البحث"
                    ],
                    "value": "القيمة",
                    "conditions": {
                        "date": {
                            "after": "بعد",
                            "before": "قبل",
                            "between": "بين",
                            "empty": "فارغ",
                            "equals": "تساوي",
                            "not": "ليس",
                            "notBetween": "ليست بين",
                            "notEmpty": "ليست فارغة"
                        },
                        "number": {
                            "between": "بين",
                            "empty": "فارغة",
                            "equals": "تساوي",
                            "gt": "أكبر من",
                            "gte": "أكبر وتساوي",
                            "lt": "أقل من",
                            "lte": "أقل وتساوي",
                            "not": "ليست",
                            "notBetween": "ليست بين",
                            "notEmpty": "ليست فارغة"
                        },
                        "string": {
                            "contains": "يحتوي",
                            "empty": "فاغ",
                            "endsWith": "ينتهي ب",
                            "equals": "يساوي",
                            "not": "ليست",
                            "notEmpty": "ليست فارغة",
                            "startsWith": " تبدأ بـ "
                        }
                    },
                    "button": {
                        "0": "فلاتر البحث",
                        "_": "فلاتر البحث (%d)"
                    },
                    "deleteTitle": "حذف فلاتر"
                },
                "searchPanes": {
                    "clearMessage": "ازالة الكل",
                    "collapse": {
                        "0": "بحث",
                        "_": "بحث (%d)"
                    },
                    "count": "عدد",
                    "countFiltered": "عدد المفلتر",
                    "loadMessage": "جارِ التحميل ...",
                    "title": "الفلاتر النشطة"
                },
                "searchPlaceholder": "البحث ..."

            }
        });

        jQuery('.js-dataTable-buttons').dataTable({
            //paging:   false,
            //info:     false,
            pageLength: 10,
            lengthMenu: [[ 10, 20, 50], [10, 20, 50]],
            autoWidth: false,
            buttons: [

            ],

            dom: "<'row'<'col-sm-12'<'text-center py-2 mb-2'B>>>" +
                "<'row'<'col-sm-12 col-md-6'f><'col-sm-12 col-md-6 text-left'l>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"
        });

    </script>

@endsection


