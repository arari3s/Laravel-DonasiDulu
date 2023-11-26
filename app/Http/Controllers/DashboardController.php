<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Donation::where('email', Auth::user()->email)->latest();

            return DataTables::of($query)
                ->editColumn('amount', function ($item) {
                    return 'Rp. ' . number_format($item->amount);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make();
        }

        return view('dashboard');
    }
}
