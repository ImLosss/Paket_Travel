<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $orders = Order::query()
            ->with('paket')
            ->where('user_id', $user->getKey())
            ->orderByDesc('id')
            ->get();

        return view('order', [
            'user' => $user,
            'orders' => $orders,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'paket_id' => ['required', 'integer', 'exists:pakets,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $paket = Paket::query()->findOrFail($validated['paket_id']);

        if ($paket->quota < $validated['quantity']) {
            return back()->with([
                'alert' => 'error',
                'message' => 'Jumlah melebihi kuota yang tersedia.',
            ]);
        }

        $totalPrice = (float) $paket->price * (int) $validated['quantity'];

        $userId = (int) Auth::id();

        Order::create([
            'user_id' => $userId,
            'paket_id' => $paket->getKey(),
            'status' => 'pending',
            'quantity' => (int) $validated['quantity'],
            'total_price' => $totalPrice,
            'is_paid' => false,
            'proof_of_payment' => null,
        ]);

        return redirect()
            ->route('order')
            ->with([
                'alert' => 'success',
                'message' => 'Order berhasil dibuat. Silakan upload bukti pembayaran untuk menunggu konfirmasi admin.',
            ]);
    }

    public function uploadProof(Request $request, Order $order)
    {
        $userId = (int) Auth::id();

        if ((int) $order->user_id !== $userId) {
            abort(403);
        }

        $validated = $request->validate([
            'proof_of_payment' => ['required', 'image', 'max:4096'],
        ]);

        if ($order->proof_of_payment && Storage::disk('public')->exists($order->proof_of_payment)) {
            Storage::disk('public')->delete($order->proof_of_payment);
        }

        $path = $request->file('proof_of_payment')->store('orders/proofs', 'public');

        $order->update([
            'proof_of_payment' => $path,
            'is_paid' => false,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('order')
            ->with([
                'alert' => 'success',
                'message' => 'Bukti pembayaran berhasil diupload. Menunggu konfirmasi admin.',
            ]);
    }
}
