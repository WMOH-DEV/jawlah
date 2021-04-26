<div class="modal fade show" id="modal-add" tabindex="-1" aria-labelledby="modal-block-popin"
     style="display: none; padding-right: 15px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-popin" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">مدينة جديدة</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <form action="{{route('cities.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="block-content">
                        <div class="col-12">
                            <!--== Name ==-->
                            <div class="form-group">
                                <label for="name">إسم المدينة</label>
                                <input type="text" class="form-control form-control-alt unset" id="name"
                                       value="{{old('name')}}"
                                       name="name" placeholder="اسم المدينة الجديدة">
                            </div>
                            <!-- image -->
                            <div class="form-group">
                                <label for="image">صورة المدينة</label>
                                <input type="file" class="unset form-control dropify" id="image"
                                       value="{{old('image')}}"
                                       data-height="70"
                                       name="image">
                                <span class="text-danger" style="font-size: 0.7rem">* إلزامي - الحجم المسموح هو 1024 كيلوبايت - الملفات المسموح بها JPG, PNG</span>

                            </div>
                            <!-- Desc -->
                            <div class="form-group">
                                <label for="desc-maxlength150">وصف المدينة</label>
                                <textarea type="text" class="form-control unset js-maxlength js-maxlength-enabled" id="desc-maxlength150"
                                          name="desc" placeholder="الوصف هنا ..." maxlength="150">{{old('desc')}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-left bg-light">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                            <i class="fa fa-fw fa-times mr-1"></i>
                            إلغاء
                        </button>
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fa fa-fw fa-check"></i>
                            تأكيد
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
