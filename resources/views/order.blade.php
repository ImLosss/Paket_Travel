<x-app>
    <x-navbar></x-navbar>

    <section class="py-32 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col gap-8">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6">Riwayat Order</h2>

                    @if ($orders->isEmpty())
                        <p class="text-gray-600">Belum ada order.</p>
                    @else
                        <div class="space-y-6">
                            @foreach ($orders as $order)
                                <div class="flex flex-col md:flex-row gap-4 p-4 border rounded-lg">
                                    <div class="w-full md:w-32 h-32 rounded-lg overflow-hidden bg-gray-100">
                                        @if ($order->paket?->thumbnail)
                                            <img src="{{ Storage::url($order->paket->thumbnail) }}" alt="{{ $order->paket->name }}" class="w-full h-full object-cover" />
                                        @endif
                                    </div>

                                    <div class="flex-1">
                                        <div class="flex items-start justify-between gap-4">
                                            <div>
                                                <div class="text-lg font-semibold text-gray-800">{{ $order->paket?->name ?? 'Paket' }}</div>
                                                <div class="text-sm text-gray-600">Qty: {{ $order->quantity }} • Total: Rp {{ number_format($order->total_price) }}</div>
                                            </div>

                                            <div class="text-sm">
                                                @if ($order->is_paid)
                                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-800">Paid</span>
                                                @elseif ($order->proof_of_payment)
                                                    <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-800">Menunggu Konfirmasi</span>
                                                @else
                                                    <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700">Pending</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            @if ($order->proof_of_payment)
                                                <div class="text-sm text-gray-700 mb-2">Bukti pembayaran:</div>
                                                <a href="{{ Storage::url($order->proof_of_payment) }}" target="_blank" class="inline-block">
                                                    <img src="{{ Storage::url($order->proof_of_payment) }}" alt="Proof" class="w-32 h-32 object-cover rounded border" />
                                                </a>
                                            @endif

                                            @if (!$order->is_paid)
                                                <form action="{{ route('order.proof', $order->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
                                                    @csrf
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload / ganti bukti pembayaran</label>
                                                    <input type="file" name="proof_of_payment" accept="image/*" class="block w-full text-sm border border-gray-300 rounded p-2" required>
                                                    @error('proof_of_payment')
                                                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                                                    @enderror
                                                    <button type="submit" class="mt-3 px-4 py-2 bg-blue-900 text-white rounded-sm">Upload</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <x-footter></x-footter>
</x-app>
