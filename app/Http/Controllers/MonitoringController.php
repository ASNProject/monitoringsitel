<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Monitoring;
use App\Http\Resources\Resource;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MonitoringController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index()
    {
        $monitoring = Monitoring::latest()->paginate(10);

        return new Resource(true, 'Monitoring data retrieved successfully', $monitoring);
    }

    /**
     * store
     * 
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $monitorings = Monitoring::create([
            'cel1' => $request->cel1,
            'cel2' => $request->cel2,
            'cel3' => $request->cel3,
            'cel4' => $request->cel4,
            'total' => $request->total,
            'current' => $request->current,
            'soc' => $request->soc,
            'resistance' => $request->resistance,
            'temperature' => $request->temperature,
            'fuzzy' => $request->fuzzy
        ]);
        return new Resource(true, 'Monitoring data stored successfully', $monitorings);
    }

    public function latest()
    {
        $data = Monitoring::latest()->first();
        return new Resource(true, 'Latest monitoring data retrieved successfully', $data);
    }

    public function getChartData()
    {
        $data = Monitoring::select('cel1', 'cel2', 'cel3', 'cel4', 'total', 'current', 'soc', 'resistance', 'temperature', 'fuzzy', 'created_at')->get();

        $chartData = $data->map(function ($item) {
            return [
                'cel1' => $item->cel1,
                'cel2' => $item->cel2,
                'cel3' => $item->cel3,
                'cel4' => $item->cel4,
                'total' => $item->total,
                'current' => $item->current,
                'soc' => $item->soc,
                'resistance' => $item->resistance,
                'temperature' => $item->temperature,
                'fuzzy' => $item->fuzzy,
                'timestamp' => $item->created_at->toDateTimeString(),
            ];
        });

        return new Resource(true, 'Chart data retrieved successfully', $chartData);
    }
}
