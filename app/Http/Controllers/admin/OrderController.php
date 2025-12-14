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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()
            ->route('admin.order.index')
            ->with([
                'alert' => 'info',
                'message' => 'Order dibuat oleh user. Admin hanya mengelola status dan pembayaran.',
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()
            ->route('admin.order.index')
            ->with([
                'alert' => 'info',
                'message' => 'Order dibuat oleh user. Admin hanya mengelola status dan pembayaran.',
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load(['user', 'paket']);

        return view('admin.order.show', ['data' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $order->load(['user', 'paket']);

        return view('admin.order.edit', ['data' => $order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,completed,canceled'],
            'is_paid' => ['nullable'],
        ]);

        $isPaid = $request->boolean('is_paid');
        $status = $validated['status'];

        if ($isPaid && empty($order->proof_of_payment)) {
            return back()->withErrors([
                'is_paid' => 'Tidak bisa set Paid tanpa bukti pembayaran (proof_of_payment).',
            ])->withInput();
        }

        if ($status === 'canceled') {
            $isPaid = false;
        }

        if ($isPaid && $status === 'pending') {
            $status = 'completed';
        }

        $order->update([
            'status' => $status,
            'is_paid' => $isPaid,
        ]);

        return redirect()
            ->route('admin.order.index')
            ->with([
                'alert' => 'success',
                'message' => 'Order berhasil diupdate.',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()
            ->route('admin.order.index')
            ->with([
                'alert' => 'success',
                'message' => 'Order berhasil dihapus.',
            ]);
    }
}
