<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use Carbon\Carbon;
use PDF;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function orderReport()
    {
       
        $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
        $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');

     
        if (request()->date != '') {
            $date = explode(' - ', request()->date);
            $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
            $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
        }


        $orders = Order::with(['ordertrack'])->whereBetween('created_at', [$start, $end])->get();
        return view('admin.report.order', compact('orders'));
    }

    public function orderReportPdf($daterange)
    {
        $date = explode('+', $daterange); 
        $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
        $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';

        $orders = Order::with(['customer.district'])->whereBetween('created_at', [$start, $end])->get();
        $pdf = PDF::loadView('admin.report.order_pdf', compact('orders', 'date'));
        return $pdf->stream();
    }

    public function export_excel()
    {
        return Excel::download(new OrderExport, 'order.xlsx');
    }
}
