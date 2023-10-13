<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function saleChart()
    {
        $data = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul' , 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            'datasets' => [
                [
                    'name' => 'Sales',
                    'barThickness' => 8,
                    'maxBarThickness' => '6',
                    'data' => [
                        60, 150, 30, 200, 180, 50, 180, 120, 230, 180, 250,
                        270,
                    ],
                ],
                [
                    'name' => 'Visitors',
                    'barThickness' => 8,
                    'maxBarThickness' => '6',
                    'data' => [
                        50, 135, 40, 180, 190, 60, 150, 90, 250, 170, 240,
                        250,
                    ],
                ]
            ]
        ];
        return response()->json($data);
    }
}
