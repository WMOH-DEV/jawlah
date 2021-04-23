@extends('admin.main-layout')

@section('title')
    الرئيسية
@endsection

@section('content')
    <!-- Hero -->
    <div class="content">
        <div
            class="d-md-flex rtl justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-left">
            <div>
                <h1 class="h2 mb-1">
                    {{ __('global.Dashboard') }}
                </h1>

            </div>
            <div class="mt-4 mt-md-0">
                <p class="mb-0">
                    {{ __('global.welcome') }} <span>
		  auth name
		  </span>
                </p>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Overview -->
        <div class="row row-deck">
            {{--        <div class="col-sm-6 col-xl-3">--}}
            {{--            <div class="block block-rounded text-center d-flex flex-column">--}}
            {{--                <div class="block-content block-content-full flex-grow-1">--}}
            {{--                    <div class="item rounded-lg bg-body-dark mx-auto my-3">--}}
            {{--                        <i class="fa fa-level-up-alt text-muted"></i>--}}
            {{--                    </div>--}}
            {{--                    <div class="text-black font-size-h1 font-w700">300</div>--}}
            {{--                    <div class="text-muted mb-3">{{ __('global.new_requests') }}</div>--}}
            {{--                </div>--}}
            {{--                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">--}}
            {{--                    <a class="font-w500" href="javascript:void(0)">--}}
            {{--                        {{ __('global.view_all') }}--}}
            {{--                        <i class="fa fa-arrow-left mr-1 opacity-25"></i>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--        <div class="col-sm-6 col-xl-3">--}}
            {{--            <div class="block block-rounded text-center d-flex flex-column">--}}
            {{--                <div class="block-content block-content-full flex-grow-1">--}}
            {{--                    <div class="item rounded-lg bg-body-dark mx-auto my-3">--}}
            {{--                        <i class="fa fa-chart-line text-muted"></i>--}}
            {{--                    </div>--}}
            {{--                    <div class="text-black font-size-h1 font-w700">200</div>--}}
            {{--                    <div class="text-muted mb-3">{{ __('global.pending_requests') }}</div>--}}
            {{--                </div>--}}
            {{--                <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">--}}
            {{--                    <a class="font-w500" href="javascript:void(0)">--}}
            {{--                        {{ __('global.view_all') }}--}}
            {{--                        <i class="fa fa-arrow-left mr-1 opacity-25"></i>--}}
            {{--                    </a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}

            <div class="col-sm-6 col-xl-9">
                <div class="block block-rounded text-center d-flex flex-column">
                    <div class="block-content block-content-full">
                        <div class="item rounded-lg bg-body-dark mx-auto my-3">
                            <i class="fa fa-wallet text-muted"></i>
                        </div>
                        <div class="text-black font-size-h1 font-w700">150</div>
                        <div class="text-muted mb-3">{{ __('global.refused_requests') }}</div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <a class="font-w500" href="javascript:void(0)">
                            {{ __('global.view_all') }}
                            <i class="fa fa-arrow-left mr-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="block block-rounded text-center d-flex flex-column">
                    <div class="block-content block-content-full flex-grow-1">
                        <div class="item rounded-lg bg-body-dark mx-auto my-3">
                            <i class="fa fa-users text-muted"></i>
                        </div>
                        <div class="text-black font-size-h1 font-w700">500</div>
                        <div class="text-muted mb-3">{{ __('global.registered_users') }}</div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <a class="font-w500" href="javascript:void(0)">
                            {{ __('global.view_all') }}
                            <i class="fa fa-arrow-left mr-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
            </div>


        </div>
        <!-- END Overview -->

        <!-- Store Growth -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    {{ __('global.chart') }} - {{ __('global.upload_subjects') }}
                </h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle"
                            data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                    <button type="button" class="btn-block-option">
                        <i class="si si-wrench"></i>
                    </button>
                </div>
            </div>
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="col-md-5 col-xl-4 d-md-flex align-items-md-center">
                        <div class="p-md-2 p-lg-3">
                            <div class="py-3">
                                <div class="text-black font-size-h1 font-w700">300</div>
                                <div class="font-w600"> {{ __('global.new_upload_subjects') }} </div>
                                <div class="py-3 d-flex align-items-center">
                                    <div class="bg-success-lighter p-2 rounded ml-3">
                                        <i class="fa fa-fw fa-arrow-up text-success"></i>
                                    </div>
                                    <p class="mb-0">
                                        هناك زيادة بنسبة <span class="font-w600 text-success">10%</span> في إجمالي
                                        استلام الطلبات عن الأسبوع السابق
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-xl-8 d-md-flex align-items-md-center">
                        <div class="p-md-2 p-lg-3 w-100">
                            <!-- Bars Chart Container -->
                            <!-- Chart.js Chart is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _js/pages/be_pages_dashboard.js -->
                            <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                            <canvas class="js-chartjs-analytics-bars chartjs-render-monitor"
                                    style="display: block; height: 345px; width: 690px;" width="828"
                                    height="414"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Growth -->

        <!-- Latest Orders + Stats -->
        <div class="row">
            <div class="col-md-8">
                <!--  Latest Orders -->
                <div class="block block-rounded block-mode-loading-refresh">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            {{ __('global.latest_requests') }}
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option"
                                    data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <div class="dropdown">
                                <button type="button" class="btn-block-option" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="si si-chemistry"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item  rtl" href="javascript:void(0)">
                                        <i class="far fa-fw fa-dot-circle opacity-50 mr-1"></i> {{ __('global.pending_requests') }}
                                    </a>
                                    <a class="dropdown-item  rtl" href="javascript:void(0)">
                                        <i class="far fa-fw fa-times-circle opacity-50 mr-1"></i> {{ __('global.refused_requests') }}
                                    </a>
                                    <a class="dropdown-item  rtl" href="javascript:void(0)">
                                        <i class="far fa-fw fa-check-circle opacity-50 mr-1"></i> {{ __('global.completed_requests') }}
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item  rtl" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-eye opacity-50 mr-1"></i> {{ __('global.view_all') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                            <thead>
                            <tr class="text-uppercase">
                                <th>{{ __('global.teacher_name') }}</th>
                                <th class="d-none d-xl-table-cell">{{ __('global.created_date') }}</th>
                                <th>{{ __('global.request_status') }}</th>
                                <th class="d-none d-sm-table-cell text-right"
                                    style="width: 120px;">{{ __('global.request_email') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>


                            // foreach
                            <tr>
                                <td>
                                    <span class="font-w600">name</span>
                                </td>
                                <td class="d-none d-xl-table-cell">
                                    <span
                                        class="font-size-sm text-muted text-center">order->created_at->diffForHumans()</span>
                                </td>
                                <td>
                                    <span class="font-w600 text-warning text-center">order->status</span>
                                </td>
                                <td class="d-none d-sm-table-cell text-center font-w500">
                                    order->total
                                </td>
                                <td class="text-center text-nowrap font-w500">
                                    <a href="javascript:void(0)">
                                        {{ __('global.view') }}
                                    </a>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                    <div
                        class="block-content block-content-full block-content-sm bg-body-light font-size-sm text-center">
                        <a class="font-w500" href="javascript:void(0)">
                            {{ __('global.view_all') }}
                            <i class="fa fa-arrow-left mr-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
                <!-- END Latest Orders -->
            </div>
            <div class="col-md-4 d-flex flex-column">
                <!-- Stats -->
                <div class="block block-rounded">
                    <div
                        class="block-content block-content-full d-flex justify-content-between align-items-center flex-grow-1">
                        <div class="mr-3">
                            <p class="font-size-h3 font-w700 mb-0">
                                completedOrders
                            </p>
                            <p class="text-muted mb-0">
                                {{ __('global.completed_requests') }}
                            </p>
                        </div>
                        <div class="item rounded-lg bg-body-dark">
                            <i class="fa fa-check text-muted"></i>
                        </div>
                    </div>
                    <div
                        class="block-content block-content-full block-content-sm bg-body-light font-size-sm text-center">
                        <a class="font-w500" href="javascript:void(0)">
                            {{ __('global.view_all') }}
                            <i class="fa fa-arrow-left mr-1 opacity-25"></i>
                        </a>
                    </div>
                </div>
                <!-- END Stats -->
            </div>
        </div>
        <!-- END Latest Orders + Stats -->
    </div>
    <!-- END Page Content -->
@endsection

@section('js')
    <!-- Page JS Plugins -->
    <script src="{{asset('admin/assets')}}/js/plugins/chart.js/Chart.bundle.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="{{asset('admin/assets')}}/js/pages/be_comp_charts.min.js"></script>


    <script>
        class pageDashboard {
            /*
             * Chart.js, for more examples you can check out http://www.chartjs.org/docs
             *
             */
            static initChartsBars() {
                // Set Global Chart.js configuration
                Chart.defaults.global.defaultFontColor = '#495057';
                Chart.defaults.scale.gridLines.color = 'transparent';
                Chart.defaults.scale.gridLines.zeroLineColor = 'transparent';
                Chart.defaults.scale.ticks.beginAtZero = true;
                Chart.defaults.global.elements.line.borderWidth = 1;
                Chart.defaults.global.legend.labels.boxWidth = 12;

                // Get Chart Containers
                let chartBarsCon = jQuery('.js-chartjs-analytics-bars');

                // Set Chart and Chart Data variables
                let chartBars, chartLinesBarsData;

                // Bars Chart Data
                chartLinesBarsData = {
                    labels: [
                        'السبت',
                        'الأحد',
                        'الأثنين',
                        'الثلاثاء',
                        'الاربعاء',
                        'الخميس',
                        'الجمعة',
                    ],
                    datasets: [
                        {
                            label: 'الأسبوع الحالي',
                            fill: true,
                            backgroundColor: 'rgba(6, 101, 208, .6)',
                            borderColor: 'transparent',
                            pointBackgroundColor: 'rgba(6, 101, 208, 1)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgba(6, 101, 208, 1)',
                            data: [23, 60, 59, 20, 59, 56, 73]
                        },
                        {
                            label: 'الأسبوع السابق',
                            fill: true,
                            backgroundColor: 'rgba(6, 101, 208, .2)',
                            borderColor: 'transparent',
                            pointBackgroundColor: 'rgba(6, 101, 208, .2)',
                            pointBorderColor: '#fff',
                            pointHoverBackgroundColor: '#fff',
                            pointHoverBorderColor: 'rgba(6, 101, 208, .2)',
                            data: [62, 32, 69, 55, 32, 46, 33]
                        }
                    ]
                };

                // Init Chart
                if (chartBarsCon.length) {
                    chartBars = new Chart(chartBarsCon, {
                        type: 'bar',
                        data: chartLinesBarsData,
                        options: {
                            tooltips: {
                                intersect: false,
                                callbacks: {
                                    label: function (tooltipItems, data) {
                                        return data.datasets[tooltipItems.datasetIndex].label + ': ' + tooltipItems.yLabel + ' طلبات جديدة';
                                    }
                                }
                            }
                        }
                    });
                }
            }

            /*
             * Init functionality
             *
             */
            static init() {
                this.initChartsBars();
            }
        }

        // Initialize when page loads
        jQuery(() => {
            pageDashboard.init();
        });

    </script>
    <!-- Page JS Code -->
    {{--  <script src="{{asset('admin/assets')}}/js/pages/be_pages_dashboard.min.js"></script>--}}
@endsection
