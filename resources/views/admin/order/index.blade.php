@extends('layouts.admin-layout')

@section('title')
    - Order
@endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Orders</li>
        </ol>
        <h5 class="font-weight-bolder mb-0">Order</h5>
    </nav>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-1 p-3">
            <div class="card-header pb-3">
                <div class="row">
                    <div class="col d-flex align-items-center">
                        <h6>All Orders</h6>
                    </div>
                    <div class="col">
                        <div class="d-flex justify-content-end flex-wrap">
                            {{-- Order dibuat oleh user. Admin hanya update status/pembayaran. --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    @csrf
                    <table class="table" id="dataTable3">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">User</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Paket</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Qty</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Total</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Paid</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Proof</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Created</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td class="text-sm">{{ $loop->iteration }}</td>
                                    <td class="text-sm">{{ $order->user?->username ?? '-' }}</td>
                                    <td class="text-sm">{{ $order->paket?->name ?? '-' }}</td>
                                    <td class="text-sm">{{ $order->quantity }}</td>
                                    <td class="text-sm">Rp {{ number_format($order->total_price) }}</td>
                                    <td class="text-sm">{{ $order->status }}</td>
                                    <td class="text-sm">{{ $order->is_paid ? 'Yes' : 'No' }}</td>
                                    <td class="text-sm">
                                        @if ($order->proof_of_payment)
                                            <a href="{{ Storage::url($order->proof_of_payment) }}" target="_blank">
                                                <img src="{{ Storage::url($order->proof_of_payment) }}" alt="proof" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-sm">{{ optional($order->created_at)->format('Y-m-d H:i') }}</td>
                                    <td class="text-sm">
                                        <a href="{{ route('admin.order.show', $order->id) }}" class="me-2" data-bs-toggle="tooltip" data-bs-original-title="View"><i class="fa-solid fa-eye text-secondary"></i></a>
                                        <a href="{{ route('admin.order.edit', $order->id) }}" class="me-2" data-bs-toggle="tooltip" data-bs-original-title="Edit"><i class="fa-solid fa-pen-to-square text-secondary"></i></a>
                                        <form id="form_{{ $order->id }}" action="{{ route('admin.order.destroy', $order->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="cursor-pointer fas fa-trash text-danger" onclick="modalHapus({{ $order->id }})" style="border: none; background: no-repeat;" data-bs-toggle="tooltip" data-bs-original-title="Delete Order"></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center text-sm">No order found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>

    function submit(key) {
        $('#form_'+key).submit();
    }

    function modalHapus(id) {
        Swal.fire({
            title: "Kamu yakin?",
            text: "Kamu tidak akan bisa membatalkannya setelah ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#a1a1a1",
            confirmButtonText: "Ya, hapus saja!"
        }).then((result) => {
            if (result.isConfirmed) {
                submit(id);
            }
        });
    }
</script>
@endsection
