<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monitoring;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function home(Request $request)
    {
        return view('contents.home');
    }

    public function data(Request $request)
    {
        $data = Monitoring::simplePaginate(10);
        return view('contents.data', compact('data'));
    }

    public function deleteAll()
    {
        DB::table('monitorings')->truncate();
        return redirect()->back()->with('success', 'All monitoring data has been deleted successfully.');
    }
}
