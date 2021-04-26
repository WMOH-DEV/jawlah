@extends('admin.main-layout')

@section('title')
تصنيف جديد
@endsection


@section('content')

  <div class="content">
    <div class="block block-rounded">
      <div class="block-header block-header-default">
        <h3 class="block-title">  إضافة تصنيف جديد </h3>
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
        <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
          @csrf
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
                          اسم التصنيف
                    </label>
                  </th>
                  <td class="font-w600">
                    <input  class="form-control  unset" name="name" type="text" id="name" placeholder="يكتب اسم التصنيف">
                  </td>
                </tr>
                <tr style="font-size: 0.9rem">
                  <th scope="row">
                    <label for="desc">وصف التصنيف</label>
                  </th>
                  <td class="font-w600">
                    <textarea class="form-control  unset" name="desc" id="desc" rows="5" placeholder="وصف قصير للتصنيف"></textarea>
                  </td>
                </tr>
                <tr style="font-size: 0.9rem">
                  <th scope="row">
                    <label for="image">
                      صورة التصنيف
                    </label>
                  </th>
                  <td class="font-w600">
                    <input type="file" name="image"
                           class="form-group dropify"
                           data-height="30"
                    >
                    <span class="text-danger" style="font-size: 0.7rem">الحجم المسموح هو 500 كيلوبايت - الملفات المسموح بها JPG, PNG</span>

                  </td>
                </tr>
                <tr style="font-size: 0.9rem">
                  <th scope="row">
                    <label for="sort_order">
                     ترتيب العرض
                    </label>
                  </th>
                  <td class="font-w600">
                    <input  class="form-control  unset" type="number" id="sort_order" name="sort_order" value="0">
                    <span class="text-danger" style="font-size: 0.7rem">إتركه صفر ليتم الترتيب تلقائياً</span>
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
  <link rel="stylesheet" href="{{asset('assets')}}/js/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('assets')}}/js/plugins/dropzone/dist/min/dropzone.min.css">


@endsection
@section('js')
  <script src="{{asset('assets')}}/js/plugins/select2/js/select2.full.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/ar.min.js"></script>
  <script src="{{asset('assets')}}/js/plugins/dropzone/dropzone.min.js"></script>

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


    })
  </script>

@endsection
