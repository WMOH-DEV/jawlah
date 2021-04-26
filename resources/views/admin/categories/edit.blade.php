@extends('admin.main-layout')

@section('title')
تعديل {{$cat->name}}
@endsection


@section('content')

  <div class="content">
    <div class="block block-rounded">
      <div class="block-header block-header-default">
        <h3 class="block-title">  تعديل {{$cat->name}} </h3>
        <div class="block-options">
          <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                  data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
          <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                  data-action="pinned_toggle">
            <i class="si si-pin"></i>
          </button>
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
        <form action="{{route('categories.update', $cat->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="row">
            <div class="col-sm-12  d-flex ">
              <a href="{{route('categories.index')}}" type="button" class="btn btn-alt-secondary mr-1 mb-3">
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

          <!-- infos -->
          <div class="row">
            <div class="table-responsive col-12">
              <table class="table table-bordered table-striped table-hover table-vcenter no-footer">
                <tbody>
                <tr style="font-size: 0.9rem">
                  <th scope="row">
                    <label for="name">
                          اسم الفئة
                    </label>
                  </th>
                  <td class="font-w600">
                    <input  class="form-control  unset"
                            name="name" type="text"
                            value="{{$cat->name}}"
                            id="name" placeholder="يكتب اسم الفئة">
                  </td>
                </tr>
                <tr style="font-size: 0.9rem">
                  <th scope="row">
                      <label for="desc-maxlength150">وصف الفئة</label>
                  </th>
                  <td class="font-w600">
                      <textarea type="text"
                                class="form-control unset js-maxlength js-maxlength-enabled"
                                id="desc-maxlength150"
                                rows="3"
                                data-always-show="true"
                                name="desc" placeholder="الوصف هنا ..." maxlength="150">{{ $cat->desc }}</textarea>
                  </td>
                </tr>
                <tr style="font-size: 0.9rem">
                  <th scope="row">
                    <label for="image">
                      صورة الفئة
                    </label>
                  </th>
                  <td class="font-w600">
                    <div class="row">
                      <div class="col-6">
                        <input type="file" name="image"
                              class="form-group dropify"
                              data-height="70"
                        >
                        <span class="text-danger" style="font-size: 0.7rem">الحجم المسموح هو 500 كيلوبايت - الملفات المسموح بها JPG, PNG</span>
                      </div>
                      <div class="col-6">
                        <img src="{{asset("uploads/$cat->image")}}" alt="{{$cat->name}}" style="height: 85px">
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
  <link rel="stylesheet" href="{{asset('admin/assets')}}/js/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('admin/assets')}}/js/plugins/dropzone/dist/min/dropzone.min.css">



@endsection
@section('js')
  <script src="{{asset('admin/assets')}}/js/plugins/select2/js/select2.full.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/ar.min.js"></script>
  <script src="{{asset('admin/assets')}}/js/plugins/dropzone/dropzone.min.js"></script>
  <script src="{{asset('admin/assets')}}/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>


  <script>
    jQuery(() => {

      $(".js-select2").select2({
        dir: "rtl",
        width: "100%",
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
          'minWidth': 'The image width is too small (@{{ value }}}px min).',
          'maxWidth': 'The image width is too big (@{{ value }}}px max).',
          'minHeight': 'The image height is too small (@{{ value }}}px min).',
          'maxHeight': 'The image height is too big (@{{ value }}px max).',
          'imageFormat': 'صيغة الصورة  @{{ value }} غير مسموح بها '
        }
      });

        $('#desc-maxlength150').maxlength({
            threshold: 150
        });

    })
  </script>

@endsection
