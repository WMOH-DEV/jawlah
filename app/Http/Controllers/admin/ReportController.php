<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Category;
use App\Models\admin\City;
use App\Models\admin\Order;
use App\Models\admin\Ticket;
use App\Models\admin\User;
use App\Repositories\ReportRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function index()
    {
        $currentMonthUsers = $this->reportRepository->usersMonthCount();
        $currentMonthMerchants = $this->reportRepository->merchantsMonthCount();
        $totalOrders = Order::count();
        $tickets = Ticket::count();
        $sales = Order::select('total')->where('admin_status', 'تم الدفع')->sum('total');
        $debits = Order::select('total')->where('admin_status', 'لم يتم الدفع')->sum('total');

        $salesMonth = Order::select('total')
            ->where('admin_status', 'تم الدفع')
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('total');

        $debitsMonth = Order::select('total')
            ->where('admin_status', 'لم يتم الدفع')
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('total');

        $totalCities = City::count();
        $totalCategories = Category::count();
        $totalUsers = User::where('role_id', 1)->count();
        $totalMerchants = User::where('role_id', 2)->count();
        $totalUsersHasOrders = User::has('orders')->count();
        $totalMerchantsHasTickets = User::where('role_id', 2)->has('tickets')->count();


        return view('admin.reports.index', compact('currentMonthUsers',
            'totalOrders',
            'totalCities',
            'totalCategories',
            'totalUsers',
            'totalMerchants',
            'totalUsersHasOrders',
            'totalMerchantsHasTickets',
            'totalOrders',
            'salesMonth',
            'debits',
            'debitsMonth',
            'sales',
            'tickets',
            'currentMonthMerchants'));
    }

    public function statisticsAjax(Request $request)
    {
        if ($request->ajax()) {
        return $this->reportRepository->ordersOfWeek();
        }
        return 'No allowed';
    }

    public function usersAjax(Request $request)
    {
        if ($request->ajax()) {
            return $this->reportRepository->usersOfWeek();
        }
        return 'No allowed';
    }


    public function saleAjax(Request $request)
    {
        if ($request->ajax()) {
            return $this->reportRepository->salesOfWeek();
        }
        return 'No allowed';
    }


}
