<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalUsers' => 150,
            'totalProducts' => 89,
            'totalOrders' => 23,
            'revenue' => 12500000
        ];

        return view('home', $data);
    }
}