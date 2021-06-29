<div class="content">
    <x-message/>
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">  {{ __('global.list') }} {{ __('global.clients') }} </h3>
            <div class="block-options">
                <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                        data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                        data-action="pinned_toggle">
                    <i class="si si-pin"></i>
                </button>
                <button type="button" class="btn btn-sm btn-alt-primary" data-toggle="block-option"
                        data-action="state_toggle"
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
        <div class="block-content">
            <div wire:offline class="w-100 text-center mb-2 font-w700">
                <span class="badge badge-pill badge-danger"><i class="fa fa-fw fa-times-circle"></i> تأكد من اتصالك بالانترنت</span>

            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    @superAdmin
                    <a href="{{route('clients.create')}}" type="button" wire:offline.attr="disabled"
                       class="btn btn-outline-success mr-1 mb-3 btn-sm"
                    >
                        <i class="fa fa-fw fa-plus mr-1"></i>
                        {{ __('global.add') }}
                    </a>
                    @endsuperAdmin

                @if (count($checked) > 0)
                    <!-- Delete all -->
                        <button type="button"
                                wire:click.prevent="deleteSelected"
                                onclick="confirm('هل أنت متأكد من هذا الإجراء ؟') || event.stopImmediatePropagation()"
                                class="btn btn-outline-danger mr-1 mb-3 btn-sm">
                            <i class="fa fa-fw fa-times mr-1"></i> حذف @if (count($checked) > 0) ({{count($checked)}}
                            ) @endif
                        </button>
                    @endif
                </div>
                <div class="col-sm-12 col-md-7 d-flex justify-between">
                    <div class="dataTables_filter col-7">
                        <label style="width: 100%">
                            <input type="search" class="form-control"
                                   placeholder="البحث ..."
                                   style="font-family: unset"
                                   wire:model.debounce.500ms="search"
                            >
                        </label>
                    </div>

                    <div class="dataTables_length col-5 row align-items-center justify-between">
                        <div class="col-4"> العرض:</div>
                        <div class="col-8">
                            <label style="width: 100%">
                                <select name="DataTables_Table_2_length"
                                        aria-controls="DataTables_Table_2"
                                        class="form-control rtl-select-arrow"
                                        wire:model="pagination">
                                    <option value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                </select>
                            </label>
                        </div>
                    </div>

                </div>

            </div>

            @superAdmin
            @if ($selectPage)
                @if ($selectAll)
                    <p class="font-size-sm m-1">لقد قمت بتحديد جميع الادخالات وعددها <span
                            class="font-w700">{{$clients->total()}}</span>
                        ،
                        <button wire:click="cancelSelectAll" wire:offline.attr="disabled" class="text-primary">إلغاء
                            التحديد؟
                        </button>
                    </p>
                @else
                    <p class="font-size-sm m-1">لقد قمت بتحديد <span class="font-w700">{{count($checked)}}</span> هل
                        تريد تحديد كل الادخالات <span class="font-w700">{{$clients->total()}}</span> ؟
                        <button wire:click="selectAll" wire:offline.attr="disabled"
                                class="badge badge-pill py-1 badge-success pointer">تحديد الكل <i
                                class="fa fa-fw fa-check"></i></button>
                    </p>
                @endif
            @endif
            @endsuperAdmin
            <div class="table-responsive">
                <table class="table table-bordered
                 table-striped table table-hover table-vcenter">
                    <thead style="font-size: 0.7rem">
                    <tr>
                        @superAdmin
                        <th class="text-center" style="width: 5%">
                            <div class="custom-control custom-checkbox custom-control-primary d-inline-block">
                                <input type="checkbox"
                                       class="custom-control-input"
                                       id="check-all"
                                       @Mod
                                       disabled
                                       @endMod
                                       @superAdmin
                                       wire:model="selectPage"
                                       @endsuperAdmin
                                       name="check-all">
                                <label class="custom-control-label" for="check-all"></label>
                            </div>

                        </th>
                        @endsuperAdmin
                        <th class="text-center">رقم ID</th>
                        <th class="text-center">الإسم</th>
                        <th class="text-center">رقم الجوال</th>
                        <th class="text-center">البريد الإلكتروني</th>
                        <th class="text-center">تاريخ الإضافة</th>
                        <th class="text-center" style="width: 100px;">الاجراءات</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($clients as $client)
                        <tr style="font-size: 0.8rem">
                            @superAdmin
                            <td class="text-center">
                                <div class="custom-control custom-checkbox custom-control-primary d-inline-block">
                                    <input type="checkbox"
                                           @Mod
                                           disabled
                                           @endMod
                                           class="custom-control-input"
                                           value="{{$client->id}}"
                                           id="{{$client->id}}"
                                           name="{{$client->id}}"
                                           wire:model="checked">
                                    <label class="custom-control-label" for="{{$client->id}}"></label>
                                </div>
                            </td>
                            @endsuperAdmin
                            <td class="text-center">{{ $client->id }}</td>
                            <td class="text-center">{{ $client->name }}</td>
                            <td class="text-center">{{ $client->phone }}</td>
                            <td class="text-center">{{ $client->email }}</td>
                            <td class="text-center">{{ $client->created_at->format('Y-m-d') }}</td>
                            <!-- Actions -->
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{route('clients.edit', $client->id)}}" type="button"
                                       class="btn btn-sm btn-primary js-tooltip-enabled btn-right"
                                       data-toggle="tooltip" title="" data-original-title="Edit">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <a href="{{route('clients.show', $client->id)}}" type="button"
                                       class="btn btn-sm btn-primary js-tooltip-enabled btn-mid"
                                       data-toggle="tooltip" title="" data-original-title="show">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-primary js-tooltip-enabled btn-left"
                                            title="حذف" data-original-title="delete"
                                            @Mod
                                            disabled
                                            @endMod
                                            @superAdmin
                                            data-toggle="modal"
                                            data-target="#modal-client-delete{{$client->id}}"
                                            @endsuperAdmin
                                    >
                                        <i class="fa fa-times"></i>
                                    </button>
                                    @superAdmin
                                    @include('admin.clients.inc.del-modal')
                                    @endsuperAdmin
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            {{ $clients->links() }}

        </div>


        <!-- Test -->


    </div>

</div>

