<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $orders = Order::query()
            ->with('paket')
            ->where('user_id', $user->getKey())
            ->orderByDesc('id')
            ->get();

        return view('dashboard', [
            'user' => $user,
            'orders' => $orders,
        ]);
    }
}
