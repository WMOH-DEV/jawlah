@extends('admin.main-layout')

@section('title')تعديل {{$user->name}}@endsection


@section('content')

    <div class="content">

        <!-- Block Tabs Animated Slide Right -->
        <div class="block block-rounded">
            <ul class="nav nav-tabs nav-tabs-block justify-content-end align-items-center" data-toggle="tabs"
                role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#main-info">بيانات الأساسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pass">كلمة المرور</a>
                </li>
                <li class="nav-item mr-auto">
                    <div class="block-options pl-2 pr-3">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                            <i class="si si-close"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="content_toggle"></button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option" data-toggle="block-option"
                                data-action="fullscreen_toggle"></button>
                    </div>
                </li>
            </ul>
            <div class="block-content tab-content overflow-hidden">
                <!-- info -->
                <div class="tab-pane fade fade-right show active" id="main-info" role="tabpanel">
                    <form action="{{route('adminProfile.info')}}" method="post">
                        @csrf
                        @method('put')
                    <div class="row">
                        <div class="col-sm-12  d-flex flex-row-reverse">
                            <a href="{{route('admincp.index')}}" type="button" class="btn btn-alt-secondary mr-1 mb-3">
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

                    <!-- User Profile -->
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-user-circle text-muted mr-1"></i> تعديل الملف الشخصي
                    </h2>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                تعديل بيانات الحساب العامة
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="form-group">
                                <label for="dm-profile-edit-name">اسم المستخدم</label>
                                <input type="text" class="form-control" id="dm-profile-edit-name"
                                       name="name" placeholder="ادخل اسم المستخدم .."
                                       value="{{$user->name}}">
                            </div>

                            <div class="form-group">
                                <label for="dm-profile-edit-email">البريد الإلكتروني</label>
                                <input type="email" class="form-control" id="dm-profile-edit-email"
                                       name="email" placeholder="ادخل البريد الإلكتروني"
                                       value="{{$user->email}}">
                            </div>


                            <div class="form-group">
                                <label for="dm-profile-edit-phone">الهاتف</label>
                                <input type="text" class="form-control" id="dm-profile-edit-phone" name="phone"
                                       placeholder="أدخل رقم الهاتف .." value="{{$user->phone}}">
                            </div>
                        </div>
                    </div>
                    <!-- END User Profile -->
                    </form>
                </div>

                <!-- password -->
                <div class="tab-pane fade fade-right" id="pass" role="tabpanel">
                    <form action="{{route('adminProfile.password')}}" method="post">
                        @csrf
                        @method('put')
                    <div class="row">
                        <div class="col-sm-12  d-flex flex-row-reverse">
                            <a href="{{route('orders.index')}}" type="button" class="btn btn-alt-secondary mr-1 mb-3">
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

                    <!-- Change Password -->
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-asterisk text-muted mr-1"></i> كلمة المرور
                    </h2>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                تغير كلمة المرور ، يجب ان تحتوي على أكثر من ثمان حروف او ارقام
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="form-group">
                                <label for="dm-profile-edit-password">كلمة المرور الحالية</label>
                                <input type="password" class="form-control" id="dm-profile-edit-password"
                                       name="old_password">
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="dm-profile-edit-password-new">كلمة المرور الجديدة</label>
                                    <input type="password" class="form-control" id="dm-profile-edit-password-new"
                                           name="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="dm-profile-edit-password-new-confirm">إعادة كلمة المرور</label>
                                    <input type="password" class="form-control"
                                           id="dm-profile-edit-password-new-confirm" name="password_confirmation">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Change Password -->
                    </form>

                </div>

            </div>
        </div>
    </div>
    <!-- END Block Tabs Animated Slide Right -->
@endsection




@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets') }}/js/plugins/select2/css/select2.min.css">

@endsection

@section('js')
    <script src="{{ asset('admin/assets') }}/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/ar.min.js"></script>

    <script>
        jQuery(function () {
            $(".js-select2").select2({
                dir: "rtl",
                width: "100%",
                placeholder: "إختيار من متعدد",
            });
        })

    </script>

@endsection

