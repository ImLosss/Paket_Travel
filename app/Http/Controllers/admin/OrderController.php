<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['orders'] = Order::query()
            ->with(['user', 'paket'])
            ->orderByDesc('id')
            ->get();

        return view('admin.order.index', $data);
    }
}
